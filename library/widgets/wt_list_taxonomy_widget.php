<?php

/*	Water Tower List Taxonomy Widget
 *	This widget allows the user to display a
 *	linked list of any particular taxonomy.
 *	It also allows the user to display the post
 *	count next to the widget much like the default
 *	Wordpress Categories widget.
 */
 
class water_tower_list_taxonomy_widget extends WP_Widget
{

    function __construct() 
    {
        parent::__construct(
            // Base ID of your widget
            'water_tower_list_taxonomy_widget', 
            // Widget name will appear in UI
            __('WT: List Taxonomy', 'water_tower_list_taxonomy'), 
            // Widget description
            array( 'description' => __('This widget will allow you display a list of taxonomy terms and post counts for each term based on the taxonomy selected.'), ) 
        );
    }
    
    
    
    
    
    /*	Widget Front-End
    *	This is where all of the code to display the front end of
    *	the widget goes.
    */
     
    public function widget( $args, $instance ) 
    {
    
        $title = apply_filters('widget_title', $instance['title']);
    
    
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (! empty( $title ) )
        echo $args['before_title'] . $title . $args['after_title'];
    
        // This is where you run the code and display the output
    
    ?>
	
    <div class="wt-list-taxonomy-widget-container">
	
        <?php 
        
        /*	List the Taxonomy Terms
        *	This will list out the taxonomy terms
        *	based on the taxonomy choses, and display
        *	the post count if enabled by the user.
        */
         
        $terms = get_terms($instance['taxonomy']);
        
        if ($terms) {
            echo '<ul>';
            foreach ($terms as $term) {
                $term_name = $term->name;
                $term_slug = $term->slug;
                $term_count = $instance['show-count'] == 'on' ? '(' . $term->count . ')' : '';
                
                echo '<li><a href="' . get_term_link($term) . '">' . $term_name . '</a> ' . $term_count . '</li>';
                
            }
            echo '</ul>';
        }
        
        ?>
    </div>
	
    <?php
    
    echo $args['after_widget'];
    
    }
    
    
            
    /*	Widget Backend
    *	This is where you define all of the inputs
    *	and switches that can be found in the
    *	backend of the widget.
    */
     
    public function form( $instance ) 
    {
    
        // Define all of the variables that need to be used within the widget admin.
        $title = isset($instance['title']) ? $title = $instance['title'] : $title = __('Taxonomy', 'wt-featured-page-widget');
        $taxonomy = $instance['taxonomy'];
        $show_count = $instance['show-count'];
        echo $show_count;
        
        // Widget admin form
        ?>
     <p>
     <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
     <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
     </p>
		
     <p>
     <label for="<?php echo $this->get_field_id('featured-page'); ?>"><?php _e('Featured Page:'); ?></label> 
     <select class="widefat" id="<?php echo $this->get_field_id('taxonomy'); ?>" name="<?php echo $this->get_field_name('taxonomy'); ?>" type="text">
			
        <?php
            
        // Query Wordpress for Taxonomies to choose from
        $taxonomies = get_taxonomies('', OBJECT);
        print_r($taxonomies);
                
        foreach($taxonomies as $taxonomy) {
            $taxonomy_id = $taxonomy->name;
            $taxonomy_title = $taxonomy->labels->name;
            echo '<option value="' . $taxonomy_id . '" ' . selected($instance['taxonomy'], $taxonomy_id) . '>' . $taxonomy_title . '</option>';
        
        }
            
        ?>
			
     </select>
     </p>
		
     <p>
     <label for="<?php echo $this->get_field_id('show-count'); ?>"><?php _e('Show Post Count'); ?></label> 
     <input class="widefat" id="<?php echo $this->get_field_id('show-count'); ?>" name="<?php echo $this->get_field_name('show-count'); ?>" type="checkbox" <?php checked($instance['show-count'], 'on'); ?> />
     </p>
		
        <?php 
    }
        
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) 
    {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags($new_instance['title']) : '';
        $instance['taxonomy'] = ( ! empty( $new_instance['taxonomy'] ) ) ? strip_tags($new_instance['taxonomy']) : '';
        $instance['show-count'] = $new_instance['show-count'];
        
        return $instance;
    }
} // Class wpb_widget ends here



/*	Register and load the widget
 *	This is where the widget actually gets pulled
 *	into the installation of wordpress and becomes
 *	usable to the end user.
 */
function wt_list_taxonomy_load_widget() 
{
    register_widget('water_tower_list_taxonomy_widget');
}
add_action('widgets_init', 'wt_list_taxonomy_load_widget');

?>