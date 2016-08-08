<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<div id="page-full-width" class="full-single" role="main">
  <a href="<?php echo home_url(); ?>/news">
	  <div class="single header">
	    <span>News</span>
	  </div>
  </a>
	<div class="single-post">

	<?php do_action( 'foundationpress_before_content' ); ?>
	<?php while ( have_posts() ) : the_post(); ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php foundationpress_entry_meta(); ?>
			<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
			<div class="entry-content">

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="post-image">
					<?php the_post_thumbnail( '', array('class' => 'th') ); ?>
				</div>
			<?php endif; ?>

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
