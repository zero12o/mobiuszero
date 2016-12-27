<?php
/* 
 * Register widget sections for the front page. 
 */
function front_page_section_widgets () {
    register_sidebar( array(
        'name'          => __('About Me Section', 'mobiusZero'),
        'id'            => 'mz_about',
        'description'   => 'Adds About Me Section To the Front Page',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ));
    register_sidebar( array(
        'name'          => __('Contact Me Section', 'mobiusZero'),
        'id'            => 'mz_contact',
        'description'   => 'Adds Contact Me Section To the Front Page',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ));
}
add_action('widgets_init','front_page_section_widgets');
