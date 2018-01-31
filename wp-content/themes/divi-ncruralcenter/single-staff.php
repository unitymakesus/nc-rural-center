<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

while ( have_posts() ) : the_post();

?>

<div id="main-content">

  <?php echo do_shortcode('[et_pb_section global_module="883"][/et_pb_section]'); // Staff page heading layout ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  	<h2 class="entry-title main_title"><?php the_title(); ?></h2>
  	<?php
  		$thumb = '';

  		$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

  		$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
  		$classtext = 'et_featured_image';
  		$titletext = get_the_title();
  		$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
  		$thumb = $thumbnail["thumb"];
  	?>

  	<div class="entry-content">
  	   <?php the_content(); ?>
  	</div> <!-- .entry-content -->

  	<?php
  		if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
  	?>

  </article> <!-- .et_pb_post -->

</div> <!-- #main-content -->

<?php endwhile; ?>

<?php get_footer(); ?>
