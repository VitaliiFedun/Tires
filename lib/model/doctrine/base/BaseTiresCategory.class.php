<?php

/**
 * BaseTiresCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $uuid
 * @property string $name
 * @property boolean $active
 * @property integer $page_products_count
 * @property string $fotoname
 * @property Doctrine_Collection $TiresAttributes
 * @property Doctrine_Collection $TiresProducts
 * 
 * @method integer             getuuid()                Returns the current record's "uuid" value
 * @method string              getname()                Returns the current record's "name" value
 * @method boolean             getactive()              Returns the current record's "active" value
 * @method integer             getpage_products_count() Returns the current record's "page_products_count" value
 * @method string              getfotoname()            Returns the current record's "fotoname" value
 * @method Doctrine_Collection getTiresAttributes()     Returns the current record's "TiresAttributes" collection
 * @method Doctrine_Collection getTiresProducts()       Returns the current record's "TiresProducts" collection
 * @method TiresCategory       setuuid()                Sets the current record's "uuid" value
 * @method TiresCategory       setname()                Sets the current record's "name" value
 * @method TiresCategory       setactive()              Sets the current record's "active" value
 * @method TiresCategory       setpage_products_count() Sets the current record's "page_products_count" value
 * @method TiresCategory       setfotoname()            Sets the current record's "fotoname" value
 * @method TiresCategory       setTiresAttributes()     Sets the current record's "TiresAttributes" collection
 * @method TiresCategory       setTiresProducts()       Sets the current record's "TiresProducts" collection
 * 
 * @package    tires
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTiresCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('Tires_category');
        $this->hasColumn('uuid', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => '1',
             ));
        $this->hasColumn('page_products_count', 'integer', 4, array(
             'type' => 'integer',
             'default' => '10',
             'length' => 4,
             ));
        $this->hasColumn('fotoname', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));

        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('TiresAttribute as TiresAttributes', array(
             'local' => 'uuid',
             'foreign' => 'uuid_category'));

        $this->hasMany('TiresProduct as TiresProducts', array(
             'local' => 'uuid',
             'foreign' => 'uuid_category'));

        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->actAs($sluggable0);
    }
}