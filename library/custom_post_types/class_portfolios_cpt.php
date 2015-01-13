<?php

/*	Class Portfolio Custom Post Type
 *	This post type contains our class portfolio data, which allows 
 *	schools to track their stories, add to them during and after the
 *	school to keep the history of that particular class experience.
 */
 
function declare_class_portfolio_post_type() {
	$labels = array(
		'name'               => _x( 'Class Portfolio', 'post type general name', 'water-tower' ),
		'singular_name'      => _x( 'Class Portfolio', 'post type singular name', 'water-tower' ),
		'add_new'            => _x( 'Add New', 'book', 'water-tower' ),
		'add_new_item'       => __( 'Add New Class Portfolio', 'water-tower' ),
		'edit_item'          => __( 'Edit Class Portfolio', 'water-tower' ),
		'new_item'           => __( 'New Class Portfolio', 'water-tower' ),
		'all_items'          => __( 'All Class Portfolios', 'water-tower' ),
		'view_item'          => __( 'View Class Portfolio', 'water-tower' ),
		'search_items'       => __( 'Search Class Portfolios', 'water-tower' ),
		'not_found'          => __( 'No Class Portfolios found', 'water-tower' ),
		'not_found_in_trash' => __( 'No Class Portfolios found in the Trash', 'water-tower' ), 
		'parent_item_colon'  => '',
		'menu_name'          => __( 'Class Portfolios', 'water-tower'),
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Contains all of the information regarding class portfolios.',
		'public'        => true,
		'menu_position' => 6,
		'menu_icon'		=> 'dashicons-portfolio',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'has_archive'   => true,
		'taxonomies' 	=> array('post_tag'),
		'rewrite' => array('slug' => 'class-portfolios'), 
	);
	register_post_type( 'class_portfolios', $args );	
}
add_action( 'init', 'declare_class_portfolio_post_type' );

?>