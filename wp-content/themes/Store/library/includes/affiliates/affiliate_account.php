<?php
global $current_user;
get_currentuserinfo();
$user_id = $current_user->data->ID;
$user_role = get_usermeta($user_id,'wp_capabilities');
if($user_role['affiliate'])
{
if($_REQUEST['affpayact'])
{
	$affiliate_payment_account = $_REQUEST['affiliate_payment_account'];
	update_usermeta($user_id,'affiliate_payment_account',$affiliate_payment_account);
	exit;
}
?>
<p></p>
<table width="100%" class="table">
    <tr>
	    <td colspan="2" class="title"><?php _e('Affiliate Information'); ?> </td>
    </tr>
    <tr>
        <td class="row1" ><?php _e('Affiliate Code'); ?> : </td>
        <td class="row1" ><?php echo $user_id;?></td>
    </tr>
        <tr>
        <td class="row1" ><?php _e('Paypal Account'); ?> : </td>
        <td class="row1" >
		<span id="affiliate_payid_span">
		<?php 
		if(get_usermeta($user_id,'affiliate_payment_account'))
		{
			echo get_usermeta($user_id,'affiliate_payment_account');
		}else
		{
			_e('Not Specified');
		}	
		?></span>
        
        &nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="aff_payment()";><strong><?php _e("Change");?></strong></a>
         <div id="affiliate_payment" style="display:none;">
    <form action="#" method="post" id="affiliate_payment_frm" name="affiliate_payment_frm">
    <input type="hidden" name="affpayact" value="affpayact" />
    <table><tr><td><input type="text" name="affiliate_payment_account" id="affiliate_payment_account" value="<?php echo get_usermeta($user_id,'affiliate_payment_account');?>" /></td>
    <td><a href="javascript:void(0)" onclick="ajax_set_affiliate_account();" class="highlight_button fr" >Submit</a></td>
    </tr></table>
    </form>
    </div>
        </td>
    </tr>
</table>
<p></p><p></p>
<?php
$user_total_array = get_total_sale($user_id);
?>
<table width="100%" class="table">
    <tr>
	    <td colspan="2" class="title"><?php _e('Sale Summary'); ?> </td>
    </tr>
    <tr>
        <td class="row1" >No of Transactions : </td>
        <td class="row1" ><?php echo number_format($user_total_array[2]);?></td>
	</tr>
    <tr>
        <td class="row1" >Items Sold : </td>
        <td class="row1" ><?php echo number_format($user_total_array[3]);?></td>
	</tr>
    <tr>
        <td class="row1" >Total Sale Amount : </td>
        <td class="row1" ><?php echo $General->get_amount_format($user_total_array[1],0).' '.$General->get_currency_code();?></td>
	</tr>
    <tr>
        <td class="row1" >Your Total Earning : </td>
        <td class="row1" ><?php echo $General->get_amount_format($user_total_array[0],0).' '.$General->get_currency_code();?></td>
	</tr>
     <tr>
        <td colspan="2" align="right"><a href="<?php echo get_option('siteurl');?>/?page=account&report_detail=1"><strong>View Detail</strong></a></td>
	</tr>
</table>
<p></p>
<table width="100%" class="table">
    <tr>
	    <td colspan="2" class="title"><?php _e('Affiliate Links'); ?> </td>
    </tr>
    <?php
    $affiliate_links = get_option('affiliate_links');
	if($affiliate_links)
	{
		foreach($affiliate_links as $key=>$affiliate_links_Obj)
		{
			if($affiliate_links_Obj['link_status'])
			{
		?>
            <tr>
                <td class="row1" ><?php echo $affiliate_links_Obj['link_title'];?></td>
                <?php 
                $lkey = $affiliate_links_Obj['link_key'];
                $link =  get_option('siteurl').'?page=account&lkey='.$lkey.'&aid='.$user_id; ?>
                 <?php /*?><td class="row1" ><?php echo htmlspecialchars('<a href="'. $link.'">'.$affiliate_links_Obj['link_title'].'</a>');?></td><?php */?>
                 <td class="row1" >
				<?php //echo htmlspecialchars('<a href="'. $link.'">'.$affiliate_links_Obj['link_title'].'</a>');
				echo $link;
				?>
                </td>
            </tr>   
        <?php	
			}
		}
	}
	?>
</table>
<p></p>
<script>
function aff_payment()
{
	if(document.getElementById('affiliate_payment').style.display == 'none')
	{
		document.getElementById('affiliate_payment').style.display = '';
	}else
	{
		document.getElementById('affiliate_payment').style.display = 'none';
	}
}

function ajax_set_affiliate_account()
{
	dataString = $("#affiliate_payment_frm").serialize();
	$.ajax({
		url: '<?php echo get_option('siteurl'); ?>/?page=myaccount&'+dataString,
		type: 'GET',
		dataType: 'html',
		timeout: 9000,
		error: function(){
			alert('Error loading cart information');
		},
		success: function(html){
			document.getElementById('affiliate_payment').style.display = 'none';
			document.getElementById('affiliate_payid_span').innerHTML = document.getElementById('affiliate_payment_account').value;
		}
	});	
}
</script>
<?php
}
function get_total_sale($user_id)
{
	$user_affiliate_data = get_usermeta($user_id,'user_affiliate_data');
	if($user_affiliate_data)
	{
		$order_amt_total = 0;
		$share_total = 0;
		$total_orders = 0;
		$product_qty = 0;
		foreach($user_affiliate_data as $key => $val)
		{
			$order_user_id = preg_replace('/(([_])[0-9]*)/','',$val['orderNumber']);
			$order_number = preg_replace('/([0-9]*([_]))/','',$val['orderNumber']);
			$user_order_info = unserialize(get_usermeta($order_user_id,'user_order_info'));
			$order_info1 = $user_order_info[$order_number-1][0];
			$cart_info = $order_info1['cart_info']['cart_info'];
			$order_info = $order_info1['order_info'];
			if($order_info['order_status'] == 'approve')
			{
				$total_orders++;
				$share_amt = ($val['order_amt']*$val['share_amt'])/100;
				$share_total = $share_total + $share_amt; 
				$order_amt_total = $order_amt_total + $val['order_amt'];
				for($c=0;$c<count($cart_info);$c++)
				{
					$product_qty = $product_qty + $cart_info[$c]['product_qty'];
				}
			}
		}
	}
	return array($share_total,$order_amt_total,$total_orders,$product_qty);
}
?>