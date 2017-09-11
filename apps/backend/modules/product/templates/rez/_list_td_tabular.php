<td class="sf_admin_text sf_admin_list_td_fotoname">
  <?php echo $tiresproduct->getfotoname() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($tiresproduct->getname(), 'tires_product_edit', $tiresproduct) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_price">
  <?php echo $tiresproduct->getprice() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_category">
  <?php echo $tiresproduct->getcategory() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_active">
  <?php echo get_partial('product/list_field_boolean', array('value' => $tiresproduct->getactive())) ?>
</td>
