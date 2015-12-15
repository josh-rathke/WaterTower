<?php

/*	Surges CPT to Surges Taxo Relationship
 *	This relationship creates a term in the Surges Taxonomy
 *	every time a surges custom post type is either created
 *	or edited.
 */

function surges_post_update($post_id){
	if ( wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) ) {
		return $post_id;
	}

	$post_obj = get_post( $post_id );
	$raw_title = $post_obj->post_title;
	$post_type = $post_obj->post_type;
	$slug_title = sanitize_title( $raw_title );
	$post_name = $post_obj->post_name;

	if ( ('surges' == $post_type) && ('auto-draft' != $slug_title) && ( ! empty($raw_title)) ) {
		// get the terms associated with this custom post type
		$terms = get_the_terms( $post_id, 'surges_taxo' );
		$term_id = $terms[0]->term_id;
		// if term exists then update term
		if ( $term_id > 0 ) {
			wp_update_term($term_id,
				'surges_taxo',
				array(
						  'description' => $raw_title,
						  'slug' => $post_name,
						  'name' => $raw_title,
				)
			);
		} else {
			// creates a new term in the program_taxo taxonomy
			wp_set_object_terms( $post_id, $raw_title, 'surges_taxo', false );
		}
	}
}

add_action( 'save_post', 'surges_post_update' );

?>