<?php

/*	Target Nations Custom Post Type
 *	This custom post type allows us to store
 *	and format all of our custom post type data,
 *	and also link to stories and other content to target
 *	nations.
 */

function my_custom_post_target_nations() {
	$labels = array(
		'name'               => _x( 'Target Nations', 'post type general name', 'water-tower' ),
		'singular_name'      => _x( 'Target Nations', 'post type singular name', 'water-tower' ),
		'add_new'            => _x( 'Add New', 'book', 'water-tower' ),
		'add_new_item'       => __( 'Add New Target Nation', 'water-tower' ),
		'edit_item'          => __( 'Edit Target Nation', 'water-tower' ),
		'new_item'           => __( 'New Target Nation', 'water-tower' ),
		'all_items'          => __( 'All Target Nations', 'water-tower' ),
		'view_item'          => __( 'View Target Nation', 'water-tower' ),
		'search_items'       => __( 'Search Target Nations', 'water-tower' ),
		'not_found'          => __( 'No Target Nations found', 'water-tower' ),
		'not_found_in_trash' => __( 'No Target Nations found in the Trash', 'water-tower' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Target Nations',
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Target Nation data',
		'public'        => true,
		'menu_position' => 6,
		'menu_icon'		=> 'dashicons-location-alt',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'show_in_menu'  => 'edit.php?post_type=page',
		'has_archive'   => true,
		'taxonomies' 	=> array('post_tag'),
		'rewrite' => array('slug' => 'target-nations'),
	);
	register_post_type( 'target_nations', $args );
}
add_action( 'init', 'my_custom_post_target_nations' );


// Disable Single Post View
function target_nations_redirect_post() {
	$queried_post_type = get_query_var( 'post_type' );
	if ( is_single() && 'target_nations' == $queried_post_type ) {
		wp_redirect( get_bloginfo( 'url' ) . '/target-nations/', 301 );
		exit;
	}
}

add_action( 'template_redirect', 'target_nations_redirect_post' );


function jp_country_info($country_id) {

	$api_key = '491f2410d044';
	$url = "http://joshuaproject.net/api/v2/countries?api_key={$api_key}&ROG3={$country_id}";

	// Open Connection
	$ch = curl_init();

	// Set Curl Options
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_TIMEOUT, 60 );
	curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );

	// Execute Request
	$result = curl_exec( $ch ) or die(curl_error( $ch ));

	// Kill Connection
	curl_close( $ch );

	// Decode JSON Response
	$decoded_json = json_decode( $result, true );

	// Check for JSON Errors
	if ( ! is_array( $decoded_json ) ) {
	    echo 'Unable to retrieve the JSON.';
	    exit;
	}

	return $decoded_json;
}

?>