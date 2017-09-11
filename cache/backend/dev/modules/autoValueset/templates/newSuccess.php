<?php use_helper('I18N', 'Date') ?>
<?php include_partial('valueset/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Valueset', array(), 'messages') ?></h1>

  <?php include_partial('valueset/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('valueset/form_header', array('tiresvalueset' => $tiresvalueset, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('valueset/form', array('tiresvalueset' => $tiresvalueset, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('valueset/form_footer', array('tiresvalueset' => $tiresvalueset, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
