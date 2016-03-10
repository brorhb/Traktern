<?php
/*
 * Page Template File.
 */
get_header(); ?>
<section>
    <div class="laurels_menu_bg">
    	<div class="webpage-container container">
        	<div class="laurels_menu">
            <div class="col-sm-4 col-md-4">
                <?php
                    $args = array(
                    'posts_per_page' => 1,
                    'cat' => '4',
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
            <div class="breadcrumb site-breadcumb">
				<?php if (function_exists('laurels_custom_breadcrumbs')) laurels_custom_breadcrumbs(); ?>
            </div>
            </div>
    	</div>
    </div>
    <div class="pattern2">
        <div class="container webpage-container">
        	<article class="blog-article">



    	<div id="post-<?php the_ID(); ?>" <?php post_class("col-md-9 col-sm-8 blog-page"); ?>>
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


<!-- TRE SISTE POSTER -->
<!-- TRE SISTE POSTER -->
<div class="ramme">
    <div class="webpage-container container">
            <?php
            $custom_query = new WP_Query(array(
                'posts_per_page'    => 3,
                'category_name'     => 'Nyheter',
                'paged'             => 1,
            )); ?>

            <?php
            if ($custom_query->have_posts()) :
                while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                    <div class="col-md-4">
            <!-- NEWS TITLE -->
                        <div class="news-single-title">
                            <h2><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h2>
                        </div>
                        <div class="indre_ramme">
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn-default pull-right" role="button">Les mer</a>
                        </br>
                            <hr class="visible-xs visible-sm">
                        </div>
                        </div>
                <?php
                endwhile;
            else :
                for ($i = 0; $i < 3; $i++) :
                    echo '<div class="news-single" style="height: 250px;"><p>Det er for øyeblikket ingen nyheter</p></div>';
                endfor;
            endif;

            wp_reset_postdata(); ?>
    </div>
</div>
<!-- TRE SISTE POSTER -->
<!-- TRE SISTE POSTER -->


</section>
<?php get_footer(); ?>
