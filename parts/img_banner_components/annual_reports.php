<?php

/**
 *     Annual Reports Banner
 *     This pulls in the latest annual report and
 *     displays it as the banner for the page.
 */

// Query Annual Reports
$annual_reports = new WP_Query( 'page_category=annual-report&posts_per_page=1' );

// The Loop
if ( $annual_reports->have_posts() ) {
    while ( $annual_reports->have_posts() ) {
        $annual_reports->the_post();
        $post_thumbanail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full-width-banner', true ); ?>
    <div class="slideshow-wrapper primary-slider">
     <ul class="orbit-slider" data-orbit data-options="resume_on_mouseout:false;navigation_arrows:false;slide_number:false;timer:false;">
      <li class="slide-container">
       <div class="orbit-slider-placeholder" style="background: url('<?php echo $post_thumbanail[0]; ?>') no-repeat center center;">
           <div class="row slide-content-container vertical-align-relative">
            <div class="small-12 columns">

             <h2 class="fittext shadow"><?php the_title(); ?></h2>
             <h2 class="fittext"><?php the_title(); ?></h2>

             <div class="row content-desc">
              <div class="medium-8 columns">
                <p>We coudn't be more excited about all of the incredible things God did last year. Read the latest annual report by clicking on the button.</p>
              </div>

              <div class="medium-4 columns">
               <a class="button" href="<?php echo rwmb_meta( 'embed_code' ); ?>">Read The Report</a>
              </div>
             </div>
            </div>
           </div>
          </div>
         </li>
        </ul>
       </div>

    <?php

    }
}
/* Restore original Post Data */
wp_reset_postdata();