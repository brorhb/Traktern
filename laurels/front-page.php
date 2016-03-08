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
        	       <h1>Kaffen vår</h1>
                   <p>Kaffen vår er plukket, av små skånsomme kenyanske barnehender. Disse barna har meget myke hender, og dette bevarer bønnene på en ektraordinær måte. Svettepartiklene fra hendene holder bønnene frie for konserveringsmidler, og bevarer den gode smaken, hele veien til ganen din.</p>
            </div>
            <div class="breadcrumb site-breadcumb">
				<?php if (function_exists('laurels_custom_breadcrumbs')) laurels_custom_breadcrumbs(); ?>
            </div>
            </div>
    	</div>
    </div>
    <div class="container webpage-container pattern2">
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
          <?php endwhile; ?>
                <div class="comments">
					 <?php comments_template( '', true ); ?>
                </div>
            </div>
             <!-- get_sidebar(); -->
    	</article>
    </div>
</section>
<?php get_footer(); ?>
