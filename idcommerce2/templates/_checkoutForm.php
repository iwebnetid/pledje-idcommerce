<div class="close_checkout_page"> Back </div>
<div class="memberdeck checkout-wrapper">
<?php
 global $wpdb;

$results = $wpdb->get_row( "select post_id from $wpdb->postmeta where meta_key = 'ign_project_id' and meta_value =".$_REQUEST['mdid_checkout']." Order by post_id DESC" );

 $percentage_value = get_post_meta($results->post_id,'percentage_value',true);
 $addtion_value =  get_post_meta($results->post_id,'addition_value',true);
 $sup_donor =  get_post_meta($results->post_id,'no_of_supper_donar',true);
 $active_gateway = get_post_meta($results->post_id, 'active_gateway', true );
 $enable_transaction = get_post_meta($results->post_id, 'enable', true );
 $enable_anonymous = get_post_meta($results->post_id, 'enable_anonymous', true );
 $enable_currency = get_post_meta($results->post_id, 'enable_currency', true );
 $enable_raffle = get_post_meta($results->post_id, 'enable_raffle', true );
 $min_raffle_amount = get_post_meta($results->post_id, 'minimum_donation', true );
 $enable_check = get_post_meta($results->post_id, 'enable_check', true );
 
/* echo '<pre>';
 print_r($_REQUEST);
 echo '</pre>'; */
 
 

	 
	 if (is_user_logged_in()) {
		$user = wp_get_current_user();
		if (!empty($user->ID)) {
			$address_info = get_user_meta($user->ID, 'md_shipping_info', true);
		}
	}
   //$address_info = get_user_meta($user->ID, 'md_shipping_info', true);
   //$address_info = $wpdb->get_row( "select * from wp_pledge_prospects where ID =".$prospectid);
 
 
	
 if(isset($_REQUEST['prospect_idd']))
 {
   $prospectid = $_REQUEST['prospect_idd'];
   $results_prospect = $wpdb->get_row( "select * from wp_pledge_prospects where ID =".$prospectid);
 }
 
 if(isset($_REQUEST['project_type_nature']))
 {
   $project_type_nature = $_REQUEST['project_type_nature'];
 }
 
 if(isset($_REQUEST['current_url_page']))
 {
   $current_url_page = $_REQUEST['current_url_page'];
 }
 
  $post_id = $results->post_id;

 $camp_currency = get_post_meta($post_id,'campaign_currency',true);
 $currency_symbol_arr = explode("(",$camp_currency);
 
 $payment_type = get_post_meta($post_id,'payment',true);

