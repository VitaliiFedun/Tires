
<div id="disco">
<table class="disco">
    <tr class="<?php echo fmod(1, 2) ? 'even' : 'odd' ?>">
        <?php include_partial('shop/list_header', array('sort' => $sort)) ?>
    </tr>
    <?php foreach ($tiresproducts as $i => $tiresproduct): ?>
        <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
            <?php include_partial('shop/list_td_tabular', array('tiresproduct' => $tiresproduct)) ?>

        </tr>
    <?php endforeach; ?>

</table>
</div>