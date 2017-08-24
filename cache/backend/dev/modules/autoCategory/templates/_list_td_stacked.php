<td colspan="4">
  <?php echo __('%%fotoname%% - %%name%% - %%page_products_count%% - %%active%%', array('%%fotoname%%' => $tirescategory->getfotoname(), '%%name%%' => link_to($tirescategory->getname(), 'tires_category_edit', $tirescategory), '%%page_products_count%%' => $tirescategory->getpage_products_count(), '%%active%%' => $tirescategory->getactive()), 'messages') ?>
</td>
