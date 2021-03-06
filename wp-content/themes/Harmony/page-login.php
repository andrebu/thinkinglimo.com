<?php 
/*
Template Name: Login Page
*/
?>
<?php 
	$et_ptemplate_settings = array();
	$et_ptemplate_settings = maybe_unserialize( get_post_meta(get_the_ID(),'et_ptemplate_settings',true) );
	
	$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : false;
?>
<?php get_header(); ?>

<div id="main-area">
	<div class="container">
		<div id="content-area" class="clearfix<?php if ( $fullwidth ) echo ' fullwidth'; ?>">
			<div id="left-area">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				
				<div id="et-login" class="responsive">
					<div class='et-protected'>
						<div class='et-protected-form'>
							<form action='<?php echo esc_url( home_url() ); ?>/wp-login.php' method='post'>
								<p><label><span><?php esc_html_e('Username','Harmony'); ?>: </span><input type='text' name='log' id='log' value='<?php echo esc_attr($user_login); ?>' size='20' /><span class='et_protected_icon'></span></label></p>
								<p><label><span><?php esc_html_e('Password','Harmony'); ?>: </span><input type='password' name='pwd' id='pwd' size='20' /><span class='et_protected_icon et_protected_password'></span></label></p>
								<input type='submit' name='submit' value='Login' class='etlogin-button' />
							</form> 
						</div> <!-- .et-protected-form -->
					</div> <!-- .et-protected -->
				</div> <!-- end #et-login -->
				
			<?php endwhile; ?>
		
			</div> <!-- end #left-area -->
			
			<?php if ( ! $fullwidth ) get_sidebar(); ?>
		</div> <!-- end #content-area -->
	</div> <!-- end .container -->
</div> <!-- end #main-area -->
	
<?php get_footer(); ?>