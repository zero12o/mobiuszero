<?php
/**
 * Set up the WordPress core custom header feature.
 *
 * @uses mobiuszero_header_style()
 */
function mobiuszero_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'mobiuszero_custom_header_args', array(
		'wp-head-callback'       => 'mobiuszero_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'mobiuszero_custom_header_setup' );

if ( ! function_exists( 'mobiuszero_header_style' ) ) :
/**
 * Styles the custom background, fonts and colors for the site.
 *
 * @see mobiuszero_custom_header_setup().
 */
function mobiuszero_header_style() {
?>
    <style type="text/css">
        .title .logo,
        .title .site-description {
            color: <?php echo (!empty(get_theme_mod('title_sectFontColor')) ? get_theme_mod('title_sectFontColor') : '#FFF'); ?>;
        }
        header.title.module {
            background-image: url('<?php echo get_theme_mod('title_bg_image'); ?>');
        }
    </style>
<?php
}
endif;
