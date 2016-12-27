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
        /* Merge with defaults */
        echo $args['before_widget'];

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

    }
}
// Register frontPage_sections_page_selector widget
function reg_frontPgSectionPgSelector() {
    register_widget( 'frontPage_sections_page_selector' );
}
add_action( 'widgets_init', 'reg_frontPgSectionPgSelector' );
