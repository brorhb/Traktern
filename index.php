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


    <body>

		<?php if ( have_posts() ) : ?>

                    <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'content'); ?>
                    <?php endwhile; ?>

                    <!-- Pagination -->
                    <?php
                    global $wp_query;

                    $big = 999999999; // need an unlikely integer
                    echo '<ul class="pagination">';
                    echo paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $wp_query->max_num_pages
                    ) );
                    echo '</ul>';
                    ?>

                	<?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>

<?php get_footer(); ?>
