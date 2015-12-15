<?php

/*	Project Informatin Custom Meta
 *	This is where all of the standard information for a
 *	project should be stored.
 */

$meta_boxes[] = array(
	'title'  => 'Project Information',
	'pages' => array( 'projects'),
	'context' => 'side',
	'priority' => 'high',
	'fields' => array(

		//Project Status
		array(
			'name'	=> 'Project Status',
			'id'	=> "{$prefix}project_status",
			'type'	=> 'select',
			'options' => array(
				'active' => 'Active',
				'archived'	  => 'archived',
			),
		),

		//Project Classification
		array(
			'name' => 'Project Classification',
			'id'   => "{$prefix}project_classification",
			'type' => 'select',
			'options'  => array(
				'capital'		=> 'Capital Campaign',
				'department'	=> 'Departmental Campaign',
				'outreach'		=> 'Outreach Campaign',
			),
		),
	),
);

$meta_boxes[] = array(
    'title' => 'Project Goals Options',
    'pages' => 'projects',
    'fields' => array(
        // Group
        array(
            'name' => 'Project Chart Data', // Optional
            'id' => 'project_chart_data',
            'type' => 'group',
            'clone' => true,
            // List of sub-fields
            'fields' => array(
                array(
                    'name' => 'Goal Date',
                    'id' => 'goal_date',
                    'type' => 'text',
                ),
                
                array(
                    'name' => 'Goal Amount',
                    'id' => 'goal_amount',
                    'type' => 'text',
                ),
                
                array(
                    'name' => 'Actual Amount',
                    'id' => 'actual_amount',
                    'type' => 'text',
                ),
            ),
        ),
    ),
);

?>