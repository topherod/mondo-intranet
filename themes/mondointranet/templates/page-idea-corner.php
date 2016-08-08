<?php
/*
Template Name: Idea Corner
*/
get_header(); ?>


<div id="page-full-width" class="full-idea-corner" role="main">
  <div class="before"></div>
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="idea header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <?php endwhile;?>
    <?php wp_reset_query(); ?>
  </div>

<?php get_template_part( 'parts/idea-corner' ); ?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer(); ?>
