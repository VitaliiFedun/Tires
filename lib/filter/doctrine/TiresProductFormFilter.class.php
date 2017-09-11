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
      parent::configure();
      unset(
          $this['slug'],
          $this['fotoname']
            ,$this['attributes_uuid']
      );

      $this->widgetSchema    ['pricefrom'] = new sfWidgetFormFilterInput();
      $this->validatorSchema ['pricefrom'] = new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false)));
      $this->widgetSchema    ['priceto'] = new sfWidgetFormFilterInput();
      $this->validatorSchema ['priceto'] = new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false)));

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

        return $fields;
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
