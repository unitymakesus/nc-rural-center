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


/**
 * Custom Post Types
 */
add_action( 'init', function() {
	register_post_type( 'staff',
		array('labels' => array(
				'name' => 'Staff',
				'singular_name' => 'Staff',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Staff',
				'edit' => 'Edit',
				'edit_item' => 'Edit Staff',
				'new_item' => 'New Staff',
				'view_item' => 'View Staff',
				'search_items' => 'Search Staff',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
			), /* end of arrays */
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 38,
			'menu_icon' => 'dashicons-groups',
			'capability_type' => 'page',
			'hierarchical' => false,
			'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes'),
			'has_archive' => false,
			'rewrite' => true,
			'query_var' => true
		)
	);
});

/**
 * Staff list shortcode
 */
add_shortcode('staff-listing', function($atts) {
	$staff = new WP_Query([
		'post_type' => 'staff',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC'
	]);

	ob_start();

	if ($staff->have_posts()) : while ($staff->have_posts()) : $staff->the_post();
		?>
		<div class="row person" itemscope itemprop="author" itemtype="http://schema.org/Person">
			<div class="col_5_8">
				<h3 itemprop="name"><?php the_title(); ?></h3>
				<div class="title" itemprop="jobTitle"><?php the_field('title'); ?></div>
				<div><a itemprop="email" target="_blank" rel="noopener" href="mailto:<?php echo eae_encode_str(get_field('email')); ?>"><?php the_field('email'); ?></a></div>
				<?php the_advanced_excerpt(); ?>
			</div>
			<div class="col_3_8">
				<?php the_post_thumbnail('medium', ['alt' => 'Photograph of ' . get_the_title(), 'itemprop' => 'image']); ?>
				<div class="tagline">
					<?php the_field('tagline'); ?>
				</div>
			</div>
		</div>
		<?php
	endwhile; endif; wp_reset_postdata();

	return ob_get_clean();
});

 /**
  *	This will hide the Divi "Project" post type.
  *	Thanks to georgiee (https://gist.github.com/EngageWP/062edef103469b1177bc#gistcomment-1801080) for his improved solution.
  */
add_filter( 'et_project_posttype_args', function( $args ) {
 	return array_merge( $args, array(
 		'public'              => false,
 		'exclude_from_search' => false,
 		'publicly_queryable'  => false,
 		'show_in_nav_menus'   => false,
 		'show_ui'             => false
 	));
}, 10, 1);
