<?php
/**
 * The template to display the main menu
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */
 $hotlock_header_text_text_phone_mail = hotlock_get_theme_option('header_title_text_phone_mail');
?>
<div class="top_panel_navi sc_layouts_row sc_layouts_row_type_compact sc_layouts_row_fixed
			scheme_<?php echo esc_attr(hotlock_is_inherit(hotlock_get_theme_option('menu_scheme'))
												? (hotlock_is_inherit(hotlock_get_theme_option('header_scheme'))
													? hotlock_get_theme_option('color_scheme')
													: hotlock_get_theme_option('header_scheme'))
												: hotlock_get_theme_option('menu_scheme')); ?>">
	<div class="content_wrap1">
		<div class="columns_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_left sc_layouts_column_icons_position_left column-1_4">
				<?php
				// Logo
				?><div class="sc_layouts_item"><?php
					get_template_part( 'templates/header-logo' );
				?></div>
			</div><?php

			// Attention! Don't place any spaces between columns!
			?><div class="sc_layouts_column sc_layouts_column_align_right sc_layouts_column_icons_position_left column-3_4">
				<div class="sc_layouts_item">
					<?php
					// Main menu
					$hotlock_menu_main = hotlock_get_nav_menu(array('location' => 'menu_main', 'class' => 'sc_layouts_hide_on_mobile'));
					if (empty($hotlock_menu_main)) $hotlock_menu_main = hotlock_get_nav_menu(array('class' => 'sc_layouts_hide_on_mobile'));
					hotlock_show_layout($hotlock_menu_main);
					// Mobile menu button
					?>
					<div class="sc_layouts_iconed_text sc_layouts_menu_mobile_button">
						<a class="sc_layouts_item_link sc_layouts_iconed_text_link" href="#">
							<span class="sc_layouts_item_icon sc_layouts_iconed_text_icon trx_addons_icon-menu"></span>
						</a>
					</div>
				</div><?php


				if($hotlock_header_text_text_phone_mail) { // chack if on/off custom phone
				// Attention! Don't place any spaces between layouts items!
				?><div class="sc_layouts_item sc_layouts_hide_on_mobile">
					<div id="sc_layouts_iconed_text_1932321660" class="sc_layouts_iconed_text hide_on_mobile">
						<span class="sc_layouts_item_details sc_layouts_iconed_text_details custom_phone"><span class="sc_layouts_item_details_line2 sc_layouts_iconed_text_line2">
							<?php
								hotlock_show_layout($hotlock_header_text_text_phone_mail)
							?>
						</span></span>
						<!-- /.sc_layouts_iconed_text_details -->
					</div><!-- /.sc_layouts_iconed_text -->
				</div><?php } ?><div class="sc_layouts_item search_field">
					<?php
					// Display search field
					do_action('hotlock_action_search', 'fullscreen', 'header_search', false);
					?>
				</div>
			</div>
		</div><!-- /.sc_layouts_row -->
	</div><!-- /.content_wrap -->
</div><!-- /.top_panel_navi -->
