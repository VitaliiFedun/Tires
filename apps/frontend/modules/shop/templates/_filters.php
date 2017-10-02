<!--apps/frontend/modules/shop/templates/_filters.php:13-->
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_filter">
  <?php if ($form->hasGlobalErrors()): ?>
    <?php echo $form->renderGlobalErrors() ?>
  <?php endif; ?>

  <form action="<?php echo
//  url_for('tires_product', array('action' => 'filter'))
  url_for(array(
      'module'   => 'shop',
      'action'   => 'filter'

//      ,'query' => '_reset'
  ))
  ?>" method="post">
    <table cellspacing="0">
      <tfoot>
       </tr>
      </tfoot>
      <tbody>
        <?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?>
        <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
          <?php include_partial('shop/filters_field', array(
            'name'       => $name,
            'attributes' => $field->getConfig('attributes', array()),
            'label'      => $field->getConfig('label'),
            'help'       => $field->getConfig('help'),
            'form'       => $form,
            'field'      => $field,
            'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_filter_field_'.$name,
          )) ?>
        <?php endforeach; ?>
      </tbody>
<!--    </table>-->
      <?php include_partial('shop/filters_end',
          array('form' => $form, /*filters,*/
              'configuration' => $configuration,
              'tirescategory' => $tirescategory))
      ?>

        <tr>
            <td colspan="2">
              <h2>&nbsp</h2>

            </td>
        </tr>

        <tr>

          <td colspan="2">
              <?php echo $form->renderHiddenFields() ?>
              <?php echo link_to('Reset', 'shop_filter', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?>
              <input type="submit" value="<?php echo 'Filter' ?>" />
          </td>
    </table>

  </form>
</div>
