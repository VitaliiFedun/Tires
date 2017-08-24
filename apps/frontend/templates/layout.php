<!-- apps/frontend/templates/layout.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title><?php include_slot('title','Tires $ Wheel  - The best for your!') ?></title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php use_javascript('jquery-3.2.1.js') ?>
    <?php use_javascript('search.js') ?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
</head>
<body>
    <header>
        <div class="blocheader logo" >
            <h1>
                <a href="<?php echo url_for('@homepage') ?>">
                    <img src="/legacy/images/logo.jpg" alt="Tires Board" />
                </a>
            </h1>

        </div>
        <div class="blocheader" >
            <?php include_partial('shop/worktime') ?>
        </div>
        <div class="blocheader" >
            <?php include_partial('shop/inform') ?>
        </div>
        <div class="blocheader last" >
            <?php include_partial('shop/search') ?>
        </div>
    </header>
    <nav>
        <div class="nav left">
            <div id="header-menu">
                <a class="btn" href="#"><span>Delivery</span></a>
                <a class="btn" href="#"><span>Payment</span></a>
                <a class="btn" href="#">
                    <span>Information for you</span></a>
                <a class="btn" href="#">
                    <span>Service centers and vendors</span></a>
            </div>
        </div>
        <div class="nav right">
            <div id="header-menu">
                <a class="btn" href="#"><span>Contacts</span></a>
                <a class="btn" href="#"><span>About</span></a>
                <a class="btn" href="#"><span>Log on</span></a>

            </div>
        </div>
    </nav>
    <div id="content">
        <?php if ($sf_user->hasFlash('notice')): ?>
            <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
        <?php endif; ?>

        <?php if ($sf_user->hasFlash('error')): ?>
            <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
        <?php endif; ?>

        <div id="job_history">
            Recent viewed products:
            <ul>
                <?php foreach ($sf_user->getProductHistory() as $prods): ?>
                    <li>
                        <?php echo link_to($prods->getUuid().' - '.$prods->getName(), 'shop/show?uuid='.$prods->getUuid()) ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <div id="wrapper">
      <aside>
          <?php include_slot('aside','Googs Filter') ?>
	</aside>
      <section>
        <div class="content">
            <?php echo $sf_content ?>
        </div>

    </section>
    </div>
    <footer>
        <div class="content">
            <ul>
                <li><a href="">About Tires Product</a></li>
                <li class="feed"><a href="">Full feed</a></li>
                <li><a href="">Tires Product API</a></li>
                <li class="last"><a href="">Partners</a></li>
            </ul>
        </div>
  </footer>

	
</body>
	

</html>