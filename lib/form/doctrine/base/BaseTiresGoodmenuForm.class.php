<?php

/**
 * TiresGoodmenu form base class.
 *
 * @method TiresGoodmenu getObject() Returns the current form's model object
 *
 * @package    tires
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTiresGoodmenuForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'uuid'      => new sfWidgetFormInputHidden(),
      'reference' => new sfWidgetFormInputText(),
      'name'      => new sfWidgetFormInputText(),
      'level'     => new sfWidgetFormInputText(),
      'root_id'   => new sfWidgetFormInputText(),
      'lft'       => new sfWidgetFormInputText(),
      'rgt'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'uuid'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('uuid')), 'empty_value' => $this->getObject()->get('uuid'), 'required' => false)),
      'reference' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'name'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'level'     => new sfValidatorInteger(array('required' => false)),
      'root_id'   => new sfValidatorInteger(array('required' => false)),
      'lft'       => new sfValidatorInteger(array('required' => false)),
      'rgt'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tires_goodmenu[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TiresGoodmenu';
  }

}
