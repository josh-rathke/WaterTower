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
		'has_archive'   => true,
		'taxonomies' 	=> array('post_tag'),
		'rewrite' => array('slug' => 'programs'), 
	);
	register_post_type( 'program', $args );	
}
add_action( 'init', 'my_custom_post_program' );



/**
 * 	Get Program Information Class
 * 
 *	The programInfo class returns all of the information
 * 	needed to build a program page.
 *
 * 	@param string program_id
 * 	@return object programInfo
 */		

class programInfo {
	var $cur_date;
	var $program_id;
	var $program_slug;
	var $program_short_name;
	var $schedule;
	var $ongoing_status;
	var $academic_info;
	
	public function populate_schedule() {
		
		$i = 1;
		$start_date = 'start_date' . $i;
		$end_date = 'end_date' . $i;
		$total_cost = 'total_cost' . $i;
		$app_deadline = 'app_deadline' . $i;
		$this->cur_date = date('Ymd');
		
		
		$app_color_settings = get_option('program_options');
		$open_app_color = $app_color_settings['program_open_app_color'];
		$closed_app_color = $app_color_settings['program_closed_app_color'];
		
		while (rwmb_meta($start_date, '', $program_id=$this->program_id) != '') {
			
			//----- ONLY DISPLAY FUTURE SCHOOLS -----//
			if (rwmb_meta($start_date, '', $program_id=$this->program_id) >= $this->cur_date) {
				
				$this->schedule[$i] = array(
					'start_date' => rwmb_meta($start_date, '', $program_id=$this->program_id),
					'end_date'	 => rwmb_meta($end_date, '', $program_id=$this->program_id),
					'total_cost' => 'USD ' . number_format(rwmb_meta($total_cost, '', $program_id=$this->program_id)),
					'app_deadline'	=> rwmb_meta($app_deadline, '', $program_id=$this->program_id),
				);
				
				$this->schedule[$i]['quarter'] = define_quarter(rwmb_meta($start_date, '', $program_id=$this->program_id)); 
				
				//----- DEFINE AMERICAN APP STATUS -----//
				if ($this->cur_date > rwmb_meta($app_open_date, '', $program_id=$this->program_id) && $this->cur_date < rwmb_meta($app_deadline, '', $program_id=$this->program_id)) {
					$this->schedule[$i]['app_status'] = 'open';
					$this->schedule[$i]['app_status_color'] = $open_app_color;
				} else {
					$this->schedule[$i]['app_status'] = 'closed';
					$this->schedule[$i]['app_status_color'] = $closed_app_color;
				}
			}
			
			$i = ++$i;
			$start_date = 'start_date' . $i;
			$end_date = 'end_date' . $i;
			$total_cost = 'total_cost' . $i;
			$app_deadline = 'app_deadline' . $i;
		}
	
		if (isset($this->schedule)) {
			usort($this->schedule, array($this, 'sort_by_date'));
		}
		
	}
	
	
	public function populate_academic_info() {
	
		$raw_prereqs = get_the_terms( $this->program_id, 'prereqs_taxo', '', $program_id=$this->program_id);
		foreach ($raw_prereqs as $prereq) {
			if ($prereq->slug != $this->program_slug) {
				$filtered_prereqs[] = array(
					'slug' => $prereq->slug,
					'name' => $prereq->name,
				);
			}
		}
		
		$this->academic_info = array(
			'short_name' => rwmb_meta('short_name', '', $program_id=$this->program_id),
			'program_acronym' => rwmb_meta('acronym', '', $program_id=$this->program_id),
			'program_duration' => rwmb_meta('program_duration', '', $program_id=$this->program_id),
			'min_age_wo_ged' => rwmb_meta('min_age_woged_prereqs', '', $program_id=$this->program_id),
			'program_prereqs' => $filtered_prereqs != '' ? $filtered_prereqs : null,
			'recommended_prereqs' => rwmb_meta('custom_prereqs', '', $program_id=$this->program_id),
			'accreditation' => rwmb_meta('accreditation', '', $program_id=$this->program_id),
			'has_outreach' => rwmb_meta('has_outreach_phase', '', $program_id=$this->program_id),
			'outreach_duration' => rwmb_meta('outreach_phase_duration', '', $program_id=$this->program_id),
			'outreach_locale' => rwmb_meta('outreach_locale', 'type=checkbox_list', $program_id=$this->program_id),
		);
		
	}
	
	
	//----- SORT DATES IN SCHEDULE -----//
	public function sort_by_date($a, $b) {
		return ($a['start_date'] < $b['start_date']) ? -1 : 1;
	}
	
	
	function __construct($program_id) {
		$this->program_id = $program_id;
		$post_object = get_post($this->program_id);
		$this->program_slug = $post_object->post_name;
		$this->program_short_name = rwmb_meta( 'short_name', '', $post_id=$this->program_id);
		setlocale(LC_MONETARY,"en_US");
	
		// Populate Schedule if Ongoing Status is False
		// Set App Status to Open if True
		$this->ongoing_status = rwmb_meta('ongoing_status', '', $post_id=$this->program_id);
		if ($this->ongoing_status == 0) {
			$this->populate_schedule();
		} else {
		
			//Get ongoing program description
			$program_settings = get_option('program_options');
			$ongoing_desc = $program_settings['ongoing_program_message'];
			$ongoing_support_desc = $program_settings['ongoing_support_desc'];
			
			$app_color_settings = get_option('program_options');
			$open_app_color = $app_color_settings['program_open_app_color'];
			$closed_app_color = $app_color_settings['program_closed_app_color'];
			$app_status_color = rwmb_meta('ongoing_app_status', '', $post_id=$this->program_id) == 'open' ? $open_app_color : $closed_app_color;
		
			$this->schedule[] = array(
				'app_status' => 'open',
				'app_status_color' => $app_status_color,
				'ongoing_desc' => $ongoing_desc,
				'has_fixed_price' => rwmb_meta('has_fixed_price', '', $post_id=$this->program_id),
				'ongoing_fixed_price'	=> rwmb_meta('ongoing_fixed_price', '', $post_id=$this->program_id) != '' ? money_format( '%i', rwmb_meta('ongoing_fixed_price', '', $post_id=$this->program_id)) : null,
				'via_correspondence_fixed_price'	=> rwmb_meta('via_correspondence_fixed_price', '', $post_id=$this->program_id) != '' ? money_format( '%i', rwmb_meta('via_correspondence_fixed_price', '', $post_id=$this->program_id)) : null,					
				'ongoing_support_desc' => $ongoing_support_desc,
				'ongoing_app_status' => rwmb_meta('ongoing_app_status', '', $post_id=$this->program_id),
				'ongoing_startup_cost' => rwmb_meta('ongoing_startup_cost', '', $post_id=$this->program_id) != '' ? money_format( '%i', rwmb_meta('ongoing_startup_cost', '', $post_id=$this->program_id)) : null,
				'ongoing_monthly_cost' => rwmb_meta('ongoing_monthly_cost', '', $post_id=$this->program_id) != '' ? money_format( '%i', rwmb_meta('ongoing_monthly_cost', '', $post_id=$this->program_id)) : null,
				'ongoing_min_support_single' => rwmb_meta('ongoing_min_support_single', '', $post_id=$this->program_id) != '' ? money_format( '%i', rwmb_meta('ongoing_min_support_single', '', $post_id=$this->program_id)) : null,
				'ongoing_min_support_married' => rwmb_meta('ongoing_min_support_married', '', $post_id=$this->program_id) != '' ? money_format( '%i', rwmb_meta('ongoing_min_support_married', '', $post_id=$this->program_id)) : null,
			);
		}
		
		// Populate Academic Info
		$this->populate_academic_info();
	}
	
}	
	












