<?php
function FoundationPress_theme_support() {
    // Add language support
    load_theme_textdomain('FoundationPress', get_template_directory() . '/languages');

    // Add menu support
    add_theme_support('menus');

    // rss thingy
    add_theme_support('automatic-feed-links');

	//ADD POST THUMBNAIL FUNCTIONALITY
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );			
	}
	
	//DEFINE THUMBNAIL SIZES
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'full-width-banner', 2800, 450, true); //USE FOR FULL WIDTH BANNERS
		add_image_size( 'thumbnail-card', 700, 400, true ); //USE FOR DISPLAY OF THUMBNAIL SIZE CARDS
	}

}

add_action('after_setup_theme', 'FoundationPress_theme_support'); 
?>