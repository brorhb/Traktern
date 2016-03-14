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
                    'cat' => '20',
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
    	</article>


<!-- Informasjon -->
<!-- Informasjon -->
<div class="ramme">
    <div class="webpage-container container">
            <?php
            $custom_query = new WP_Query(array(
                'posts_per_page'    => 20,
                'cat'     => '21',
                'paged'             => 1,
            )); ?>

            <?php
            if ($custom_query->have_posts()) :
                while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                    <div class="col-md-6">
            <!-- NEWS IMAGE -->
                        <div class="news-single-img">
                            <?php if(has_post_thumbnail()) : ?>
                                    <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' )[0]; ?>">
                                </a>
                            <?php endif; ?>
                        </div>
            <!-- NEWS TITLE -->
                        <div class="news-single-title">
                            <h2><?php the_title(); ?></h2>
                        </div>
                        <div class="indre_ramme">
                            <?php the_excerpt($more); ?>
                        </br>
                            <hr class="visible-xs visible-sm">
                        </div>
                        </div>
                <?php
                endwhile;
            else :
                for ($i = 0; $i < 8; $i++) :
                    echo '';
                endfor;
            endif;

            wp_reset_postdata(); ?>
    </div>
</div>
<!-- Informasjon -->
<!-- Informasjon -->


</section>
<?php get_footer(); ?>
