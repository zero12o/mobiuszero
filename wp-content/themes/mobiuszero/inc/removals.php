<?php
/* 
 * removes un-need wordpress headers and other functions that are not in the 
 * score of this site.
 * @link http://www.denisbouquet.com/remove-wordpress-emoji-code/
 * @link http://bhoover.com/remove-unnecessary-code-from-your-wordpress-blog-header/
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-disable-rss-feeds-in-wordpress/
 * @link http://timneill.net/2013/05/remove-extra-rss-feeds-in-wordpress/
 * @link http://beerpla.net/2010/01/31/how-to-remove-inline-hardcoded-recent-comments-sidebar-widget-style-from-your-wordpress-theme/
 * @todo Look into potentially adding feeds to the site. 
 * 
 * @package mobiusZero
 */

// Remove WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//Remove comment RSS feed links
add_filter( 'feed_links_show_comments_feed', '__return_false' );

// Remove the wlwmanifest_link, whatever the hell that is. 
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

//Remove the shortlink wp head
remove_action( 'wp_head', 'wp_shortlink_wp_head');

//Remove the wordpress version generator
remove_action('wp_head', 'wp_generator');

//remove rss feeds for the site. ** FOR NOW ** 
function wpb_disable_feed() {
wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );
}

add_action('do_feed', 'wpb_disable_feed', 1);
add_action('do_feed_rdf', 'wpb_disable_feed', 1);
add_action('do_feed_rss', 'wpb_disable_feed', 1);
add_action('do_feed_rss2', 'wpb_disable_feed', 1);
add_action('do_feed_atom', 'wpb_disable_feed', 1);
add_action('do_feed_rss2_comments', 'wpb_disable_feed', 1);
add_action('do_feed_atom_comments', 'wpb_disable_feed', 1);

  // Remove all the RSS feed links from wp_head using remove_action
  remove_action( 'wp_head','feed_links', 2 );
  remove_action( 'wp_head','feed_links_extra', 3 );

// Remove the annoying:
// <style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style> added in the header
function remove_recent_comment_style() {
	global $wp_widget_factory;
	remove_action( 
            'wp_head', 
            array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) 
        );
}
add_action( 'widgets_init', 'remove_recent_comment_style' );

function remove_json_api () {

    // Remove the REST API lines from the HTML Header
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );

    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );

    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );

   // Remove all embeds rewrite rules.
   add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

}
add_action( 'after_setup_theme', 'remove_json_api' );

function remove_dns_prefetch( $hints, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        return array_diff( wp_dependencies_unique_hosts(), $hints );
    }

    return $hints;
}

add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );