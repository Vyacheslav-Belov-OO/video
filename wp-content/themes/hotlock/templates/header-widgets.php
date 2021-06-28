<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

// Header sidebar
$hotlock_header_name = hotlock_get_theme_option('header_widgets');
$hotlock_header_present = !hotlock_is_off($hotlock_header_name) && is_active_sidebar($hotlock_header_name);
if ($hotlock_header_present) { 
	hotlock_storage_set('current_sidebar', 'header');
	$hotlock_header_wide = hotlock_get_theme_option('header_wide');
	ob_start();
	if ( is_active_sidebar($hotlock_header_name) ) {
		dynamic_sidebar($hotlock_header_name);
	}
	$hotlock_widgets_output = ob_get_contents();
	ob_end_clean();
	if (trim(strip_tags($hotlock_widgets_output)) != '') {
		$hotlock_widgets_output = preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $hotlock_widgets_output);
		$hotlock_need_columns = strpos($hotlock_widgets_output, 'columns_wrap')===false;
		if ($hotlock_need_columns) {
			$hotlock_columns = max(0, (int) hotlock_get_theme_option('header_columns'));
			if ($hotlock_columns == 0) $hotlock_columns = min(6, max(1, substr_count($hotlock_widgets_output, '<aside ')));
			if ($hotlock_columns > 1)
				$hotlock_widgets_output = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($hotlock_columns).' widget ', $hotlock_widgets_output);
			else
				$hotlock_need_columns = false;
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo !empty($hotlock_header_wide) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php 
				if (!$hotlock_header_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($hotlock_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'hotlock_action_before_sidebar' );
				hotlock_show_layout($hotlock_widgets_output);
				do_action( 'hotlock_action_after_sidebar' );
				if ($hotlock_need_columns) {
					?></div>	<!-- /.columns_wrap --><?php
				}
				if (!$hotlock_header_wide) {
					?></div>	<!-- /.content_wrap --><?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
?>