<?php
/*
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package inhabitents_Theme
 */
// xxxxxxxxxxxxxxxxxxxxxx to solve login issue
// add_action("login_form", "kill_wp_attempt_focus_start");
// function kill_wp_attempt_focus_start() {
//     ob_start("kill_wp_attempt_focus_replace");
// }

// function kill_wp_attempt_focus_replace($html) {
//     return preg_replace("/d.value = '';/", "", $html);
// }

// add_action("login_footer", "kill_wp_attempt_focus_end");
// function kill_wp_attempt_focus_end() {
//     ob_end_flush();
// }
// xxxxxxxxxxxxxxxxxxxxxx
if ( ! function_exists( 'inhabitents_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function inhabitents_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' ),
	) );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif; // inhabitents_setup
add_action( 'after_setup_theme', 'inhabitents_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function inhabitents_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'inhabitents_content_width', 640 );
}
add_action( 'after_setup_theme', 'inhabitents_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function inhabitents_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html( 'Sidebar' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'inhabitents_widgets_init' );

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function inhabitents_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'inhabitents_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function inhabitents_scripts() {
	
	wp_enqueue_style( 'tent-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery');

	wp_enqueue_script( 'inhabitents-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20130115', true );

    wp_enqueue_script( 'inhabitents-search', get_template_directory_uri() . '/build/js/searchandswitch.min.js', array('jquery'), false, true );

	wp_enqueue_script( 'font-awesome-cdn','https://use.fontawesome.com/6317ca7a01.js', array(), '4.7', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function tax_title( $query ) {

if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'products' ) ) {

		$query->set( 'posts_per_page', '6' );
		$query->set( 'orderby', 'title' );
        $query->set( 'order', 'DESC' );
	}

}


add_action( 'wp_enqueue_scripts', 'inhabitents_scripts' );

add_action( 'pre_get_posts', 'tax_title' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

add_action( 'pre_get_posts',  'set_posts_per_page'  );
function set_posts_per_page( $query ) {

  global $wp_the_query;

  if ( ( ! is_admin() ) && ( $query === $wp_the_query ) && ( $query->is_search() ) ) {
    $query->set( 'posts_per_page', 3 );
  }
  elseif ( ( ! is_admin() ) && ( $query === $wp_the_query ) && ( $query->is_archive() ) ) {
    $query->set( 'posts_per_page', 16 );
  }
  // Etc..

  return $query;
}

// remove more broad classes for less styling conflicts
function remove_broad_classes( $classes ) {
	if ( is_front_page() || is_page_template( 'page_templates/about.php' ) ) {
		unset( $classes[array_search( 'main-navigation', $classes)] ); 
	}
	if ( is_post_type_archive( 'product' ) || is_tax( 'product-type' ) ) {
		array_push($classes, 'fade-in-b'); 
	}
	if ( is_singular( 'product' ) ) {
		array_push($classes, 'fade-in-b'); 
	}
return $classes;
}
add_filter('body_class', 'remove_broad_classes' );

function add_nav_class() {
    if (!( is_front_page() || is_page_template( 'page-templates/about.php' ) )) {
        return "fixed";
    }
}