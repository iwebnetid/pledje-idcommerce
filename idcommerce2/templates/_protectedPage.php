<div class="md-requiredlogin login login_pge">
	<!-- <h3><?php _e('This content is restricted to members only', 'memberdeck'); ?>.</h3> -->
	<h1 class="login_lgo"> <img src="<?php echo get_bloginfo('url');?>/wp-content/uploads/2017/03/website-header.png" /></h1>
	<p><?php _e('Please login or register for access', 'memberdeck'); ?>.</p>  
	<?php echo do_shortcode('[TheChamp-Login]'); ?>
	<?php if (isset($_GET['login_failure']) && $_GET['login_failure'] == 1) {
		if (!isset($_GET['error_code'])) {
			echo '<p class="error">Invalid username or incorrect password</p>';
		}
		else if (isset($_GET['error_code']) && $_GET['error_code'] == "incorrect_password") {
			echo '<p class="error">'.__('Incorrect password', 'memberdeck').'</p>';
		}
		else if (isset($_GET['error_code']) && $_GET['error_code'] == "framework_missing") {
			echo '<p class="error">'.__('Critical Error: IgnitionDeck Framework is missing, please install and activiate IgnitionDeck Framework', 'memberdeck').'</p>';
		}
	} ?>
	<p class="error blank-field <?php echo ((isset($_GET['error_code']) && ($_GET['error_code'] == "empty_password" || $_GET['error_code'] == "empty_username")) ? '' : 'hide') ?>"><?php _e('Username or Password should be not be empty', 'memberdeck') ?></p>
	<?php if (!is_user_logged_in()) { ?>
		<?php
		$durl = md_get_durl();
		$args = array('redirect' => $durl,
			'echo' => false);
		echo wp_login_form($args); ?>
	<?php } 
	do_action('idc_below_login_form');
	?>
	<!-- <p><a class="lostpassword" href="<?php echo site_url(); ?>/wp-login.php?action=lostpassword"><?php _e('Lost Password', 'memberdeck'); ?></a></p> -->	<p><a class="lostpassword" href="<?php echo site_url(); ?>/reset-password/?lostpassword=true"><?php _e('Lost Password', 'memberdeck'); ?></a></p>
</div>