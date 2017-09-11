<td colspan="4">
  <?php echo __('%%uuid%% - %%products_uuid%% - %%attributes_uuid%% - %%value%%', array('%%uuid%%' => link_to($tiresvalueset->getuuid(), 'tires_valueset_valueset_edit', $tiresvalueset), '%%products_uuid%%' => $tiresvalueset->getproducts_uuid(), '%%attributes_uuid%%' => $tiresvalueset->getattributes_uuid(), '%%value%%' => $tiresvalueset->getvalue()), 'messages') ?>
</td>
