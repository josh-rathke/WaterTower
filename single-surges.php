<?php 

/**
 *	Single Surges Template
 *	This is the template file for any individual
 *	surge page being displayed. 
 */

get_header();

// Get Pagename of Current Surge Being Displayed
$pagename = $post->post_name;

	if( $pagename == 'taiwan-2014-2018' ) {
		get_template_part( 'parts/surge-single-templates/taiwan-2014-2018');
	
	// If all else fails, display the content-none page.
	} else {
		get_template_part( 'content', 'none' );
	}

get_footer(); ?>
