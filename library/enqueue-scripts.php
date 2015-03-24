<?php

if ( ! function_exists( 'watertower_scripts' ) ) :
	function watertower_scripts()
	{

		// deregister the jquery version bundled with wordpress
		wp_deregister_script( 'jquery' );

		// register scripts
		wp_register_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array(), '1.0.0', false );
		wp_register_script( 'jquery', get_template_directory_uri() . '/js/vendor/jquery.js', array(), '1.0.0', false );
		wp_register_script( 'foundation', get_template_directory_uri() . '/js/foundation.js', array('jquery'), '1.0.0', true );
		wp_register_script( 'chart.js', get_template_directory_uri() . '/bower_components/Chart.js/Chart.js', array('jquery'), '1.0.0', false );
		wp_register_script( 'fittext', get_template_directory_uri() . '/bower_components/FitText.js/jquery.fittext.js' );

		// enqueue scripts
		wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'foundation' );
		wp_enqueue_script( 'chart.js' );
		wp_enqueue_script( 'fittext' );

	}

	add_action( 'wp_enqueue_scripts', 'watertower_scripts' );
endif;

?>