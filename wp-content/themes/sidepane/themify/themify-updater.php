<?php
/**
 * @package themify
 * @since 1.1.1.0
 * @author Elio Rivero
 * 
 * ----------------------------------------------------------------------
 * 					DO NOT EDIT THIS FILE
 * ----------------------------------------------------------------------
 * 				Updating functions for Themify themes and framework
 *  			http://themify.me
 *  			Copyright (C) 2011 Themify
 *
 ***************************************************************************/

//Run this after the admin has been initialized so they appear as standard WordPress notices.
if(!isset($_GET['action']) && $_GET['page'] == "themify")
	add_action('admin_notices', 'themify_check_version', 3);
			
// Set transient to check for updates for the first time
if(isset($_GET['activated']) && $pagenow == "themes.php"){
	//clear all transients to force version checking
	delete_transient('themify_new_theme');
	delete_transient('themify_new_framework');
	delete_transient('themify_update_check_theme');
	delete_transient('themify_update_check_framework');
}
/**
 * Set transient saving the current date and time of last version checking
 * @param String $type
 */
function themify_set_update_cookie($type){
	global $theme;
	$current = new stdClass();
	$current->lastChecked = time();
	set_transient( 'themify_update_check_'.$type, $current );	
}

/**
 * Checks theme and framework versions
 * @uses $theme $version
 */
