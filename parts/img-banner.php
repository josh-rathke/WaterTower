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
		<ul class="orbit-slider" data-orbit data-options="resume_on_mouseout:true;">
		
			<?php
			$featured_posts = new WP_Query( 'post_type=post' );
			
			// The Loop
			if ( $featured_posts->have_posts() ) {
				while ( $featured_posts->have_posts() ) {
					$featured_posts->the_post();
					
					$post_ribbon = new postRibbon($post->ID);
					$background_color = $post_ribbon->post_color_info[0]['color'];
					
					$post_thumbanail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail-size', true);
					
					echo '<li>';
					echo '<div class="orbit-slider-placeholder" style="background: url(' . $post_thumbanail[0] . ') no-repeat center center;">';
					echo '</div>';
					
					echo '<div class="orbit-caption" style="border-top: 3px solid ' . $background_color . '">';
					echo '<div class="row">';
					echo '<div class="small-12 columns">';
					echo '<a href="' . get_the_permalink() . '" style="color: ' . $background_color . '"><i class="fa fa-level-up fa-rotate-90"></i> New Blog Post: <span style="color:#444;">' . get_the_title() . '</span></a>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					
					echo '</li>';
				}
			} else {
				// no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
			
		</ul>
	</div>

<?php
	
} elseif (is_page('campus-tour')) {
	
	/**
	 * 	Campus Tour Banner
	 * 	This displays the campus tour header that allows
	 * 	anyone viewing the page to navigate through our 
	 * 	campus virtually.
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
	}
	
	function initialize() {
	  var myPanoid = 'RB2Y2YqYEncAAAGu5uu9ug';
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
		
		google.maps.event.addListener(panorama, 'position_changed', function() {
		    var positionCell = document.getElementById('position_cell');
		    var latitude = parseFloat(panorama.getPosition().lat()).toFixed(4);
		    var longitude = parseFloat(panorama.getPosition().lng()).toFixed(4);
		    
		    positionCell.firstChild.nodeValue = '(' + latitude + ' \u00B0, ' + longitude + ' \u00B0)';
		});
		
	    google.maps.event.addListener(panorama, 'pov_changed', function() {
	      var headingCell = document.getElementById('heading_cell');
	      var pitchCell = document.getElementById('pitch_cell' + '');
	      headingCell.firstChild.nodeValue = parseFloat(panorama.getPov().heading).toFixed(7) + ' \u00B0';
	      pitchCell.firstChild.nodeValue = parseFloat(panorama.getPov().pitch).toFixed(7) + ' \u00B0';
	    });
	
	}
	
	google.maps.event.addDomListener(window, 'load', initialize);
	
	</script>
	
	
	<div id="pano" style="width: 100%; height: 450px;"></div>
 
	 <?
	
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
	
	if ( is_archive() || is_home() || $page_id != null ){
		if ( $page_id != null && has_post_thumbnail($page_id) ) {
			$post_thumbanail = wp_get_attachment_image_src(get_post_thumbnail_id($page_id), 'thumbnail-size', true);

			echo '<div class="standard-banner-container" style="background: url(' . $post_thumbanail[0] . ') no-repeat center center;"></div>';
		}
	} else {
		if ( has_post_thumbnail($post->ID) ) {
			$post_thumbanail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail-size', true);
			
			echo '<div class="standard-banner-container" style="background: url(' . $post_thumbanail[0] . ') no-repeat center center;"></div>';
		}
	}
	
	
	
}

?>