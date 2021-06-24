<?php
/**
 * Created by Clapat.
 * Date: 04/02/19
 * Time: 6:21 AM
 */

// register navigation menus
if ( ! function_exists( 'bauman_register_nav_menus' ) ){
	
	function bauman_register_nav_menus() {
		
	  register_nav_menus(
		array(
		  'primary-menu' => esc_html__( 'Primary Menu', 'bauman')
		)
	  );
	}
}
add_action( 'init', 'bauman_register_nav_menus' );
 
// custom excerpt length
if( !function_exists('bauman_custom_excerpt_length') ){

    function bauman_custom_excerpt_length( $length ) {

        return intval( bauman_get_theme_options( 'clapat_bauman_blog_excerpt_length' ) );
    }
}

// theme setup
if ( ! function_exists( 'bauman_theme_setup' ) ){

    function bauman_theme_setup() {

        // Set content width
        if ( ! isset( $content_width ) ) $content_width = 1180;

        // add support for multiple languages
        load_theme_textdomain( 'bauman', get_template_directory() . '/languages' );
			
	}

} // bauman_theme_setup

/**
 * Tell WordPress to run bauman_theme_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'bauman_theme_setup' );