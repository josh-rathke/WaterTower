<?php

$prefix = '';

global $meta_boxes;

$meta_boxes = array();

	include ('includes/custom_meta/projects_meta.php');
	include ('includes/custom_meta/staff_needs_meta.php');

$meta_boxes[] = array(
	'title'  => 'Profile Options',
	'pages' => array( 'guest-author'),
	'context' => 'side',
	'priority' => 'high',
	'fields' => array(
	
	
		//PERSONEL STATUS
		array (
			'name'	=> 'Personnel Status',
			'id'	=> "{$prefix}status",
			'type'	=> 'select',
			'options'=> array (
				'student' => 'Student',
				'staff'	  => 'Staff',
			),
		),
	
		//PROFILE STATUS
		array(
			'name' => 'Profile Status',
			'id'   => "{$prefix}profile_status",
			'type' => 'select',
			'options'  => array(
				'public'	=>	'Public',
				'private'	=>	'private',
			),
			'desc'	=> 'Setting a users profile to private will make it so that absolute none of their information is passed through the public side of the web site.  Posts, and teachings can still be assigned, but they will not be attributed to the author in the front end until their profile is set back to public.',
		),

	),

);



$meta_boxes[] = array(
	'title'  => 'Additional Facts',
	'pages' => array( 'guest-author'),
	'context' => 'normal',
	'priority' => 'low',
	'fields' => array(
		
		array(
			'name'  => 'Hometown',
			'id'    => "{$prefix}hometown",
			'desc'  => 'Put the users hometown, or country of origin.',
			'type'  => 'text',
			'std'   => '',
			'cloneable' => false,
		),
		
	),

);





$meta_boxes[] = array(
	'title'  => 'Family Information',
	'pages' => array( 'guest-author'),
	'context' => 'normal',
	'priority' => 'low',
	'fields' => array(
	
		//IS MARRIED
		array(
			'name' => 'Married',
			'id'   => "{$prefix}has_spouse",
			'type' => 'checkbox',
			'std'  => 0,
		),
		
		//GUEST AUTHOR SPOUSE
		array(
			'name'    => __( 'Spouse', 'rwmb' ),
			'id'      => "{$prefix}spouse",
			'type'    => 'post',

			// Post type
			'post_type' => 'guest-author',
			'field_type' => 'select_advanced',
			'std'		=> '',
			'placeholder' => __( 'Select an Item', 'rwmb' ),
		),
		
		//HEAD OF HOUSEHOLD
		array(
			'name' => 'Head of the Household',
			'id'   => "{$prefix}head_household",
			'type' => 'checkbox',
			'std'  => 0,
		),

	),

);



//GALLERY FUNCTION TO DISPLAY ADDITIONAL IMAGE INPUT BOX

$meta_boxes[] = array(
	'title'  => 'Slider Options',
	'pages' => array( 'target_nations', 'program', 'page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
		array(
			'name'             => 'Additional Images to Include',
			'id'               => "{$prefix}slide_imgs",
			'desc'				=> 'If desired, add more images in addition to the featured image.  Never set these images before a featured image has been set.',
			'type'             => 'image_advanced',
			'max_file_uploads' => 20,
		),
		
		//PHOTO CREDITS
		array(
			'name'  => 'Image Credits',
			'id'    => "{$prefix}image_credits",
			'desc'  => 'Insert, preferably in order, the names of those who have contributed photos to this site',
			'type'  => 'text',
			'std'   => '',
			'clone' => true,
		),

	),

);







// Target Nations Archive Page
$meta_boxes[] = array(
	'title'  => 'Additional Information',
	'pages' => array( 'target_nations' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
		//PHOTO CREDITS
		array(
			'name'  => 'Country ID',
			'id'    => "{$prefix}country_id",
			'desc'  => 'Enter the country ID of the country represented.',
			'type'  => 'text',
			'std'   => '',
		),

	),
	
);








//POST CUSTOM FIELDS

