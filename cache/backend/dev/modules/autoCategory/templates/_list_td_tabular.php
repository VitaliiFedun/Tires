<td class="sf_admin_text sf_admin_list_td_fotoname">
  <?php echo $tirescategory->getfotoname() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($tirescategory->getname(), 'tires_category_edit', $tirescategory) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_page_products_count">
  <?php echo $tirescategory->getpage_products_count() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_active">
  <?php echo get_partial('category/list_field_boolean', array('value' => $tirescategory->getactive())) ?>
</td>
