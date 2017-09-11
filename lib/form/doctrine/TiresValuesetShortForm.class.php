<?php
//    lib/form/doctrine/TiresValuesetShortForm.class.php:2
/**
 * TiresValueset form.
 *
 * @package    tires
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TiresValuesetShortForm extends TiresValuesetForm
{
    public function setup()
    {
        unset(
             $this['uuid']
//            ,$this['attributes_uuid']
        );

        parent::setup();
//        $this->widgetSchema->setLabels(array(
////               'attributes_uuid'    => 'Name',
//            'value'      => ''));

        $this->setWidgets(array(
//            'label' => false,
//            'uuid' => new sfWidgetFormInputHidden(),
//            'attributes_uuid' => new sfWidgetFormInput(),
            'value' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(

//            'uuid' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('uuid')), 'empty_value' => $this->getObject()->get('uuid'), 'required' => false)),
//            'attributes_uuid' => new sfValidatorString(),
            'value' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
        ));
    }
}
