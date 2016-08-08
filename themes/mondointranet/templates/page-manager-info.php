<?php
/*
Template Name: Manager Info Page
*/
if( !user_is_allowed() ) { 
    wp_redirect( home_url() );
    exit;
} 
get_header(); 
?>


<div id="page-full-width" class="manager-page" role="main">

    <?php $manager_sections = new WP_QUERY(array(
      'post_type' => 'manager-sections'
    )); ?>
    <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
      <?php while ($manager_sections->have_posts()) : $manager_sections->the_post(); ?>
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