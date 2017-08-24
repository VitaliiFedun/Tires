<?php

/**
 * TiresProduct form base class.
 *
 * @method TiresProduct getObject() Returns the current form's model object
 *
 * @package    tires
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTiresProductForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'uuid'          => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInputText(),
      'uuid_category' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TiresCategory'), 'add_empty' => false)),
      'price'         => new sfWidgetFormInputText(),
      'active'        => new sfWidgetFormInputCheckbox(),
      'fotoname'      => new sfWidgetFormInputText(),
      'slug'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'uuid'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('uuid')), 'empty_value' => $this->getObject()->get('uuid'), 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 255)),
      'uuid_category' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TiresCategory'))),
      'price'         => new sfValidatorNumber(array('required' => false)),
      'active'        => new sfValidatorBoolean(array('required' => false)),
      'fotoname'      => new sfValidatorString(array('max_length' => 255)),
      'slug'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'TiresProduct', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('tires_product[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TiresProduct';
  }

}
