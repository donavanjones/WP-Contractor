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




Redux::setSection(
	$opt_name , // This is your opt_name,
	array( // This is your arguments array
		   'id'    => 'design-section',
		   // Unique identifier for your panel. Must be set and must not contain spaces or special characters
		   'title' => 'Design',
		   'icon'  => 'el el-magic',
		   // http://elusiveicons.com/icons/
		   //'subsection' => true, // Enable this as subsection of a previous section
	)
);


Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Layout', 'dj-web-media' ),
		'id'         => 'layout-section',
		'subsection' => true,
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
				'id'       => 'nav-location',
				'type'     => 'radio',
				'title'    => __('Navigation Location', 'dj-web-media'), 
				//Must provide key => value pairs for radio options
				'options'  => array(
					'1' => 'Above Header', 
					'2' => 'Below Header',
					'3' => 'Sticky Top Header',
					'4' => 'No Menu'
				),
				'default' => '2'
			),
			array(
				'id'       => 'show-breadcrumbs',
				'type'     => 'radio',
				'title'    => __('Display Breadcrumbs', 'dj-web-media'), 
				//Must provide key => value pairs for radio options
				'options'  => array(
					'1' => 'Show Breadcrumbs', 
					'2' => 'Hide Breadcrumbs'
				),
				'default' => '2'
			),
			array(
				'id'       => 'show-count-down-timer',
				'type'     => 'radio',
				'title'    => __('Display Count Down Timer', 'dj-web-media'), 
				//Must provide key => value pairs for radio options
				'options'  => array(
					'1' => 'Top Of Content', 
					'2' => 'Bottom Of Content',
					'3' => 'Footer',
					'4' => 'Do Not Display',
					'5' => 'Top Of Page',
					'6' => 'Bottom Of Page'
				),
				'default' => '2'
			),
		),
	)
);









Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Header', 'dj-web-media' ),
		'id'         => 'header-section',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'        => 'header_logo',
				'type'      => 'media',
				'url'       => true,
				'title'     => __('Logo', 'dj-web-media' ),
				'compiler'  => 'false',
				'subtitle'  => __('Upload your logo', 'dj-web-media' ),
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
		),
	)
);










Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Footer', 'dj-web-media' ),
		'id'         => 'footer-section',
		'subsection' => true,
		'fields'     => array(
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
				'id'=>'wufoo-form',
				'type' => 'textarea',
				'title' => __('Add Your Wufoo Form Here - HTML Validated Custom', 'dj-web-media'), 
				'subtitle' => __('Custom HTML Allowed (wp_kses)', 'dj-web-media'),
				'desc' => __('Add your Wufoo Form code here.', 'dj-web-media'),
				'validate' => 'html_custom',
				'default' => '<br />Wufoo Form Code Allowed Here<br />',
				'allowed_html' => array(
					'a' => array(
						'href' => array(),
						'title' => array()
					),
					'br' => array(),
					'em' => array(),
					'strong' => array(),
					'div' => array(
						'id' => array(),
						'style' => array(),
					),
					'script' => array(),
				)
			),
		),
	)
);









