<?php

/*	Related Media Widget
 *	This widget allows the user to select from
 *	many different options to display media pertaining
 *	to a particular post or page.
 */

// Creating the widget 
class water_tower_related_media_widget extends WP_Widget
{

    function __construct() 
    {
        parent::__construct(
            // Base ID of your widget
            'water_tower_related_media_widget', 
            // Widget name will appear in UI
            __('WT: Related Media', 'water_tower_related_media_widget'), 
            // Widget description
            array( 'description' => __('This widget allows you to display related media on posts and pages.'), ) 
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) 
    {
        $title = apply_filters('widget_title', $instance['title']);
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];

        if (! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        } else {
            echo $args['before_title'] . 'Related Media' . $args['after_title'];
        }

        // This is where you run the code and display the output

        ?>

     <div class="wt-related-media-widget-container">
	
        <?php
        /*	Get and Store Query
        *	This gets and stores the query into a variable to
        *	be used later by the widget to display all of the
        *	related media.
        */
         
        // Get all related to taxonomy terms
        $related_to_media_objects = get_terms($instance['related_to']);
        $related_to_media_terms = array();
         
        foreach ( $related_to_media_objects as $related_to_media_object) {
            $related_to_media_terms[] = $related_to_media_object->slug;
        }
         
        
        // Define query arguments
        $args = array (
        'post_type'    => $instance['post_type'],
        'posts_per_page'=> $instance['num_posts'],
        'category_name'        => $instance['post_category'],
        'tax_query'        => array (
        array (
         'taxonomy' => $instance['related_to'],
         'field'    =>    'slug',
         'terms'    =>    $instance['specific_post'] ? get_query_var('name') : $related_to_media_terms,
        )
        )
        );
        
         
        
        $related_media_query = new WP_Query($args); ?>
        <?php if ($related_media_query->have_posts() ) : ?>
    <?php while ( $related_media_query->have_posts() ) : $related_media_query->the_post(); ?>
			
    <?php if ($instance['theme'] == 'gallery') { ?>
			
				<div class="related-media-theme-gallery-container">
					<div class="related-media-theme-gallery-title"><?php the_title(); ?></div>
        <?php echo get_the_post_thumbnail($post->ID, '16:9-media-thumbnail', array('class' => 'img-responsive')); ?>
				</div>
				
    <?php 
} elseif ($instance['theme'] == 'list') { ?>
				
				<div class="related-media-theme-list-container">
					<div class="related-media-theme-list-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
				</div>
					
    <?php 
} elseif ($instance['theme'] == 'thumbs') { ?>
				<div class="row related-media-theme-thumbs-container clearfix">
					<div class="small-8 columns related-media-theme-thumbs-content">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						<div class="related-media-theme-thumbs-date">Published: <?php echo the_date('F j, Y'); ?></div>
					</div>
					<div class="small-4 columns related-media-theme-thumbs-thumbnail"><?php echo get_the_post_thumbnail($post->ID, 'thumbnail-card'); ?></div>
				</div>
    <?php 
} ?>
				
    <?php 
endwhile; ?>

    <?php wp_reset_postdata(); ?>

    <?php else : ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php 
endif; ?>
		
     </div>

        <?php

        echo $args['after_widget'];

    }


        
    // Widget Backend 
    public function form( $instance ) 
    {

        $title = isset($instance['title']) ? $title = $instance['title'] : $title = __('Related Media', 'wt_related_media_widget');
        $num_posts = isset($instance['num_posts']) ? $num_posts = $instance['num_posts'] : $num_posts = __(5, 'wt_related_media_widget');
    
        // Widget admin form
        ?>
	
     <script>
     jQuery( document ).ready(function() {
      jQuery('.related-to-page').change( function() {
          if(this.checked) {
		        jQuery(".related-to-media").prop("disabled",true);
          } else {
		        jQuery(".related-to-media").prop("disabled",false);
          }
		
      });
     });
	
     jQuery( document ).ready(function() {
      jQuery('#post-type-input').change( function() {			
       if(jQuery(this).val() == 'post') {
        jQuery(".post-category-input").prop("disabled",false);
       } else {
        jQuery(".post-category-input").prop("disabled",true);
       }
      });
     });
     </script>
	
	
	
     <p>
     <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
     <input style="margin-bottom: 10px;" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	
     <label for="<?php echo $this->get_field_id('num_posts'); ?>"><?php _e('Number of Posts to Display:'); ?></label> 
     <input style="margin-bottom: 30px;" class="widefat" id="<?php echo $this->get_field_id('num_posts'); ?>" name="<?php echo $this->get_field_name('num_posts'); ?>" type="text" value="<?php echo esc_attr($num_posts); ?>" />
	
     <label for="<?php echo $this->get_field_id('post_type'); ?>"><?php _e('Post Type to Display:'); ?></label>
     <select style="margin-bottom: 10px;" id="post-type-input" class="widefat" id="<?php echo $this->get_field_id('post_type'); ?>" name="<?php echo $this->get_field_name('post_type'); ?>" type="text">
        <?php
        /*	Get Post Types
        *	Get all of the post types that can be used to filter
        *	through potential related posts.
        */
        
        $post_types = get_post_types($args, 'objects');
        print_r($post_types);
        
        foreach ($post_types as $post_type) {
            $post_type_slug = $post_type->name;
            $post_type_name = $post_type->labels->name;
            $format = "<option value='%s'" . selected($instance['post_type'], $post_type_slug) . ">%s</option>";
            echo sprintf($format, $post_type_slug, $post_type_name);
        }
        
        ?>
     </select>
	
     <label for="<?php echo $this->get_field_id('post_category'); ?>"><?php _e('Post Category:'); ?></label>
     <select style="margin-bottom: 30px;" class="widefat post-category-input" id="<?php echo $this->get_field_id('post_category'); ?>" name="<?php echo $this->get_field_name('post_category'); ?>" type="text">
        <?php
        /*	Get Post Categories
        *	Get all of the post categories that can be used to filter
        *	through potential related posts. This feature will only work
        *	on the "post" post type.
        */
        
        // Echo Null Option First
        echo '<option value=""' . selected($instance['post_category'], '') . '>--- Select One ---</option>';
        
        $post_categories = get_categories();
        
        foreach ($post_categories as $category) {
            $cat_slug = $category->slug;
            $cat_name = $category->name;
            $format = "<option value='%s'" . selected($instance['post_category'], $cat_slug) . ">%s</option>";
            echo sprintf($format, $cat_slug, $cat_name);
        }
        
        ?>
     </select>
	
     <label for="<?php echo $this->get_field_id('related_to'); ?>"><?php _e('Related To Media:'); ?></label>
     <select class="widefat related-to-media" id="<?php echo $this->get_field_id('related_to'); ?>" name="<?php echo $this->get_field_name('related_to'); ?>" type="text">
		
        <?php
        /*	Get Taxonomies
        *	Get all of the taxonomies that can be used to filter
        *	through potential related material.
        */
        
        // Echo Null Option First
        echo '<option value=""' . selected($instance['related_to'], '') . '>--- Select One ---</option>';
        
        $taxonomies = get_taxonomies();
        
        foreach ($taxonomies as $taxonomy) {
            $tax_slug = $taxonomy;
            $tax_name = get_taxonomy($tax_slug)->labels->name;
            $format = "<option value='%s'" . selected($instance['related_to'], $tax_slug) . ">%s</option>";
            echo sprintf($format, $tax_slug, $tax_name);
        }
        
        ?>
     </select>
	
	
     <div style="margin-bottom: 30px;">
      <label for="<?php echo $this->get_field_id('specific_post'); ?>"><?php _e('Related to Current Post'); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id('specific_post'); ?>" name="<?php echo $this->get_field_name('specific_post'); ?>" type="checkbox" <?php checked($instance['specific_post'], 'on'); ?> />
     </div>
	
	
	
     <label for="<?php echo $this->get_field_id('theme'); ?>"><?php _e('Theme:'); ?></label>
     <select style="margin-bottom: 5px;" class="widefat related-to-media" id="<?php echo $this->get_field_id('theme'); ?>" name="<?php echo $this->get_field_name('theme'); ?>" type="text">
      <option value="gallery" <?php selected($instance['theme'], 'gallery') ?>>Gallery</option>
      <option value="list" <?php selected($instance['theme'], 'list') ?>>List</option>
      <option value="thumbs" <?php selected($instance['theme'], 'thumbs') ?>>Thumbnails</option>
     </select>
	
     </p>
	
     <div class="wt-related-media-admin-query-desc">
        <?php 

        /*	Display Query String
        *	Displaying the query string helps users understand what
        *	is being sent to the database as a query. It should be made
        *	to be as easy to understand as possible.
        */
         
        $post_type_object = get_post_type_object($instance['post_type']);
        $post_type_name = $post_type_object->labels->name;
        
        if ($instance['post_category'] != null) {
            $post_category_name = get_category_by_slug($instance['post_category'])->name;
        }
        
        $tax_name = get_taxonomy($instance['related_to'])->labels->name;
         
        echo "<p>Currently displaying the <span style='color: #609FCE; font-weight: bold;'>{$instance['num_posts']}</span> most recent <span style='color: #609FCE; font-weight: bold;'> {$post_type_name} </span>";
         
        // Check if Related to Page is checked
        if ($instance['related_to_page'] == 'on') {
            echo ' related to the <span style="color: #609FCE; font-weight: bold;">page being displayed</span>';
            // If not check for Related To values
        } else {
            if ($instance['related_to'] != null) {
                echo ' related to <span style="color: #609FCE; font-weight: bold;">' . $tax_name . '</span>';
            }
        }
         
        // Check if post type is "post"
        if ($instance['post_type'] == 'post') {
            // Check if a specific Post Category is defined
            if ($instance['post_category'] != null) {
                echo " and categorized within the <span style='color: #609FCE; font-weight: bold;'>{$post_category_name}</span> post category";
            }
        }
         
        echo '.</p>';
         
        ?>
     </div>

    <?php 
    }
    
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) 
    {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags($new_instance['title']) : '';
        $instance['num_posts'] = ( ! empty( $new_instance['num_posts'] ) ) && $new_instance['num_posts'] > 0 ? strip_tags($new_instance['num_posts']) : '5';
        $instance['post_type'] = ( ! empty( $new_instance['post_type'] ) ) ? strip_tags($new_instance['post_type']) : 'post';
        $instance['post_category'] = ( ! empty( $new_instance['post_category'] ) ) ? strip_tags($new_instance['post_category']) : null;
        $instance['related_to'] = ( ! empty( $new_instance['related_to'] ) ) ? strip_tags($new_instance['related_to']) : null;
        $instance['specific_post'] = ( ! empty( $new_instance['specific_post'] ) ) ? strip_tags($new_instance['specific_post']) : 0;
        $instance['theme'] = ( ! empty( $new_instance['theme'] ) ) ? strip_tags($new_instance['theme']) : 'thumbs';
        return $instance;
    }
} // Class wpb_widget ends here

// Register and load the widget
function wt_related_media_load_widget() 
{
    register_widget('water_tower_related_media_widget');
}
add_action('widgets_init', 'wt_related_media_load_widget');

?>