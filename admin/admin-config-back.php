<?php
/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

if ( ! class_exists( 'Redux' ) ) {
	return null;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'dj_web_media';

/**
 * GLOBAL ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: @link https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 */

/**
 * ---> BEGIN ARGUMENTS
 */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
	// REQUIRED!!  Change these values as you need/desire.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	'menu_title'                => esc_html__( 'Theme Options', 'dj-web-media' ),
	'page_title'                => esc_html__( 'Theme Options', 'dj-web-media' ),

	// Use a asynchronous font on the front end or font string.
	'async_typography'          => true,

	// Disable this in case you want to create your own google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,

	// Choose an icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Choose an priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Set a different name for your global variable other than the opt_name.
	'global_variable'           => '',

	// Show the time the page took to load, etc.
	'dev_mode'                  => false,

	// Enable basic customizer support.
	'customizer'                => true,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => null,

	// For a full list of options, visit: @link http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel.
	'page_slug'                 => '_options',

	// On load save the defaults to DB before user clicks save or not.
	'save_defaults'             => true,

	// If true, shows the default value next to each field that is not the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default. Suggested: *.
	'default_mark'              => '',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// CAREFUL -> These options are for advanced use only.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head.
	'output_tag'                => true,

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',

	// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
	'use_cdn'                   => true,
	'compiler'                  => true,

	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'light',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),
);

// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
$args['admin_bar_links'][] = array(
	'id'    => 'redux-docs',
	'href'  => '//devs.redux.io/',
	'title' => esc_html__( 'Documentation', 'dj-web-media' ),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-support',
	'href'  => '//github.com/ReduxFramework/redux-framework/issues',
	'title' => esc_html__( 'Support', 'dj-web-media' ),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-extensions',
	'href'  => 'redux.io/extensions',
	'title' => esc_html__( 'Extensions', 'dj-web-media' ),
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
$args['share_icons'][] = array(
	'url'   => '//github.com/ReduxFramework/ReduxFramework',
	'title' => 'Visit us on GitHub',
	'icon'  => 'el el-github',
);
$args['share_icons'][] = array(
	'url'   => '//www.facebook.com/pages/Redux-Framework/243141545850368',
	'title' => esc_html__( 'Like us on Facebook', 'dj-web-media' ),
	'icon'  => 'el el-facebook',
);
$args['share_icons'][] = array(
	'url'   => '//twitter.com/reduxframework',
	'title' => esc_html__( 'Follow us on Twitter', 'dj-web-media' ),
	'icon'  => 'el el-twitter',
);
$args['share_icons'][] = array(
	'url'   => '//www.linkedin.com/company/redux-framework',
	'title' => esc_html__( 'FInd us on LinkedIn', 'dj-web-media' ),
	'icon'  => 'el el-linkedin',
);

// Panel Intro text -> before the form.

if ( ! isset( $args['global_variable'] ) || false !== $args['global_variable'] ) {
	if ( ! empty( $args['global_variable'] ) ) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace( '-', '_', $args['opt_name'] );
	}
} 


Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> BEGIN HELP TABS
 */

$help_tabs = array(
	array(
		'id'      => 'redux-help-tab-1',
		'title'   => esc_html__( 'Theme Information 1', 'dj-web-media' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'dj-web-media' ) . '</p>',
	),

	array(
		'id'      => 'redux-help-tab-2',
		'title'   => esc_html__( 'Theme Information 2', 'dj-web-media' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'dj-web-media' ) . '</p>',
	),
);

Redux::set_help_tab( $opt_name, $help_tabs );

// Set the help sidebar.
$content = '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'dj-web-media' ) . '</p>';
Redux::set_help_sidebar( $opt_name, $content );

/*
 * <--- END HELP TABS
 */

/*
 *
 * ---> BEGIN SECTIONS
 *
 */

/* As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for. */

/* -> START Basic Fields. */

$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
);



Redux::setArgs(
	$opt_name , // This is your opt_name,
	array( // This is your arguments array
		   'display_name'    => 'Theme Options',
		   'display_version' => '1.0',
		   'menu_title'      => 'Theme Options',
		   'admin_bar'       => 'true',
		   'page_slug'       => 'dj_web_media_slug', // Must be one word, no special characters, no spaces
		   'menu_type'       => 'menu', // Menu or submenu
		   'allow_sub_menu'  => true,
	)
);




