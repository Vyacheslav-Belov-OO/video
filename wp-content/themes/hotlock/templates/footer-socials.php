<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0.10
 */


// Socials
if ( hotlock_is_on(hotlock_get_theme_option('socials_in_footer')) && ($hotlock_output = hotlock_get_socials_links()) != '') {
	?>
	<div class="footer_socials_wrap socials_wrap">
		<div class="footer_socials_inner">
			<?php hotlock_show_layout($hotlock_output); ?>
		</div>
	</div>
	<?php
}
?>