<div class="surge-timeline-snapshot-container">
    <h3><i class="fa fa-history"></i> Surge Updates</h3>

    <?php

    // The Query
    $surge_posts = new WP_Query('post_type=post&posts_per_page=4&category_name=staff-articles');
    $found_posts = $surge_posts->found_posts;
    //print_r($surge_posts);

    // The Loop
    if ( $surge_posts->have_posts() ) :
        while ( $surge_posts->have_posts() ) : $surge_posts->the_post(); ?>

            <div class="surge-timeline-snapshot-post">
                <div>
                    <a href="<?php echo get_permalink(); ?>"><span class="surge-timeline-snapshot-number"><?php echo '#' . $found_posts; ?></span></a>
                    <span class="surge-timeline-snapshot-date"><?php echo get_the_date(); ?></span>
                    <a href="<?php echo get_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                    <?php echo get_excerpt_by_id($post->ID, 20); ?>
                </div>
            </div>


        <?php
        $found_posts--;
        endwhile;
    endif;

    /* Restore original Post Data */
    wp_reset_postdata();

    ?>

</div>