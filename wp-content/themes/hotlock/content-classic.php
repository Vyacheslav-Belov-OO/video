<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

$hotlock_blog_style = explode('_', hotlock_get_theme_option('blog_style'));
$hotlock_columns = empty($hotlock_blog_style[1]) ? 2 : max(2, $hotlock_blog_style[1]);
$hotlock_expanded = !hotlock_sidebar_present() && hotlock_is_on(hotlock_get_theme_option('expand_content'));
$hotlock_post_format = get_post_format();
$hotlock_post_format = empty($hotlock_post_format) ? 'standard' : str_replace('post-format-', '', $hotlock_post_format);
$hotlock_animation = hotlock_get_theme_option('blog_animation');

?><div class="column-1_<?php echo esc_attr($hotlock_columns); ?>"><article id="post-<?php the_ID(); ?>"
	<?php post_class( 'post_item post_layout_classic post_layout_classic_'.esc_attr($hotlock_columns).' post_format_'.esc_attr($hotlock_post_format) ); ?>
	<?php echo (!hotlock_is_off($hotlock_animation) ? ' data-animation="'.esc_attr(hotlock_get_animation_classes($hotlock_animation)).'"' : ''); ?>
	>

	<?php

	// Featured image
	hotlock_show_post_featured( array( 'thumb_size' => hotlock_get_thumb_size(
													strpos(hotlock_get_theme_option('body_style'), 'full')!==false
														? ( $hotlock_columns > 2 ? 'big' : 'huge' )
														: (	$hotlock_columns > 2
															? ($hotlock_expanded ? 'med' : 'small')
															: ($hotlock_expanded ? 'big' : 'med')
															)
														)
										) );

	if ( !in_array($hotlock_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php
			do_action('hotlock_action_before_post_meta');
			
			// Post meta
			hotlock_show_post_meta(array(
				'categories' => true,
				'date' => false,
				'edit' => false,
				'seo' => false,
				'share' => false,
				'counters' => false,
				)
			);
			do_action('hotlock_action_before_post_title');

			// Post title
			the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );

			do_action('hotlock_action_before_post_meta');

			// Post meta
			hotlock_show_post_meta(array(
				'categories' => false,
				'date' => true,
				'edit' => $hotlock_columns < 3,
				'seo' => false,
				'share' => false,
				'comments' => true
				)
			);
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>

	<div class="post_content entry-content">
		<div class="post_content_inner">
			<?php
			$hotlock_show_learn_more = true;
			if (has_excerpt()) {
				the_excerpt();
			} else if (strpos(get_the_content('!--more'), '!--more')!==false) {
				the_content( '' );
			} else if (in_array($hotlock_post_format, array('link', 'aside', 'status', 'quote'))) {
				the_content();
			} else if (substr(get_the_content(), 0, 1)!='[') {
				the_excerpt();
			}
			?>
		</div>
		<?php
		// Post meta
		if (in_array($hotlock_post_format, array('link', 'aside', 'status', 'quote'))) {
			hotlock_show_post_meta(array(
				'share' => false,
				'counters' => 'comments'
				)
			);
		}
		// More button
		if ( $hotlock_show_learn_more ) {
			?><p><a class="more-link sc_button_hover_slide_left" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read more', 'hotlock'); ?></a></p><?php
		}
		?>
	</div><!-- .entry-content -->

</article></div>