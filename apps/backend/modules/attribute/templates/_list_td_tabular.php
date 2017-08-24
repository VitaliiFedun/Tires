<td class="sf_admin_text sf_admin_list_td_Uuid">
  <?php echo $tiresattribute->getUuid() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($tiresattribute->getname(), 'tires_attribute_edit', $tiresattribute) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_uuid_category">
  <?php echo $tiresattribute->getuuid_category() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_multiple_choice">
  <?php echo get_partial('attribute/list_field_boolean', array('value' => $tiresattribute->getmultiple_choice())) ?>
</td>
