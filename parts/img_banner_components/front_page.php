<?php
/**
 *  Display Front Page Header
 */ ?>


<div class="slideshow-wrapper primary-slider">
<ul class="orbit-slider" data-orbit data-options="resume_on_mouseout:true;">

<?php

/**
 *     Display Alert Slide
 *     This will display one slide before all others that is
 *     considered an alert slide. This slide can be activated
 *     from the front page edit screen.
 */

if ( rwmb_meta( 'enable_alert_slide' ) ) :
    $alert_bg_image = wp_get_attachment_image_src( rwmb_meta( 'alert_bg_image' ), 'full-width-banner', true ); ?>

<li data-orbit-slide="alert-slide" class="slide-container">
    <div class="orbit-slider-placeholder" style="background: url(<?php echo $alert_bg_image[0]; ?>) no-repeat center center;">
        <div class="row slide-content-container vertical-align-relative">
            <div class="small-12 columns">

                <h2 class="fittext shadow"><?php echo rwmb_meta( 'alert_title' ); ?></h2>
                <h2 class="fittext"><?php echo rwmb_meta( 'alert_title' ); ?></h2>

                <div class="row content-desc">
                    <div class="medium-8 columns">
                        <p>
                            <?php echo rwmb_meta( 'alert_desc' ); ?>
                        </p>
                    </div>

                    <div class="medium-4 columns">
                        <a class="button" href="<?php echo rwmb_meta( 'alert_page_link' ); ?>">More Info</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>

<?php 
    
endif;

// Check if alert slide is activated and isolated
if ( ! rwmb_meta( 'enable_alert_slide' ) || rwmb_meta( 'enable_alert_slide' ) && ! rwmb_meta( 'isolate_alert_slide' ) ) {

    // Display Featured Posts as Usual
    $featured_posts = new WP_Query( 'post_type=post&posts_per_page=4' );

    // The Loop
    if ( $featured_posts->have_posts() ) {
        while ( $featured_posts->have_posts() ) {
            $featured_posts->the_post();
            $post_thumbanail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full-width-banner', true ); ?>

        <li class="slide-container">
         <div class="orbit-slider-placeholder" style="background: url('<?php echo $post_thumbanail[0]; ?>') no-repeat center center;">
             <div class="row slide-content-container vertical-align-relative">
              <div class="small-12 columns">

               <h2 class="fittext shadow"><?php the_title(); ?></h2>
               <h2 class="fittext"><?php the_title(); ?></h2>

               <div class="row content-desc">
                <div class="medium-8 columns">
                    <?php echo get_excerpt_by_id( $post->ID, 30 ) ?>
                </div>

                <div class="medium-4 columns">
                 <a class="button" href="<?php echo get_permalink( $post->ID ); ?>">View Post</a>
                </div>
               </div>
              </div>
             </div>
            </div>
           </li>

        <?php
        }
    } else {
        // no posts found
    }
    /* Restore original Post Data */
    wp_reset_postdata();
}
?>

    </ul>
</div>