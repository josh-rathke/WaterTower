<?php


/*
Author: Ole Fredrik Lie
URL: http://olefredrik.com
*/
// Various clean up functions
require_once 'library/cleanup.php';
// Required for Foundation to work properly
require_once 'library/foundation.php';
// Register all navigation menus
require_once 'library/navigation.php';
// Add menu walker
require_once 'library/menu-walker.php';
// Enqueue scripts
require_once 'library/enqueue-scripts.php';
// Add theme support
require_once 'library/theme-support.php';


// Add WaterTower Admin Dashboard Functions
//require_once('library/watertower-admin_old.php');
// Add WaterTower Custom Meta
require_once 'custom-meta.php';
// Add Author Class & Helper Functions
require_once 'library/author-class.php';
// Add Program Classification Functions
require_once 'library/program-classification.php';
// Add Comments Walker
require_once 'library/comments-walker.php';



/*	Add Options Framework Core Files
 * 	This will add the options framework core files
 * 	from the bower_components folder.
 */
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/bower_components/options-framework-theme/inc/' );
require_once dirname( __FILE__ ) . '/bower_components/options-framework-theme/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

add_filter(
	'optionsframework_menu', function ( $menu ) {
		$menu['page_title'] = 'WaterTower Options';
		$menu['menu_title'] = 'WaterTower';
		return $menu;
	}
);



/* Custom Post Type Includes
 * This is where all of the custom posts type of Water Tower
 * get pulled into the theme. There should be no custom post
 * type declarations within the functions.php file.  They should
 * all be included in the includes folder.
 */

	// Programs CPT
	require 'library/custom_post_types/programs_cpt.php';
	// Target Nations CPT
	require 'library/custom_post_types/target_nations_cpt.php';
	// Project CPT
	require 'library/custom_post_types/projects_cpt.php';
	// Surges CPT
	require 'library/custom_post_types/surges_cpt.php';
	// Staff Needs CPT
	require 'library/custom_post_types/staffing_needs_cpt.php';
	// Focus Tracks CPT
	require 'library/custom_post_types/focus_tracks_cpt.php';
	// Acceptance Packets CPT
	require 'library/custom_post_types/acceptance_packets_cpt.php';
    // Testimonies CPT
    require 'library/custom_post_types/testimonies_cpt.php';



/*	Custom Taxonomy Includes
 *	This is where all of the custom taxonomies of Water Tower
 *	get pulled into the theme.  There should be no custom taxonomies
 *	declared within the functions.php file.  They should all be included
 *	in the includes folder.
 */

	// Program Classification Taxo
	require 'library/custom_taxonomies/program_classifications_tax.php';
	// Program Taxo
	require 'library/custom_taxonomies/programs_tax.php';
	// Target Nation Taxo
	require 'library/custom_taxonomies/target_nations_tax.php';
	// Page Page Categories Taxo
	require 'library/custom_taxonomies/page_page_categories_tax.php';
	// Project Taxo
	require 'library/custom_taxonomies/projects_tax.php';
    // Surges Taxo
    require 'library/custom_taxonomies/surges_tax.php';



/*	CPT - Taxonomy Relationships
 *  Custom Post Type to Taxonomy relationships allow for
 *  dynamic linking between posts that may be "owned" by one
 *	another.  For instance, a particular program, or programs can
 *	"own" a post, so that it is displayed as a post within that
 *	program's event stream. These primarily are the gatekeepers of
 *	of the history of the base and which posts are related to which
 *	objects and helps people stay focused on particular objects, while
 *	flowing from one post to another.
 */

    // Program CPT -> Program Taxo
    require 'library/cpt_tax_relationships/programcpt_programtax.php';
    // Surges CPT -> Surges Taxo
    require 'library/cpt_tax_relationships/surgescpt_surgestax.php';



/*	Include Widgetize Areas Function
 *	This function runs through an array of defined post
 *	types and generates a unique sidebar for each area
 *	so that it can be customized in terms of which widgets
 *	are used, and in what order.
 */

	 // Widgetize Areas Function
	 require 'library/widgets/widgetize_areas.php';



/*	Include Widgets
 *	This function pulls in all of the custom widgets that
 *	have been created for Water Tower.
 */
	// Subscribe Widget
	require 'library/widgets/wt_subscribe_widget.php';
	// Featured Page Widget
	require 'library/widgets/wt_featured_page_widget.php';
	// Related Media
	require 'library/widgets/wt_related_media_widget.php';


/**
 *  Include CPT To Body Class Function
 *  This will add a custom post type definition in the form
 *  of a class within the <body> tag for use with things like
 *  javascript to check whether a page is associated with a 
 *  particular custom post type.
 */
require 'library/append_cpt_to_body_class.php';


