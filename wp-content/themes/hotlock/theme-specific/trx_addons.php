<?php
/* Theme-specific action to configure ThemeREX Addons components
------------------------------------------------------------------------------- */


/* ThemeREX Addons components
------------------------------------------------------------------------------- */

if (!function_exists('hotlock_trx_addons_theme_specific_setup1')) {
	add_action( 'after_setup_theme', 'hotlock_trx_addons_theme_specific_setup1', 1 );
	add_action( 'trx_addons_action_save_options', 'hotlock_trx_addons_theme_specific_setup1', 8 );
	function hotlock_trx_addons_theme_specific_setup1() {
		if (hotlock_exists_trx_addons()) {
			add_filter( 'trx_addons_cv_enable',				'hotlock_trx_addons_cv_enable');
			add_filter( 'trx_addons_cpt_list',				'hotlock_trx_addons_cpt_list');
			add_filter( 'trx_addons_sc_list',				'hotlock_trx_addons_sc_list');
			add_filter( 'trx_addons_widgets_list',			'hotlock_trx_addons_widgets_list');
		}
	}
}

// CV
if ( !function_exists( 'hotlock_trx_addons_cv_enable' ) ) {
	function hotlock_trx_addons_cv_enable($enable=false) {
		// To do: return false if theme not use CV functionality
		return false;
	}
}

// CPT
if ( !function_exists( 'hotlock_trx_addons_cpt_list' ) ) {
	function hotlock_trx_addons_cpt_list($list=array()) {
		// To do: Enable/Disable CPT via add/remove it in the list
		unset($list['courses']);
		unset($list['certificates']);
		unset($list['dishes']);
		unset($list['resume']);
		unset($list['portfolio']);
		return $list;
	}
}

// Shortcodes
if ( !function_exists( 'hotlock_trx_addons_sc_list' ) ) {
	function hotlock_trx_addons_sc_list($list=array()) {
		// To do: Add/Remove shortcodes into list
		// If you add new shortcode - in the theme's folder must exists /trx_addons/shortcodes/new_sc_name/new_sc_name.php
		return $list;
	}
}

// Widgets
if ( !function_exists( 'hotlock_trx_addons_widgets_list' ) ) {
	function hotlock_trx_addons_widgets_list($list=array()) {
		// To do: Add/Remove widgets into list
		// If you add widget - in the theme's folder must exists /trx_addons/widgets/new_widget_name/new_widget_name.php
		unset($list['twitter']);
		unset($list['flickr']);
		unset($list['aboutme']);
		unset($list['banner']);
		unset($list['socials']);
		unset($list['categories_list']);
		unset($list['recent_news']);
		unset($list['popular_posts']);
		return $list;
	}
}


/* Add options in the Theme Options Customizer
------------------------------------------------------------------------------- */

