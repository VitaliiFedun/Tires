<?php

/**
 * TiresValueset form base class.
 *
 * @method TiresValueset getObject() Returns the current form's model object
 *
 * @package    tires
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTiresValuesetForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'uuid'            => new sfWidgetFormInputHidden(),
      'products_uuid'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TiresProduct'), 'add_empty' => true)),
      'attributes_uuid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TiresAttribute'), 'add_empty' => true)),
      'value'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'uuid'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('uuid')), 'empty_value' => $this->getObject()->get('uuid'), 'required' => false)),
      'products_uuid'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TiresProduct'), 'required' => false)),
      'attributes_uuid' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TiresAttribute'), 'required' => false)),
      'value'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tires_valueset[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TiresValueset';
  }

}
