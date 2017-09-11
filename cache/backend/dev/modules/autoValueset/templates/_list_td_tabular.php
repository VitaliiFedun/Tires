<td class="sf_admin_text sf_admin_list_td_uuid">
  <?php echo link_to($tiresvalueset->getuuid(), 'tires_valueset_valueset_edit', $tiresvalueset) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_products_uuid">
  <?php echo $tiresvalueset->getproducts_uuid() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_attributes_uuid">
  <?php echo $tiresvalueset->getattributes_uuid() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_value">
  <?php echo $tiresvalueset->getvalue() ?>
</td>
