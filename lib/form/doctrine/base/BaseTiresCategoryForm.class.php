<?php

/**
 * TiresCategory form base class.
 *
 * @method TiresCategory getObject() Returns the current form's model object
 *
 * @package    tires
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTiresCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'uuid'                => new sfWidgetFormInputHidden(),
      'name'                => new sfWidgetFormInputText(),
      'active'              => new sfWidgetFormInputCheckbox(),
      'page_products_count' => new sfWidgetFormInputText(),
      'fotoname'            => new sfWidgetFormInputText(),
      'slug'                => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'uuid'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('uuid')), 'empty_value' => $this->getObject()->get('uuid'), 'required' => false)),
      'name'                => new sfValidatorString(array('max_length' => 255)),
      'active'              => new sfValidatorBoolean(array('required' => false)),
      'page_products_count' => new sfValidatorInteger(array('required' => false)),
      'fotoname'            => new sfValidatorString(array('max_length' => 255)),
      'slug'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'TiresCategory', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('tires_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TiresCategory';
  }

}
