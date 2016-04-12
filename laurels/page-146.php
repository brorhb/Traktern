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
            <div id="post-<?php the_ID(); ?>" <?php post_class("col-md-12 col-sm-12 blog-page"); ?>>
              <?php while ( have_posts() ) : the_post(); ?>
              <?php $laurels_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
                        <div class="blog col-md-12">
                                <div class="blog-content col-md-4 loginform">
                                    <?php the_content();
        									wp_link_pages( array(
        										'before' => '<div class="page-links">' . __( 'Pages:', 'besty' ),
        										'after' => '</div>',
        									) ); ?>
                                </div>
                            </div>
                        </div>
                  <?php endwhile; ?>
                        <div class="comments">
        					 <?php comments_template( '', true ); ?>
                        </div>
                    </div>
        </div>
    </div>
             <!-- get_sidebar(); -->


</section>
<?php get_footer(); ?>
