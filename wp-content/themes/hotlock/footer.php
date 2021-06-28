<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

						// Widgets area inside page content
						hotlock_create_widgets_area('widgets_below_content');
						?>				
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					// Widgets area below page content
					hotlock_create_widgets_area('widgets_below_page');

					$hotlock_body_style = hotlock_get_theme_option('body_style');
					if ($hotlock_body_style != 'fullscreen') {
						?></div><!-- </.content_wrap> --><?php
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Footer
			$hotlock_footer_style = hotlock_get_theme_option("footer_style");
			if (strpos($hotlock_footer_style, 'footer-custom-')===0) $hotlock_footer_style = 'footer-custom';
			get_template_part( "templates/{$hotlock_footer_style}");
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php if (hotlock_is_on(hotlock_get_theme_option('debug_mode')) && file_exists(hotlock_get_file_dir('images/makeup.jpg'))) { ?>
		<img src="<?php echo esc_url(hotlock_get_file_url('images/makeup.jpg')); ?>" id="makeup">
	<?php } ?>

	<?php wp_footer(); ?>

</body>
</html>