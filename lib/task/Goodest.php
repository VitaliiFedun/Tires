<?php

/**
 * Created by PhpStorm.
 * User: 2
 * Date: 07.08.2017
 * Time: 21:08
 */

class Goodest
{

protected $fotonamefilecategory ='categ-';

protected  $GoodTree = null;

    /**
     * @return null
     */
    public function getGoodTree()
    {
        return $this->GoodTree;
    }

    /**
     * @param null $GoodTree
     */
    public function setGoodTree()
    {

        $this->GoodTree = Doctrine_Core::getTable('TiresGoodmenu')->getTree();
    }
    protected  $GoodCharname = null;

    /**
     * @return null
     */
    public function getGoodCharname()
    {
        return $this->GoodCharname;
    }

    /**
     */
    public function setGoodCharname() // TO DO is modernized
    {
        $result[]=null;
        $qws = Doctrine_Query::create()->from('TiresAttribute')
            ->execute();

//        for ($i=1;$i<=$qws->count();$i++){
//            $result[$qws->uuid_category][$i]=array('name'=>$qws->name,'uuid'=>$qws->uuid);
//
//        }

        foreach ($qws as  $qw) //TO DO перенести в tires
        {
            $result[$qw->uuid_category][$qw->uuid]= $qw->name;

        }

        $this->GoodCharname = $result;
    }
//*****************All function for work with trees data****************
////create table category:
    public function CreateTableCategory()
    {

        $tree = $this->getGoodTree();
        $roots = $tree->fetchRoots();
        foreach ($roots as $node) {
            $category = new TiresCategory();
            $category->name = $node->name;
            $category->fotoname = $this->fotonamefilecategory.$node->root_id . '.jpg';
            $category->save();
//            echo "Category " . $node['name'] . ' created. <br/>';

        }
        echo "Table Category is created. \r\n";
    }
    ////create table Attribute:

    public function CreateTableAttributes()
    {

        $name_for_seach='Характеристики';
        $tree = $this->getGoodTree();
        $roots = $tree->fetchRoots();
        foreach ($roots as $node)
        {
            $nodeseachs=$this-> SearchNodeInTree($name_for_seach, $node->root_id );
            if ($nodeseachs===null)
            {
                echo "Node name $name_for_seach not in tree." . '\r\n';
                return;
            }

            $childrens = $nodeseachs->getNode()->getChildren();
            foreach ($childrens as $children)
            {

            $attrib = new TiresAttribute();

            $attrib->name = $children['name'];
            $attrib->uuid_category = $children['root_id'];
            $attrib->save();

//                echo " childrens " . $children['name'] . '  for' . $children['root_id'] . '  created. <br/>';
            }

        }
        echo "Table Attribute is created. \r\n";
    }

    public function SearchNodeInTree($name_for_seach, $roots_id_category )
    {
        if ($name_for_seach === '') {
            echo "Param #1 in function SearchNodeInTree() is empty." . "\r\n";
            return null;
        }

        $treeObject = $this->getGoodTree();

        $count_root = $treeObject->fetchRoots()->count();

        if (($roots_id_category < 1) or ($roots_id_category > $count_root)) {
            echo "Param #2 in function SearchNodeInTree() is wrong." . "\r\n";
            return null;
        }


        $nodeseachs = null;


        $options = array('root_id' => $roots_id_category);
        foreach ($treeObject->fetchTree($options) as $node)
        {
//            echo str_repeat('=', $node['level']) . $node['name'] . "\r\n<br/>";
            if ($node->name == $name_for_seach)
            {
                $nodeseachs = $node;
//                echo "Returnrd " . $nodeseachs['name'] . '  for' . $nodeseachs['root_id'] . ' . <br/>';
                break;
            }

        }

        return $nodeseachs;
    }

public  function printalltree ()
{
    echo  "========================== \r\n";

    // ...
    $treeObject = Doctrine_Core::getTable('TiresGoodmenu')->getTree();
    $rootColumnName = $treeObject->getAttribute('rootColumnName');

    foreach ($treeObject->fetchRoots() as $root)
    {
        $options = array( 'root_id' => $root->$rootColumnName  );
        foreach ($treeObject->fetchTree($options) as $node)
        {
            echo str_repeat('- ', $node['level']) . $node['name'] . "\r\n";


        }
    }
}

    public function GetArrayOfSets($nameofset, $root_id)
{
    //TO DO реалізувати через SearchNodeInTree
    //    щоб позбутись лишнього смикання бази

    $result = null;

$nodes = Doctrine_Query::create()->from('TiresGoodmenu m')
    ->where('m.reference = ? ', $nameofset)
    ->addWhere('root_id=?', $root_id)
    ->execute();


 $сhildrens = $nodes[0]->getNode()->getChildren();

  foreach ($сhildrens as $сhildren)
  {
      $result[] = $сhildren['name'];

}
 return $result;

}




//*****************All function for make nodes from array****************
    /**
     * @param bool $delete_all
     *
     * delete all records in table "TiresGoodmenu"
     * if $delete_all != false
     */
    private function SetupTable($delete_all = true)
    {

        if (!$delete_all) return;

//        echo("Setup  table \r\n");
        $et = Doctrine_Core::getTable('TiresGoodmenu')->count();
        if (!($et == 0)) {

//            echo nl2br("Tuncate $et records \r\n");
            $thistiresTiresGoodmenu = Doctrine_Core::getTable('TiresGoodmenu' )
                ->createQuery()
                ->delete('TiresGoodmenu')
                ->where('uuid <> ?', 0)
                ->execute();

        }
//        echo nl2br("Setup table done \r\n");

    }


    /**
     * @param $refer
     * @param $root_id
     */

    private function CreateRootNode($refer, $root_id)
    {
        $node = new TiresGoodmenu();
        $node->reference = $refer;
        $node->name = $refer;
        $node->save();
        $node->root_id = $root_id;
        $treeObject = Doctrine_Core::getTable('TiresGoodmenu')->getTree();
        $treeObject->createRoot($node);
//        echo nl2br($refer . "= CreateRootNode - done!\r\n");

    }


    /**
     * @param $chars
     * @param $refer
     * @param $root_id
     */
    private function SaveArrayToNode($chars, $refer, $root_id)
    {

        foreach ($chars as $key => $value) {
            $node = new TiresGoodmenu();

            if (is_array($value)) {
                $node->reference = $key;
                $node->name = $key;

            } else {
                $node->reference = $value;
                $node->name = $value;

            }
            $node->root_id = $root_id;
            $parentnode = Doctrine_Query::create()->from('TiresGoodmenu m')
                ->where('m.reference = ? ', $refer)
                ->addWhere('root_id=?', $root_id)
                ->execute();

            $node->getNode()->insertAsLastChildOf($parentnode[0]);

        }

        foreach ($chars as $key => $value) {
            if (is_array($value)) {
                $refer = $key;
                $this->SaveArrayToNode($value, $refer, $root_id);
            }


        }
    }

    /**
     * @param $flatarray
     */
    public function array2tree($flatarray, $delete_all = true)
    {
        $this->SetupTable($delete_all);
        $i = 1;
        foreach ($flatarray as $key => $value) {

            $this->CreateRootNode($key, $i);
            $i = $i + 1;
        }
        $i = 1;
        foreach ($flatarray as $key => $value) {
//            echo nl2br("Create Node for: $value, $key , $i \r\n");
            $this->SaveArrayToNode($value, $key, $i);
            $i = $i + 1;
        }

    }

}



