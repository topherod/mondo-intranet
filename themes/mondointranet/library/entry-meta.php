<?php
/**
 * Entry meta information for posts
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_entry_meta' ) ) :
	function foundationpress_entry_meta() {
		echo '<time class="updated" datetime="'. get_the_time( 'c' ) .'">'. sprintf( __( 'Posted on %s at %s.', 'foundationpress' ), get_the_date(), get_the_time() ) .'</time>';
		echo '<p class="byline author">'. __( 'Written by', 'foundationpress' ) . ' ' . get_the_author() .'</p>';
	}
endif;


function modify_contact_methods($profile_fields) {

	// Add new fields
	$profile_fields['department'] = 'Department';

	return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');

?>
