<?php 
/*
Template Name: Login Page
*/
?>
<?php if (is_front_page()) { ?>
	<?php get_template_part('home'); ?>
<?php } else { ?>	
	<?php 
		$et_ptemplate_settings = array();
		$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );
		
		$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : false;
	?>
	
	<?php get_header(); ?>
	<div id="main-content"<?php if ($fullwidth) echo ' class="fullwidth"'; ?>> 
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="entry clearfix<?php if ($fullwidth) echo(' fullwidth'); ?>">

				<h1 id="post-title"><span><?php the_title(); ?></span></h1>

				<?php $thumb = '';
	  
     				  $width = (int) get_option('onthego_thumbnail_width_pages');
					  $height = (int) get_option('onthego_thumbnail_height_pages');
					  $classtext = 'thumbnail-post alignleft';
					  $titletext = get_the_title();
							  
					  $thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
					  $thumb = $thumbnail["thumb"]; ?>
							  
				<?php if($thumb <> '' && get_option('onthego_page_thumbnails') == 'on') { ?>
					<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
				<?php }; ?>
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => '<p><strong>'.esc_html__('Pages','OnTheGo').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				
				<div id="et-login">
					<div class='et-protected'>
						<div class='et-protected-form'>
							<form action='<?php echo home_url(); ?>/wp-login.php' method='post'>
								<p><label><?php esc_html_e('Username','OnTheGo'); ?>: <input type='text' name='log' id='log' value='<?php echo esc_attr($user_login); ?>' size='20' /></label></p>
								<p><label><?php esc_html_e('Password','OnTheGo'); ?>: <input type='password' name='pwd' id='pwd' size='20' /></label></p>
								<input type='submit' name='submit' value='Login' class='etlogin-button' />
							</form> 
						</div> <!-- .et-protected-form -->
						<p class='et-registration'><?php esc_html_e('Not a member?','OnTheGo'); ?> <a href='<?php echo site_url('wp-login.php?action=register', 'login_post'); ?>'><?php esc_html_e('Register today!','OnTheGo'); ?></a></p>
					</div> <!-- .et-protected -->
				</div> <!-- end #et-login -->
				
				<div class="clear"></div>

				<?php edit_post_link(esc_html__('Edit this page','OnTheGo')); ?>

			</div> <!-- end .entry -->
		<?php endwhile; endif; ?>
	</div> <!-- end #main-content -->

	<?php if (!$fullwidth) get_sidebar(); ?>
	<?php get_footer(); ?>
<?php } ?>