<?php

/* Staff Needs Custom Post Type
 * The staff needs custom post type includes all of the data
 * related to the particular needs of the position needing to be filled.
 */
 
 
function staffing_needs_cpt() {
	$labels = array(
		'name'               => _x( 'Staffing Needs', 'post type general name', 'water-tower' ),
		'singular_name'      => _x( 'Staffing Need', 'post type singular name', 'water-tower' ),
		'add_new'            => _x( 'Add New Staffing Need', 'staff_needs', 'water-tower' ),
		'add_new_item'       => __( 'Add New Staffing Need', 'water-tower' ),
		'edit_item'          => __( 'Edit Staffing Need', 'water-tower' ),
		'new_item'           => __( 'New Staffing Need', 'water-tower' ),
		'all_items'          => __( 'Staffing Needs', 'water-tower' ),
		'view_item'          => __( 'View Staffing Needs', 'water-tower' ),
		'search_items'       => __( 'Search Staffing Needs', 'water-tower' ),
		'not_found'          => __( 'No staffing needs found', 'water-tower' ),
		'not_found_in_trash' => __( 'No staffing needs found in the Trash', 'water-tower' ), 
		'menu_name'          => __( 'Staffing Needs', 'water-tower' ),
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our staffing needs and staffing needs specific data',
		'public'        => true,
		'menu_position' => 6,
		'menu_icon'			 => 'dashicons-welcome-learn-more',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'show_in_menu'  => 'edit.php?post_type=page',
		'has_archive'   => true,
		'exclude_from_search' => true,
		'taxonomies' 	=> array('post_tag'),
		'rewrite' => array('slug' => 'staffing-needs'), 
	);
	register_post_type( 'staffing_needs', $args );	
}
add_action( 'init', 'staffing_needs_cpt' );


// Disable Single Post View
function staffing_needs_redirect_post() {
  $queried_post_type = get_query_var('post_type');
  if ( is_single() && 'staffing_needs' ==  $queried_post_type ) {
    wp_redirect( get_bloginfo('url') . '/staffing-needs/', 301 );
    exit;
  }
}

add_action( 'template_redirect', 'staffing_needs_redirect_post' );

?>