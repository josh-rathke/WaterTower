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
// Return entry meta information for posts
require_once('library/entry-meta.php');
// Enqueue scripts
require_once('library/enqueue-scripts.php');
// Add theme support
require_once('library/theme-support.php');
// Add Header image
require_once('library/custom-header.php');


// Add WaterTower Admin Dashboard Functions
require_once('library/watertower-admin.php');
// Add Program Classification Functions
require_once('library/program-classification.php');


// START OLD FUNCTIONS FILE
/* Custom Post Type Includes
 * This is where all of the custom posts type of Water Tower
 * get pulled into the theme. There should be no custom post
 * type declarations within the functions.php file.  They should
 * all be included in the includes folder.
 */
	
	// Programs CPT
	include ('library/custom_post_types/programs_cpt.php');
	// Class Portfolio CPT
	include ('library/custom_post_types/class_portfolios_cpt.php');
	// Annual Reports CPT
	include ('library/custom_post_types/annual_reports_cpt.php');
	// Target Nations CPT
	include ('library/custom_post_types/target_nations_cpt.php');
	// Teachings CPT
	include ('library/custom_post_types/teachings_cpt.php');
	// Project CPT
	include ('library/custom_post_types/projects_cpt.php'); 
	// Surges CPT
	include ('library/custom_post_types/surges_cpt.php');
	// Staff Needs CPT
	include ('library/custom_post_types/staff_needs_cpt.php');
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
	// Program Pre-Requisite Taxo
	include ('library/custom_taxonomies/program_prerequisites_tax.php');
	// Class Portfolio Taxo
	include ('library/custom_taxonomies/class_portfolios_tax.php');
	// Target Nation Taxo
	include ('library/custom_taxonomies/target_nations_tax.php');
	// Teaching Teaching Types Taxo
	include ('library/custom_taxonomies/teaching_teaching_types_tax.php');
	// Page Page Categories Taxo
	include ('library/custom_taxonomies/page_page_categories_tax.php');
	// Page Menu Locations Taxo
	include ('library/custom_taxonomies/page_page_menu_locations_tax.php');
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
	// Program CPT -> Program Pre-Requisite Taxonomy
	include ('library/cpt_tax_relationships/programcpt_programprerequisitestax.php');				
					
			
			
			
					
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
 
 
 
?>
