<?php
/**
 * The template 'Style 1' to displaying related posts
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

$hotlock_link = get_permalink();
$hotlock_post_format = get_post_format();
$hotlock_post_format = empty($hotlock_post_format) ? 'standard' : str_replace('post-format-', '', $hotlock_post_format);
?><div id="post-<?php the_ID(); ?>" 
	<?php post_class( 'related_item related_item_style_1 post_format_'.esc_attr($hotlock_post_format) ); ?>><?php
	hotlock_show_post_featured(array(
		'thumb_size' => hotlock_get_thumb_size( 'big' ),
		'show_no_image' => true,
		'singular' => false,
		'post_info' => '<div class="post_header entry-header">'
							. '<div class="post_categories">' . hotlock_get_post_categories('') . '</div>'
							. '<h6 class="post_title entry-title"><a href="' . esc_url($hotlock_link) . '">' . wp_kses( get_the_title(), 'hotlock_kses_content' ) . '</a></h6>'
							. (in_array(get_post_type(), array('post', 'attachment'))
									? '<span class="post_date"><a href="' . esc_url($hotlock_link) . '">' . hotlock_get_date() . '</a></span>'
									: '')
						. '</div>'
		)
	);
?></div>