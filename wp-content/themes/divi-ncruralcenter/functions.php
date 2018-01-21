<?php

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
	$theme_version = et_get_theme_version();
	wp_enqueue_style('divi/style', get_template_directory_uri() . '/style.css', false, $theme_version);
	wp_enqueue_style('ncruralcenter/style', get_stylesheet_directory_uri() . '/css/style.css', false, null);
  // wp_enqueue_script('ncruralcenter/scripts', get_stylesheet_directory_uri() . '/scripts/main.js', false, $theme_version, true);
}, 100);


/**
 * Breadcrumbs setup for Justin Tadlock's Breadcrumbs Plugin
 */

// Add Shortcode for Breadcrumbs
add_shortcode('breadcrumbs', function($atts) {
	if ( function_exists( 'breadcrumb_trail' ) ) {
		ob_start();
		breadcrumb_trail();
		return ob_get_clean();
	}
});

// Remove Breadcrumbs inline styles
add_filter( 'breadcrumb_trail_inline_style', '__return_false' );
