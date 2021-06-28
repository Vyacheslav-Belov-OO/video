<?php
/* Revolution Slider support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('hotlock_revslider_theme_setup9')) {
	add_action( 'after_setup_theme', 'hotlock_revslider_theme_setup9', 9 );
	function hotlock_revslider_theme_setup9() {
		if (is_admin()) {
			add_filter( 'hotlock_filter_tgmpa_required_plugins',	'hotlock_revslider_tgmpa_required_plugins' );
		}
	}
}

// Check if RevSlider installed and activated
if ( !function_exists( 'hotlock_exists_revslider' ) ) {
	function hotlock_exists_revslider() {
		return function_exists('rev_slider_shortcode');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'hotlock_revslider_tgmpa_required_plugins' ) ) {
	function hotlock_revslider_tgmpa_required_plugins($list=array()) {
		if (in_array('revslider', (array)hotlock_storage_get('required_plugins'))) {
			$path = hotlock_get_file_dir('plugins/revslider/revslider.zip');
			$list[] = array(
					'name' 		=> esc_html__('Revolution Slider', 'hotlock'),
					'slug' 		=> 'revslider',
					'version'   => '6.1.5',
					'source'	=> !empty($path) ? $path : 'upload://revslider.zip',
					'required' 	=> false
			);
		}
		return $list;
	}
}
?>