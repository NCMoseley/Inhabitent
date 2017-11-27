<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Inhabitents_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function Inhabitents_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'Inhabitents_body_classes' );

function my_custom_login_logo() {
    
    echo '<style type="text/css">                                                                   
            h1 a { background-image:url('.get_stylesheet_directory_uri().'/images/logos/inhabitent-logo-text-dark.svg) !important; 
                background-size: contain !important; 
            height: 50px !important; width: 100% !important; margin-left: -40px;}                            
    </style>';
}
add_action('login_head', 'my_custom_login_logo');

function the_url( $url ) {
    return home_url();
}
add_filter( 'login_headerurl', 'the_url' );

function inhabitent_logo_url_title(){
	return "Powered By Inhabitent";
}
add_filter( 'login_headertitle', 'inhabitent_logo_url_title' );


function inhabitent_dynamic_css() {
    if ( ! is_page_template( 'page-templates/about.php')) {
        return;
    }
    $image = CFS()->get('about_header_image') ;
    if (! $image) {
        return;
    }
    $hero_css = ".page-template-about .entry-header {
        background:
            linear-gradient( to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.4) 100% ),
            url({$image}) no-repeat center bottom;
            background-size: cover, cover;
           
    }";
    wp_add_inline_style( 'tent-style', $hero_css );
}
 add_action( 'wp_enqueue_scripts', 'inhabitent_dynamic_css' );