<?php

// Archive for Surges

$page_id = get_id_by_slug( 'the-surge' );
query_posts("p={$page_id}&post_type=page");

get_header(); 

// Begin looping through custom page content
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div class="row">
    <div class="columns medium-8">
        <?php the_content(); ?>
    </div>
    
        <aside id="sidebar" class="columns medium-4 stick-to-parent">
            <?php

            // List all active surge initiatives
            $the_query = new WP_Query( 'post_type=surges' );

            // The Loop
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();

                    echo '<a href="' . get_permalink() . '">';
                    echo '<div class="surge-archive-active-container">';
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                    }

                        echo '<div class="surge-archive-active-info">';
                            echo '<h2>' . rwmb_meta('surge_country', '', $post->ID) . '</h2>';
                            echo '<div class="year-span">' . rwmb_meta('surge_year_span', '', $post->ID) . '</div>';
                        echo '</div>';

                    echo '</div>';
                    echo '</a>';
                }
            } else {
                echo 'Sorry, but there are currently no active Surge Initiatives. Check back soon for updates.';
            }
            /* Restore original Post Data */
            wp_reset_postdata(); ?>
            
            
            <?php 
            // Display Surge Snapshot Timeline
            get_template_part('parts/surge_snapshot_timeline'); ?>
            
            
        </aside>
    </div>
</div>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif;

get_footer(); ?>