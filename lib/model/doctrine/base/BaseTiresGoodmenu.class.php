<?php

/**
 * BaseTiresGoodmenu
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $uuid
 * @property string $reference
 * @property string $name
 * @property integer $level
 * 
 * @method integer       getuuid()      Returns the current record's "uuid" value
 * @method string        getreference() Returns the current record's "reference" value
 * @method string        getname()      Returns the current record's "name" value
 * @method integer       getlevel()     Returns the current record's "level" value
 * @method TiresGoodmenu setuuid()      Sets the current record's "uuid" value
 * @method TiresGoodmenu setreference() Sets the current record's "reference" value
 * @method TiresGoodmenu setname()      Sets the current record's "name" value
 * @method TiresGoodmenu setlevel()     Sets the current record's "level" value
 * 
 * @package    tires
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTiresGoodmenu extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('Tires_goodmenu');
        $this->hasColumn('uuid', 'integer', 20, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 20,
             ));
        $this->hasColumn('reference', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('level', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));

        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $nestedset0 = new Doctrine_Template_NestedSet(array(
             'hasManyRoots' => true,
             'rootColumnName' => 'root_id',
             ));
        $this->actAs($nestedset0);
    }
}