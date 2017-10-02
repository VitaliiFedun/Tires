<?php

/**
 * TiresProduct filter form.
 *
 * @package    tires
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TiresProductFormFilter extends BaseTiresProductFormFilter
{
  public function configure()
  {

      $this->widgetSchema    ['pricefrom'] = new sfWidgetFormInputHidden();
      $this->widgetSchema    ['priceto'] = new   sfWidgetFormFilterInput(array('with_empty' => false));
      $this->validatorSchema ['pricefrom'] = new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false)));
      $this->validatorSchema ['priceto'] = new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false, )));

      for ($i=1;$i<=5;$i++){
      $name_fild='fildfilter'.$i;

      $this->widgetSchema [$name_fild] = new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no')));

      $this->validatorSchema [$name_fild] = new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0)));

  }

//
//      {
//          $this->setWidgets(array(
//              'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
//              'uuid_category' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TiresCategory'), 'add_empty' => true)),
//              'price'         => new sfWidgetFormFilterInput(),
//              'active'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
//              'fotoname'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
//              'slug'          => new sfWidgetFormFilterInput(),
//          ));
//
//          $this->setValidators(array(
//              'name'          => new sfValidatorPass(array('required' => false)),
//              'uuid_category' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TiresCategory'), 'column' => 'uuid')),
//              'price'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
//              'active'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
//              'fotoname'      => new sfValidatorPass(array('required' => false)),
//              'slug'          => new sfValidatorPass(array('required' => false)),
//          ));

          parent::configure();
      unset(
          $this['slug']
          ,$this['fotoname']
          ,$this['attributes_uuid']
          ,$this['price']
          ,$this['name']
          ,$this['active']
          ,$this['uuid_category']
//          ,$this['pricefrom']
//          ,$this['priceto']

      );

  }

  //    public function configure()
//    {
//        $this->widgetSchema['is_suspended'] = new sfWidgetFormChoice(array(
//            'choices' => array(
//                ''  => 'yes or no',
//                1   => 'yes',
//                0   => 'no'),
//        ));
//        $this->validatorSchema['is_suspended'] = new sfValidatorChoice(array(
//            'required'      => false,
//            'choices'       => array('', 1, 0),
//        ));
//    }

    public function getFields() {
        $fields = parent::getFields();
        $fields['pricefrom'] = 'pricefrom';
        $fields['priceto'] = 'priceto';

        $fields['fild_filter1'] = 'fild_filter1';
        $fields['fild_filter2'] = 'fild_filter2';
        $fields['fild_filter3'] = 'fild_filter3';
        $fields['fild_filter4'] = 'fild_filter4';
        $fields['fild_filter5'] = 'fild_filter5';

        return $fields;
    }


    public function addFild_filter1ColumnQuery($query, $field, $value)
    {
//        Doctrine::getTable($this->getModelName())->applyPricedFilter($query, $value,1);
    }


    public function addPricefromColumnQuery($query, $field, $value)
    {
        Doctrine::getTable($this->getModelName())->applyPricedFilter($query, $value,1);


    }
    public function addPricetoColumnQuery($query, $field, $value)
    {
        Doctrine::getTable($this->getModelName())->applyPricedFilter($query, $value,2);

    }

}
