<?php
/* 
 * Create new post type for portfolio items
 * 
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-create-custom-post-types-in-wordpress/
 */
function mobi0portfolio_items() {
    // Set UI labels in the admin dashboard.
    $labels = array(
            'name'                => _x( 'mobi0portItems', 'Post Type General Name', 'mobiusZero' ),
            'singular_name'       => _x( 'mobi0portItem', 'Post Type Singular Name', 'mobiusZero' ),
            'menu_name'           => __( 'mobi0portItems', 'mobiusZero' ),
            'parent_item_colon'   => __( 'Parent mobi0portItem', 'mobiusZero' ),
            'all_items'           => __( 'All mobi0portItems', 'mobiusZero' ),
            'view_item'           => __( 'View mobi0portItem', 'mobiusZero' ),
            'add_new_item'        => __( 'Add New mobi0portItem', 'mobiusZero' ),
            'add_new'             => __( 'Add New', 'mobiusZero' ),
            'edit_item'           => __( 'Edit mobi0portItem', 'mobiusZero' ),
            'update_item'         => __( 'Update mobi0portItem', 'mobiusZero' ),
            'search_items'        => __( 'Search mobi0portItem', 'mobiusZero' ),
            'not_found'           => __( 'Not Found', 'mobiusZero' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'mobiusZero' ),
    );  
    
    // Set other options for Custom Post Type
    $ui_settings = array(
            'label'               => __( 'mobi0portItem', 'mobiusZero' ),
            'description'         => __( 'Set the portfolio items that will be displayed on the home page.', 'mobiusZero' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */	
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-book-alt',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'taxonomies'          => array( 'category' ),

    );
    register_post_type( 'mobi0portItem',$ui_settings);
}
// Hooking up our function to theme setup
add_action( 'init', 'mobi0portfolio_items' ); 

function add_mobi0portItem_categories($query) {
  if( is_category() ) {
        $post_type = get_query_var('post_type');
        if($post_type){
            $post_type = $post_type;

        } else {
            $post_type = array('nav_menu_item', 'post', 'mobi0portItem'); // don't forget nav_menu_item to allow menus to work!
            $query->set('post_type',$post_type);

        }
    return $query;
    }
}
add_filter('pre_get_posts', 'add_mobi0portItem_categories');