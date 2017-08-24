<?php

/**
 * TiresAttribute form base class.
 *
 * @method TiresAttribute getObject() Returns the current form's model object
 *
 * @package    tires
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTiresAttributeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'            => new sfWidgetFormInputText(),
      'uuid'            => new sfWidgetFormInputHidden(),
      'uuid_category'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TiresCategory'), 'add_empty' => false)),
      'multiple_choice' => new sfWidgetFormInputCheckbox(),
      'slug'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'name'            => new sfValidatorString(array('max_length' => 255)),
      'uuid'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('uuid')), 'empty_value' => $this->getObject()->get('uuid'), 'required' => false)),
      'uuid_category'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TiresCategory'))),
      'multiple_choice' => new sfValidatorBoolean(array('required' => false)),
      'slug'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'TiresAttribute', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('tires_attribute[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TiresAttribute';
  }

}