Redux::setSection(
	$opt_name , // This is your opt_name,
	array( // This is your arguments array
		   'id'    => 'company-info-section',
		   // Unique identifier for your panel. Must be set and must not contain spaces or special characters
		   'title' => 'Company Information',
		   'icon'  => 'el el-magic',
		   // http://elusiveicons.com/icons/
		   //'subsection' => true, // Enable this as subsection of a previous section
	)
);
Redux::setSection(
	$opt_name , 
	array(
		'title'      => esc_html__( 'Basic Info', 'dj-web-media' ),
		'id'         => 'basic-info',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'company_name',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Your Company Name', 'dj-web-media' ),
				'default'  => 'Default Text',
			),
			array(
				'id'       => 'company_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Your Companys Phone Number', 'dj-web-media' ),
				'default'  => '555-555-5555',
			),
		),
	)
);

// -> START Typography.
Redux::set_field( $opt_name, 'layout-section', array( 
    'id'          => 'company-typography',
    'type'        => 'typography', 
    'title'       => __('Typography', $opt_name),
    'google'      => true, 
    'font-backup' => true,
    'output'      => array('h2.site-description'),
    'units'       =>'px',
    'subtitle'    => __('Typography option with each property can be called individually.', $opt_name),
    'default'     => array(
        'color'       => '#333', 
        'font-style'  => '700', 
        'font-family' => 'Abel', 
        'google'      => true,
        'font-size'   => '33px', 
        'line-height' => '40'
    ),
) );

Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Layout', 'dj-web-media' ),
		'id'         => 'layout-section',
		'subsection' => false,
		'fields'     => array(
			array(
				'id'       => 'layout-type',
				'type'     => 'radio',
				'title'    => __('Layout Type', 'dj-web-media'), 
				//Must provide key => value pairs for radio options
				'options'  => array(
					'1' => 'Full Width', 
					'2' => 'Fixed Width'
				),
				'default' => '2'
			),
			array(
				'id'        => 'header_logo',
				'type'      => 'media',
				'url'       => true,
				'title'     => __('Logo', 'demo' ),
				'compiler'  => 'false',
				'subtitle'  => __('Upload your logo', 'demo' ),
			),
			array(
				'id'       => 'company_tagline',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Your Companys Tagline', 'dj-web-media' ),
				'default'  => 'Great Tagline',
			),
			array(
				'id'       => 'company_callout',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Your Companys Callout', 'dj-web-media' ),
				'default'  => 'Great Callout',
			),
			array(
				'id'       => 'company_footer_cta',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Your Companys Footer CTA', 'dj-web-media' ),
				'default'  => 'Great CTA',
			),
			array(
				'id'       => 'company_footer_sell_slogan',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Your Companys Footer Sells Slogan', 'dj-web-media' ),
				'default'  => 'Great Sells Slogan',
			),
			array(
				'id'       => 'company_footer_sell_slogan_cta',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Your Companys Footer Sells Slogan CTA', 'dj-web-media' ),
				'default'  => 'Great Sells Slogan CTA',
			),
			array(
				'id'       => 'company_footer_sells_motto',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Your Companys Footer Sells Motto', 'dj-web-media' ),
				'default'  => 'Great Sells Motto',
			), 
			array(
				'id'=>'header-background-color',
				'type' => 'color',
				'title' => __('Header Color', '$opt_name'), 
				'subtitle' => __('Pick a header color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),  
			array(
				'id'=>'nav-background-color',
				'type' => 'color',
				'title' => __('Navbar Color', '$opt_name'), 
				'subtitle' => __('Pick a navbar color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'footer-background-color',
				'type' => 'color',
				'title' => __('Footer Color', '$opt_name'), 
				'subtitle' => __('Pick a footer color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),
		),
	)
);



Redux::setSection(
	$opt_name , // This is your opt_name,
	array( // This is your arguments array
		   'id'         => 'subsectionsection_example_4',
		   // Unique identifier for your panel. Must be set and must not contain spaces or special characters
		   'title'      => 'Subsection 3',
		   'icon'       => 'el el-bulb',
		   // http://elusiveicons.com/icons/
		   'subsection' => false,
		   // Enable this as subsection of a previous section
	)
);
Redux::setField(
	$opt_name , // This is your opt_name,
	array( // This is your arguments array
		   'id'         => 'section_example_1',
		   // Unique identifier for your panel. Must be set and must not contain spaces or special characters
		   'type'       => 'Text',
		   'section_id' => 'section_example_1',
		   'title'      => 'Example Field',
		   'subtitle'   => 'Field Subtitle',
		   'desc'       => 'This is for descriptive text.',
	)
);

