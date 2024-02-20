<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * DM Theme Boilerplate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dm_theme_boilerplate
 */

if ( ! function_exists( 'dm_theme_boilerplate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dm_theme_boilerplate_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on DM Theme Boilerplate, use a find and replace
	 * to change 'dm-theme-boilerplate' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dm-theme-boilerplate', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'dm-theme-boilerplate' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dm_theme_boilerplate_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

    function wp_boostrap_starter_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'admin_init', 'wp_boostrap_starter_add_editor_styles' );

}
endif;
add_action( 'after_setup_theme', 'dm_theme_boilerplate_setup' );


/**
 * Add Welcome message to dashboard
 */
function dm_theme_boilerplate_reminder(){
        $theme_page_url = 'https://afterimagedesigns.com/dm-theme-boilerplate/?dashboard=1';

            if(!get_option( 'triggered_welcomet')){
                $message = sprintf(__( 'Welcome to DM Theme Boilerplate Theme! Before diving in to your new theme, please visit the <a style="color: #fff; font-weight: bold;" href="%1$s" target="_blank">theme\'s</a> page for access to dozens of tips and in-depth tutorials.', 'dm-theme-boilerplate' ),
                    esc_url( $theme_page_url )
                );

                printf(
                    '<div class="notice is-dismissible" style="background-color: #6C2EB9; color: #fff; border-left: none;">
                        <p>%1$s</p>
                    </div>',
                    $message
                );
                add_option( 'triggered_welcomet', '1', '', 'yes' );
            }

}
add_action( 'admin_notices', 'dm_theme_boilerplate_reminder' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dm_theme_boilerplate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dm_theme_boilerplate_content_width', 1170 );
}
add_action( 'after_setup_theme', 'dm_theme_boilerplate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dm_theme_boilerplate_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'dm-theme-boilerplate' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'dm-theme-boilerplate' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'dm-theme-boilerplate' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'dm-theme-boilerplate' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'dm-theme-boilerplate' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'dm-theme-boilerplate' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'dm-theme-boilerplate' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'dm-theme-boilerplate' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'dm_theme_boilerplate_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function dm_theme_boilerplate_scripts() {
	// load bootstrap css

    wp_enqueue_style( 'dm-theme-boilerplate-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'dm-theme-boilerplate-fontawesome-cdn', get_template_directory_uri() . '/inc/assets/css/fontawesome.min.css' );

    wp_enqueue_style( 'dm-theme-boilerplate-fonts', 'https://fonts.googleapis.com/css2?family=Halant:wght@300;400;500;600;700&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap' );

	// load bootstrap css
	// load DM Theme Boilerplate styles
	wp_enqueue_style( 'dm-theme-boilerplate-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery');

	// load bootstrap js
    wp_enqueue_script('dm-theme-boilerplate-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true );
    wp_enqueue_script('dm-theme-boilerplate-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true );
    wp_enqueue_script('dm-theme-boilerplate-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dm_theme_boilerplate_scripts' );


function dm_theme_boilerplate_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( home_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "dm-theme-boilerplate" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "dm-theme-boilerplate" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "dm-theme-boilerplate" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter( 'the_password_form', 'dm_theme_boilerplate_password_form' );



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';



/**
 * Load plugin compatibility file.
 */
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}


require_once('config/shortcodes.php');
require_once('config/assets.php');
require_once('config/acf-style.php');
require_once('config/acf-option-pages.php');
require_once('config/post-types.php');
require_once('config/custom-taxonomies.php');
