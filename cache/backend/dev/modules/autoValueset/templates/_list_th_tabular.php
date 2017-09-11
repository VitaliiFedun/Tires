<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_uuid">
  <?php if ('uuid' == $sort[0]): ?>
    <?php echo link_to(__('Uuid', array(), 'messages'), '@tires_valueset_valueset', array('query_string' => 'sort=uuid&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Uuid', array(), 'messages'), '@tires_valueset_valueset', array('query_string' => 'sort=uuid&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_foreignkey sf_admin_list_th_products_uuid">
  <?php if ('products_uuid' == $sort[0]): ?>
    <?php echo link_to(__('Products uuid', array(), 'messages'), '@tires_valueset_valueset', array('query_string' => 'sort=products_uuid&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Products uuid', array(), 'messages'), '@tires_valueset_valueset', array('query_string' => 'sort=products_uuid&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_foreignkey sf_admin_list_th_attributes_uuid">
  <?php if ('attributes_uuid' == $sort[0]): ?>
    <?php echo link_to(__('Attributes uuid', array(), 'messages'), '@tires_valueset_valueset', array('query_string' => 'sort=attributes_uuid&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Attributes uuid', array(), 'messages'), '@tires_valueset_valueset', array('query_string' => 'sort=attributes_uuid&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_value">
  <?php if ('value' == $sort[0]): ?>
    <?php echo link_to(__('Value', array(), 'messages'), '@tires_valueset_valueset', array('query_string' => 'sort=value&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Value', array(), 'messages'), '@tires_valueset_valueset', array('query_string' => 'sort=value&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>