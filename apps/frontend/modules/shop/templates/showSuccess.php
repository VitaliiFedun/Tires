<?php use_stylesheet('jobs.css') ?>
<?php //use_stylesheet('styles.css') ?>

<?php use_helper('Text') ?>

<?php //include_partial('shop/aside', array('tirescategory' => $tirescategory)) ?>
<?php //include_partial('shop/aside', array('tirescategory' => $tirescategory,'filters'=>$filter, 'configuration' => $configuration)) ?>


<h1>Show Tires Product</h1>

<div id="disco">
    <?php include_partial('shop/list', array('tiresproduct' => $tiresproduct)) ?>
</div>

<h1>Product Attribute </h1>

<div id="disco">
    <?php include_partial('shop/values', array('valuessets' => $tiresproduct->getTiresValuesets())) ?>
</div>

<div>

<a href="<?php echo url_for('shop/index') ?>">Back to List</a>


<a href="<?php echo
url_for(array(
    'module'   => 'shop',
    'action'   => 'Addtofavorite',
    'uuid'     => $tiresproduct->getuuid()
))
?>">
    <img src="/legacy/images/favorite/favorite-add.png" height="25" alt="Add to Favorite" />
</a>
<a href="<?php echo
url_for(array(
    'module'   => 'shop',
    'action'   => 'AddtoCart',
    'uuid'     => $tiresproduct->getuuid()
))
?>">

    <img src="/legacy/images/cart/add-to-cart-dark.png" height="25" alt="Add to Cart" />
</a>
<a href="<?php echo
url_for(array(
    'module'   => 'shop',
    'action'   => 'AddtoCompare',
    'uuid'     => $tiresproduct->getuuid()
))
?>">

    <img src="/legacy/images/compare/compare2.png" height="25" alt="Add to Compare" />
</a>
</div>
<?php //echo $TiresProductFormFilter ?>