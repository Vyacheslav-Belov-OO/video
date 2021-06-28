<?php
/**
 * The style "chess" of the Services item
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.6.16
 */

$args = get_query_var('trx_addons_args_sc_services');
$number = get_query_var('trx_addons_args_item_number');
$link = get_permalink();
?>
<div class="sc_services_item<?php
	echo !isset($args['hide_excerpt']) || $args['hide_excerpt']==0 ? ' with_content' : ' without_content';
	if ($number-1 == $args['offset']) echo ' sc_services_item_active';
?>"><?php
	set_query_var('trx_addons_args_featured', array(
		'class' => 'sc_services_item_header',
		'show_no_image' => true,
		'thumb_bg' => true,
		'thumb_size' => apply_filters('trx_addons_filter_services_thumb_size', trx_addons_get_thumb_size($args['columns']==1 ? 'masonry-big' : 'masonry'), $args)
	));
	if (($fdir = trx_addons_get_file_dir('templates/tpl.featured.php')) != '') { include $fdir; }
	?><div class="sc_services_item_content">
		<div class="sc_services_item_content_inner">
			<h3 class="sc_services_item_title"><a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a></h3>
			<div class="sc_services_item_subtitle"><?php echo trim(trx_addons_get_post_terms(', ', get_the_ID(), TRX_ADDONS_CPT_SERVICES_TAXONOMY));?></div>
			<?php if (!isset($args['hide_excerpt']) || $args['hide_excerpt']==0) { ?>
				<div class="sc_services_item_text"><?php the_excerpt(); ?></div>
				<div class="sc_services_item_button sc_item_button"><a href="<?php echo esc_url($link); ?>" class="sc_button"><?php esc_html_e('Learn more', 'trx_addons'); ?></a></div>
			<?php } ?>
		</div>
	</div>
</div>
