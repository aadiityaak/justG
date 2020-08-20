<?php
/**
 * Theme basic setup
 *
 * @package justg
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'justg_setup' );

if ( ! function_exists( 'justg_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function justg_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'fl-theme-builder-headers' );
		add_theme_support( 'fl-theme-builder-footers' );
		add_theme_support( 'fl-theme-builder-parts' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'justg' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		/*
		 * Adding Thumbnail basic support
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Adding support for Widget edit icons in customizer
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'justg_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Set up the WordPress Theme logo feature.
		add_theme_support( 'custom-logo' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Check and setup theme default settings.
		justg_setup_theme_default_settings();

	}
}

function justg_header_footer_render() {

	if ( ! class_exists( 'FLThemeBuilderLayoutData' ) ) {
		return;
	}

	// Get the header ID.
	$header_ids = FLThemeBuilderLayoutData::get_current_page_header_ids();

	// If we have a header, remove the theme header and hook in Theme Builder's.
	if ( ! empty( $header_ids ) ) {
		remove_action( 'justg_do_header', 'justg_the_header_content' );
		add_action( 'justg_do_header', 'FLThemeBuilderLayoutRenderer::render_header' );
	}

	// Get the footer ID.
	$footer_ids = FLThemeBuilderLayoutData::get_current_page_footer_ids();

	// If we have a footer, remove the theme footer and hook in Theme Builder's.
	if ( ! empty( $footer_ids ) ) {
		remove_action( 'justg_do_footer', 'justg_the_footer_content' );
		add_action( 'justg_do_footer', 'FLThemeBuilderLayoutRenderer::render_footer' );
	}
}
add_action( 'wp', 'justg_header_footer_render' );

add_filter( 'fl_theme_builder_part_hooks', 'justg_register_part_hooks' );
function justg_register_part_hooks() {
  return array(
    array(
      'label' => 'Header',
      'hooks' => array(
        'justg_before_header' => 'Before Header',
        'justg_after_header'  => 'After Header',
      )
    ),
    array(
      'label' => 'Content',
      'hooks' => array(
        'justg_before_content' => 'Before Content',
        'justg_after_content'  => 'After Content',
      )
    ),
    array(
      'label' => 'Footer',
      'hooks' => array(
        'justg_before_footer' => 'Before Footer',
        'justg_after_footer'  => 'After Footer',
      )
    )
  );
}


function justg_head(){
    $favicon = get_theme_mod( 'favicon_url', '' );
    echo "<link rel='shortcut icon' href='$favicon' sizes='32x32' type='image/x-icon'>";
   
    $link_setting = get_theme_mod( 'link_setting' );
    $link_color   = $link_setting['link'];
    $hover_color  = $link_setting['hover'];
    $active_color = $link_setting['active'];
    
    ?>
    <style>
    a, a:link, a:visited {
        color: <?php echo $link_color; ?>;
    }
    a:hover {
        color: <?php echo $hover_color; ?>;
    }
    a:active {
        color: <?php echo $active_color; ?>;
    }
    .btn-primary {
        background-color: <?php echo $link_color; ?>;
        border-color: <?php echo $link_color; ?>;
    }
    .btn-primary:hover {
        background-color: <?php echo $hover_color; ?>;
        border-color: <?php echo $hover_color; ?>;
    }
    .btn-primary:active {
        background-color: <?php echo $active_color; ?>;
        border-color: <?php echo $active_color; ?>;
    }
    </style>
    <?php
}
add_action( 'wp_head', 'justg_head' );

function justg_customizer( $wp_customize ) {
    // $wp_customize->remove_panel( 'widgets' );
    $wp_customize->remove_section("colors");
    $wp_customize->remove_section("background_image");
    $wp_customize->remove_section("static_front_page");
}
add_action( 'customize_register', 'justg_customizer' );

/**
 * woocomerce
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#47; ',
            'wrap_before' => '<nav class="woocommerce-breadcrumb p-4 bg-white mb-1" itemprop="breadcrumb">',
            'wrap_after'  => '</nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'justg' ),
        );
}