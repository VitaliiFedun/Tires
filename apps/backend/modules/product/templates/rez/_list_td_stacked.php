<td colspan="5">
  <?php echo __('%%fotoname%% - %%name%% - %%price%% - %%category%% - %%active%%', array('%%fotoname%%' => $tiresproduct->getfotoname(), '%%name%%' => link_to($tiresproduct->getname(), 'tires_product_edit', $tiresproduct), '%%price%%' => $tiresproduct->getprice(), '%%category%%' => $tiresproduct->getcategory(), '%%active%%' => get_partial('product/list_field_boolean', array('value' => $tiresproduct->getactive()))), 'messages') ?>
</td>
