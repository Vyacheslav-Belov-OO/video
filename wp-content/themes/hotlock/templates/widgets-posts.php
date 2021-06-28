<?php
/**
 * The template to display posts in widgets and/or in the search results
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

$hotlock_post_id    = get_the_ID();
$hotlock_post_date  = hotlock_get_date();
$hotlock_post_title = get_the_title();
$hotlock_post_link  = get_permalink();
$hotlock_post_author_id   = get_the_author_meta('ID');
$hotlock_post_author_name = get_the_author_meta('display_name');
$hotlock_post_author_url  = get_author_posts_url($hotlock_post_author_id, '');

$hotlock_args = get_query_var('hotlock_args_widgets_posts');
$hotlock_show_date = isset($hotlock_args['show_date']) ? (int) $hotlock_args['show_date'] : 1;
$hotlock_show_image = isset($hotlock_args['show_image']) ? (int) $hotlock_args['show_image'] : 1;
$hotlock_show_author = isset($hotlock_args['show_author']) ? (int) $hotlock_args['show_author'] : 1;
$hotlock_show_counters = isset($hotlock_args['show_counters']) ? (int) $hotlock_args['show_counters'] : 1;
$hotlock_show_categories = isset($hotlock_args['show_categories']) ? (int) $hotlock_args['show_categories'] : 1;

$hotlock_output = hotlock_storage_get('hotlock_output_widgets_posts');

$hotlock_post_counters_output = '';
if ( $hotlock_show_counters ) {
	$hotlock_post_counters_output = '<span class="post_info_item post_info_counters">'
								. hotlock_get_post_counters('comments')
							. '</span>';
}


$hotlock_output .= '<article class="post_item with_thumb">';

if ($hotlock_show_image) {
	$hotlock_post_thumb = get_the_post_thumbnail($hotlock_post_id, hotlock_get_thumb_size('tiny'), array(
		'alt' => get_the_title()
	));
	if ($hotlock_post_thumb) $hotlock_output .= '<div class="post_thumb">' . ($hotlock_post_link ? '<a href="' . esc_url($hotlock_post_link) . '">' : '') . ($hotlock_post_thumb) . ($hotlock_post_link ? '</a>' : '') . '</div>';
}

$hotlock_output .= '<div class="post_content">'
			. ($hotlock_show_categories 
					? '<div class="post_categories">'
						. hotlock_get_post_categories()
						. $hotlock_post_counters_output
						. '</div>' 
					: '')
			. '<h6 class="post_title">' . ($hotlock_post_link ? '<a href="' . esc_url($hotlock_post_link) . '">' : '') . ($hotlock_post_title) . ($hotlock_post_link ? '</a>' : '') . '</h6>'
			. apply_filters('hotlock_filter_get_post_info', 
								'<div class="post_info">'
									. ($hotlock_show_date 
										? '<span class="post_info_item post_info_posted">'
											. ($hotlock_post_link ? '<a href="' . esc_url($hotlock_post_link) . '" class="post_info_date">' : '') 
											. esc_html($hotlock_post_date) 
											. ($hotlock_post_link ? '</a>' : '')
											. '</span>'
										: '')
									. ($hotlock_show_author 
										? '<span class="post_info_item post_info_posted_by">' 
											. esc_html__('by', 'hotlock') . ' ' 
											. ($hotlock_post_link ? '<a href="' . esc_url($hotlock_post_author_url) . '" class="post_info_author">' : '') 
											. esc_html($hotlock_post_author_name) 
											. ($hotlock_post_link ? '</a>' : '') 
											. '</span>'
										: '')
									. (!$hotlock_show_categories && $hotlock_post_counters_output
										? $hotlock_post_counters_output
										: '')
								. '</div>')
		. '</div>'
	. '</article>';
hotlock_storage_set('hotlock_output_widgets_posts', $hotlock_output);
?>