<?php

/**
 * TiresCategory form.
 *
 * @package    tires
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TiresCategoryForm extends BaseTiresCategoryForm
{
    public function configure()
    {

        parent::configure();

        $this->setWidget('fotoname', new sfWidgetFormInputFileEditable(array(
            'file_src'  => '/uploads/products/'.$this->getObject()->getfotoname(),
            'is_image' => true,
            'with_delete' => false, //(boolean) $this->getObject()->getFile(),
            'edit_mode' => !$this->isNew() && $this->getObject()->getFotoName(),
        )));
        $this->setValidator('fotoname', new sfValidatorFile(array(
            'mime_types' => 'web_images',
            'required' => false,
            'path'       => sfConfig::get('sf_upload_dir').'/products',
        )));
        $this->setValidator('fotoname_delete', new sfValidatorBoolean());


    }
}
