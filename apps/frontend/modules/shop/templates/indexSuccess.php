<?php use_stylesheet('jobs.css') ?>
<?php use_stylesheet('styles.css') ?>

<?php include_partial('shop/aside', array('tirescategory' => $tirescategory)) ?>


<h1>Tires Products List</h1>
    <?php include_partial('shop/table', array('tiresproducts' => $pager->getResults(),'sort' => $sort)) ?>
<h1> </h1>
    <?php include_partial('shop/pagination', array('pager' => $pager )) ?>
