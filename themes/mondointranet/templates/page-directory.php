<?php
/*
Template Name: Directory
*/
get_header(); ?>


<div id="page-full-width" class="full-employee-directory" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="directory header">
      <div class="search-form narrow">
        <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
          <div class="search-input">
            <input type="hidden" name="post_type" value="employee" />
            <input class="awesomplete" type="text" value="" name="s" id="s" placeholder="Search..." data-list="<?php $all_posts = new WP_QUERY(array('post_type' => 'employee', 'posts_per_page' => -1)); ?><?php while ($all_posts->have_posts()) : $all_posts->the_post(); ?><?php the_title(); ?>, <?php endwhile; ?><?php wp_reset_query(); ?>">
          </div>
          <input type="submit" id="searchsubmit" value="" class="button fa">
        </form>
      </div>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <div class="directory-navigation">
        <?php foundationpress_directory_nav(); ?>
      </div>

    <?php endwhile;?>
    <?php wp_reset_query(); ?>
    <div class="select-by-letter">
    <?php $directory = new WP_QUERY(array(
      'post_type' => 'employee',
      'order'     => 'ASC',
      'orderby' => 'meta_value',
      'meta_key'      => 'last_name',
      'posts_per_page' => -1
    )); ?>
    <?php $current_letter = "z"; ?>
    <?php while ($directory->have_posts()) : $directory->the_post(); ?>
      <?php 
        $last_name = get_field('last_name');
        $first_letter = $last_name[0];
        if ($first_letter !== $current_letter) {
          echo '<a class="letter-link" href="#' . $first_letter . '">' . $first_letter . '</a>';
        }
        $current_letter = $first_letter;
      ?>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
    </div>
  </div>

  <div class="directory-list">
  <?php $directory = new WP_QUERY(array(
    'post_type' => 'employee',
    'order'     => 'ASC',
    'orderby' => 'meta_value',
    'meta_key'      => 'last_name',
    'posts_per_page' => -1
  )); ?>
  <?php $current_letter = "z"; ?>
  <?php while ($directory->have_posts()) : $directory->the_post(); ?>
    <?php 
      $last_name = get_field('last_name');
      $first_name = get_field('first_name');
      $first_letter = $last_name[0];
      $first_first_letter = $first_name[0];;
      $employee_photo = get_field('employee_photo');
      $location = get_field('office');
      if ($first_letter !== $current_letter) {
        echo '<div class="letter-spacer" id="' . $first_letter . '">' . $first_letter . '</div>';
        $current_letter = $first_letter;
      }
    ?>
    <div class="columns small-12 medium-6 employee <?php if (strtotime( get_field('start_date') ) > strtotime('-30 days')) { echo 'new-employee'; } ?> <?php
echo sanitize_title_with_dashes( get_field('office') ); ?>">
      <div class="employee-photo">
      <?php 
        if ( !empty($employee_photo) ) {
          echo '<a href="' . $employee_photo . '" target="_blank"><img src="' . $employee_photo . '"></a>';
        } else {
          echo '<div class="no-image">' . $first_first_letter . $first_letter . '</div>';
        }
      ?>

      </div>
      <div class="employee-main-info">
        <h4><?php the_field('first_name') ?> <?php the_field('last_name') ?></h4>
        <p>
        <?php 
          if (get_field('job_title') == 'Other') {
            the_field('other');
          } else {
            the_field('job_title');
          }
        ?>
        </p>
      </div>
      <div class="employee-sub-info">
        <p><span class="fa fa-envelope"></span> <a href="mailto:<?php the_field('email_address') ?>"><?php the_field('email_address') ?></a></p>
        <?php if ( !empty( get_field('business_phone_number') ) ) { ?>
          <p><span class="fa fa-phone"></span> <?php the_field('business_phone_number') ?></p>
        <?php } ?>
        <?php if ( !empty( get_field('cell_phone_number') ) ) { ?>
          <p><span class="fa fa-mobile-phone"></span> <?php the_field('cell_phone_number') ?></p>
        <?php } ?>
        <p><span class="fa fa-map-marker"></span> <a href="/directory/<?php echo sanitize_title_with_dashes($location); ?>"><?php echo $location; ?></a></p>
      </div>

    </div>
  <?php endwhile; ?>
  <?php wp_reset_query(); ?>
  </div>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer(); ?>
