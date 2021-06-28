<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0.06
 */

$hotlock_header_css = $hotlock_header_image = '';
$hotlock_header_video = hotlock_get_header_video();
if (true || empty($hotlock_header_video)) {
	$hotlock_header_image = get_header_image();
	if (hotlock_is_on(hotlock_get_theme_option('header_image_override')) && apply_filters('hotlock_filter_allow_override_header_image', true)) {
		if (is_category()) {
			if (($hotlock_cat_img = hotlock_get_category_image()) != '')
				$hotlock_header_image = $hotlock_cat_img;
		} else if (is_singular() || hotlock_storage_isset('blog_archive')) {
			if (has_post_thumbnail()) {
				$hotlock_header_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				if (is_array($hotlock_header_image)) $hotlock_header_image = $hotlock_header_image[0];
			} else
				$hotlock_header_image = '';
		}
	}
}

$hotlock_header_id = str_replace('header-custom-', '', hotlock_get_theme_option("header_style"));
if ((int) $hotlock_header_id == 0) {
	$hotlock_header_id = hotlock_get_post_id(array(
			'name' => $hotlock_header_id,
			'post_type' => defined('TRX_ADDONS_CPT_LAYOUTS_PT') ? TRX_ADDONS_CPT_LAYOUTS_PT : 'cpt_layouts'
		)
	);
} else {
	$hotlock_header_id = apply_filters('trx_addons_filter_get_translated_layout', $hotlock_header_id);
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr($hotlock_header_id);
						echo !empty($hotlock_header_image) || !empty($hotlock_header_video) ? ' with_bg_image' : ' without_bg_image';
						if ($hotlock_header_video!='') echo ' with_bg_video';
						if ($hotlock_header_image!='') echo ' '.esc_attr(hotlock_add_inline_style('background-image: url('.esc_url($hotlock_header_image).');'));
						if (is_single() && has_post_thumbnail()) echo ' with_featured_image';
						if (hotlock_is_on(hotlock_get_theme_option('header_fullheight'))) echo ' header_fullheight trx-stretch-height';
						?> scheme_<?php echo esc_attr(hotlock_is_inherit(hotlock_get_theme_option('header_scheme')) 
														? hotlock_get_theme_option('color_scheme') 
														: hotlock_get_theme_option('header_scheme'));
						?>"><?php

	// Background video
	if (!empty($hotlock_header_video)) {
		get_template_part( 'templates/header-video' );
	}
		
	// Custom header's layout
	do_action('hotlock_action_show_layout', $hotlock_header_id);

	// Header widgets area
	get_template_part( 'templates/header-widgets' );


		
?></header>