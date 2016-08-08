<?php
/*
Template Name: Documents
*/
get_header(); ?>


<div id="page-full-width" class="full-documents" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="documents header">
    <div class="search-form narrow">
      <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
        <div class="search-input">
          <input type="hidden" name="post_type" value="document" />
          <input class="awesomplete" type="text" value="" name="s" id="s" placeholder="Search..." data-list="<?php $all_posts = new WP_QUERY(array('post_type' => 'document', 'posts_per_page' => -1)); ?><?php while ($all_posts->have_posts()) : $all_posts->the_post(); ?><?php the_title(); ?>, <?php endwhile; ?><?php wp_reset_query(); ?>">
        </div>
        <input type="submit" id="searchsubmit" value="" class="button fa">
      </form>
    </div>
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <?php endwhile;?>
    <?php wp_reset_query(); ?>
    <div class="document row doc-row-labels">
      <div class="columns small-12 medium-4 doc-name"><span class="sort-button active" id="title">Title&nbsp;</span></div>
      <div class="columns small-12 medium-3 doc-type"><span class="sort-button" id="document_type">Type&nbsp;</span></div>
      <div class="columns small-12 medium-3 doc-type"><span class="sort-button" id="department-selector">Department&nbsp;</span></div>
      <div class="columns small-12 medium-2 doc-date"><span class="sort-button" id="date">Date&nbsp;</span></div>
      <form type="post" action="" id="sort_form" style="display: none;">
        <input type="text" name="sort_value" id="sort_value" />
        <input type="text" name="order" id="order" />
        <input type="hidden" name="action" value="sortDocuments"/>
        <input type="submit">
      </form>
    </div>
  </div>

  <div class="document-list" id="documentList">
  <?php $documents = new WP_QUERY(array(
    'post_type'       =>  'document',
    'order'           =>  'ASC',
    'orderby'         =>  'title',
    'posts_per_page'  => -1
  )); ?>
  <?php while ($documents->have_posts()) : $documents->the_post(); ?>
    <?php $file = get_field('upload_document');
      if( $file ): ?>
      <a href="<?php echo $file['url']; ?>" download>
        <div class="document row">
          <?php 
            $doc_title = get_the_title();
            $department_of_file = str_replace('-', ' ', implode(", ", get_field('department-selector')));
            if ( empty($doc_title) ) {
              $doc_title = "(no title)";
            }
          ?>
          <div class="columns small-12 medium-4 doc-name"><?php echo $doc_title; ?></div>
          <div class="columns small-12 medium-3 doc-type"><?php the_field('document_type'); ?></div>
          <div class="columns small-12 medium-3 doc-type"><?php echo $department_of_file; ?></div>
          <div class="columns small-12 medium-2 doc-date"><?php the_time('m/d/y'); ?></div>
        </div>
      </a>
    <?php endif; ?>
  <?php endwhile; ?>
  <?php wp_reset_query(); ?>
  </div>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer(); ?>
