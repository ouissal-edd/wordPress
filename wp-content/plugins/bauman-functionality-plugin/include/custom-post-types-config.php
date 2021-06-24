<?php
/**
 * Created by Clapat
 * Date: 17/08/19
 */

// Register custom post types
if ( ! function_exists( 'clapat_bauman_custom_types' ) ){

    function clapat_bauman_custom_types() {

        global $bauman_theme_options;

        $custom_slug = null;
		if( function_exists( 'bauman_get_theme_options' ) ){
			$bauman_custom_slug_option = bauman_get_theme_options( 'clapat_bauman_portfolio_custom_slug' );
			if( !empty( $bauman_custom_slug_option ) ){
				
				$custom_slug = $bauman_custom_slug_option;
			}
		}
		
        register_post_type(
            'bauman_portfolio',
            array(
                'labels' => array(
                    'name' => __('Portfolio', 'clapat_bauman_plugin_text_domain'),
                    'singular_name' => __('Portfolio', 'clapat_bauman_plugin_text_domain'),
                    'all_items' => __('Portfolio Items', 'clapat_bauman_plugin_text_domain'),
                    'add_new' => __( 'Add New', 'clapat_bauman_plugin_text_domain' ),
                    'add_new_item' => __( 'Add New Portfolio Item', 'clapat_bauman_plugin_text_domain' ),
                    'edit_item' => __( 'Edit Portfolio Item', 'clapat_bauman_plugin_text_domain' ),
                    'new_item' => __( 'New Portfolio Item', 'clapat_bauman_plugin_text_domain' ),
                    'view_item' => __( 'View Portfolio Item', 'clapat_bauman_plugin_text_domain' ),
                    'search_items' => __( 'Search Portfolio Items', 'clapat_bauman_plugin_text_domain' ),
                    'not_found' => __( 'No portfolio items found', 'clapat_bauman_plugin_text_domain' ),
                    'not_found_in_trash' => __( 'No portfolio items found in Trash', 'clapat_bauman_plugin_text_domain' ),
                    'menu_name' => __( 'Portfolio', 'clapat_bauman_plugin_text_domain' ),
                ),
                'rewrite' => array('slug' => $custom_slug, 'with_front' => false),
                'description' => 'Add your Portfolio',
                'menu_icon' =>  'dashicons-portfolio',
                'public' => true,
				'show_in_rest' => true,
                'supports' => array('title', 'editor'),
            )
        );

		register_taxonomy( 	'portfolio_category', 
										'bauman_portfolio', 
										array(
											'hierarchical' => true, 
											'label' => __('Categories', 'clapat_bauman_plugin_text_domain'), 
											'query_var' => true, 
											'show_in_rest' => true,
											'rewrite' => true
									));
    }

}
add_action('init', 'clapat_bauman_custom_types');


// refresh rewrite rules for custom portfolio slugs
if ( ! function_exists( 'clapat_bauman_activation_hook' ) ){

    function clapat_bauman_activation_hook() {

		clapat_bauman_custom_types();
		
        flush_rewrite_rules();
    }
}
register_activation_hook( __FILE__, 'clapat_bauman_activation_hook' );


?>
