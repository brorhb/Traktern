<?php
/*
 * Page Template File.
 */
get_header(); ?>
<section>
    <div class="forside_bg">
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

            </div>
    	</div>
    </div>
    	</article>

<!-- ÅPNINGSTIDER -->
<!-- ÅPNINGSTIDER -->
<div class="pattern2">
    <div class="webpage-container container">
        <div class="col-md-9">
            <h3>Åpningstider</h3>
            <ul class="tabs">
                <li rel="storgata" class="active">Storgata</li>
                <li rel="sjøsiden">Sjøsiden</li>
            </ul>
            
            <div id="storgata" class="panel active">
                <ul>
                    <li>Mandag – fredag: 10-20</li>
                    <li>Lørdag: 10-18</li>
                    <li>Søndag: stengt</li>
                </ul>
            </div>
            
            <div id="sjøsiden" class="panel">
                <ul>
                    <li>mandag 08-18</li>
                    <li>tirsdag-torsdag 08-20</li>
                    <li>fredag 08-18</li>
                    <li>lørdag 10-18</li>
                    <li>søndag 10-18</li>
                </ul>
            </div>
            
        </div>
        <div class="col-md-3 hidden-xs">
            <div class="kaffe"><img src="http://136147-www.web.tornado-node.net/wp-content/themes/laurels/images/kaffe.png" alt="kaffekopp">
            </div>
        </div>
    </div>
</div>
<!-- ÅPNINGSTIDER -->
<!-- ÅPNINGSTIDER -->



<!-- TRE SISTE POSTER -->
<!-- TRE SISTE POSTER -->
<div class="ramme hidden-xs">
    <div class="webpage-container container">
        <h1>Tre siste blogg innlegg</h1>
        <hr>
            <?php
            $custom_query = new WP_Query(array(
                'posts_per_page'    => 3,
                'cat'     => '3',
                'paged'             => 1,
            )); ?>

            <?php
            if ($custom_query->have_posts()) :
                while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                    <div class="col-md-4">
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
<!-- TRE SISTE POSTER -->
<!-- TRE SISTE POSTER -->


</section>
<?php get_footer(); ?>
