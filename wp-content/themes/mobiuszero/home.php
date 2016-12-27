<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @link http://stackoverflow.com/questions/39575848/wordpress-get-pages-in-same-page
 * @package mobiusZero
 */

get_header();
// Start About Section     
    $about_args = array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'pagename' => 'about'
    );
    // Make the query call to find and display the about page content.    
    $get_about = new WP_Query($about_args);
    if ($get_about->have_posts()){
        while ($get_about->have_posts()) {
           $get_about->the_post();
           get_template_part( 'template-parts/content', 'hsections' );
        }
    } 
// End About Section
// Start Contact Section     
    $contact_args = array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'pagename' => 'contact'
    );
    // Make the query call to find and display the about page content.    
    $get_contact = new WP_Query($contact_args);
    if ($get_contact->have_posts()){
        while ($get_contact->have_posts()) {
           $get_contact->the_post();
           get_template_part( 'template-parts/content', 'hsections' );
        }
    } 
// End Contact Section
get_footer();
