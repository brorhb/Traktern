<?php
/*
 * Page Template File.
 */
get_header(); ?>
<section>
    <div class="coffee_bg">
    	<div class="webpage-container container">
        	<div class="laurels_menu">
            <div class="col-sm-4 col-md-4">
                <?php
                    $args = array(
                    'posts_per_page' => 1,
                    'cat' => '5',
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
        	<article class="blog-article">

        <div class="col-md-3 hidden-xs">
            <img src="http://136147-www.web.tornado-node.net/wp-content/themes/laurels/images/kaffe.png" alt="kaffekopp">
        </div>

    	<div id="post-<?php the_ID(); ?>" <?php post_class("col-md-6 col-sm-8 col-md-offset-3 blog-page"); ?>>
          <?php while ( have_posts() ) : the_post(); ?>
          <?php $laurels_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
                    <div class="blog">

                        <div class="blog-data">
                            </div>
                            <div class="blog-info">
                            </div>

                            <div class="blog-rightsidebar-img">
    					<?php if(!empty($laurels_image)) { ?><img src="<?php echo esc_url($laurels_image); ?>" class="img-responsive" alt="<?php the_title(); ?>" /><?php } ?>
                        </div>

                            <div class="blog-content">
                                <?php the_content();
    									wp_link_pages( array(
    										'before' => '<div class="page-links">' . __( 'Pages:', 'besty' ),
    										'after' => '</div>',
    									) ); ?>
                            </div>
                            <a href="http://136147-www.web.tornado-node.net/quiz/index.php" class="btn btn-default pull-right" role="button">Lær mer</a>
                        </div>
        </div>
        <div class="col-md-3 visible-md-*">
            <div class="kaffe"></div>
        </div>
              <?php endwhile; ?>
                    <div class="comments">
    					 <?php comments_template( '', true ); ?>
                    </div>
        </div>
    </div>
             <!-- get_sidebar(); -->
    	</article>


</section>
<?php get_footer(); ?>
