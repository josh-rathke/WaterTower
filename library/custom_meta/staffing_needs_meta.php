<?php

/*	Staff Needs Custom Meta
 *	This is where all of the custom meta for any of the 
 *	staff needs goes along with the archive page.
 */
 
$meta_boxes[] = array(
	'title'  => 'Staff Needs',
	'pages' => array( 'staffing_needs'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
		array(
			'name'  => 'Helpful Skills',
			'id'    => "{$prefix}helpful_skills",
			'desc'  => 'List some skills that are helpful for the person fulfilling this role to have.',
			'type'  => 'textarea',
			'std'   => '',
		),
		
		array(
			'name'  => 'Requirements',
			'id'    => "{$prefix}requirements",
			'desc'  => 'If there are any requirements for someone to fill this role, please list them here.',
			'type'  => 'textarea',
			'std'   => '',
		),
	),
);


// Staff Needs Archive Page
$meta_boxes[] = array(
	'title'  => 'What To Expect Section',
	'pages' => array( 'page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
		// ENABLE STAFF NEEDS
		array(
			'name' => __( 'Enable What To Expect Section', 'meta-box' ),
			'id'   => "{$prefix}enable_what_to_expect",
			'type' => 'checkbox',
			'std'  => 1,
		),
		
		// WHAT TO EXPECT TITLE
		array(
			'name'  => 'What To Expect Title',
			'id'    => "{$prefix}what_to_expect_title",
			'desc'  => 'Insert the title of the what to expect section.',
			'type'  => 'text',
			'std'   => 'What To Expect While on Staff',
			'clone' => false,
		),
		
		// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => __( 'What To Expect', 'meta-box' ),
			'id'   => "{$prefix}what_to_expect",
			'type' => 'wysiwyg',
			'raw'  => false,
			'std'  => __( '', 'meta-box' ),

			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		
	),
	'only_on'    => array(
		'id'       => array(),
		'slug'  => array( 'staffing-needs' ),
		'template' => array(),
		'parent'   => array()
	),
);


$meta_boxes[] = array(
	'title'  => 'Staff Commitment Section',
	'pages' => array( 'page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
		// ENABLE STAFF NEEDS
		array(
			'name' => __( 'Enable Staff Commitment Section', 'meta-box' ),
			'id'   => "{$prefix}enable_staff_commitment",
			'type' => 'checkbox',
			'std'  => 1,
		),
		
		// WHAT TO EXPECT TITLE
		array(
			'name'  => 'Staff Commitment Title',
			'id'    => "{$prefix}staff_commitment_title",
			'desc'  => 'Insert the title of the staff commitment section.',
			'type'  => 'text',
			'std'   => 'Staff Commitment',
			'clone' => false,
		),
		
		// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => __( 'Staff Commitment', 'meta-box' ),
			'id'   => "{$prefix}staff_commitment",
			'type' => 'wysiwyg',
			'raw'  => false,
			'std'  => __( '', 'meta-box' ),

			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		
	),
	'only_on'    => array(
		'id'       => array(),
		'slug'  => array( 'staff-needs' ),
		'template' => array(),
		'parent'   => array()
	),
);

$meta_boxes[] = array(
	'title'  => 'Position Descriptions Section',
	'pages' => array( 'page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
		// ENABLE STAFF NEEDS
		array(
			'name' => __( 'Enable Position Descriptions Section', 'meta-box' ),
			'id'   => "{$prefix}enable_position_descriptions",
			'type' => 'checkbox',
			'std'  => 1,
		),
		
		// WHAT TO EXPECT TITLE
		array(
			'name'  => 'Staff Commitment Title',
			'id'    => "{$prefix}position_descriptions_title",
			'desc'  => 'Insert the title of the staff commitment section.',
			'type'  => 'text',
			'std'   => 'Position Descrptions',
			'clone' => false,
		),
		
		// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => __( 'Staff Commitment', 'meta-box' ),
			'id'   => "{$prefix}position_descriptions_intro",
			'type' => 'wysiwyg',
			'raw'  => false,
			'std'  => __( '', 'meta-box' ),

			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		
	),
	'only_on'    => array(
		'id'       => array(),
		'slug'  => array( 'staff-needs' ),
		'template' => array(),
		'parent'   => array()
	),
);


$meta_boxes[] = array(
	'title'  => 'Request Info Section',
	'pages' => array( 'page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
		// ENABLE STAFF NEEDS
		array(
			'name' => __( 'Enable Request Info Section', 'meta-box' ),
			'id'   => "{$prefix}enable_request_info",
			'type' => 'checkbox',
			'std'  => 1,
		),
		
		// WHAT TO EXPECT TITLE
		array(
			'name'  => 'Request Info Title',
			'id'    => "{$prefix}request_info_title",
			'desc'  => 'Insert the title of the request info section.',
			'type'  => 'text',
			'std'   => 'Request Info',
			'clone' => false,
		),
		
		// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => __( 'Request Info Description', 'meta-box' ),
			'id'   => "{$prefix}request_info_desc",
			'type' => 'wysiwyg',
			'raw'  => false,
			'std'  => __( '', 'meta-box' ),

			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		
	),
	'only_on'    => array(
		'id'       => array(),
		'slug'  => array( 'staff-needs' ),
		'template' => array(),
		'parent'   => array()
	),
);



?>