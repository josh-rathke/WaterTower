<?php

/**
 * Image Banner
 * 
 * This chunk of code is one of the last functions to be called upon in the
 * header file. It checks whether or not the page being display is the front
 * page or the home page and displays the latest posts if so. Otherwise it
 * will display a featured image if one exists for the post or page.
 */
 
if (is_front_page()) {

?>
	
	<div class="slideshow-wrapper primary-slider">
		<ul class="orbit-slider" data-orbit data-options="resume_on_mouseout:false;">
		
		
    <?php 
            
    /**
     *     Display Alert Slide
     *     This will display one slide before all others that is
     *     considered an alert slide. This slide can be activated
     *     from the front page edit screen.
     */
             
    if (rwmb_meta('enable_alert_slide')) :
        $alert_bg_image = wp_get_attachment_image_src(rwmb_meta('alert_bg_image'), 'full-width-banner', true); ?>
			 	
			 	<li data-orbit-slide="alert-slide" class="slide-container">
				    <div class="orbit-slider-placeholder" style="background: url(<?php echo $alert_bg_image[0]; ?>) no-repeat center center;">
				    	<div class="row slide-content-container vertical-align-relative">
				    		<div class="small-12 columns">
				    			
				    			<h2 class="fittext shadow"><?php echo rwmb_meta('alert_title'); ?></h2>
				    			<h2 class="fittext"><?php echo rwmb_meta('alert_title'); ?></h2>
				    		
				    			<div class="row content-desc">
						    		<div class="medium-8 columns">
						    			 <p><?php echo rwmb_meta('alert_desc'); ?></p>
						    		</div>
						    		
						    		<div class="medium-4 columns">
						    			<a class="button" href="<?php echo rwmb_meta('alert_page_link'); ?>">More Info</a>
						    		</div>
					    		</div>
				    		</div>
				    	</div>
				   
				     
				    </div>
				  </li>
			 	
			 <?php 
    endif; ?>
		
		
		
    <?php
            
    // Check if alert slide is activated and isolated
    if (!rwmb_meta('enable_alert_slide') || rwmb_meta('enable_alert_slide') && !rwmb_meta('isolate_alert_slide')) {
            
        // Display Featured Posts as Usual
        $featured_posts = new WP_Query('post_type=post&posts_per_page=4');
                
        // The Loop
        if ($featured_posts->have_posts() ) {
            while ( $featured_posts->have_posts() ) {
                $featured_posts->the_post();
                $post_thumbanail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-width-banner', true); ?>
						
            <li class="slide-container">
             <div class="orbit-slider-placeholder" style="background: url('<?php echo $post_thumbanail[0]; ?>') no-repeat center center;">
                 <div class="row slide-content-container vertical-align-relative">
                  <div class="small-12 columns">
					    			
                   <h2 class="fittext shadow"><?php the_title(); ?></h2>
                   <h2 class="fittext"><?php the_title(); ?></h2>
					    		
                   <div class="row content-desc">
                    <div class="medium-8 columns">
                        <?php echo get_excerpt_by_id($post->ID, 30) ?>
                    </div>
							    		
                    <div class="medium-4 columns">
                     <a class="button" href="<?php echo get_permalink($post->ID); ?>">View Post</a>
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

<?php
    
    
    
    
} elseif (is_page('campus-tour')) {
    
    /**
     *     Campus Tour Banner
     *     This displays the campus tour header that allows
     *     anyone viewing the page to navigate through our 
     *     campus virtually.
     */ ?>
	 
	<script type="text/javascript"
	  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvS3wK11EOSK0jvsAXlTnGvpUb85uXpTw">
	</script>
	
	<script>
	var panorama = null;
	var links = null;
	
	function setPano2link(pano_id) {
	  panorama.setPano(pano_id);
	  panorama.setVisible(true);
	  $("html, body").animate({ scrollTop: 0 }, "slow");
	}
	
	function initialize() {
	  var myPanoid = '<?php echo rwmb_meta('beginning_pano'); ?>';
	  var panoramaOptions = {
	    pano: myPanoid,
	    pov: {
	      heading: 270,
	      pitch: 0
	    },
	    visible: true,
	    scrollwheel: false,
		addressControl: false,
	  };
	  
	  panorama = new google.maps.StreetViewPanorama(document.getElementById('pano'), panoramaOptions);
	
		//Whenever the pano is changed check to make sure that the menu
		//is up to date so that the user can track where they are within
		//the tour.
		google.maps.event.addListener(panorama, 'pano_changed', function() {
			var curPanoID = panorama.getPano();
		
			//Toggle the active class off of the list item.
			$('.campus-tour-jump-to-menu .active').toggleClass('active');
			
			//Toggle the active class to the correct list item.
			$('#' + curPanoID).toggleClass('active');
		});
	
	}
	
	google.maps.event.addDomListener(window, 'load', initialize);
	
	</script>
	
	<div id="pano" style="width: 100%; height: 450px;"></div>
 
    <?
    
    
    
} elseif (is_page('annual-reports')) { 
    
    /**
     *     Annual Reports Banner
     *     This pulls in the latest annual report and
     *     displays it as the banner for the page.
     */
     
    // Query Annual Reports
    $annual_reports = new WP_Query('page_category=annual-report&posts_per_page=1');
    
    // The Loop
    if ($annual_reports->have_posts() ) {
        while ( $$annual_reports->have_posts() ) {
            $$annual_reports->the_post();
            $post_thumbanail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-width-banner', true); ?>
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
                   <a class="button" href="#" data-reveal-id="reveal-<?php echo $post->post_name; ?>">Read The Report</a>
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
    
    
    

} else {
    
    /*	Standard Banner	
    *	This bit of code pulls in the featured image of the
    *	post or page either currently on or provided and 
    *	simply displays it.  There is no native slider 
    *	functionality built into this function
    */
     
    // Check to see if $page_id variable is set, if so use current setting
    global $page_id;
    $page_id = $page_id != 0 ? $page_id : null;
    
    if (is_archive() || is_home() || $page_id != null ) {
        if ($page_id != null && has_post_thumbnail($page_id) ) {
            $post_thumbanail = wp_get_attachment_image_src(get_post_thumbnail_id($page_id), 'full-width-banner', true);

            echo '<div class="standard-banner-container" style="background: url(' . $post_thumbanail[0] . ') no-repeat center center;"></div>';
        
            // Display Program Blogs Archive
        } elseif (is_tax('program_taxo')) {
            $program_blog = get_queried_object();
            $program_page = get_page_by_path($program_blog->slug, OBJECT, 'program');
            $post_thumbanail = wp_get_attachment_image_src(get_post_thumbnail_id($program_page->ID), 'full-width-banner', true); ?>
			
         <div class="standard-banner-container slide-container" style="background: url(<?php echo $post_thumbanail[0]; ?>) no-repeat center center;">
          <div class="row vertical-align-relative">
           <div class="small-12 columns slide-content-container" style="text-align: center;">
            <h2 class="fittext shadow"><?php echo $program_page->post_title; ?></h2>
            <h2 class="fittext"><?php echo $program_page->post_title; ?></h2>
            <div class="subtitle">School Blog</div>
           </div>
          </div>
         </div>
		
        <?php
            
        }
        
        // Display Image Banner As Usual
    } else {
        
        if (has_post_thumbnail($post->ID) ) {
            $post_thumbanail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full-width-banner', true);
            
            echo '<div class="standard-banner-container" style="background: url(' . $post_thumbanail[0] . ') no-repeat center center;"></div>';
        }
    }
    
    
    
}

?>