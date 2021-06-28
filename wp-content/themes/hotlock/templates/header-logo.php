<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

$hotlock_args = get_query_var('hotlock_logo_args');

// Site logo
$hotlock_logo_image  = hotlock_get_logo_image(isset($hotlock_args['type']) ? $hotlock_args['type'] : '');
$hotlock_logo_text   = hotlock_is_on(hotlock_get_theme_option('logo_text')) ? get_bloginfo( 'name' ) : '';
$hotlock_logo_slogan = get_bloginfo( 'description', 'display' );
if (!empty($hotlock_logo_image) || !empty($hotlock_logo_text)) {
	?><a class="sc_layouts_logo" href="<?php if (is_front_page()) { echo '#'; } else { echo esc_url(home_url('/')); } ?>"><?php
		if (!empty($hotlock_logo_image)) {
			$hotlock_attr = hotlock_getimagesize($hotlock_logo_image);
            $alt = basename($hotlock_logo_image);
            $alt = substr($alt,0,strlen($alt) - 4);
			echo '<img src="'.esc_url($hotlock_logo_image).'" alt="'.esc_attr($alt).'"'.(!empty($hotlock_attr[3]) ? sprintf(' %s', $hotlock_attr[3]) : '').'>' ;
		} else {
			hotlock_show_layout(hotlock_prepare_macros($hotlock_logo_text), '<span class="logo_text">', '</span>');
			hotlock_show_layout(hotlock_prepare_macros($hotlock_logo_slogan), '<span class="logo_slogan">', '</span>');
		}
	?></a><?php
}
?>