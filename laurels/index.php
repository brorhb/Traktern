<?php
/*
 * Main Template File.
 */
get_header();
?>
<section>
    <div class="mapbg">
        <div class="container webpage-container">
            </br>
            <div class="col-md-4 col-sm-4">
                <h1>Blogg</h1>
                <p>Dette er blogg og nyhetsstedet vårt. Her kommer nyheter og tilbud og annet som engasjerer oss. Innleggene er sorttert slik at det nyeste er øverst.</p>
            </div>
        </div>
    </div>
    <div class="container webpage-container">
    	<article class="blog-article">
            <div class="col-md-9 col-sm-8 blog-page">
		<?php query_posts('cat=3'); if ( have_posts() ) :	while ( have_posts() ) : the_post(); ?>
                <div class="blog">
                    <div class="blog-data">
                        <div class="blog-date text-center">
                            <h2 class="color_txt"> <?php echo get_the_date('d'); ?></h2>
                            <h3><?php echo get_the_date('M'); ?></h3>
                        </div>
                        <div class="blog-info">
                            <a href="<?php echo  esc_url(get_permalink()); ?>" class="heading"><?php the_title(); ?></a>
                            <div class="breadcrumb blog-breadcumb">
                               <?php laurels_entry_meta(); ?>
                            </div>
                         </div>

<?php $laurels_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
					<?php if(!empty($laurels_image)) { ?>
						<div class="blog-rightsidebar-img">
							<img src="<?php echo esc_url($laurels_image); ?>" class="img-responsive" alt="<?php the_title(); ?>" />
						</div>
                    <?php } ?>

                        <div class="blog-content">
                            <?php the_excerpt(); ?>
                        </div>
                        <a class="btn btn-default pull-right" href="<?php echo  esc_url(get_permalink()); ?>">Les mer</a></br>
                        <hr>
                    </div>
                </div>
		<?php endwhile; endif; // end of the loop. ?>
        <?php   if (function_exists('faster_pagination') ) {?>
            <?php faster_pagination('','1');?>
        <?php }else { ?>
        <?php if(get_option('posts_per_page ') < $wp_query->found_posts) { ?>
        <div class="col-md-12 laurels-default-pagination">
            <span class="laurels-previous-link"><?php previous_posts_link(); ?></span>
            <span class="laurels-next-link"><?php next_posts_link(); ?></span>
        </div>
        <?php } ?>
        <?php } ?>
      </div>
             <!-- get_sidebar(); -->
    	</article>
    </div>
</section>
<?php get_footer(); ?>
