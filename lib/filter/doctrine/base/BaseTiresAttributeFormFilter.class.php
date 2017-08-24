<?php

/**
 * TiresAttribute filter form base class.
 *
 * @package    tires
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTiresAttributeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'uuid_category'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TiresCategory'), 'add_empty' => true)),
      'multiple_choice' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'slug'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'            => new sfValidatorPass(array('required' => false)),
      'uuid_category'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TiresCategory'), 'column' => 'uuid')),
      'multiple_choice' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'slug'            => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tires_attribute_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TiresAttribute';
  }

  public function getFields()
  {
    return array(
      'name'            => 'Text',
      'uuid'            => 'Number',
      'uuid_category'   => 'ForeignKey',
      'multiple_choice' => 'Boolean',
      'slug'            => 'Text',
    );
  }
}
