<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<div id="page-full-width" class="full-single interest-groups" role="main">
  <a href="<?php echo home_url(); ?>/interest-groups">
	  <div class="single header">
	    <span>Interest Groups</span>
	  </div>
  </a>
	<div class="single-post">

	<?php do_action( 'foundationpress_before_content' ); ?>
	<?php while ( have_posts() ) : the_post(); ?>
			
			<?php if ( has_post_thumbnail() ) : ?>
				<?php  	
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					$image = $image[0];
				?>
				<div class="post-image" role="banner" style="background-image: url('<?php echo $image ?>')">
				</div>
			<?php endif; ?>

			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
			<div class="entry-content">

			<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php do_action( 'foundationpress_post_before_comments' ); ?>
			
			<?php comments_template(); ?>

			<?php do_action( 'foundationpress_post_after_comments' ); ?>
	<?php endwhile;?>

	<?php do_action( 'foundationpress_after_content' ); ?>
	</div>
	<?php get_footer(); ?>
</div>
