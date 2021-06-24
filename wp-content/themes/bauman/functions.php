<?php

require_once ( get_template_directory() . '/include/defines.php' );

// Metaboxes
require_once ( get_template_directory() . '/include/metabox-config.php');

// Customizer options
require_once( get_template_directory() . '/include/admin-config.php' );

// Load the default options
require_once( get_template_directory() . '/include/default-theme-options.php' );

if( !function_exists('bauman_get_theme_options') ){

	function bauman_get_theme_options( $option_id ){

		global $bauman_default_theme_options;
		
		$default_value = false;
		if ( isset( $bauman_default_theme_options ) && isset( $bauman_default_theme_options[$option_id] ) ){

			$default_value  = $bauman_default_theme_options[$option_id];

		}

		return get_theme_mod( $option_id, $default_value );

	}
}

if( !function_exists('bauman_get_post_meta') ){

	function bauman_get_post_meta( $opt_name = "", $thePost = array(), $meta_key = "", $def_val = "" ) {

		if( class_exists('Clapat\Bauman\Metaboxes\Meta_Boxes') ){
			
			return Clapat\Bauman\Metaboxes\Meta_Boxes::get_metabox_value( $thePost, $meta_key );
		}
		
		return "";
	}
}

if( !function_exists('bauman_get_current_query') ){

	function bauman_get_current_query(){

		global $bauman_posts_query;
		global $wp_query;
		if( $bauman_posts_query == null ){
			return $wp_query;
		}
		else{
			return $bauman_posts_query;
		}

	}
}

// Hero properties
require_once ( get_template_directory() . '/include/hero-properties.php');
if( !function_exists('bauman_get_hero_properties') ){

	function bauman_get_hero_properties( $post_type ){

		global $bauman_hero_properties;
		if( !isset( $bauman_hero_properties ) || ( $bauman_hero_properties == null ) ){
			$bauman_hero_properties = new BaumanHeroProperties();
		}
		$bauman_hero_properties->getProperties( $post_type );
		return $bauman_hero_properties;
	}
}

// Portfolio Masonry images
if( !function_exists('bauman_portfolio_images') ){

	function bauman_portfolio_images( $portfolio_images_param = null ){

		global $bauman_portfolio_images;
		if( isset( $portfolio_images_param ) && ( $portfolio_images_param != null ) ){
			
			$bauman_portfolio_images = $portfolio_images_param;
		}
		
		return $bauman_portfolio_images;
	}
}

// Portfolio Next Project Image
if( !function_exists('bauman_portfolio_next_project_image') ){

	function bauman_portfolio_next_project_image( $portfolio_image_param = null ){

		global $bauman_portfolio_image_param;
		if( isset( $portfolio_image_param ) && ( $portfolio_image_param != null ) ){
			
			$bauman_portfolio_image_param = $portfolio_image_param;
		}
		
		return $bauman_portfolio_image_param;
	}
}
// Support for automatic plugin installation
require_once(  get_template_directory() . '/components/helper_classes/tgm-plugin-activation/class-tgm-plugin-activation.php');
require_once(  get_template_directory() . '/components/helper_classes/tgm-plugin-activation/required_plugins.php');

// Widgets
require_once(  get_template_directory() . '/components/widgets/widgets.php');

// Util functions
require_once ( get_template_directory() . '/include/util_functions.php');

// Add theme support
require_once ( get_template_directory() . '/include/theme-support-config.php');

// Theme setup
require_once ( get_template_directory() . '/include/setup-config.php');

// Enqueue scripts
require_once ( get_template_directory() . '/include/scripts-config.php');

// Hooks
require_once ( get_template_directory() . '/include/hooks-config.php');

// Blog comments and pagination
require_once ( get_template_directory() . '/include/blog-config.php');

// Visual Composer
if ( function_exists( 'vc_set_as_theme' ) ) {
	require_once ( get_template_directory() . '/include/vc-config.php');
}

// Editor styles
add_editor_style( 'style-editor.css' );
?>
