<?php

function custom_login_message() {
$message = '<span class="login-welcome">Welcome to the Mondo Intranet</span><br><br><br><span class="login-info">Sign in using your @Mondo email</span><br><br>';
return $message;
}
add_filter('login_message', 'custom_login_message');

function custom_login_log_url() { ?>
	<?php if ( is_user_logged_in() ) { ?>
		<script type="text/javascript">
			window.location.replace("<?php echo home_url(); ?>");
		</script>
	<?php } ?> 
  <script type="text/javascript">
    window.onload = function() {
    	var els = document.getElementsByTagName("a");
			for (var i = 0, l = els.length; i < l; i++) {
			    var el = els[i];
			    if (el.href === 'https://wordpress.org/') {
			        el.href = "https://mondo.com/";
			        el.title = "Mondo";
			    }
			}
		};
		document.getElementsByID('registerform').remove();
  </script>
  <style type="text/css">
  body.login {
  	max-width: 100%;
  	overflow: hidden;
  }
		body.login:before {
		  content: '';
		  display: block;
		  position: fixed;
		  top: 0;
		  right: 0;
		  bottom: 0;
		  left: 0;
		  background: rgba(255, 255, 255, 0);
		    background-image: url('/wp-content/themes/mondointranet/assets/images/login-background.jpg');
		    background-repeat: no-repeat;
		    background-position: center right;
		    background-size: cover;
		}
		body.login:after {
		  content: '';
		  display: block;
		  position: fixed;
		  top: 0;
		  right: 0;
		  bottom: 0;
		  left: 0;
		  background: #21324f;
		  opacity: .9;
		}
		.login p {
		  display: none;
		}
		#login {
	    position: relative;
	    background: rgba(255, 255, 255, 0);
	    z-index: 99;
	    text-align: center;
	    color: #fff;
	    box-sizing: border-box;
		}
		span.login-welcome {
		    font-size: 40px;
		    font-weight: 300;
		    line-height: 1.2em;
		    letter-spacing: .05em;
		}
		span.login-info {
		    font-size: 18px;
		    font-weight: 500;
		}
		#loginform {
		    padding: 0;
		    border: 0;
		    box-shadow: none;
		    background: rgba(255, 255, 255, 0);
		}
		.mo-openid-app-icons a {
		  margin: auto;
		  padding: 40px !important;
		  border-radius: 0 !important;
		  font-size: 0;
		  border: 4px solid rgba(255, 255, 255, 0);
		  transition: all .3s ease;
		}
		.mo-openid-app-icons a:hover {
		  border-color: #FFF;
		}
		.mo-openid-app-icons a span {
		  font-size: 20px;
		  letter-spacing: .05em;
		  font-weight: 300;
		  line-height: 40px;
		}
		.mo-openid-app-icons a i {
		    display: none;
		}
		#login h1 {
		  margin-top: 40px;
		}
		#login h1 a {
		    background-image: url('/wp-content/themes/mondointranet/assets/images/mondo.png');
		    background-size: contain;
		    height: 30px;
		    width: 100%;
		}
		.mobile #login {
	    padding: 20px;
	    max-width: 100%;
		}
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'custom_login_log_url' );

// Show or hide the admin bar for specific user roles
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
$user = wp_get_current_user(); 
$bar_allowed_roles = array('administrator', 'super_editor'); 
$user_is_allowed_bar = array_intersect($bar_allowed_roles, $user->roles );
	if ( !$user_is_allowed_bar ) {
	  show_admin_bar(false);
	}
}

function user_is_allowed() {
	$user = wp_get_current_user(); 
	$allowed_roles = array('manager', 'administrator', 'super_editor'); 
	if ( array_intersect($allowed_roles, $user->roles ) ) {
		return TRUE;
	} else {
		return FALSE;
	}
}

?>