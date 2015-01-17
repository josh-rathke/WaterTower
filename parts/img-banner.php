<?php

/**
 * Image Banner
 * 
 * This chunk of code is one of the last functions to be called upon in the
 * header file. It checks whether or not the page being display is the front
 * page or the home page and displays the latest posts if so. Otherwise it
 * will display a featured image if one exists for the post or page.
 */
 
if (is_home() || is_front_page()) {

?>
	
	<div class="slideshow-wrapper primary-slider">
		<ul class="orbit-slider" data-orbit>
		
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
					
					echo '<div class="orbit-caption" style="border-top: 3px solid #' . $background_color . '">';
					echo '<div class="row">';
					echo '<div class="small-12 columns">';
					echo '<a href="' . get_the_permalink() . '" style="color: #' . $background_color . '"><i class="fa fa-level-up fa-rotate-90"></i> New Blog Post: <span style="color:#444;">' . get_the_title() . '</span></a>';
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
	
} else {
	
	/*	Function the_standard_banner	
	 *	This bit of code pulls in the featured image of the
	 *	post or page either currently on or provided and 
	 *	simply displays it.  There is no native slider 
	 *	functionality built into this function
	 */
	
	if (has_post_thumbnail) {
		$post_thumbanail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail-size', true);
		
		echo '<div class="standard-banner-container" style="background: url(' . $post_thumbanail[0] . ') no-repeat center center;">';
		echo '</div>';
	}
	
}

?>