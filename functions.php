<?php


/*
Author: Ole Fredrik Lie
URL: http://olefredrik.com
*/
// Various clean up functions
require_once('library/cleanup.php');
// Required for Foundation to work properly
require_once('library/foundation.php');
// Register all navigation menus
require_once('library/navigation.php');
// Add menu walker
require_once('library/menu-walker.php');
// Create widget areas in sidebar and footer
require_once('library/widget-areas.php');
// Enqueue scripts
require_once('library/enqueue-scripts.php');
// Add theme support
require_once('library/theme-support.php');


// Add WaterTower Admin Dashboard Functions
//require_once('library/watertower-admin_old.php');
// Add WaterTower Custom Meta
require_once('custom-meta.php');
// Add Author Class & Helper Functions
require_once('library/author-class.php');
// Add Program Classification Functions
require_once('library/program-classification.php');
// Add Comments Walker
require_once('library/comments-walker.php');



/*	Add Options Framework Core Files
 * 	This will add the options framework core files
 * 	from the bower_components folder.
 */
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/bower_components/options-framework-theme/inc/' );
require_once dirname( __FILE__ ) . '/bower_components/options-framework-theme/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

add_filter( 'optionsframework_menu', function( $menu ) {
	    $menu['page_title'] = 'The Options';
	    $menu['menu_title'] = 'The Optio';
	    return $menu;
	 });



/* Custom Post Type Includes
 * This is where all of the custom posts type of Water Tower
 * get pulled into the theme. There should be no custom post
 * type declarations within the functions.php file.  They should
 * all be included in the includes folder.
 */
	
	// Programs CPT
	include ('library/custom_post_types/programs_cpt.php');
	// Target Nations CPT
	include ('library/custom_post_types/target_nations_cpt.php');
	// Project CPT
	include ('library/custom_post_types/projects_cpt.php'); 
	// Surges CPT
	include ('library/custom_post_types/surges_cpt.php');
	// Staff Needs CPT
	include ('library/custom_post_types/staffing_needs_cpt.php');
	// Focus Tracks CPT
	include ('library/custom_post_types/focus_tracks_cpt.php');
	
	
	
/*	Custom Taxonomy Includes
 *	This is where all of the custom taxonomies of Water Tower
 *	get pulled into the theme.  There should be no custom taxonomies
 *	declared within the functions.php file.  They should all be included
 *	in the includes folder.
 */
 
	// Program Classification Taxo
	include ('library/custom_taxonomies/program_classifications_tax.php');	
	// Program Taxo
	include ('library/custom_taxonomies/programs_tax.php');
	// Target Nation Taxo
	include ('library/custom_taxonomies/target_nations_tax.php');
	// Page Page Categories Taxo
	include ('library/custom_taxonomies/page_page_categories_tax.php');
	// Project Taxo
	include ('library/custom_taxonomies/projects_tax.php');
	
	
	
/*	CPT - Taxonomy Relationships
 *	Custom Post Type to Taxonomy relationships allow for 
 *	dynamic linking between posts that may be "owned" by one 
 *	another.  For instance, a particular program, or programs can
 *	"own" a post, so that it is displayed as a post within that
 *	program's event stream. These primarily are the gatekeepers of
 *	of the history of the base and which posts are related to which
 *	objects and helps people stay focused on particular objects, while
 *	flowing from one post to another.
 */
 
 	// Program CPT -> Program Taxo
 	include ('library/cpt_tax_relationships/programcpt_programtax.php');				
					
			
						
/*	Include Widgetize Areas Function
 *	This function runs through an array of defined post
 *	types and generates a unique sidebar for each area
 *	so that it can be customized in terms of which widgets
 *	are used, and in what order.
 */			
 
 	// Widgetize Areas Function
 	include ('library/widgets/widgetize_areas.php');
					
					
					
/*	Include Widgets
 *	This function pulls in all of the custom widgets that
 *	have been created for Water Tower.
 */
	// Subscribe Widget
	include ('library/widgets/wt_subscribe_widget.php');
	// Featured Page Widget
	include ('library/widgets/wt_featured_page_widget.php');
	// List Taxonomy Widget
	include ('library/widgets/wt_list_taxonomy_widget.php');
	// List Target Nations
	include ('library/widgets/wt_target_nations_list_widget.php');
	// List Surge Initiatives
	include ('library/widgets/wt_list_surges_widget.php');
	// Related Media
	include ('library/widgets/wt_related_media_widget.php');
 
 
 
 
function get_tags_related_to_tax_term($taxonomy, $term) {
	
	// Make all of the args for Get Posts
	$get_posts_args = array (
		'posts_per_page' => -1,
		$taxonomy		 => $term,
	);
	
	// Get all posts that match the taxonomy and term
	$posts = get_posts($get_posts_args);
	$post_tags = array();
	
	// Loop through all posts
	foreach ($posts as $post) {
		
		// Queue Up Next Post Tag For Verification
		$post_tags_on_deck = wp_get_post_tags($post->ID);
		
		foreach ($post_tags_on_deck as $post_tag_on_deck) {
			if (!in_array($post_tag_on_deck, $post_tags)) {
				$post_tags[] = $post_tag_on_deck;
			}
		}
	}
	
	function sort_post_tags($a, $b) {
		if ($a->count == $b->count) {
	        return 0;
	    } else {
	    	return ($a->count < $b->count) ? 1 : -1;
		}
	}
	
	usort($post_tags, 'sort_post_tags');
	return $post_tags;
}

function get_tags_related_to_tax_term_list($taxonomy, $term, $num_requested) {
	$post_tags = array_slice(get_tags_related_to_tax_term($taxonomy, $term), 0, $num_requested);
	
	foreach($post_tags as $post_tag) {
		$format = '<a href="' . get_bloginfo('url') . '/tag/%s">%s</a>';
		echo sprintf($format, $post_tag->slug, $post_tag->name);
		echo (end($post_tags) !== $post_tag) ? ', ' : null;
	}
}



function get_id_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
}
 
 
 
?>
