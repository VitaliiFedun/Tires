<?php

/**
 * TiresCategory filter form base class.
 *
 * @package    tires
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTiresCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'active'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'page_products_count' => new sfWidgetFormFilterInput(),
      'fotoname'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slug'                => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'                => new sfValidatorPass(array('required' => false)),
      'active'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'page_products_count' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fotoname'            => new sfValidatorPass(array('required' => false)),
      'slug'                => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tires_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TiresCategory';
  }

  public function getFields()
  {
    return array(
      'uuid'                => 'Number',
      'name'                => 'Text',
      'active'              => 'Boolean',
      'page_products_count' => 'Number',
      'fotoname'            => 'Text',
      'slug'                => 'Text',
    );
  }
}
