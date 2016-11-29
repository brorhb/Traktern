<?php
/*
 * Header For Laurels Theme.
 */
$laurels_options = get_option('laurels_theme_options');
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
  <!--<![endif]-->
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <?php if (!empty($laurels_options['favicon'])) { ?>
      <link rel="shortcut icon" href="<?php echo esc_url($laurels_options['favicon']); ?>">
    <?php } ?>
    <?php wp_head(); ?>

    <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
        <script type="text/javascript">
            window.cookieconsent_options = {"message":"Denne nettsiden bruker cookies for å lage den beste opplevelsen for deg","dismiss":"Greit","learnMore":"Mer info","link":"https://www.datatilsynet.no/Teknologi/Internett/cookies/","theme":"dark-bottom"};
        </script>

        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js"></script>
    <!-- End Cookie Consent plugin -->





  </head>
  <body <?php body_class(); ?>>

      <!-- FACEBOOK APP SDK -->
      <!-- FACEBOOK APP SDK -->
      <script>
            window.fbAsyncInit = function() {
              FB.init({
                appId      : '1581645758814121',
                xfbml      : true,
                version    : 'v2.5'
              });
            };

            (function(d, s, id){
               var js, fjs = d.getElementsByTagName(s)[0];
               if (d.getElementById(id)) {return;}
               js = d.createElement(s); js.id = id;
               js.src = "//connect.facebook.net/en_US/sdk.js";
               fjs.parentNode.insertBefore(js, fjs);
             }(document, 'script', 'facebook-jssdk'));
        </script>
        <!-- FACEBOOK APP SDK -->
        <!-- FACEBOOK APP SDK -->


    <header>
      <div class="header_top hidden-xs hidden-sm">
        <div class="container webpage-container">
          <div class="col-md-12 no-padding top-header">
            <div class="col-md-7 col-sm-5"></div>
            <div class="col-md-3 col-sm-4">
              <ul class="list-inline logo_div">
                <?php if (!empty($laurels_options['facebook'])) { ?>
                  <li ><a href="<?php echo esc_url($laurels_options['facebook']); ?>"><i class="fa fa-facebook"></i> </a></li>
                <?php } ?>
                <?php if (!empty($laurels_options['twitter'])) { ?>
                  <li ><a href="<?php echo esc_url($laurels_options['twitter']); ?>"> <i class="fa fa-twitter"></i> </a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container webpage-container">
          <div class="col-md-12 no-padding ">
            <div class="header_menu">
              <div class="col-sm-2 col-md-2 logo-display  no-padding">
                <?php if (empty($laurels_options['logo'])) { ?>
                  <h1 class="laurels-site-name"><a href="<?php echo esc_url(site_url()); ?>"><?php echo get_bloginfo('name'); ?></a></h1>
                <?php } else { ?>
                  <a href="<?php echo site_url(); ?>"><img src="<?php echo esc_url($laurels_options['logo']); ?>" alt="Theme Logo" class="img-responsive logo" /></a>
                <?php } ?>
              </div>
              <div class="col-sm-10 col-md-10 no-padding">
                <nav class="navbar-default main_menu navigation-deafault" role="navigation">
                  <div class="navbar-header res-nav-header toggle-respon">
                    <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="sr-only"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  </div>
                  <?php
                  $laurels_defaults = array(
                      'theme_location' => 'primary',
                      'container' => 'div',
                      'container_class' => 'collapse navbar-collapse nav_coll main-menu-ul no-padding',
                      'container_id' => '',
                      'menu_class' => 'collapse navbar-collapse nav_coll main-menu-ul no-padding',
                      'menu_id' => '',
                      'echo' => true,
                      'fallback_cb' => 'wp_page_menu',
                      'before' => '',
                      'after' => '',
                      'link_before' => '',
                      'link_after' => '',
                      'items_wrap' => '<ul>%3$s</ul>',
                      'depth' => 0,
                      'walker' => ''
                  );
                  wp_nav_menu($laurels_defaults);
                  ?>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