?>
  <form action="" method="POST" name="idc_button_checkout_formm" id="idc_button_checkout_formw">
            <?php
			 if($payment_type == 'one time payment' || $project_type_nature == 'One Time Payment')
			 {
			?>
				<div class="form-row inline left twothird <?php echo (is_array($level) ? '' : 'total'); ?>">
					<?php if (is_array($level)) { ?>
						<label for="level_select"><?php _e('Select Amount', 'memberdeck'); ?>
							<span class="idc-dropdown">
								<select name="level_select" id="level_selecta" class="idc-dropdown__select level_select">
								<?php foreach ($level as $k=>$v) { ?>
									<option value="<?php echo $v->id; ?>" data-price="<?php echo $v->level_price; ?>"><?php echo $v->level_name; ?></option>
								<?php } ?>
								</select>
							</span>
						</label>
					<?php } else { ?>
						<label for="price"><?php _e('Your Donation', 'memberdeck'); ?></label><span class="dol_usd">
						<?php //echo $camp_currency; 
                              echo trim($currency_symbol_arr[1],')');
						?>
						<input type="hidden" name="check_currency_switch" class="currency_switch" id="check_currency_switch" value="<?php echo $currency_symbol_arr[0]; ?>" data-symbol="<?php echo trim($currency_symbol_arr[1],')'); ?>" />
						
						<input type="hidden" name="check_currency_maii" class="check_currency_maii" id="check_currency_maii" value="<?php echo $currency_symbol_arr[0]; ?>" data-symbol="<?php echo trim($currency_symbol_arr[1],')'); ?>" />
												
						</span>
						
						<input type="text" class="check_price" name="check_price" id="check_price" value="<?php if(isset($_REQUEST['price'])) echo $_REQUEST['price'];  ?>"  required /><span class="zeroo">.00</span>
						<input type="hidden" name="supper_admin_check" value="" id="supper_admin_check" class="supper_admin_check" />
						<span class="idc-button-default-price hide" data-level-price="<?php echo $level->level_price ?>"></span>
					<?php } ?>
				</div>
				<?php 
				  if (is_array($level)) { ?>
					<div class="form-row inline third total">
					  <label for="total"><?php _e('Total', 'ignitiondeck'); ?></label>
						<input type="text" class="check_price" name="check_price" id="check_price" value="" placeholder="<?php echo apply_filters('idc_price_format', (is_array($level) ? $level[0]->level_price : $level->level_price)); ?>" />
					</div>
				<?php } ?>
				<div class="button-error-placeholder">
					<span class="payment-errors" style="display:none;"><?php _e('Input price is below minimum', 'memberdeck') ?></span>
				</div>
				<div class="form-hidden">
					
					<input type="hidden" name="product_id1" id="product_id_checkout" value="<?php if(isset($_REQUEST["mdid_checkout"])) echo $_REQUEST["mdid_checkout"]; ?>"/>
					<input type="hidden" name="campaign_id" class="campaign_id" id="campaign_id" value="<?php echo $post_id; ?>" />
					<input type="hidden" name="paymentnature" class="paymentnature" id="paymentnatureo" value="One Time Payment" />
					<input type="hidden" name="team_affiliate_id" class="team_affiliate_id" id="team_affiliate_id" value="<?php if(isset($_REQUEST["team_id"])) echo $_REQUEST["team_id"]; ?>" />
				</div>
				
				<div class="donation_pr">
				   <?php if($sup_donor>0){?> <span class="Thanks_txt">THANKS TO OUR POWER DONOR'S MATCHING FUND</span><?php }?>
					 <span class="Each_txt"><?php echo get_the_title($results->post_id); ?> Will Receive</span> 
					 <div class="xtext"><?php if($sup_donor>0){?> <strong>x<span class="check_supr_don"></span></strong> = <?php }?><span class="donate_currency"> <?php echo trim($currency_symbol_arr[1],')'); ?> </span><span class="donation_multi"></span></div>
				</div>
				<div class="form-row submit" style="display:none;">
					<input type="submit" name="idc" class="btn idc_button_submit checkout_btn" value="<?php _e('Donate Now', 'memberdeck'); ?>"/>
				</div>
			<?php
			 }
			 else
			 {
			?>
			   <div class='checkout_emi_form'>   
				            <div class="monthly_increase">							   
							   <label>Number of Months </label>
							   <div class='add_minus_number'>
							     <img id="add1" src="<?php echo get_bloginfo('url'); ?>/wp-content/themes/backer-child/img/plus_sign.png" width="20" height="20" class="add"/>
							     <input type='text' name='total_month_emi' id='total_month_emi' class='total_month_emi checkout_total_month_emi' min='1' max='12' value='5' readonly />				     
								  <img src="<?php echo get_bloginfo('url'); ?>/wp-content/themes/backer-child/img/minus_sign.png" id="minus1" width="20" height="20" class="minus"/>
								</div>
						    </div>
							
							<div class="total_amt_emi">
							   <label>Monthly Donation</label>
							   <div class="monthly_div">
							     <span><?php echo trim($currency_symbol_arr[1],')'); ?></span><span class='checkout_per_month_five'>20</span>
							   </div>
						    </div>
							
							<div class="total_amt_emi_five">
							   <label>Total Amount</label>
							   <div class="monthly_div">
							     <span><?php echo trim($currency_symbol_arr[1],')'); ?></span><span class='checkout_multiply_five'><?php if(isset($_REQUEST['price'])) echo $_REQUEST['price'];  ?></span>
							   </div>
						    </div>
							
							<div class='multi_factor_five'>	
                               <span class="matcher_five_sup">							
							  <strong class="matcher_five multi_factr"><?php if(isset($supr_admn) && $supr_admn !="" ) {echo $supr_admn;} ?></strong>		</span>					  
							
							
							<div class="total_rcve">
							   <label><?php echo get_the_title($results->post_id); ?> </label><b>Receives</b>
							   <div class="tot_rec monthly_div">
							     <span><?php echo trim($currency_symbol_arr[1],')'); ?></span><span id="total_m_amt1" class="total_m_amt1"><?php echo $supr_admn*360; ?> </span>
							   </div>
							</div>	
							</div>
				  <div class="prosess-donate-bottom-row">
					   <!--  <div class='matched_facctorr match_emii'>
						   <aside><p class='tot_info'>Matched
						   <strong>X<span class="multi_factr"><?php if(isset($supr_admn) && $supr_admn !="" ) {echo $supr_admn;} ?></span></strong>
						
						  <span><?php echo get_the_title(); ?> Will Receive = </span>
						  <p><?php echo trim($currency_symbol_arr[1],')'); ?><span id="total_m_amt1" class="total_m_amt1"><?php echo $supr_admn*360; ?> </span></p></p></aside>
						</div> -->
				  </div>
				  <input type="hidden" class="total emi_actuall" name="check_price" id="check_price" autofocus  value="<?php if(isset($_REQUEST['price'])) echo $_REQUEST['price'];  ?>"  />
				  <input type="hidden" name='no_month_plan' class='no_month_plan' id='no_month_plan'> 
				  <input type="hidden" name="campaign_id" class="campaign_id" id="campaign_id" value="<?php echo $post_id; ?>" />
				  <input type="hidden" name="paymentnature" class="paymentnature" id="paymentnaturem" value="Monthly Payment" />
				  <input type="hidden" name="team_affiliate_id" class="team_affiliate_id" id="team_affiliate_id" value="<?php if(isset($_REQUEST["team_id"])) echo $_REQUEST["team_id"]; ?>" />
				  
				  <input type="hidden" name="product_id1" id="product_id_checkout" value="<?php if(isset($_REQUEST["mdid_checkout"])) echo $_REQUEST["mdid_checkout"]; ?>"/>
				  <input type="hidden" name="check_currency_switch" class="currency_switch" id="check_currency_switch" value="<?php echo $currency_symbol_arr[0]; ?>" data-symbol="<?php echo trim($currency_symbol_arr[1],')'); ?>" />
				  
				  <input type="hidden" name="check_currency_maii" class="check_currency_maii" id="check_currency_maii" value="<?php echo $currency_symbol_arr[0]; ?>" data-symbol="<?php echo trim($currency_symbol_arr[1],')'); ?>" />
				  
				  <span class="idc-button-default-price hide" data-level-price="<?php echo $level->level_price ?>"></span>
				  
				  <div class="form-row submit" style="display:none;">
					<input type="submit" name="idc" class="btn idc_button_submit checkout_btn emi_checkout_btn" value="<?php _e('Donate Now', 'memberdeck'); ?>"/>
				</div>

                </div>				  
            <?php			
			 }

            ?>				
				
				
 </form>
	<div class="checkout-title-bar">
    	<span class="active checkout-payment"><a href="#"><?php _e('Payment', 'memberdeck'); ?></a></span>
        <span class="checkout-confirmation"><a href="#"><?php _e('Confirmation', 'memberdeck'); ?></a></span>
        <span class="checkout-project-title">
        	<span><?php echo wp_trim_words(isset($level_name) ? apply_filters('idc_level_name', $level_name) : '', $num_words = 10, $more = null); ?></span>
        </span>
        <span class="currency-symbol"><sup><?php echo $pp_symbol; ?></sup><span class="product-price"><?php echo $info_price; ?></span>
        	<span class="checkout-tooltip"><i class="fa fa-info-circle"></i></span>
        </span>
    </div>
    <div class="tooltip-text">
        <?php include_once ('_checkoutTooltip.php'); ?>
    </div>
    <!-- ignition 

   
   <form action="" method="POST" id="payment-form" data-currency-code="<?php echo $pp_currency; ?>" data-product="<?php echo (isset($product_id) ? $product_id : ''); ?>" data-type="<?php echo (isset($type) ? $type : ''); ?>" <?php echo (isset($type) && $type == 'recurring' ? 'data-recurring="'.$recurring.'"' : ''); ?> data-free="<?php echo ($level_price == 0 ? 'free' : 'premium'); ?>" data-txn-type="<?php echo (isset($txn_type) ? $txn_type : 'capture'); ?>" data-renewable="<?php echo (isset($renewable) ? $renewable : 0); ?>" data-trial-period="<?php echo (isset($return->trial_period) ? $return->trial_period : ''); ?>" data-trial-length="<?php echo (isset($return->trial_length) ? $return->trial_length : ''); ?>" data-trial-type="<?php echo (isset($return->trial_type) ? $return->trial_type : ''); ?>" data-limit-term="<?php echo (isset($type) && $type == 'recurring' ? $limit_term : 0); ?>" data-term-limit="<?php echo(isset($limit_term) && $limit_term ? $term_length : ''); ?>" data-scpk="<?php echo (isset($sc_pubkey) ? apply_filters('idc_sc_pubkey', $sc_pubkey) : ''); ?>" data-claimedpp="<?php echo (isset($claimed_paypal) ? apply_filters('idc_claimed_paypal', $claimed_paypal) : ''); ?>" <?php echo ((isset($es) && $es == 1 && !is_idc_free()) || isset($_GET['login_failure']) ? 'style="display: none;"' : ''); ?> data-pay-by-credits="<?php echo ((isset($paybycrd) && $paybycrd == 1) ? '1' : '') ?>" data-guest-checkout="<?php echo ($guest_checkout); ?>">

    -->
   
    <!-- Asli  -->
	<form action="" method="POST" id="payment-form" data-currency-code="<?php echo $pp_currency; ?>" data-product="<?php echo (isset($product_id) ? $product_id : ''); ?>" data-type="<?php echo (isset($type) ? $type : ''); ?>" <?php echo (isset($type) && $type == 'recurring' ? 'data-recurring="'.$recurring.'"' : ''); ?> data-free="<?php echo ($level_price == 0 ? 'free' : 'premium'); ?>" data-txn-type="<?php echo (isset($txn_type) ? $txn_type : 'preauth'); ?>" data-renewable="<?php echo (isset($renewable) ? $renewable : 0); ?>" data-limit-term="<?php echo (isset($type) && $type == 'recurring' ? $limit_term : 0); ?>" data-term-limit="<?php echo(isset($limit_term) && $limit_term ? $term_length : ''); ?>" data-scpk="<?php echo (isset($sc_pubkey) ? apply_filters('idc_sc_pubkey', $sc_pubkey) : ''); ?>" data-claimedpp="<?php echo (isset($claimed_paypal) ? apply_filters('idc_claimed_paypal', $claimed_paypal) : ''); ?>"  data-pay-by-credits="<?php echo ((isset($paybycrd) && $paybycrd == 1) ? '1' : '') ?>">
 

   
   
        <div class="confirm-screen" style="display:none;">
		<?php 
		if (!is_user_logged_in()) 
		{ 
	     ?>
			<!-- <div class="already_accou">
				<span class="login-help">Already have an account?</span>
				<a href="#" class="reveal-login"><?php _e('Login', 'memberdeck'); ?></a>
							</div> -->
		
			<div id="logged-input" class="no">
				<div class="form-row third left">
					<label for="first-name"><?php _e('First Name', 'memberdeck'); ?> <span class="starred">*</span></label>
					<input type="text" size="20" class="first-name required" name="first-name" placeholder="First Name" value="<?php if(isset($results_prospect)) echo $results_prospect->first_name; ?>" />
					<span class="cd-custom-error"></span>
				</div>
				<div class="form-row twoforth" >
					<label for="last-name"><?php _e('Last Name', 'memberdeck'); ?> <span class="starred">*</span></label> 
					<input type="text" size="20" class="last-name" name="last-name" placeholder="Last Name" value="<?php if(isset($results_prospect)) echo $results_prospect->last_name; ?>" />
					
				</div>
				<div class="form-row full">
					 <label for="email"><?php _e('Email Address', 'memberdeck'); ?> <span class="starred">*</span></label> 
					<input type="email" pattern="[^ @]*@[^ @]*" size="20" class="email required" name="email" placeholder="Email – To Receive Your Donation Receipt" value="<?php if(isset($results_prospect)) echo $results_prospect->email; ?>" />
				</div>
				
				 
					
				<?php if (!$guest_checkout) { ?>
					<div class="form-row">
						 <label for="pw"><?php _e('Password', 'memberdeck'); ?> <span class="starred">*</span></label> 
						<input type="password" size="20" class="pw required" name="pw" placeholder="Password" />
					</div>
					<div class="form-row">
						 <label for="cpw"><?php _e('Re-enter Password', 'memberdeck'); ?> <span class="starred">*</span></label> 
						<input type="password" size="20" class="cpw required" name="cpw" placeholder="Re-enter Password" />
					</div>
				<?php }
         			/*	else { ?>
					<a href="#" class="reveal-account"><?php _e('Create an account', 'memberdeck'); ?></a>
					<div id="create_account" style="display: none">
						<div class="form-row">
							<label for="pw"><?php _e('Password', 'memberdeck'); ?> <span class="starred">*</span></label>
							<input type="password" size="20" class="pw required" name="pw"/>
						</div>
						<div class="form-row">
							<label for="cpw"><?php _e('Re-enter Password', 'memberdeck'); ?> <span class="starred">*</span></label>
							<input type="password" size="20" class="cpw required" name="cpw"/>
						</div>
					</div>
				<?php }*/ 
				?>
			</div>
		<?php }
		 else 
		 {
			?>
			
			<div id="logged-input" class="yes">
				
				<div class="form-row third left" >
					<label for="first-name"><?php _e('First Name', 'memberdeck'); ?> <span class="starred">*</span></label>
					<input type="text" size="20" class="first-name required" name="first-name" value="<?php if(isset($results_prospect)) echo $results_prospect->first_name; else echo (isset($fname) ? $fname : ''); ?>" />
					<span class="cd-custom-error"></span>
				</div>
				<div class="form-row twoforth" >
					<label for="last-name"><?php _e('Last Name', 'memberdeck'); ?> <span class="starred">*</span></label>
					<input type="text" size="20" class="last-name required" name="last-name" value="<?php if(isset($results_prospect)) echo $results_prospect->last_name; else echo (isset($lname) ? $lname : ''); ?>" />
				</div>
				<div class="form-row email-address">
					<label for="email"><?php _e('Email Address', 'memberdeck'); ?> <span class="starred">*</span></label>
					<input type="email" pattern="[^ @]*@[^ @]*" size="20" class="email required" name="email" value="<?php if(isset($results_prospect)) echo $results_prospect->email; else echo (isset($email) ? $email : ''); ?>" />
				</div>
			</div>
			
			<?php
		
		 } 

		?>
        </div> 
		
		<div class="custom-payment-methods-sec">
		
		<h3 class="checkout-header"><?php /* echo (isset($level_name) ? $level_name : ''); ?> <?php _e('Checkout', 'memberdeck'); */?> 
			<?php _e('Select Payment Method', 'memberdeck'); ?></h3>
		<?php if ($level_price !== '' && $level_price > 0) { ?>
		<div class="payment-type-selector">
			<?php if (isset($epp) && $epp == 1) { ?>
			<div><a id="pay-with-paypal" class="pay_selector" href="#">
            	<i class="fa fa-paypal"></i>
				<span><?php _e('Paypal', 'memberdeck'); ?></span>
			</a></div>
			<?php } ?>
			<?php if (isset($eppadap) && $eppadap == 1 && !is_idc_free()) { ?>
			<div><a id="pay-with-ppadaptive" class="pay_selector" href="#">
            	  <i class="fa fa-paypal"></i>
				<span><?php _e('PayPal', 'memberdeck'); ?></span>
			</a></div>
			<?php } ?>
			<?php if (isset($es) && $es == 1 && $active_gateway=='stripe' && !is_idc_free()) { ?>
			<div><a id="pay-with-stripe" class="pay_selector" href="#">
           		 <i class="fa fa-credit-card"></i>
				<span><?php _e('Credit Card', 'memberdeck'); ?></span>
			</a></div>
			<?php } ?>
			<?php if (isset($efd) && $efd == 1 && !is_idc_free()) { ?>
			<div><a id="pay-with-fd" class="pay_selector" href="#">
            	<i class="fa fa-credit-card"></i>
				<span><?php _e('Credit Card', 'memberdeck'); ?></span>
			</a></div>
			<?php } ?>
			<?php if (isset($eauthnet) && $eauthnet == 1 && $active_gateway=='authNet' && !is_idc_free()) { ?>
			<div><a id="pay-with-authorize" class="pay_selector" href="#">
            	<i class="fa fa-credit-card"></i>
				<span><?php _e('Credit Card', 'memberdeck'); ?></span>
			</a></div>
			<?php } ?>
			<?php if (isset($splashnet) && $splashnet == 1 && $active_gateway=='splash' && !is_idc_free()) { ?>
			<div><a id="pay-with-splash" class="pay_selector" href="#">
            	<i class="fa fa-credit-card"></i>
				<span><?php _e('Credit Card', 'memberdeck'); ?></span>
			</a></div>
			<?php } ?>
			
			<?php //do_action('idc_after_credit_card_selectors', $gateways); ?>
			
			<?php if (isset($mc) && $mc == 1 && !is_idc_free()) { ?>
			<div><a id="pay-with-mc" class="pay_selector" href="#">
            	 <i class="fa fa-power-off"></i>
				<span><?php _e('Offline Checkout', 'memberdeck'); ?></span>
			</a></div>
			<?php } ?>
			<?php if (isset($paybycrd) && $paybycrd == 1 && !is_idc_free()) { ?>
			<div><a id="pay-with-credits" class="pay_selector" href="#">
            	 <i class="fa fa-usd"></i>
				<span><?php _e(ucwords(apply_filters('idc_credits_label', 'Credits', true)), 'memberdeck'); ?></span>
			</a></div>
			<?php } ?>
			<?php if (isset($ecb) && $ecb == 1 && !is_idc_free()) { ?>
			<div><a id="pay-with-coinbase" class="pay_selector" href="#">
            	<i class="fa fa-btc"></i>
				<span><?php _e('Bitcoin', 'memberdeck'); ?></span>
			</a></div>
			<?php } ?>
		</div>
		<?php }?>
		
		
		<!-- confirm screen -->
     		
     		
     		<!-- ignition-->
     		<div id="stripe-input" data-idset="<?php echo (isset($instant_checkout) && $instant_checkout == true ? true : false); ?>" data-symbol="<?php echo (isset($stripe_symbol) ? $stripe_symbol : ''); ?>" data-customer-id="<?php echo ((isset($customer_id) && !empty($customer_id)) ? $customer_id : '') ?>" style="display:none;">
        	<div class="row">		
            	<h3 class="checkout-header"><?php _e('Credit Card Info', 'memberdeck'); ?></h3>
            </div>
			<div class="form-row">
				<label><?php _e('Card Number', 'memberdeck'); ?> <span class="starred">*</span> <span class="cards"><img src="https://ignitiondeck.com/id/wp-content/themes/id2/images/creditcards-full2.png" alt="<?php _e('Credit Cards Accepted', 'memberdeck'); ?>" /></span></label>
				<input type="text" size="20" autocomplete="off" class="card-number required" /><span class="error-info" style="display:none;"><?php _e('Incorrect Number', 'memberdeck'); ?></span>
			</div>
			<div class="form-row third left">
				<label><?php _e('CVC', 'memberdeck'); ?> <span class="starred">*</span></label>
				<input type="text" size="4" maxlength="4" autocomplete="off" class="card-cvc required"/><span class="error-info" style="display:none;"><?php _e('CVC number required', 'memberdeck'); ?></span>
			</div>
			<div class="form-row third left date">
				<label><?php _e('Expiration (MM/YYYY)', 'memberdeck'); ?> <span class="starred">*</span></label>
				<input type="text" size="2" maxlength="2" class="card-expiry-month required"/><span> / </span><input type="text" size="4" maxlength="4" class="card-expiry-year required"/>
			</div>
			<?php if ($es == 1) { ?>
	          	<div class="form-row third">
					<label><?php _e('Zip Code', 'memberdeck'); ?> <span class="starred">*</span></label>
					<input type="text" size="20" autocomplete="off" class="zip-code required" /><span class="error-info" style="display:none;"><?php _e('Invalid Zip code', 'memberdeck'); ?></span>
				</div>
            	<?php } ?>
		</div>
      		
      		<!--asli
       <div id="stripe-input" data-idset="<?php echo (isset($instant_checkout) && $instant_checkout == true ? true : false); ?>" data-symbol="<?php echo (isset($stripe_symbol) ? $stripe_symbol : ''); ?>" data-customer-id="<?php echo ((isset($customer_id) && !empty($customer_id)) ? $customer_id : '') ?>" style="display:none;">
        	<div class="row">		
            	<h3 class="checkout-header"><?php _e('Credit Card Info', 'memberdeck'); ?></h3>
            </div>
			<div class="form-row full ali_box">
			    <label><?php _e("Name(Alias) to be displayed in Donors List", 'memberdeck'); ?> </label>
				<input type="text" class="alias_name" name="alias_name" id="alias_name" value="" />
									
			</div>
		<?php
		  if($enable_anonymous=='yes')
		  {
		?>
			<div class="form-row full anon_box">
			
					<label><?php _e("Display Donation as Anonymous in Donor List", 'memberdeck'); ?> </label><input type="checkbox" class="anonymous_name" name="anonymous_name" id="anonymous_name" value="yes" />
					
			</div>
		<?php
		  }
		?>
			<div class="form-row full">
						 <label for="description"><?php _e('Message/Dedication(optional)', 'memberdeck'); ?></label> 
						<textarea row="10" class="description" name="description" placeholder="Message/Dedication (Optional)" ></textarea>
			</div>
			<?php
			 if($enable_currency=='yes')
			 {
			?>
			<div class="form-row currency_choose_div">
			
			   <label>Choose Your Currency </label> 
			    <span class="span_di_cp">  <input type="radio" name="currency_opt" class="currency_opt" id="currency_optu" value="usd" <?php if($currency_symbol_arr[0]=='usd') echo 'checked'; ?> />  <b>USD</b></span>
			    <span class="span_di_cp"> <input type="radio" name="currency_opt" class="currency_opt" id="currency_optc" value="cad" <?php if($currency_symbol_arr[0]=='cad') echo 'checked'; ?>  /><b>CAD</b></span>
			    <span class="span_di_cp"> <input type="radio" name="currency_opt" class="currency_opt" id="currency_opte" value="eur" <?php if($currency_symbol_arr[0]=='eur') echo 'checked'; ?> /><b>EUR</b></span>
			    <span class="span_di_cp"> <input type="radio" name="currency_opt" class="currency_opt" id="currency_optr" value="rub" <?php if($currency_symbol_arr[0]=='rub') echo 'checked'; ?> /><b>RUB</b></span>
			    <span class="span_di_cp"> <input type="radio" name="currency_opt" class="currency_opt" id="currency_optg" value="gbp" <?php if($currency_symbol_arr[0]=='gbp') echo 'checked'; ?> /><b>GBP</b></span>
			    <span class="span_di_cp"> <input type="radio" name="currency_opt" class="currency_opt" id="currency_opta" value="aud" <?php if($currency_symbol_arr[0]=='aud') echo 'checked'; ?> /><b>AUD</b></span>
			    <span class="span_di_cp"> <input type="radio" name="currency_opt" class="currency_opt" id="currency_opti" value="ils" <?php if($currency_symbol_arr[0]=='ils') echo 'checked'; ?> /><b>ILS</b></span>
			  
			</div>
			<?php
			 }
			 
			 if($enable_raffle == 'yes' &&  $min_raffle_amount <= $pwyw_price)
			 {
			?>
			    <div class="form-row raffle_choose_div">
				 <label>Choose Your Raffle </label> 
				 <div class="raffle_one_part" >						  
                          <span class="span_di_raffle"> <input type="checkbox" name="raffle_opt " class="raffle_opt last_raffle" id="raffle_opt_last" value="all" /><label>Include My Entry to All Raffles</label></span>					  
				 </div>
				 <?php
				 
				 $raffle_image_1 = get_field("raffle_image_1",	$post_id);
				 $raffle_text_1 = get_post_meta( $post_id, "raffle_text_1", true );			 
				 $raffle_image_2 = get_post_meta( $post_id, "raffle_image_2", true );
				 $raffle_text_2 = get_post_meta( $post_id, "raffle_text_2", true );
				 $raffle_image_3 = get_post_meta( $post_id, "raffle_image_3", true );
				 $raffle_text_3 = get_post_meta( $post_id, "raffle_text_3", true );
				 $raffle_image_4 = get_post_meta( $post_id, "raffle_image_4", true );
				 $raffle_text_4 = get_post_meta( $post_id, "raffle_text_4", true );
				 $raffle_image_5 = get_post_meta( $post_id, "raffle_image_5", true );
				 $raffle_text_5 = get_post_meta( $post_id, "raffle_text_5", true );
				 
				   for($i=1; $i<=5 ; $i++) 
				   {
					   $raffle_image = ${"raffle_image_" . $i};
					   $raffle_text = ${"raffle_text_" . $i};
					   
					   if(!empty($raffle_text))
					   {
						?>
						 <div class="raffle_one_part" >
						  <span class="span_img_raffle"><img width="30px" height="30px" src="<?php echo $raffle_image;?>" /></span>
                          <span class="span_di_raffle"> <input type="checkbox" name="raffle_opt" class="raffle_opt other_raffle" id="raffle_opt_<?php echo $i; ?>" value="<?php echo $i; ?>" /><label><?php echo $raffle_text; ?></label></span>
						 </div>
                        <?php						
					   }
					   
				   }
				   ?>
				        
				  
				</div>
			<?php
			 }
			?>
			<div class="form-row pay_check_div">
			   <p><input type="radio" name="paybymethod" class="paybymethod" id="paybymethodcc" value="Credit Card" checked />Credit Card</p>
			 <?php
			  if($enable_check =='yes' && ($payment_type == 'one time payment' || $project_type_nature == 'One Time Payment'))
			  {
			 ?>
			   <p><input type="radio" name="paybymethod" class="paybymethod" id="paybymethodc" value="Check" />Check/Cheque</p>				 
			 <?php
			  }
			 ?>
			</div> 
			<?php
			  $cover_cost = (($pwyw_price*$percentage_value)/100)+($addtion_value/100);
			  if($enable_transaction == 'yes')
			  {
			?>
		    <div class="form-row transaction_c">
			  
					<label class="trans_cs">To help the <?php echo get_the_title($results->post_id); ?> may we ask you to cover the processing fee of <?php echo '$'.round($cover_cost,2); ?> ? Thank you <span class="yes_box">Yes <input type="checkbox" class="transaction_cost" name="transaction_cost" id="transaction_cost" value="yes" /></span></label> 
			 <input type="hidden" class="trans_cost" id="trans_cost" name="trans_cost" value="<?php echo round($cover_cost,2); ?>" />
			</div>
			<?php
			  }
			?>
			
			<!--baru-->
			
	  
	  <!--asli
		  <div class="crdit_cvv_expire">
		    <div class="form-row">
				 <label><?php _e('Enter Your Credit Card Number', 'memberdeck'); ?> <span class="starred">*</span> <!-- <span class="cards"><img src="https://ignitiondeck.com/id/wp-content/themes/id2/images/creditcards-full2.png" alt="<?php _e('Credit Cards Accepted', 'memberdeck'); ?>" /></span></label>
				<input type="text" size="20" autocomplete="off" class="card-number required" placeholder="Enter Your Credit Card Number" value="" /><span class="error-info" style="display:none;"><?php _e('Incorrect Number', 'memberdeck'); ?></span>
			</div>
			<div class="form-row third left">
				 <label><?php _e('CVC', 'memberdeck'); ?> <span class="starred">*</span></label> 
				<input type="text" size="4" maxlength="4" autocomplete="off" class="card-cvc required" placeholder="CVC" value="" /><span class="error-info" style="display:none;"><?php _e('CVC number required', 'memberdeck'); ?></span>
			</div>
			<div class="form-row third left date">
				 <label><?php _e('Expiration (MM/YY)', 'memberdeck'); ?> <span class="starred">*</span></label> 
				<input type="text" size="2" maxlength="2" class="card-expiry-month required"  placeholder="MM" value="" /><span> / </span><input type="text" size="4" maxlength="4" class="card-expiry-year required" value="" placeholder="YY" />
			</div>
		  </div>
		  <div class="crdit_routing">
		    <div class="form-row third left">
				 <label><?php _e('Number', 'memberdeck'); ?> <span class="starred">*</span></label> 
				<input type="text"  autocomplete="off" class="card-check-number required" placeholder="number"  /><span class="error-info" style="display:none;"></span>
			</div>
			<div class="form-row third left">
				 <label><?php _e('Routing', 'memberdeck'); ?> <span class="starred">*</span></label> 
				<input type="text"  autocomplete="off" class="card-routing required" placeholder="number" /><span class="error-info" style="display:none;"></span>
			</div>
		  </div>
		  
			<?php if ($es == 1) { ?>
	          	<!-- <div class="form-row third">
					<label><?php _e('Zip Code', 'memberdeck'); ?> <span class="starred">*</span></label>
					<input type="text" size="20" autocomplete="off" class="zip-code required" /><span class="error-info" style="display:none;"><?php _e('Invalid Zip code', 'memberdeck'); ?></span>
				</div> 
            	<?php } ?>
		</div>
		-->
		
		
		<?php
		
		  //echo apply_filters('idc_checkout_descriptions', '', $return, $level_price, (isset($user_data) ? $user_data : ''), $gateways, $general, $credit_value); 
		
		?>
		</div>
		

 <!-- -->
 
 
 
 
 
 <!-- -->
 
 
	
	 
		 <div id="extra_fields" class="form-row user-billing-address">
		 
		 <?php //echo do_action('md_purchase_extrafields'); ?>
			<?php echo do_action('md_purchase_extrafields'); ?>
			
			
			<div class="idc_checkout_extra_fields" id="checkout-form-extra-fields-shipping">
			    <h3 class="bill_head"> Billing INFORMATION </h3>
				<div class="form-row idc-checkout-address-field">
					<h3 class="checkout-header" style="display: none;"> Mailing Address</h3>
					 <label for="address"> Address</label> <span class="starred">*</span>
					 <!--
					<input type="text" size="20" class="address required" name="address" id="address" value="<?php if(isset($results_prospect)) echo $results_prospect->billing_address; ?>"  placeholder="Address"  >-->
					
					<input type="text" size="20" class="required" name="address" id="address" value="<?php echo (isset($address_info['address']) ? $address_info['address'] : ''); ?>"/>
				</div> 
				
				<div class="form-row full">
					<label for="address_two"><?php _e('Phone', 'memberdeck'); ?></label>
					
					<input type="text" size="20" name="address_two" id="address_two" value="<?php echo (isset($address_info['address_two']) ? $address_info['address_two'] : ''); ?>"/>
					
					
				</div>
				
				<div class="form-row left twoforth idc-checkout-address-field">
					 <label for="city">City/Town</label> <span class="starred">*</span>
					 <!--
					<input type="text" size="20" class="city required" name="city" id="city" value="<?php if(isset($results_prospect)) echo $results_prospect->city; ?>" placeholder="City" >-->
					
					<input type="text" size="20" class="required" name="city" id="city" value="<?php echo (isset($address_info['city']) ? $address_info['city'] : ''); ?>"/>
				</div>
				<div class="form-row left third idc-checkout-address-field">
					 <label for="state">State/Provinces</label> <span class="starred">*</span>
					 <!--
					<input type="text" size="20" class="state required" name="state" id="state" value="<?php if(isset($results_prospect)) echo $results_prospect->state; ?>" placeholder="State" >-->
					
					<input type="text" size="20" class="required" name="state" id="state" value="<?php echo (isset($address_info['state']) ? $address_info['state'] : ''); ?>"/>
				</div>
				<div class="form-row left third idc-checkout-address-field">
					 <label for="zip">Zip Code/Postal Code</label> <span class="starred">*</span>
					 <!--
					<input type="text" size="20" class="zip required" name="zip" id="zip" value="<?php if(isset($results_prospect)) echo $results_prospect->zip; ?>" placeholder="Zip/PostCode" >-->
					
					<input type="text" size="20" class="required" name="zip" id="zip" value="<?php echo (isset($address_info['zip']) ? $address_info['zip'] : ''); ?>"/>
				</div>
				
				 
				<div class="form-row phone idc-checkout-address-field">
				 <label for="phone_user">Phone</label> <span class="starred">*</span>
				 <!--
					<input type="text" size="11" name="phone_user" id="phone_user" class="phone_user required" value="<?php if(isset($results_prospect)) echo $results_prospect->phone; ?>" placeholder="Phone">-->
					
					<input type="text" size="20" name="address_two" id="address_two" value="<?php echo (isset($address_info['address_two']) ? $address_info['address_two'] : ''); ?>"/>
				</div>
				
				<!-- <div class="form-row left twoforth idc-checkout-address-field">
					<label for="country">Country</label>
					<input type="text" size="20" class="required" name="country" id="country" value="">
				</div> -->
				
			</div>
		</div>
		<!-- <div class="custom-create-user-account">
		<?php if($guest_checkout && !is_user_logged_in()) { ?>
		             <h3 class="acc_optional"> Create an Account <span>(optional)</span> </h3>
					    <p> Save your preferences. Access your tax deductible donations, track your donations and see the impact you have all from one secure location. Create an account now.</p>
		           <a href="#" class="reveal-account"><?php _e('Create an account', 'memberdeck'); ?></a> 
					<div id="create_account" style="display:none;">
						<div class="form-row">
							
							<input type="password" size="20" class="pw" name="pw" placeholder="Password" />
						</div>
						<div class="form-row">
							
							<input type="password" size="20" class="cpw" name="cpw" placeholder="Re-enter Password" />
						</div>
					</div> 
					<br/>
	   <?php } 
	   
	   if ($general['show_terms'] == 1) 
	   { 		
		?>
			<div class="idc-terms-checkbox" style="display:none;">
				<div class="form-row checklist">
					<input type="checkbox" class="terms-checkbox-input"/>
					<label><?php _e("Securely save my card on pledje.com's server", 'memberdeck'); ?> 
						<?php if (isset($terms_content->post_title)) { ?>
							<span class="link-terms-conditions"><a href="#"><?php echo $terms_content->post_title; ?></a></span> 
						<?php } ?>
						<?php if (isset($privacy_content->post_title)) { ?>
							<?php echo ((isset($terms_content->post_title)) ? '&amp;' : ''); ?> 
							<span class="link-privacy-policy"><a href="#"><?php echo $privacy_content->post_title; ?></a></span>
						<?php } ?>
					</label>
					<input type="hidden" id="idc-hdn-error-terms-privacy" value="securely save option" />
				</div>
			</div>
		<?php 
		} 
		?>
	      
		</div> -->
		<div><?php echo apply_filters('md_purchase_footer', ''); ?></div>
		<span class="payment-errors"></span>
		<input type="hidden" name="reg-price" value="<?php echo (isset($return->level_price) ? $return->level_price : ''); ?>"/>
		<input type="hidden" name="pwyw-price" value="<?php echo (isset($pwyw_price) && $pwyw_price > 0 ? $pwyw_price : ''); ?>"/>
		<?php if (isset($upgrade_level) && $upgrade_level) { ?>
		<input type="hidden" name="upgrade-level-price" value="<?php echo (isset($level_price) && $level_price > 0 ? $level_price : ''); ?>"/>
		<?php } ?>
		
		<p></p>
		
        <div class="checkout-terms-wrapper">
		
        <?php //if ($general['show_terms'] == 1 && (isset($terms_content->post_title) || isset($privacy_content->post_title))) { 
       /* if ($general['show_terms'] == 1) { 
		
		?>
		<div class="idc-terms-checkbox" style="display:none;">
			<div class="form-row checklist">
				<input type="checkbox" class="terms-checkbox-input"/>
				<label><?php _e("Securely save my card on pledje.com's server", 'memberdeck'); ?> 
					<?php if (isset($terms_content->post_title)) { ?>
						<span class="link-terms-conditions"><a href="#"><?php echo $terms_content->post_title; ?></a></span> 
					<?php } ?>
					<?php if (isset($privacy_content->post_title)) { ?>
						<?php echo ((isset($terms_content->post_title)) ? '&amp;' : ''); ?> 
						<span class="link-privacy-policy"><a href="#"><?php echo $privacy_content->post_title; ?></a></span>
					<?php } ?>
				</label>
				<input type="hidden" id="idc-hdn-error-terms-privacy" value="securely save option" />
			</div>
		</div>
		<?php } */?>
		
       
       <?php echo apply_filters('idc_checkout_descriptions', '', $return, $level_price, (isset($user_data) ? $user_data : ''), $gateways, $general, $credit_value); ?>
		
		<div><?php echo apply_filters('md_purchase_footer', ''); ?></div>
		<span class="payment-errors"></span>
		<input type="hidden" name="reg-price" value="<?php echo (isset($return->level_price) ? $return->level_price : ''); ?>"/>
		<input type="hidden" name="pwyw-price" value="<?php echo (isset($pwyw_price) && $pwyw_price > 0 ? $pwyw_price : ''); ?>"/>
		<?php if (isset($upgrade_level) && $upgrade_level) { ?>
		<input type="hidden" name="upgrade-level-price" value="<?php echo (isset($level_price) && $level_price > 0 ? $level_price : ''); ?>"/>
		<?php } ?>
        <div class="checkout-terms-wrapper">
        <?php if ($general['show_terms'] == 1 && (isset($terms_content->post_title) || isset($privacy_content->post_title))) { ?>
		<div class="idc-terms-checkbox" style="display:none;">
			<div class="form-row checklist">
				<input type="checkbox" class="terms-checkbox-input required"/>
				<label><?php _e('I agree to the', 'memberdeck'); ?> 
					<?php if (isset($terms_content->post_title)) { ?>
						<span class="link-terms-conditions"><a href="#"><?php echo $terms_content->post_title; ?></a></span> 
					<?php } ?>
					<?php if (isset($privacy_content->post_title)) { ?>
						<?php echo ((isset($terms_content->post_title)) ? '&amp;' : ''); ?> 
						<span class="link-privacy-policy"><a href="#"><?php echo $privacy_content->post_title; ?></a></span>
					<?php } ?>
				</label>
				<input type="hidden" id="idc-hdn-error-terms-privacy" value="<?php echo (isset($terms_content) ? $terms_content->post_title : ''); ?> &amp; <?php echo (isset($privacy_content) ? $privacy_content->post_title : ''); ?>" />
			</div>
		</div>
		<?php } ?>
        <div class="main-submit-wrapper" style="display:none;">
		<button type="submit" id="id-main-submit" class="submit-button"><?php _e('Submit Payment', 'memberdeck'); ?></button>
        </div>
        <!-- asli
        <div class="main-submit-wrapper" style="display:none;">
		   <button type="submit" id="id-main-submit" class="submit-button"><?php _e('Submit Payment', 'memberdeck'); ?></button>
        </div>
        -->
		
       </div> 
	   
	   
	   
	</form>
	<div class="md-requiredlogin login login-form" style="<?php echo (isset($_GET['login_failure']) && $_GET['login_failure'] ? '' : 'display: none;'); ?>">
		<h3 class="checkout-header"><?php //_e('Login', 'memberdeck'); ?></h3>
		<span class="login-help"><a href="#" class="hide-login"><?php _e('Need to register?', 'memberdeck'); ?></a></span>
		<?php echo (isset($_GET['error_code']) ? '<p>' . ucwords(str_replace('_', ' ', $_GET['error_code'])) . '</p>' : ''); ?>
		<?php

		
		
		//$args = array('redirect' => $current_url_page ,'echo' => false);
		echo wp_login_form();
		?>
		<p><a class="lostpassword" href="<?php echo site_url(); ?>/wp-login.php?action=lostpassword"><?php _e('Lost Password', 'memberdeck'); ?></a></p>
	</div>

	<?php if ($general['show_terms'] == 1) { ?>
	<div class="idc-terms-conditions idc_lightbox mfp-hide">
		<div class="idc_lightbox_wrapper">
			<?php echo (isset($terms_content) ? wpautop($terms_content->post_content) : ''); ?>
		</div>
	</div>
	<div class="idc-privacy-policy idc_lightbox mfp-hide">
		<div class="idc_lightbox_wrapper">
			<?php echo (isset($privacy_content) ? wpautop($privacy_content->post_content) : ''); ?>
		</div>
	</div>
	<?php } ?>
</div>
<?php if (!isset($_GET['login_failure'])) { ?>
<!-- 
    The easiest way to indicate that the form requires JavaScript is to show
    the form with JavaScript (otherwise it will not render). You can add a
    helpful message in a noscript to indicate that users should enable JS.
-->

<!-- asli -->
<script>
if (window.Stripe) jQuery("#payment-form").show();
jQuery(".idc_checkout_extra_fields #phone_user").mask("(999) 999-9999");

/* jQuery(".first-name").on('keyup', function(e) {
    var val = jQuery(this).val();
   if (val.match(/[^a-zA-Z]/g)) {
       jQuery(this).val(val.replace(/[^a-zA-Z]/g, ''));
   }
});

jQuery(".last-name").on('keyup', function(e) {
    var val = jQuery(this).val();
   if (val.match(/[^a-zA-Z]/g)) {
       jQuery(this).val(val.replace(/[^a-zA-Z]/g, ''));
   }
}); 
*/

var paybymethod = jQuery('input[name=paybymethod]:checked').val();
	//alert(paybymethod);
	if(paybymethod == 'Credit Card')
	{
		jQuery('.crdit_cvv_expire').show();
		jQuery('.crdit_routing').hide();
	}
	else{
		jQuery('.crdit_cvv_expire').hide();
		jQuery('.crdit_routing').show();
	}
	
	jQuery('.paybymethod').on('change',function()
	{
		var paybymethod = jQuery('input[name=paybymethod]:checked').val();
		if(paybymethod == 'Credit Card')
		{
			jQuery('.crdit_cvv_expire').show();
			jQuery('.crdit_routing').hide();
		}
		else
		{
			jQuery('.crdit_cvv_expire').hide();
			jQuery('.crdit_routing').show();
		}		
		
	});

</script>
<noscript><p><?php _e('JavaScript is required for the purchase form', 'memberdeck'); ?>.</p></noscript>
<?php } ?>
<div id="ppload"></div>
<?php if (isset($ecb) && $ecb == 1 && !is_idc_free()) { ?>
<div id="coinbaseload" data-button-loaded="no" style="display:none;">
	<input type="hidden" name="id_coinbase_button_code" id="id_coinbase_button_code" value="" />
</div>
<?php } ?>
<?php if (isset($eppadap) && $eppadap == 1 && !is_idc_free()) {
	// For lightbox
	echo '<script src="https://www.paypalobjects.com/js/external/dg.js"></script>';
	// For mini browser
	echo '<script src="https://www.paypalobjects.com/js/external/apdg.js"></script>';
}
?>