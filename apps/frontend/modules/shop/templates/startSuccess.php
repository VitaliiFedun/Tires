<?php use_stylesheet('jobs.css') ?>
<?php use_stylesheet('roy.css') ?>
<?php use_stylesheet('styles.css') ?>
<?php slot('title',"Tires & Wheel - Start page" ) ?>
<style type="text/css">
    aside {
        display: none;
    }
    section {
        height: 52em;
    }
</style>

<h1>Select category</h1>

<div id="disco">
    <div class="container showcase">

        <div class="boxcontainer">

            <!--foreach start-->
            <?php foreach ($tirescategories as $i => $tirescategories): ?>

                <div class="article-box" >

                    <div class="featured-image">
                        <a href="<?php echo url_for(array(
                            'module'   => 'shop',
                            'action'   => 'index',
                            'categ'       => $tirescategories->getUuid()
                        ))
                         ?>" >
										
                         <img  width="150" height="200" title=
                         <?php echo '"'.$tirescategories->getname().'"' ?>

                         src=  <?php echo '/uploads/products/'.$tirescategories->getFotoname() ?>
                                alt=    <?php echo '"'.$tirescategories->getname().'"' ?> >

                        </a>
                        <h2><?php echo $tirescategories->getName() ?>  </h2>
                    </div>
                </div>

            <?php  endforeach; ?>
			<!--foreach end -->
        </div>

    </div>
  
</div>
