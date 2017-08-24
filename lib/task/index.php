<?php
/**
 * Created by PhpStorm.
 * User: 2
 * Date: 30.07.2017
 * Time: 22:16
 */
//Сгенерировать по 100 рандомных товаров для каждой категории, имя товара должно
//состоять из Бренд + Модель:



include 'menu.lib.php';
include 'Goodest.php';

$conn = Doctrine_Manager::connection('mysql://root:@localhost/test', 'connection 1');
ini_set('auto_detect_line_endings',TRUE);


$goodes= array(
    'Шины' => array(
        'Бренды' => array ('Accelera', 'Barum', 'Continental', 'Debica',
            'Evergreen', 'Firestone', 'Goodyear',
            'Kumho', 'Mabor', 'Minerva'),
        'Модели' => array('Alpha', 'Platinum', 'Green Ace', 'Sport Green', 'AZ850',
            'Optima A1', 'G-Force R1', 'Rugged Terrain T/A', 'GPR300',
            'ContiIceContact HD'),
        'Характеристики' => array(
            'ДИАМЕТР' => array( 'R13', 'R14', 'R15', 'R16', 'R17'),
            'ШИРИНА' => (range(150, 250, 5)),
            'ПРОФИЛЬ'=>  (range(50, 100, 5)),
            'СЕЗОН'=> array ('Летний', 'Зимний', 'Всесезонний'),
            'ШИПЫ' => array('Шип', 'Не шип', 'Под шип')
        ),
    ),
    'Диски' => array(

        'Бренды' => array ('Adora', 'Alutec', 'Disla', 'Replica', 'Fondmetal',
            'JT', 'KFZ', 'Original', 'Replay', 'Replay'),
        'Модели' => array('GN23 S', 'KI52 BKF', 'LR55 HP', 'MI102 S', 'B81', 'H-290 GMFP', 'H-344 HS', 'H-531',
            'BKFP', 'KAP', 'Kapitan B'),
        'Характеристики' => array(
            'ДИАМЕТР' => array( 'R13', 'R14', 'R15', 'R16', 'R17'),
            "ШИРИНА ДИСКА"=>  ( range(4, 8, .5)),
            'PCD' => array ('4x98', '4x100', '5x100', '5x104', '5x114'),
            'DIA'=>  ( range(40, 90, 1)),
            'ЦВЕТ' => array ('Чорный','GM','MS','gold','chrome','FCGL')

        )
    )
);


function printarray ($chars, $refer)
{

    echo nl2br( "\r\n  CALL:". "Refer+chars = " .$refer."+".$chars);

    $level=+0;
    foreach ( $chars as $key => $value )
    {
        if ( !is_array($value)){
            echo ( "value = ".$value ." ,  \r\n");
        }
        else {

            echo nl2br( "\r\n". str_repeat( "--- ", $level)."Refer+Key = " .$refer."+".$key);

            printarray($value,$key   );

        }
    }

    echo nl2br("!\r\n");

};




function PrintllNodes($flatarray)
{
/*$i=1;*/
    foreach ($flatarray as $key => $value) {
        printarray ($value,  $key/*, $i*/);
    }

}


//// Step #1
////Load data fron array to table 'Menu'
//
//$go= new Goodest();
//$go->array2tree($goodes, $delete_all = true);
//
//// Step #2
////Create Tree - object from data in table 'Menu'
//$go->setGoodTree();
//
//// Step #3
////Create  table 'Categopy'
//$go->CreateTableCategory();
//
//
//// Step #4
////Create  table 'Attribute'
//$go->CreateTableAttributes();
//
//// Step #5
////Create   for each record in table categories
////100 goodes
//
$img_name = [1=>'tires-',2=>'wheel-'];
$go= new Goodest();
$go->setGoodTree();

$go->setGoodCharname();

//echo "<pre>";
//print_r($go->getGoodCharname());
//echo "</pre>";


$tree = $go->getGoodTree();
$roots = $tree->fetchRoots();
$promt=$go->getGoodCharname();


foreach ($roots as $node)
{
    $brands=null;
    $models=null;
    $charact=null;

   $brands=$go->GetArrayOfSets('Бренды',$node->root_id);
   $models=$go->GetArrayOfSets('Модели',$node->root_id);


//    echo "<pre>";
//    print_r($brands);
//    echo "</pre>";
//
//
//    echo "<pre>";
//    print_r($models);
//    echo "</pre>";
//

    echo "Call for Name  = Характеристики".'<br/>';

    $charact=$go->GetArrayOfSets('Характеристики',$node->root_id);

//
//echo "<pre>";
//print_r($charact);
//echo "</pre>";


   for ($i=0;$i<count($charact);$i++)
   {

//      echo "Call for Name  =".$charact[$i].'  '.$node->root_id.' <br/>';
      $attrib[$i]=$go->GetArrayOfSets($charact[$i],$node->root_id);

//       echo "Name  = ".$charact[$i].'<br/>';
   }

//    echo "<pre>";
//    print_r($attrib);
//    echo "</pre>";



    echo '<br/>';
    echo "Category = ".$node->name.'<br/>';
    echo '<br/>';

    for ($good=1;$good<=5;$good++)
    {
    shuffle($brands);
    shuffle($models);




        $fullnames = $brands[0].'  '.$models[0];
        echo '<br/>';
        echo "Brand + model  = ".$fullnames.'<br/>';

        for ($atr=0;$atr<count($charact);$atr++) // TO DO modernized
        {


            shuffle($attrib[$atr]);
//            $charact[$atr] - назва характеристики
//            $attrib[$atr][0] - значення характеристики (випадкове)
//            $temp_name=$charact[$atr];
            $temp_key=array_search($charact[$atr],$promt[$node->root_id] );



            if ($temp_key<1) {
                echo "Alarm! $charact[$atr] not in table 'Attribute'".'<br/>';
//                return;
            }
//            $temp_uuid=$promt[$node->root_id][$temp_key];

//            echo "<pre>";
//            print_r($temp_uuid);
//            echo "</pre>";


            echo $charact[$atr].';) = '.$attrib[$atr][0].'+'.$temp_key.'<br/>';


//            shuffle($attrib[$atr]);
//            $valueset = new TiresValueSet();
//            $valueset->setproducts_uuid($prod->getuuid()); // id in product
//            $valueset->setattributes_uuid($atr+1);     //Attention +1 !!!
//            $valueset->setvalue($attrib[$atr][0]);  // random value
//            $valueset->save();



        }



    }


}





//echo "<pre>";
//print_r($models[2]);
//echo "</pre>";

//
//for ($i=0;$i<=10;$i++) {
//    shuffle($brands[1]);
//    shuffle($models[1]);
//
//    $fullnames = $brands[1][0].'**'.$models[1][0];
//  echo "New names2 $i = ".$fullnames.'<br/>';
//
//}





//
//    $input[$rand_keys[0]]
// $fullnames = $brends[1][array_rand($brends[1][0])].'**'.$models[1][array_rand($brends[1][0])];

//  echo "New names2 $i = ".$fullnames.'<br/>';

//echo "New names1 $i = ". $brends[1][$i]." +  ".$models[1][$i].'<br/>';
//  echo "New names2 $i = ". $brends[2][$i]." +  ".$models[2][$i].'<br/>';

//}
//
//$input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
//
//echo "models";
//echo "<pre>";
//print_r($models[1]);
//echo "</pre>";