// Theme init priorities:
// 3 - add/remove Theme Options elements
if (!function_exists('hotlock_trx_addons_theme_specific_setup3')) {
	add_action( 'after_setup_theme', 'hotlock_trx_addons_theme_specific_setup3', 3 );
	function hotlock_trx_addons_theme_specific_setup3() {

		// Section 'Courses' - settings to show 'Courses' blog archive and single posts
		if (hotlock_exists_courses()) {
			hotlock_storage_merge_array('options', '', array(
				'courses' => array(
					"title" => esc_html__('Courses', 'hotlock'),
					"desc" => wp_kses_data( __('Select parameters to display the courses pages', 'hotlock') ),
					"type" => "section"
					),
				'expand_content_courses' => array(
					"title" => esc_html__('Expand content', 'hotlock'),
					"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'hotlock') ),
					"refresh" => false,
					"std" => 1,
					"type" => "checkbox"
					),
				'header_widgets_courses' => array(
					"title" => esc_html__('Header widgets', 'hotlock'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the header on the courses pages', 'hotlock') ),
					"std" => 'hide',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hotlock')), hotlock_get_list_sidebars()),
					"type" => "select"
					),
				'sidebar_widgets_courses' => array(
					"title" => esc_html__('Sidebar widgets', 'hotlock'),
					"desc" => wp_kses_data( __('Select sidebar to show on the courses pages', 'hotlock') ),
					"std" => 'courses_widgets',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hotlock')), hotlock_get_list_sidebars()),
					"type" => "select"
					),
				'sidebar_position_courses' => array(
					"title" => esc_html__('Sidebar position', 'hotlock'),
					"desc" => wp_kses_data( __('Select position to show sidebar on the courses pages', 'hotlock') ),
					"refresh" => false,
					"std" => 'left',
					"options" => hotlock_get_list_sidebars_positions(),
					"type" => "select"
					),
				'widgets_above_page_courses' => array(
					"title" => esc_html__('Widgets above the page', 'hotlock'),
					"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'hotlock') ),
					"std" => 'hide',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hotlock')), hotlock_get_list_sidebars()),
					"type" => "select"
					),
				'widgets_above_content_courses' => array(
					"title" => esc_html__('Widgets above the content', 'hotlock'),
					"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'hotlock') ),
					"std" => 'hide',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hotlock')), hotlock_get_list_sidebars()),
					"type" => "select"
					),
				'widgets_below_content_courses' => array(
					"title" => esc_html__('Widgets below the content', 'hotlock'),
					"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'hotlock') ),
					"std" => 'hide',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hotlock')), hotlock_get_list_sidebars()),
					"type" => "select"
					),
				'widgets_below_page_courses' => array(
					"title" => esc_html__('Widgets below the page', 'hotlock'),
					"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'hotlock') ),
					"std" => 'hide',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hotlock')), hotlock_get_list_sidebars()),
					"type" => "select"
					),
				'footer_scheme_courses' => array(
					"title" => esc_html__('Footer Color Scheme', 'hotlock'),
					"desc" => wp_kses_data( __('Select color scheme to decorate footer area', 'hotlock') ),
					"std" => 'dark',
					"options" => hotlock_get_list_schemes(true),
					"type" => "select"
					),
				'footer_widgets_courses' => array(
					"title" => esc_html__('Footer widgets', 'hotlock'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'hotlock') ),
					"std" => 'footer_widgets',
					"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hotlock')), hotlock_get_list_sidebars()),
					"type" => "select"
					),
				'footer_columns_courses' => array(
					"title" => esc_html__('Footer columns', 'hotlock'),
					"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'hotlock') ),
					"dependency" => array(
						'footer_widgets_courses' => array('^hide')
					),
					"std" => 0,
					"options" => hotlock_get_list_range(0,6),
					"type" => "select"
					),
				'footer_wide_courses' => array(
					"title" => esc_html__('Footer fullwide', 'hotlock'),
					"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'hotlock') ),
					"std" => 0,
					"type" => "checkbox"
					)
				)
			);
		}
	}
}

// Add mobile menu to the plugin's cached menu list
if ( !function_exists( 'hotlock_trx_addons_menu_cache' ) ) {
	add_filter( 'trx_addons_filter_menu_cache', 'hotlock_trx_addons_menu_cache');
	function hotlock_trx_addons_menu_cache($list=array()) {
		if (in_array('#menu_main', $list)) $list[] = '#menu_mobile';
		return $list;
	}
}

// Add vars into localize array
if (!function_exists('hotlock_trx_addons_localize_script')) {
	add_filter( 'hotlock_filter_localize_script','hotlock_trx_addons_localize_script' );
	function hotlock_trx_addons_localize_script($arr) {
		$arr['alter_link_color'] = hotlock_get_scheme_color('alter_link');
		return $arr;
	}
}


// Add theme-specific layouts to the list
if (!function_exists('hotlock_trx_addons_theme_specific_default_layouts')) {
	add_filter( 'trx_addons_filter_default_layouts',	'hotlock_trx_addons_theme_specific_default_layouts');
	function hotlock_trx_addons_theme_specific_default_layouts($default_layouts=array()) {
		require_once trailingslashit( get_template_directory() ) . 'theme-specific/trx_addons.layouts.php';
		return isset($layouts) && is_array($layouts) && count($layouts) > 0
						? array_merge($default_layouts, $layouts)
						: $default_layouts;
	}
}

