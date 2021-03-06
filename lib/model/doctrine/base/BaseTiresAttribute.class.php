<?php

/**
 * BaseTiresAttribute
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property integer $uuid
 * @property integer $uuid_category
 * @property boolean $multiple_choice
 * @property TiresCategory $TiresCategory
 * @property Doctrine_Collection $TiresValuesets
 * 
 * @method string              getname()            Returns the current record's "name" value
 * @method integer             getuuid()            Returns the current record's "uuid" value
 * @method integer             getuuid_category()   Returns the current record's "uuid_category" value
 * @method boolean             getmultiple_choice() Returns the current record's "multiple_choice" value
 * @method TiresCategory       getTiresCategory()   Returns the current record's "TiresCategory" value
 * @method Doctrine_Collection getTiresValuesets()  Returns the current record's "TiresValuesets" collection
 * @method TiresAttribute      setname()            Sets the current record's "name" value
 * @method TiresAttribute      setuuid()            Sets the current record's "uuid" value
 * @method TiresAttribute      setuuid_category()   Sets the current record's "uuid_category" value
 * @method TiresAttribute      setmultiple_choice() Sets the current record's "multiple_choice" value
 * @method TiresAttribute      setTiresCategory()   Sets the current record's "TiresCategory" value
 * @method TiresAttribute      setTiresValuesets()  Sets the current record's "TiresValuesets" collection
 * 
 * @package    tires
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTiresAttribute extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('Tires_attribute');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('uuid', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('uuid_category', 'integer', 8, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 8,
             ));
        $this->hasColumn('multiple_choice', 'boolean', null, array(
             'type' => 'boolean',
             'default' => '1',
             ));


        $this->index('uuid_category_idx', array(
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
             'owningSide' => true));

        $this->hasMany('TiresValueset as TiresValuesets', array(
             'local' => 'uuid',
             'foreign' => 'attributes_uuid'));

        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->actAs($sluggable0);
    }
}