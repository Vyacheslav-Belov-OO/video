<?php
/**
 * Default Theme Options and Internal Theme Settings
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

// -----------------------------------------------------------------
// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
// -- Internal theme settings
// -----------------------------------------------------------------
hotlock_storage_set('settings', array(

	'custom_sidebars'			=> 8,							// How many custom sidebars will be registered (in addition to theme preset sidebars): 0 - 10

	'ajax_views_counter'		=> true,						// Use AJAX for increment posts counter (if cache plugins used)
																// or increment posts counter then loading page (without cache plugin)
	'disable_jquery_ui'			=> false,						// Prevent loading custom jQuery UI libraries in the third-party plugins

	'max_load_fonts'			=> 3,							// Max fonts number to load from Google fonts or from uploaded fonts

	'use_mediaelements'			=> true,						// Load script "Media Elements" to play video and audio

	'max_excerpt_length'		=> 30,							// Max words number for the excerpt in the blog style 'Excerpt'.
																// For style 'Classic' - get half from this value
	'message_maxlength'			=> 1000							// Max length of the message from contact form

));



// -----------------------------------------------------------------
// -- Theme fonts (Google and/or custom fonts)
// -----------------------------------------------------------------

// Fonts to load when theme start
// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
// For example: font name 'TeX Gyre Termes', folder 'TeX-Gyre-Termes'
hotlock_storage_set('load_fonts', array(
	// Google font
	array(
		'name'	 => 'Roboto',
		'family' => 'sans-serif',
		'styles' => '300,300italic,400,400italic,700,700italic'		// Parameter 'style' used only for the Google fonts
		),
	// Font-face packed with theme
	array(
		'name'   => 'titillium',
		'family' => 'sans-serif'
		)
));

// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
hotlock_storage_set('load_fonts_subset', 'latin,latin-ext');

// Settings of the main tags
hotlock_storage_set('theme_fonts', array(
	'p' => array(
		'title'				=> esc_html__('Main text', 'hotlock'),
		'description'		=> esc_html__('Font settings of the main text of the site', 'hotlock'),
		'font-family'		=> 'titillium, sans-serif',
		'font-size' 		=> '1rem',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> '1.6875em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '',
		'margin-top'		=> '0em',
		'margin-bottom'		=> '1.4em'
		),
	'h1' => array(
		'title'				=> esc_html__('Heading 1', 'hotlock'),
		'font-family'		=> 'titillium, sans-serif',
		'font-size' 		=> '3.75em',
		'font-weight'		=> '100',
		'font-style'		=> 'normal',
		'line-height'		=> '1.2em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '',
		'margin-top'		=> '1em',
		'margin-bottom'		=> '1em'
		),
	'h2' => array(
		'title'				=> esc_html__('Heading 2', 'hotlock'),
		'font-family'		=> 'titillium, sans-serif',
		'font-size' 		=> '2.8125em',
		'font-weight'		=> '100',
		'font-style'		=> 'normal',
		'line-height'		=> '1.2em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '',
		'margin-top'		=> '1.35em',
		'margin-bottom'		=> '0.94em'
		),
	'h3' => array(
		'title'				=> esc_html__('Heading 3', 'hotlock'),
		'font-family'		=> 'titillium, sans-serif',
		'font-size' 		=> '2.1875em',
		'font-weight'		=> '100',
		'font-style'		=> 'normal',
		'line-height'		=> '1.2em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '',
		'margin-top'		=> '1.25em',
		'margin-bottom'		=> '1.3em'
		),
	'h4' => array(
		'title'				=> esc_html__('Heading 4', 'hotlock'),
		'font-family'		=> 'titillium, sans-serif',
		'font-size' 		=> '1.875em',
		'font-weight'		=> '300',
		'font-style'		=> 'normal',
		'line-height'		=> '1.2em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '',
		'margin-top'		=> '1.54em',
		'margin-bottom'		=> '1.53em'
		),
	'h5' => array(
		'title'				=> esc_html__('Heading 5', 'hotlock'),
		'font-family'		=> 'titillium, sans-serif',
		'font-size' 		=> '1.375em',
		'font-weight'		=> '600',
		'font-style'		=> 'normal',
		'line-height'		=> '1.090909em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0px',
		'margin-top'		=> '2.1em',
		'margin-bottom'		=> '2.3em'
		),
	'h6' => array(
		'title'				=> esc_html__('Heading 6', 'hotlock'),
		'font-family'		=> 'titillium, sans-serif',
		'font-size' 		=> '1.125em',
		'font-weight'		=> '600',
		'font-style'		=> 'normal',
		'line-height'		=> '1.125em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0px',
		'margin-top'		=> '2.7em',
		'margin-bottom'		=> '2.7em'
		),
	'logo' => array(
		'title'				=> esc_html__('Logo text', 'hotlock'),
		'description'		=> esc_html__('Font settings of the text case of the logo', 'hotlock'),
		'font-family'		=> 'Montserrat, sans-serif',
		'font-size' 		=> '1.8em',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> '1.25em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '1px'
		),
	'button' => array(
		'title'				=> esc_html__('Buttons', 'hotlock'),
		'font-family'		=> 'titillium, sans-serif',
		'font-size' 		=> '12px',
		'font-weight'		=> '600',
		'font-style'		=> 'normal',
		'line-height'		=> '1.5em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '2.5px'
		),
	'input' => array(
		'title'				=> esc_html__('Input fields', 'hotlock'),
		'description'		=> esc_html__('Font settings of the input fields, dropdowns and textareas', 'hotlock'),
		'font-family'		=> 'Roboto, sans-serif',
		'font-size' 		=> '1em',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> '1.2em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0px'
		),
	'info' => array(
		'title'				=> esc_html__('Post meta', 'hotlock'),
		'description'		=> esc_html__('Font settings of the post meta: date, counters, share, etc.', 'hotlock'),
		'font-family'		=> 'Roboto, sans-serif',
		'font-size' 		=> '13px',
		'font-weight'		=> '400',
		'font-style'		=> 'normal',
		'line-height'		=> '1.5em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0px',
		'margin-top'		=> '0.4em',
		'margin-bottom'		=> ''
		),
	'menu' => array(
		'title'				=> esc_html__('Main menu', 'hotlock'),
		'description'		=> esc_html__('Font settings of the main menu items', 'hotlock'),
		'font-family'		=> 'Montserrat, sans-serif',
		'font-size' 		=> '12px',
		'font-weight'		=> '600',
		'font-style'		=> 'normal',
		'line-height'		=> '1.5em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'uppercase',
		'letter-spacing'	=> '0px'
		),
	'submenu' => array(
		'title'				=> esc_html__('Dropdown menu', 'hotlock'),
		'description'		=> esc_html__('Font settings of the dropdown menu items', 'hotlock'),
		'font-family'		=> 'Montserrat, sans-serif',
		'font-size' 		=> '13px',
		'font-weight'		=> '300',
		'font-style'		=> 'normal',
		'line-height'		=> '1.5em',
		'text-decoration'	=> 'none',
		'text-transform'	=> 'none',
		'letter-spacing'	=> '0px'
		)
));


// -----------------------------------------------------------------
// -- Theme colors for customizer
// -- Attention! Inner scheme must be last in the array below
// -----------------------------------------------------------------
hotlock_storage_set('schemes', array(

	// Color scheme: 'default'
	'default' => array(
		'title'	 => esc_html__('Default', 'hotlock'),
		'colors' => array(

			// Whole block border and background
			'bg_color'				=> '#ffffff',
			'bd_color'				=> '#e5e5e5',

			// Text and links colors
			'text'					=> '#4c4b51',
			'text_light'			=> '#908f94',
			'text_dark'				=> '#292734',
			'text_link'				=> '#ffc600',
			'text_hover'			=> '#292734',

			// Alternative blocks (submenu, buttons, tabs, etc.)
			'alter_bg_color'		=> '#fafafa', // sidebar bg?
			'alter_bg_hover'		=> '#e6e8eb',
			'alter_bd_color'		=> '#f2f2f2', //table bd
			'alter_bd_hover'		=> '#dadada',
			'alter_text'			=> '#1d1d1d', //blockqoute text-color
			'alter_light'			=> '#b7b7b7',
			'alter_dark'			=> '#383642', // tag
			'alter_link'			=> '#ffffff', //blockqoute link-color
			'alter_hover'			=> '#72cfd5',

			// Input fields (form's fields and textarea)
			'input_bg_color'		=> '#f3f3f4',
			'input_bg_hover'		=> 'rgba(221,225,229,0.3)',
			'input_bd_color'		=> 'rgba(221,225,229,0.3)',
			'input_bd_hover'		=> '#e5e5e5',
			'input_text'			=> '#4c4b51',
			'input_light'			=> '#908f94',
			'input_dark'			=> '#292734',

			// Inverse blocks (text and links on accented bg)
			'inverse_text'			=> '#fefefe', //table bg
			'inverse_light'			=> '#fcfcfc', // table bg2
			'inverse_dark'			=> '#000000',
			'inverse_link'			=> '#ffffff',
			'inverse_hover'			=> '#1d1d1d',

		)
	),

	// Color scheme: 'dark'
	'dark' => array(
		'title'  => esc_html__('Dark', 'hotlock'),
		'colors' => array(

			// Whole block border and background
			'bg_color'				=> '#201e28',
			'bd_color'				=> '#3f3d49',

			// Text and links colors
			'text'					=> '#908f94',
			'text_light'			=> '#4c4b51',
			'text_dark'				=> '#ffffff',
			'text_link'				=> '#ffc600',
			'text_hover'			=> '#ffffff',

			// Alternative blocks (submenu, buttons, tabs, etc.)
			'alter_bg_color'		=> '#292734',
			'alter_bg_hover'		=> '#28272e',
			'alter_bd_color'		=> '#313131',
			'alter_bd_hover'		=> '#3d3d3d',
			'alter_text'			=> '#a6a6a6',
			'alter_light'			=> '#5f5f5f',
			'alter_dark'			=> '#ffffff',
			'alter_link'			=> '#ffc600',
			'alter_hover'			=> '#ffc600',

			// Input fields (form's fields and textarea)
			'input_bg_color'		=> 'rgba(62,61,66,0.5)',
			'input_bg_hover'		=> 'rgba(62,61,66,0.5)',
			'input_bd_color'		=> 'rgba(62,61,66,0.5)',
			'input_bd_hover'		=> '#353535',
			'input_text'			=> '#b7b7b7',
			'input_light'			=> '#5f5f5f',
			'input_dark'			=> '#ffffff',

			// Inverse blocks (text and links on accented bg)
			'inverse_text'			=> '#1d1d1d',
			'inverse_light'			=> '#5f5f5f',
			'inverse_dark'			=> '#000000',
			'inverse_link'			=> '#ffffff',
			'inverse_hover'			=> '#1d1d1d',

		)
	)

));



// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if (!function_exists('hotlock_options_create')) {

	function hotlock_options_create() {

		hotlock_storage_set('options', array(

			// Section 'Title & Tagline' - add theme options in the standard WP section
			'title_tagline' => array(
				"title" => esc_html__('Title, Tagline & Site icon', 'hotlock'),
				"desc" => wp_kses_data( __('Specify site title and tagline (if need) and upload the site icon', 'hotlock') ),
				"type" => "section"
				),


			// Section 'Header' - add theme options in the standard WP section
			'header_image' => array(
				"title" => esc_html__('Header', 'hotlock'),
				"desc" => wp_kses_data( __('Select or upload logo images, select header type and widgets set for the header', 'hotlock') ),
				"type" => "section"
				),
			'header_fullheight' => array(
				"title" => esc_html__('Header fullheight', 'hotlock'),
				"desc" => wp_kses_data( __("Enlarge header area to fill whole screen. Used only if header have a background image", 'hotlock') ),
				"std" => 0,
				"type" => "hidden" //checkbox
				),
			'header_wide' => array(
				"title" => esc_html__('Header fullwide', 'hotlock'),
				"desc" => wp_kses_data( __('Do you want to stretch the header widgets area to the entire window width?', 'hotlock') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'hotlock')
				),
				"std" => 1,
				"type" => "checkbox" //checkbox
				),
			'header_style' => array(
				"title" => esc_html__('Header style', 'hotlock'),
				"desc" => wp_kses_data( __('Select style to display the site header', 'hotlock') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'hotlock')
				),
				"std" => 'header-default',
				"options" => apply_filters('hotlock_filter_list_header_styles', array(
					'header-default' => esc_html__('Default Header',	'hotlock')
				)),
				"type" => "select"
				),
			'header_position' => array(
				"title" => esc_html__('Header position', 'hotlock'),
				"desc" => wp_kses_data( __('Select position to display the site header', 'hotlock') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'hotlock')
				),
				"std" => 'default',
				"options" => array(
					'default' => esc_html__('Default','hotlock'),
					'over' => esc_html__('Over',	'hotlock'),
				),
				"type" => "select"
				),
			'header_scheme' => array(
				"title" => esc_html__('Header Color Scheme', 'hotlock'),
				"desc" => wp_kses_data( __('Select color scheme to decorate header area', 'hotlock') ),
				"std" => 'default',
				"options" => hotlock_get_list_schemes(true),
				"refresh" => false,
				"type" => "hidden" //select
				),
			'header_image_override' => array(
				'title'    => esc_html__( 'Header image override', 'hotlock' ),
				'desc'     => wp_kses_data( __( "Allow override the header image with the page's/post's/product's/etc. featured image", 'hotlock' ) ),
				'override' => array(
					'mode'    => 'page',
					'section' => esc_html__( 'Header', 'hotlock' ),
				),
				'std'  => 0,
				"type" => "checkbox"
				),
			'menu_info' => array(
				"title" => esc_html__('Menu settings', 'hotlock'),
				"desc" => wp_kses_data( __('Select main menu style, position, color scheme and other parameters', 'hotlock') ),
				"type" => "hidden" //info
				),
			'menu_style' => array(
				"title" => esc_html__('Menu position', 'hotlock'),
				"desc" => wp_kses_data( __('Select position of the main menu', 'hotlock') ),
				"std" => 'top',
				"options" => array(
					'top'	=> esc_html__('Top',	'hotlock'),
					'left'	=> esc_html__('Left',	'hotlock'),
					'right'	=> esc_html__('Right',	'hotlock')
				),
				"type" => "hidden" //switch
				),
			'menu_scheme' => array(
				"title" => esc_html__('Menu Color Scheme', 'hotlock'),
				"desc" => wp_kses_data( __('Select color scheme to decorate main menu area', 'hotlock') ),
				"std" => 'inherit',
				"options" => hotlock_get_list_schemes(true),
				"refresh" => false,
				"type" => "hidden"
				),
			'menu_side_stretch' => array(
				"title" => esc_html__('Stretch sidemenu', 'hotlock'),
				"desc" => wp_kses_data( __('Stretch sidemenu to window height (if menu items number >= 5)', 'hotlock') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'menu_side_icons' => array(
				"title" => esc_html__('Iconed sidemenu', 'hotlock'),
				"desc" => wp_kses_data( __('Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'hotlock') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'menu_mobile_fullscreen' => array(
				"title" => esc_html__('Mobile menu fullscreen', 'hotlock'),
				"desc" => wp_kses_data( __('Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'hotlock') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'logo_info' => array(
				"title" => esc_html__('Logo settings', 'hotlock'),
				"desc" => wp_kses_data( __('Select logo images for the normal and Retina displays', 'hotlock') ),
				"type" => "info"
				),
			'logo' => array(
				"title" => esc_html__('Logo', 'hotlock'),
				"desc" => wp_kses_data( __('Select or upload site logo', 'hotlock') ),
				"std" => '',
				"type" => "image"
				),
			'logo_retina' => array(
				"title" => esc_html__('Logo for Retina', 'hotlock'),
				"desc" => wp_kses_data( __('Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'hotlock') ),
				"std" => '',
				"type" => "image"
				),
			'logo_inverse' => array(
				"title" => esc_html__('Logo inverse', 'hotlock'),
				"desc" => wp_kses_data( __('Select or upload site logo to display it on the dark background', 'hotlock') ),
				"std" => '',
				"type" => "image"
				),
			'logo_inverse_retina' => array(
				"title" => esc_html__('Logo inverse for Retina', 'hotlock'),
				"desc" => wp_kses_data( __('Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'hotlock') ),
				"std" => '',
				"type" => "image"
				),
			'logo_side' => array(
				"title" => esc_html__('Logo side', 'hotlock'),
				"desc" => wp_kses_data( __('Select or upload site logo (with vertical orientation) to display it in the side menu', 'hotlock') ),
				"std" => '',
				"type" => "image"
				),
			'logo_side_retina' => array(
				"title" => esc_html__('Logo side for Retina', 'hotlock'),
				"desc" => wp_kses_data( __('Select or upload site logo (with vertical orientation) to display it in the side menu on Retina displays (if empty - use default logo from the field above)', 'hotlock') ),
				"std" => '',
				"type" => "image"
				),
			'logo_text' => array(
				"title" => esc_html__('Logo from Site name', 'hotlock'),
				"desc" => wp_kses_data( __('Do you want use Site name and description as Logo if images above are not selected?', 'hotlock') ),
				"std" => 1,
				"type" => "checkbox"
				),
			'header_title_text_phone_mail' => array(
        		"title" => esc_html__('Phone and mail on header', 'hotlock'),
        		"desc" => wp_kses_data( __('Put here text to insert into the Header(Attention only for style "Default Header") Use "|" to split this string on two parts', 'hotlock') ),
        		"std" => '',
        		"type" => "text"
	     	 ),


			// Section 'Content'
			'content' => array(
				"title" => esc_html__('Content', 'hotlock'),
				"desc" => wp_kses_data( __('Options for the content area', 'hotlock') ),
				"type" => "section",
				),
			'body_style' => array(
				"title" => esc_html__('Body style', 'hotlock'),
				"desc" => wp_kses_data( __('Select width of the body content', 'hotlock') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hotlock')
				),
				"refresh" => false,
				"std" => 'wide',
				"options" => array(
					'boxed'		=> esc_html__('Boxed',		'hotlock'),
					'wide'		=> esc_html__('Wide',		'hotlock'),
					'fullwide'	=> esc_html__('Fullwide',	'hotlock'),
					'fullscreen'=> esc_html__('Fullscreen',	'hotlock')
				),
				"type" => "select"
				),
			'color_scheme' => array(
				"title" => esc_html__('Site Color Scheme', 'hotlock'),
				"desc" => wp_kses_data( __('Select color scheme to decorate whole site. Attention! Case "Inherit" can be used only for custom pages, not for root site content in the Appearance - Customize', 'hotlock') ),
				"std" => 'default',
				"options" => hotlock_get_list_schemes(true),
				"refresh" => false,
				"type" => "hidden" //select
				),
			'expand_content' => array(
				"title" => esc_html__('Expand content', 'hotlock'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'hotlock') ),
				"refresh" => false,
				"std" => 1,
				"type" => "hidden" //checkbox
				),
			'remove_margins' => array(
				"title" => esc_html__('Remove margins', 'hotlock'),
				"desc" => wp_kses_data( __('Remove margins above and below the content area', 'hotlock') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'hotlock')
				),
				"refresh" => false,
				"std" => 0,
				"type" => "checkbox" //checkbox
				),
			'seo_snippets' => array(
				"title" => esc_html__('SEO snippets', 'hotlock'),
				"desc" => wp_kses_data( __('Add structured data markup to the single posts and pages', 'hotlock') ),
				"std" => 0,
				"type" => "checkbox"
				),
            'privacy_text' => array(
                "title" => esc_html__("Text with Privacy Policy link", 'hotlock'),
                "desc"  => wp_kses_data( __("Specify text with Privacy Policy link for the checkbox 'I agree ...'", 'hotlock') ),
                "std"   => wp_kses( __( 'I agree that my submitted data is being collected and stored.', 'hotlock'), 'hotlock_kses_content' ),
                "type"  => "text"
            ),
			'boxed_bg_image' => array(
				"title" => esc_html__('Boxed bg image', 'hotlock'),
				"desc" => wp_kses_data( __('Select or upload image, used as background in the boxed body', 'hotlock') ),
				"dependency" => array(
					'body_style' => array('boxed')
				),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hotlock')
				),
				"std" => '',
				"type" => "image"
				),
			'no_image' => array(
				"title" => esc_html__('No image placeholder', 'hotlock'),
				"desc" => wp_kses_data( __('Select or upload image, used as placeholder for the posts without featured image', 'hotlock') ),
				"std" => '',
				"type" => "image"
				),
			'sidebar_widgets' => array(
				"title" => esc_html__('Sidebar widgets', 'hotlock'),
				"desc" => wp_kses_data( __('Select default widgets to show in the sidebar', 'hotlock') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'hotlock')
				),
				"std" => 'sidebar_widgets',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hotlock')), hotlock_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_scheme' => array(
				"title" => esc_html__('Color Scheme', 'hotlock'),
				"desc" => wp_kses_data( __('Select color scheme to decorate sidebar', 'hotlock') ),
				"std" => 'dark',
				"options" => hotlock_get_list_schemes(true),
				"refresh" => false,
				"type" => "hidden"  // select
				),
			'sidebar_position' => array(
				"title" => esc_html__('Sidebar position', 'hotlock'),
				"desc" => wp_kses_data( __('Select position to show sidebar', 'hotlock') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'hotlock')
				),
				"refresh" => false,
				"std" => 'right',
				"options" => hotlock_get_list_sidebars_positions(),
				"type" => "select"
				),


			// Section 'Footer'
			'footer' => array(
				"title" => esc_html__('Footer', 'hotlock'),
				"desc" => wp_kses_data( __('Select set of widgets and columns number for the site footer', 'hotlock') ),
				"type" => "section"
				),
			'footer_style' => array(
				"title" => esc_html__('Footer style', 'hotlock'),
				"desc" => wp_kses_data( __('Select style to display the site footer', 'hotlock') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Footer', 'hotlock')
				),
				"std" => 'footer-default',
				"options" => apply_filters('hotlock_filter_list_footer_styles', array(
					'footer-default' => esc_html__('Default Footer',	'hotlock')
				)),
				"type" => "select"
				),
			'footer_scheme' => array(
				"title" => esc_html__('Footer Color Scheme', 'hotlock'),
				"desc" => wp_kses_data( __('Select color scheme to decorate footer area', 'hotlock') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'hotlock')
				),
				"std" => 'dark',
				"options" => hotlock_get_list_schemes(true),
				"refresh" => false,
				"type" => "select" //select
				),
			'footer_widgets' => array(
				"title" => esc_html__('Footer widgets', 'hotlock'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'hotlock') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'hotlock')
				),
				"std" => 'footer_widgets',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hotlock')), hotlock_get_list_sidebars()),
				"type" => "select"
				),
			'footer_columns' => array(
				"title" => esc_html__('Footer columns', 'hotlock'),
				"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'hotlock') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'hotlock')
				),
				"dependency" => array(
					'footer_widgets' => array('^hide')
				),
				"std" => 4,
				"options" => hotlock_get_list_range(0,6),
				"type" => "select"
				),
			'footer_wide' => array(
				"title" => esc_html__('Footer fullwide', 'hotlock'),
				"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'hotlock') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'hotlock')
				),
				"std" => 0,
				"type" => "checkbox" //checkbox
				),
			'logo_in_footer' => array(
				"title" => esc_html__('Show logo', 'hotlock'),
				"desc" => wp_kses_data( __('Show logo in the footer', 'hotlock') ),
				'refresh' => false,
				"std" => 0,
				"type" => "hidden" //checkbox
				),
			'logo_footer' => array(
				"title" => esc_html__('Logo for footer', 'hotlock'),
				"desc" => wp_kses_data( __('Select or upload site logo to display it in the footer', 'hotlock') ),
				"dependency" => array(
					'logo_in_footer' => array('1')
				),
				"std" => '',
				"type" => "image"
				),
			'logo_footer_retina' => array(
				"title" => esc_html__('Logo for footer (Retina)', 'hotlock'),
				"desc" => wp_kses_data( __('Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'hotlock') ),
				"dependency" => array(
					'logo_in_footer' => array('1')
				),
				"std" => '',
				"type" => "image"
				),
			'socials_in_footer' => array(
				"title" => esc_html__('Show social icons', 'hotlock'),
				"desc" => wp_kses_data( __('Show social icons in the footer (under logo or footer widgets)', 'hotlock') ),
				"std" => 0,
				"type" => "hidden" //checkbox
				),
			'copyright' => array(
				"title" => esc_html__('Copyright', 'hotlock'),
				"desc" => wp_kses_data( __('Copyright text in the footer', 'hotlock') ),
				"std" => esc_html__('AxiomThemes &copy; {Y}. All rights reserved.', 'hotlock'),
				"refresh" => false,
				"type" => "textarea"
				),



			// Section 'Homepage' - settings for home page
			'homepage' => array(
				"title" => esc_html__('Homepage', 'hotlock'),
				"desc" => wp_kses_data( __('Select blog style and widgets to display on the homepage', 'hotlock') ),
				"type" => "section"
				),
			'expand_content_home' => array(
				"title" => esc_html__('Expand content', 'hotlock'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden on the Homepage', 'hotlock') ),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'blog_style_home' => array(
				"title" => esc_html__('Blog style', 'hotlock'),
				"desc" => wp_kses_data( __('Select posts style for the homepage', 'hotlock') ),
				"std" => 'excerpt',
				"options" => hotlock_get_list_blog_styles(),
				"type" => "select"
				),
			'sidebar_widgets_home' => array(
				"title" => esc_html__('Sidebar widgets', 'hotlock'),
				"desc" => wp_kses_data( __('Select sidebar to show on the homepage', 'hotlock') ),
				"std" => 'sidebar_widgets',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hotlock')), hotlock_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_position_home' => array(
				"title" => esc_html__('Sidebar position', 'hotlock'),
				"desc" => wp_kses_data( __('Select position to show sidebar on the homepage', 'hotlock') ),
				"refresh" => false,
				"std" => 'right',
				"options" => hotlock_get_list_sidebars_positions(),
				"type" => "select"
				),


			// Section 'Blog archive'
			'blog' => array(
				"title" => esc_html__('Blog archive', 'hotlock'),
				"desc" => wp_kses_data( __('Options for the blog archive', 'hotlock') ),
				"type" => "section",
				),
			'expand_content_blog' => array(
				"title" => esc_html__('Expand content', 'hotlock'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden on the blog archive', 'hotlock') ),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'blog_style' => array(
				"title" => esc_html__('Blog style', 'hotlock'),
				"desc" => wp_kses_data( __('Select posts style for the blog archive', 'hotlock') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hotlock')
				),
				"dependency" => array(
					'#page_template' => array( 'blog.php' ),
					'.editor-page-attributes__template select' => array( 'blog.php' ),
				),
				"std" => 'excerpt',
				"options" => hotlock_get_list_blog_styles(),
				"type" => "select"
				),
			'blog_columns' => array(
				"title" => esc_html__('Blog columns', 'hotlock'),
				"desc" => wp_kses_data( __('How many columns should be used in the blog archive (from 2 to 4)?', 'hotlock') ),
				"std" => 2,
				"options" => hotlock_get_list_range(2,4),
				"type" => "hidden"
				),
			'post_type' => array(
				"title" => esc_html__('Post type', 'hotlock'),
				"desc" => wp_kses_data( __('Select post type to show in the blog archive', 'hotlock') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hotlock')
				),
				"dependency" => array(
					'#page_template' => array( 'blog.php' ),
					'.editor-page-attributes__template select' => array( 'blog.php' )
				),
				"linked" => 'parent_cat',
				"refresh" => false,
				"hidden" => true,
				"std" => 'post',
				"options" => hotlock_get_list_posts_types(),
				"type" => "select"
				),
			'parent_cat' => array(
				"title" => esc_html__('Category to show', 'hotlock'),
				"desc" => wp_kses_data( __('Select category to show in the blog archive', 'hotlock') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hotlock')
				),
				"dependency" => array(
					'#page_template' => array( 'blog.php' ),
					'.editor-page-attributes__template select' => array( 'blog.php' )
				),
				"refresh" => false,
				"hidden" => true,
				"std" => '0',
				"options" => hotlock_array_merge(array(0 => esc_html__('- Select category -', 'hotlock')), hotlock_get_list_categories()),
				"type" => "select"
				),
			'posts_per_page' => array(
				"title" => esc_html__('Posts per page', 'hotlock'),
				"desc" => wp_kses_data( __('How many posts will be displayed on this page', 'hotlock') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hotlock')
				),
				"dependency" => array(
					'#page_template' => array( 'blog.php' ),
					'.editor-page-attributes__template select' => array( 'blog.php' )
				),
				"hidden" => true,
				"std" => '10',
				"type" => "text"
				),
			"blog_pagination" => array(
				"title" => esc_html__('Pagination style', 'hotlock'),
				"desc" => wp_kses_data( __('Show Older/Newest posts or Page numbers below the posts list', 'hotlock') ),
				"std" => "pages",
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hotlock')
				),
				"dependency" => array(
					'#page_template' => array( 'blog.php' ),
					'.editor-page-attributes__template select' => array( 'blog.php' )
				),
				"options" => array(
					'pages'	=> esc_html__("Page numbers", 'hotlock'),
					'links'	=> esc_html__("Older/Newest", 'hotlock'),
					'more'	=> esc_html__("Load more", 'hotlock')
				),
				"type" => "select"
				),
			'show_filters' => array(
				"title" => esc_html__('Show filters', 'hotlock'),
				"desc" => wp_kses_data( __('Show categories as tabs to filter posts', 'hotlock') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hotlock')
				),
				"dependency" => array(
					'#page_template' => array( 'blog.php' ),
					'.editor-page-attributes__template select' => array( 'blog.php' ),
					'blog_style' => array('portfolio', 'gallery')
				),
				"hidden" => true,
				"std" => 0,
				"type" => "checkbox"
				),
			'first_post_large' => array(
				"title" => esc_html__('First post large', 'hotlock'),
				"desc" => wp_kses_data( __('Make first post large (with Excerpt layout) on the Classic layout of blog archive', 'hotlock') ),
				"dependency" => array(
					'blog_style' => array('classic')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			"blog_content" => array(
				"title" => esc_html__('Posts content', 'hotlock'),
				"desc" => wp_kses_data( __("Show full post's content in the blog or only post's excerpt", 'hotlock') ),
				"std" => "excerpt",
				"options" => array(
					'excerpt'	=> esc_html__('Excerpt',	'hotlock'),
					'fullpost'	=> esc_html__('Full post',	'hotlock')
				),
				"type" => "select"
				),
			'time_diff_before' => array(
				"title" => esc_html__('Time difference', 'hotlock'),
				"desc" => wp_kses_data( __("How many days show time difference instead post's date", 'hotlock') ),
				"std" => 5,
				"type" => "text"
				),
			'related_posts' => array(
				"title" => esc_html__('Related posts', 'hotlock'),
				"desc" => wp_kses_data( __('How many related posts should be displayed in the single post?', 'hotlock') ),
				"std" => 2,
				"options" => hotlock_get_list_range(2,4),
				"type" => "select"
				),
			'related_style' => array(
				"title" => esc_html__('Related posts style', 'hotlock'),
				"desc" => wp_kses_data( __('Select style of the related posts output', 'hotlock') ),
				"std" => 2,
				"options" => hotlock_get_list_styles(1,2),
				"type" => "select"
				),
			"blog_animation" => array(
				"title" => esc_html__('Animation for the posts', 'hotlock'),
				"desc" => wp_kses_data( __('Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'hotlock') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'hotlock')
				),
				"dependency" => array(
					'#page_template' => array( 'blog.php' ),
					'.editor-page-attributes__template select' => array( 'blog.php' )
				),
				"std" => "none",
				"options" => hotlock_get_list_animations_in(),
				"type" => "select"
				),
			'sidebar_widgets_blog' => array(
				"title" => esc_html__('Sidebar widgets', 'hotlock'),
				"desc" => wp_kses_data( __('Select sidebar to show on the blog archive', 'hotlock') ),
				"std" => 'sidebar_widgets',
				"options" => array_merge(array('hide'=>esc_html__('- Select widgets -', 'hotlock')), hotlock_get_list_sidebars()),
				"type" => "select"
				),
			'sidebar_position_blog' => array(
				"title" => esc_html__('Sidebar position', 'hotlock'),
				"desc" => wp_kses_data( __('Select position to show sidebar on the blog archive', 'hotlock') ),
				"refresh" => false,
				"std" => 'right',
				"options" => hotlock_get_list_sidebars_positions(),
				"type" => "select"
				),


			// Section 'Colors' - choose color scheme and customize separate colors from it
			'scheme' => array(
				"title" => esc_html__('* Color scheme editor', 'hotlock'),
				"desc" => wp_kses_data( __("<b>Simple settings</b> - you can change only accented color, used for links, buttons and some accented areas.", 'hotlock') )
						. '<br>'
						. wp_kses_data( __("<b>Advanced settings</b> - change all scheme's colors and get full control over the appearance of your site!", 'hotlock') ),
				"priority" => 1000,
				"type" => "section"
				),

			'color_settings' => array(
				"title" => esc_html__('Color settings', 'hotlock'),
				"desc" => '',
				"std" => 'simple',
				"options" => array(
					"simple"  => esc_html__("Simple", 'hotlock'),
					"advanced" => esc_html__("Advanced", 'hotlock')
				),
				"refresh" => false,
				"type" => "switch"
				),

			'color_scheme_editor' => array(
				"title" => esc_html__('Color Scheme', 'hotlock'),
				"desc" => wp_kses_data( __('Select color scheme to edit colors', 'hotlock') ),
				"std" => 'default',
				"options" => hotlock_get_list_schemes(),
				"refresh" => false,
				"type" => "select"
				),

			'scheme_storage' => array(
				"title" => esc_html__('Colors storage', 'hotlock'),
				"desc" => esc_html__('Hidden storage of the all color from the all color shemes (only for internal usage)', 'hotlock'),
				"std" => '',
				"refresh" => false,
				"type" => "hidden"
				),

			'scheme_info_single' => array(
				"title" => esc_html__('Colors for single post/page', 'hotlock'),
				"desc" => wp_kses_data( __('Specify colors for single post/page (not for alter blocks)', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),

			'bg_color' => array(
				"title" => esc_html__('Background color', 'hotlock'),
				"desc" => wp_kses_data( __('Background color of the whole page', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'bd_color' => array(
				"title" => esc_html__('Border color', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the bordered elements, separators, etc.', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),

			'text' => array(
				"title" => esc_html__('Text', 'hotlock'),
				"desc" => wp_kses_data( __('Plain text color on single page/post', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_light' => array(
				"title" => esc_html__('Light text', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the post meta: post date and author, comments number, etc.', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_dark' => array(
				"title" => esc_html__('Dark text', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the headers, strong text, etc.', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_link' => array(
				"title" => esc_html__('Links', 'hotlock'),
				"desc" => wp_kses_data( __('Color of links and accented areas', 'hotlock') ),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'text_hover' => array(
				"title" => esc_html__('Links hover', 'hotlock'),
				"desc" => wp_kses_data( __('Hover color for links and accented areas', 'hotlock') ),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),

			'scheme_info_alter' => array(
				"title" => esc_html__('Colors for alternative blocks', 'hotlock'),
				"desc" => wp_kses_data( __('Specify colors for alternative blocks - rectangular blocks with its own background color (posts in homepage, blog archive, search results, widgets on sidebar, footer, etc.)', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),

			'alter_bg_color' => array(
				"title" => esc_html__('Alter background color', 'hotlock'),
				"desc" => wp_kses_data( __('Background color of the alternative blocks', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bg_hover' => array(
				"title" => esc_html__('Alter hovered background color', 'hotlock'),
				"desc" => wp_kses_data( __('Background color for the hovered state of the alternative blocks', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bd_color' => array(
				"title" => esc_html__('Alternative border color', 'hotlock'),
				"desc" => wp_kses_data( __('Border color of the alternative blocks', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_bd_hover' => array(
				"title" => esc_html__('Alternative hovered border color', 'hotlock'),
				"desc" => wp_kses_data( __('Border color for the hovered state of the alter blocks', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_text' => array(
				"title" => esc_html__('Alter text', 'hotlock'),
				"desc" => wp_kses_data( __('Text color of the alternative blocks', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_light' => array(
				"title" => esc_html__('Alter light', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the info blocks inside block with alternative background', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_dark' => array(
				"title" => esc_html__('Alter dark', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the headers inside block with alternative background', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_link' => array(
				"title" => esc_html__('Alter link', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the links inside block with alternative background', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'alter_hover' => array(
				"title" => esc_html__('Alter hover', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the hovered links inside block with alternative background', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),

			'scheme_info_input' => array(
				"title" => esc_html__('Colors for the form fields', 'hotlock'),
				"desc" => wp_kses_data( __('Specify colors for the form fields and textareas', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),

			'input_bg_color' => array(
				"title" => esc_html__('Inactive background', 'hotlock'),
				"desc" => wp_kses_data( __('Background color of the inactive form fields', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bg_hover' => array(
				"title" => esc_html__('Active background', 'hotlock'),
				"desc" => wp_kses_data( __('Background color of the focused form fields', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bd_color' => array(
				"title" => esc_html__('Inactive border', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the border in the inactive form fields', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_bd_hover' => array(
				"title" => esc_html__('Active border', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the border in the focused form fields', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_text' => array(
				"title" => esc_html__('Inactive field', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the text in the inactive fields', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_light' => array(
				"title" => esc_html__('Disabled field', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the disabled field', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'input_dark' => array(
				"title" => esc_html__('Active field', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the active field', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),

			'scheme_info_inverse' => array(
				"title" => esc_html__('Colors for inverse blocks', 'hotlock'),
				"desc" => wp_kses_data( __('Specify colors for inverse blocks, rectangular blocks with background color equal to the links color or one of accented colors (if used in the current theme)', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"type" => "info"
				),

			'inverse_text' => array(
				"title" => esc_html__('Inverse text', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the text inside block with accented background', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_light' => array(
				"title" => esc_html__('Inverse light', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the info blocks inside block with accented background', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_dark' => array(
				"title" => esc_html__('Inverse dark', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the headers inside block with accented background', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_link' => array(
				"title" => esc_html__('Inverse link', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the links inside block with accented background', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),
			'inverse_hover' => array(
				"title" => esc_html__('Inverse hover', 'hotlock'),
				"desc" => wp_kses_data( __('Color of the hovered links inside block with accented background', 'hotlock') ),
				"dependency" => array(
					'color_settings' => array('^simple')
				),
				"std" => '$hotlock_get_scheme_color',
				"refresh" => false,
				"type" => "color"
				),


			// Section 'Hidden'
			'media_title' => array(
				"title" => esc_html__('Media title', 'hotlock'),
				"desc" => wp_kses_data( __('Used as title for the audio and video item in this post', 'hotlock') ),
				"override" => array(
					'mode' => 'post',
					'section' => esc_html__('Title', 'hotlock')
				),
				"hidden" => true,
				"std" => '',
				"type" => "text"
				),
			'media_author' => array(
				"title" => esc_html__('Media author', 'hotlock'),
				"desc" => wp_kses_data( __('Used as author name for the audio and video item in this post', 'hotlock') ),
				"override" => array(
					'mode' => 'post',
					'section' => esc_html__('Title', 'hotlock')
				),
				"hidden" => true,
				"std" => '',
				"type" => "text"
				),


			// Internal options.
			// Attention! Don't change any options in the section below!
			'reset_options' => array(
				"title" => '',
				"desc" => '',
				"std" => '0',
				"type" => "hidden",
				),

		));


		// Prepare panel 'Fonts'
		$fonts = array(

			// Panel 'Fonts' - manage fonts loading and set parameters of the base theme elements
			'fonts' => array(
				"title" => esc_html__('* Fonts settings', 'hotlock'),
				"desc" => '',
				"priority" => 1500,
				"type" => "panel"
				),

			// Section 'Load_fonts'
			'load_fonts' => array(
				"title" => esc_html__('Load fonts', 'hotlock'),
				"desc" => wp_kses_data( __('Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'hotlock') )
						. '<br>'
						. wp_kses_data( __('<b>Attention!</b> Press "Refresh" button to reload preview area after the all fonts are changed', 'hotlock') ),
				"type" => "section"
				),
			'load_fonts_subset' => array(
				"title" => esc_html__('Google fonts subsets', 'hotlock'),
				"desc" => wp_kses_data( __('Specify comma separated list of the subsets which will be load from Google fonts', 'hotlock') )
						. '<br>'
						. wp_kses_data( __('Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'hotlock') ),
				"refresh" => false,
				"std" => '$hotlock_get_load_fonts_subset',
				"type" => "text"
				)
		);

		for ($i=1; $i<=hotlock_get_theme_setting('max_load_fonts'); $i++) {
			$fonts["load_fonts-{$i}-info"] = array(
				"title" => esc_html(sprintf(__('Font %s', 'hotlock'), $i)),
				"desc" => '',
				"type" => "info",
				);
			$fonts["load_fonts-{$i}-name"] = array(
				"title" => esc_html__('Font name', 'hotlock'),
				"desc" => '',
				"refresh" => false,
				"std" => '$hotlock_get_load_fonts_option',
				"type" => "text"
				);
			$fonts["load_fonts-{$i}-family"] = array(
				"title" => esc_html__('Font family', 'hotlock'),
				"desc" => $i==1
							? wp_kses_data( __('Select font family to use it if font above is not available', 'hotlock') )
							: '',
				"refresh" => false,
				"std" => '$hotlock_get_load_fonts_option',
				"options" => array(
					'inherit' => esc_html__("Inherit", 'hotlock'),
					'serif' => esc_html__('serif', 'hotlock'),
					'sans-serif' => esc_html__('sans-serif', 'hotlock'),
					'monospace' => esc_html__('monospace', 'hotlock'),
					'cursive' => esc_html__('cursive', 'hotlock'),
					'fantasy' => esc_html__('fantasy', 'hotlock')
				),
				"type" => "select"
				);
			$fonts["load_fonts-{$i}-styles"] = array(
				"title" => esc_html__('Font styles', 'hotlock'),
				"desc" => $i==1
							? wp_kses_data( __('Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'hotlock') )
											. '<br>'
								. wp_kses_data( __('<b>Attention!</b> Each weight and style increase download size! Specify only used weights and styles.', 'hotlock') )
							: '',
				"refresh" => false,
				"std" => '$hotlock_get_load_fonts_option',
				"type" => "text"
				);
		}
		$fonts['load_fonts_end'] = array(
			"type" => "section_end"
			);

		// Sections with font's attributes for each theme element
		$theme_fonts = hotlock_get_theme_fonts();
		foreach ($theme_fonts as $tag=>$v) {
			$fonts["{$tag}_section"] = array(
				"title" => !empty($v['title'])
								? $v['title']
								: esc_html(sprintf(__('%s settings', 'hotlock'), $tag)),
				"desc" => !empty($v['description'])
								? $v['description']
								: wp_kses_post( sprintf(__('Font settings of the "%s" tag.', 'hotlock'), $tag) ),
				"type" => "section",
				);

			foreach ($v as $css_prop=>$css_value) {
				if (in_array($css_prop, array('title', 'description'))) continue;
				$options = '';
				$type = 'text';
				$title = ucfirst(str_replace('-', ' ', $css_prop));
				if ($css_prop == 'font-family') {
					$type = 'select';
					$options = hotlock_get_list_load_fonts(true);
				} else if ($css_prop == 'font-weight') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'hotlock'),
						'100' => esc_html__('100 (Light)', 'hotlock'),
						'200' => esc_html__('200 (Light)', 'hotlock'),
						'300' => esc_html__('300 (Thin)',  'hotlock'),
						'400' => esc_html__('400 (Normal)', 'hotlock'),
						'500' => esc_html__('500 (Semibold)', 'hotlock'),
						'600' => esc_html__('600 (Semibold)', 'hotlock'),
						'700' => esc_html__('700 (Bold)', 'hotlock'),
						'800' => esc_html__('800 (Black)', 'hotlock'),
						'900' => esc_html__('900 (Black)', 'hotlock')
					);
				} else if ($css_prop == 'font-style') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'hotlock'),
						'normal' => esc_html__('Normal', 'hotlock'),
						'italic' => esc_html__('Italic', 'hotlock')
					);
				} else if ($css_prop == 'text-decoration') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'hotlock'),
						'none' => esc_html__('None', 'hotlock'),
						'underline' => esc_html__('Underline', 'hotlock'),
						'overline' => esc_html__('Overline', 'hotlock'),
						'line-through' => esc_html__('Line-through', 'hotlock')
					);
				} else if ($css_prop == 'text-transform') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'hotlock'),
						'none' => esc_html__('None', 'hotlock'),
						'uppercase' => esc_html__('Uppercase', 'hotlock'),
						'lowercase' => esc_html__('Lowercase', 'hotlock'),
						'capitalize' => esc_html__('Capitalize', 'hotlock')
					);
				}
				$fonts["{$tag}_{$css_prop}"] = array(
					"title" => $title,
					"desc" => '',
					"refresh" => false,
					"std" => '$hotlock_get_theme_fonts_option',
					"options" => $options,
					"type" => $type
				);
			}

			$fonts["{$tag}_section_end"] = array(
				"type" => "section_end"
				);
		}

		$fonts['fonts_end'] = array(
			"type" => "panel_end"
			);

		// Add fonts parameters into Theme Options
		hotlock_storage_merge_array('options', '', $fonts);

		// Add Header Video if WP version < 4.7
		if (!function_exists('get_header_video_url')) {
			hotlock_storage_set_array_after('options', 'header_image_override', 'header_video', array(
				"title" => esc_html__('Header video', 'hotlock'),
				"desc" => wp_kses_data( __("Select video to use it as background for the header", 'hotlock') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'hotlock')
				),
				"std" => '',
				"type" => "video"
				)
			);
		}
	}
}




// -----------------------------------------------------------------
// -- Create and manage Theme Options
// -----------------------------------------------------------------

// Theme init priorities:
// 2 - create Theme Options
if (!function_exists('hotlock_options_theme_setup2')) {
	add_action( 'after_setup_theme', 'hotlock_options_theme_setup2', 2 );
	function hotlock_options_theme_setup2() {
		hotlock_options_create();
	}
}

// Step 1: Load default settings and previously saved mods
if (!function_exists('hotlock_options_theme_setup5')) {
	add_action( 'after_setup_theme', 'hotlock_options_theme_setup5', 5 );
	function hotlock_options_theme_setup5() {
		hotlock_storage_set('options_reloaded', false);
		hotlock_load_theme_options();
	}
}

// Step 2: Load current theme customization mods
if (is_customize_preview()) {
	if (!function_exists('hotlock_load_custom_options')) {
		add_action( 'wp_loaded', 'hotlock_load_custom_options' );
		function hotlock_load_custom_options() {
			if (!hotlock_storage_get('options_reloaded')) {
				hotlock_storage_set('options_reloaded', true);
				hotlock_load_theme_options();
			}
		}
	}
}

// Load current values for each customizable option
if ( !function_exists('hotlock_load_theme_options') ) {
	function hotlock_load_theme_options() {
		$options = hotlock_storage_get('options');
		$reset = (int) get_theme_mod('reset_options', 0);
		foreach ($options as $k=>$v) {
			if (isset($v['std'])) {
				if (strpos($v['std'], '$hotlock_')!==false) {
					$func = substr($v['std'], 1);
					if (function_exists($func)) {
						$v['std'] = $func($k);
					}
				}
				$value = $v['std'];
				if (!$reset) {
					if (isset($_GET[$k]))
						$value = hotlock_get_value_gp($k);
					else {
						$tmp = get_theme_mod($k, -987654321);
						if ($tmp != -987654321) $value = $tmp;
					}
				}
				hotlock_storage_set_array2('options', $k, 'val', $value);
				if ($reset) remove_theme_mod($k);
			}
		}
		if ($reset) {
			// Unset reset flag
			set_theme_mod('reset_options', 0);
			// Regenerate CSS with default colors and fonts
			hotlock_customizer_save_css();
		} else {
			do_action('hotlock_action_load_options');
		}
	}
}

// Override options with stored page/post meta
if ( !function_exists('hotlock_override_theme_options') ) {
	add_action( 'wp', 'hotlock_override_theme_options', 1 );
	function hotlock_override_theme_options($query=null) {
		if (is_page_template('blog.php')) {
			hotlock_storage_set('blog_archive', true);
			hotlock_storage_set('blog_template', get_the_ID());
		}
		hotlock_storage_set('blog_mode', hotlock_detect_blog_mode());
		if (is_singular()) {
			hotlock_storage_set('options_meta', get_post_meta(get_the_ID(), 'hotlock_options', true));
		}
	}
}


// Return customizable option value
if (!function_exists('hotlock_get_theme_option')) {
	function hotlock_get_theme_option($name, $defa='', $strict_mode=false, $post_id=0) {
		$rez = $defa;
		$from_post_meta = false;
		if ($post_id > 0) {
			if (!hotlock_storage_isset('post_options_meta', $post_id))
				hotlock_storage_set_array('post_options_meta', $post_id, get_post_meta($post_id, 'hotlock_options', true));
			if (hotlock_storage_isset('post_options_meta', $post_id, $name)) {
				$tmp = hotlock_storage_get_array('post_options_meta', $post_id, $name);
				if (!hotlock_is_inherit($tmp)) {
					$rez = $tmp;
					$from_post_meta = true;
				}
			}
		}
		if (!$from_post_meta && hotlock_storage_isset('options')) {
			if ( !hotlock_storage_isset('options', $name) ) {
				$rez = $tmp = '_not_exists_';
				if (function_exists('trx_addons_get_option'))
					$rez = trx_addons_get_option($name, $tmp, false);
				if ($rez === $tmp) {
					if ($strict_mode) {
						$s = debug_backtrace();
						$s = array_shift($s);
						echo '<pre>' . sprintf(esc_html__('Undefined option "%s" called from:', 'hotlock'), $name);
						if (function_exists('dco')) dco($s);
						else print_r($s);
						echo '</pre>';
                        wp_die();
					} else
						$rez = $defa;
				}
			} else {
				$blog_mode = hotlock_storage_get('blog_mode');
				// Override option from GET or POST for current blog mode
				if (!empty($blog_mode) && isset($_REQUEST[$name . '_' . $blog_mode])) {
					$rez = wp_unslash($_REQUEST[$name . '_' . $blog_mode]);
				// Override option from GET
				} else if (isset($_REQUEST[$name])) {
					$rez = wp_unslash($_REQUEST[$name]);
				// Override option from current page settings (if exists)
				} else if (hotlock_storage_isset('options_meta', $name) && !hotlock_is_inherit(hotlock_storage_get_array('options_meta', $name))) {
					$rez = hotlock_storage_get_array('options_meta', $name);
				// Override option from current blog mode settings: 'home', 'search', 'page', 'post', 'blog', etc. (if exists)
				} else if (!empty($blog_mode) && hotlock_storage_isset('options', $name . '_' . $blog_mode, 'val') && !hotlock_is_inherit(hotlock_storage_get_array('options', $name . '_' . $blog_mode, 'val'))) {
					$rez = hotlock_storage_get_array('options', $name . '_' . $blog_mode, 'val');
				// Get saved option value
				} else if (hotlock_storage_isset('options', $name, 'val')) {
					$rez = hotlock_storage_get_array('options', $name, 'val');
				// Get ThemeREX Addons option value
				} else if (function_exists('trx_addons_get_option')) {
					$rez = trx_addons_get_option($name, $defa, false);
				}
			}
		}
		return $rez;
	}
}


// Check if customizable option exists
if (!function_exists('hotlock_check_theme_option')) {
	function hotlock_check_theme_option($name) {
		return hotlock_storage_isset('options', $name);
	}
}

// Get dependencies list from the Theme Options
if ( !function_exists('hotlock_get_theme_dependencies') ) {
	function hotlock_get_theme_dependencies() {
		$options = hotlock_storage_get('options');
		$depends = array();
		foreach ($options as $k=>$v) {
			if (isset($v['dependency']))
				$depends[$k] = $v['dependency'];
		}
		return $depends;
	}
}

// Return internal theme setting value
if (!function_exists('hotlock_get_theme_setting')) {
	function hotlock_get_theme_setting($name) {
		return hotlock_storage_isset('settings', $name) ? hotlock_storage_get_array('settings', $name) : false;
	}
}


// Set theme setting
if ( !function_exists( 'hotlock_set_theme_setting' ) ) {
	function hotlock_set_theme_setting($option_name, $value) {
		if (hotlock_storage_isset('settings', $option_name))
			hotlock_storage_set_array('settings', $option_name, $value);
	}
}