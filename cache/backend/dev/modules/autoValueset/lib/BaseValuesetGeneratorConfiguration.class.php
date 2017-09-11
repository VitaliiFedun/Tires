<?php

/**
 * valueset module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage valueset
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseValuesetGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%uuid%% - %%products_uuid%% - %%attributes_uuid%% - %%value%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Valueset List';
  }

  public function getEditTitle()
  {
    return 'Edit Valueset';
  }

  public function getNewTitle()
  {
    return 'New Valueset';
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
    return array(  0 => 'uuid',  1 => 'products_uuid',  2 => 'attributes_uuid',  3 => 'value',);
  }

  public function getFieldsDefault()
  {
    return array(
      'uuid' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'products_uuid' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'attributes_uuid' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'value' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'uuid' => array(),
      'products_uuid' => array(),
      'attributes_uuid' => array(),
      'value' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'uuid' => array(),
      'products_uuid' => array(),
      'attributes_uuid' => array(),
      'value' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'uuid' => array(),
      'products_uuid' => array(),
      'attributes_uuid' => array(),
      'value' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'uuid' => array(),
      'products_uuid' => array(),
      'attributes_uuid' => array(),
      'value' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'uuid' => array(),
      'products_uuid' => array(),
      'attributes_uuid' => array(),
      'value' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'TiresValuesetForm';
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
    return 'TiresValuesetFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
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
