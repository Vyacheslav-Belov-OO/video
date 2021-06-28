<?php
/* Essential Grid support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('hotlock_essential_grid_theme_setup9')) {
	add_action( 'after_setup_theme', 'hotlock_essential_grid_theme_setup9', 9 );
	function hotlock_essential_grid_theme_setup9() {
		if (hotlock_exists_essential_grid()) {
			add_action( 'wp_enqueue_scripts', 							'hotlock_essential_grid_frontend_scripts', 1100 );
			add_filter( 'hotlock_filter_merge_styles',					'hotlock_essential_grid_merge_styles' );
		}
		if (is_admin()) {
			add_filter( 'hotlock_filter_tgmpa_required_plugins',		'hotlock_essential_grid_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'hotlock_exists_essential_grid' ) ) {
	function hotlock_exists_essential_grid() {
		return defined('EG_PLUGIN_PATH');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'hotlock_essential_grid_tgmpa_required_plugins' ) ) {
	function hotlock_essential_grid_tgmpa_required_plugins($list=array()) {
		if (in_array('essential-grid', (array)hotlock_storage_get('required_plugins'))) {
			$path = hotlock_get_file_dir('plugins/essential-grid/essential-grid.zip');
			$list[] = array(
						'name' 		=> esc_html__('Essential Grid', 'hotlock'),
						'slug' 		=> 'essential-grid',
						'source'	=> !empty($path) ? $path : 'upload://essential-grid.zip',
                        'version' 	=> '2.3.6',
						'required' 	=> false
			);
		}
		return $list;
	}
}

// Enqueue plugin's custom styles
if ( !function_exists( 'hotlock_essential_grid_frontend_scripts' ) ) {
	function hotlock_essential_grid_frontend_scripts() {
		if (hotlock_is_on(hotlock_get_theme_option('debug_mode')) && file_exists(hotlock_get_file_dir('plugins/essential-grid/essential-grid.css')))
			wp_enqueue_style( 'hotlock-essential-grid',  hotlock_get_file_url('plugins/essential-grid/essential-grid.css'), array(), null );
	}
}

// Merge custom styles
if ( !function_exists( 'hotlock_essential_grid_merge_styles' ) ) {
	function hotlock_essential_grid_merge_styles($list) {
		$list[] = 'plugins/essential-grid/essential-grid.css';
		return $list;
	}
}
?>