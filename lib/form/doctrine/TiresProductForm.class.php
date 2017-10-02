<?php

/**
 * TiresProduct form.
 *
 * @package    tires
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 *
 * editSucces - >   <div id="sf_admin_content">
<?php include_partial('product/form'
 * ->
 *     <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit')
 * as $fieldset => $fields): ?>
<?php include_partial('product/form_fieldset', array('tiresproduct' => $tiresproduct, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
<?php endforeach; ?> ->
 *
 *
 *   <?php foreach ($fields as $name => $field): ?>
<?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
<?php include_partial('product/form_field', array(
'name'       => $name,
'attributes' => $field->getConfig('attributes', array()),
'label'      => $field->getConfig('label'),
'help'       => $field->getConfig('help'),
'form'       => $form,
'field'      => $field,
'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name,
)) ?>
<?php endforeach; ?>

 *
 *
 *
 *

 */
class TiresProductForm extends BaseTiresProductForm
{
//    public function configure()
//    {
//        $subForm = new sfForm();
//        for ($i = 0; $i < 2; $i++)
//        {
//            $productPhoto = new ProductPhoto();
//            $productPhoto->Product = $this->getObject();
//
//            $form = new ProductPhotoForm($productPhoto);
//
//            $subForm->embedForm($i, $form);
//        }
//        $this->embedForm('newPhotos', $subForm);
//    }
    public function configure()
    {

        unset(
            $this['slug']
        );
//        parent::configure();

//        $subForm = new sfForm();


        $this->setWidget('fotoname', new sfWidgetFormInputFileEditable(array(
            'file_src'  => '/uploads/products/'.$this->getObject()->getfotoname(),
            'is_image' => true,
            'with_delete' => false, //(boolean) $this->getObject()->getFile(),
            'edit_mode' => !$this->isNew() && $this->getObject()->getFotoName(),
        ))
        );

//        $this->setWidget('uuid_category',  new sfWidgetFormInput());
//        $this->setValidator('uuid_category', new sfValidatorString());

        $this->setValidator('fotoname', new sfValidatorFile(array(
            'mime_types' => 'web_images',
            'required' => false,
            'path'       => sfConfig::get('sf_upload_dir').'/products',
        )));
        $this->setValidator('fotoname_delete', new sfValidatorBoolean());
        $valueattrs=$this->getObject()->getTiresValuesets();

        $coll = $valueattrs->count();

        $go = new Goodest();
//        $go->setGoodTree();
        $go->setGoodCharname();

        $promts=$go->getGoodCharname();
        $cat=$this->getObject()->uuid_category;
//        (x > y? 'Passed the test' : 'Failed the test')
        if ($cat==0) {
            $cat=1;
        }

        $promt_categs=$promts[$cat];


        foreach ($valueattrs as $key => $valueattr ) {
//        foreach ($promt_categs as $key => $promt_categ ) {
          $link = new TiresValuesetShortForm($valueattrs[$key]);
           unset(
               $this['product_uuid']
               ,$link['attributes_uuid']
           );
            $this->embedForm($valueattrs[$key]->getTiresAttribute() ,$link );

       }

    }
}
