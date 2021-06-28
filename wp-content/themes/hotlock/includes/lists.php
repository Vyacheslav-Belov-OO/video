<?php
/**
 * Theme lists
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }



// Return numbers range
if ( !function_exists( 'hotlock_get_list_range' ) ) {
	function hotlock_get_list_range($from=1, $to=2, $prepend_inherit=false) {
		$list = array();
		for ($i=$from; $i<=$to; $i++)
			$list[$i] = $i;
		return $prepend_inherit ? hotlock_array_merge(array('inherit' => esc_html__("Inherit", 'hotlock')), $list) : $list;
	}
}



// Return styles list
if ( !function_exists( 'hotlock_get_list_styles' ) ) {
	function hotlock_get_list_styles($from=1, $to=2, $prepend_inherit=false) {
		$list = array();
		for ($i=$from; $i<=$to; $i++)
			$list[$i] = sprintf(esc_html__('Style %d', 'hotlock'), $i);
		return $prepend_inherit ? hotlock_array_merge(array('inherit' => esc_html__("Inherit", 'hotlock')), $list) : $list;
	}
}

// Return list with 'Yes' and 'No' items
if ( !function_exists( 'hotlock_get_list_yesno' ) ) {
	function hotlock_get_list_yesno($prepend_inherit=false) {
		$list = array(
			"yes"	=> esc_html__("Yes", 'hotlock'),
			"no"	=> esc_html__("No", 'hotlock')
		);
		return $prepend_inherit ? hotlock_array_merge(array('inherit' => esc_html__("Inherit", 'hotlock')), $list) : $list;
	}
}

// Return list with 'On' and 'Of' items
if ( !function_exists( 'hotlock_get_list_onoff' ) ) {
	function hotlock_get_list_onoff($prepend_inherit=false) {
		$list = array(
			"on"	=> esc_html__("On", 'hotlock'),
			"off"	=> esc_html__("Off", 'hotlock')
		);
		return $prepend_inherit ? hotlock_array_merge(array('inherit' => esc_html__("Inherit", 'hotlock')), $list) : $list;
	}
}

// Return list with 'Show' and 'Hide' items
if ( !function_exists( 'hotlock_get_list_showhide' ) ) {
	function hotlock_get_list_showhide($prepend_inherit=false) {
		$list = array(
			"show" => esc_html__("Show", 'hotlock'),
			"hide" => esc_html__("Hide", 'hotlock')
		);
		return $prepend_inherit ? hotlock_array_merge(array('inherit' => esc_html__("Inherit", 'hotlock')), $list) : $list;
	}
}

// Return list with 'Horizontal' and 'Vertical' items
if ( !function_exists( 'hotlock_get_list_directions' ) ) {
	function hotlock_get_list_directions($prepend_inherit=false) {
		$list = array(
			"horizontal" => esc_html__("Horizontal", 'hotlock'),
			"vertical"   => esc_html__("Vertical", 'hotlock')
		);
		return $prepend_inherit ? hotlock_array_merge(array('inherit' => esc_html__("Inherit", 'hotlock')), $list) : $list;
	}
}

// Return custom sidebars list, prepended inherit and main sidebars item (if need)
if ( !function_exists( 'hotlock_get_list_sidebars' ) ) {
	function hotlock_get_list_sidebars($prepend_inherit=false) {
		if (($list = hotlock_storage_get('list_sidebars'))=='') {
			$sidebars = hotlock_get_sidebars();
			$list = array();
			if (is_array($sidebars)) {
				foreach ($sidebars as $id => $sb)
					$list[$id] = $sb['name'];
			}
			hotlock_storage_set('list_sidebars', $list);
		}
		return $prepend_inherit ? hotlock_array_merge(array('inherit' => esc_html__("Inherit", 'hotlock')), $list) : $list;
	}
}

// Return sidebars positions
if ( !function_exists( 'hotlock_get_list_sidebars_positions' ) ) {
	function hotlock_get_list_sidebars_positions($prepend_inherit=false) {
		$list = array(
			'left'  => esc_html__('Left',  'hotlock'),
			'right' => esc_html__('Right', 'hotlock')
		);
		return $prepend_inherit ? hotlock_array_merge(array('inherit' => esc_html__("Inherit", 'hotlock')), $list) : $list;
	}
}

// Return blog styles list, prepended inherit
if ( !function_exists( 'hotlock_get_list_blog_styles' ) ) {
	function hotlock_get_list_blog_styles($prepend_inherit=false) {
		$list = apply_filters('hotlock_filter_list_blog_styles', array(
			'excerpt'	=> esc_html__('Excerpt','hotlock'),
			'classic_2'	=> esc_html__('Classic /2 columns/',	'hotlock'),
			'classic_3'	=> esc_html__('Classic /3 columns/',	'hotlock'),
			'portfolio_2' => esc_html__('Portfolio /2 columns/','hotlock'),
			'portfolio_3' => esc_html__('Portfolio /3 columns/','hotlock'),
			'portfolio_4' => esc_html__('Portfolio /4 columns/','hotlock'),
			'gallery_2' => esc_html__('Gallery /2 columns/',	'hotlock'),
			'gallery_3' => esc_html__('Gallery /3 columns/',	'hotlock'),
			'gallery_4' => esc_html__('Gallery /4 columns/',	'hotlock'),
			'chess_1'	=> esc_html__('Chess /2 column/',		'hotlock'),
			'chess_2'	=> esc_html__('Chess /4 columns/',		'hotlock'),
			'chess_3'	=> esc_html__('Chess /6 columns/',		'hotlock')
			)
		);
		return $prepend_inherit ? hotlock_array_merge(array('inherit' => esc_html__("Inherit", 'hotlock')), $list) : $list;
	}
}


// Return list of categories
if ( !function_exists( 'hotlock_get_list_categories' ) ) {
	function hotlock_get_list_categories($prepend_inherit=false) {
		if (($list = hotlock_storage_get('list_categories'))=='') {
			$list = array();
			$args = array(
				'type'                     => 'post',
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 0,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => 'category',
				'pad_counts'               => false );
			$taxonomies = get_categories( $args );
			if (is_array($taxonomies) && count($taxonomies) > 0) {
				foreach ($taxonomies as $cat) {
					$list[$cat->term_id] = $cat->name;
				}
			}
			hotlock_storage_set('list_categories', $list);
		}
		return $prepend_inherit ? hotlock_array_merge(array('inherit' => esc_html__("Inherit", 'hotlock')), $list) : $list;
	}
}


// Return list of taxonomies
if ( !function_exists( 'hotlock_get_list_terms' ) ) {
	function hotlock_get_list_terms($prepend_inherit=false, $taxonomy='category') {
		if (($list = hotlock_storage_get('list_taxonomies_'.($taxonomy)))=='') {
			$list = array();
			$args = array(
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 0,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => $taxonomy,
				'pad_counts'               => false );
			$taxonomies = get_terms( $taxonomy, $args );
			if (is_array($taxonomies) && count($taxonomies) > 0) {
				foreach ($taxonomies as $cat) {
					$list[$cat->term_id] = $cat->name;
				}
			}
			hotlock_storage_set('list_taxonomies_'.($taxonomy), $list);
		}
		return $prepend_inherit ? hotlock_array_merge(array('inherit' => esc_html__("Inherit", 'hotlock')), $list) : $list;
	}
}

// Return list of post's types
if ( !function_exists( 'hotlock_get_list_posts_types' ) ) {
	function hotlock_get_list_posts_types($prepend_inherit=false) {
		if (($list = hotlock_storage_get('list_posts_types'))=='') {
			$list = apply_filters('hotlock_filter_list_posts_types', array(
				'post' => esc_html__('Post', 'hotlock')
			));
			hotlock_storage_set('list_posts_types', $list);
		}
		return $prepend_inherit ? hotlock_array_merge(array('inherit' => esc_html__("Inherit", 'hotlock')), $list) : $list;
	}
}


// Return list post items from any post type and taxonomy
if ( !function_exists( 'hotlock_get_list_posts' ) ) {
	function hotlock_get_list_posts($prepend_inherit=false, $opt=array()) {
		$opt = array_merge(array(
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
			'taxonomy'			=> 'category',
			'taxonomy_value'	=> '',
			'meta_key'			=> '',
			'meta_value'		=> '',
			'posts_per_page'	=> -1,
			'orderby'			=> 'post_date',
			'order'				=> 'desc',
			'return'			=> 'id'
			), is_array($opt) ? $opt : array('post_type'=>$opt));

		$hash = 'list_posts'
						.'_'.($opt['post_type'])
						.'_'.($opt['taxonomy'])
						.'_'.($opt['taxonomy_value'])
						.'_'.($opt['meta_key'])
						.'_'.($opt['meta_value'])
						.'_'.($opt['orderby'])
						.'_'.($opt['order'])
						.'_'.($opt['return'])
						.'_'.($opt['posts_per_page']);
		if (($list = hotlock_storage_get($hash))=='') {
			$list = array();
			$list['none'] = esc_html__("- Not selected -", 'hotlock');
			$args = array(
				'post_type' => $opt['post_type'],
				'post_status' => $opt['post_status'],
				'posts_per_page' => $opt['posts_per_page'],
				'ignore_sticky_posts' => true,
				'orderby'	=> $opt['orderby'],
				'order'		=> $opt['order']
			);
			if (!empty($opt['meta_value'])) {
				$args['meta_key'] = $opt['meta_key'];
				$args['meta_value'] = $opt['meta_value'];
			}
			if (!empty($opt['taxonomy_value'])) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => $opt['taxonomy'],
						'field' => (int) $opt['taxonomy_value'] > 0 ? 'id' : 'slug',
						'terms' => $opt['taxonomy_value']
					)
				);
			}
			$posts = get_posts( $args );
			if (is_array($posts) && count($posts) > 0) {
				foreach ($posts as $post) {
					$list[$opt['return']=='id' ? $post->ID : $post->post_title] = $post->post_title;
				}
			}
			hotlock_storage_set($hash, $list);
		}
		return $prepend_inherit ? hotlock_array_merge(array('inherit' => esc_html__("Inherit", 'hotlock')), $list) : $list;
	}
}


// Return list of registered users
if ( !function_exists( 'hotlock_get_list_users' ) ) {
	function hotlock_get_list_users($prepend_inherit=false, $roles=array('administrator', 'editor', 'author', 'contributor', 'shop_manager')) {
		if (($list = hotlock_storage_get('list_users'))=='') {
			$list = array();
			$list['none'] = esc_html__("- Not selected -", 'hotlock');
			$args = array(
				'orderby'	=> 'display_name',
				'order'		=> 'ASC' );
			$users = get_users( $args );
			if (is_array($users) && count($users) > 0) {
				foreach ($users as $user) {
					$accept = true;
					if (is_array($user->roles)) {
						if (is_array($user->roles) && count($user->roles) > 0) {
							$accept = false;
							foreach ($user->roles as $role) {
								if (in_array($role, $roles)) {
									$accept = true;
									break;
								}
							}
						}
					}
					if ($accept) $list[$user->user_login] = $user->display_name;
				}
			}
			hotlock_storage_set('list_users', $list);
		}
		return $prepend_inherit ? hotlock_array_merge(array('inherit' => esc_html__("Inherit", 'hotlock')), $list) : $list;
	}
}

// Return menus list, prepended inherit
if ( !function_exists( 'hotlock_get_list_menus' ) ) {
	function hotlock_get_list_menus($prepend_inherit=false) {
		if (($list = hotlock_storage_get('list_menus'))=='') {
			$list = array();
			$list['default'] = esc_html__("Default", 'hotlock');
			$menus = wp_get_nav_menus();
			if (is_array($menus) && count($menus) > 0) {
				foreach ($menus as $menu) {
					$list[$menu->slug] = $menu->name;
				}
			}
			hotlock_storage_set('list_menus', $list);
		}
		return $prepend_inherit ? hotlock_array_merge(array('inherit' => esc_html__("Inherit", 'hotlock')), $list) : $list;
	}
}

// Return iconed classes list
if ( !function_exists( 'hotlock_get_list_icons' ) ) {
	function hotlock_get_list_icons($prepend_inherit=false) {
		static $list = false;
		if (!is_array($list)) 
			$list = !is_admin() ? array() : hotlock_parse_icons_classes(hotlock_get_file_dir("css/fontello/css/fontello-codes.css"));
		return $prepend_inherit ? hotlock_array_merge(array('inherit' => esc_html__("Inherit", 'hotlock')), $list) : $list;
	}
}
?>