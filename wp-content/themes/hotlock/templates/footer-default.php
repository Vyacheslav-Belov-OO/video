<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0.10
 */

$hotlock_footer_scheme =  hotlock_is_inherit(hotlock_get_theme_option('footer_scheme')) ? hotlock_get_theme_option('color_scheme') : hotlock_get_theme_option('footer_scheme');
?>
<footer class="footer_wrap footer_default scheme_<?php echo esc_attr($hotlock_footer_scheme); ?>">
	<?php

	// Footer widgets area
	get_template_part( 'templates/footer-widgets' );

	// Logo
	get_template_part( 'templates/footer-logo' );

	// Socials
	get_template_part( 'templates/footer-socials' );

	// Menu
	get_template_part( 'templates/footer-menu' );

	// Copyright area
	get_template_part( 'templates/footer-copyright' );
	
	?>
</footer><!-- /.footer_wrap -->
