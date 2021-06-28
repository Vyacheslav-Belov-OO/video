<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

// Page (category, tag, archive, author) title

if ( hotlock_need_page_title() ) {
	hotlock_sc_layouts_showed('title', true);
	?>
	<div class="top_panel_title sc_layouts_row scheme_dark">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title">
						<?php
						// Post meta on the single post
						if ( is_single() )  {
							?><div class="sc_layouts_title_meta"><?php
								hotlock_show_post_meta(array(
									'seo' => true,
									'share' => false,
									'counters' => ''
									)
								);
							?></div><?php
						}
						
						// Blog/Post title
						?><div class="sc_layouts_title_title"><?php
							$hotlock_blog_title = hotlock_get_blog_title();
							$hotlock_blog_title_text = $hotlock_blog_title_class = $hotlock_blog_title_link = $hotlock_blog_title_link_text = '';
							if (is_array($hotlock_blog_title)) {
								$hotlock_blog_title_text = $hotlock_blog_title['text'];
								$hotlock_blog_title_class = !empty($hotlock_blog_title['class']) ? ' '.$hotlock_blog_title['class'] : '';
								$hotlock_blog_title_link = !empty($hotlock_blog_title['link']) ? $hotlock_blog_title['link'] : '';
								$hotlock_blog_title_link_text = !empty($hotlock_blog_title['link_text']) ? $hotlock_blog_title['link_text'] : '';
							} else
								$hotlock_blog_title_text = $hotlock_blog_title;
							?>
							<h1 class="sc_layouts_title_caption<?php echo esc_attr($hotlock_blog_title_class); ?>"><?php
								$hotlock_top_icon = hotlock_get_category_icon();
								if (!empty($hotlock_top_icon)) {
									$hotlock_attr = hotlock_getimagesize($hotlock_top_icon);
                                    $alt = basename($hotlock_top_icon);
                                    $alt = substr($alt,0,strlen($alt) - 4);
									?><img src="<?php echo esc_url($hotlock_top_icon); ?>" alt="<?php echo esc_attr($alt); ?>" <?php if (!empty($hotlock_attr[3])) hotlock_show_layout($hotlock_attr[3]);?>><?php
								}
								echo wp_kses_post($hotlock_blog_title_text);
							?></h1>
							<?php
							if (!empty($hotlock_blog_title_link) && !empty($hotlock_blog_title_link_text)) {
								?><a href="<?php echo esc_url($hotlock_blog_title_link); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html($hotlock_blog_title_link_text); ?></a><?php
							}
							
							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) 
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
		
						?></div><?php
	
						// Breadcrumbs
						?><div class="sc_layouts_title_breadcrumbs"><?php
							do_action( 'hotlock_action_breadcrumbs');
						?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>