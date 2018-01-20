<?php

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
	$theme_version = et_get_theme_version();
	wp_enqueue_style('divi/style', get_template_directory_uri() . '/style.css', false, $theme_version);
	wp_enqueue_style('ncruralcenter/style', get_stylesheet_directory_uri() . '/stylesheets/main.css', false, null);
  // wp_enqueue_script('ncruralcenter/scripts', get_stylesheet_directory_uri() . '/scripts/main.js', false, $theme_version, true);
}, 100);
