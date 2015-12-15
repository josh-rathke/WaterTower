<?php

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