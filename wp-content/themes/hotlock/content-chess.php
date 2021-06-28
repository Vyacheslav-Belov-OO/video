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
$hotlock_columns = empty($hotlock_blog_style[1]) ? 1 : max(1, $hotlock_blog_style[1]);
$hotlock_expanded = !hotlock_sidebar_present() && hotlock_is_on(hotlock_get_theme_option('expand_content'));
$hotlock_post_format = get_post_format();
$hotlock_post_format = empty($hotlock_post_format) ? 'standard' : str_replace('post-format-', '', $hotlock_post_format);
$hotlock_animation = hotlock_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_chess post_layout_chess_'.esc_attr($hotlock_columns).' post_format_'.esc_attr($hotlock_post_format) ); ?>
	<?php echo (!hotlock_is_off($hotlock_animation) ? ' data-animation="'.esc_attr(hotlock_get_animation_classes($hotlock_animation)).'"' : ''); ?>
	>

	<?php
	// Add anchor
	if ($hotlock_columns == 1 && shortcode_exists('trx_sc_anchor')) {
		echo do_shortcode('[trx_sc_anchor id="post_'.esc_attr(get_the_ID()).'" title="'.esc_attr(get_the_title()).'"]');
	}

	// Featured image
	hotlock_show_post_featured( array(
											'class' => $hotlock_columns == 1 ? 'trx-stretch-height' : '',
											'show_no_image' => true,
											'thumb_bg' => true,
											'thumb_size' => hotlock_get_thumb_size(
																	strpos(hotlock_get_theme_option('body_style'), 'full')!==false
																		? ( $hotlock_columns > 1 ? 'huge' : 'original' )
																		: (	$hotlock_columns > 2 ? 'big' : 'huge')
																	)
											) 
										);

	?><div class="post_inner"><div class="post_inner_content"><?php 

		?><div class="post_header entry-header"><?php 
			do_action('hotlock_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			
			do_action('hotlock_action_before_post_meta'); 

			// Post meta
			$hotlock_post_meta = hotlock_show_post_meta(array(
									'categories' => true,
									'date' => true,
									'edit' => $hotlock_columns == 1,
									'seo' => false,
									'share' => false,
									'counters' => $hotlock_columns < 3 ? 'comments' : '',
									'echo' => false
									)
								);
			hotlock_show_layout($hotlock_post_meta);
		?></div><!-- .entry-header -->
	
		<div class="post_content entry-content">
			<div class="post_content_inner">
				<?php
				$hotlock_show_learn_more = !in_array($hotlock_post_format, array('link', 'aside', 'status', 'quote'));
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
				hotlock_show_layout($hotlock_post_meta);
			}
			// More button
			if ( $hotlock_show_learn_more ) {
				?><p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'hotlock'); ?></a></p><?php
			}
			?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article>