Redux::setSection(
	$opt_name , // This is your opt_name,
	array( // This is your arguments array
		   'id'    => 'color-section',
		   // Unique identifier for your panel. Must be set and must not contain spaces or special characters
		   'title' => 'Colors',
		   'icon'  => 'el el-magic',
		   // http://elusiveicons.com/icons/
		   //'subsection' => true, // Enable this as subsection of a previous section
	)
);









Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Header', 'dj-web-media' ),
		'id'         => 'header-background-color-section',
		'desc' => __('Select your header background colors to use on your website.'),
		'subsection' => true,
		'fields'     => array(
			array(
				'id'=>'header-background-color',
				'type' => 'color',
				'title' => __('Header Color', '$opt_name'), 
				'subtitle' => __('Pick a header color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'header-tagline-color',
				'type' => 'color',
				'title' => __('Header Tagline Color', '$opt_name'), 
				'subtitle' => __('Pick a header tagline color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'company-callout-color',
				'type' => 'color',
				'title' => __('Company Callout Color', '$opt_name'), 
				'subtitle' => __('Pick a company callout color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'company-phone-color',
				'type' => 'color',
				'title' => __('Company Phone Color', '$opt_name'), 
				'subtitle' => __('Pick a company phone color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),
		),
	)
);






Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Footer Text Colors', 'dj-web-media' ),
		'id'         => 'footer-text-colors-section',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'=>'footer-cta-text-color',
				'type' => 'color',
				'title' => __('Footer CTA Text Color', '$opt_name'), 
				'subtitle' => __('Pick your footer cta text color for the theme (default: #fff).', '$opt_name'),
				'default' => '#ff0000',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'footer-sells-slogan-text-color',
				'type' => 'color',
				'title' => __('Footer Sells Slogan Text Color', '$opt_name'), 
				'subtitle' => __('Pick your footer sells slogan text color for the theme (default: #fff).', '$opt_name'),
				'default' => '#ff0000',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'footer-sells-slogan-cta-text-color',
				'type' => 'color',
				'title' => __('Footer Sells Slogan CTA Text Color', '$opt_name'), 
				'subtitle' => __('Pick your footer sells slogan cta text color for the theme (default: #fff).', '$opt_name'),
				'default' => '#ff0000',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'footer-sells-motto-text-color',
				'type' => 'color',
				'title' => __('Footer Sells Motto Text Color', '$opt_name'), 
				'subtitle' => __('Pick your footer sells motto text color for the theme (default: #fff).', '$opt_name'),
				'default' => '#ff0000',
				'validate' => 'color_rgba',
			),
		),
	)
);







Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Backgrounds', 'dj-web-media' ),
		'id'         => 'background-color-section',
		'desc' => __('Select background colors to use on your website.'),
		'subsection' => true,
		'fields'     => array(
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
			array(
				'id'=>'primary-bg-color',
				'type' => 'color',
				'title' => __('Primary Color', '$opt_name'), 
				'subtitle' => __('Pick a primary color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'secondary-bg-color',
				'type' => 'color',
				'title' => __('Secondary Color', '$opt_name'), 
				'subtitle' => __('Pick a secondary color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'prime-bg-color-darken',
				'type' => 'color',
				'title' => __('Primary Dark Color', '$opt_name'), 
				'subtitle' => __('Pick a primary dark color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'third-bg-color',
				'type' => 'color',
				'title' => __('Third Background Color', '$opt_name'), 
				'subtitle' => __('Pick a third background color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'breadcrumbs-color',
				'type' => 'color',
				'title' => __('Breadcrumbs Background Color', '$opt_name'), 
				'subtitle' => __('Pick the breadcrumbs background color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'footer-count-down-timer-background-color',
				'type' => 'color',
				'title' => __('Footer Count Down Timer Background Color', '$opt_name'), 
				'subtitle' => __('Pick your footer count down timer background color for the theme (default: #fff).', '$opt_name'),
				'default' => '#ff0000',
				'validate' => 'color_rgba',
			),
		),
	)
);





















Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Table Backgrounds', 'dj-web-media' ),
		'id'         => 'table-background-color-section',
		'desc' => __('Select background colors to use on your website.'),
		'subsection' => true,
		'fields'     => array(
			array(
				'id'=>'table-dark-color',
				'type' => 'color',
				'title' => __('Table Dark Background Color', '$opt_name'), 
				'subtitle' => __('Pick the Table Dark background color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'thead-light-color',
				'type' => 'color',
				'title' => __('Thead Light Background Color', '$opt_name'), 
				'subtitle' => __('Pick the thead light background color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'thead-dark-color',
				'type' => 'color',
				'title' => __('Thead Dark Background Color', '$opt_name'), 
				'subtitle' => __('Pick the thead dark background color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'table-striped-color',
				'type' => 'color',
				'title' => __('Table Striped Background Color', '$opt_name'), 
				'subtitle' => __('Pick the table striped background color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),
		),
	)
);















Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Buttons', 'dj-web-media' ),
		'id'         => 'buttons-section',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'=>'cta-button-btn-color',
				'type' => 'color',
				'title' => __('CTA Button Color', '$opt_name'), 
				'subtitle' => __('Pick your CTA button color for the theme (default: #fff).', '$opt_name'),
				'default' => '#FFFFFF',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'primary-button-btn-color',
				'type' => 'color',
				'title' => __('Primary/Outline Button Color', '$opt_name'), 
				'subtitle' => __('Pick your Primary/Outline button color for the theme (default: #fff).', '$opt_name'),
				'default' => '#007bff',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'sceondary-button-btn-color',
				'type' => 'color',
				'title' => __('Secondary/Outline Button Color', '$opt_name'), 
				'subtitle' => __('Pick your Secondary/Outline button color for the theme (default: #fff).', '$opt_name'),
				'default' => '#6c757d',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'success-button-btn-color',
				'type' => 'color',
				'title' => __('Success/Outline Button Color', '$opt_name'), 
				'subtitle' => __('Pick your Success/Outline button color for the theme (default: #fff).', '$opt_name'),
				'default' => '#28a745',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'danger-button-btn-color',
				'type' => 'color',
				'title' => __('Danger/Outline Button Color', '$opt_name'), 
				'subtitle' => __('Pick your Danger/Outline button color for the theme (default: #fff).', '$opt_name'),
				'default' => '#dc3545',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'warning-button-btn-color',
				'type' => 'color',
				'title' => __('Warning/Outline Button Color', '$opt_name'), 
				'subtitle' => __('Pick your Warning/Outline button color for the theme (default: #fff).', '$opt_name'),
				'default' => '#ffc107',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'info-button-btn-color',
				'type' => 'color',
				'title' => __('Info/Outline Button Color', '$opt_name'), 
				'subtitle' => __('Pick your Info/Outline button color for the theme (default: #fff).', '$opt_name'),
				'default' => '#17a2b8',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'light-button-btn-color',
				'type' => 'color',
				'title' => __('Light/Outline Button Color', '$opt_name'), 
				'subtitle' => __('Pick your Light/Outline button color for the theme (default: #fff).', '$opt_name'),
				'default' => '#f8f9fa',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'dark-button-btn-color',
				'type' => 'color',
				'title' => __('Dark/Outline Button Color', '$opt_name'), 
				'subtitle' => __('Pick your Dark/Outline button color for the theme (default: #fff).', '$opt_name'),
				'default' => '#343a40',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'link-button-btn-color',
				'type' => 'color',
				'title' => __('Link Button Color', '$opt_name'), 
				'subtitle' => __('Pick your link button color for the theme (default: #fff).', '$opt_name'),
				'default' => '#007bff',
				'validate' => 'color_rgba',
			),
		),
	)
);
















Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Text Colors', 'dj-web-media' ),
		'id'         => 'text-colors-section',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'=>'danger-text-color',
				'type' => 'color',
				'title' => __('Danger Text Color', '$opt_name'), 
				'subtitle' => __('Pick your danger text color for the theme (default: #fff).', '$opt_name'),
				'default' => '#ff0000',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'count-down-timer-title',
				'type' => 'color',
				'title' => __('Count Down Time Title Color', '$opt_name'), 
				'subtitle' => __('Pick your count down timer title color for the theme (default: #fff).', '$opt_name'),
				'default' => '#ff0000',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'banner-cta-text-color',
				'type' => 'color',
				'title' => __('Banner CTA Text Color', '$opt_name'), 
				'subtitle' => __('Pick your banner cta text color for the theme (default: #fff).', '$opt_name'),
				'default' => '#ff0000',
				'validate' => 'color_rgba',
			),
		),
	)
);











Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Card Colors', 'dj-web-media' ),
		'id'         => 'card-colors-section',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'=>'card-title-background-color',
				'type' => 'color',
				'title' => __('Card Title Background Color', '$opt_name'), 
				'subtitle' => __('Pick your card title background color for the theme (default: #fff).', '$opt_name'),
				'default' => '#ff0000',
				'validate' => 'color_rgba',
			),
			array(
				'id'=>'contaminates-card-title-background-color',
				'type' => 'color',
				'title' => __('Contaminates Card Title Background Color', '$opt_name'), 
				'subtitle' => __('Pick your contaminates card title background color for the theme (default: #fff).', '$opt_name'),
				'default' => '#ff0000',
				'validate' => 'color_rgba',
			),
		),
	)
);





















