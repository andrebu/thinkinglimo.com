<?php 
global $current_user;
get_currentuserinfo();
$user_id = $current_user->data->ID;
if(!$user_id)
{
	wp_redirect(get_option( 'siteurl' ).'/?page=login');
	exit;
}
?>

<?php get_header(); ?>
<div id="page" class="clearfix">
	<div class="breadcrumb clearfix">
      <?php 
	  $myaccountlink = '<a href="'.get_option('siteurl').'?page=account">My Account</a>';
	  if ( get_option( 'ptthemes_breadcrumbs' )) { yoast_breadcrumb('',' &raquo; '.$myaccountlink.'  &raquo; My Sale Report'); } ?>
     </div> <!-- breadcrumbs #end -->
         <div id="content" >
        <h1 class="head"><?php _e('My Sale Report'); ?></h1>
         
         
 		<?php
		$user_affiliate_data = get_usermeta($user_id,'user_affiliate_data');
		//$user_order_info = get_usermeta($user_id,'user_order_info');
		?>
        
        <table width="100%" class="table">
     <tr>
     <td colspan="8">
    <form action="" method="post" name="frm_srch" id="frm_srch">
     Search By : 
     Date From  <input type="text" name="srch_st_date"  id="srch_st_date"  value="<?php echo $_REQUEST['srch_st_date']; ?>" size="10"/>
    &nbsp;<img src="<?php echo bloginfo('template_directory');?>/images/cal.gif" alt="Calendar" onclick="displayCalendar(document.frm_srch.srch_st_date,'yyyy-mm-dd',this)" style="cursor: pointer;" align="absmiddle" border="0">
    To <input type="text" name="srch_end_date"  id="srch_end_date"  value="<?php echo $_REQUEST['srch_end_date']; ?>" size="10"/>
    &nbsp;<img src="<?php echo bloginfo('template_directory');?>/images/cal.gif" alt="Calendar" onclick="displayCalendar(document.frm_srch.srch_end_date,'yyyy-mm-dd',this)" style="cursor: pointer;" align="absmiddle" border="0">
     <input type="submit" name="submit" value="<?php _e('Search');?>" class="highlight_input_btn" />
      <input type="button" name="default" onclick="window.location.href='<?php echo get_option('siteurl');?>/?page=account&report_detail=1'" value="<?php _e('Default');?>" class="highlight_input_btn"  />
     <?php
     $params = '';
	 if($_REQUEST['srch_st_date'] != '' && $_REQUEST['srch_end_date'] =='')
	 {
	 	$params = "&srch_st_date=".$_REQUEST['srch_st_date'];
	 }else
	 if($_REQUEST['srch_st_date'] == '' && $_REQUEST['srch_end_date']!='')
	 {
	 	$params = "&srch_end_date=".$_REQUEST['srch_end_date'];
	 }else
	  if($_REQUEST['srch_st_date'] != '' && $_REQUEST['srch_st_date'] != '')
	 {
	 	$params = "&srch_st_date=".$_REQUEST['srch_st_date']."&srch_end_date=".$_REQUEST['srch_end_date'];
	 }
	 ?>
     </form>     </td>
     </tr>
     <tr>
	    <td class="title"><?php _e('Date'); ?> </td>
        <td class="title"><?php _e('Transaction ID'); ?> </td>
        <td class="title"><?php _e('Payment Status'); ?> </td>
        <td class="title"><?php _e('Item Name'); ?> </td>
        <td align="center" class="title"><?php _e('Qty'); ?> </td>
        <td align="right" class="title"><?php _e('Amount'); ?> </td>
        <td align="center" class="title"><?php _e('Currency'); ?> </td>
        <td align="right" class="title"><?php _e('Affiliate Share'); ?> </td>
    </tr>
    <?php
	$record_count = 0;
	if($user_affiliate_data)
	{
		$product_qty = 0;
		$total_order_amt = 0;
		$share_total = 0;
		foreach($user_affiliate_data as $key => $val)
		{
			$order_user_id = preg_replace('/(([_])[0-9]*)/','',$val['orderNumber']);
			$order_number = preg_replace('/([0-9]*([_]))/','',$val['orderNumber']);
			$user_order_info = unserialize(get_usermeta($order_user_id,'user_order_info'));
			$showrecordflag = 0;
			if($_REQUEST['srch_st_date'] != '' && $_REQUEST['srch_end_date'] =='')
			{
				if($val['date'] == $_REQUEST['srch_st_date'] )
				{
					$showrecordflag = 1;
				}
			}else
			if($_REQUEST['srch_st_date'] == '' && $_REQUEST['srch_end_date']!='')
			{
				if($val['date'] == $_REQUEST['srch_end_date'] )
				{
					$showrecordflag = 1;
				}
			}else
			if($_REQUEST['srch_st_date'] != '' && $_REQUEST['srch_st_date'] != '')
			{
				if(strtotime($val['date']) >= strtotime($_REQUEST['srch_st_date']) && strtotime($val['date']) <= strtotime($_REQUEST['srch_end_date']) )
				{
					$showrecordflag = 1;
				}
			}else
			{
				$showrecordflag = 1;
			}
			if($showrecordflag)
			{
				$order_info1 = $user_order_info[$order_number-1][0];
				$cart_info = $order_info1['cart_info']['cart_info'];
				$order_info = $order_info1['order_info'];
				if($order_info['order_status'] == 'approve')
				{
					$record_count++;
					$order_status = $order_info['order_status'];
					$product_name = array();
					for($c=0;$c<count($cart_info);$c++)
					{
						$product_name[] = $cart_info[$c]['product_name'];
						$aff_order_qty = $cart_info[$c]['product_qty'];
						$product_qty = $product_qty + $cart_info[$c]['product_qty'];
					}
					$product_name = implode(', ',$product_name);
					$currency = explode(' ',$order_info['payable_amt']);
					$share_amt = ($val['order_amt']*$val['share_amt'])/100;
					if($order_status == 'approve')
					{
						$share_total = $share_total + $share_amt; 
						$total_order_amt = $total_order_amt + $val['order_amt'];
					}
			?>
				 <tr>
				<td class="row1" ><?php echo date('Y-m-d',strtotime($order_info['order_date']));?></td>
				<td class="row1" ><?php echo $order_info['order_id'];?></td>
				<td class="row1" ><?php echo $order_info['order_status'];?></td>
				<td class="row1" ><?php echo $product_name;?></td>
				<td align="center" class="row1" ><?php echo $aff_order_qty;?></td>
				<td align="right" class="row1" ><?php echo $General->get_amount_format($val['order_amt'],0);?></td>
				<td align="center" class="row1" ><?php echo $currency[1];?></td>
				<td align="right" class="row1" ><?php echo $General->get_amount_format($share_amt,0);?></td>
			</tr>   
			<?php
				}			
			}			
		}
	}
	if($record_count == '0')
	{
	?>
    <tr><td colspan="8"> <h4> <?php _e('Not record available.');?> </h4> </td></tr>
    <?php
	}else
	{
	?>
    <tr><td  colspan="3" class="row1">&nbsp;</td>
    <td align="right" class="row1"><b><?php _e('Total');?></b></td><td align="center" class="row1" ><b><?php echo $product_qty;?></b></td><td align="right" class="row1" ><b><?php echo $General->get_amount_format($total_order_amt,0);?></b></td><td align="right" class="row1" >&nbsp;</td><td align="right" class="row1" ><b><?php echo $General->get_amount_format($share_total,0);?></b></td></tr>
    <tr>
      <td  colspan="8" align="right"  >    <a href="<?php echo get_option('siteurl');?>/?page=account&report_export=1<?php echo $params?>" target="_blank" class="i_excel" ><?php _e('Export to Excel');?></a>  </td>
      </tr>
    <?php
	}
	?>
</table>
		
         
  			  </div> <!-- content #end -->
 		 <?php get_sidebar(); ?>
  </div> <!-- page #end -->

<script>var rootfolderpath = '<?php echo bloginfo('template_directory');?>/images/';</script>
 <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/dhtmlgoodies_calendar.js"></script>
  <link href="<?php bloginfo('template_directory'); ?>/library/css/dhtmlgoodies_calendar.css" rel="stylesheet" type="text/css" />


 <?php get_footer(); ?>