// Disable override header image on team pages
if ( !function_exists( 'hotlock_trx_addons_allow_override_header_image' ) ) {
	add_filter( 'hotlock_filter_allow_override_header_image', 'hotlock_trx_addons_allow_override_header_image' );
	function hotlock_trx_addons_allow_override_header_image($allow) {
		return hotlock_is_team_page() || hotlock_is_portfolio_page() ? false : $allow;
	}
}

// Hide sidebar on the team pages
if ( !function_exists( 'hotlock_trx_addons_sidebar_present' ) ) {
	add_filter( 'hotlock_filter_sidebar_present', 'hotlock_trx_addons_sidebar_present' );
	function hotlock_trx_addons_sidebar_present($present) {
		return hotlock_is_team_page() || hotlock_is_portfolio_page() ? false : $present;
	}
}


// WP Editor addons
//------------------------------------------------------------------------

// Theme-specific configure of the WP Editor
if ( !function_exists( 'hotlock_trx_addons_editor_init' ) ) {
	if (is_admin()) add_filter( 'tiny_mce_before_init', 'hotlock_trx_addons_editor_init', 11);
	function hotlock_trx_addons_editor_init($opt) {
		if (hotlock_exists_trx_addons()) {
			// Add style 'Arrow' to the 'List styles'
			// Remove 'false &&' from condition below to add new style to the list
			if (false && !empty($opt['style_formats'])) {
				$style_formats = json_decode($opt['style_formats'], true);
				if (is_array($style_formats) && count($style_formats)>0 ) {
					foreach ($style_formats as $k=>$v) {
						if ( $v['title'] == esc_html__('List styles', 'hotlock') ) {
							$style_formats[$k]['items'][] = array(
										'title' => esc_html__('Arrow', 'hotlock'),
										'selector' => 'ul',
										'classes' => 'trx_addons_list trx_addons_list_arrow'
									);
						}
					}
					$opt['style_formats'] = json_encode( $style_formats );
				}
			}
		}
		return $opt;
	}
}


// Theme-specific thumb sizes
//------------------------------------------------------------------------

// Replace thumb sizes to the theme-specific
if ( !function_exists( 'hotlock_trx_addons_add_thumb_sizes' ) ) {
	add_filter( 'trx_addons_filter_add_thumb_sizes', 'hotlock_trx_addons_add_thumb_sizes');
	function hotlock_trx_addons_add_thumb_sizes($list=array()) {
		if (is_array($list)) {
			foreach ($list as $k=>$v) {
				if (in_array($k, array(
								'trx_addons-thumb-huge',
								'trx_addons-thumb-big',
								'trx_addons-thumb-medium',
								'trx_addons-thumb-tiny',
								'trx_addons-thumb-masonry-big',
								'trx_addons-thumb-masonry',
								)
							)
						) unset($list[$k]);
			}
		}
		return $list;
	}
}

// Return theme-specific thumb size instead removed plugin's thumb size
if ( !function_exists( 'hotlock_trx_addons_get_thumb_size' ) ) {
	add_filter( 'trx_addons_filter_get_thumb_size', 'hotlock_trx_addons_get_thumb_size');
	function hotlock_trx_addons_get_thumb_size($thumb_size='') {
		return str_replace(array(
							'trx_addons-thumb-huge',
							'trx_addons-thumb-huge-@retina',
							'trx_addons-thumb-big',
							'trx_addons-thumb-big-@retina',
							'trx_addons-thumb-medium',
							'trx_addons-thumb-medium-@retina',
							'trx_addons-thumb-tiny',
							'trx_addons-thumb-tiny-@retina',
							'trx_addons-thumb-masonry-big',
							'trx_addons-thumb-masonry-big-@retina',
							'trx_addons-thumb-masonry',
							'trx_addons-thumb-masonry-@retina',
							),
							array(
							'hotlock-thumb-huge',
							'hotlock-thumb-huge-@retina',
							'hotlock-thumb-big',
							'hotlock-thumb-big-@retina',
							'hotlock-thumb-med',
							'hotlock-thumb-med-@retina',
							'hotlock-thumb-tiny',
							'hotlock-thumb-tiny-@retina',
							'hotlock-thumb-masonry-big',
							'hotlock-thumb-masonry-big-@retina',
							'hotlock-thumb-masonry',
							'hotlock-thumb-masonry-@retina',
							),
							$thumb_size);
	}
}

