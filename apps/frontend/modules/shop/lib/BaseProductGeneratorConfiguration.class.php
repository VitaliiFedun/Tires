<?php

/**
 * product module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage product
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProductGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array();
  }

  public function getListParams()
  {
    return '%%fotoname%% - %%=name%% - %%price%% - %%category%% - %%active%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Admin Product Management';
  }

  public function getEditTitle()
  {
    return 'Editing "%%name%%"';
  }

  public function getNewTitle()
  {
    return 'New Product';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'fotoname',  1 => '=name',  2 => 'price',  3 => 'category',  4 => 'active',);
  }

  public function getFieldsDefault()
  {
    return array(
      'uuid' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'uuid_category' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Category',),
      'price' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'active' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',),
      'fotoname' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Foееto',),
      'slug' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'value' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'C:',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'uuid' => array(),
      'name' => array(),
      'uuid_category' => array(),
      'price' => array(),
      'active' => array(),
      'fotoname' => array(),
      'slug' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'uuid' => array(),
      'name' => array(),
      'uuid_category' => array(),
      'price' => array(),
      'active' => array(),
      'fotoname' => array(),
      'slug' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'uuid' => array(),
      'name' => array(),
      'uuid_category' => array(),
      'price' => array(),
      'active' => array(),
      'fotoname' => array(),
      'slug' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'uuid' => array(),
      'name' => array(),
      'uuid_category' => array(  'label' => 'Category',),
      'price' => array(),
      'active' => array(),
      'fotoname' => array(  'label' => 'Fotto',),
      'slug' => array(),
      'value' => array(  'label' => 'Val',),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'uuid' => array(),
      'name' => array(),
      'uuid_category' => array(),
      'price' => array(),
      'active' => array(),
      'fotoname' => array(),
      'slug' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'TiresProductForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'TiresProductFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 10;
  }

  public function getDefaultSort()
  {
    return array('name', 'desc');
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
