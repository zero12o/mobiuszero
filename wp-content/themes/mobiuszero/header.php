<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mobiusZero
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="" class="site">
	<a class="sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'mobiuszero' ); ?></a>

	<header id="masthead" class="site-header title module" role="banner">
		<div class="site-branding">
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="navbar" role="navigation">
                        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header" aria-expanded="false" aria-label="Toggle navigation"></button>
                        <div class="collapse navbar-toggleable-xs" id="navbar-header">
                            <a class="navbar-brand">

                            </a>
                            <?php 
                                wp_nav_menu( 
                                    array( 
                                        'theme_location' => 'primary', 
                                        'menu_id' => 'primary-menu',                
                                        'menu_class'        => 'nav navbar-nav',

                                    ) 
                                ); 
                            ?>
                        </div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