// Get thumb size for the team items
if ( !function_exists( 'hotlock_trx_addons_team_thumb_size' ) ) {
	add_filter( 'trx_addons_filter_team_thumb_size',	'hotlock_trx_addons_team_thumb_size', 10, 2);
	function hotlock_trx_addons_team_thumb_size($thumb_size='', $team_type='') {
		return $team_type == 'default' ? hotlock_get_thumb_size('med') : $thumb_size;
	}
}

// Add/remove animation types in the inputs
if ( !function_exists( 'hotlock_filter_get_list_input_hover' ) ) {
	add_filter( 'trx_addons_filter_get_list_input_hover', 'hotlock_filter_get_list_input_hover', 10, 2);
	function hotlock_filter_get_list_input_hover($list) {
		unset($list['accent']);
		unset($list['jump']);
		unset($list['path']);
		unset($list['underline']);
		unset($list['iconed']);
		return $list;
	}
}

// Shortcodes support
//------------------------------------------------------------------------

// Return tag for the item's title
if ( !function_exists( 'hotlock_trx_addons_sc_item_title_tag' ) ) {
	add_filter( 'trx_addons_filter_sc_item_title_tag', 'hotlock_trx_addons_sc_item_title_tag');
	function hotlock_trx_addons_sc_item_title_tag($tag='') {
		return $tag=='h1' ? 'h2' : $tag;
	}
}

// Return args for the item's button
if ( !function_exists( 'hotlock_trx_addons_sc_item_button_args' ) ) {
	add_filter( 'trx_addons_filter_sc_item_button_args', 'hotlock_trx_addons_sc_item_button_args');
	function hotlock_trx_addons_sc_item_button_args($args, $sc='') {
		if (false && $sc != 'sc_button') {
			$args['type'] = 'simple';
			$args['icon_type'] = 'fontawesome';
			$args['icon_fontawesome'] = 'icon-down-big';
			$args['icon_position'] = 'top';
		}
		return $args;
	}
}

// Add new types in the shortcodes
if ( !function_exists( 'hotlock_trx_addons_sc_type' ) ) {
	add_filter( 'trx_addons_sc_type', 'hotlock_trx_addons_sc_type', 10, 2);
	function hotlock_trx_addons_sc_type($list, $sc) {
		if (in_array($sc, array('trx_sc_action'))) {
			unset($list['Event']);
			unset($list['Simple']);
		}
		if (in_array($sc, array('trx_sc_blogger'))) {
			unset($list['Classic']);
			unset($list['Plain']);
		}
		if (in_array($sc, array('trx_sc_promo'))) {
			unset($list['Modern']);
			unset($list['Blockquote']);
		}
		if (in_array($sc, array('trx_sc_button'))) {
			unset($list['Simple']);
		}
		if (in_array($sc, array('trx_sc_form'))) {
			unset($list['Detailed']);
			unset($list['Modern']);
		}
		if (in_array($sc, array('trx_sc_services'))) {
			unset($list['Light']);
			unset($list['List']);
			unset($list['Chess']);
			unset($list['Tabs']);
			unset($list['Tabs (simple)']);
		}
		if (in_array($sc, array('trx_sc_team'))) {
			unset($list['Default']);
			unset($list['Featured']);
		}
		if (in_array($sc, array('trx_sc_testimonials'))) {
			unset($list['Simple']);
		}
		return $list;
	}
}

// Add new styles to the Google map
if ( !function_exists( 'hotlock_trx_addons_sc_googlemap_styles' ) ) {
	add_filter( 'trx_addons_filter_sc_googlemap_styles',	'hotlock_trx_addons_sc_googlemap_styles');
	function hotlock_trx_addons_sc_googlemap_styles($list) {
		$list[esc_html__('Dark', 'hotlock')] = 'dark';
		return $list;
	}
}
