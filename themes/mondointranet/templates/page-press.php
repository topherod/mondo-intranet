<?php
/*
Template Name: Press
*/
get_header(); ?>


<div id="page-full-width" class="full-press" role="main">
  <div class="before"></div>
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="press header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <?php endwhile;?>
    <?php wp_reset_query(); ?>
  </div>

  <div class="press-list">

    <?php $press_posts = new WP_QUERY(array(
      'post_type' => 'press',
      'posts_per_page' => -1
    )); ?>
    <?php while ($press_posts->have_posts()) : $press_posts->the_post(); ?>
    <?php 
      $press_link = get_field('press_link');
      $press_date = get_the_date('F j');
    ?>
      <div class="press-item">
        <a href="<?php echo $press_link; ?>" class="press-link">
        
          <p class="press-item-date"><?php echo $press_date; ?></p>
          <h4><?php the_title(); ?> <span class="fa fa-external-link"></span></h4>
          <p class="press-item-source"><?php the_field('press_source'); ?></p>
        </a>
        <div class="press-share">
          <span class="share-text">Share:</span> <a href="https://twitter.com/home?status=Check%20out%20Mondo%20in%20the%20Press!%20<?php echo $press_link; ?>" target="_blank" class="fa fa-twitter"></a> <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $press_link; ?>" target="_blank" class="fa fa-facebook"></a> <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $press_link; ?>&title=Check%20out%20Mondo%20in%20the%20Press!" target="_blank" class="fa fa-linkedin"></a> <a href="mailto:?&subject=Check out Mondo in the Press!&body=Check%20out%20Mondo%20in%20the%20Press!%0A%0A<?php echo $press_link; ?>" target="_blank" class="fa fa-envelope"></a>
        </div>
      </div>

    <?php endwhile; ?>
    <?php wp_reset_query(); ?>

  </div>

<?php get_footer(); ?>
