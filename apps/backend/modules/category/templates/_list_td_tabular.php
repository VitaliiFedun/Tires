<td class="sf_admin_text sf_admin_list_td_fotoname">

    <a >
        <img
                width="30" height="30"
                src=    <?php echo '/uploads/products/'.$tirescategory->getfotoname() ?>
                alt=<?php echo $tirescategory->getName() ?>

    </a>


</td>
<td class="sf_admin_text sf_admin_list_td_name">
    <?php echo link_to($tirescategory->getname(), 'tires_category_edit', $tirescategory) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
    <?php echo link_to($tirescategory->getpage_products_count(), 'tires_category_edit', $tirescategory) ?>
</td>

<td class="sf_admin_boolean sf_admin_list_td_active">
    <?php echo get_partial('category/list_field_boolean', array('value' => $tirescategory->getactive())) ?>
</td>