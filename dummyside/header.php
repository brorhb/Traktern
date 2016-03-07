<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <title>Traktern</title>
    </head>


    <body <?php body_class(); ?> >
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <header id="masthead" class="site-header" role="banner">
                        <div class="header-main">
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                rel="home"><img src="../images/logo1.png"></a></h1>
                        </div>
                    </header>
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu' => 'Primary Menu',
                            'container' => false,
                            'fallback_cb' => 'temanavn',
                            'items_wrap' => '<ul class="nav navbar-nav navbar-right"%3$s</ul>'
                        ));
                     ?>
                </div>
            </nav>
