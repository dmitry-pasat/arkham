<?php
	
function fca_ga_splash_page() {
	add_submenu_page(
		null,
		__('Activate', 'fca-ga'),
		__('Activate', 'fca-ga'),
		'manage_options',
		'fca-ga-splash',
		'fca_ga_render_splash_page'
	);
}
add_action( 'admin_menu', 'fca_ga_splash_page' );

function fca_ga_render_splash_page() {
		
	wp_enqueue_style('fca_ga_splash_css', FCA_GA_PLUGINS_URL . '/includes/splash/splash.min.css', false, FCA_GA_PLUGIN_VER );
	wp_enqueue_script('fca_ga_splash_js', FCA_GA_PLUGINS_URL . '/includes/splash/splash.min.js', false, FCA_GA_PLUGIN_VER, true );
		
	$user = wp_get_current_user();
	$name = empty( $user->user_firstname ) ? '' : $user->user_firstname;
	$email = $user->user_email;
	$site_link = '<a href="' . get_site_url() . '">'. get_site_url() . '</a>';
	$website = get_site_url();
	
	echo '<form method="post" action="' . admin_url( '/admin.php?page=fca-ga-splash' ) . '">';
		echo '<div id="fca-logo-wrapper">';
			echo '<div id="fca-logo-wrapper-inner">';
				echo '<img id="fca-logo-text" src="' . FCA_GA_PLUGINS_URL . '/assets/fatcatapps-logo-text.png' . '">';
			echo '</div>';
		echo '</div>';
		
		echo "<input type='hidden' name='fname' value='$name'>";
		echo "<input type='hidden' name='email' value='$email'>";
		
		echo '<div id="fca-splash">';
			echo '<h1>' . __( 'Welcome to Google Analytics by Fatcat Apps', 'fca-ga' ) . '</h1>';
			
			echo '<div id="fca-splash-main" class="fca-splash-box">';
				echo '<p id="fca-splash-main-text">' .  sprintf ( __( 'In order to enjoy all our features and functionality,%4$s Google Analytics by Fatcat Apps needs to connect %1$s your user, %2$s at %3$s, to %4$s<strong>api.fatcatapps.com</strong>.', 'fca-ga' ), '<br>', '<strong>' . $name . '</strong>', '<strong>' . $website . '</strong>', '<br>' ) . '</p>';
				echo "<button type='submit' id='fca-ga-submit-btn' class='fca-ga-button button button-primary' name='fca-ga-submit-optin' >" . __( 'Connect Google Analytics by Fatcat Apps', 'fca-ga') . "</button><br>";
				echo "<button type='submit' id='fca-ga-optout-btn' name='fca-ga-submit-optout' >" . __( 'Skip This Step', 'fca-ga') . "</button>";
			echo '</div>';
			
			echo '<div id="fca-splash-permissions" class="fca-splash-box">';
				echo '<a id="fca-splash-permissions-toggle" href="#" >' . __( 'What permission is being granted?', 'fca-ga' ) . '</a>';
				echo '<div id="fca-splash-permissions-dropdown" style="display: none;">';
					echo '<h3>' .  __( 'Your Website Info', 'fca-ga' ) . '</h3>';
					echo '<p>' .  __( 'Your URL, WordPress version, plugins & themes. This data lets us make sure this plugin always stays compatible with the most popular plugins and themes.', 'fca-ga' ) . '</p>';
					
					echo '<h3>' .  __( 'Your Info', 'fca-ga' ) . '</h3>';
					echo '<p>' .  __( 'Your name and email.', 'fca-ga' ) . '</p>';
					
					echo '<h3>' .  __( 'Plugin Usage', 'fca-ga' ) . '</h3>';
					echo '<p>' .  __( "How you use this plugin's features and settings. This is limited to usage data. It does not include any of your sensitive Google Analytics data, such as traffic. This data helps us learn which features are most popular, so we can improve the plugin further.", 'fca-ga' ) . '</p>';				
				echo '</div>';
			echo '</div>';
			

		echo '</div>';
	
	echo '</form>';
	
	echo '<div id="fca-splash-footer">';
		echo '<a target="_blank" href="https://fatcatapps.com/legal/terms-service/">' . _x( 'Terms', 'as in terms and conditions', 'fca-ga' ) . '</a> | <a target="_blank" href="https://fatcatapps.com/legal/privacy-policy/">' . _x( 'Privacy', 'as in privacy policy', 'fca-ga' ) . '</a>';
	echo '</div>';
}

function fca_ga_admin_redirects() {

	if ( isset( $_POST['fca-ga-submit-optout'] ) ) {
		update_option( 'fca_ga_activation_status', 'disabled' );
		wp_redirect( admin_url( '/options-general.php?page=fca_ga_settings_page' ) );
		exit;
	} else if ( isset( $_POST['fca-ga-submit-optin'] ) ) {
		update_option( 'fca_ga_activation_status', 'active' );
		
		$email = urlencode ( sanitize_email ( $_POST['email'] ) );
		$name = urlencode ( esc_textarea ( $_POST['fname'] ) );
		$product = 'gacat';
		$url =  "https://api.fatcatapps.com/api/activate.php?email=$email&fname=$name&product=$product";
		$return = wp_remote_get( $url );
	
		wp_redirect( admin_url( '/options-general.php?page=fca_ga_settings_page' ) );
		exit;
	}
	
	$status = get_option( 'fca_ga_activation_status' );
	if ( empty($status) && isset( $_GET['page'] ) &&$_GET['page'] === 'fca_ga_settings_page' ) {
        wp_redirect( admin_url( '/admin.php?page=fca-ga-splash' ) );
		exit;
    }

}
add_action('admin_init', 'fca_ga_admin_redirects');

