<?php
/**
 * The template for homepage posts with "Classic" style
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

hotlock_storage_set('blog_archive', true);

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$hotlock_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$hotlock_sticky_out = is_array($hotlock_stickies) && count($hotlock_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($hotlock_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	if (!$hotlock_sticky_out) {
		if (hotlock_get_theme_option('first_post_large') && !is_paged() && !in_array(hotlock_get_theme_option('body_style'), array('fullwide', 'fullscreen'))) {
			the_post();
			get_template_part( 'content', 'excerpt' );
		}
		
		?><div class="columns_wrap posts_container"><?php
	}
	while ( have_posts() ) { the_post(); 
		if ($hotlock_sticky_out && !is_sticky()) {
			$hotlock_sticky_out = false;
			?></div><div class="columns_wrap posts_container"><?php
		}
		get_template_part( 'content', $hotlock_sticky_out && is_sticky() ? 'sticky' :'classic' );
	}
	
	?></div><?php

	hotlock_show_pagination();

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>