/**
 *  Include TinyMCE Editor Additions
 *  This will add customized buttons to the TinyMCE Editor via
 *  the PHP file and a .js file that defines how each of the 
 *  buttons functions and alters the output of the content
 *  of the editor.
 */
require 'library/tinymce_addons/tinymce_addons.php';

/**
 *  Include Shortcodes
 *  This will register all of the shortcodes needed
 *  to run the custom shortcodes we have set up for the
 *  theme.
 */
function register_shortcodes(){
   add_shortcode('promote_post', 'promote_post_output');
}
add_action( 'init', 'register_shortcodes');

/**
 *  Include Zopim Function
 *  Include all of the functions that use the Zopim API
 *  to alter the state of the zopim chat window.
 */
require 'library/zopim_functions/reveal_badge_on_program.php';
    


/**
 *  Include API Call Functions
 */

require 'library/instagram.php';


function get_tags_related_to_tax_term($taxonomy, $term)
{

	// Make all of the args for Get Posts
	$get_posts_args = array(
		'posts_per_page' => -1,
		$taxonomy         => $term,
	);

	// Get all posts that match the taxonomy and term
	$posts = get_posts( $get_posts_args );
	$post_tags = array();

	// Loop through all posts
	foreach ( $posts as $post ) {

		// Queue Up Next Post Tag For Verification
		$post_tags_on_deck = wp_get_post_tags( $post->ID );

		foreach ( $post_tags_on_deck as $post_tag_on_deck ) {
			if ( ! in_array( $post_tag_on_deck, $post_tags ) ) {
				$post_tags[] = $post_tag_on_deck;
			}
		}
	}

	function sort_post_tags($a, $b)
	{
		if ( $a->count == $b->count ) {
			return 0;
		} else {
			return ($a->count < $b->count) ? 1 : -1;
		}
	}

	usort( $post_tags, 'sort_post_tags' );
	return $post_tags;
}

function get_tags_related_to_tax_term_list($taxonomy, $term, $num_requested)
{
	$post_tags = array_slice( get_tags_related_to_tax_term( $taxonomy, $term ), 0, $num_requested );

	foreach ( $post_tags as $post_tag ) {
		$format = '<a href="' . get_bloginfo( 'url' ) . '/tag/%s">%s</a>';
		echo sprintf( $format, $post_tag->slug, $post_tag->name );
		echo (end( $post_tags ) !== $post_tag) ? ', ' : null;
	}
}



function get_id_by_slug($page_slug) {
	$page = get_page_by_path( $page_slug );
	if ( $page ) {
		return $page->ID;
	} else {
		return null;
	}
}

