<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0.14
 */
$hotlock_header_video = hotlock_get_header_video();
if (!empty($hotlock_header_video) && !hotlock_is_from_uploads($hotlock_header_video)) {
	global $wp_embed;
	if (is_object($wp_embed))
		$hotlock_embed_video = do_shortcode($wp_embed->run_shortcode( '[embed]' . trim($hotlock_header_video) . '[/embed]' ));
	$hotlock_embed_video = hotlock_make_video_autoplay($hotlock_embed_video);
	?><div id="background_video"><?php hotlock_show_layout($hotlock_embed_video); ?></div><?php
}
?>