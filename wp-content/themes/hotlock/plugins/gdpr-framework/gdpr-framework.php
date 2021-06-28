<?php
/* Mail Chimp support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('hotlock_gdpr_theme_setup9')) {
	add_action( 'after_setup_theme', 'hotlock_gdpr_theme_setup9', 9 );
	function hotlock_gdpr_theme_setup9() {
		if (is_admin()) {
			add_filter( 'hotlock_filter_tgmpa_required_plugins',		'hotlock_gdpr_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'hotlock_exists_gdpr' ) ) {
	function hotlock_exists_gdpr() {
		return defined('GDPR_FRAMEWORK_VERSION');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'hotlock_gdpr_tgmpa_required_plugins' ) ) {
	function hotlock_gdpr_tgmpa_required_plugins($list=array()) {
		if (in_array('gdpr-framework', (array)hotlock_storage_get('required_plugins')))
			$list[] = array(
				'name' 		=> esc_html__('GDPR Framework', 'hotlock'),
				'slug' 		=> 'gdpr-framework',
				'required' 	=> false
			);
		return $list;
	}
}
?>
