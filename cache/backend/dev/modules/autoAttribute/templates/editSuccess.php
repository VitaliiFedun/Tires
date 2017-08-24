<?php use_helper('I18N', 'Date') ?>
<?php include_partial('attribute/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Attribute', array(), 'messages') ?></h1>

  <?php include_partial('attribute/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('attribute/form_header', array('tiresattribute' => $tiresattribute, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('attribute/form', array('tiresattribute' => $tiresattribute, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('attribute/form_footer', array('tiresattribute' => $tiresattribute, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
