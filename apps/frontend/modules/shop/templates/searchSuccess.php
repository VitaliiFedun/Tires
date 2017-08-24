<?php
/**
 * Created by PhpStorm.
 * User: 2
 * Date: 07.08.2017
 * Time: 0:02
 */
?>
<?php use_stylesheet('jobs.css') ?>

<h1>Show Search Result</h1>

<!--<div id="disco">-->
<!--    --><?php //include_partial('shop/table', array('tiresproduct' => $tiresproduct)) ?>
<!--</div>-->

<?php include_partial('shop/table', array('tiresproducts' => $tiresproduct,'sort' => array(null,null))) ?>
<h1> </h1>
