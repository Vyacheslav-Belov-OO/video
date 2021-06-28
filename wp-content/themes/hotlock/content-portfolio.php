<?php
/**
 * The Portfolio template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

$hotlock_blog_style = explode('_', hotlock_get_theme_option('blog_style'));
$hotlock_columns = empty($hotlock_blog_style[1]) ? 2 : max(2, $hotlock_blog_style[1]);
$hotlock_post_format = get_post_format();
$hotlock_post_format = empty($hotlock_post_format) ? 'standard' : str_replace('post-format-', '', $hotlock_post_format);
$hotlock_animation = hotlock_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_portfolio_'.esc_attr($hotlock_columns).' post_format_'.esc_attr($hotlock_post_format) ); ?>
	<?php echo (!hotlock_is_off($hotlock_animation) ? ' data-animation="'.esc_attr(hotlock_get_animation_classes($hotlock_animation)).'"' : ''); ?>
	>

	<?php
	$hotlock_image_hover = hotlock_get_theme_option('image_hover');
	// Featured image
	hotlock_show_post_featured(array(
		'thumb_size' => hotlock_get_thumb_size(strpos(hotlock_get_theme_option('body_style'), 'full')!==false || $hotlock_columns < 3 ? 'masonry-big' : 'masonry'),
		'show_no_image' => true,
		'class' => $hotlock_image_hover == 'dots' ? 'hover_with_info' : '',
		'post_info' => $hotlock_image_hover == 'dots' ? '<div class="post_info">'.esc_html(get_the_title()).'</div>' : ''
	));
	?>
</article>