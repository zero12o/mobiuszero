<?php
/* 
 * custom widget for the select pages dropdown that will be used in conjunction 
 * with the customizer background styles for each section.
 * @link http://wordpress.stackexchange.com/questions/73956/using-wp-dropdown-categories-in-widget-options
 * @link https://premium.wpmudev.org/blog/create-custom-wordpress-widget/
 */

class frontPage_sections_page_selector extends WP_Widget{   
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
       parent::__construct(
            'frontPage_sections_page_selector', 
            __('Section Page Selector','mobiusZero'), 
            array(
                'classname' => 'grabbed_page',
                'description' => __('This adds sections for the frontpage','mobiusZero'),
            ) 
       );
    }
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    function widget( $args, $instance ) {
        /** Merge with defaults */
        $page = $instance['page_name'];
        echo $args['before_widget'];
            $wp_pageSearch = array(
                'post_type' => 'page',
                'post_status' => 'publish',
                'pagename' => $page
            );
            // Make the query call to find and display the about page content.    
            $wp_pages = new WP_Query($wp_pageSearch);
            if ($wp_pages->have_posts()){
                while ($wp_pages->have_posts()) {
                   $wp_pages->the_post();
                   get_template_part( 'template-parts/content', 'hsections' );
                }
            } 
        echo $args['after_widget'];
    }
    /**
     * Admin display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $instance Saved values from database.
     */
    public function form($instance) {
    ?> 
    <p>
    	Select Page:
    </p>
    <p>
	    <label for="<?php echo $this->get_field_id( 'page_name' ); ?>"><?php echo $this->get_field_name( 'page_name' ); ?>
	    <input class="checkbox" type="checkbox" <?php checked( $instance[ 'page_name' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'page_name' ); ?>" name="<?php echo $this->get_field_name( 'page_name' ); ?>" style="width: 100%;" /> 
	    </label>
    </p>
    <?php
    }
   /**
    * Sanitize widget form values as they are saved.
    *
    * @see WP_Widget::update()
    *
    * @param array $new_instance Values just sent to be saved.
    * @param array $old_instance Previously saved values from database.
    *
    * @return array Updated safe values to be saved.
    */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['page_name'] = $new_instance;
        return $instance;
    }
}
// Register frontPage_sections_page_selector widget
function reg_frontPgSectionPgSelector() {
    register_widget( 'frontPage_sections_page_selector' );
}
add_action( 'widgets_init', 'reg_frontPgSectionPgSelector' );
