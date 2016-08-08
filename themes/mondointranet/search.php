<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="row">
	<div class="small-12 columns" role="main">

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

		<?php do_action( 'foundationpress_before_content' ); ?>

		<h2><?php _e( 'Search Results for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"</h2>

	<?php if ( have_posts() ) : ?>
		<div class="search-list">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php if( get_post_type() == 'employee' ) { ?>

			<div class="directory-post">
				<div class="s-header"><span class="fa fa-user"></span> Employee</div>
		    <?php 
		      $last_name = get_field('last_name');
		      $first_name = get_field('first_name');
		      $first_letter = $last_name[0];
		      $first_first_letter = $first_name[0];;
		      $employee_photo = get_field('employee_photo');
		      $location = get_field('office');
		    ?>
		    <div class="employee <?php if (strtotime( get_field('start_date') ) > strtotime('-30 days')) { echo 'new-employee'; } ?> <?php echo sanitize_title_with_dashes( get_field('office') ); ?>">
		    	<div class="columns small-12 medium-6">
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
			    </div>
			    <div class="columns small-12 medium-6">
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

		    </div>
		  </div>

			<?php } elseif( get_post_type() == 'document' ) { ?>

			<div class="document-post">
				<div class="s-header"><span class="fa fa-file"></span> Document</div>
          <?php $file = get_field('upload_document');
          if( $file ): ?>
            <a href="<?php echo $file['url']; ?>" download>
              <div class="s-doc-item">
                <?php 
                  $doc_title = get_the_title();
                  if ( empty($doc_title) ) {
                    $doc_title = "(no title)";
                  }
                ?>
                <span class="document-title"><?php echo $doc_title; ?></span>
                <span class="view-doc fa fa-download"></span>
              </div>
            </a>
          <?php endif; ?>
		    </div>
      <?php } elseif( get_post_type() == 'post' ) { ?>
        <div class="news-post">
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
        </div>

      <?php } elseif( get_post_type() == 'tribe_events' ) { ?>
        <div class="news-post" style="background: #6755f9;">
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
                <span class="fa fa-calendar"></span>
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
        </div>

      <?php } elseif( get_post_type() == 'press' ) { ?>
        <div class="press-post">
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
        </div>

      <?php } else { ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php } ?>
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		</div>
	<?php endif;?>

	<?php do_action( 'foundationpress_before_pagination' ); ?>

	<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>

		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
		</nav>
	<?php } ?>

	<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
</div>
<?php get_footer(); ?>