function get_the_slug($id) {
    $post_data = get_post($id, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug; 
}



/*	Function Get Excerpt By ID
 *	This function allows us to get the excerpt of a
 *	post by the ID of the post, and also allows a
 *	word count to be passed to allow for excerpt length
 *	variability.
 */

function get_excerpt_by_id( $post_id, $excerpt_length = 40, $echo_link = false, $link_text = 'View Post' )
{
	$the_post = get_post( $post_id ); //Gets post ID
	$the_permalink = get_permalink( $post_id );
	$the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
	$the_excerpt = strip_tags( strip_shortcodes( $the_excerpt ) ); //Strips tags and images
	$words = explode( ' ', $the_excerpt, $excerpt_length + 1 );

	if ( count( $words ) > $excerpt_length ) :
		array_pop( $words );
		array_push( $words, '[…]' );
		$the_excerpt = implode( ' ', $words );

		if ( $echo_link ) {
			$the_excerpt .= "<a href='{$the_permalink}'>{$link_text}</a>";
		}

	endif;

	$the_excerpt = '<p>' . $the_excerpt . '</p>';
	return $the_excerpt;
}

/**
 *     Properize Function
 *     This function simply addes the correct punctuation
 *     to add possesion to a string passed through the function.
 */
function properize($string)
{
	return $string.'\''.($string[ strlen( $string ) - 1 ] != 's' ? 's' : '');
}






/**
 *  Add Media Button to TinyMCE Editor
 *  This bit of code adds the button to the tinyMCE
 *  editor in the backend of the Wordpress.
 */
add_action('media_buttons_context','insert_promotion_button');
function insert_promotion_button($context){
    
    $icon_url = get_bloginfo( 'template_url' ) . '/assets/img/icons/insert_promotion.png';
    $icon_styles = 'height: 90%; opacity: .6; padding-right: 8px; margin-top: -2px;';

    return $context.=__("
    <a href=\"#TB_inline?width=480&inlineId=insert_promotion_popup&width=640&height=513\" class=\"button thickbox\" id=\"insert_promotion_button\" title=\"Insert Promotion\"><img src='{$icon_url}' style='{$icon_styles}' >Insert Promotion</a>");
}


/**
 *  Generate HTML for Post Type Select Field
 *  This bit of code generates the necessary HTML for
 *  select boxes of predefined post types that can be
 *  highlighted as a promotion.
 */
add_action('admin_footer','insert_promotion_popup');
function insert_select_field_using_post_type($post_types) {
    foreach ($post_types as $post_type) { ?>

        <div>
            <label for="<?php echo $post_type['slug']; ?>_to_promote"><?php echo $post_type['name']; ?></label>
            <select id="<?php echo $post_type['slug']; ?>_to_promote">

                <?php

                global $post;

                // Define Arguments for the query
                $args = array (
                    'post_type'      => $post_type['slug'],
                    'posts_per_page' =>  -1,
                );

                $query_posts = new WP_Query( $args );

                // The Loop
                if ( $query_posts->have_posts() ) {
                    echo "<option value=''>-- Select {$post_type['name']} --</option>";
                    while ( $query_posts->have_posts() ) {
                        $query_posts->the_post();

                        echo "<option value='{$post->ID}'>" . get_the_title() . '</option>';
                    }
                }
                wp_reset_postdata(); ?>
            </select>
        </div>
    
    <?php }
}

/**
 *  Generate ThickBox For User Input
 *  This adds a thickbox for user input after
 *  the button is clicked.
 */
function insert_promotion_popup(){?>

  <div id="insert_promotion_popup" style="display:none;">
    <div class="wrap">
      <div>
        <h2>Insert Promotion</h2>
        <div class="insert-promotion-options">
            
            <div>
                <h3 style="vertical-align:top;display:block;margin-bottom:0px;">Promotion Title</h3>
                <input id="promotion_title" type="text">
            </div>
            
            <div>
                <h3 style="vertical-align:top;display:block;margin-bottom:0px;">Choose Which Post to Promote</h3>
                <p style="margin-top: 0px;">Chose a post from one of the below post types to promote. Only one of the post types will be used, so make sure you only select the one you want, leave the others blank.</p>
            <?php 
            $post_types_to_display = array (
                'Programs' => array (
                    'name' => 'Program',
                    'slug' => 'program',
                    ),
                'Pages'    => array (
                    'name' => 'Page',
                    'slug' => 'page',
                    ),
                'Posts'    => array (
                    'name' => 'Post',
                    'slug' => 'post',
                    )
            );
            
            insert_select_field_using_post_type($post_types_to_display); 
            ?>
            </div>
            
            <div>
                <h3 style="vertical-align:top;display:block;margin-bottom:0px;">Optional Description</h3>
                <p style="margin-top: 0px;">By default the post's content will be used to populate the excerpt of whatever you are choosing to promote. By entering text here, you will overwrite that default functionality.</p>
                <textarea id="optional_desc" rows="4" cols="50"></textarea>
            </div>
            
          <button class="button-primary" id="insert_promotion_submit_button" style="display: block; margin-top: 20px;">Add Shortcode</button>
        </div>
      </div>
    </div>
  </div>
<?php }


/**
 *  Insert Shortcode in Content Body
 *  This inserts the shortcode as configured into the
 *  body of the content.
 */
add_action('admin_footer','insert_promotion_into_editor');
function insert_promotion_into_editor(){?>
    <script>
        jQuery('#insert_promotion_submit_button').on('click',function(){
            
            var title = jQuery('#promotion_title').val();
            var desc  = jQuery('#optional_desc').val();

            if (jQuery('#program_to_promote').val() != '') {
                var post_id = jQuery('#program_to_promote').val();

            } else if (jQuery('#page_to_promote').val() != '') {
                var post_id = jQuery('#page_to_promote').val();

            } else if (jQuery('#post_to_promote').val() != '') {
                var post_id = jQuery('#post_to_promote').val();

            } else {
                post_id = null;
            }

          var shortcode = '[promote_post title="' + title + '" post_id="' + post_id + '" description="' + desc + '"/]';

          if( !tinyMCE.activeEditor || tinyMCE.activeEditor.isHidden()) {
            jQuery('textarea#content').val(shortcode);
          } else {
            tinyMCE.execCommand('mceInsertContent', false, shortcode);
          }
          //close the thickbox after adding shortcode to editor
          self.parent.tb_remove();
        });
    </script>
<?php }

/**
 *  Return Promote Post HTML
 *  This will output the necessary HTML for the
 *  promote post shortcode.
 */
function promote_post_output($attributes) {
    
    extract(shortcode_atts(array(
      'title'       => '',
      'post_id'     => 1,
      'description' => '',
   ), $attributes));
    
    ob_start();
        include(locate_template('parts/promote_post.php'));
    return ob_get_clean();
}



?>
