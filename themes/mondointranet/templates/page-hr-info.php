<?php
/*
Template Name: HR Info Page
*/
get_header(); ?>


<div id="page-full-width" class="hr-page" role="main">

    <?php $hr_sections = new WP_QUERY(array(
      'post_type' => 'hr-sections'
    )); ?>
    <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
      <?php while ($hr_sections->have_posts()) : $hr_sections->the_post(); ?>
      <li class="accordion-item" data-accordion-item>
        <a class="accordion-title"><?php the_title(); ?></a>
        <div class="accordion-content" data-tab-content>
          <?php the_content(); ?>
        </div>
      </li>
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>
    </ul>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer(); ?>
