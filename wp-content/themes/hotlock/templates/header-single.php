<?php
/**
 * The template to display the featured image in the single post
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

if ( get_query_var('hotlock_header_image')=='' && is_singular() && has_post_thumbnail() && in_array(get_post_type(), array('post', 'page')) )  {
	$hotlock_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
	if (!empty($hotlock_src[0])) {
		hotlock_sc_layouts_showed('featured', true);
		?><div class="sc_layouts_featured <?php echo esc_attr(hotlock_add_inline_style('background-image:url('.esc_url($hotlock_src[0]).');')); ?>"></div><?php
	}
}
?>