Redux::setSection(
	$opt_name , // This is your opt_name,
	array( // This is your arguments array
		   'id'    => 'typography-section',
		   // Unique identifier for your panel. Must be set and must not contain spaces or special characters
		   'title' => 'Typography',
		   'icon'  => 'el el-magic',
		   // http://elusiveicons.com/icons/
		   //'subsection' => true, // Enable this as subsection of a previous section
	)
);

Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Headings', 'dj-web-media' ),
		'id'         => 'heading-section',
		'subsection' => true,
		'fields'     => array(
			array( 
				'id'          => 'heading-h1',
				'type'        => 'typography', 
				'title'       => __('H1', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('heading styles for the H1 tag.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'heading-h2',
				'type'        => 'typography', 
				'title'       => __('H2', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('heading styles for the H2 tag.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'heading-h3',
				'type'        => 'typography', 
				'title'       => __('H3', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('heading styles for the H3 tag.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'heading-h4',
				'type'        => 'typography', 
				'title'       => __('H4', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('heading styles for the H4 tag.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'heading-h5',
				'type'        => 'typography', 
				'title'       => __('H5', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('heading styles for the H5 tag.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'heading-h6',
				'type'        => 'typography', 
				'title'       => __('H6', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('heading styles for the H6 tag.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
		),
	)
);















Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Content', 'dj-web-media' ),
		'id'         => 'content-section',
		'subsection' => true,
		'fields'     => array(
			array( 
				'id'          => 'p-content',
				'type'        => 'typography', 
				'title'       => __('Paragraph Tag', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Paragraph styles for the p tag.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'p-lead-content',
				'type'        => 'typography', 
				'title'       => __('Lead Class', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the lead class.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'p-h1-content',
				'type'        => 'typography', 
				'title'       => __('H1 Class', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the h1 class.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'p-h2-content',
				'type'        => 'typography', 
				'title'       => __('H2 Class', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the h2 class.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'p-h3-content',
				'type'        => 'typography', 
				'title'       => __('H3 Class', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the h3 class.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'p-h4-content',
				'type'        => 'typography', 
				'title'       => __('H4 Class', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the h4 class.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'p-h5-content',
				'type'        => 'typography', 
				'title'       => __('H5 Class', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the h5 class.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'p-h6-content',
				'type'        => 'typography', 
				'title'       => __('H6 Class', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the h6 class.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'p-display-1-content',
				'type'        => 'typography', 
				'title'       => __('Display 1 Class', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the Display 1 class.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'p-display-2-content',
				'type'        => 'typography', 
				'title'       => __('Display 2 Class', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the Display 2 class.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'p-display-3-content',
				'type'        => 'typography', 
				'title'       => __('Display 3 Class', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the Display 3 class.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'p-display-4-content',
				'type'        => 'typography', 
				'title'       => __('Display 4 Class', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the Display 4 class.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'p-display-5-content',
				'type'        => 'typography', 
				'title'       => __('Display 5 Class', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the Display 5 class.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'blockquote-content',
				'type'        => 'typography', 
				'title'       => __('Blockquote Class', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the Blockquote class.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'blockquote-footer-content',
				'type'        => 'typography', 
				'title'       => __('Blockquote Footer Class', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the Blockquote Footer class.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'breadcrumbs-content',
				'type'        => 'typography', 
				'title'       => __('Breadcrumbs Text', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the breadcrumbs.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'card-title-content',
				'type'        => 'typography', 
				'title'       => __('Card Title Text', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the card titles.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
			array( 
				'id'          => 'company-phone-text',
				'type'        => 'typography', 
				'title'       => __('Company Phone Text', $opt_name),
				'google'      => true, 
				'font-backup' => true,
				'units'       =>'em',
				'subtitle'    => __('Select your styles for the company phone.', $opt_name),
				'default'     => array(
					'color'       => '#333', 
					'font-style'  => '700', 
					'font-family' => 'Abel', 
					'google'      => true,
					'font-size'   => '1', 
					'line-height' => '1.2'
				),
			),
		),
	)
);










Redux::setSection(
	$opt_name , // This is your opt_name,
	array( // This is your arguments array
		   'id'    => 'main-content-section',
		   // Unique identifier for your panel. Must be set and must not contain spaces or special characters
		   'title' => 'Content',
		   'icon'  => 'el el-magic',
		   // http://elusiveicons.com/icons/
		   //'subsection' => true, // Enable this as subsection of a previous section
	)
);


Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Service Area Archive', 'dj-web-media' ),
		'id'         => 'archive-section',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'        => 'service-area-archive-banner',
				'type'      => 'media',
				'url'       => true,
				'title'     => __('Service Area Archive Banner', 'dj-web-media' ),
				'compiler'  => 'false',
				'subtitle'  => __('Upload your Service Area Archive Banner', 'dj-web-media' ),
			),
			array(
				'id'       => 'archive-title',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Service Area Archive title here', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
			array(
				'id'       => 'archive-subtitle-section',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Service Area Archive subitle section here', 'dj-web-media' ),
				'default'  => 'Add subitle section',
			),
			array(
				'id'=>'archive-body',
				'type' => 'editor',
				'title' => __('Add Your Service Area Archive body content here', 'dj-web-media'), 
				'subtitle' => __('Custom HTML Allowed (wp_kses)', 'dj-web-media'),
				'desc' => __('Add your Service Area Archive body content here.', 'dj-web-media'),
				'validate' => 'html_custom',
				'default' => '<br />HTML allowed here<br />',
			),
			array(
				'id'       => 'archive-banner-title',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Service Area Archive banner title here', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
			array(
				'id'       => 'archive-banner-subtitle',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Service Area Archive banner subtitle here', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
			array(
				'id'       => 'archive-banner-body',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Service Area Archive banner body here', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
		),
	)
);















Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Projects Archive', 'dj-web-media' ),
		'id'         => 'projects-archive-section',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'        => 'projects-archive-banner',
				'type'      => 'media',
				'url'       => true,
				'title'     => __('Projects Archive Banner', 'dj-web-media' ),
				'compiler'  => 'false',
				'subtitle'  => __('Upload your Projects Archive Banner', 'dj-web-media' ),
			),
			array(
				'id'       => 'projects-archive-title',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Projects Archive title here', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
			array(
				'id'       => 'projects-archive-subtitle-section',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Projects Archive subitle section here', 'dj-web-media' ),
				'default'  => 'Add subitle section',
			),
			array(
				'id'=>'projects-archive-body',
				'type' => 'editor',
				'title' => __('Add Your Projects Archive body content here', 'dj-web-media'), 
				'subtitle' => __('Custom HTML Allowed (wp_kses)', 'dj-web-media'),
				'desc' => __('Add your Projects Archive body content here.', 'dj-web-media'),
				'validate' => 'html_custom',
				'default' => '<br />HTML allowed here<br />',
			),
			array(
				'id'       => 'projects-archive-banner-title',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Projects Archive banner title here', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
			array(
				'id'       => 'projects-archive-banner-subtitle',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Projects Archive banner subtitle here', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
			array(
				'id'       => 'projects-archive-banner-body',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Projects Archive banner body here', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
		),
	)
);












Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Products Archive', 'dj-web-media' ),
		'id'         => 'products-archive-section',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'        => 'products-archive-banner',
				'type'      => 'media',
				'url'       => true,
				'title'     => __('Products Archive Banner', 'dj-web-media' ),
				'compiler'  => 'false',
				'subtitle'  => __('Upload your products Archive Banner', 'dj-web-media' ),
			),
			array(
				'id'       => 'products-archive-title',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Products Archive title here', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
			array(
				'id'       => 'products-archive-subtitle-section',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Products Archive subitle section here', 'dj-web-media' ),
				'default'  => 'Add subitle section',
			),
			array(
				'id'=>'products-archive-body',
				'type' => 'editor',
				'title' => __('Add Your Products Archive body content here', 'dj-web-media'), 
				'subtitle' => __('Custom HTML Allowed (wp_kses)', 'dj-web-media'),
				'desc' => __('Add your Products Archive body content here.', 'dj-web-media'),
				'validate' => 'html_custom',
				'default' => '<br />HTML allowed here<br />',
			),
			array(
				'id'       => 'products-archive-banner-title',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Products Archive banner title here', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
			array(
				'id'       => 'products-archive-banner-subtitle',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Products Archive banner subtitle here', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
			array(
				'id'       => 'products-archive-banner-body',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Products Archive banner body here', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
		),
	)
);











Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'Contaminants Archive', 'dj-web-media' ),
		'id'         => 'contaminants-archive-section',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'        => 'contaminants-archive-banner',
				'type'      => 'media',
				'url'       => true,
				'title'     => __('Contaminants Archive Banner', 'dj-web-media' ),
				'compiler'  => 'false',
				'subtitle'  => __('Upload your Contaminants Archive Banner', 'dj-web-media' ),
			),
			array(
				'id'       => 'contaminants-archive-title',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Contaminants Archive title here', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
			array(
				'id'       => 'contaminants-archive-subtitle-section',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Contaminants Archive subitle section here', 'dj-web-media' ),
				'default'  => 'Add subitle section',
			),
			array(
				'id'=>'contaminants-archive-body',
				'type' => 'editor',
				'title' => __('Add Your Contaminants Archive body content here', 'dj-web-media'), 
				'subtitle' => __('Custom HTML Allowed (wp_kses)', 'dj-web-media'),
				'desc' => __('Add your Contaminants Archive body content here.', 'dj-web-media'),
				'validate' => 'html_custom',
				'default' => '<br />HTML allowed here<br />',
			),
			array(
				'id'       => 'contaminants-archive-banner-title',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Contaminants Archive banner title here', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
			array(
				'id'       => 'contaminants-archive-banner-subtitle',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Contaminants Archive banner subtitle here', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
			array(
				'id'       => 'contaminants-archive-banner-body',
				'type'     => 'editor',
				'title'    => esc_html__( 'Add Your Contaminants Archive banner body here', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
		),
	)
);












Redux::setSection(
	$opt_name , // This is your opt_name,
	array(
		'title'      => esc_html__( 'CTA Banner', 'dj-web-media' ),
		'id'         => 'cta-banner-section',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'        => 'cta-banner-text',
				'type'      => 'editor',
				'url'       => true,
				'title'     => __('CTA Banner', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
			array(
				'id'        => 'cta-banner-sub-text',
				'type'      => 'editor',
				'url'       => true,
				'title'     => __('CTA Banner Sub Text', 'dj-web-media' ),
				'default'  => 'Add Content',
			),
		),
	)
);
