<?php
/*
Template Name: Formers
*/
?>

<?php 

  global $current_user;
  $user_id = $current_user->ID;

  if ( $user_id == 1 || $user_id == 41 || $user_id == 53) {

?>


<?php get_header(); ?>

<div id="page-full-width" class="full-formers" role="main">
  <div class="formers-area">

    <?php $former_employees = new WP_QUERY(array(
      'post_status' => 'trash',
      'post_type'   => 'employee',
      'orderby'     => 'modified',
    )); ?>
    <?php while ($former_employees->have_posts()) : $former_employees->the_post(); ?>
      <?php 
        $last_name = get_field('last_name');
        $first_name = get_field('first_name');
        $trash_date = get_the_modified_date();
        $employee_photo = get_field('employee_photo');
        $location = get_field('office');
      ?>
      <p>
        <div style="width: 50px; height: 50px; overflow: hidden; display: block;">
          <?php 
            if ( !empty($employee_photo) ) {
              echo '<a href="' . $employee_photo . '" target="_blank"><img src="' . $employee_photo . '"></a>';
            } else {
              echo '<div class="no-image">' . $first_first_letter . $first_letter . '</div>';
            }
          ?>
        </div>
        <?php echo $first_name; ?> <?php echo $last_name; ?> - <?php echo $trash_date; ?><br><?php echo $location; ?>
      </p>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>


  </div>


<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer(); ?>

<?php
  } else { 
?>

  <script type="text/javascript">
    document.location.href="/";
  </script>

<?php 
  }
?>
