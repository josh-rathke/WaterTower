<?php


$meta_boxes[] = array(
	'title'  => 'Alert Slide',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		// Enable Alert Box
		array(
				'name' => 'Alert Slide',
				'id'   => "{$prefix}enable_alert_slide",
				'type' => 'checkbox',
		),

		// Alert Title
		array(
				'name' => 'Alert Title',
				'id'   => "{$prefix}alert_title",
				'type' => 'text',
		),

		// Alert Description
		array(
				'name' => 'Alert Description',
				'id'   => "{$prefix}alert_desc",
				'type' => 'textarea',
		),

		// Alert Page Link
		array(
				'name' => 'Alert Page Link',
				'id'   => "{$prefix}alert_page_link",
				'type' => 'text',
		),

		// Alert Box Background
		array(
			'name'             => __( 'Alert Box Background Image', 'meta-box' ),
			'id'               => "{$prefix}alert_bg_image",
			'type'             => 'image_advanced',
			'max_file_uploads' => 1,
		),

		// Isolate Slide
		array(
				'name' => 'Isolate Slide',
				'id'   => "{$prefix}isolate_alert_slide",
				'type' => 'checkbox',
				'desc' => 'Check this box if you would like the alert slide to be the only slide that displays in the gallery.',
		),
	),

	'only_on'    => array(
		'id'       => array(),
		'template' => array( 'front-page.php' ),
		'parent'   => array()
	),
);



/**
 * 	Video Settings
 * 	These are the video settings for the front page.
 */

$meta_boxes[] = array(
	'title'  => 'Video Page',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		// Video Title
		array(
				'name' => 'Video Title',
				'id'   => "{$prefix}video_title",
				'type' => 'text',
				'desc' => 'Put the title of the video here.',
		),

		// Video Description
		array(
				'name' => 'Video Description',
				'id'   => "{$prefix}video_desc",
				'type' => 'textarea',
				'desc' => 'Put a description of the video here.',
		),

		// Video Link URL
		array(
				'name' => 'Video Link URL',
				'id'   => "{$prefix}video_link_url",
				'type' => 'text',
				'desc' => 'Put the link URL of the video here.',
		),

		// Video Link Text
		array(
				'name' => 'Video Link Text',
				'id'   => "{$prefix}video_link_text",
				'type' => 'text',
				'desc' => 'Put the link text of the video here.',
		),

		// Video Embed Code
		array(
				'name' => 'Video Embed Code',
				'id'   => "{$prefix}video_embed_code",
				'type' => 'textarea',
				'desc' => 'Put the embed code for the video here.',
		),

		// Video Related Programs
		array(
			'name'    => __( 'Related Programs', 'rwmb' ),
			'id'      => "{$prefix}video_related_programs",
			'type'    => 'post',
			'post_type' => 'program',
			'field_type' => 'select_advanced',
			'placeholder' => __( 'Select an Item', 'rwmb' ),
			'multiple'	=> true,

		),

	),

	'only_on'    => array(
		'id'       => array(),
		'template' => array( 'front-page.php' ),
		'parent'   => array()
	),
);

?>