function themify_check_version(){
	global $theme, $version, $notifications;
	
	//If it was a successful update
	if($_GET['success'] == 'true' && $_GET['upgrade_type'] == 'theme'){
		$notifications .= "<p class='success'>Successfully updated ".$theme['Name']." to version ".$theme['Version']."</p>";	
	}
	if($_GET['success'] == 'true' && $_GET['upgrade_type'] == 'framework'){
		$notifications .= "<p class='success'>Successfully updated the Themify framework to version ".$version."</p>";	
	}
	
	/**
	 * If we already know there's a new version, we don't need to check
	 * @var stdClass newF
	 * @var stdClass newT
	 * newF
	 * 		version
	 * 		url
	 * 		class
	 * 		target
	 * newT
	 * 		login
	 * 		version
	 * 		url
	 * 		class
	 * 		target
	 * */
	$newF = get_transient('themify_new_framework');
	$newT = get_transient('themify_new_theme');
	if( is_object($newF) || is_object($newT) ){
		
		if( is_object($newT) && ($theme['Version'] < $newT->version) ){
			//echo "<p>newT is an object</p>";
			if($_GET['page'] == 'themify')
				$notifications .= "<p class='update ".$newT->login."'>".$theme['Name']." version ".$newT->version." is now available. <a href='".$newT->url."' title='' class='".$newT->class."' target='".$newT->target."'>Update now</a> or view the <a href='http://themify.me/logs/" . strtolower($theme['Name']) . "-changelogs' title='' class='' target='_blank'>change log</a> for details.</p>";
			else
				$notifications .= '<p class="update">' . sprintf(__('%s version %s is now available. Visit the <a href="admin.php?page=themify">%s page</a> to update.', 'themify'), $theme['Name'], $newT->version, $theme['Name']) . '</p>';
		}
		
		if( is_object($newF) && ($version < $newF->version) ){
			//echo "<p>newF is an object</p>";
			if($_GET['page'] == 'themify')
				$notifications .= "<p class='update'>Framework version ".$newF->version." is now available. <a href='".$newF->url."' title='' class='".$newF->class."' target='".$newF->target."'>Update now</a> or view the <a href='http://themify.me/logs/framework-changelogs' title='' class='' target='_blank'>change log</a> for details.</p>";
			else
				$notifications .= '<p class="update">' . 'Framework version ' . $newF->version . ' is now available. Visit the <a href="admin.php?page=themify">'.$theme['Name'].' page</a> to update.' . '</p>';
		}
		echo '<div class="notifications" style="">'. $notifications . '</div><style type="text/css">.notifications p.update {background: #F9F2C6;border: 1px solid #F2DE5B;} .notifications p{width: 765px;margin: 15px 0 0 5px;padding: 10px;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;}</style>';
	}
	if( is_object($newF) && is_object($newT) ) {
		//we don't have to do anything else
		return;
	}
	else $notifications = '';
	
	//If we didn't knew there was a new version already, let's see if it's 24hs since last check 
	$current_theme = get_transient('themify_update_check_theme');
	$current_framework = get_transient('themify_update_check_framework');
	
	if( is_object($current_theme) && is_object($current_framework) ){
		//if theme version was checked not long ago
		if( 60*1 > ( time() - $current_theme->lastChecked ) ){
			//echo 'Theme Version: Last checked on: '  . date('l jS \of F Y h:i:s A', $current_theme->lastChecked);
			//return;
			$theme_recently_checked = true;
		}
		else $theme_recently_checked = false;
		
		//if framework version was checked not long ago
		if( 60*1 > ( time() - $current_framework->lastChecked ) ){
			//echo 'Framework Version: Last checked on: '  . date('l jS \of F Y h:i:s A', $current_framework->lastChecked);
			//return;
			$framework_recently_checked = true;
		}
		else $framework_recently_checked = false;
		
		//theme and framework were recently checked and no version was available, return
		if($theme_recently_checked && $framework_recently_checked) return;
	}
	
	/**
	 * Utilizes WordPress HTTP API
	 * http://codex.wordpress.org/Function_API/wp_remote_request
	 */
	$versions_url = 'http://themify.me/versions/versions.xml';
	$response = wp_remote_get( $versions_url );
	if( is_wp_error( $response ) ) {
		//echo '<h4>Can\'t load ' . $versions_url . '</h4><p>' . $response->get_error_code(). '</p>';
		return;
	}
	//if xml was successfully retrieved, let's delete the transients for theme and framework
	delete_transient('themify_update_check_theme');
	delete_transient('themify_update_check_framework');
	
	//Convert xml into object collection, just for internal use
	$txml = simplexml_load_string($response['body']);
	//Load string to be converted later into an array with themify_xml2array
	$versions = $response['body'];
	$newVersionFramework = false;
	$newVersionTheme = false;
	//Begin check
	if(isset($versions) && $versions != ""){
		$versions = themify_xml2array($versions);
		foreach($versions['versions']['_c']['version'] as $update){
			if($update['_a']['free'] == 'true'){
				$login = "";
			} else {
				$login = "login";	
			}
			$latest = str_replace(".","",trim($update['_v']));
			if($update['_a']['name'] == 'themify' && !is_object($newF)){
				
				//Compares framework version
				if(str_replace(".","",trim($version)) < $latest){
					/**
					 * Checks for WordPress' unzip_file
					 * http://codex.wordpress.org/Function_Reference/unzip_file
					 */
					if( function_exists('unzip_file') ){
						$class = "upgrade-framework";	
						$target = "";
						$url = "#";
					} else {
						$class = "";
						$target = "_blank";
						$url = "http://themify.me/files/themify/themify.zip";
					}
					$notifications .= "<p class='update ".$login."'>Framework version ".$update['_v']." is now available. <a href='".$url."' title='' class='".$class."' target='".$target."'>Update now</a> or view the <a href='http://themify.me/logs/framework-changelogs' title='' class='' target='_blank'>change log</a> for details.</p>";
					//store variable indicating there is a new version of framework 
					$newFrameworkStore = new stdClass();
					$newFrameworkStore->version = $update['_v'];
					$newFrameworkStore->url = $url;
					$newFrameworkStore->class = $class;
					$newFrameworkStore->target = $target;
					set_transient('themify_new_framework', $newFrameworkStore);
					//echo 'new update for framework stored';
					$newVersionFramework = true;
				}
			} else if( $update['_a']['name'] == strtolower(trim($theme['Name'])) && !is_object($newT) ){
				
				//Compares theme version
				if(str_replace(".","",$theme['Version']) < $latest){
					/**
					 * Checks for WordPress' unzip_file
					 * http://codex.wordpress.org/Function_Reference/unzip_file
					 */
					if( function_exists('unzip_file') ){
						$class = "upgrade-theme";	
						$target = "";
						$url = "#";
					} else {
						$class = "";
						$target = "blank";
						$url = "http://themify.me/files/".strtolower($theme['Name'])."/".strtolower($theme['Name']).".zip";
					}
					$notifications .= "<p class='update ".$login."'>".$theme['Name']." version ".$update['_v']." is now available. <a href='".$url."' title='' class='".$class."' target='".$target."'>Update now</a> or view the <a href='http://themify.me/logs/" . strtolower($theme['Name']) . "-changelogs' title='' class='' target='_blank'>change log</a> for details.</p>";
					//store variable indicating there is a new version of theme
					$newThemeStore = new stdClass();
					$newThemeStore->login = $login;
					$newThemeStore->version = $update['_v'];
					$newThemeStore->url = $url;
					$newThemeStore->class = $class;
					$newThemeStore->target = $target;
					set_transient('themify_new_theme', $newThemeStore);
					//echo 'new update for theme stored';
					$newVersionTheme = true;
				}
			}
		}
	}

	if(!$newVersionFramework && !$newVersionTheme){
		//echo 'new update scheduled';
		themify_set_update_cookie('theme');
		themify_set_update_cookie('framework');
	}
	
	echo '<div class="notifications">'. $notifications . '</div>';
	
}

