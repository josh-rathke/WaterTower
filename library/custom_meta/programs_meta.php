<?php

$meta_boxes[] = array(
		'title'     => __( 'Meta Box Tabs Demo', 'rwmb' ),
		// List of tabs, in one of the following formats:
		// 1) key => label
		// 2) key => array( 'label' => Tab label, 'icon' => Tab icon )
        'post_types'      => 'program',
		'tabs'      => array(
			'contact' => array(
				'label' => __( 'Contact', 'rwmb' ),
				'icon'  => 'dashicons-email', // Dashicon
			),
			'social'  => array(
				'label' => __( 'Social Media', 'rwmb' ),
				'icon'  => 'dashicons-share', // Dashicon
			),
			'note'    => array(
				'label' => __( 'Note', 'rwmb' ),
				'icon'  => 'fa fa-refresh', // Custom icon, using image
			),
		),
		// Tab style: 'default', 'box' or 'left'. Optional
		'tab_style' => 'default',
		
		// Show meta box wrapper around tabs? true (default) or false. Optional
		'tab_wrapper' => true,
		'fields'    => array(
			array(
				'name' => __( 'Name', 'rwmb' ),
				'id'   => 'name',
				'type' => 'text',
				// Which tab this field belongs to? Put tab key here
                'columns'   =>  6,
				'tab'  => 'contact',
			),
			array(
				'name' => __( 'Email', 'rwmb' ),
				'id'   => 'email',
				'type' => 'email',
                'columns'   =>  6,
				'tab'  => 'contact',
			),
            
            array(
                'name' => 'Group', // Optional
                'id' => 'group_id',
                'type' => 'group',
                'clone' => true,
                'tab'   => 'contact',
                'columns' => 12,
                // List of sub-fields
                'fields' => array(
                    array(
                        'name' => 'Text',
                        'id' => 'text',
                        'type' => 'text',
                    ),
                    // Other sub-fields here
                ),
            ),
			array(
				'name' => __( 'Facebook', 'rwmb' ),
				'id'   => 'facebook',
				'type' => 'text',
				'tab'  => 'social',
			),
			array(
				'name' => __( 'Note', 'rwmb' ),
				'id'   => 'note',
				'type' => 'textarea',
				'tab'  => 'note',
			),
		),
	);

?>