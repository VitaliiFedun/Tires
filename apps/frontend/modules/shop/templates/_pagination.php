<?php
/**
 * Created by PhpStorm.
 * User: 2
 * Date: 05.08.2017
 * Time: 10:49
 */
?>


<?php if ($pager->haveToPaginate()): ?>
    <div class="pagination">
        <a href="<?php echo url_for('shop/index') ?>?page=1">
            <img src="/legacy/images/first.png" alt="First page" title="First page" />
        </a>

        <a href="<?php echo url_for('shop/index' ) ?>?page=<?php echo $pager->getPreviousPage() ?>">
            <img src="/legacy/images/previous.png" alt="Previous page" title="Previous page" />
        </a>

        <?php foreach ($pager->getLinks() as $page): ?>
            <?php if ($page == $pager->getPage()): ?>
                <?php echo $page ?>
            <?php else: ?>
                <a href="<?php echo url_for('shop/index') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
            <?php endif; ?>
        <?php endforeach; ?>

        <a href="<?php echo url_for('shop/index') ?>?page=<?php echo $pager->getNextPage() ?>">
            <img src="/legacy/images/next.png" alt="Next page" title="Next page" />
        </a>

        <a href="<?php echo url_for('shop/index') ?>?page=<?php echo $pager->getLastPage() ?>">
            <img src="/legacy/images/last.png" alt="Last page" title="Last page" />
        </a>
    </div>
<?php endif; ?>

<div class="pagination_desc">
    <strong><?php echo count($pager) ?></strong> Products in this category

    <?php if ($pager->haveToPaginate()): ?>
        - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
    <?php endif; ?>
</div>
