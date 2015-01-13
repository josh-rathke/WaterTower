<?php

/*	Page Menu Location
 *	This taxonomy allows us to target specific locations we want
 *	different pages to come in on the menu.  This allows us to more
 *	dynamically control the menu, and place content within our navigation
 *	sytem.
 */
 
function my_taxonomies_page_menu_location() {
	$labels = array(
		'name'              => _x( 'Menu Locations', 'taxonomy general name', 'water-tower' ),
		'singular_name'     => _x( 'Menu Location', 'taxonomy singular name', 'water-tower' ),
		'search_items'      => __( 'Search Menu Locations', 'water-tower' ),
		'all_items'         => __( 'All Menu Locations', 'water-tower' ),
		'parent_item'       => __( 'Parent Menu Location', 'water-tower' ),
		'parent_item_colon' => __( 'Parent Menu Location:', 'water-tower' ),
		'edit_item'         => __( 'Edit Menu Location', 'water-tower' ), 
		'update_item'       => __( 'Update Menu Location', 'water-tower' ),
		'add_new_item'      => __( 'Add New Menu Location', 'water-tower' ),
		'new_item_name'     => __( 'New Menu Location', 'water-tower' ),
		'menu_name'         => __( 'Menu Locations', 'water-tower' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'rewrite' => array('hierarchical' => true ),
		'show_admin_column' => true,
		'slug' => 'menu-location'
	);
	register_taxonomy( 'page_menu_location', array( 'page' ), $args );
}
add_action( 'init', 'my_taxonomies_page_menu_location', 0 );

?>