<?php

/**
 * TiresGoodmenu filter form base class.
 *
 * @package    tires
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTiresGoodmenuFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'reference' => new sfWidgetFormFilterInput(),
      'name'      => new sfWidgetFormFilterInput(),
      'level'     => new sfWidgetFormFilterInput(),
      'root_id'   => new sfWidgetFormFilterInput(),
      'lft'       => new sfWidgetFormFilterInput(),
      'rgt'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'reference' => new sfValidatorPass(array('required' => false)),
      'name'      => new sfValidatorPass(array('required' => false)),
      'level'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'root_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lft'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rgt'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tires_goodmenu_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TiresGoodmenu';
  }

  public function getFields()
  {
    return array(
      'uuid'      => 'Number',
      'reference' => 'Text',
      'name'      => 'Text',
      'level'     => 'Number',
      'root_id'   => 'Number',
      'lft'       => 'Number',
      'rgt'       => 'Number',
    );
  }
}
