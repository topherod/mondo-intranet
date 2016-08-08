<?php 

/**
* Plugin Name: Add User Roles
* Description: This plugin adds custom roles. (Super Editor)
* Version: 1.0
* Author: Mondo
* Author URI: mondo.com
*/


function add_super_editor() {
  add_role( 'super_editor', 'Super Editor', 
    array(
      'edit_users'                    => true,
      'add_users'                     => true,
      'create_users'                  => true,
      'delete_users'                  => true,
      'remove_users'                  => true,
      'promote_users'                 => true,
      'list_users'                    => true,
      'delete_others_pages'           => true,
      'delete_others_posts'           => true,
      'delete_pages'                  => true,
      'delete_posts'                  => true,
      'delete_private_pages'          => true,
      'delete_private_posts'          => true,
      'delete_published_pages'        => true,
      'delete_published_posts'        => true,
      'edit_others_pages'             => true,
      'edit_others_posts'             => true,
      'edit_pages'                    => true,
      'edit_posts'                    => true,
      'edit_private_pages'            => true,
      'edit_private_posts'            => true,
      'edit_published_pages'          => true,
      'edit_published_posts'          => true,
      'manage_categories'             => true,
      'manage_links'                  => true,
      'moderate_comments'             => true,
      'publish_pages'                 => true,
      'publish_posts'                 => true,
      'read'                          => true,
      'read_private_pages'            => true,
      'read_private_posts'            => true,
      'unfiltered_html'               => true,
      'upload_files'                  => true,
      'edit_tribe_event'              => true,
      'read_tribe_event'              => true,
      'delete_tribe_event'            => true,
      'delete_tribe_events'           => true,
      'edit_tribe_events'             => true,
      'edit_others_tribe_events'      => true,
      'delete_others_tribe_events'    => true,
      'publish_tribe_events'          => true,
      'edit_published_tribe_events'   => true,
      'delete_published_tribe_events' => true,
      'delete_private_tribe_events'   => true,
      'edit_private_tribe_events'     => true,
      'read_private_tribe_events'     => true,
      'edit_tribe_venue' => true,
      'read_tribe_venue' => true,
      'delete_tribe_venue' => true,
      'delete_tribe_venues' => true,
      'edit_tribe_venues' => true,
      'edit_others_tribe_venues' => true,
      'delete_others_tribe_venues' => true,
      'publish_tribe_venues' => true,
      'edit_published_tribe_venues' => true,
      'delete_published_tribe_venues' => true,
      'delete_private_tribe_venues' => true,
      'edit_private_tribe_venues' => true,
      'read_private_tribe_venues' => true,
      'edit_tribe_organizer' => true,
      'read_tribe_organizer' => true,
      'delete_tribe_organizer' => true,
      'delete_tribe_organizers' => true,
      'edit_tribe_organizers' => true,
      'edit_others_tribe_organizers' => true,
      'delete_others_tribe_organizers' => true,
      'publish_tribe_organizers' => true,
      'edit_published_tribe_organizers' => true,
      'delete_published_tribe_organizers' => true,
      'delete_private_tribe_organizers' => true,
      'edit_private_tribe_organizers' => true,
      'read_private_tribe_organizers' => true,
    ) 
  );
}
function remove_super_editor() {
  remove_role( 'super_editor' );
}

function add_manager() {
  add_role( 'manager', 'Manager', 
    array(
      'read' => true
    ) 
  );
}
function remove_manager() {
  remove_role( 'manager' );
}


register_activation_hook( __FILE__, 'add_super_editor' );
register_deactivation_hook( __FILE__, 'remove_super_editor' );

register_activation_hook( __FILE__, 'add_manager' );
register_deactivation_hook( __FILE__, 'remove_manager' );

?>