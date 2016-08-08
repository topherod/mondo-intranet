<?php 

/**
* Plugin Name: Auto Directory Title
* Description: This plugin automatically updates employee directory post type titles based on first and last names. Needs ACF plugin.
* Version: 1.0
* Author: Mondo
* Author URI: mondo.com
*/

 
// Auto-populate post title with ACF.
function directory_update_postdata( $value, $post_id, $field ) {
  
  $first_name = get_field('first_name', $post_id);
  $last_name = get_field('last_name', $post_id);
  
  $title = $first_name .' '. $last_name;

  $slug = sanitize_title( $title );
  
  $postdata = array(
    'ID'          => $post_id,
    'post_title'  => $title,
    'post_type'   => 'employee',
    'post_name'   => $slug
  );
  
  wp_update_post( $postdata );
  
  return $value;
  
}
add_filter('acf/update_value/name=last_name', 'directory_update_postdata', 10, 3);
add_filter('acf/update_value/name=first_name', 'directory_update_postdata', 10, 3);
add_filter('acf/update_value/name=email_address', 'directory_update_postdata', 10, 3);

?>