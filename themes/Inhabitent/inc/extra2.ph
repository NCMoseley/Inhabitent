function inhabitent_login_logo() { ?>
    <style type="text/css">
            #login h1 a, .login h1 a {
                    background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logos/inhabitent-logo-text-dark.svg);
                    height:65px;
                    width:320px;
                    background-size: 320px 65px;
                    background-repeat: no-repeat;
                                padding-bottom: 30px;
            }
    </style>';
}<?php 

add_action( 'login_enqueue_scripts', 'inhabitent_login_logo' );

function the_url( $url ) {
    return get_bloginfo( ‘url’ );
}
add_filter( ‘login_headerurl’, ‘the_url’ );




function my_custom_login_logo() {
    
    echo '<style type="text/css">                                                                   
            h1 a { background-image:url('.get_stylesheet_directory_uri().'/images/logos/inhabitent-logo-text-dark.svg) !important; 
                background-size: contain !important; 
            height: 50px !important; width: 100% !important; margin-left: -40px;}                            
    </style>';
}
add_action('login_head', 'my_custom_login_logo');
function the_url( $url ) {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'the_url' );

