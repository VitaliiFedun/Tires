<?php

/**
 * TiresValueset filter form base class.
 *
 * @package    tires
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTiresValuesetFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'products_uuid'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TiresProduct'), 'add_empty' => true)),
      'attributes_uuid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TiresAttribute'), 'add_empty' => true)),
      'value'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'products_uuid'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TiresProduct'), 'column' => 'uuid')),
      'attributes_uuid' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TiresAttribute'), 'column' => 'uuid')),
      'value'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tires_valueset_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TiresValueset';
  }

  public function getFields()
  {
    return array(
      'uuid'            => 'Number',
      'products_uuid'   => 'ForeignKey',
      'attributes_uuid' => 'ForeignKey',
      'value'           => 'Text',
    );
  }
}
