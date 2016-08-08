<?php
/*
Template Name: News
*/
get_header(); ?>

<a href="<?php echo home_url(); ?>" class="back-button"><span class="fa fa-arrow-left"></span> Back</a>

<div id="page-full-width" class="full-news" role="main">
  <div class="before"></div>
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="news header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <?php endwhile;?>
    <?php wp_reset_query(); ?>
  </div>

  <div class="news-list">

    <?php $news_posts = new WP_QUERY(array(
      'post_type' => 'post',
      'posts_per_page' => 10
    )); ?>
    <?php while ($news_posts->have_posts()) : $news_posts->the_post(); ?>
    <?php 
      $news_date = get_the_date('F j');
    ?>
      <a href="<?php the_permalink(); ?>">
        <div class="news-item">
          <?php if ( has_post_thumbnail() ) { ?>
          <?php 
            $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
            $image = $image[0];
          ?>
          <div class="news-item-img" style="background-image: url('<?php echo $image ?>')"></div>
          <?php } else { ?>
          <div class="news-item-img"> 
            <span class="fa fa-newspaper-o"></span>
          </div>
          <?php } ?>
          <div class="news-item-content">
            <p class="news-item-date"><?php echo $news_date; ?></p>
            <h4><?php the_title(); ?></h4>
            <div class="news-item-excerpt">
              <?php the_excerpt(); ?>
            </div>
          </div>
        </div>
      </a>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>

  </div>

<?php get_footer(); ?>
