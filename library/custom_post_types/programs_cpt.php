<?php

/* Programs Custom Post Type
 * The programs custom post type contains all of our programs
 * specific data including dates, costs, descriptions etc.
 */

function my_custom_post_program() {
	$labels = array(
		'name'               => _x( 'Programs', 'post type general name', 'water-tower' ),
		'singular_name'      => _x( 'Program', 'post type singular name', 'water-tower' ),
		'add_new'            => _x( 'Add New', 'book', 'water-tower' ),
		'add_new_item'       => __( 'Add New Program', 'water-tower' ),
		'edit_item'          => __( 'Edit Program', 'water-tower' ),
		'new_item'           => __( 'New Program', 'water-tower' ),
		'all_items'          => __( 'All Programs', 'water-tower' ),
		'view_item'          => __( 'View Program', 'water-tower' ),
		'search_items'       => __( 'Search Programs', 'water-tower' ),
		'not_found'          => __( 'No programs found', 'water-tower' ),
		'not_found_in_trash' => __( 'No programs found in the Trash', 'water-tower' ),
		'menu_name'          => __( 'Programs', 'water-tower' ),
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our programs and program specific data',
		'public'        => true,
		'menu_position' => 6,
		'menu_icon'			 => 'dashicons-welcome-learn-more',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'show_in_menu'  => 'edit.php?post_type=page',
		'has_archive'   => true,
		'taxonomies' 	=> array('post_tag'),
		'rewrite' => array('slug' => 'program'),
	);
	register_post_type( 'program', $args );
}
add_action( 'init', 'my_custom_post_program' );



/**
 * 	Remove Post Type Slug From Permalink
 * 	This will remove /programs/ from the url of the
 * 	school.
 */
function remove_program_slug( $post_link, $post, $leavename ) {
	if ( 'program' != $post->post_type || 'publish' != $post->post_status ) {
		return $post_link;
	}

	$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
	return $post_link;
}
add_filter( 'post_type_link', 'remove_program_slug', 10, 3 );


function parse_program_request( $query ) {
	// Only noop the main query
	if ( ! $query->is_main_query() ) {
		return; }

	// Only noop our very specific rewrite rule match
	if ( 2 != count( $query->query )
		|| ! isset( $query->query['page'] ) ) {
		return; }

	// 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
	if ( ! empty( $query->query['name'] ) ) {
		$query->set( 'post_type', array( 'post', 'program', 'page' ) ); }
}
add_action( 'pre_get_posts', 'parse_program_request' );



/**
 * 	Get Program Information Class
 *
 *	The ProgramInfo class returns all of the information
 * 	needed to build a program page.
 *
 * 	@param string program_id
 * 	@return object ProgramInfo
 */

class ProgramInfo {
	var $cur_date;
	var $program_id;
	var $program_slug;
	var $program_short_name;
	var $schedule;
	var $rolling_enrollment_status;
	var $academic_info;

	public function populate_schedule() {

		$i = 1;
		$start_date = 'start_date' . $i;
		$end_date = 'end_date' . $i;
		$total_cost = 'total_cost' . $i;
		$app_deadline = 'app_deadline' . $i;
		$this->cur_date = date( 'Ymd' );

		while ( rwmb_meta( $start_date, '', $program_id = $this->program_id ) != '' ) {

			//----- ONLY DISPLAY FUTURE SCHOOLS -----//
			if ( rwmb_meta( $start_date, '', $program_id = $this->program_id ) >= $this->cur_date ) {
                
                // Define Cost
                $total_cost = rwmb_meta( $total_cost, '', $program_id = $this->program_id );

				$this->schedule[ $i ] = array(
					'start_date' => rwmb_meta( $start_date, '', $program_id = $this->program_id ),
					'end_date'	 => rwmb_meta( $end_date, '', $program_id = $this->program_id ),
					'total_cost' => $total_cost ? 'USD ' . number_format( $total_cost ) : 'Not Available',
					'app_deadline'	=> rwmb_meta( $app_deadline, '', $program_id = $this->program_id ),
				);

				$this->schedule[ $i ]['quarter'] = define_quarter( rwmb_meta( $start_date, '', $program_id = $this->program_id ) );
			}

			$i = ++$i;
			$start_date = 'start_date' . $i;
			$end_date = 'end_date' . $i;
			$total_cost = 'total_cost' . $i;
			$app_deadline = 'app_deadline' . $i;
		}

		if ( isset($this->schedule) ) {
			usort( $this->schedule, array($this, 'sort_by_date') );
		}

	}


