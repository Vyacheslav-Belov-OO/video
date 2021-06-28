<?php
/* Mail Chimp support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('hotlock_mailchimp_theme_setup9')) {
	add_action( 'after_setup_theme', 'hotlock_mailchimp_theme_setup9', 9 );
	function hotlock_mailchimp_theme_setup9() {
		if (hotlock_exists_mailchimp()) {
			add_action( 'wp_enqueue_scripts',							'hotlock_mailchimp_frontend_scripts', 1100 );
			add_filter( 'hotlock_filter_merge_styles',					'hotlock_mailchimp_merge_styles');
			add_filter( 'hotlock_filter_get_css',						'hotlock_mailchimp_get_css', 10, 4);
		}
		if (is_admin()) {
			add_filter( 'hotlock_filter_tgmpa_required_plugins',		'hotlock_mailchimp_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'hotlock_exists_mailchimp' ) ) {
	function hotlock_exists_mailchimp() {
		return function_exists('__mc4wp_load_plugin') || defined('MC4WP_VERSION');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'hotlock_mailchimp_tgmpa_required_plugins' ) ) {
	function hotlock_mailchimp_tgmpa_required_plugins($list=array()) {
		if (in_array('mailchimp-for-wp', (array)hotlock_storage_get('required_plugins')))
			$list[] = array(
				'name' 		=> esc_html__('MailChimp for WP', 'hotlock'),
				'slug' 		=> 'mailchimp-for-wp',
				'required' 	=> false
			);
		return $list;
	}
}



// Custom styles and scripts
//------------------------------------------------------------------------

// Enqueue custom styles
if ( !function_exists( 'hotlock_mailchimp_frontend_scripts' ) ) {
	function hotlock_mailchimp_frontend_scripts() {
		if (hotlock_exists_mailchimp()) {
			if (hotlock_is_on(hotlock_get_theme_option('debug_mode')) && file_exists(hotlock_get_file_dir('plugins/mailchimp-for-wp/mailchimp-for-wp.css')))
				wp_enqueue_style( 'hotlock-mailchimp-for-wp',  hotlock_get_file_url('plugins/mailchimp-for-wp/mailchimp-for-wp.css'), array(), null );
		}
	}
}

// Merge custom styles
if ( !function_exists( 'hotlock_mailchimp_merge_styles' ) ) {
	function hotlock_mailchimp_merge_styles($list) {
		$list[] = 'plugins/mailchimp-for-wp/mailchimp-for-wp.css';
		return $list;
	}
}

// Add css styles into global CSS stylesheet
if (!function_exists('hotlock_mailchimp_get_css')) {
	function hotlock_mailchimp_get_css($css, $colors, $fonts, $scheme='') {

		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS

CSS;
		}

		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS


.footer_wrap.scheme_dark .mc4wp-form input[type="email"] {
	background-color: {$colors['bg_color']}!important;
	border-color: {$colors['bg_color']};
	color: {$colors['text_dark']};
}
.footer_wrap.scheme_dark .mc4wp-form input[type="submit"] {
	color: {$colors['bg_color']}!important;
	background-color: {$colors['alter_link']};
}
.footer_wrap.scheme_dark .mc4wp-form input[type="submit"]:hover {
	background-color: {$colors['alter_link_blend']};
}


CSS;
		}

		return $css;
	}
}
?>
