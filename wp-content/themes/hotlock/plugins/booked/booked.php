<?php
/* Booked Appointments support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('hotlock_booked_theme_setup9')) {
	add_action( 'after_setup_theme', 'hotlock_booked_theme_setup9', 9 );
	function hotlock_booked_theme_setup9() {
        if (is_admin()) {
            add_filter( 'hotlock_filter_tgmpa_required_plugins',		'hotlock_booked_tgmpa_required_plugins' );
        }
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'hotlock_exists_booked' ) ) {
	function hotlock_exists_booked() {
		return class_exists('booked_plugin');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'hotlock_booked_tgmpa_required_plugins' ) ) {
	function hotlock_booked_tgmpa_required_plugins($list=array()) {
		if (in_array('booked', (array)hotlock_storage_get('required_plugins'))) {
			$path = hotlock_get_file_dir('plugins/booked/booked.zip');
			$list[] = array(
						'name' 		=> esc_html__('Booked', 'hotlock'),
						'slug' 		=> 'booked',
						'source'	=> !empty($path) ? $path : 'upload://booked.zip',
						'version' 	=> '2.2.5',
						'required' 	=> false
			);
			// Addons
			$path = hotlock_get_file_dir('plugins/booked/booked-calendar-feeds.zip');
			$list[] = array(
						'name' 		=> esc_html__('Booked Calendar Feeds', 'hotlock'),
						'slug' 		=> 'booked-calendar-feeds',
						'source'	=> !empty($path) ? $path : 'upload://booked-calendar-feeds.zip',
                        'version' 	=> '1.1.6',
						'required' 	=> false
			);
			$path = hotlock_get_file_dir('plugins/booked/booked-frontend-agents.zip');
			$list[] = array(
						'name' 		=> esc_html__('Booked Front-End Agents', 'hotlock'),
						'slug' 		=> 'booked-frontend-agents',
						'source'	=> !empty($path) ? $path : 'upload://booked-frontend-agents.zip',
                        'version' 	=> '1.1.16',
						'required' 	=> false
			);
			$path = hotlock_get_file_dir('plugins/booked/booked-woocommerce-payments.zip');
			$list[] = array(
						'name' 		=> esc_html__('WooCommerce addons - Booked Payments with WooCommerce', 'hotlock'),
						'slug' 		=> 'booked-woocommerce-payments',
						'source'	=> !empty($path) ? $path : 'upload://booked-woocommerce-payments.zip',
                        'version' 	=> '1.5.3',
						'required' 	=> false
			);
		}
		return $list;
	}
}

?>