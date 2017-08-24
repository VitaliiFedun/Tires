
<?php //slot('sf_admin.current_header') ?>
<td >
  <?php if ('fotoname' == $sort[0]): ?>
    <?php echo link_to('Foto', '@tires_product', array('query_string' => 'sort=fotoname&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png',
          array('alt' => $sort[1], 'title' => $sort[1])) ?>
  <?php else: ?>
    <?php echo link_to('Foto', '@tires_product', array('query_string' => 'sort=fotoname&sort_type=asc')) ?>
  <?php endif; ?>
</td>
<?php //end_slot(); ?>
<?php //include_slot('sf_admin.current_header') ?><!----><?php //slot('sf_admin.current_header') ?>
<td >
  <?php if ('name' == $sort[0]): ?>
    <?php echo link_to('Name', '@tires_product', array('query_string' => 'sort=name&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png',
          array('alt' => $sort[1], 'title' => $sort[1])) ?>
  <?php else: ?>
    <?php echo link_to('Name', '@tires_product', array('query_string' => 'sort=name&sort_type=asc')) ?>
  <?php endif; ?>
</td>
<?php //end_slot(); ?>
<?php //include_slot('sf_admin.current_header') ?><!----><?php //slot('sf_admin.current_header') ?>
    <td>
        <?php echo ('Category' ) ?>
    </td>
<?php //end_slot(); ?>

<?php //include_slot('sf_admin.current_header') ?><!----><?php //slot('sf_admin.current_header') ?>
<td >
  <?php if ('price' == $sort[0]): ?>
    <?php echo link_to('Price', '@tires_product', array('query_string' => 'sort=price&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png',
          array('alt' => $sort[1],  'title' => $sort[1])) ?>
  <?php else: ?>
    <?php echo link_to('Price' , '@tires_product', array('query_string' => 'sort=price&sort_type=asc')) ?>
  <?php endif; ?>
</td>
<?php //end_slot(); ?>
<?php //include_slot('sf_admin.current_header') ?>


