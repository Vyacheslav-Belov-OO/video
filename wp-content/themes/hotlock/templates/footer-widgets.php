<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0.10
 */

// Footer sidebar
$hotlock_footer_name = hotlock_get_theme_option('footer_widgets');
$hotlock_footer_present = !hotlock_is_off($hotlock_footer_name) && is_active_sidebar($hotlock_footer_name);
if ($hotlock_footer_present) { 
	hotlock_storage_set('current_sidebar', 'footer');
	$hotlock_footer_wide = hotlock_get_theme_option('footer_wide');
	ob_start();
	if ( is_active_sidebar($hotlock_footer_name) ) {
		dynamic_sidebar($hotlock_footer_name);
	}
	$hotlock_out = trim(ob_get_contents());
	ob_end_clean();
	if (trim(strip_tags($hotlock_out)) != '') {
		$hotlock_out = preg_replace("/<\\/aside>[\r\n\s]*<aside/", "</aside><aside", $hotlock_out);
		$hotlock_need_columns = true;
		if ($hotlock_need_columns) {
			$hotlock_columns = max(0, (int) hotlock_get_theme_option('footer_columns'));
			if ($hotlock_columns == 0) $hotlock_columns = min(6, max(1, substr_count($hotlock_out, '<aside ')));
			if ($hotlock_columns > 1)
				$hotlock_out = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($hotlock_columns).' widget ', $hotlock_out);
			else
				$hotlock_need_columns = false;
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo !empty($hotlock_footer_wide) ? ' footer_fullwidth' : ''; ?>">
			<div class="footer_widgets_inner widget_area_inner">
				<?php 
				if (!$hotlock_footer_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($hotlock_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'hotlock_action_before_sidebar' );
				hotlock_show_layout($hotlock_out);
				do_action( 'hotlock_action_after_sidebar' );
				if ($hotlock_need_columns) {
					?></div><!-- /.columns_wrap --><?php
				}
				if (!$hotlock_footer_wide) {
					?></div><!-- /.content_wrap --><?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
?>