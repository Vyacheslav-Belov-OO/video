<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0.10
 */

$hotlock_footer_scheme =  hotlock_is_inherit(hotlock_get_theme_option('footer_scheme')) ? hotlock_get_theme_option('color_scheme') : hotlock_get_theme_option('footer_scheme');
$hotlock_footer_id = str_replace('footer-custom-', '', hotlock_get_theme_option("footer_style"));
if ((int) $hotlock_footer_id == 0) {
	$hotlock_footer_id = hotlock_get_post_id(array(
			'name' => $hotlock_footer_id,
			'post_type' => defined('TRX_ADDONS_CPT_LAYOUTS_PT') ? TRX_ADDONS_CPT_LAYOUTS_PT : 'cpt_layouts'
		)
	);
} else {
	$hotlock_footer_id = apply_filters('trx_addons_filter_get_translated_layout', $hotlock_footer_id);
}

?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr($hotlock_footer_id); ?> scheme_<?php echo esc_attr($hotlock_footer_scheme); ?>">
	<?php
    // Custom footer's layout
    do_action('hotlock_action_show_layout', $hotlock_footer_id);
	?>
</footer><!-- /.footer_wrap -->
