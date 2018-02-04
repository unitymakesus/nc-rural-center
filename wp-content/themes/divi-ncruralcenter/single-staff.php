<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

while ( have_posts() ) : the_post();

?>

<div id="main-content">

  <?php echo do_shortcode('[et_pb_section global_module="883"][/et_pb_section]'); // Staff page heading layout ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row person" itemscope itemprop="author" itemtype="http://schema.org/Person">
      <div class="col_3_8">
        <?php the_post_thumbnail('medium', ['alt' => 'Photograph of ' . get_the_title(), 'itemprop' => 'image']); ?>
        <div class="tagline">
          <?php the_field('tagline'); ?>
        </div>
      </div>
      <div class="col_5_8">
      	<h2 class="entry-title main_title"><?php the_title(); ?></h2>
        <div class="title" itemprop="jobTitle"><?php the_field('title'); ?></div>
        <div><a itemprop="email" target="_blank" rel="noopener" href="mailto:<?php echo eae_encode_str(get_field('email')); ?>"><?php the_field('email'); ?></a></div>
      	<div class="entry-content">
      	   <?php the_content(); ?>
      	</div> <!-- .entry-content -->
      </div>
    </div>
  	<?php
  		if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
  	?>

  </article> <!-- .et_pb_post -->

</div> <!-- #main-content -->

<?php endwhile; ?>

<?php get_footer(); ?>
