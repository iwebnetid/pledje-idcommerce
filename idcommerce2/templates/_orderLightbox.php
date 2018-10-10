<?php
global $wpdb,$post;
$general = get_option('md_receipt_settings');
$general = maybe_unserialize($general);



?>
<div class="ignitiondeck idc_lightbox idc-social-sharing-box idc_lightbox_attach mfp-hide">
    <?php do_action('idc_order_lightbox_before', $last_order); 
	 
	?>
	<div class="print-order">
			<table width="500" border="0" class="table" cellpadding="0" cellspacing="0">
                <tr>
                    <td><?php echo apply_filters('idc_company_name', $general['coname']); ?></td>
                    <td class="right"><span class="order"><?php _e('Order', 'memberdeck'); ?></span> #100<?php echo ((isset($last_order->id)) ? $last_order->id : 0); ?></td>
                </tr>
                <tr>
                    <td class="detailtitle"><?php echo home_url(); ?></td>
                    <td class="right dates">
                        <?php if (isset($status) && $status == "pending") { ?>
                        <h2><?php _e('Pending', 'memberdeck'); ?></h2>
                        <?php } ?>
                        <?php echo ((isset($last_order->order_date)) ? date('m/d/Y', strtotime($last_order->order_date)) : date('m/d/Y H:i:s')); ?>
                    </td>
                </tr>
				
                <tr>
                    <td class="detailtitle"><?php echo $general['coemail']; ?></td>
                	<td class="right dates"></td>
                </tr>
                <!-- Available for a future line of company info
                <tr>
                    <td class="detailtitle"></td>
                    <td class="right dates"></td>
                </tr> -->
            </table>
			<table width="100%" border="0" class="table">
                <tr>
                    <td class="customername"><?php echo $current_user->user_firstname.' '.$current_user->user_lastname; ?></td>
                    <td class="right dates"></td>
                </tr>
            </table>
    </div>
    <div class="idc-order-info">
			<table width="100%" border="0" class="table nonprint">
                <tr class="orderheader">
                    <td><h2><?php _e('Thank you!', 'memberdeck'); ?> </h2></td>
                    <td class="right orderinfo"><span class="order"><?php _e('Donation', 'memberdeck'); ?></span> #100<?php echo ((isset($last_order->id)) ? $last_order->id : 0); ?></td>
                </tr>
                <tr>
                    <td class="detailtitle"><?php _e('Your Donation details:', 'memberdeck'); ?></td>
                    <td class="right dates">
                        <?php if (isset($status) && $status == "pending") { ?>
                        <h2><?php _e('Pending', 'memberdeck'); ?></h2>
                        <?php } ?>
                        <?php echo ((isset($last_order->order_date)) ? date('m/d/Y', strtotime($last_order->order_date)) : date('m/d/Y H:i:s')); ?>
                    </td>
                </tr>
            </table>
       <div class="order-details-grid">
			<table width="100%" border="0" class="table">
				<thead>
				
				<tr class="rowbg">
					<th class="left"><?php _e('Donation', 'memberdeck'); ?></th>
                   	<th></th>
					<th class="right"><?php _e('Amount', 'memberdeck'); ?></th>
				</tr>
				</thead>
				<tbody>
				<tr>
    				<td>
					   <?php 
					      echo  $title ; 
					   ?>
					</td>
				</tr>
				<tr class="details">
                    <?php 
					$sqls = "select * from wp_postmeta where meta_key='ign_project_id' and meta_value=".$_REQUEST['project_id']."";
		            $records = $wpdb->get_row($sqls);
					
					 $main_currency = get_post_meta($records->post_id,'campaign_currency',true);
					 $currency_symbol_arrm = explode("(",$main_currency);
					  
					if(isset($_REQUEST['currency_symbol']))	
					{
						$wpdb->update('wp_memberdeck_orders',
										array('currency_symbol'=>stripslashes($_REQUEST['currency_symbol']),'currency'=>stripslashes($_REQUEST['currency'])),
										array('id'=> $last_order->id)
										
									 );
					}	
					
					$symbol = $wpdb->get_row("select * from wp_memberdeck_orders where id=$last_order->id");
					//echo '-------';
					 $price = (float) filter_var( $price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION ) ;
					//echo '----hi------';
					
					if($currency_symbol_arrm[0] != $symbol->currency)
					{
						 $price = round(convertCurrencyr($price,$currency_symbol_arrm[0],$symbol->currency),2);
					}
					
					if($_REQUEST['paymentnature'] == 'Monthly Payment')
					{
						$price_nm = $price;
						$no_of_month = $_REQUEST['no_of_month'];
						$price = round($price/$no_of_month,2);
					}
					
					
					
					if ((isset($status) && $status == "completed") || !isset($status)) { ?>
                    
					<td class="title">
					 <?php 
					   //echo  $title ;
					   if($_REQUEST['paymentnature'] == 'Monthly Payment')
					   {
					?>
                          <p>Total Commitment :</p>
						  <p> Breakdown : </p>
						  <p> Number of Months : </p>
					
                    <?php						   
					   }
					 ?>
					 </td>
                    <?php } else { ?>
                    <td><?php echo (isset($order_level_key) ? $levels[$order_level_key]->level_name : $level->level_name); ?></td>
                    <?php } ?>
                    <td></td>
					<td class="right">
					<?php 
					   
					   if($_REQUEST['paymentnature'] == 'Monthly Payment')
					   {
						   
						     echo '<p>'.$symbol->currency_symbol."".$price_nm." ".strtoupper($symbol->currency).'</p>';
						   echo '<p>'.$symbol->currency_symbol."".$price.' Per Month</p>';
						   echo '<p> Number of Months : '.$no_of_month.'</p>';
					   }
					   else
					   {
						   echo $symbol->currency_symbol."".$price." ".strtoupper($symbol->currency);
					   }
					   
					?>
					   
					</td>
				</tr>
                <tr class="total_price">
					<td></td>
					<?php
					  if($_REQUEST['paymentnature'] == 'Monthly Payment')
					  {
					?>
                          <td class="totalprice"><?php _e('1st Payment Total:', 'memberdeck'); ?>:</td>     
					<?php
					  }
					  else
					  {
                    ?>
                          <td class="totalprice"><?php _e('TOTAL', 'memberdeck'); ?>:</td>  	 			
					<?php	
					  }
					
					?>
					      <td class="totalprice">
						    <span class="currency_symbol"><b><?php echo $symbol->currency_symbol."".$price." ".strtoupper($symbol->currency); ?></b></span>
                         </td>
				</tr>
				</tbody> 
			</table> 
        </div> 
        <!-- <div class="print-details">
           <table width="100%" border="0" class="table">
              <tr class="print">
                <td class="email"><?php _e('Email confirmation will be sent to your Inbox soon', 'memberdeck'); ?>. </td>
                <td class="right"><a href="javascript:window.print()" class="receipt"><?php _e('Print receipt', 'memberdeck'); ?></a></td>
              </tr>
          </table>
		</div> -->
	</div>
    <div class="social-sharing-options-wrapper">
        <?php do_action('idc_order_sharing_before', $last_order, $levels); ?>
        <h2><?php _e('Every share can help us reach our goal faster. Please share this unique opportunity with your friends and family.', 'memberdeck'); ?></h2>
        <div class="friendlink">
            <?php 
			
	       	$campaign_name = get_the_permalink($records->post_id);
			
			   echo do_shortcode('[Sassy_Social_Share type="standard"  url="'.$campaign_name.'"]');
			   
			/*if (!empty($thumbnail)) { ?>
            <div class="thumb"><img src="<?php echo $thumbnail; ?>" /></div>
            <?php } */

			?>

            <?php
			/* if ((isset($status) && $status == "completed") || !isset($status)) { ?>
            <div class="text"><?php _e('I just purchased', 'memberdeck'); ?> <?php echo apply_filters('idc_order_level_title', (isset($order_level_key) ? $levels[$order_level_key]->level_name : $level->level_name), $last_order); ?>.<br />
                <a href="<?php echo apply_filters('idc_order_level_url', home_url(), $last_order); ?>"><?php echo apply_filters('idc_order_level_url', home_url(), $last_order); ?></a>
            </div>
            <?php } */ 
			?>
        </div>
        <div class="social-sharing-options-message">
        </div>
       <?php do_action('idc_order_sharing_after', $last_order, $levels); ?>
    </div>
    <?php do_action('idc_order_lightbox_after', $last_order); ?>
</div>
<?php
/********************* Currency Converter**********************/	
function convertCurrencyr($amount, $from, $to)
{  
    $url  = "http://data.fixer.io/api/convert?access_key=5e79dd0e35d124053c567b07161c1721&from=$from&to=$to&amount=$amount";
    $data = curl_get_contentsr($url);
    $value = json_decode($data,true);
    return round($value['result'],2);
}

function curl_get_contentsr($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

?>