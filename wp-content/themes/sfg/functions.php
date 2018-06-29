<?php
/**
 * sfg functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sfg
 */

if ( ! function_exists( 'sfg_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sfg_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sfg, use a find and replace
	 * to change 'sfg' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sfg', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'sfg' ),
		'secondary' => esc_html__( 'Secondary', 'sfg' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sfg_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'sfg_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sfg_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sfg_content_width', 640 );
}
add_action( 'after_setup_theme', 'sfg_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sfg_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sfg' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'sfg' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sfg_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sfg_scripts() {
	wp_enqueue_style( 'underscore-style', get_template_directory_uri() . '/css/underscore.css' );

	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );

	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri() . '/css/font-awesome.min.css' );

	wp_enqueue_style( 'sfg-style', get_template_directory_uri() . '/css/style.css' );

	wp_enqueue_style( 'sfg-custom-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap-scripts', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true );

	wp_enqueue_script( 'sfg-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '0.0.1', true );

	wp_enqueue_script( 'scrollreveal', get_template_directory_uri() . '/js/scrollreveal.min.js', array( 'jquery' ) );

	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/js/jquery.counterup.min.js', array( 'jquery' ) );

	wp_enqueue_script( 'waypoint', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array( 'jquery' ) );

	wp_enqueue_script( 'sfg-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'sfg-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sfg_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Register custom navigation walker.
 */
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

/**
 * Register an options page.
 */
require get_template_directory() . '/inc/options.php';

/**
 * Custom login logo
 */
function custom_logo() {
	echo '<style type="text/css">.login form { margin-top: 20px; margin-left: 0; padding: 26px 24px 46px; background: #fff; -webkit-box-shadow: 0 0 0; box-shadow: 0 0 0; border: 1px solid #002f9d; } .login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover { color: #002f9d; } .login #login_error, .login .message { border-color: #002f9d; } input#wp-submit { font-size: 16px; color: #fff; font-style: italic; font-family: Georgia, serif; font-weight: 400; display: inline-block; text-align: center; background: #002f9d; line-height: 45px; padding: 0 20px; text-shadow: 0 0 0; border-radius: 0; height: auto; box-shadow: 0 0 0; border: 0; } body { background: #fff; font-family: Lato, sans-serif; } h1 a { background-image: url( ' . get_field( 'logo_large', 'option' ) . ' ) !important; height: 71px !important; width: 100% !important; background-size: 100% !important; }</style>';
}
add_action( 'login_head', 'custom_logo' );