	public function populate_academic_info() {

		$this->academic_info = array(
			'program_duration' => rwmb_meta( 'program_duration', '', $program_id = $this->program_id ),
			'recommended_prereqs' => rwmb_meta( 'custom_prereqs', '', $program_id = $this->program_id ),
			'accreditation' => rwmb_meta( 'accreditation', '', $program_id = $this->program_id ),
			'has_outreach' => rwmb_meta( 'has_outreach_phase', '', $program_id = $this->program_id ),
		);

	}


	//----- SORT DATES IN SCHEDULE -----//
	public function sort_by_date($a, $b) {
		return ($a['start_date'] < $b['start_date']) ? -1 : 1;
	}


	function __construct($program_id) {
		$this->program_id = $program_id;
		$post_object = get_post( $this->program_id );
		$this->program_slug = $post_object->post_name;
		$this->program_short_name = rwmb_meta( 'short_name', '', $post_id = $this->program_id );
		setlocale( LC_MONETARY,'en_US' );

		// Populate Schedule if Ongoing Status is False
		$this->rolling_enrollment_status = rwmb_meta( 'rolling_enrollment_status', '', $post_id = $this->program_id );
		if ( 0 == $this->rolling_enrollment_status ) {
			$this->populate_schedule();
		} else {

			//Get Rolling Enrollment Information
			$this->schedule = array(
				'rolling_enrollment_desc' => rwmb_meta( 'rolling_enrollment_desc', '', $post_id = $this->program_id ),
			);
		}

		// Populate Academic Info
		$this->populate_academic_info();
	}

}




//----- FUNCTION TO GET THE PROGRAMS CLASS AND RETURN OBJECT -----//
function get_program_classification($program_id) {
	$program_classification = wp_get_post_terms( $program_id, 'program_classification' );
	return $program_classification;
}




//---------------------------------------------------------------//
//----- CLASS TO RETIRVE AND RETURN UPCOMING SCHOOLS OBJECT -----//
//---------------------------------------------------------------//

class ProgramDates {
	var $cur_date;
	var $schools;
	var $featured;

	//---- BUILD UPCOMING SCHOOLS OBJECT -----//
	public function get_schools() {
        global $post;

		//----- STORE ALL INSTANCES OF SCHOOLS IN ARRAY BASED ON SCHOOL ID -----//
		$raw_programs = new WP_Query( 'post_type=program&nopaging=true' );

		if ( $raw_programs->have_posts() ) {
			while ( $raw_programs->have_posts() ) {
				$raw_programs->the_post();

				$i = 1;
				$start_date = 'start_date' . $i;
				while ( rwmb_meta( $start_date ) != '' ) {

					//GET PROGRAM CLASSIFICATION
					$program_class = get_the_terms( $raw_programs->post->ID, 'program_classification' );
					reset( $program_class );
					$program_class_key = key( $program_class );

					if ( rwmb_meta( $start_date, '', $post_id = $post->ID ) > $this->cur_date ) {

						$raw_program_dates[] = array(
							'program_name'  => $raw_programs->post->post_title,
							'slug'			=> $raw_programs->post->post_name,
							'program_id'	=> $raw_programs->post->ID,
							'program_class' => $program_class[ $program_class_key ]->name,
							'start_date'	=> rwmb_meta( $start_date ),
							'quarter'		=> define_quarter( rwmb_meta( $start_date ) ),
						);
					}
					$i = ++$i;
					$start_date = 'start_date' . $i;
				}
			}
			$this->schools = $raw_program_dates;
			usort( $this->schools, array($this, 'sort_by_date') );

		}
	}


