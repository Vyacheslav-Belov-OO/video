<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0.10
 */

// Footer menu
$hotlock_menu_footer = hotlock_get_nav_menu('menu_footer');
if (!empty($hotlock_menu_footer)) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php hotlock_show_layout($hotlock_menu_footer); ?>
		</div>
	</div>
	<?php
}
?>