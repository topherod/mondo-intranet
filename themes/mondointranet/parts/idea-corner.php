<?php global $current_user;
  get_currentuserinfo();
  $user_email_for_form = $current_user->user_email;
  $user_name_for_form = $current_user->user_firstname . ' ' . $current_user->user_lastname;
  if($user_name_for_form == " ") {
  	$user_name_for_form = $user_email_for_form;
  }
?>

<div class="idea-corner-form">
  <?php echo do_shortcode( '[contact-form-7 id="117" title="Idea Corner"]' ); ?>
</div>

<script type="text/javascript">
	jQuery("input[name='idea-name']").val("<?php echo $user_name_for_form; ?>");
	jQuery("input[name='idea-email']").val("<?php echo $user_email_for_form; ?>");
</script>
