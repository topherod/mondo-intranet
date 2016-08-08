<?php
/*
Template Name: Calendar
*/
get_header(); ?>


<div id="page-full-width" class="full-calendar" role="main">
  <div class="calendar-area">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile;?>
    <?php wp_reset_query(); ?>
  </div>


<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer(); ?>
