<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

hotlock_storage_set('blog_archive', true);

// Load scripts for both 'Gallery' and 'Portfolio' layouts!
wp_enqueue_script( 'imagesloaded' );
wp_enqueue_script( 'masonry' );
wp_enqueue_script( 'classie', hotlock_get_file_url('js/theme.gallery/classie.min.js'), array(), null, true );
wp_enqueue_script( 'hotlock-gallery-script', hotlock_get_file_url('js/theme.gallery/theme.gallery.js'), array(), null, true );

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$hotlock_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$hotlock_sticky_out = is_array($hotlock_stickies) && count($hotlock_stickies) > 0 && get_query_var( 'paged' ) < 1;
	
	// Show filters
	$hotlock_cat = hotlock_get_theme_option('parent_cat');
	$hotlock_post_type = hotlock_get_theme_option('post_type');
	$hotlock_taxonomy = hotlock_get_post_type_taxonomy($hotlock_post_type);
	$hotlock_show_filters = hotlock_get_theme_option('show_filters');
	$hotlock_tabs = array();
	if (!hotlock_is_off($hotlock_show_filters)) {
		$hotlock_args = array(
			'type'			=> $hotlock_post_type,
			'child_of'		=> $hotlock_cat,
			'orderby'		=> 'name',
			'order'			=> 'ASC',
			'hide_empty'	=> 1,
			'hierarchical'	=> 0,
			'exclude'		=> '',
			'include'		=> '',
			'number'		=> '',
			'taxonomy'		=> $hotlock_taxonomy,
			'pad_counts'	=> false
		);
		$hotlock_portfolio_list = get_terms($hotlock_args);
		if (is_array($hotlock_portfolio_list) && count($hotlock_portfolio_list) > 0) {
			$hotlock_tabs[$hotlock_cat] = esc_html__('All', 'hotlock');
			foreach ($hotlock_portfolio_list as $hotlock_term) {
				if (isset($hotlock_term->term_id)) $hotlock_tabs[$hotlock_term->term_id] = $hotlock_term->name;
			}
		}
	}
	if (count($hotlock_tabs) > 0) {
		$hotlock_portfolio_filters_ajax = true;
		$hotlock_portfolio_filters_active = $hotlock_cat;
		$hotlock_portfolio_filters_id = 'portfolio_filters';
		if (!is_customize_preview())
			wp_enqueue_script('jquery-ui-tabs', false, array('jquery', 'jquery-ui-core'), null, true);
		?>
		<div class="portfolio_filters hotlock_tabs hotlock_tabs_ajax">
			<ul class="portfolio_titles hotlock_tabs_titles">
				<?php
				foreach ($hotlock_tabs as $hotlock_id=>$hotlock_title) {
					?><li><a href="<?php echo esc_url(hotlock_get_hash_link(sprintf('#%s_%s_content', $hotlock_portfolio_filters_id, $hotlock_id))); ?>" data-tab="<?php echo esc_attr($hotlock_id); ?>"><?php echo esc_html($hotlock_title); ?></a></li><?php
				}
				?>
			</ul>
			<?php
			$hotlock_ppp = hotlock_get_theme_option('posts_per_page');
			if (hotlock_is_inherit($hotlock_ppp)) $hotlock_ppp = '';
			foreach ($hotlock_tabs as $hotlock_id=>$hotlock_title) {
				$hotlock_portfolio_need_content = $hotlock_id==$hotlock_portfolio_filters_active || !$hotlock_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr(sprintf('%s_%s_content', $hotlock_portfolio_filters_id, $hotlock_id)); ?>"
					class="portfolio_content hotlock_tabs_content"
					data-blog-template="<?php echo esc_attr(hotlock_storage_get('blog_template')); ?>"
					data-blog-style="<?php echo esc_attr(hotlock_get_theme_option('blog_style')); ?>"
					data-posts-per-page="<?php echo esc_attr($hotlock_ppp); ?>"
					data-post-type="<?php echo esc_attr($hotlock_post_type); ?>"
					data-taxonomy="<?php echo esc_attr($hotlock_taxonomy); ?>"
					data-cat="<?php echo esc_attr($hotlock_id); ?>"
					data-parent-cat="<?php echo esc_attr($hotlock_cat); ?>"
					data-need-content="<?php echo (false===$hotlock_portfolio_need_content ? 'true' : 'false'); ?>"
				>
					<?php
					if ($hotlock_portfolio_need_content) 
						hotlock_show_portfolio_posts(array(
							'cat' => $hotlock_id,
							'parent_cat' => $hotlock_cat,
							'taxonomy' => $hotlock_taxonomy,
							'post_type' => $hotlock_post_type,
							'page' => 1,
							'sticky' => $hotlock_sticky_out
							)
						);
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		hotlock_show_portfolio_posts(array(
			'cat' => $hotlock_cat,
			'parent_cat' => $hotlock_cat,
			'taxonomy' => $hotlock_taxonomy,
			'post_type' => $hotlock_post_type,
			'page' => 1,
			'sticky' => $hotlock_sticky_out
			)
		);
	}

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>