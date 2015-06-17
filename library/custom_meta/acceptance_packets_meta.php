<?php

/*	Acceptance Packets Custom Meta
 *	This is where we define all of the custom
 * 	meta fields for the Acceptance Packets custom post type.
 */

$meta_boxes[] = array(
	'title'  => 'Additional Info',
	'pages' => array( 'acceptance_packets'),
	'context' => 'normal',
	'priority' => 'low',
	'fields' => array(

		// POST
		array(
			'name'        => __( 'Related Program', 'meta-box' ),
			'id'          => "{$prefix}related_program",
			'type'        => 'post',
			'post_type'   => 'program',
			'field_type'  => 'select_advanced',
			'placeholder' => __( 'Select an Item', 'meta-box' ),
			'query_args'  => array(
				'post_status'    => 'publish',
				'posts_per_page' => - 1,
			)
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
		),
	),
);



$meta_boxes[] = array(
    'title' => 'Example Weekly Schedule',
    'pages' => 'acceptance_packets',
    'fields' => array(
        
        // Sunday Schedule
        array(
            'name' => 'Enable Sunday Schedule',
            'id' => 'ap_enable_sunday_schedule',
            'type' => 'checkbox',
        ),
        
        array(
            'name' => 'Sunday Schedule', // Optional
            'id' => 'ap_sunday_schedule',
            'type' => 'group',
            'clone' => true,
            // List of sub-fields
            'fields' => array(
                
                array(
                    'name' => 'Event Name',
                    'id' => 'ap_event_name',
                    'type' => 'text',
                ),
                
                array(
                    'name' => 'Event Time',
                    'id' => 'ap_event_time',
                    'type' => 'text',
                ),
            ),
            'after' => '<hr style="margin-bottom: 30px;" />',
        ),
        
        // Monday Schedule
        array(
            'name' => 'Enable Monday Schedule',
            'id' => 'ap_enable_monday_schedule',
            'type' => 'checkbox',
        ),
        
        array(
            'name' => 'Monday Schedule', // Optional
            'id' => 'ap_monday_schedule',
            'type' => 'group',
            'clone' => true,
            // List of sub-fields
            'fields' => array(
                
                array(
                    'name' => 'Event Name',
                    'id' => 'ap_event_name',
                    'type' => 'text',
                ),
                
                array(
                    'name' => 'Event Time',
                    'id' => 'ap_event_time',
                    'type' => 'text',
                ),
            ),
            'after' => '<hr style="margin-bottom: 30px;" />',
        ),
        
        // Tuesday Schedule
        array(
            'name' => 'Enable Tuesday Schedule',
            'id' => 'ap_enable_tuesday_schedule',
            'type' => 'checkbox',
        ),
        
        array(
            'name' => 'Tuesday Schedule', // Optional
            'id' => 'ap_tuesday_schedule',
            'type' => 'group',
            'clone' => true,
            // List of sub-fields
            'fields' => array(
                
                array(
                    'name' => 'Event Name',
                    'id' => 'ap_event_name',
                    'type' => 'text',
                ),
                
                array(
                    'name' => 'Event Time',
                    'id' => 'ap_event_time',
                    'type' => 'text',
                ),
            ),
            'after' => '<hr style="margin-bottom: 30px;" />',
        ),
        
        // Wednesday Schedule
        array(
            'name' => 'Enable Wednesday Schedule',
            'id' => 'ap_enable_wednesday_schedule',
            'type' => 'checkbox',
        ),
        
        array(
            'name' => 'Wednesday Schedule', // Optional
            'id' => 'ap_wednesday_schedule',
            'type' => 'group',
            'clone' => true,
            // List of sub-fields
            'fields' => array(
                
                array(
                    'name' => 'Event Name',
                    'id' => 'ap_event_name',
                    'type' => 'text',
                ),
                
                array(
                    'name' => 'Event Time',
                    'id' => 'ap_event_time',
                    'type' => 'text',
                ),
            ),
            'after' => '<hr style="margin-bottom: 30px;" />',
        ),
        
        // Thursday Schedule
        array(
            'name' => 'Enable Thursday Schedule',
            'id' => 'ap_enable_thursday_schedule',
            'type' => 'checkbox',
        ),
        
        array(
            'name' => 'Thursday Schedule', // Optional
            'id' => 'ap_thursday_schedule',
            'type' => 'group',
            'clone' => true,
            // List of sub-fields
            'fields' => array(
                
                array(
                    'name' => 'Event Name',
                    'id' => 'ap_event_name',
                    'type' => 'text',
                ),
                
                array(
                    'name' => 'Event Time',
                    'id' => 'ap_event_time',
                    'type' => 'text',
                ),
            ),
            'after' => '<hr style="margin-bottom: 30px;" />',
        ),
        
        // Friday Schedule
        array(
            'name' => 'Enable Friday Schedule',
            'id' => 'ap_enable_friday_schedule',
            'type' => 'checkbox',
        ),
        
        array(
            'name' => 'Friday Schedule', // Optional
            'id' => 'ap_friday_schedule',
            'type' => 'group',
            'clone' => true,
            // List of sub-fields
            'fields' => array(
                
                array(
                    'name' => 'Event Name',
                    'id' => 'ap_event_name',
                    'type' => 'text',
                ),
                
                array(
                    'name' => 'Event Time',
                    'id' => 'ap_event_time',
                    'type' => 'text',
                ),
            ),
            'after' => '<hr style="margin-bottom: 30px;" />',
        ),
        
        // Saturday Schedule
        array(
            'name' => 'Enable Saturday Schedule',
            'id' => 'ap_enable_saturday_schedule',
            'type' => 'checkbox',
        ),
        
        array(
            'name' => 'Saturday Schedule', // Optional
            'id' => 'ap_saturday_schedule',
            'type' => 'group',
            'clone' => true,
            // List of sub-fields
            'fields' => array(
                
                array(
                    'name' => 'Event Name',
                    'id' => 'ap_event_name',
                    'type' => 'text',
                ),
                
                array(
                    'name' => 'Event Time',
                    'id' => 'ap_event_time',
                    'type' => 'text',
                ),
            ),
        ),
    ),
);

?>