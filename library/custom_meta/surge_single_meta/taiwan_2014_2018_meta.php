<?php

    $meta_boxes[] = array(
        'title'  => 'Surge Goals',
        'pages' => array( 'surges'),
        'context' => 'normal',
        'priority' => 'low',
        'fields' => array(

            array(
                'name'  => __( '500 Disciples Description', 'rwmb' ),
                'id'    => "{$prefix}500_disciples",
                'type'  => "wysiwyg",
            ),
            
            array(
                'name'  => __( '500 Disciples Progress', 'rwmb' ),
                'id'    => "{$prefix}500_disciples_progress",
                'type'  => "text",
            ),
            
            array(
                'name'  => __( '50 Church Partnerships', 'rwmb' ),
                'id'    => "{$prefix}50_church_partnerships",
                'type'  => "wysiwyg",
            ),
            
            array(
                'name'  => __( '50 Church Partnerships Progress', 'rwmb' ),
                'id'    => "{$prefix}50_church_partnerships_progress",
                'type'  => "text",
            ),
            
            array(
                'name'  => __( '50 Missionaries Sent', 'rwmb' ),
                'id'    => "{$prefix}50_sent",
                'type'  => "wysiwyg",
            ),
            
            array(
                'name'  => __( '50 Missionaries Sent Progress', 'rwmb' ),
                'id'    => "{$prefix}50_missionaries_sent_progress",
                'type'  => "text",
            ),

        ),
        'only_on'    => array(
            'id'       => array(),
            'slug'  => array( 'taiwan-2014-2018' ),
            'template' => array(),
            'parent'   => array()
        ),
        
    );
        
        
    $meta_boxes[] = array(
        'title'  => 'Surge Target Locations',
        'pages' => array( 'surges'),
        'context' => 'normal',
        'priority' => 'low',
        'fields' => array(

            array(
                'name'  => __( 'Target Locations Description', 'rwmb' ),
                'id'    => "{$prefix}target_locations_description",
                'type'  => "wysiwyg",
            ),

        ),
        'only_on'    => array(
            'id'       => array(),
            'slug'  => array( 'taiwan-2014-2018' ),
            'template' => array(),
            'parent'   => array()
        ),
    );



?>