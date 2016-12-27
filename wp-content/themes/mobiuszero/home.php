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
/* Section */
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('mz_about')):
endif;


get_footer();
