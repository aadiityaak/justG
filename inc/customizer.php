<?php

/**
 * justg functions kirki
 *
 * @package justg
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

function justg_justg_configuration(){
	return array('url_path'     => get_stylesheet_directory_uri() . '/inc/kirki/');
}

// Add our config to differentiate from other themes/plugins 
// that may use Kirki at the same time.
Kirki::add_config('justg_config', [
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
]);

// Add Panel
Kirki::add_panel('panel_global', [
	'priority'    => 10,
	'title'       => esc_html__('Global', 'justg'),
	'description' => esc_html__('', 'justg'),
]);
Kirki::add_panel('panel_header', [
	'priority'    => 10,
	'title'       => esc_html__('Header', 'justg'),
	'description' => esc_html__('', 'justg'),
]);
Kirki::add_panel('panel_breadcrumb', [
	'priority'    => 10,
	'title'       => esc_html__('Breadcrumb', 'justg'),
	'description' => esc_html__('', 'justg'),
]);
Kirki::add_panel('panel_sidebar', [
	'priority'    => 10,
	'title'       => esc_html__('Sidebar', 'justg'),
	'description' => esc_html__('', 'justg'),
]);

// Add Section.
Kirki::add_section('global_typography', [
	'panel'    => 'panel_global',
	'title'    => __('Typography', 'justg'),
	'priority' => 10,
]);
Kirki::add_section('global_color', [
	'panel'    => 'panel_global',
	'title'    => __('Color', 'justg'),
	'priority' => 10,
]);
Kirki::add_section('global_container', [
	'panel'    => 'panel_global',
	'title'    => __('Container', 'justg'),
	'priority' => 10,
]);
Kirki::add_section('block_section', [
	'panel'    => 'panel_global',
	'title'    => __('Block Setting', 'justg'),
	'priority' => 10,
]);

Kirki::add_section('title_tagline', [
	'panel'    => 'panel_header',
	'title'    => __('Site Identity', 'justg'),
	'priority' => 10,
]);
Kirki::add_section('header_section', [
	'panel'    => 'panel_header',
	'title'    => __('Primary Header', 'justg'),
	'priority' => 10,
]);
Kirki::add_section('menus_section', [
	'panel'    => 'panel_header',
	'title'    => __('Primary Menu', 'justg'),
	'priority' => 10,
]);
Kirki::add_section('sidebar_section', [
	'panel'    => 'panel_sidebar',
	'title'    => __('Sidebar', 'justg'),
	'priority' => 10,
]);
Kirki::add_section('sidebar_style_section', [
	'panel'    => 'panel_sidebar',
	'title'    => __('Sidebar Style', 'justg'),
	'priority' => 10,
]);

Kirki::add_section('breadcrumb_section', [
	'panel'    => 'panel_breadcrumb',
	'title'    => __('Separator', 'justg'),
	'priority' => 10,
]);
Kirki::add_section('panel_sidebar', [
	'panel'    => 'panel_breadcrumb',
	'title'    => __('Setting', 'justg'),
	'priority' => 10,
]);

Kirki::add_field('justg_config', [
	'type'        => 'slider',
	'settings'    => 'container_width',
	'label'       => esc_html__('Container Width', 'justg'),
	'section'     => 'global_container',
	'default'     => 1140,
	'transport'   => 'auto',
	'choices'     => [
		'min'  => 600,
		'max'  => 2300,
		'step' => 1,
	],
	'output' => [
		[
			'element'  => '.container',
			'property' => 'max-width',
			'units'    => 'px',
		],
	],
]);

Kirki::add_field('justg_config', [
	'type'        => 'typography',
	'settings'    => 'typography_setting',
	'label'       => esc_html__('Typography Umum', 'justg'),
	'section'     => 'global_typography',
	'default'     => [
		'font-family'    => 'Poppins',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#333333',
		'text-transform' => 'none',
		'text-align'     => 'left',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'body',
		],
	],
]);

Kirki::add_field('justg_config', [
	'type'        => 'multicolor',
	'settings'    => 'link_setting',
	'label'       => esc_html__('Color', 'justg'),
	'section'     => 'global_color',
	'priority'    => 10,
	'choices'     => [
		'link'    => esc_html__('Color', 'justg'),
		'hover'   => esc_html__('Hover', 'justg'),
		'active'  => esc_html__('Active', 'justg'),
		'primary' => esc_html__('Primary', 'justg'),
		'light'	  => esc_html__('Light', 'justg'),
	],
	'default'     => [
		'link'    => '#121212',
		'hover'   => '#333333',
		'active'  => '#121212',
		'primary' => '#98C65E',
		'light'   => '#f8f9fa',
	],
	'output'    => [
		[
			'choice'    => 'link',
			'element'   => 'a',
			'property'  => 'color',
		],
		[
			'choice'    => 'hover',
			'element'   => 'a:hover',
			'property'  => 'color',
		],
		[
			'choice'    => 'active',
			'element'   => 'a:active',
			'property'  => 'color',
		],
		[
			'choice'    => 'primary',
			'element'   => ':root',
			'property'  => '--primary',
		],
		[
			'choice'    => 'light',
			'element'   => ':root',
			'property'  => '--light',
		],
	],

]);

Kirki::add_field('justg_config', [
	'type'        => 'background',
	'settings'    => 'background_website',
	'label'       => esc_html__('Background', 'justg'),
	'description' => esc_html__('', 'justg'),
	'section'     => 'global_color',
	'default'     => [
		'background-color'      => '#F5F5F5',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'body',
		],
	],
]);

// Header section
Kirki::add_field('justg_config', [
	'type'        => 'select',
	'settings'    => 'select_header_container',
	'label'       => esc_html__('Header Container', 'justg'),
	'section'     => 'header_section',
	'default'     => 'container',
	'placeholder' => esc_html__('Header Container', 'justg'),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'container' => esc_html__('Box', 'justg'),
		'container-fluid' => esc_html__('FUll Width', 'justg'),
	],
]);
Kirki::add_field('justg_config', [
	'type'        => 'background',
	'settings'    => 'background_header',
	'label'       => esc_html__('Background Header', 'justg'),
	'description' => esc_html__('', 'justg'),
	'section'     => 'header_section',
	'default'     => [
		'background-color'      => '#ffffff',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => ['.site > header', '#main-menu .dropdown-menu'],
		],
	],
]);

Kirki::add_field('justg_config', [
	'type'        => 'slider',
	'settings'    => 'header_border_bottom',
	'label'       => esc_html__('Bottom Border Size', 'justg'),
	'section'     => 'header_section',
	'default'     => 0,
	'transport'   => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 30,
		'step' => 1,
	],
	'output' => [
		[
			'element'  => '.site > header',
			'property' => 'border-width',
			'units'    => 'px',
		],
	],
]);
Kirki::add_field('justg_config', [
	'type'        => 'color',
	'settings'    => 'header_border_color',
	'label'       => __('Color Control (hex-only)', 'justg'),
	'section'     => 'header_section',
	'default'     => '#efefef',
	'output' => [
		[
			'element'  => '.site > header',
			'property' => 'border-color',
		],
	],
]);
Kirki::add_field('justg_config', [
	'type'        => 'slider',
	'settings'    => 'tinggi_logo',
	'label'       => esc_html__('Logo Height', 'justg'),
	'section'     => 'header_section',
	'default'     => 40,
	'transport'   => 'auto',
	'choices'     => [
		'min'  => 10,
		'max'  => 300,
		'step' => 1,
	],
	'output' => [
		[
			'element'  => '.navbar-brand img',
			'property' => 'max-height',
			'units'    => 'px',
		],
	],
]);

Kirki::add_field('justg_config', [
	'type'        => 'typography',
	'settings'    => 'menu_setting',
	'label'       => esc_html__('Menu Typography', 'justg'),
	'section'     => 'menus_section',
	'default'     => [
		'font-family'    => 'Poppins',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#333333',
		'text-transform' => 'uppercase',
		'text-align'     => 'left',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '#main-menu',
		],
	],
]);
Kirki::add_field('justg_config', [
	'type'        => 'multicolor',
	'settings'    => 'link_menu',
	'label'       => esc_html__('Menu Color', 'justg'),
	'section'     => 'menus_section',
	'priority'    => 10,
	'choices'     => [
		'link'    => esc_html__('Color', 'justg'),
		'hover'   => esc_html__('Hover', 'justg'),
	],
	'default'     => [
		'link'    => '#121212',
		'hover'   => '#333333',
		'active'  => '#121212',
	],
	'output'    => [
		[
			'choice'    => 'link',
			'element'   => '#main-menu a',
			'property'  => 'color',
		],
		[
			'choice'    => 'hover',
			'element'   => '#main-menu a:hover',
			'property'  => 'color',
		],
	],
]);

// Add field to block section
Kirki::add_field('justg_config', [
	'type'        => 'background',
	'settings'    => 'background_block_setting',
	'label'       => esc_html__('Background Block', 'justg'),
	'description' => esc_html__('Atur background (widget, heading, article, dll)', 'justg'),
	'section'     => 'block_section',
	'default'     => [
		'background-color'      => '#ffffff',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => array('.block-primary'),
		],
	],
]);
Kirki::add_field('justg_config', [
	'type'        => 'dimensions',
	'settings'    => 'dimensions_block_setting',
	'label'       => esc_html__('Margin Block', 'justg'),
	'description' => esc_html__('Atur Jarak Block (widget, heading, article, dll)', 'justg'),
	'section'     => 'block_section',
	'default'     => [
		'padding-top'    => '2em',
		'padding-bottom' => '2em',
		'padding-left'   => '2em',
		'padding-right'  => '2em',

		'margin-top'    => '0em',
		'margin-bottom' => '2em',
		'margin-left'   => '0em',
		'margin-right'  => '0em',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => array('.block-primary'),
		],
	],
]);

Kirki::add_field('justg_config', [
	'type'     => 'text',
	'settings' => 'text_breadcrumb_separator',
	'label'    => esc_html__('Separator', 'justg'),
	'section'  => 'breadcrumb_section',
	'default'  => esc_html__('/', 'justg'),
	'priority' => 10,
]);
Kirki::add_field('justg_config', [
	'type'        => 'multicheck',
	'settings'    => 'breadcrumb_disable',
	'label'       => esc_html__('Tampilkan Breadcrumb', 'justg'),
	'section'     => 'breadcrumb_section',
	'default'     => array('disable-on-home', 'disable-on-404'),
	'priority'    => 10,
	'choices'     => [
		'disable-on-home' => esc_html__('Disable on Home Page', 'justg'),
		'disable-on-page' => esc_html__('Disable on Page', 'justg'),
		'disable-on-post' => esc_html__('Disable on Post', 'justg'),
		'disable-on-archive' => esc_html__('Disable on Archive', 'justg'),
		'disable-on-404' => esc_html__('Disable on 404', 'justg'),
	],
]);

//sidebar_section
Kirki::add_field( 'justg_config', [
	'type'        => 'select',
	'settings'    => 'justg_sidebar_position',
	'label'       => esc_html__( 'Default Sidebar', 'justg' ),
	'section'     => 'sidebar_section',
	'default'     => 'right',
	'placeholder' => esc_html__( 'Right Sidebar', 'justg' ),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no' 		=> esc_html__( 'No Sidebar', 'justg' ),
		'left'  	=> esc_html__( 'Left Sidebar', 'justg' ),
		'right' 	=> esc_html__( 'Right Sidebar', 'justg' ),
	],
] );
Kirki::add_field( 'justg_config', [
	'type'        => 'custom',
	'settings'    => 'separator',
	'section'     => 'sidebar_section',
		'default'         => '<hr/>',
	'priority'    => 10,
] );
Kirki::add_field( 'justg_config', [
	'type'        => 'select',
	'settings'    => 'justg_pages_sidebar_position',
	'label'       => esc_html__( 'Pages Sidebar', 'justg' ),
	'section'     => 'sidebar_section',
	'default'     => 'right',
	'placeholder' => esc_html__( 'Default', 'justg' ),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'default'	=> esc_html__( 'Default', 'justg' ),
		'no' 		=> esc_html__( 'No Sidebar', 'justg' ),
		'left'  	=> esc_html__( 'Left Sidebar', 'justg' ),
		'right' 	=> esc_html__( 'Right Sidebar', 'justg' ),
	],
] );
Kirki::add_field( 'justg_config', [
	'type'        => 'select',
	'settings'    => 'justg_blogs_sidebar_position',
	'label'       => esc_html__( 'Blog Posts Sidebar', 'justg' ),
	'section'     => 'sidebar_section',
	'default'     => 'right',
	'placeholder' => esc_html__( 'Default', 'justg' ),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'default'	=> esc_html__( 'Default', 'justg' ),
		'no' 		=> esc_html__( 'No Sidebar', 'justg' ),
		'left'  	=> esc_html__( 'Left Sidebar', 'justg' ),
		'right' 	=> esc_html__( 'Right Sidebar', 'justg' ),
	],
] );
Kirki::add_field( 'justg_config', [
	'type'        => 'select',
	'settings'    => 'justg_archives_sidebar_position',
	'label'       => esc_html__( 'Archives', 'justg' ),
	'section'     => 'sidebar_section',
	'default'     => 'right',
	'placeholder' => esc_html__( 'Default', 'justg' ),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'default'	=> esc_html__( 'Default', 'justg' ),
		'no' 		=> esc_html__( 'No Sidebar', 'justg' ),
		'left'  	=> esc_html__( 'Left Sidebar', 'justg' ),
		'right' 	=> esc_html__( 'Right Sidebar', 'justg' ),
	],
] );

//sidebar_style_section
Kirki::add_field('justg_config', [
	'type'        => 'slider',
	'settings'    => 'sidebar_width',
	'label'       => esc_html__('Sidebar Width', 'justg'),
	'section'     => 'sidebar_style_section',
	'default'     => 30,
	'transport'   => 'auto',
	'choices'     => [
		'min'  => 20,
		'max'  => 50,
		'step' => 1,
	],
	'output' => [
		[
			'element'  => '.widget-area',
			'property' => 'max-width',
			'units'    => '%',
			'media_query' => '@media (min-width: 768px)',
		],
	],
]);
Kirki::add_field('justg_config', [
	'type'        => 'background',
	'settings'    => 'background_widget_setting',
	'label'       => esc_html__('Background Block', 'justg'),
	'description' => esc_html__('Atur background (widget, heading, article, dll)', 'justg'),
	'section'     => 'sidebar_style_section',
	'default'     => [
		'background-color'      => '#ffffff',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => array('.widget-area > .widget'),
		],
	],
]);
Kirki::add_field('justg_config', [
	'type'        => 'typography',
	'settings'    => 'typography_widget_setting',
	'label'       => esc_html__('Typography', 'justg'),
	'section'     => 'sidebar_style_section',
	'default'     => [
		'font-family'    => 'Poppins',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#333333',
		'text-transform' => 'none',
		'text-align'     => 'left',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.widget-area > .widget',
		],
	],
]);