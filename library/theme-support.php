<?php
function watertower_theme_support() {
    // Add language support
    load_theme_textdomain('watertower', get_template_directory() . '/languages');

    // Add menu support
    add_theme_support('menus');

    // rss thingy
    add_theme_support('automatic-feed-links');

	//ADD POST THUMBNAIL FUNCTIONALITY
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );			
	}
		// Add Post Thumbnail Support to tribe_venue CPT.
		add_post_type_support ('tribe_venue', 'thumbnail');
	
	//DEFINE THUMBNAIL SIZES
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'full-width-banner', 2800, 800, true); //USE FOR FULL WIDTH BANNERS
		add_image_size( 'thumbnail-card', 700, 400, true ); //USE FOR DISPLAY OF THUMBNAIL SIZE CARDS
	}
	
	// Allow .svg files to be uploaded to WordPress
	function cc_mime_types($mimes) {
	  $mimes['svg'] = 'image/svg+xml';
	  return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');

}

add_action('after_setup_theme', 'watertower_theme_support'); 
?>