	//----- SORT UPCOMING SCHOOLS BY DATE -----//
	public function sort_by_date($a, $b) {
		return ($a['start_date'] < $b['start_date']) ? -1 : 1;
	}

	function __construct() {
		$this->cur_date = date( 'Ymd' );
		$this->get_schools();
		wp_reset_postdata();
	}
}

//------------------------------------------------//
//----- PROGRAM DATES CLASS HELPER FUNCTIONS -----//
//------------------------------------------------//

	//----- GET UPCOMING SCHOOLS -----//
function get_upcoming_schools($num_requested) {
	$programs = new ProgramDates();

	// Define Upcoming Schools Variable
	$upcoming_schools = array();

	/*	Search Array Function
     *
	 *  We use this function to verify that there aren't
	 *  any duplicate programs displayed, even if they are
	 *  "more" upcoming than others.
	 */

	function search_array($needle, $haystack) {
		if ( in_array( $needle, $haystack ) ) {
			 return true;
		}
		foreach ( $haystack as $element ) {
			if ( is_array( $element ) && search_array( $needle, $element ) ) {
				 return true; }
		}
			return false;
	}

	// Use the search_array function to check for duplicate school entries
	foreach ( $programs->schools as $program ) {
		if ( ! search_array( $program['slug'], $upcoming_schools ) ) {
			$upcoming_schools[] = $program;
		}
	}

	// Grab the 10 closest schools and shuffle them.
	$upcoming_schools = array_slice( $upcoming_schools, 0, 10 );
	shuffle( $upcoming_schools );

	// Package upcoming schools and inject back into the object.
	$programs->schools = array_slice( $upcoming_schools, 0, $num_requested );
	return $programs;
}


/**
 * Display Also Available Via Correspondence
 * This function displays the also available via correspondence link
 * wherever it is called.
 */

function available_via_correspondence_link() {
	if ( rwmb_meta( 'via_correspondence' ) ) : ?>
		<div class="via-correspondence-link">
			<a href="#viacorrespondence">Also Available Via Correspondence<i class="fa fa-info info-circle-link"></i></a>
		</div>
	<?php endif;
}




/**
 * Get Quarter of Program
 *
 * @param string date_string
 * @return string quarter_string
 */

function define_quarter($date_string) {

	$program_year = substr( $date_string, 0, 4 );

	if ( preg_match( '^[0-9]{4}[0]{1}[1-2]{1}[0-9]{2}$^', $date_string ) ) {
		$quarter_string = 'Winter ' . $program_year;
		return $quarter_string;
	} elseif ( preg_match( '^[0-9]{4}[0]{1}[3-5]{1}[0-9]{2}$^', $date_string ) ) {
		$quarter_string = 'Spring ' . $program_year;
		return $quarter_string;
	} elseif ( preg_match( '^[0-9]{4}[0]{1}[6-8]{1}[0-9]{2}$^', $date_string ) ) {
		$quarter_string = 'Summer ' . $program_year;
		return $quarter_string;
	} elseif ( preg_match( '^[0-9]{4}[0-1][0-2,9][0-9]{2}$^', $date_string ) ) {
		$quarter_string = 'Fall ' . $program_year;
		return $quarter_string;
	} else {
		return 0;
	}
}


class PostRibbon
{
	var $post_id;
	var $post_color_info;
	var $total_terms;