$meta_boxes[] = array(
	'title'  => 'Post Information',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		//PULL QUOTE
		array(
			'name'  => 'Pull Quote',
			'id'    => "{$prefix}pull_quote",
			'desc'  => 'Enter the Pull Quote of the article. A Pull Quote is one phrase that the author would like to be highlighted out of the entire work.  This quote will be pulled to the side of post and highlighted in a larger font in the left column of the page.',
			'type'  => 'textarea',
			'std'   => '',
		),
		
		//PHOTO CREDITS
		array(
			'name'  => 'Image Credits',
			'id'    => "{$prefix}image_credits",
			'desc'  => 'Insert, preferably in order, the names of those who have contributed photos to this site',
			'type'  => 'text',
			'std'   => '',
			'clone' => true,
		),

	),
	
);



$meta_boxes[] = array(
	'title'  => 'Geological Reference',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'id'            => 'address',
			'name'          => 'Location Title',
			'type'          => 'text',
			'std'           => 'Lakeside, United States',
		),
		array(
			'id'            => 'longlat',
			'name'          => 'Location',
			'type'          => 'map',
			'std'           => '-6.233406,-35.049906,15',     // 'latitude,longitude[,zoom]' (zoom is optional)
			'style'         => 'width: 500px; height: 500px',
			'address_field' => 'address',                     // Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
		),
	),
);


//Video Gallery Options
$meta_boxes[] = array(
	'title'  => 'Video Gallery Options',
	'pages' => array( 'program', 'class_portfolios', 'projects' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		//VIDEO GALLERY SHORT-CODE
		array(
			'name'  => 'Video Gallery Short-Code',
			'id'    => "{$prefix}video_shortcode",
			'desc'  => 'Insert the short code for the video gallery given from within the Vimeography plugin. Once this is set, it should not have to be set again.  All edits to the gallery can be performed from within the plugin. The short-code should look something like this: [vimeography id="9999999"]',
			'type'  => 'textarea',
			'std'   => '',
			'clone' => false,
		),
	),
);




//PROGRAM (SCHOOLS) CUSTOM POST TYPE CUSTOM FIELDS
$meta_boxes[] = array(
	'title'  => 'Program Information',
	'pages' => array( 'program' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
			'name'  => 'Short Name',
			'id'    => "{$prefix}short_name",
			'desc'  => 'If your program has an unusually long name, it may interfere with some of the design elements of the website.  We highly recommend assigning a shorterned version of the name here to use in sections where the forementioned example takes place.',
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),	
	
		array(
			'name'  => 'Program Acronym',
			'id'    => "{$prefix}acronym",
			'desc'  => 'Insert the program acronym.  For example Discipleship Training School would be DTS.  However, not all schools have an acronym that is directly derived from the first letter in each of the words of the school name, so make sure you have the acronym given by the school leader.',
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),
		
		array(
			'name'  => 'Program Duration (Weeks)',
			'id'    => "{$prefix}program_duration",
			'desc'  => 'Enter the program duration.',
			'type'  => 'number',
			'std'   => '',
		),		

		
		// SCHOOL LEADERS
		
		array(
			'name'    => __( 'School Leaders', 'rwmb' ),
			'id'      => "{$prefix}leaders",
			'type'    => 'post',
			'post_type' => 'guest-author',
			'field_type' => 'select_advanced',
			'placeholder' => __( 'Select an Item', 'rwmb' ),
			'multiple'	=> true,
			'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',

		),
		
		array(
			'name'  => __('Prerequisites', 'rwmb'),
			'id'    => "{$prefix}custom_prereqs",
			'desc'  => 'Please enter any recomended prerequisites needed to apply for this school here.',
			'type'  => 'textarea',
			'std'   => '',
			'clone' => false,
		),
		
		
		
		//ACCREDITATION
		array(
			'name'  => 'Accreditiation',
			'id'    => "{$prefix}accreditation",
			'desc'  => 'Please insert the accreditation info here.  If you are unsure what exactly to put, please email the registrar. DO NOT GUESS HERE.',
			'type'  => 'textarea',
			'std'   => '',
			'clone' => false,
		),

		
		
				
		//FILE ATTACHEMENTS
		array(
			'name' => 'Resource Documents',
			'id'   => "{$prefix}file",
			'type' => 'file_advanced',
			'desc' => 'Use this section to upload documents that may provide extra information about your program that may not be necessary to put on the main page of the program',
			'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),
		
	),
	
);



