<?php
/*
Template Name: Search
*/
get_header(); ?>


<div id="page-full-width" class="full-search" role="main">
  <div class="before"></div>
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="search header">
    <?php the_content(); ?>
    <?php endwhile;?>
    <?php wp_reset_query(); ?>
  </div>

    <div class="search-form full">
      <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
        <div class="search-input">
          <input class="awesomplete" type="text" value="" name="s" id="s" placeholder="Search..." data-list="<?php $all_posts = new WP_QUERY(array('post_type' => array('post', 'press', 'document', 'employee', 'tribe_events'), 'posts_per_page' => -1)); ?><?php while ($all_posts->have_posts()) : $all_posts->the_post(); ?><?php the_title(); ?>, <?php endwhile; ?><?php wp_reset_query(); ?>">
        </div>
        <div class="search-options">
          <div class="options-label">Filter your search</div>
          <input type="checkbox" name="post_type[]" value="document" id="docCheck"><label class="s-option" for="docCheck">Documents</label>
          <input type="checkbox" name="post_type[]" value="employee" id="employeeCheck"><label class="s-option" for="employeeCheck">Directory</label>
          <input type="checkbox" name="post_type[]" value="tribe_events" id="eventCheck"><label class="s-option" for="eventCheck">Events</label>
          <input type="checkbox" name="post_type[]" value="post" id="postCheck"><label class="s-option" for="postCheck">News</label>
          <input type="checkbox" name="post_type[]" value="press" id="pressCheck"><label class="s-option" for="pressCheck">Press</label>
        </div>
          <input type="submit" id="searchsubmit" value="Search" class="button">
      </form>
    </div>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer(); ?>
