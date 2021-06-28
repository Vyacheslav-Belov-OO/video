<?php
/**
 * The template to display blog archive
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

/*
Template Name: Blog archive
*/

/**
 * Make page with this template and put it into menu
 * to display posts as blog archive
 * You can setup output parameters (blog style, posts per page, parent category, etc.)
 * in the Theme Options section (under the page content)
 * You can build this page in the WPBakery PageBuilder to make custom page layout:
 * just insert %%CONTENT%% in the desired place of content
 */

// Get template page's content
$hotlock_content = '';
$hotlock_blog_archive_mask = '%%CONTENT%%';
$hotlock_blog_archive_subst = sprintf('<div class="blog_archive">%s</div>', $hotlock_blog_archive_mask);
if ( have_posts() ) {
	the_post(); 
	if (($hotlock_content = apply_filters('the_content', get_the_content())) != '') {
		if (($hotlock_pos = strpos($hotlock_content, $hotlock_blog_archive_mask)) !== false) {
			$hotlock_content = preg_replace('/(\<p\>\s*)?'.$hotlock_blog_archive_mask.'(\s*\<\/p\>)/i', $hotlock_blog_archive_subst, $hotlock_content);
		} else
			$hotlock_content .= $hotlock_blog_archive_subst;
		$hotlock_content = explode($hotlock_blog_archive_mask, $hotlock_content);
	}
}

// Prepare args for a new query
$hotlock_args = array(
	'post_status' => current_user_can('read_private_pages') && current_user_can('read_private_posts') ? array('publish', 'private') : 'publish'
);
$hotlock_args = hotlock_query_add_posts_and_cats($hotlock_args, '', hotlock_get_theme_option('post_type'), hotlock_get_theme_option('parent_cat'));
$hotlock_page_number = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
if ($hotlock_page_number > 1) {
	$hotlock_args['paged'] = $hotlock_page_number;
	$hotlock_args['ignore_sticky_posts'] = true;
}
$hotlock_ppp = hotlock_get_theme_option('posts_per_page');
if ((int) $hotlock_ppp != 0)
	$hotlock_args['posts_per_page'] = (int) $hotlock_ppp;
// Make a new query
query_posts( $hotlock_args );
// Set a new query as main WP Query
$GLOBALS['wp_the_query'] = $GLOBALS['wp_query'];

// Set query vars in the new query!
if (is_array($hotlock_content) && count($hotlock_content) == 2) {
	set_query_var('blog_archive_start', $hotlock_content[0]);
	set_query_var('blog_archive_end', $hotlock_content[1]);
}

get_template_part('index');
?>