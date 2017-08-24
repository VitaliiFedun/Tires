<td colspan="4">
  <?php echo __('%%Uuid%% - %%name%% - %%uuid_category%% - %%multiple_choice%%', array('%%Uuid%%' => $tiresattribute->getUuid(), '%%name%%' => link_to($tiresattribute->getname(), 'tires_attribute_edit', $tiresattribute), '%%uuid_category%%' => $tiresattribute->getuuid_category(), '%%multiple_choice%%' => get_partial('attribute/list_field_boolean', array('value' => $tiresattribute->getmultiple_choice()))), 'messages') ?>
</td>
