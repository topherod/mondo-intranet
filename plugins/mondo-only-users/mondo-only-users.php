<?php 

/**
* Plugin Name: Mondo Only Users
* Description: This plugin restricts users from having a non-mondo email address.
* Version: 1.0
* Author: Mondo
* Author URI: mondo.com
*/

 
function mondo_only_users() {
	global $current_user;
  get_currentuserinfo();
  $user_email = $current_user->user_email;

  $allowed = array('mondo.com', 'mondolabs.com');
  if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    $domain = array_pop(explode('@', $user_email));

    if ( ! in_array($domain, $allowed)) {
    	wp_logout();
    	require_once(ABSPATH.'wp-admin/includes/user.php' );
    	wp_delete_user( $current_user->ID );
    	header("Refresh:0");
    	echo '<div class="not-autorized" style="font-family: sans-serif; position: fixed; z-index: 999999; background: #fff; text-align: center; padding: 50px; top: 0; right: 0; bottom: 0; left: 0;">YOU ARE NOT AUTHORIZED TO VIEW THIS PAGE.</div>';
    }

	}
}
add_action( 'init', 'mondo_only_users' );

?>