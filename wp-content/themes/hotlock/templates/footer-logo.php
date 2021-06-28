<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0.10
 */

// Logo
if (hotlock_is_on(hotlock_get_theme_option('logo_in_footer'))) {
	$hotlock_logo_image = '';
	if (hotlock_get_retina_multiplier(2) > 1)
		$hotlock_logo_image = hotlock_get_theme_option( 'logo_footer_retina' );
	if (empty($hotlock_logo_image)) 
		$hotlock_logo_image = hotlock_get_theme_option( 'logo_footer' );
	$hotlock_logo_text   = get_bloginfo( 'name' );
	if (!empty($hotlock_logo_image) || !empty($hotlock_logo_text)) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if (!empty($hotlock_logo_image)) {
					$hotlock_attr = hotlock_getimagesize($hotlock_logo_image);
                    $alt = basename($hotlock_logo_image);
                    $alt = substr($alt,0,strlen($alt) - 4);
					echo '<a href="'.esc_url(home_url('/')).'"><img src="'.esc_url($hotlock_logo_image).'" class="logo_footer_image" alt="'.esc_attr($alt).'"'.(!empty($hotlock_attr[3]) ? sprintf(' %s', $hotlock_attr[3]) : '').'></a>' ;
				} else if (!empty($hotlock_logo_text)) {
					echo '<h1 class="logo_footer_text"><a href="'.esc_url(home_url('/')).'">' . esc_html($hotlock_logo_text) . '</a></h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
?>