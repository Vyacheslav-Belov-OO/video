<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

$hotlock_sidebar_position = hotlock_get_theme_option('sidebar_position');
if (hotlock_sidebar_present()) {
	ob_start();
	$hotlock_sidebar_name = hotlock_get_theme_option('sidebar_widgets');
	hotlock_storage_set('current_sidebar', 'sidebar');
	if ( is_active_sidebar($hotlock_sidebar_name) ) {
		dynamic_sidebar($hotlock_sidebar_name);
	}
	$hotlock_out = trim(ob_get_contents());
	ob_end_clean();
	if (trim(strip_tags($hotlock_out)) != '') {
		?>
		<div class="sidebar <?php echo esc_attr($hotlock_sidebar_position); ?> widget_area<?php if (!hotlock_is_inherit(hotlock_get_theme_option('sidebar_scheme'))) echo ' scheme_'.esc_attr(hotlock_get_theme_option('sidebar_scheme')); ?>" role="complementary">
			<div class="sidebar_inner">
				<?php
				do_action( 'hotlock_action_before_sidebar' );
				hotlock_show_layout(preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $hotlock_out));
				do_action( 'hotlock_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<?php
	}
}
?>