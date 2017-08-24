<?php
/**
 * Created by PhpStorm.
 * User: 2
 * Date: 30.07.2017
 * Time: 22:16
 */
//Сгенерировать по 100 рандомных товаров для каждой категории, имя товара должно
//состоять из Бренд + Модель:

class initerTask extends sfBaseTask
{
    protected function configure()
    {
        // // add your own arguments here
        // $this->addArguments(array(
        //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
        // ));

        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
            // add your own options here
        ));

        $this->namespace        = '';
        $this->name             = 'initer';
        $this->briefDescription = '';
        $this->detailedDescription = <<<EOF
The [initer|INFO] task does things.
Call it with:

  [php symfony initer|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array())
    {
        // initialize the database connection
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

        // add your code here
        $goodes = array(
            'Шины' => array(
                'Бренды' => array('Accelera', 'Barum', 'Continental', 'Debica',
                    'Evergreen', 'Firestone', 'Goodyear',
                    'Kumho', 'Mabor', 'Minerva'),
                'Модели' => array('Alpha', 'Platinum', 'Green Ace', 'Sport Green', 'AZ850',
                    'Optima A1', 'G-Force R1', 'Rugged Terrain T/A', 'GPR300',
                    'ContiIceContact HD'),
                'Характеристики' => array(
                    'ДИАМЕТР' => array('R13', 'R14', 'R15', 'R16', 'R17'),
                    'ШИРИНА' => (range(150, 250, 5)),
                    'ПРОФИЛЬ' => (range(50, 100, 5)),
                    'СЕЗОН' => array('Летний', 'Зимний', 'Всесезонний'),
                    'ШИПЫ' => array('Шип', 'Не шип', 'Под шип')
                ),
            ),
            'Диски' => array(

                'Бренды' => array('Adora', 'Alutec', 'Disla', 'Replica', 'Fondmetal',
                    'JT', 'KFZ', 'Original', 'Replay', 'Replay'),
                'Модели' => array('GN23 S', 'KI52 BKF', 'LR55 HP', 'MI102 S', 'B81', 'H-290 GMFP', 'H-344 HS', 'H-531',
                    'BKFP', 'KAP', 'Kapitan B'),
                'Характеристики' => array(
                    'ДИАМЕТР' => array('R13', 'R14', 'R15', 'R16', 'R17'),
                    "ШИРИНА ДИСКА" => (range(4, 8, .5)),
                    'PCD' => array('4x98', '4x100', '5x100', '5x104', '5x114'),
                    'DIA' => (range(40, 90, 1)),
                    'ЦВЕТ' => array('Чорный', 'GM', 'MS', 'gold', 'chrome', 'FCGL')

                )
            )
        );

//
//echo "<pre>";
//print_r($goodes);
//echo "</pre>";

// Step #1
//Load data fron array to table 'Menu'

        $go= new Goodest();
        $go->array2tree($goodes, $delete_all = true);

// Step #2
//Create Tree - object from data in table 'Menu'
        $go->setGoodTree();

// Step #3
//Create  table 'Categopy'
        $go->CreateTableCategory();


// Step #4
//Create  table 'Attribute'
        $go->CreateTableAttributes();

// Step #5
//Create   for each record in table categories
//100 goodes


        echo "Randomised goods: \r\n";

        $img_name = [1 => 'tires-', 2 => 'wheel-'];

        $go = new Goodest();
        $go->setGoodTree();
        $go->setGoodCharname();

        $tree = $go->getGoodTree();
        $roots = $tree->fetchRoots();
        $promt=$go->getGoodCharname();

        foreach ($roots as $node) {
            echo "Category: $node->name \r\n";

            $brands = null;
            $models = null;
            $charact = null;

            $brands = $go->GetArrayOfSets('Бренды', $node->root_id);
            $models = $go->GetArrayOfSets('Модели', $node->root_id);

//            $charact - масив назв категорій для 'Характеристики'

            $charact = $go->GetArrayOfSets('Характеристики', $node->root_id);

            for ($i = 0; $i < count($charact); $i++)
            {

                $attrib[$i] = $go->GetArrayOfSets($charact[$i], $node->root_id);

            }
            echo "\r\n";

            for ($good = 1; $good <= 100; $good++)
            {
                shuffle($brands);
                shuffle($models);
                $fullnames = $brands[0] . '  ' . $models[0];
                $prod = new TiresProduct();
                $prod->name = $fullnames;
                $prod->uuid_category = $node->root_id;
                $prod->active = true;
                $prod->price = rand(20000, 100000) / 100;
                $prod->fotoname = $img_name[$node->root_id]. rand(1, 10) . ".jpg";
                $prod->save();
                echo "$node->root_id : $good) " . $fullnames."- saved. \r\n";

                for ($atr = 0; $atr < count($charact); $atr++)
                {
                    shuffle($attrib[$atr]);
//
//            $charact[$atr] - назва характеристики
//            $attrib[$atr][0] - значення характеристики (випадкове)
//          $temp_key -  Uuid from Atrribute table
            $temp_name=$charact[$atr];
            $temp_key=array_search($temp_name,$promt[$node->root_id] );

            if ($temp_key<1) {
                echo "Alarm! $charact[$atr] not in table 'Attribute'".'<br/>';
//                return;
            }
                    $valueset = new TiresValueSet();
                    $valueset->setproducts_uuid($prod->getuuid()); // id in product
                    $valueset->setattributes_uuid($temp_key);     //Attention +1 !!!
                    $valueset->setvalue($attrib[$atr][0]);  // random value
                    $valueset->save();
                }
            }
        }





//
//
////create table category:
//        $i = 1;
//        foreach ($goodes as $key => $value) {
//            $categ = new TiresCategory();
//            $categ->name = $key;
//            $categ->fotoname = 'categ-' . $i . '.jpg';
//            $categ->save();
//            $i++;
//        }
//
////create table Attribute:
//
//        $chars = $goodes['Шины']['Характеристики'];
//        foreach ($chars as $key => $value) {
//            $chartable = new TiresAttribute();
//            $chartable->name = $key;
//            $chartable->uuid_category = 1;
//            $chartable->save();
//
//        }
//
//        $chars = $goodes['Диски']['Характеристики'];
//        foreach ($chars as $key => $value) {
//            $chartable = new TiresAttribute();
//            $chartable->name = $key;
//            $chartable->uuid_category = 2;
//            $chartable->save();
//
//        }
//
//
//        for ($i = 1; $i <= 100; $i++) {
//
//            echo nl2br("tires $i \r\n");
////
//            $brands = $goodes['Шины']['Бренды'];
//            $models = $goodes['Шины']['Модели'];
//
//            $diams = $goodes['Шины']['Характеристики']['ДИАМЕТР'];
//            $widths = $goodes['Шины']['Характеристики']["ШИРИНА"];
//            $profs = $goodes['Шины']['Характеристики']['ПРОФИЛЬ'];
//            $sesons = $goodes['Шины']['Характеристики']['СЕЗОН'];
//            $ships = $goodes['Шины']['Характеристики']['ШИПЫ'];
//
//            shuffle($brands);
//            shuffle($models);
//
//            $name_tmp = $brands[0] . '  ' . $models[0];
////          echo nl2br("Name= " . $name_tmp . "\r\n");
//
//            $prod = new TiresProduct();
//            $prod->name = $name_tmp;
//            $prod->uuid_category = 1;
//            $prod->active = true;
//            $prod->price = rand(20000, 100000) / 100;
//            $prod->fotoname = 'tires-' . rand(1, 10) . ".jpg";
//
//            $prod->save();
//
//            shuffle($diams);
//            shuffle($widths);
//            shuffle($profs);
//            shuffle($sesons);
//            shuffle($ships);
//
//            $char[1] = $diams[0];
//            $char[2] = $widths[0];
//            $char[3] = $profs[0];
//            $char[4] = $sesons[0];
//            $char[5] = $ships[0];
//
//            for ($j = 1; $j <= 5; $j++) {
//
//                $prodAtribs = new TiresValueSet();
//                $prodAtribs->setproducts_uuid($prod->getuuid());
//                $prodAtribs->setattributes_uuid($j);
//                $prodAtribs->setvalue($char[$j]);
//                $prodAtribs->save();
//
//            }
//
//        }
//
//
//
//        for ($i = 1; $i <= 100; $i++) {
//
//            echo nl2br("wheel $i \r\n");
//
//            $brands = $goodes['Диски']['Бренды'];
//            $models = $goodes['Диски']['Модели'];
//            $diams = $goodes['Диски']['Характеристики']['ДИАМЕТР'];
//            $diskwidths = $goodes['Диски']['Характеристики']["ШИРИНА ДИСКА"];
//            $pcds = $goodes['Диски']['Характеристики']['PCD'];
//            $dias = $goodes['Диски']['Характеристики']['DIA'];
//            $colors = $goodes['Диски']['Характеристики']['ЦВЕТ'];
//
//            shuffle($brands);
//            shuffle($models);
//
//            $name_tmp = $brands[0] . '  ' . $models[0];
//            $prod = new TiresProduct();
//            $prod->name = $name_tmp;
//            $prod->uuid_category = 2;
//            $prod->active = true;
//            $prod->price = rand(120000, 3100000) / 100;
//            $prod->fotoname = 'wheel-' . rand(1, 10) . ".jpg";
//            $prod->save();
//
//
//            shuffle($diams);
//            shuffle($diskwidths);
//            shuffle($pcds);
//            shuffle($sesons);
//            shuffle($colors);
//
//            $char[1] = $diams[0];
//            $char[2] = $diskwidths[0];
//            $char[3] = $pcds[0];
//            $char[4] = $dias[0];
//            $char[5] = $colors[0];
//
//            for ($j = 1; $j <= 5; $j++) {
//
//                $prodAtribs = new TiresValueSet();
//                $prodAtribs->setproducts_uuid($prod->getuuid());
//                $prodAtribs->setattributes_uuid($j);
//                $prodAtribs->setvalue($char[$j]);
//                $prodAtribs->save();
//
//
//            }
//
//        }

    }
}
