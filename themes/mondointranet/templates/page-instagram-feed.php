<?php
/*
Template Name: Instagram Feed
*/
get_header(); ?>


<div id="page-full-width" class="full-instagram" role="main">
  <div class="before"></div>
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="instagram header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <?php endwhile;?>
    <?php wp_reset_query(); ?>
  </div>

<div class="intragram-full" id="intragramFull"></div>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer(); ?>
