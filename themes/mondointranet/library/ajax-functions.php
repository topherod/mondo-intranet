<?php

function sortDocuments(){

	$sortLoopBy = $_POST['sort_value'];
	$document_type = $_POST['document_type'];
	$order = $_POST['order'];

	if ($document_type != null) {
		if ($sortLoopBy == 'title') {
			$documents = new WP_QUERY(array(
		    'post_type'       =>  'document',
		    'order'           =>  $order,
		    'orderby'         =>  'title',
		    'posts_per_page'  => -1,
		    'meta_query' => array(
		      array(
		        'key'     => 'document_type',
		        'value'   => $document_type,
		        'compare' => 'LIKE' // Make sure the field has a value (i.e. 'city' != null)
		      )
		     ), // End of meta_query
		  ));
		} elseif ($sortLoopBy == 'date') {
			$documents = new WP_QUERY(array(
		    'post_type'       =>  'document',
		    'order'           =>  $order,
		    'orderby'         =>  'date',
		    'posts_per_page'  => -1,
		    'meta_query' => array(
		      array(
		        'key'     => 'document_type',
		        'value'   => $document_type,
		        'compare' => 'LIKE' // Make sure the field has a value (i.e. 'city' != null)
		      )
		     ), // End of meta_query
		  ));
		} else {
		  $documents = new WP_QUERY(array(
		    'post_type'       =>  'document',
		    'order'           =>  $order,
		    'orderby' 				=>	'meta_value',
		    'meta_key'     		=>	$sortLoopBy,
		    'posts_per_page'  =>	-1,
		    'meta_query' => array(
		      array(
		        'key'     => 'document_type',
		        'value'   => $document_type,
		        'compare' => 'LIKE' // Make sure the field has a value (i.e. 'city' != null)
		      )
		     ), // End of meta_query
		  ));
		}
	} else {
		if ($sortLoopBy == 'title') {
			$documents = new WP_QUERY(array(
		    'post_type'       =>  'document',
		    'order'           =>  $order,
		    'orderby'         =>  'title',
		    'posts_per_page'  => -1
		  ));
		} elseif ($sortLoopBy == 'date') {
			$documents = new WP_QUERY(array(
		    'post_type'       =>  'document',
		    'order'           =>  $order,
		    'orderby'         =>  'date',
		    'posts_per_page'  => -1
		  ));
		} else {
		  $documents = new WP_QUERY(array(
		    'post_type'       =>  'document',
		    'order'           =>  $order,
		    'orderby' 				=>	'meta_value',
		    'meta_key'     		=>	$sortLoopBy,
		    'posts_per_page'  =>	-1
		  ));
		}
	}
  while ($documents->have_posts()) : $documents->the_post();
    $file = get_field('upload_document');
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
  <?php 
  endif; 
  endwhile;
	die();
}
add_action('wp_ajax_sortDocuments', 'sortDocuments');
add_action('wp_ajax_nopriv_sortDocuments', 'sortDocuments');

?>