/**
 * Updater called through wp_ajax_ action
 * @author Elio Rivero
 */
function themify_updater(){
	global $theme;
	$themeName = strtolower($theme['Name']);
	$type = $_GET['type'];
	//are we going to update a theme?
	if($type == 'theme'){
		$url = 'http://themify.me/files/' . $themeName . '/' . $themeName . '.zip';
	}
	else{
		//or are we going to update the Themify framework?
		if($type == 'framework'){
			$url = 'http://themify.me/files/themify/themify.zip';
		}
	}
	
	//If login is required
	if($_GET['login'] == 'true'){
		
			if(isset($_POST['password'])){
	            $cred = $_POST;
	            $filesystem = WP_Filesystem($cred);
	        }
			else{
				$filesystem = WP_Filesystem();
			}

			$response = wp_remote_post(
				'http://themify.me/member/login.php',
				array(
					'timeout' => 300,
					'headers' => array(
						
					),
					'body' => array(
						'amember_login' => $_POST['username'],
						'amember_pass'  => $_POST['password']
					)
			    )
			);

			//Was there some error connecting to the server?
			if( is_wp_error( $response ) ) {
				$errorCode = $response->get_error_code();
				echo 'Error: ' . $errorCode;
				die();
			}

			//Connection to server was successful. Test login cookie
			$amember_nr = false;
			foreach($response['cookies'] as $cookie){
				if($cookie->name == 'amember_nr'){
					$amember_nr = true;
				}
			}
			if(!$amember_nr){
				echo 'You are not a Themify Member.';
				die();
			}
			//After this point, user has been correctly logged in. Set the proper url
			$url = 'http://themify.me/member/plugins/protect/new_rewrite/login.php?v=-1,24,36,35,43,39&url=/files/'. $themeName .'/' . $themeName .'.zip';

	}
	
	//remote request is executed after all args have been set
	include ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
	require_once(TEMPLATEPATH . '/themify/class-themify-updater.php');
	$title = ($type == 'framework')? 'Update Themify Framework' : 'Update ' . ucwords($themeName) . ' Theme';
	$nonce = 'upgrade-themify_' . $type;
	/** 
	 * Changelog
	 * 11/03
	 * Added cookies key/val to array passed to skin
	 */
	$upgrader = new Themify_Upgrader( new Themify_Upgrader_Skin(
			array(
				'title'	=> $title,
				'url'	=> $url,
				'nonce' => $nonce,
				'theme' => $themeName,
				'type'	=> $type,
				'login' => $_GET['login'],
				'cookies' => $response['cookies']
			)
	) );
	$upgrader->upgrade($themeName, $url, $response['cookies'], $type);
	
	//if we got this far, everything went ok!	
	die();
}

/**
 * Validate login credentials against Themify's membership system
 */
function themify_validate_login(){
	$response = wp_remote_post(
		'http://themify.me/member/login.php',
		array(
			'timeout' => 300,
			'headers' => array(
				
			),
			'body' => array(
				'amember_login' => $_POST['username'],
				'amember_pass'  => $_POST['password']
			)
	    )
	);

	//Was there some error connecting to the server?
	if( is_wp_error( $response ) ) {
		$errorCode = $response->get_error_code();
		echo 'Error: ' . $errorCode;
		die();
	}

	//Connection to server was successful. Test login cookie
	$amember_nr = false;
	foreach($response['cookies'] as $cookie){
		if($cookie->name == 'amember_nr'){
			$amember_nr = true;
		}
	}
	if(!$amember_nr){
		echo 'false';
		die();
	}

	echo 'true';
	die();
}

//Executes themify_updater function using wp_ajax_ action hook
add_action('wp_ajax_themify_validate_login', 'themify_validate_login');
?>