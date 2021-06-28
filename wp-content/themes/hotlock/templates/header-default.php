<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
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

?><header class="top_panel top_panel_default<?php
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
	
	// Main menu
	if (hotlock_get_theme_option("menu_style") == 'top') {
		get_template_part( 'templates/header-navi' );
	}

	// Page title and breadcrumbs area
	get_template_part( 'templates/header-title');

	// Header widgets area
	get_template_part( 'templates/header-widgets' );

	// Header for single posts
	get_template_part( 'templates/header-single' );

?></header>