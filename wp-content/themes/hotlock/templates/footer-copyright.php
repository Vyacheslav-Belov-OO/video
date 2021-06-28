<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0.10
 */

// Copyright area
$hotlock_footer_scheme =  hotlock_is_inherit(hotlock_get_theme_option('footer_scheme')) ? hotlock_get_theme_option('color_scheme') : hotlock_get_theme_option('footer_scheme');
$hotlock_copyright_scheme = hotlock_is_inherit(hotlock_get_theme_option('copyright_scheme')) ? $hotlock_footer_scheme : hotlock_get_theme_option('copyright_scheme');
?> 
<div class="footer_copyright_wrap scheme_<?php echo esc_attr($hotlock_copyright_scheme); ?>">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text"><?php
				$hotlock_copyright = hotlock_prepare_macros(hotlock_get_theme_option('copyright'));
				if (!empty($hotlock_copyright)) {
					if (preg_match("/(\\{[\\w\\d\\\\\\-\\:]*\\})/", $hotlock_copyright, $hotlock_matches)) {
						$hotlock_copyright = str_replace($hotlock_matches[1], date(str_replace(array('{', '}'), '', $hotlock_matches[1])), $hotlock_copyright);
					}
					hotlock_show_layout(nl2br($hotlock_copyright));
				}
			?></div>
		</div>
	</div>
</div>
