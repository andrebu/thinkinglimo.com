<?php 
$settings = array(
				'homepage_intro_message' => ''
			);
					
$settings = woo_get_dynamic_values( $settings );
?>
<?php if ( '' != $settings['homepage_intro_message'] ) { ?>
<section id="intro-message" class="home-section">
	<article>
		<h2><?php echo nl2br( do_shortcode( $settings['homepage_intro_message'] ) ); ?></h2>
	</article>
</section><!--/#intro-message-->
<?php } ?>