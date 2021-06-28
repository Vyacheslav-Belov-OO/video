<?php
/* WPBakery PageBuilder Extensions Bundle support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('hotlock_vc_extensions_theme_setup9')) {
	add_action( 'after_setup_theme', 'hotlock_vc_extensions_theme_setup9', 9 );
	function hotlock_vc_extensions_theme_setup9() {
		if (hotlock_exists_visual_composer()) {
			add_action( 'wp_enqueue_scripts', 								'hotlock_vc_extensions_frontend_scripts', 1100 );
			add_filter( 'hotlock_filter_merge_styles',						'hotlock_vc_extensions_merge_styles' );
		}
	
		if (is_admin()) {
			add_filter( 'hotlock_filter_tgmpa_required_plugins',		'hotlock_vc_extensions_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'hotlock_vc_extensions_tgmpa_required_plugins' ) ) {
	function hotlock_vc_extensions_tgmpa_required_plugins($list=array()) {
		if (in_array('vc-extensions-bundle', (array)hotlock_storage_get('required_plugins'))) {
			$path = hotlock_get_file_dir('plugins/vc-extensions-bundle/vc-extensions-bundle.zip');
			$list[] = array(
					'name' 		=> esc_html__('WPBakery PageBuilder Extensions Bundle', 'hotlock'),
					'slug' 		=> 'vc-extensions-bundle',
					'source'	=> !empty($path) ? $path : 'upload://vc-extensions-bundle.zip',
                    'version'	=> '3.5.4',
					'required' 	=> false
			);
		}
		return $list;
	}
}

// Check if VC Extensions installed and activated
if ( !function_exists( 'hotlock_exists_vc_extensions' ) ) {
	function hotlock_exists_vc_extensions() {
		return class_exists('Vc_Manager') && class_exists('VC_Extensions_CQBundle');
	}
}
	
// Enqueue VC custom styles
if ( !function_exists( 'hotlock_vc_extensions_frontend_scripts' ) ) {
	function hotlock_vc_extensions_frontend_scripts() {
		if (hotlock_is_on(hotlock_get_theme_option('debug_mode')) && file_exists(hotlock_get_file_dir('plugins/vc-extensions-bundle/vc-extensions-bundle.css')))
			wp_enqueue_style( 'hotlock-vc-extensions-bundle',  hotlock_get_file_url('plugins/vc-extensions-bundle/vc-extensions-bundle.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'hotlock_vc_extensions_merge_styles' ) ) {
	function hotlock_vc_extensions_merge_styles($list) {
		$list[] = 'plugins/vc-extensions-bundle/vc-extensions-bundle.css';
		return $list;
	}
}
?>