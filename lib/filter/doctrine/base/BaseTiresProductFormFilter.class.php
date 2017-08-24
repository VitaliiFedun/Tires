<?php

/**
 * TiresProduct filter form base class.
 *
 * @package    tires
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTiresProductFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'uuid_category' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TiresCategory'), 'add_empty' => true)),
      'price'         => new sfWidgetFormFilterInput(),
      'active'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fotoname'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slug'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'uuid_category' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TiresCategory'), 'column' => 'uuid')),
      'price'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'active'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fotoname'      => new sfValidatorPass(array('required' => false)),
      'slug'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tires_product_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TiresProduct';
  }

  public function getFields()
  {
    return array(
      'uuid'          => 'Number',
      'name'          => 'Text',
      'uuid_category' => 'ForeignKey',
      'price'         => 'Number',
      'active'        => 'Boolean',
      'fotoname'      => 'Text',
      'slug'          => 'Text',
    );
  }
}
