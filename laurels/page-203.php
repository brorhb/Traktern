<?php
/*
 * Page Template File.
 */
get_header(); ?>
<section>
    <div class="mapbg">
    	<div class="webpage-container container">
        	<div class="laurels_menu">
            <div class="col-sm-4 col-md-4">
                <?php
                    $args = array(
                    'posts_per_page' => 1,
                    'cat' => '24',
                    );
                    $the_query = new WP_Query( $args );

                    if ( $the_query->have_posts() ) {
                         echo '<div>';
                     while ( $the_query->have_posts() ) {
                         $the_query->the_post();
                                 get_the_post_thumbnail();
                         echo '<h1>'  . get_the_title() . '</h1>';
                                 echo  get_the_content('Les mer');
                     }
                         echo '</div>';
                    } else {
                     // no posts found
                    }

                    wp_reset_postdata();
                    ?>
            </div>

            </div>
    	</div>
    </div>
    
    <!-- kollonne 2 -->
    <div class="pattern2">
        <div class="container webpage-container">
            <div class="col-md-4 text-center">
                <div class="kaffe hidden-sm hidden-xs"><img src="http://136147-www.web.tornado-node.net/wp-content/themes/laurels/images/kaffe.png" alt="kaffekopp">
                </div>
            </div>
            <div class="col-md-6 pull-right" style="margin-top:16px; color:white;">
                <?php
                    $args = array(
                    'posts_per_page' => 1,
                    'cat' => '26',
                    );
                    $the_query = new WP_Query( $args );

                    if ( $the_query->have_posts() ) {
                         echo '<div>';
                     while ( $the_query->have_posts() ) {
                         $the_query->the_post();
                                 get_the_post_thumbnail();
                         echo '<h1>'  . get_the_title() . '</h1>';
                                 echo  get_the_content('Les mer');
                     }
                         echo '</div>';
                    } else {
                     // no posts found
                    }

                    wp_reset_postdata();
                    ?>
            </div>
        </div>
    </div>
    <!-- kollonne 2 -->
    <div class="coffee_bg_liten">
    	<div class="webpage-container container">
        	<div class="laurels_menu">
            <div class="col-sm-4 col-md-4">
                <?php
                    $args = array(
                    'posts_per_page' => 1,
                    'cat' => '27',
                    );
                    $the_query = new WP_Query( $args );

                    if ( $the_query->have_posts() ) {
                         echo '<div>';
                     while ( $the_query->have_posts() ) {
                         $the_query->the_post();
                                 get_the_post_thumbnail();
                         echo '<h1>'  . get_the_title() . '</h1>';
                                 echo  get_the_content('Les mer');
                     }
                         echo '</div>';
                    } else {
                     // no posts found
                    }

                    wp_reset_postdata();
                    ?>
            </div>

            </div>
    	</div>
    </div>
    
    <div class="pattern2">
        <div class="container webpage-container">
            <div class="col-md-4 text-center">
                <div class="kaffe hidden-sm hidden-xs"><img src="http://136147-www.web.tornado-node.net/wp-content/themes/laurels/images/kaffe.png" alt="kaffekopp">
                </div>
            </div>
            <div class="col-md-6 pull-right" style="margin-top:16px; color:white;">
                <?php
                    $args = array(
                    'posts_per_page' => 1,
                    'cat' => '28',
                    );
                    $the_query = new WP_Query( $args );

                    if ( $the_query->have_posts() ) {
                         echo '<div>';
                     while ( $the_query->have_posts() ) {
                         $the_query->the_post();
                                 get_the_post_thumbnail();
                         echo '<h1>'  . get_the_title() . '</h1>';
                                 echo  get_the_content('Les mer');
                     }
                         echo '</div>';
                    } else {
                     // no posts found
                    }

                    wp_reset_postdata();
                    ?>
            </div>
        </div>
    </div>
    
    
             <!-- get_sidebar(); -->


</section>
<?php get_footer(); ?>
