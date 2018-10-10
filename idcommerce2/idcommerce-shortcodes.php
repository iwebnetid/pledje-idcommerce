<?php
add_shortcode('memberdeck_dashboard', 'memberdeck_dashboard');
add_shortcode('idc_dashboard', 'memberdeck_dashboard');
add_shortcode('memberdeck_checkout', 'memberdeck_checkout');
add_shortcode('idc_checkout', 'memberdeck_checkout');
add_shortcode('idc_button', 'idc_button');

function memberdeck_dashboard() 
{
	ob_start();
	global $crowdfunding;
	if (function_exists('idf_get_querystring_prefix')) {
		$prefix = idf_get_querystring_prefix();
	} else {
		$prefix = '?';
	}
	$instant_checkout = instant_checkout();
	/* Mange Dashboard Visibility */
	if (is_user_logged_in()) {
		//global $customer_id; --> will trigger 1cc notice
		$current_user = wp_get_current_user();
		$user_id = $current_user->ID;
		$fname = $current_user->user_firstname;
		$lname = $current_user->user_lastname;
		$registered = $current_user->user_registered;
		$key = md5($registered.$current_user->ID);
		// expire any levels that they have not renewed
		$level_check = memberdeck_exp_checkondash($current_user->ID);
		// this is an array user options
		$user_levels = ID_Member::user_levels($current_user->ID);
	}

	if (isset($user_levels)) {
		// this is an array of levels a user has access to
		$access_levels = unserialize($user_levels->access_level);
		if (is_array($access_levels)) {
			$unique_levels = array_unique($access_levels);
		}
	}
	
	$downloads = ID_Member_Download::get_downloads();
	// we have a list of downloads, but we need to get to the levels by unserializing and then restoring as an array
	if (!empty($downloads)) {
		// this will be a new array of downloads with array of levels
		$download_array = array();
		foreach ($downloads as $download) {
			$new_levels = unserialize($download->download_levels);
			unset($download->download_levels);
			// lets loop through each level of each download to see if it matches
			$pass = false;
			if (!empty($new_levels)) {
				foreach ($new_levels as $single_level) {
					if (isset($unique_levels) && in_array($single_level, $unique_levels)) {
						// if this download belongs to our list of user levels, add it to array
						//$download->download_levels = $new_levels;
						$pass = true;
						$e_date = ID_Member_Order::get_expiration_data($user_id, $single_level);
					}
				}
			}
			if (isset($user_id))
				$license_key = MD_Keys::get_license($user_id, $download->id);

			// Putting image URL on image_link according to new changes, as attachment_id might be stored in that field instead of URL
			if (!empty($download->image_link) && stristr($download->image_link, "http") === false) {
				$download_thumb = wp_get_attachment_image_src($download->image_link, 'idc_dashboard_download_image_size');
				if (!empty($download_thumb)) {
					$download->image_link = $download_thumb[0];
					$width = $download_thumb[1];
					$height = $download_thumb[2];
					if (function_exists('idf_image_layout_by_dimensions')) {
						$image_layout = idf_image_layout_by_dimensions($width, $height);
					} else {
						$image_layout = 'landscape';
					}
					$download->image_width = $width;
					$download->image_height = $height;
					$download->image_layout = $image_layout;
				}
			}
			else if (empty($download->image_link)) {
				$download->image_link = plugins_url('images/dashboard-download-placeholder.jpg', __FILE__);
				$download->image_layout = 'landscape';
			}
			else {	
				$download->image_layout = 'landscape';
			}
			if ($pass) {
				$days_left = idmember_e_date_format($e_date);
				$download->key = $license_key;
				$download->days_left = $days_left;
				$download_array['visible'][] = $download;
			}
			else {
				$download_array['invisible'][] = $download;
			}
		}
		// we should now have an array of downloads that this user has accces to
	}
	if (is_user_logged_in()) {
		$dash = get_option('md_dash_settings');
		$general = maybe_unserialize(get_option('md_receipt_settings'));
		if (!empty($dash)) {
			if (!is_array($dash)) {
				$dash = unserialize($dash);
			}
			if (isset($dash['layout'])) {
				$layout = $dash['layout'];
			}
			else {
				$layout = 1;
			}
			if (isset($dash['alayout'])) {
				$alayout = $dash['alayout'];
			}
			else {
				$alayout = 'md-featured';
			}
			$aname = $dash['aname'];
			if (isset($dash['blayout'])) {
				$blayout = $dash['blayout'];
			}
			else {
				$blayout = 'md-featured';
			}
			$bname = $dash['bname'];
			if (isset($dash['clayout'])) {
				$clayout = $dash['clayout'];
			}
			else {
				$clayout = 'md-featured';
			}
			$cname = $dash['cname'];
			if ($layout == 1) {
				$p_width = 'half';
				$a_width = 'half';
				$b_width = 'half';
				$c_width = 'half';
			}
			else if ($layout == 2) {
				$p_width = 'half';
				$a_width = 'half';
				$b_width = 'full';
				$c_width = 'full';
			}
			else if ($layout == 3) {
				$p_width = 'full';
				$a_width = 'full';
				$b_width = 'full';
				$c_width = 'full';
			}
			else if ($layout == 4) {
				$p_width = 'half';
				$a_width = 'half-tall';
				$b_width = 'half';
				$c_width = 'hidden';
			}
			if (isset($dash['powered_by'])) {
				$powered_by = $dash['powered_by'];
			}
			else {
				$powered_by = 1;
			}
		}

		// If credits are enabled from settings, then get available credits, else set them to 0
		if (isset($general['enable_credits']) && $general['enable_credits'] == 1) {
			$md_credits = md_credits();
		} else {
			$md_credits = 0;
		}
		$settings = get_option('memberdeck_gateways', true);
		//die();
		if (isset($settings)) {
			$es = (isset($settings['es']) ? $settings['es'] : 0);
			$efd = (isset($settings['efd']) ? $settings['efd'] : 0);
			$eauthnet = (isset($settings['eauthnet']) ? $settings['eauthnet'] : 0);
			$splashnet = (isset($settings['splashnet']) ? $settings['splashnet'] : 0);
			if ($es == 1) {
				$customer_id = customer_id();
			}
			else if ($efd == 1) {
				$fd_card_details = fd_customer_id();
				if (!empty($fd_card_details)) {
					$fd_token = $fd_card_details['fd_token'];
					$customer_id = $fd_card_details;
				}
			}
			else if ($eauthnet == 1) {
				$authorize_customer_id = authnet_customer_id();
				if (!empty($authorize_customer_id)) {
					$customer_id = $authorize_customer_id['authorizenet_payment_profile_id'];
				} else {
					$customer_id = "";
				}
			}
			
			else if ($splashnet == 1) {
				$splash_customer_id = get_user_meta($user_id, 'splash_profile_id',true);
				
				if (!empty($splash_customer_id)) {
					$customer_id = $splash_customer_id['splash_payment_profile_id'];
					$splash_cust_api_key  = $splash_customer_id['splash_payment_apii_id'];
				}else {
				    $customer_id = '';
				}
			}
			
			$customer_id = apply_filters('idc_checkout_form_customer_id', (isset($customer_id) ? $customer_id : ''), '', $settings);
		}
		if ($md_credits > 0 || !empty($customer_id)) {
			$show_occ = true;
		}
		else {
			$show_occ = false;
		}
		include_once 'templates/admin/_memberDashboard.php';
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
	else {
		include_once 'templates/_protectedPage.php';
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
}

function memberdeck_checkout($attrs) {
	ob_start();
	$url = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$customer_id = customer_id();
	$instant_checkout = instant_checkout();
	print_r($attrs);
	//die();
	$renewable = false;
	global $crowdfunding;
	global $first_data;
	global $pwyw;
	global $global_currency;
	global $stripe_api_version;
	global $post;
	//print_r($post);
//	die();
	// use the shortcode attr to get our level id
	 $product_id = $attrs['product'];
	//die();
	do_action('doing_idc_checkout', $product_id);
	if (isset($pwyw) && $pwyw) {
		if (isset($_GET['price']) && $_GET['price'] > 0) {
			if ($global_currency == 'BTC' || $global_currency == 'credits') {
				$pwyw_price = number_format( sprintf('%f', floatval($_GET['price'])), 2, ".", "" );
			}
			else {
				$pwyw_price = number_format( floatval(esc_attr($_GET['price'])), 2, ".", "" );
			}
		}
		else if (isset($_POST['price']) && $_POST['price'] > 0) {
			if ($global_currency == 'BTC' || $global_currency == 'credits') {
				$pwyw_price = number_format( sprintf('%f', floatval($_POST['price'])), 2, ".", "" );
			}
			else {
				$pwyw_price = number_format( floatval(esc_attr($_POST['price'])), 2, ".", "" );
			}
		}
	}

	// get the user info
	if (is_user_logged_in()) {
		$current_user = wp_get_current_user();
		$email = $current_user->user_email;
		$fname = $current_user->user_firstname;
		$lname = $current_user->user_lastname;
		// Check first if this user is allowed to purchase
		$is_purchases_blocked = get_user_meta($current_user->ID, 'block_purchasing', true);
		if (!empty($is_purchases_blocked) && $is_purchases_blocked == "1") {
			include_once 'templates/_purchasesBlocked.php';
			$content = ob_get_contents();
			ob_clean();
			return $content;
		}
		$member = new ID_Member($current_user->ID);
		$user_data = ID_Member::user_levels($current_user->ID);
		if (!empty($user_data)) {
			$user_levels = unserialize($user_data->access_level);
		}
		else {
			$user_levels = null;
		}
		// lets see how many levels this user owns
		if (is_array($user_levels)) {
			foreach ($user_levels as $level) {
				if ($level == $product_id) {
					$renewable = ID_Member_Level::is_level_renewable($level);
					// Check if order exists for that product, if yes, then renewable is true
					// #devnote should be part of above function
					if (is_user_logged_in()) {
						$last_order = new ID_Member_Order(null, $current_user->ID, $product_id);
						$get_last_order = $last_order->get_last_order();
						if (empty($get_last_order)) {
							$renewable = false;
						}
					}
					if (!$renewable) {
						$already_valid = true;
					}
				}
			}
		}
	}
	$settings = get_option('md_receipt_settings');
	if (!empty($settings)) {
		$settings = maybe_unserialize($settings);
		$coname = apply_filters('idc_company_name', $settings['coname']);
		$guest_checkout = $settings['guest_checkout'];
	}
	else {
		$coname = '';
		$guest_checkout = 0;
	}
	// #devnote why are we changing var name here?
	// Settings assigning to general variable
	$general = maybe_unserialize($settings);
	
	$gateways = get_option('memberdeck_gateways');
	if (!empty($gateways)) {
		// gateways are saved and we can now get settings from Stripe and Paypal
		if (is_array($gateways)) {
			$mc = (isset($gateways['manual_checkout']) ? $gateways['manual_checkout'] : 0);
			$pp_email = (isset($gateways['pp_email']) ? $gateways['pp_email'] : '');
			$test_email = (isset($gateways['test_email']) ? $gateways['test_email'] : '');
			$pk = (isset($gateways['pk']) ? $gateways['pk'] : '');
			$sk = (isset($gateways['sk']) ? $gateways['sk'] : '');
			$tpk = (isset($gateways['tpk']) ? $gateways['tpk'] : '');
			$tsk = (isset($gateways['tsk']) ? $gateways['tsk'] : '');
			$test = (isset($gateways['test']) ? $gateways['test'] : 0);
			$epp = (isset($gateways['epp']) ? $gateways['epp'] : 0);
			$es = (isset($gateways['es']) ? $gateways['es'] : 0);
			$esc = (isset($gateways['esc']) ? $gateways['esc'] : 0);
			$ecb = (isset($gateways['ecb']) ? $gateways['ecb'] : '');
			$eauthnet = (isset($gateways['eauthnet']) ? $gateways['eauthnet'] : '0');
			$splashnet = (isset($gateways['splashnet']) ? $gateways['splashnet'] : '0'); //splash
			$eppadap = (isset($gateways['eppadap']) ? $gateways['eppadap'] : '0');
			$efd = (isset($gateways['efd']) ? $gateways['efd'] : '0');
            if (isset($efd) && $efd) {
				$gateway_id = $gateways['gateway_id'];  
				$fd_pw = $gateways['fd_pw']; 
				$efd = $gateways['efd'];
			}
			if (!is_idc_free() && function_exists('is_id_pro') && is_id_pro()) {
				// Now we check for additional gateway data
				if ($es) {
					// #devnote remove this
					// Do nothing because Stripe customer id is already set
				}
				else if ($efd) {
					$fd_card_details = fd_customer_id();
					if (!empty($fd_card_details)) {
						$customer_id = $fd_card_details['fd_token'];
					}
				}
				else if ($eauthnet) {
					//echo "ok";    
					//die();
					 $authorize_customer_id = authnet_customer_id();
					if (!empty($authorize_customer_id)) {
						//echo "helo";
						 $customer_id = $authorize_customer_id['authorizenet_payment_profile_id'];
					} else {
						//echo "bye";
						$customer_id = "";
					}
				}
				else if($splashnet)
				{
					$splash_customer_id = get_user_meta($user_id, 'splash_profile_id',true);
				
					if (!empty($splash_customer_id)) {
						$customer_id = $splash_customer_id['splash_payment_profile_id'];
						$splash_cust_api_key  = $splash_customer_id['splash_payment_apii_id'];
					}else {
						$customer_id = '';
					}
				}
				$customer_id = apply_filters('idc_checkout_form_customer_id', $customer_id, $product_id, $gateways);

				$esc = $esc;
				$check_claim = apply_filters('md_level_owner', get_option('md_level_'.$product_id.'_owner'));
				if (!empty($check_claim)) {
					if ($esc == '1') {						
						$md_sc_creds = get_sc_params($check_claim);
						if (!empty($md_sc_creds)) {
							$sc_accesstoken = $md_sc_creds->access_token;
							$sc_pubkey = $md_sc_creds->stripe_publishable_key;
						}
					}
					if ($epp == '1') {
						$claimed_paypal = get_user_meta($check_claim, 'md_paypal_email', true);
					}
				}
			}
		}
	}

	$cc_currency_symbol = '$';
	$cc_currency = 'USD';
	if (isset($es) && $es == 1) {
		// #devnote can this move up?
		if (!class_exists('Stripe')) {
			require_once 'lib/stripe-php-4.2.0/init.php';
		}
		if (isset($test) && $test == '1') {
			\Stripe\Stripe::setApiKey($tsk);
			\Stripe\Stripe::setApiVersion($stripe_api_version);
		}
		else {
			\Stripe\Stripe::setApiKey($sk);
			\Stripe\Stripe::setApiVersion($stripe_api_version);
		}
		// get stripe currency
		$stripe_currency = 'USD';
		$stripe_symbol = '$';
		if (!empty($gateways)) {
			if (is_array($gateways)) {
				$stripe_currency = $gateways['stripe_currency'];
				$stripe_symbol = md_currency_symbol($stripe_currency);
			}
		}
	}
	else if (isset($efd) && $efd == 1) {
		$endpoint = 'https://api.globalgatewaye4.firstdata.com/transaction/v12';
		$wsdl = 'https://api.globalgatewaye4.firstdata.com/transaction/v12/wsdl';
	}

	// use that id to get our level data
	$return = ID_Member_Level::get_level($product_id);
	// we have that data, lets store it in vars
	$level_name = $return->level_name;
	if ($renewable) {
		$level_price = $return->renewal_price;
	}
	else {
		$renewable = false;
		$level_price = $return->level_price;
		if (isset($pwyw_price) && $pwyw_price > $level_price) {
			$level_price = $pwyw_price;
		}
	}
	if (!is_idc_free()) {
		// Check if this product is an upgrade of another product, if yes, then get the difference of level prices. But not for recurring levels.
		if ($return->level_type !== 'recurring' && !$renewable) {
			$idc_pathways = new ID_Member_Pathways(null, $product_id);
			$product_pathway = $idc_pathways->get_product_pathway();
			if (!empty($product_pathway)) {
				$idc_pathways->upgrade_pathway = $product_pathway->upgrade_pathway;
				$level_difference = $idc_pathways->get_lower_product_difference($level_price, (is_user_logged_in() ? $current_user->ID : ''));
				if ($level_difference > 0) {
					// Setting new level price
					$level_price = $level_difference;
					// New pay what you want price
					$pwyw_price = $level_price;
					$upgrade_level = true;
				}
			}
		}
	} 

	$txn_type = $return->txn_type;
	$currency = memberdeck_pp_currency();
	if (!empty($currency)) {
		$pp_currency = $currency['code'];
		$pp_symbol = $currency['symbol'];
	}
	else {
		$pp_currency = 'USD';
		$pp_symbol = '$';
	}
	// If payment gateway for CC payments is Authorize.Net, and level is recurring, make instant_checkout false
	if ($return->level_type == 'recurring' && $gateways['eauthnet'] == 1) {
		$instant_checkout = false;
	}
	
	$type = $return->level_type;
	$recurring = $return->recurring_type;
	$limit_term = $return->limit_term;
	$term_length = $return->term_length;
	$combined_product = $return->combined_product;	

	$credit_value = $return->credit_value;
	$cf_level = false;
	if ($crowdfunding) {
		$cf_assignments = get_assignments_by_level($product_id);
		if (!empty($cf_assignments)) {
			$project_id = $cf_assignments[0]->project_id;
			$project = new ID_Project($project_id);
			$the_project = $project->the_project();
			$post_id = $project->get_project_postid();
			$id_disclaimer = get_post_meta($post_id, 'ign_disclaimer', true);
		}
	}

	// Getting credits value, if the product can be purchased using credits and if the user have credits, then add an option to purhcase using credits
	$paybycrd = 0;
	$member_credits = 0;
	if (isset($general['enable_credits']) && $general['enable_credits'] == 1) {
		if (isset($member)) {
			$member_credits = $member->get_user_credits();
		}
		if ($member_credits > 0) {
			if (isset($pwyw_price) && $global_currency == 'credits') {
				$credit_value = $pwyw_price;
			}
			if ($credit_value > 0 && $credit_value <= $member_credits) {
				$paybycrd = 1;
			}
		}
	}

	if (isset($ecb) && $ecb) {
		$cb_currency = (isset($gateways['cb_currency']) ? $gateways['cb_currency'] : 'BTC');
		$cb_symbol = md_currency_symbol($cb_currency);
	}

	// If there is a combined product for currency loaded product, then we have to see if payment gateway supports it or not
	// then show text in General text that this product is combined with another
	if ($combined_product) {
		$epp = $eppadap = $eauthnet = $ecb = $efd = $mc = $paybycrd = 0;
		// #devnote we should be using filters for this and modifying either gateways array or individual vars
		$combined_level = ID_Member_Level::get_level($combined_product);
		add_filter('idc_info_price', function($level_price, $return) use ($combined_level) {
			$info_price = $level_price + $combined_level->level_price;
			return $info_price;
		}, 10, 2);
		// Now see if any CreditCard gateway is active which supports recurring products, we just need to see if we have
		// to show that text or not in General text of different payment methods
		$combined_purchase_gateways = idc_combined_purchase_allowed($gateways);
	}
	else {
		$combined_purchase_gateways = array();
	}
	
	if (!isset($already_valid) || $return->enable_multiples || $renewable) {
		// they don't own this level, send forth the template
		$level_price = apply_filters('idc_product_price', $level_price, $product_id, $return);
		if ($level_price !== '' && $level_price > 0) {
			if ($global_currency == 'BTC' || $global_currency == 'credits') {
				$level_price = number_format(sprintf('%f', (float) $level_price), 2);
			}
			else {
				$level_price = number_format(floatval($level_price), 2, '.', ',');
			}
		}
		$info_price = apply_filters('idc_price_format', apply_filters('idc_info_price', $level_price, $return));
		// Getting the content of the terms page
		if (!empty($general['terms_page'])) {
			$terms_content = get_post( $general['terms_page'] );
		}
		if (!empty($general['privacy_page'])) {
			$privacy_content = get_post( $general['privacy_page'] );
		}
		
		include_once apply_filters('idc_checkout_template', 'templates/_checkoutForm.php');
		$content = ob_get_contents();
	}
	else {
		// they already own this one
		$content = '<form method="POST" id="idc_already_purchased" name="idc_already_purchased">';
		$content .= '<p>'.__('You already own this product. Please', 'memberdeck').' <a href="'.wp_logout_url().'">'.__('logout', 'memberdeck').'</a> '.__('and create a new account in order to purchase again', 'memberdeck').'.</p>';
		$content .= '<input type="hidden" name="user_email" class="user_vars" value="'.$email.'"/>';
		$content .= '<input type="hidden" name="user_login" class="user_vars" value="'.$current_user->user_login.'"/>';
		$content .= '</form>';
	}
	ob_end_clean();
	return $content;
}

function idc_button($args) 
{	
	global $global_currency,$post,$wpdb;
	//echo "========= == =";
	//print_r($_REQUEST);
	$team_id_aff ="";
	if($_REQUEST['team'])
	{
		//echo 'hello';
		$team_nm = explode("_",$_REQUEST['team']);
		$sql_team = "select * from wp_affiliate_team where first_name='".$team_nm[0]."' and last_name='".$team_nm[1]."'";
	  $team_res =  $wpdb->get_row($sql_team);
	  
	  $team_id_aff= $team_res->id;
	  //print_r($team_res);
	  
	}
	
	 $supr_admin = get_post_meta($post->ID,'no_of_supper_donar',true);
	 $bouns_supr_donar = get_post_meta( $post->ID, 'bound_multiply_factor', true );
	 $bonus_supr_donar_2 = get_post_meta( $post->ID, 'bonus_2_multiply_factor', true );
	 $active_gateway = get_post_meta( $post->ID, 'active_gateway', true );
	 
	 $payment_type = get_post_meta($post->ID,'payment',true);
	 
	 $today_date = strtotime(current_time('d-m-Y H:i:s'));
	 
	 $cam_end_date = get_post_meta($post->ID,'ign_fund_end',true);
	 
				    $campaign_end_time = get_post_meta($post->ID,'end_time',true);
				    
				    if(isset($campaign_end_time))
				    {
						$time = $campaign_end_time;
					}else{
						$time = 'd/m/y 00:00';
					}
					
					$time = explode(" ",$time);
					
	//echo '<br/>';
    $last_fund_date = strtotime($cam_end_date);
	
    $project_id = get_post_meta( $post->ID, 'ign_project_id', true );
	$project1 = new Deck($project_id);    
	
	$goalamount = get_post_meta( $post->ID, 'ign_fund_goal', true );
	$bouns_goalamount = get_post_meta( $post->ID, 'bouns_goal', true );
	$bonus_goalamount_2 = get_post_meta( $post->ID, 'bonus_goal_2', true );
	
	$after_firstbonus_amount = $goalamount+$bouns_goalamount;
	
	$fundamount = $project1->get_project_raised();
	$extra_amount =  $fundamount - intval($goalamount);
	if($goalamount <= $fundamount && $after_firstbonus_amount >= $fundamount)
	{
		$supr_admn = $bonus_supr_donar_2;
	}
	else if(($goalamount <= $fundamount))
	{
		$supr_admn = $bouns_supr_donar;
	}
	else if(($goalamount > $fundamount))
	{
		$supr_admn = $supr_admin+1;
	}
	
	//print_r($post);
	if ($global_currency == "credits") 
	{
		$currency_symbol = '$';
	} else {
		$currency_symbol = md_currency_symbol($global_currency);
	}
	$args = apply_filters('idc_button_args', $args);
	//print_r($args);
	do_action('idc_button_before', $args);
	// Using GET variable to check if the form is submitted, as we need price as well in GET vars which is in GET var
	 if (isset($_POST['idc_button_submit'])) 
	{
		
		// we need to submit some args with this
		$price = sanitize_text_field($_POST['price']);
		$args['price'] = $price;
		do_action('idc_button_submit', $args);
	} 
	$button = '<div class="memberdeck">';
	$button .= '<button type="'.(isset($args['type']) ? $args['type'] : '').'" id="'.(isset($args['id']) ? $args['id'] : '').'" class="idc_shortcode_button submit-button '.(isset($args['classes']) ? $args['classes'] : '').'" '.(isset($args['product']) ? 'data-product="'.$args['product'].'"' : '').' data-source="'.(isset($args['source']) ? $args['source'] : '.idc_button_lightbox').'">'.(isset($args['text']) ? $args['text'] : '').'</button>';
	$button .= '</div>';
	if (isset($args['product'])) {
		$product_id = $args['product'];
		if (strpos($product_id, ',')) {
			$product_id = explode(',', $product_id);
		}
		if (is_array($product_id)) {
			$level = array();
			foreach ($product_id as $k=>$v) {
				$level[] = ID_Member_Level::get_level($v);
			}
		}
		else {
			$level = ID_Member_Level::get_level($product_id);
		}
		
	  if($today_date < $last_fund_date)
	  {
		  $camp_currency = get_post_meta($post->ID,'campaign_currency',true);
		  $currency_symbol_arr = explode("(",$camp_currency);
		  if($payment_type == 'one time payment')
		  {
	?>
                  <div class="donar_treas_box">
	<?php
	      }else{
			  echo '<div class="donate_mob_frm"><p>DONATE NOW</p></div>';
			  echo '<div class="donar_treas_box emi_treas_box">';
		  }
	?>
	 <div class="wrapper">
		 <div class="payment_text"> </div>
		 
		 <div class="incentive_text" id="incentive_text" style="display:none;">
		    <aside>
              <span class='incentive_text_show'> </span>
              <span class='incentive_text_hide'> <i class="fa fa-window-close" aria-hidden="true"></i> </span>
			</aside>
		 </div>
		 
            <form action="" method="POST" name="idc_button_checkout_form1" id="idc_button_checkout_form">
			 <input type="hidden" name="active-gateway" id="active-gateway" class="active-gateway" value="<?php echo $active_gateway; ?>" />
			<?php
			 if($payment_type == 'one time payment'){
			?>
				<div class="form-row inline left twothird <?php echo (is_array($level) ? '' : 'total'); ?>">
					<?php if (is_array($level)) { ?>
						<label for="level_select"><?php _e('Select Amount', 'memberdeck'); ?>
							<span class="idc-dropdown">
								<select name="level_select" id="level_select" class="idc-dropdown__select level_select">
								<?php foreach ($level as $k=>$v) { ?>
									<option value="<?php echo $v->id; ?>" data-price="<?php echo $v->level_price; ?>"><?php echo $v->level_name; ?></option>
								<?php } ?>
								</select>
							</span>
						</label>
					<?php } else { ?>
					   <label for="price"><?php _e('Your Donation', 'memberdeck'); ?></label>
						 <span class="dol_usd">
						 
						   <p class="currency_switch"><?php echo $camp_currency; ?> </p>
					<input type="hidden" name="currency_switch" class="currency_switch" id="currency_switch" value="<?php echo $currency_symbol_arr[0]; ?>" data-symbol="<?php echo trim($currency_symbol_arr[1],')'); ?>" />
					
					<input type="hidden" name="currency_switch_mai" class="currency_switch_mai" id="currency_switch_mai" value="<?php echo $currency_symbol_arr[0]; ?>" data-symbol="<?php echo trim($currency_symbol_arr[1],')'); ?>" />
						   
						 
						 </span>
						<input type="text" class="total" name="price" id="price" autofocus="autofocus"  value="<?php if(isset($_REQUEST['price'])) echo $_REQUEST['price'];  ?>"  /><span class="zeroo">.00</span>
						<input type="hidden" name="supper_admin" value="<?php if(isset($supr_admn) && $supr_admn !="" ) {echo $supr_admn;} else{ echo '1';} ?>" id="supper_admin" class="supper_admin" />
    
						<span class="idc-button-default-price hide" data-level-price="<?php echo $level->level_price ?>"></span>
					<?php } ?>
				</div>
				<?php if (is_array($level)) { ?>
					<div class="form-row inline third total">
					   <label for="total"><?php _e('Total', 'ignitiondeck'); ?></label>
						<input type="text" class="total" name="total" id="total" value="" placeholder="<?php echo apply_filters('idc_price_format', (is_array($level) ? $level[0]->level_price : $level->level_price)); ?>" />
					</div>
				<?php } ?>
				<div class="button-error-placeholder">
					<span class="payment-errors" style="display:none;"><?php _e('Input price is below minimum', 'memberdeck') ?></span>
				</div>
				<div class="form-hidden">
					<input type="hidden" name="product_id" class="product_idd" id="product_idd" value="<?php echo (is_array($product_id) ? $product_id[0] : $product_id); ?>"/>
					<input type="hidden" name="current_url_page" class="current_url_page" id="current_url_page" value="<?php echo site_url( $_SERVER['REQUEST_URI'] ); ?>"/>
					<input type="hidden" name="prospect_idd" class="prospect_idd" id="prospect_idd" value="<?php if(isset($_REQUEST['prospectid'])) echo $_REQUEST['prospectid']; ?>" />
					<input type="hidden" name="team_idd" class="team_idd" id="team_idd" value="<?php  echo $team_id_aff; ?>" />
					<input type="hidden" name="campaign_id" class="campaign_id" id="campaign_id" value="<?php echo $post->ID; ?>" />
					
				</div>
				<div class="donation_pr">
				    <span class="Thanks_txt">THANKS TO OUR POWER DONOR'S MATCHING FUND </span>
					<span class="Each_txt"><?php echo get_the_title(); ?> Will Receive</span>
					 <div class="xtext"><strong>x<span class="check_supr_don"><?php if(isset($supr_admn) && $supr_admn !="" ) {echo $supr_admn;} else{ echo '1';} ?></span></strong> = <span class="donate_currency"><?php echo trim($currency_symbol_arr[1],')'); ?></span><span class="donation_multi"></span></div>
				</div>
				<!-- <input type = "hidden" name = "LinkId" value ="850798c8-f5a3-4909-a9a9-164abdffa962" /> -->
				<div class="form-row submit">
				   <!-- <input type = "submit" class="btn" value="<?php _e('Donate Now', 'memberdeck'); ?>" /> </form>-->
					  <input type="submit" name="idc" class="btn idc_button_submit" value="<?php _e('Donate Now', 'memberdeck'); ?>"/><img src="<?php echo  get_bloginfo('url'); ?>/wp-content/uploads/2017/03/ring-alt.gif" class="loading_img" id="loading_img" style="display:none;" /> 
				</div>
				
			<?php
			 }
			 else
			 {
			?>
			    
                  <div class="custom-prosess-donate">
					 <div class="prosess-donate-top-row">
						 <div id="pay_popup_content">
						 <?php
						 	$campaign_id = $post->ID;
							$upsell_on_off = get_post_meta($campaign_id,'upsell_on',true);
							
						 	 for ($i=1; $i <= 5 ; $i++) 
							 {
						 		$description = get_post_meta($campaign_id,'emi_deascription_'.$i,true);
								$mobile_description = get_post_meta($campaign_id,'emi_deascription_mobile_'.$i,true);
								$img_text = get_post_meta($campaign_id,'emi_text_'.$i,true);
								$img_url =  get_field('emi_img_'.$i, $campaign_id);

								//echo '<div class="incentive_text" style="display:none;">';
										  // echo '<aside>';
											 // echo '<span class="incentive_text_show"> ';
								echo '<div id="custom_div_'.$i.'"  style="display: none;"">';
					
								$img_u = $img_url['url'];
								echo "<div class ='desc_img'>";
								echo "<div class='desc_img_in'><img src=".$img_u."></div>";
								echo "<p>".$img_text." <em>Months</em></p></div>";
								echo "<div class='img_desc'>".$description."</div><div class='img_desc_mobile'>".$mobile_description."</div></div>";

								 // echo '</span>';
								 // echo '<span class="incentive_text_hide"> X </span>';
								//  echo '</aside>';
							  //  echo '</div>';

	                        }				
						
						$upsell_on_off = get_post_meta($campaign_id,'upsell_on',true);
						$emi_package_1 = get_post_meta($campaign_id,'emi_package_1',true);
						$emi_package_2 = get_post_meta($campaign_id,'emi_package_2',true);
						$emi_package_3 = get_post_meta($campaign_id,'emi_package_3',true);
						$emi_package_4 = get_post_meta($campaign_id,'emi_package_4',true);
						$emi_package_5 = get_post_meta($campaign_id,'emi_package_5',true);
						
						$emi_price_1 = get_post_meta($campaign_id,'emi_price_1',true);
						$emi_price_2 = get_post_meta($campaign_id,'emi_price_2',true);
						$emi_price_3 = get_post_meta($campaign_id,'emi_price_3',true);
						$emi_price_4 = get_post_meta($campaign_id,'emi_price_4',true);
						$emi_price_5 = get_post_meta($campaign_id,'emi_price_5',true);

						
					 ?>
						 	
						 </div>

						 <div class="prosess-donate-top-column-right">
						 
						    <p id='close_emi_radio' class='close_emi_radio'>Close</p>
							
						    <div class="pack_main"> <span class="pack_main_left"> <input type='radio' name='emi_package' class='emi_package emi_package_18' id='emi_package_18' value='<?php echo $emi_price_1; ?>' data-package='<?php echo $emi_package_1; ?>' /></span><span class="pack_main_right"><span class="pack_main_first_row"><?php echo trim($currency_symbol_arr[1],')'); ?><?php echo $emi_price_1; ?> </span><span class="pack_main_second">x <?php echo $emi_package_1; ?></span> <em>months</em> </span> </div>
						   
						    <div class="pack_main"> <span class="pack_main_left"> <input type='radio' name='emi_package' class='emi_package emi_package_36' id='emi_package_36' value='<?php echo $emi_price_2; ?>' data-package='<?php echo $emi_package_2; ?>' /></span><span class="pack_main_right"><span class="pack_main_first_row"><?php echo trim($currency_symbol_arr[1],')'); ?><?php echo $emi_price_2; ?></span><span class="pack_main_second"> x <?php echo $emi_package_2; ?></span><em>months</em> </span></div>
							
						    <div class="pack_main"> <span class="pack_main_left">  <input type='radio' name='emi_package' class='emi_package emi_package_52' id='emi_package_52' value='<?php echo $emi_price_3; ?>' data-package='<?php echo $emi_package_3; ?>' /></span><span class="pack_main_right"><span class="pack_main_first_row"><?php echo trim($currency_symbol_arr[1],')'); ?><?php echo $emi_price_3; ?></span><span class="pack_main_second"> x <?php echo $emi_package_3; ?></span><em>months</em> </span></div>
							
						    <div class="pack_main"> <span class="pack_main_left">  <input type='radio' name='emi_package' class='emi_package emi_package_72' id='emi_package_72' value='<?php echo $emi_price_4; ?>' data-package='<?php echo $emi_package_4; ?>' /></span><span class="pack_main_right"><span class="pack_main_first_row"><?php echo trim($currency_symbol_arr[1],')'); ?><?php echo $emi_price_4; ?></span><span class="pack_main_second"> x <?php echo $emi_package_4; ?></span><em>months</em> </span></div>
							
						    <div class="pack_main"> <span class="pack_main_left">  <input type='radio' name='emi_package' class='emi_package emi_package_101' id='emi_package_101' value='<?php echo $emi_price_5; ?>' data-package='<?php echo $emi_package_5; ?>' /></span><span class="pack_main_right"><span class="pack_main_first_row"><?php echo trim($currency_symbol_arr[1],')'); ?><?php echo $emi_price_5; ?></span><span class="pack_main_second"> x <?php echo $emi_package_5; ?></span><em>months</em> </span></div>
							
							<div class="pack_main own_cls"><span class="create_own"> <strong><input type='radio' name='emi_package' class='emi_package_own_donate' id='emi_package_own_donate' value='Create Your Own Monthly Donation' /></strong><p>Create <br/> Your Own <br/>Monthly<br/>Donation</p> </span></div>
							
						 </div>
						 
						 <div class="prosess-donate-top-column-left">
							 <p><h2>Enter<br/> one-time<br/> donation</h2></p>
							 <p class='other_o'><span><?php echo trim($currency_symbol_arr[1],')'); ?></span></p>
							 <p class='other_oinput'><input type='text' name='emi_other_amount' class='emi_other_amount' id='emi_other_amount' autofocus="autofocus" /></p>
							 
						 </div>
						 
					 </div>
					 
				  </div>
				  
				<!--   <div class="prosess-donate-bottom-row">
						<div class='matched_facctorr match_emii'>
						   <aside><p class='tot_info'>
						   <strong>X<span class="multi_factr"><?php if(isset($supr_admn) && $supr_admn !="" ) {echo $supr_admn;} ?></span></strong>
						
						  <span> = </span>
						  <p><?php echo trim($currency_symbol_arr[1],')'); ?><span id="total_m_amt1" class="total_m_amt1">0</span></p></p></aside>
						</div>
				  </div> -->
				  
				  <div class="form-hidden">
					<input type="hidden" name="product_id" class="product_idd" id="product_idd" value="<?php echo (is_array($product_id) ? $product_id[0] : $product_id); ?>"/>
					<input type="hidden" name="current_url_page" class="current_url_page" id="current_url_page" value="<?php echo site_url( $_SERVER['REQUEST_URI'] ); ?>"/>
					<input type="hidden" name="prospect_idd" class="prospect_idd" id="prospect_idd" value="<?php if(isset($_REQUEST['prospectid'])) echo $_REQUEST['prospectid']; ?>" />
					<input type="hidden" name="team_idd" class="team_idd" id="team_idd" value="<?php  echo $team_id_aff;  ?>" />
					<input type="hidden" name="campaign_id" class="campaign_id" id="campaign_id" value="<?php echo $post->ID; ?>" />
					<input type="hidden" name="currncy_fivee" class="currncy_fivee" id="currncy_fivee" value="<?php echo trim($currency_symbol_arr[1],')'); ?>" />
					<input type="hidden" name="supper_admin" value="<?php if(isset($supr_admn) && $supr_admn !="" ) {echo $supr_admn;} else{ echo '1';} ?>" id="supper_admin" class="supper_admin" />
					<input type="hidden" name="currency_switch" class="currency_switch" id="currency_switch" value="<?php echo $currency_symbol_arr[0]; ?>" data-symbol="<?php echo trim($currency_symbol_arr[1],')'); ?>" />
					
					<input type="hidden" name="currency_switch_mai" class="currency_switch_mai" id="currency_switch_mai" value="<?php echo $currency_symbol_arr[0]; ?>" data-symbol="<?php echo trim($currency_symbol_arr[1],')'); ?>" />
					
				  </div>
				  
				  <input type="hidden" class="total emi_actuall" name="price" id="price" autofocus="autofocus"  value="" />
				  <input type="hidden" class="normal_per_month" name="normal_per_month" id="normal_per_month" value="" />
				  <input type="hidden" class="project_nature" name="project_nature" id="project_nature" value="" />
				  <input type="hidden" class="normal_number_month" name="normal_number_month" id="normal_number_month" value="" />
				  <input type="hidden" name="upsell_on_off" id="upsell_on_off" class="upsell_on_off" value="<?php echo $upsell_on_off; ?>" />
				  <input type="hidden" class="package_month_type" name="package_month_type" id="package_month_type" value="" />
				  <span class="idc-button-default-price hide" data-level-price="<?php echo $level->level_price ?>"></span>	
				  
				<div class="form-row submit new_donate_btnn">
				   
				   <div class="emi_div">
				       <aside>
					     <p class='tot_info'>
						   <strong>X<span class="multi_factr"><?php if(isset($supr_admn) && $supr_admn !="" ) {echo $supr_admn;} ?></span></strong>
						
						  <span> = </span>
						  <p><?php echo trim($currency_symbol_arr[1],')'); ?><span id="total_m_amt1" class="total_m_amt1">0</span></p>
						 </p>
					  </aside>
					  
					  <input type="submit" name="idc" class="btn idc_button_submit emi_button other_amount_button" value="<?php _e('Donate Now', 'memberdeck'); ?>"/><img src="<?php echo  get_bloginfo('url'); ?>/wp-content/uploads/2017/03/ring-alt.gif" class="loading_img emi_load" id="loading_img" style="display:none;" /> 
					  
				   </div>
				   
				   <div class="emi_other_div" style="display:none;">			   
				       <aside>
					   
					     <div class="month_amount_own">
						   <label>Monthly Amount</label>
						  <p class="own_amt_cus">
						    <span> <?php echo trim($currency_symbol_arr[1],')'); ?></span>
							<input type="text" name="owm_custom_amt" id="owm_custom_amt" class="owm_custom_amt" value="" placeholder='0' onfocus="this.placeholder = ''" onblur="this.placeholder = '0'" />
						  </p>
						   
						   <strong>X</strong>
						   
						 </div>
						  
						 <div class="monthly_increase_own">							   
							   <label>Payments Monthly </label>
							   <p class='add_minus_number'>
							     <a href="javascript:void(0)" id="add4" class="add" ><img src="<?php echo get_bloginfo('url'); ?>/wp-content/themes/backer-child/img/plus_sign.png" width="20" height="20" /></a>
							     <input type='text' name='total_month_emi' id='total_month_emi' class='total_month_emi total_month_emi_own' min='1' max='12' value='0' readonly />				     
								  <a href="javascript:void(0)" id="minus4" class="minus" ><img src="<?php echo get_bloginfo('url'); ?>/wp-content/themes/backer-child/img/minus_sign.png" width="20" height="20" /></a>
								</p>
						 </div>
						 
						 <div class="total_amt_emi_five_own">
							   <label>Total Donation</label>
							   <div class="monthly_div_own">
							     <span><?php echo trim($currency_symbol_arr[1],')'); ?></span><span class='checkout_multiply_five_own'>0</span>
							   </div>
							   
							   <p class='tot_info emi_other_tot_div'>
						   <strong>X<span class="multi_factr emi_other_own_multi"><?php if(isset($supr_admn) && $supr_admn !="" ) {echo $supr_admn;} ?></span></strong>
						
						   </p> 
						 </div>
					   
					     
						   <div class="total_after_matched">
						      <label>Total After Matched</label>
						      <p><span><?php echo trim($currency_symbol_arr[1],')'); ?></span><span id="total_m_amt1" class="total_m_amt1">0</span></p>
							 
						   </div>
						
					   </aside>
					   
					  <button type="submit" name="idc" class="btn idc_button_submit emi_button other_amount_button" ><strong>Process</strong> Monthly <strong>Donation</strong></button><img src="<?php echo  get_bloginfo('url'); ?>/wp-content/uploads/2017/03/ring-alt.gif" class="loading_img emi_load" id="loading_img" style="display:none;" /> 
					  
				   </div>
					  
				</div>  
				
            <?php			
			 }

            ?>													
			</form>
		  </div>
		</div>	
			
    <?php
	  }	
		
		ob_start();
		//include_once 'templates/_idcButtonContent.php';
		$button .= ob_get_contents();
		ob_clean();
	}
	do_action('idc_button_after', $args);
	return apply_filters('idc_button', $button, $args);
}
?>