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

    <header id="title_section" class="title module" role="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo-placement">
                        <div class="logo-holder">
                            <h1 class="logo text-xs-center"><?php bloginfo( 'name' ); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- #titleSection -->

    <main class="site-content"  role="main">