$meta_boxes[] = array(
	'title'  => 'Program Dates/Cost',
	'pages' => array( 'program' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
	
		array(
				'name' => 'Ongoing Status',
				'id'   => $prefix . 'ongoing_status',
				'type' => 'checkbox',
				'desc' => 'If the school or program has an ongoing status, meaning that the school does not have specific dates or times, but is always open for students willing to come, check this box',
			),
			
		// OFFERED VIA CORRESPONDENCE
		array(
			'name' => 'Offered Via Correspondence',
			'id'   => $prefix . 'via_correspondence',
			'type' => 'checkbox',
			'desc' => 'If the school is offered via correspondence check this box.',
		),
			
		array(
				'name' => 'Ongoing Application Status',
				'id'   => $prefix . 'ongoing_app_status',
				'type' => 'Select',
				'desc' => 'Since the school is ongoing, the application status needs to be set manually.  Please select a status for applications for this school.',
				'options' => array(
					'open' => 'open',
					'closed' => 'closed',
					'full'	=> 'full',
				),
			),
			
		array(
				'name' => 'Ongoing Total Cost',
				'id'   => $prefix . 'ongoing_startup_cost',
				'type' => 'number',
				'desc' => 'Enter the estimated startup cost of a student participating in this program.',
			),
			
		array(
				'name' => 'Ongoing Monthly Cost',
				'id'   => $prefix . 'ongoing_monthly_cost',
				'type' => 'number',
				'desc' => 'Enter the estimated monthly cost of a student in this program.',
			),
			
		array(
				'name' => 'Ongoing Minimum Required Support (Single)',
				'id'   => $prefix . 'ongoing_min_support_single',
				'type' => 'number',
				'desc' => 'Enter the minimum amount of support required to participate in this program.',
				
			),
			
		array(
				'name' => 'Ongoing Minimum Required Support (Married)',
				'id'   => $prefix . 'ongoing_min_support_married',
				'type' => 'number',
				'desc' => 'Enter the minimum amount of support required to participate in this program for married participants.',
				'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
			),
			
			
		array(
				'before' => '<h4>Ongoing Program Fixed Pricing</h4>',
				'name' => 'Enable Fixed Price',
				'id'   => $prefix . 'has_fixed_price',
				'type' => 'checkbox',
				'desc' => 'If this program has a fixed price, check this box.',
			),
			
		array(
			'name' => 'Fixed Price',
			'id'   => $prefix . 'ongoing_fixed_price',
			'type' => 'number',
			'desc' => 'Enter the ongoing fixed price of this program.',
		),
			
		array(
			'name' => 'Via Correspondence Price',
			'id'   => $prefix . 'via_correspondence_fixed_price',
			'type' => 'number',
			'desc' => 'Enter the ongoing fixed price of this program.',
			'after'=> '				<hr style="margin: 30px -12px;
								border-top: 1px solid #CCC;
								border-bottom: 1px solid #FFF;
								background-color: transparent;">',
		),
	
		
	
	



	
		array(
				'name' => 'Program Start Date',
				'id'   => $prefix . 'start_date1',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			
		
			
		array(
				'name' => 'Program End Date',
				'id'   => $prefix . 'end_date1',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			
		array(
			'name'  => 'Total Cost',
			'id'    => "{$prefix}total_cost1",
			'desc'  => 'Insert the program cost.  It will automatically be formatted when brought into the front end of the site, so there is no need to add commas or dollar signs.',
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),
		
		array(
				'name' => 'Application Open Date',
				'id'   => $prefix . 'app_open_date1',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			
		
			
		array(
				'name' => 'Application Deadline',
				'id'   => $prefix . 'app_deadline1',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			
		array(
				'name' => 'Application Deadline (International)',
				'id'   => $prefix . 'international_app_deadline1',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			
		array(
				'name' => 'Application Deadline (Canadian)',
				'id'   => $prefix . 'canadian_app_deadline1',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
		
			
		array(
				'name' => 'Application Deadline (African)',
				'id'   => $prefix . 'african_app_deadline1',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
				'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
			),		

		
				
		
	
	
	
	
	
	
		
		array(
				'name' => 'Program Start Date',
				'id'   => $prefix . 'start_date2',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			
		
			
		array(
				'name' => 'Program End Date',
				'id'   => $prefix . 'end_date2',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),	
			
		array(
			'name'  => 'Total Cost',
			'id'    => "{$prefix}total_cost2",
			'desc'  => 'Insert the program cost.  It will automatically be formatted when brought into the front end of the site, so there is no need to add commas or dollar signs.',
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),
		
		array(
				'name' => 'Application Open Date',
				'id'   => $prefix . 'app_open_date2',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			
		
			
		array(
				'name' => 'Application Deadline',
				'id'   => $prefix . 'app_deadline2',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			
		array(
				'name' => 'Application Deadline (International)',
				'id'   => $prefix . 'international_app_deadline2',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			
		array(
				'name' => 'Application Deadline (Canadian)',
				'id'   => $prefix . 'canadian_app_deadline2',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
		
			
		array(
				'name' => 'Application Deadline (African)',
				'id'   => $prefix . 'african_app_deadline2',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
				'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
			),		

		
		
		
		
		
		
		
		
		
		array(
				'name' => 'Program Start Date',
				'id'   => $prefix . 'start_date3',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			
		
			
		array(
				'name' => 'Program End Date',
				'id'   => $prefix . 'end_date3',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),	
			
		array(
			'name'  => 'Total Cost',
			'id'    => "{$prefix}total_cost3",
			'desc'  => 'Insert the program cost.  It will automatically be formatted when brought into the front end of the site, so there is no need to add commas or dollar signs.',
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),
		
		array(
				'name' => 'Application Open Date',
				'id'   => $prefix . 'app_open_date3',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
		
		
		array(
				'name' => 'Application Deadline',
				'id'   => $prefix . 'app_deadline3',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			
		array(
				'name' => 'Application Deadline (International)',
				'id'   => $prefix . 'international_app_deadline3',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			
		array(
				'name' => 'Application Deadline (Canadian)',
				'id'   => $prefix . 'canadian_app_deadline3',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
		
			
		array(
				'name' => 'Application Deadline (African)',
				'id'   => $prefix . 'african_app_deadline3',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
				'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
			),		
		
		
		
		
		
		
		
		
		
		
		
		array(
				'name' => 'Program Start Date',
				'id'   => $prefix . 'start_date4',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			
		
			
		array(
				'name' => 'Program End Date',
				'id'   => $prefix . 'end_date4',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),	
			
		array(
			'name'  => 'Total Cost',
			'id'    => "{$prefix}total_cost4",
			'desc'  => 'Insert the program cost.  It will automatically be formatted when brought into the front end of the site, so there is no need to add commas or dollar signs.',
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),
		
		array(
				'name' => 'Application Open Date',
				'id'   => $prefix . 'app_open_date4',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			
		
			
		array(
				'name' => 'Application Deadline',
				'id'   => $prefix . 'app_deadline4',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			
		array(
				'name' => 'Application Deadline (International)',
				'id'   => $prefix . 'international_app_deadline4',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
			
		array(
				'name' => 'Application Deadline (Canadian)',
				'id'   => $prefix . 'canadian_app_deadline4',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
		
			
		array(
				'name' => 'Application Deadline (African)',
				'id'   => $prefix . 'african_app_deadline4',
				'type' => 'date',

				// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
				'js_options' => array(
					'appendText'      => '(Month Day, Year)',
					'autoSize'        => true,
					'buttonText'      => 'Select Date',
					'dateFormat'      => 'yymmdd',
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
				'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
			),		

		
	),

);



// LECTURE PHASE CUSTOM FIELDS
$meta_boxes[] = array(
	'title'  => 'Lecture Phase',
	'pages' => array( 'program' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
	
		array(
			'name' => 'Lecture Phase Title',
			'id'   => "{$prefix}lecture_phase_title",
			'desc' => 'If Lecture Phase is not an appropriate title, then use this field to change the title of this section',
			'type' => 'text',
			'std'  => 'Lecture Phase',
		),
		
		array(
			'name' => 'Lecture Phase Description',
			'id'   => "{$prefix}lecture_phase_desc",
			'desc' => 'Describe lecture phase as a whole in this section.',
			'type' => 'textarea',
			'std'  => '',
		),
		
		array(
			'name' => 'Auto-Populate Lecture With Topics',
			'id'   => "{$prefix}lecture_block_num",
			'desc' => 'If you would like WordPress to auto populate the "lecture" activity block with the lecture topics listed below, then insert the "Block Number" that has been used for the "lecture" activity',
			'type' => 'number',
			'std'  => '0',
		),
		
		array(
			'name' => 'Lecture Topics',
			'id'   => "{$prefix}lecture_topics",
			'desc' => 'Insert the lecture topics you would like to be displayed on the site.',
			'type' => 'text',
			'std'  => '',
			'clone' => true,
		),
		
		
		
		array(
			'name' => 'Has Tracks',
			'id'   => "{$prefix}lecture_has_tracks",
			'desc' => 'If this school has tracks, check the box above.',
			'type' => 'checkbox',
			'std'  => 0,
			'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),
		
		
		
		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 1</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title1",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),
		
		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week1",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),
		
		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description1",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),
		
		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 2</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title2",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),
		
		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week2",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),
		
		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description2",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),
		
		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 3</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title3",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),
		
		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week3",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),
		
		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description3",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),
		
		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 4</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title4",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),
		
		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week4",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),
		
		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description4",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),
		
		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 5</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title5",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),
		
		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week5",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),
		
		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description5",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),
		
		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 6</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title6",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),
		
		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week6",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),
		
		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description6",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),
		
		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 7</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title7",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),
		
		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week7",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),
		
		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description7",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),
		
		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 8</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title8",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),
		
		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week8",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),
		
		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description8",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),
		
		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 9</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title9",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),
		
		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week9",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),
		
		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description9",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),
		
		array(
			'before' => '<h4 style="font-size: 16px; color: #666; text-shadow: 1px 1px 1px #FFF;">Lecture Phase Info Block 10</h4>',
			'name' => 'Activity Title',
			'id'   => "{$prefix}activity_title10",
			'desc' => 'Enter the title of the activity',
			'type' => 'text',
			'std'  => '',
		),
		
		array(
			'name' => 'Hours Per Week',
			'id'   => "{$prefix}hours_per_week10",
			'desc' => 'Enter how many hours per week this activity uses.',
			'type' => 'number',
			'std'  => '',
		),
		
		array(
			'name' => 'Description',
			'id'   => "{$prefix}activity_description10",
			'desc' => 'Enter a description for the activity, the description should briefly explain the heart behind the activity, and explain what the activity is, and how it serves the purpose of the school or program',
			'type' => 'wysiwyg',
			'std'  => '',
			'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),

		
	
	),
);

// OUTREACH PHASE CUSTOM FIELDS
$meta_boxes[] = array(
	'title'  => 'Outreach Phase',
	'pages' => array( 'program' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
		array(
			'name' => 'Has Outreach',
			'id'   => "{$prefix}has_outreach_phase",
			'desc' => 'Check this box if this school has an outreach phase.',
			'type' => 'select',
			'options' => array(
				'no'	=>	'No',
				'yes'	=>	'Yes',
				'as-god-allows'	=> 'As God Allows',
			),
		),
		
		array(
			'name' => 'Outreach Duration (Weeks)',
			'id'   => "{$prefix}outreach_phase_duration",
			'desc' => 'Enter the duration of the outreach phase in weeks',
			'type' => 'number',
			'std'  => '',
		),
		
		array(
			'name' => 'Outreach Locale',
			'id'   => "{$prefix}outreach_locale",
			'desc' => 'Choose all locales that apply to the outreach of the school',
			'type' => 'checkbox_list',
			'options'  => array (
					'international' 	=> 'International',
					'domestic'			=> 'Domestic',
			)
			,
		),
	
		array(
			'name' => 'Description',
			'id'   => "{$prefix}outreach_phase_desc",
			'desc' => 'Enter a description for the outreach phase of the school',
			'type' => 'wysiwyg',
			'std'  => '',
		),
	)
);



$meta_boxes[] = array(
	'title'  => 'Control Switches',
	'pages' => array( 'program' ),
	'context' => 'side',
	'priority' => 'low',
	'fields' => array(
	
		
		array(
			'name' => 'Include Outreach Map',
			'id'   => "{$prefix}display_map",
			'desc' => 'Check this box if you would like the outreach map to be display on the page',
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 0,
		),
		
		array(
			'name' => 'Online Application',
			'id'   => "{$prefix}app_link",
			'desc' => 'Check this box if this program can be applied for online',
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 1,
			'after'=> '				<hr style="margin: 30px -12px;
									border-top: 1px solid #CCC;
									border-bottom: 1px solid #FFF;
									background-color: transparent;">',
		),
		
		array(
			'name' => 'Enable Contact Form',
			'id'   => "{$prefix}program_contact_form",
			'desc' => '',
			'type' => 'checkbox',
			'std'  => 0,
		),
		
		array(
			'name'  => 'Contact Form ID',
			'id'    => "{$prefix}program_contact_form_id",
			'desc'  => '',
			'type'  => 'text',
			'std'   => '',
			'clone' => false,
		),
	
	),
);







/* 
 * Class Portfolio Fields
 * These are fields that are displayed during
 * the creation of a class portfolio.  All fields
 * are available using the meta box API.
 *
 */

$meta_boxes[] = array(
	'title'  => 'School Information',
	'pages' => array( 'class_portfolios' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
		// CLASS ACRONYM
			array(
				'name'  => __( 'Class Acronym', 'rwmb' ),
				'id'    => "{$prefix}class_acronym",
				'desc'  => __( 'Enter the class acronym here, for example: WDTS12.', 'rwmb' ),
				'type'  => 'text',
				'std'   => __( 'SDTS13', 'rwmb' ),
				'clone' => false,
			),
			
		// CLASS QUARTER
			array(
				'name'  => __( 'Class Quarter', 'rwmb' ),
				'id'    => "{$prefix}class_quarter",
				'desc'  => __( 'Enter the class quarter here, for example: Spring DTS 2013.', 'rwmb' ),
				'type'  => 'text',
				'std'   => __( 'Spring DTS 2013', 'rwmb' ),
				'clone' => false,
			),
			
		// CLASS VERSE REFERENCE
			array(
				'name'  => __( 'Class Verse Reference', 'rwmb' ),
				'id'    => "{$prefix}class_verse_reference",
				'desc'  => __( 'Enter the class verse reference here, for example: Romans: 8:15-17.', 'rwmb' ),
				'type'  => 'text',
				'std'   => __( 'John 3:16', 'rwmb' ),
				'clone' => false,
			),
			
		// CLASS VERSE
			array(
				'name'  => __( 'Class Verse', 'rwmb' ),
				'id'    => "{$prefix}class_verse",
				'desc'  => __( 'Enter the class verse here.', 'rwmb' ),
				'type'  => 'textarea',
				'std'   => __( '', 'rwmb' ),
				'clone' => false,
			),
			
		//
		
		//SCHOOL LEADRES
		array(
			'name'    => __( 'School Leaders', 'rwmb' ),
			'id'      => "{$prefix}leaders",
			'type'    => 'post',
			'post_type' => 'guest-author',
			'field_type' => 'select_advanced',
			'placeholder' => __( 'Select an Item', 'rwmb' ),
			'multiple'	=> true,
		),
		
		// IMAGE ADVANCED (WP 3.5+)
		array(
			'name'             => __( 'School Poster Upload', 'rwmb' ),
			'id'               => "{$prefix}poster1_thumbnail",
			'type'             => 'image_advanced',
			'max_file_uploads' => 1,
		),
		
		// FILE ADVANCED (WP 3.5+)
			array(
				'name' => __( 'File Advanced Upload', 'rwmb' ),
				'id'   => "{$prefix}school_poster_options",
				'type' => 'file_advanced',
				'max_file_uploads' => 4,
				'mime_type' => 'application,audio,video', // Leave blank for all file types
			),
	),
);

$meta_boxes[] = array(
	'title'  => 'Music Information',
	'pages' => array( 'class_portfolios' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
		//ENABLE MUSIC TRACK
		array(
			'name' => 'Enable Music Section',
			'name' => 'Enable Music Track',
			'id'   => "{$prefix}enable_music_track",
			'type' => 'checkbox',
			'std'  => 0,
		),
		
		// MUSIC Section Title
		array(
			'name' => __( 'Music Section Title', 'rwmb' ),
			'desc' => __( 'Enter the title of the music section', 'rwmb' ),
			'id'   => "{$prefix}cp_music_section_title",
			'type' => 'text',
		),
	
		// MUSIC Section EMBED CODE
		array(
			'name' => __( 'Music Section Explaination', 'rwmb' ),
			'desc' => __( 'Enter the explaination behind the album or track list.', 'rwmb' ),
			'id'   => "{$prefix}cp_music_track_exp",
			'type' => 'textarea',
			'cols' => 20,
			'rows' => 3,
		),
		

		// MUSIC TRACK EMBED CODE
		array(
			'name' => __( 'Bandcamp Embed Code', 'rwmb' ),
			'desc' => __( 'Enter the bandcamp embed code here.  Please change the width of the box to be 100%.', 'rwmb' ),
			'id'   => "{$prefix}cp_bandcamp_embed_code",
			'type' => 'textarea',
			'cols' => 20,
			'rows' => 3,
		),		
	),
);

$meta_boxes[] = array(
	'title'  => 'Creative Media Track Information',
	'pages' => array( 'class_portfolios' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
		//ENABLE CREATIVE MEDIA TRACK
		array(
			'name' => 'Enable Creative Media Track',
			'id'   => "{$prefix}enable_creative_media_track",
			'type' => 'checkbox',
			'std'  => 0,
		),
		
		array(
				'name' => __( 'Creative Media Track Entry', 'rwmb' ),
				'id'   => "{$prefix}cp_cm_track_entry",
				'type' => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'  => false,
				'std'  => __( 'Enter the Creative Media track information here...', 'rwmb' ),

				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
					'media_buttons' => true,
				),
			),
		
	),
);
















// EMMAUS ENCOUNTER
$meta_boxes[] = array(
	'title'  => 'Emmaus Encounter Options',
	'pages' => array( 'page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
		array(
			'name'    => __( 'Debriefing Team', 'rwmb' ),
			'id'      => "{$prefix}debriefing_team",
			'type'    => 'post',
			'post_type' => 'guest-author',
			'field_type' => 'select_advanced',
			'placeholder' => __( 'Select an Item', 'rwmb' ),
			'multiple'	=> true,
		),
	),
	'only_on'    => array(
		'id'       => array(),
		//'slug'  => array( 'slug' ),
		'template' => array( 'emmaus-encounter.php' ),
		'parent'   => array()
	),
);



// ANNUAL REPORTS
$meta_boxes[] = array(
	'title'  => 'Annual Report Information',
	'pages' => array( 'annual_report' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
		array(
			'name'  => 'Annual Report Embed Code',
			'id'    => "{$prefix}annual_report_embed_code",
			'desc'  => 'Enter the embed code provided for the annual report.',
			'type'  => 'textarea',
			'std'   => '',
		),
	),
);





//PAGE MAIN DISPLAY CONTROLS
$meta_boxes[] = array(
	'title'  => 'Display Controls',
	'pages' => array( 'page', 'focus_ministries' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
		array(
			'name'  => 'Menu Priority',
			'id'    => "{$prefix}menu_priority",
			'desc'  => 'Use integers such as 3, 4, and 5 to determine the menu location.  The Top of the primary menu column is determined by the lowest number, so number 1 will be at the top.  At the time of site launch, all menu items were given integers in multiples of 10 to allow for adjustment in the future.  For example, the top level menu item has been given a value of 10, and the following items were given, 20, 30, 40 etc.  This should allow for menu items to be inserted manually without having to change more than one value.',
			'type'  => 'text',
			'std'   => '1000',
			'clone' => false,
		),
	
	),
);




//FRONT PAGE
$meta_boxes[] = array(
	'title'  => 'Front Page General Content Settings',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
		array(
				'name' => 'Video Settings',
				'id'   => "{$prefix}video_shortcode",
				'type' => 'textarea',
				'desc' => 'Put the short-code for the video gallery you would like on the front page here.',
		),
		
		array(
				'name' => 'Class Portfolio Description',
				'id'   => "{$prefix}class_portfolio_description",
				'type' => 'textarea',
				'desc' => 'Put the Class Portfolio description here.',
		),
	),
		
	'only_on'    => array(
		'id'       => array(),
		//'slug'  => array( 'slug' ),
		'template' => array( 'front-page.php' ),
		'parent'   => array()
	),
);


$meta_boxes[] = array(
	'title'  => 'Call To Action Section',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
		array(
				'name' => 'Enable Call to Action Section',
				'id'   => "{$prefix}enable_cta",
				'type' => 'checkbox',
				'desc' => 'Check this box to enable the call to action section.',
		),
		
		array(
				'name' => 'Call To Action Title',
				'id'   => "{$prefix}cta_title",
				'type' => 'text',
				'desc' => 'Put the Title for the call to action section here.',
		),
		
		array(
				'name' => 'Call To Action Description',
				'id'   => "{$prefix}cta_description",
				'type' => 'textarea',
				'desc' => 'Put the description for the call to action section here.',
		),
		
		array(
				'name' => 'Call To Action Link URL',
				'id'   => "{$prefix}cta_link_url",
				'type' => 'text',
				'desc' => 'Put the link url for the call to action button here.  This will be the page that the user gets redirected to upon clicking the button.',
		),
		
		array(
				'name' => 'Call To Action Button Text',
				'id'   => "{$prefix}cta_button_text",
				'type' => 'text',
				'desc' => 'Put the text here that you would like to display on the button.',
		),
	),
		
	'only_on'    => array(
		'id'       => array(),
		//'slug'  => array( 'slug' ),
		'template' => array( 'front-page.php' ),
		'parent'   => array()
	),
);




//Alumni Page Fields
$meta_boxes[] = array(
	'title'  => 'Additional Information',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
		array(
				'name' => 'Enable Alumni Information Form',
				'id'   => "{$prefix}enable_alumni_form",
				'type' => 'checkbox',
				'desc' => 'Check this box to enable the alumni form to be displayed on the page.',
		),
		
		array(
				'name' => 'Form Shortcode',
				'id'   => "{$prefix}alumni_form_shortcode",
				'type' => 'text',
				'desc' => 'Insert the shortcode given for the particular Gravity Forms form here.',
		),
		
	),
		
	'only_on'    => array(
		'id'       => array(),
		//'slug'  => array( 'slug' ),
		'template' => array( 'alumni.php' ),
		'parent'   => array()
	),
);









//TEACHING CUSTOM POST TYPE CUSTOM FIELDS
$meta_boxes[] = array(
	'title'  => 'Media Files',
	'pages' => array( 'teachings' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
		array(
				'name' => 'Media File Upload',
				'id'   => "{$prefix}media_files",
				'type' => 'file',
		),
		
		array(
				'name' => 'Media File Source',
				'id'   => "{$prefix}media_files_source",
				'type' => 'text',
				'desc' => 'If the media file has an original source, please provide a URL to that source',
		),
		
		array(
				'name'    => __( 'Media Type', 'rwmb' ),
				'id'      => "{$prefix}media_type",
				'type'    => 'radio',
				// Array of 'value' => 'Label' pairs for radio options.
				// Note: the 'value' is stored in meta field, not the 'Label'
				'options' => array(
					'audio' => __( 'Audio', 'rwmb' ),
					'video' => __( 'Video', 'rwmb' ),
					'text'	=> __( 'Text', 'rwmb' ),
				),
		),
		
	),
);



/**
 * Register meta boxes
 *
 * @return void
 */
function rw_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) ) {
		foreach ( $meta_boxes as $meta_box ) {
			if ( isset( $meta_box['only_on'] ) && ! rw_maybe_include( $meta_box['only_on'] ) ) {
				continue;
			}

			new RW_Meta_Box( $meta_box );
		}
	}
}

add_action( 'admin_init', 'rw_register_meta_boxes' );

/**
 * Check if meta boxes is included
 *
 * @return bool
 */
function rw_maybe_include( $conditions ) {
	// Include in back-end only
	if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN ) {
		return false;
	}

	// Always include for ajax
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return true;
	}

	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	}
	elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}
	else {
		$post_id = false;
	}

	$post_id = (int) $post_id;
	$post    = get_post( $post_id );

	foreach ( $conditions as $cond => $v ) {
		// Catch non-arrays too
		if ( ! is_array( $v ) ) {
			$v = array( $v );
		}

		switch ( $cond ) {
			case 'id':
				if ( in_array( $post_id, $v ) ) {
					return true;
				}
			break;
			case 'parent':
				$post_parent = $post->post_parent;
				if ( in_array( $post_parent, $v ) ) {
					return true;
				}
			break;
			case 'slug':
				$post_slug = $post->post_name;
				if ( in_array( $post_slug, $v ) ) {
					return true;
				}
			break;
			case 'template':
				$template = get_post_meta( $post_id, '_wp_page_template', true );
				if ( in_array( $template, $v ) ) {
					return true;
				}
			break;
		}
	}

	// If no condition matched
	return false;
}