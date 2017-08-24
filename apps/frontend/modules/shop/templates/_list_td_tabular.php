<td>
    <a href="<?php echo url_for('shop/show?uuid='.$tiresproduct->getUuid()) ?>">
        <img
                width="30" height="30"
                src=    <?php echo '/uploads/products/'.$tiresproduct->getFotoname() ?>
                alt=<?php echo $tiresproduct->getName() ?>

    </a>
</td>
<td>
    <a href="<?php echo url_for('shop/show?uuid='.$tiresproduct->getUuid()) ?>">
        <?php echo $tiresproduct->getName() ?>
    </a>
</td>
<td><?php echo $tiresproduct-> getTiresCategory()  ?></td>
<td><?php echo $tiresproduct->getPrice() ?></td>

