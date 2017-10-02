<?php use_stylesheet('jobs.css') ?>
<?php //use_stylesheet('styles.css') ?>

<?php include_partial('shop/aside', array('tirescategory' => $tirescategory,'filters'=>$filters, 'configuration' => $configuration)) ?>

<!--<div id="sf_admin_bar ">-->
<!--    --><?php //include_partial('shop/filters', array('form' => $filters, 'configuration' => $configuration))) ?>
<!--</div>-->

<?php //echo $filter ?>
<h1>Tires Products List</h1>
    <?php include_partial('shop/table', array('tiresproducts' => $pager->getResults(),'sort' => $sort)) ?>
<h1> </h1>
    <?php include_partial('shop/pagination', array('pager' => $pager )) ?>
<?php echo "<script>initslider($maxprice);</script>";  //здесь ошибка отсутствует  InitSlider($this->maxprice);
    ?>