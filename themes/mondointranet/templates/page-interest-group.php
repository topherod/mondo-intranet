<?php
/*
Template Name: Interest Group
*/
get_header(); ?>


<div id="page-full-width" class="full-interest-groups" role="main">
  <div class="before"></div>
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php endwhile;?>
    <?php wp_reset_query(); ?>
  </div>

    <?php $interest_group_posts = new WP_QUERY(array(
      'post_type' => 'interest-group',
      'posts_per_page' => -1
    )); ?>


    <ul class="list--interest-groups">
      <?php while ($interest_group_posts->have_posts()) : $interest_group_posts->the_post(); ?>
      <?php $post_link = get_post_permalink()?>     
      <li class="list-item">
        <a class="list-item__title" href="<?php echo $post_link ?>"><h4><?php the_title(); ?></h4></a>
        <div class="list-item__content">
          <?php the_excerpt(); ?>
        </div>
        <a class="list-item__link" href="<?php echo $post_link ?>">Learn More </a>
      </li>
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>
    </ul>

    <?php while ( have_posts() ) : the_post(); ?>
      <div class="call-out">
        <?php the_content(); ?>
      </div>
    <?php endwhile;?>
    <?php wp_reset_query(); ?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer(); ?>
