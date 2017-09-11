<!-- apps/backend/templates/layout.php-->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Tires Admin Interface</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php use_stylesheet('admin.css') ?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
</head>
<body>
<div id="container">
    <div id="header">
        <h1>
            <a href="<?php echo url_for('/shop') ?>">
                <img src="/legacy/images/logo.jpg" alt="Tired Admin Board" />
            </a>
        </h1>
    </div>

    <div id="menu">
        <ul>
            <li>
                <?php echo link_to('Product', '/backend_dev.php/product') ?>
            </li>
            <li>
                <?php echo link_to('Categories', '/backend_dev.php/category') ?>
            </li>
            <li>
                <?php echo link_to('Attribute', '/backend_dev.php/attribute') ?>
            </li>
            <li>
                <?php echo link_to('! ValueSet !', '/backend_dev.php/valueset') ?>
            </li>


        </ul>
    </div>

    <div id="content">
        <?php echo $sf_content ?>
    </div>

    <div id="footer">
        <div class="content">
          <span class="symfony">
            <img src="/legacy/images/jobeet-mini.png" />
            powered by <a href="/">
            <img src="/legacy/images/symfony.gif" alt="symfony framework" /></a>
          </span>
            <ul>
                <li><a href="">About DiscoProduct</a></li>
                <li class="feed"><a href="">Full feed</a></li>
                <li><a href="">DiscoProduct API</a></li>
                <li class="last"><a href="">Affiliates</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>