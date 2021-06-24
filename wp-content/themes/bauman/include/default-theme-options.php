<?php

if( !isset( $bauman_default_theme_options ) ){
	
	$bauman_default_theme_options = array();

	$bauman_default_theme_options['clapat_bauman_enable_ajax'] = 0;
	$bauman_default_theme_options['clapat_bauman_enable_smooth_scrolling'] = 0;
	$bauman_default_theme_options['clapat_bauman_enable_preloader'] = 1;
	$bauman_default_theme_options['clapat_bauman_enable_fullscreen_menu'] = 0;
	$bauman_default_theme_options['clapat_bauman_fullscreen_menu_text'] = "";
	$bauman_default_theme_options['clapat_bauman_enable_back_to_top'] = 1;
	$bauman_default_theme_options['clapat_bauman_back_to_top_caption'] = esc_html__( 'Back Top', 'bauman' );
	$bauman_default_theme_options['clapat_bauman_menu_btn_caption'] = esc_html__( 'Menu', 'bauman' );
	$bauman_default_theme_options['clapat_bauman_default_page_bknd_type'] = 'light-content';
	$bauman_default_theme_options['clapat_bauman_enable_page_title_as_hero'] = 1;
	$bauman_default_theme_options['clapat_bauman_enable_magic_cursor'] = 0;
	$bauman_default_theme_options['clapat_bauman_logo'] = esc_url( get_template_directory_uri() . '/images/logo.png' );
	$bauman_default_theme_options['clapat_bauman_logo_light'] = esc_url( get_template_directory_uri() . '/images/logo-white.png' );
	$bauman_default_theme_options['clapat_bauman_footer_copyright'] = wp_kses_post( __('2020 Copyright <a target="_blank" href="https://www.clapat.com/themes/bauman/">Bauman Theme</a>.', 'bauman') );
	$bauman_default_theme_options['clapat_bauman_footer_social_links_prefix'] = esc_html__( 'Follow Us', 'bauman' );
	$bauman_default_theme_options['clapat_bauman_social_links_icons'] = 0;
	global $bauman_social_links;
	$social_network_ids = array_keys( $bauman_social_links );
	for( $idx = 1; $idx <= BAUMAN_MAX_SOCIAL_LINKS; $idx++ ){

		$bauman_default_theme_options['clapat_bauman_footer_social_' . $idx] = 'Fb';
		$bauman_default_theme_options['clapat_bauman_footer_social_url_' . $idx] = '';
	}
	$bauman_default_theme_options['clapat_bauman_portfolio_custom_slug'] = '';
	$bauman_default_theme_options['clapat_bauman_portfolio_next_caption'] = esc_html__('Next Project', 'bauman');
	$bauman_default_theme_options['clapat_bauman_portfolio_filter_all_caption'] = esc_html__('All', 'bauman');
	$bauman_default_theme_options['clapat_bauman_portfolio_show_filters_caption'] = esc_html__('show filters', 'bauman');
	$bauman_default_theme_options['clapat_bauman_portfolio_navigation_order'] = 'forward';
	$bauman_default_theme_options['clapat_bauman_blog_layout'] = 'blog-minimal-lists';
	$bauman_default_theme_options['clapat_bauman_blog_next_post_caption'] = esc_html__('Next', 'bauman');
	$bauman_default_theme_options['clapat_bauman_blog_prev_posts_caption'] = esc_html__('Prev', 'bauman');
	$bauman_default_theme_options['clapat_bauman_blog_next_posts_caption'] = esc_html__('Next', 'bauman');
	$bauman_default_theme_options['clapat_bauman_blog_default_title'] = esc_html__('Blog', 'bauman');
	$bauman_default_theme_options['clapat_bauman_map_address'] = esc_html__('775 New York Ave, Brooklyn, Kings, New York 11203', 'bauman');
	$bauman_default_theme_options['clapat_bauman_map_marker'] = esc_url( get_template_directory_uri() . '/images/marker.png');
	$bauman_default_theme_options['clapat_bauman_map_zoom'] = 16;
	$bauman_default_theme_options['clapat_bauman_map_company_name'] = esc_html__('Bauman', 'bauman');
	$bauman_default_theme_options['clapat_bauman_map_company_info'] = esc_html__('Here we are. Come to drink a coffee!', 'bauman');
	$bauman_default_theme_options['clapat_bauman_map_type'] = 'satellite';
	$bauman_default_theme_options['clapat_bauman_map_api_key'] = '';
	$bauman_default_theme_options['clapat_bauman_error_title'] = esc_html__('404', 'bauman');
	$bauman_default_theme_options['clapat_bauman_error_info'] = esc_html__('The page you are looking for could not be found.', 'bauman');
	$bauman_default_theme_options['clapat_bauman_error_back_button'] = esc_html__('Home Page', 'bauman');
	$bauman_default_theme_options['clapat_bauman_error_back_button_hover_caption'] = esc_html__('Go Back', 'bauman');
	$bauman_default_theme_options['clapat_bauman_error_back_button_url'] = esc_url( get_home_url() );
	$bauman_default_theme_options['clapat_bauman_error_page_bknd_type'] = 'light-content';
}

if( !class_exists('Clapat\Bauman\Metaboxes\Meta_Boxes') ){
	
	$bauman_default_meta_options = array (
									"bauman-opt-page-bknd-color" =>"light-content", 
									"bauman-opt-page-enable-hero" =>"", 
									"bauman-opt-page-hero-caption-title" =>"", 
									"bauman-opt-page-hero-caption-subtitle" =>"", 
									"bauman-opt-page-enable-navigation" =>"", 
									"bauman-opt-page-navigation-caption-title" =>"", 
									"bauman-opt-page-navigation-next-url" =>"", 
									"bauman-opt-page-navigation-next-title" =>"", 
									"bauman-opt-page-navigation-next-subtitle" =>"", 
									"bauman-opt-page-portfolio-mixed-items" =>"", 
									"bauman-opt-page-showcase-filter-category" =>"", 
									"bauman-opt-blog-bknd-color" =>"light-content", 
									"bauman-opt-portfolio-bknd-color" =>"light-content", 
									"bauman-opt-portfolio-showcase-include" =>"yes", 
									"bauman-opt-portfolio-hero-img" => "", 
									"bauman-opt-portfolio-video" =>"", 
									"bauman-opt-portfolio-video-webm" =>"", 
									"bauman-opt-portfolio-video-mp4" =>"", 
									"bauman-opt-portfolio-hero-caption-title" =>"", 
									"bauman-opt-portfolio-hero-caption-subtitle" =>"", 
									"bauman-opt-portfolio-hero-scroll-caption" => esc_html__('Scroll Down', 'bauman'),
									"bauman-opt-portfolio-hero-project-info" => "",
									"bauman-opt-portfolio-hero-position" =>"fixed-onscroll", 
								);
}

?>
