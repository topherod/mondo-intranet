<div class="department-selector department-menu">
	<ul>
		<li id="ops">Ops</li>
		<li id="sales">Sales</li>
		<li id="marketing">Marketing</li>
		<li id="labs">Labs</li>
		<li id="recruiting">Recruiting</li>
		<li id="customer-engagement">CE</li>
		<li id="technology">IT</li>
		<li id="finance">Finance</li>
    <li id="human-relations">HR</li>
	</ul>
</div>

<div class="hide-add-department-form">
<?php 

/* Get user info. */
global $current_user, $wp_roles;

$error = array();    
/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

	if ( !empty( $_POST['department'] ) )
	  update_user_meta( $current_user->ID, 'department', esc_attr( $_POST['department'] ) );

}

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
    <form method="post" id="addDepartment" action="<?php echo home_url(); ?>">
      <input class="text-input" name="department" type="text" id="department" value="<?php the_author_meta( 'department', $current_user->ID ); ?>" />
      <?php 
        //action hook for plugin and extra fields
        do_action('edit_user_profile',$current_user); 
      ?>
      <p class="form-submit">
        <?php echo $referer; ?>
        <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update', 'profile'); ?>" />
        <?php wp_nonce_field( 'update-user' ) ?>
        <input name="action" type="hidden" id="action" value="update-user" />
      </p><!-- .form-submit -->
    </form><!-- #adduser -->
	<?php endwhile; ?>
	<?php else: ?>
    <p class="no-data">
      <?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
    </p><!-- .no-data -->
<?php endif; ?>
<?php wp_reset_query(); ?>
</div>

<script type="text/javascript">
	$(".department-menu.department-selector li").click(function() {
		var department = $(this).attr("id");
		$("input#department").val(department);
		$("#addDepartment").submit();
	});
</script>
