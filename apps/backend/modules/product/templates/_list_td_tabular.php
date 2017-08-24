<td class="sf_admin_text sf_admin_list_td_fotoname">

    <a >
        <img
                width="30" height="30"
                src=    <?php echo '/uploads/products/'.$tiresproduct->getfotoname() ?>
                alt=<?php echo $tiresproduct->getName() ?>

    </a>


</td>

<td class="sf_admin_text sf_admin_list_td_name">
    <?php echo link_to($tiresproduct->getname(), 'tires_product_edit', $tiresproduct) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_price">
    <?php echo $tiresproduct->getprice() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_uuid_category">
    <?php echo $tiresproduct->getTiresCategory() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_active">
    <?php echo get_partial('product/list_field_boolean', array('value' => $tiresproduct->getactive())) ?>
</td>