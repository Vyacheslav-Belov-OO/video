<?php
/**
 * The Sticky template to display the sticky posts
 *
 * Used for index/archive
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

$hotlock_columns = max(1, min(3, count(get_option( 'sticky_posts' ))));
$hotlock_post_format = get_post_format();
$hotlock_post_format = empty($hotlock_post_format) ? 'standard' : str_replace('post-format-', '', $hotlock_post_format);
$hotlock_animation = hotlock_get_theme_option('blog_animation');

?><div class="column-1_<?php echo esc_attr($hotlock_columns); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_sticky post_format_'.esc_attr($hotlock_post_format) ); ?>
	<?php echo (!hotlock_is_off($hotlock_animation) ? ' data-animation="'.esc_attr(hotlock_get_animation_classes($hotlock_animation)).'"' : ''); ?>
	>

	<?php
	if ( is_sticky() && is_home() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	hotlock_show_post_featured(array(
		'thumb_size' => hotlock_get_thumb_size($hotlock_columns==1 ? 'big' : ($hotlock_columns==2 ? 'med' : 'avatar'))
	));

	if ( !in_array($hotlock_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post meta
			do_action('hotlock_action_before_post_meta');			
			hotlock_show_post_meta(array(
				'categories' => true,
				'date' => false,
				'edit' => false,
				'seo' => false,
				'share' => false,
				'counters' => false,
				)
			);
			
			// Post title
			the_title( sprintf( '<h6 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );
			
			// Post meta			
			do_action('hotlock_action_before_post_meta');
			hotlock_show_post_meta(array(
				'categories' => false,
				'date' => true,
				'edit' => $hotlock_columns < 3,
				'seo' => false,
				'share' => false,
				'counters' => 'comments',
				)
			);
			?>
		</div><!-- .entry-header -->
		
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
		</div><!-- .entry-content -->
		<p><a class="more-link sc_button_hover_slide_left" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read more', 'hotlock'); ?></a></p>
		<?php
	}
	?>
</article></div>