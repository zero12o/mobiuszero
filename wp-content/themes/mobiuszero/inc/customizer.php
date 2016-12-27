<?php
/**
 * mobiusZero Theme Customizer.
 *
 * @package mobiusZero
 */ 

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mobiuszero_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';     
        
    // Remove custom controls, sections and panels
    $wp_customize->remove_section('header_image');
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section("static_front_page");  
    
    
    // Add support to add a new background image for the title section 
    // ******************************************************
    $wp_customize->add_panel( 'title_section_panel', array(
        'priority' => 1,
        'theme_supports' => '',
        'title' => __( 'Title Section Styles', 'mobiusZero' ),
        'description' => __( 'Set style Settings for the title section', 'mobiusZero' ),
    ) );
    // ======================================================
    // Title Section - Background Image
    // ======================================================
        // Add title image background section.
    $wp_customize->add_section( 'title_background' , array(
        'title' => __( 'Title Background','mobiusZero' ),
        'panel' => 'title_section_panel',
        'priority' => 1,
    ) );
        // Add default setting title image background.
    $wp_customize->add_setting( 'title_bg_image', array(
        'default' => get_stylesheet_directory_uri() . '/img/title_section_placeholder.png',
        'transport' => 'refresh'
    ) );
        // Add control for the title image background.
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'title_background_image', array(
        'label' => __( 'Add Title Background Here, the width should be approx 1366px', 'mobiusZero' ),
        'section' => 'title_background',
        'settings' => 'title_bg_image',
        )
    ) );
    // ======================================================
    // Title Section - Font styles
    // ======================================================
        // Add title font styles section.
    $wp_customize->add_section('title_font_styles', array(
        'title' => __( 'Title Section Font Styles','mobiusZero' ),
        'panel' => 'title_section_panel',
        'priority' => 2,
    ) );
            // Add default setting font color
    $wp_customize->add_setting('title_sectFontColor', array(
        'default' => '#FFF',
        'transport' => 'refresh'
    ) );
            // Add control for the title image background.
    $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
     $wp_customize, //Pass the $wp_customize object (required)
     'set_title_font_colors', //Set a unique ID for the control
     array(
        'label' => __( 'Title Section Font Colors', 'mobiusZero' ), //Admin-visible name of the control
        'section' => 'title_font_styles', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'settings' => 'title_sectFontColor', //Which setting to load and manipulate (serialized is okay)
        'priority' => 2, //Determines the order this control appears in for the specified section
     ) 
    ) );
}
add_action( 'customize_register', 'mobiuszero_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mobiuszero_customize_preview_js() {
	wp_enqueue_script( 'mobiuszero_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'mobiuszero_customize_preview_js' );


