<?php

/**
 * BaseTiresProduct
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $uuid
 * @property string $name
 * @property integer $uuid_category
 * @property decimal $price
 * @property boolean $active
 * @property string $fotoname
 * @property TiresCategory $TiresCategory
 * @property Doctrine_Collection $TiresValuesets
 * 
 * @method integer             getuuid()           Returns the current record's "uuid" value
 * @method string              getname()           Returns the current record's "name" value
 * @method integer             getuuid_category()  Returns the current record's "uuid_category" value
 * @method decimal             getprice()          Returns the current record's "price" value
 * @method boolean             getactive()         Returns the current record's "active" value
 * @method string              getfotoname()       Returns the current record's "fotoname" value
 * @method TiresCategory       getTiresCategory()  Returns the current record's "TiresCategory" value
 * @method Doctrine_Collection getTiresValuesets() Returns the current record's "TiresValuesets" collection
 * @method TiresProduct        setuuid()           Sets the current record's "uuid" value
 * @method TiresProduct        setname()           Sets the current record's "name" value
 * @method TiresProduct        setuuid_category()  Sets the current record's "uuid_category" value
 * @method TiresProduct        setprice()          Sets the current record's "price" value
 * @method TiresProduct        setactive()         Sets the current record's "active" value
 * @method TiresProduct        setfotoname()       Sets the current record's "fotoname" value
 * @method TiresProduct        setTiresCategory()  Sets the current record's "TiresCategory" value
 * @method TiresProduct        setTiresValuesets() Sets the current record's "TiresValuesets" collection
 * 
 * @package    tires
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTiresProduct extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('Tires_product');
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
        $this->hasColumn('uuid_category', 'integer', 8, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 8,
             ));
        $this->hasColumn('price', 'decimal', 11, array(
             'type' => 'decimal',
             'scale' => 4,
             'length' => 11,
             ));
        $this->hasColumn('active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => '1',
             ));
        $this->hasColumn('fotoname', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));


        $this->index('uuid_category_idx_idx_idx_idx', array(
             'fields' => 
             array(
              0 => 'uuid_category',
             ),
             ));
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('TiresCategory', array(
             'local' => 'uuid_category',
             'foreign' => 'uuid',
             'onDelete' => 'cascade',
             'onUpdate' => 'restrict',
             'owningSide' => true));

        $this->hasMany('TiresValueset as TiresValuesets', array(
             'local' => 'uuid',
             'foreign' => 'products_uuid'));

        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->actAs($sluggable0);
    }
}