//----- FUNCTION TO GET THE PROGRAMS CLASS AND RETURN OBJECT -----//
function get_program_classification($program_id) {
	$program_classification = wp_get_post_terms($program_id, 'program_classification');
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
				
				//----- STORE ALL INSTANCES OF SCHOOLS IN ARRAY BASED ON SCHOOL ID -----//
				$raw_programs = new WP_Query( 'post_type=program&nopaging=true' );
				
				if ( $raw_programs->have_posts() ) {
					while ( $raw_programs->have_posts() ) {
						$raw_programs->the_post();
						
						$i = 1;
						$start_date = 'start_date' . $i;
						while (rwmb_meta($start_date) != '') {
						
							//GET PROGRAM CLASSIFICATION
							$program_class = get_the_terms($raw_programs->post->ID, 'program_classification');
							reset($program_class);
							$program_class_key = key($program_class);
							
							
							
							if (rwmb_meta($start_date, '', $post_id=$post->ID) > $this->cur_date) {
							
								$raw_program_dates[] = array(
									'program_name'  =>	$raw_programs->post->post_title,
									'slug'			=>	$raw_programs->post->post_name,
									'program_id'	=>	$raw_programs->post->ID,
									'program_class' =>	$program_class[$program_class_key]->name,
									'start_date'	=>	rwmb_meta($start_date),
									'quarter'		=>	define_quarter(rwmb_meta($start_date)),
								);
							}
							$i = ++$i;
							$start_date = 'start_date' . $i;
						}
					}
				$this->schools = $raw_program_dates;
				usort($this->schools, array($this, 'sort_by_date'));

				}
			}
			
			
			//----- SORT UPCOMING SCHOOLS BY DATE -----//
			public function sort_by_date($a, $b) {
				return ($a['start_date'] < $b['start_date']) ? -1 : 1;
			}
				
			
			
			function __construct() {
				$this->cur_date = date('Ymd');
				$this->get_schools();
			}
		}
		
		//------------------------------------------------//
		//----- PROGRAM DATES CLASS HELPER FUNCTIONS -----//
		//------------------------------------------------//
		
			//----- GET UPCOMING SCHOOLS -----//
			function get_upcoming_schools($num_requested) {
				$programs = new ProgramDates();
				
				$programs->schools = array_slice($programs->schools, 0, 8);
				shuffle($programs->schools);
				
				//----- FINALIZE RANDOMIZED SCHOOLS
				$programs->schools = array_slice($programs->schools, 0, $num_requested);
				return $programs;
			}
			
			
			
			
			
			
			
			
/**
 * Get Quarter of Program
 *
 * @param string date_string
 * @return string quarter_string
 */

 function define_quarter($date_string) {
 
	$program_year = substr($date_string, 0, 4);
 
	if (preg_match('^[0-9]{4}[0]{1}[1-2]{1}[0-9]{2}$^', $date_string)) {
		$quarter_string = 'Winter ' . $program_year;
		return $quarter_string;
	} elseif (preg_match('^[0-9]{4}[0]{1}[3-5]{1}[0-9]{2}$^', $date_string)) {
		$quarter_string = 'Spring ' . $program_year;
		return $quarter_string;
	} elseif (preg_match('^[0-9]{4}[0]{1}[6-8]{1}[0-9]{2}$^', $date_string)) {
		$quarter_string = 'Summer ' . $program_year;
		return $quarter_string;
	} elseif (preg_match('^[0-9]{4}[0-1][0-2,9][0-9]{2}$^', $date_string)) {
		$quarter_string = 'Fall ' . $program_year;
		return $quarter_string;
	} else {
		return 0;
	}
 }



?>