	//----- GENERATE AND DECLARE POST COLOR INFORMAITON -----//
	public function post_color_info()
	{
		$this->post_color_info = array();
		$this->total_terms = 0;

		//----- LOOP THROUGH RELATED PROGRAMS -----//
		$related_programs = wp_get_post_terms( $this->post_id, 'program_taxo' );
		foreach ( $related_programs as $program ) {
			$program = get_page_by_path( $program->slug, OBJECT, 'program' );

			//----- GET COLOR DATA BASED ON PROGRAMS CLASSIFICATION -----//
			$program_class = get_program_class( $program->ID );
			foreach ( $program_class as $classification ) {
				$class_slug = $classification->slug;

				if ( array_key_exists( $classification->slug, $this->post_color_info ) ) {
					$this->post_color_info[ $class_slug ]['count'] = ++$this->post_color_info[ $class_slug ]['count'];
				} else {
					$this->post_color_info[ $class_slug ] = array('slug' => $class_slug, 'count' => 1, 'color' => get_program_color( $program->ID ));
				}

				//----- UPDATE TOTAL TERMS EVERYTIME TERM IN FOUND -----//
				$this->total_terms = ++$this->total_terms;
			}
		}

		usort( $this->post_color_info, array($this, 'sort_by_count') );
	}

	//----- SORT CLASSIFICATIONS BASED ON COUNT -----//
	public function sort_by_count($a, $b)
	{
		return ($a['count'] > $b['count']) ? -1 : 1;
	}

	//----- DISPLAY POST RIBBON -----//
	public function build_ribbon($orientation, $thickness)
	{

		//----- DEFINE STYLES -----//
		if ( 'vertical' == $orientation ) {
			$styles = 'width:' . $thickness . 'px;';
			$container_class = 'vertical';
		} else {
			$styles = 'height:' . $thickness . 'px;';
			$container_class = 'horizontal';
		}

		//----- BUILD THE RIBBON -----//
		echo '<div style="' . $styles . '" class="post-ribbon-container ' . $container_class . '">';
		foreach ( $this->post_color_info as $ribbon ) {
			if ( 'vertical' == $orientation ) {
				echo '<div style="height: ' . (($ribbon['count'] / $this->total_terms) * 100) . '%; background: ' . $ribbon['color'] . ';" class="post-ribbon"></div>';
			} else {
				echo '<div style="width: ' . (($ribbon['count'] / $this->total_terms) * 100) . '%; background: ' . $ribbon['color'] . ';" class="post-ribbon"></div>';
			}
		}
		echo '</div>';
	}

	function __construct($post_id)
	{
		$this->post_id = $post_id;
		$this->post_color_info();
	}

}




//----- FUNCTION TO GET THE PROGRAMS CLASS AND RETURN OBJECT -----//
function get_program_class($program_id)
{
	$program_class = wp_get_post_terms( $program_id, 'program_classification' );
	return $program_class;
}



//-----------------------------------------------------------------//
//----- FUNCTIONS TO GET PROGRAM COLOR BASED ON CLASSIFICATION -----//
//-----------------------------------------------------------------//

function get_program_color($post_id)
{

	$terms = get_program_class( $post_id );
	$program_slug = $terms[0]->slug . '-class-color';

	$program_color = of_get_option( $program_slug );
	return $program_color;
}

function get_classification_color($classification)
{
	$classification = $classification . '-class-color';
	print_r( $classification );

	$program_color = of_get_option( $program_slug );
	return $program_color;
}


//-----------------------------------------------------------------//
//----- FUNCTION TO GET COLOR RIBBON WITH ALL CLASSIFICATIONS -----//
//-----------------------------------------------------------------//

function all_class_ribbon($height)
{

	echo '<div class="all-class-ribbon" style="height: ' . $height . 'px";>';
	$classifications = get_terms( 'program_classification' );
	$width = 100 * (1 / count( $classifications ));
	foreach ( $classifications as $classification ) {
		$format = '<div class="%s" style="background: %s; width:' . $width . '%%; float: left; height: 100%%"></div>';
		$slug = $classification->slug;
		$color = get_classification_color( $slug );

		echo sprintf( $format, $slug, $color );
	}
	echo '</div>';
}



?>