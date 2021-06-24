<?php
/**
 * Bauman Theme Config File
 */

if ( ! function_exists( 'bauman_options_config' ) ) {

    function bauman_options_config( $wp_customize ){

		$bauman_before_default_section = 40; // Before Colors.
		
		/*** General Settings section ***/
		$wp_customize->add_section(
			'general_settings',
			array(
				'title'    => esc_html__( 'General Settings', 'bauman' ),
				'priority' => ($bauman_before_default_section - 7),
			)
		);
	
		// Enable AJAX
		$wp_customize->add_setting(
			'clapat_bauman_enable_ajax',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_enable_ajax',
			array(
				'label'   		=> esc_html__( 'Load Pages With Ajax', 'bauman' ),
				'description'  	=> esc_html__( 'When navigates to another page it loads the target content without reloading the current page.', 'bauman' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Enable Smooth Scroll
		$wp_customize->add_setting(
			'clapat_bauman_enable_smooth_scrolling',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_enable_smooth_scrolling',
			array(
				'label'   		=> esc_html__( 'Enable Smooth Scrolling', 'bauman' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Enable Preloader
		$wp_customize->add_setting(
			'clapat_bauman_enable_preloader',
			array(
				'default'           	=> 1,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_enable_preloader',
			array(
				'label'   		=> esc_html__( 'Enable Preloader', 'bauman' ),
				'description'  	=> esc_html__( 'Enable preloader mask while the page is loading.', 'bauman' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Enable Fullscreen Menu
		$wp_customize->add_setting(
			'clapat_bauman_enable_fullscreen_menu',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_enable_fullscreen_menu',
			array(
				'label'   		=> esc_html__( 'Enable Fullscreen menu on desktop', 'bauman' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_bauman_fullscreen_menu_text',
			array(
				'default'           		=> "",
				'sanitize_callback' 	=> 'wp_kses_post',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_fullscreen_menu_text',
			array(
				'label'   			=> esc_html__( 'Fullscreen menu text', 'bauman' ),
				'description'	=> esc_html__( ' Any HTML content in addition to menu items displayed in the fullscreen menu.', 'bauman' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'textarea',
			)
		);
		
		// Menu button caption
		$wp_customize->add_setting(
			'clapat_bauman_menu_btn_caption',
			array(
				'default'           	=> esc_html__( 'Menu', 'bauman' ),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_menu_btn_caption',
			array(
				'label'   		=> esc_html__( 'Menu button caption', 'bauman' ),
				'description'	=> esc_html__( 'Text preceding the burger menu button.', 'bauman' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'text',
			)
		);
		
		// Enable Back To Top button
		$wp_customize->add_setting(
			'clapat_bauman_enable_back_to_top',
			array(
				'default'          		=> 1,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_enable_back_to_top',
			array(
				'label'   		=> esc_html__( 'Enable Back To Top Button', 'bauman' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_bauman_back_to_top_caption',
			array(
				'default'          		=> esc_html__( 'Back Top', 'bauman' ),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_back_to_top_caption',
			array(
				'label'   		=> esc_html__( 'Back To Top Caption', 'bauman' ),
				'description'	=> esc_html__( 'Caption displayed next to the back to top button in the footer.', 'bauman' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'text',
			)
		);
		
		// Global background page type
		$wp_customize->add_setting(
			'clapat_bauman_default_page_bknd_type',
			array(
				'default'           	=> 'light-content',
				'sanitize_callback' 	=> 'bauman_sanitize_default_page_bknd_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_default_page_bknd_type',
			array(
				'label'   		=> esc_html__('Default Background Type', 'bauman'),
				'description'	=> esc_html__('Default background type for pages, posts and category pages. The background type set in page options will overwrite this option.', 'bauman'),
				'section' 		=> 'general_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'dark-content' => esc_html__('White', 'bauman'),
										'light-content' => esc_html__('Black', 'bauman') ),
			)
		);
		
		// Enable page title as hero caption
		$wp_customize->add_setting(
			'clapat_bauman_enable_page_title_as_hero',
			array(
				'default'           	=> 1,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_enable_page_title_as_hero',
			array(
				'label'   		=> esc_html__( 'Display Page Title When Hero Section Is Disabled', 'bauman' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Enable Magic Cursor
		$wp_customize->add_setting(
			'clapat_bauman_enable_magic_cursor',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_enable_magic_cursor',
			array(
				'label'   		=> esc_html__( 'Enable Magic Cursor', 'bauman' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		/*** End General Settings section ***/
		
		
		/*** Header Settings section ***/
		$wp_customize->add_section(
			'header_settings',
			array(
				'title'    => esc_html__( 'Header Settings', 'bauman' ),
				'priority' => ($bauman_before_default_section - 6),
			)
		);
		
		// Logo (default)
		$wp_customize->add_setting(
			'clapat_bauman_logo',
			array(
				'default'           		=> get_template_directory_uri() . '/images/logo.png',
				'sanitize_callback' 	=> 'esc_url_raw',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( 
			$wp_customize, 
			'clapat_bauman_logo', 
			array(
				'label'      => esc_html__( 'Header Logo', 'bauman' ),
				'description' => esc_html__('Upload your logo to be displayed at the left side of the header menu.', 'bauman'),
				'section'    => 'header_settings'
			)
		));
		
		// Logo (light version)
		$wp_customize->add_setting(
			'clapat_bauman_logo_light',
			array(
				'default'           	=> get_template_directory_uri() . '/images/logo-white.png',
				'sanitize_callback' 	=> 'esc_url_raw',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( 
			$wp_customize, 
			'clapat_bauman_logo_light', 
			array(
				'label'      => esc_html__( 'Header Logo Light', 'bauman' ),
				'description' => esc_html__('Light logo displayed on dark backgrounds.', 'bauman'),
				'section'    => 'header_settings'
			)
		));
		/*** End Header Settings section ***/
		
		
		/*** Footer Settings section ***/
		$wp_customize->add_section(
			'footer_settings',
			array(
				'title'    => esc_html__( 'Footer Settings', 'bauman' ),
				'priority' => ($bauman_before_default_section - 5),
			)
		);
		
		// Copyright
		$wp_customize->add_setting(
			'clapat_bauman_footer_copyright',
			array(
				'default'           	=> wp_kses_post( __('2020 Copyright <a target="_blank" href="https://www.clapat.com/themes/bauman/">Bauman Theme</a>.', 'bauman') ),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_footer_copyright',
			array(
				'label'   		=> esc_html__( 'Copyright text', 'bauman' ),
				'description'	=> esc_html__( 'This is the copyright text displayed in the footer.', 'bauman' ),
				'section' 		=> 'footer_settings',
				'type'    		=> 'textarea',
			)
		);
		
		// Social links
		$wp_customize->add_setting(
			'clapat_bauman_footer_social_links_prefix',
			array(
				'default'           	=> esc_html__( 'Follow Us', 'bauman' ),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_footer_social_links_prefix',
			array(
				'label'   		=> esc_html__( 'Social Links Prefix', 'bauman' ),
				'description'	=> esc_html__('Text preceding the social links.', 'bauman'),
				'section' 		=> 'footer_settings',
				'type'    		=> 'text',
			)
		);
		
		// Social Links Display
		$wp_customize->add_setting(
			'clapat_bauman_social_links_icons',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_social_links_icons',
			array(
				'label'   		=> esc_html__( 'Display Social Links As Fontawesome Icons', 'bauman' ),
				'description'  	=> esc_html__( 'If unchecked will display the social networks acronyms.', 'bauman' ),
				'section' 		=> 'footer_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		global $bauman_social_links;
		$social_network_ids = array_keys( $bauman_social_links );
		for( $idx = 1; $idx <= BAUMAN_MAX_SOCIAL_LINKS; $idx++ ){

			$wp_customize->add_setting(
				'clapat_bauman_footer_social_' . $idx,
				array(
					'default'           	=> 'Fb',
					'sanitize_callback' 	=> 'bauman_sanitize_social_links',
				)
			);
			
			$wp_customize->add_control(
				'clapat_bauman_footer_social_' . $idx,
				array(
					'label'   		=>  esc_html__('Social Network Name ', 'bauman' ) . $idx,
					'section' 		=> 'footer_settings',
					'type'    		=> 'select',
					'choices'   	=> $bauman_social_links,
				)
			);
			
			$wp_customize->add_setting(
				'clapat_bauman_footer_social_url_' . $idx,
				array(
					'default'           	=> '',
					'sanitize_callback' 	=> 'esc_url_raw',
				)
			);
			
			$wp_customize->add_control(
				'clapat_bauman_footer_social_url_' . $idx,
				array(
					'label'   		=>  esc_html__('Social Link URL ', 'bauman' ) . $idx,
					'section' 		=> 'footer_settings',
					'type'    		=> 'url',
				)
			);
			
		}
		/*** End Footer Settings section ***/
		
		/*** Portfolio Settings section ***/
		$wp_customize->add_section(
			'portfolio_settings',
			array(
				'title'    => esc_html__( 'Portfolio Settings', 'bauman' ),
				'priority' => ($bauman_before_default_section - 4),
			)
		);
		
		// Custom portfolio slug
		$wp_customize->add_setting(
			'clapat_bauman_portfolio_custom_slug',
			array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'bauman_sanitize_slug_field',
				'transport'         	=> 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_portfolio_custom_slug',
			array(
				'label'   		=> esc_html__( 'Custom Slug', 'bauman' ),
				'description'	=> esc_html__('If you want your portfolio post type to have a custom slug in the url, please enter it here. You will still have to refresh your permalinks after saving this! This is done by going to Settings > Permalinks and clicking save.', 'bauman'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Next caption
		$wp_customize->add_setting(
			'clapat_bauman_portfolio_next_caption',
			array(
				'default'           	=> esc_html__('Next Case', 'bauman'),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_portfolio_next_caption',
			array(
				'label'   		=> esc_html__( 'Next Project Caption', 'bauman' ),
				'description'	=> esc_html__('Caption of the next project in portfolio navigation.', 'bauman'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
						
		// 'All' portfolio category caption
		$wp_customize->add_setting(
			'clapat_bauman_portfolio_filter_all_caption',
			array(
				'default'           	=> esc_html__('All', 'bauman'),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_portfolio_filter_all_caption',
			array(
				'label'   		=> esc_html__('All Category Caption', 'bauman'),
				'description'	=> esc_html__('The caption the All category displaying all portfolio items in portfolio page templates.', 'bauman'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Responsive portfolio Show Filters caption
		$wp_customize->add_setting(
			'clapat_bauman_portfolio_show_filters_caption',
			array(
				'default'           	=> esc_html__('show filters', 'bauman'),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_portfolio_show_filters_caption',
			array(
				'label'   		=> esc_html__( 'Portfolio Grid - Show Filters Caption', 'bauman' ),
				'description'	=> esc_html__('Caption of the Show Filters button displayed in Portfolio Grid layout.', 'bauman'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Portfolio navigation order
		$wp_customize->add_setting(
			'clapat_bauman_portfolio_navigation_order',
			array(
				'default'           	=> 'forward',
				'sanitize_callback' 	=> 'bauman_sanitize_portfolio_navigation_order',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_portfolio_navigation_order',
			array(
				'label'   		=> esc_html__('Portfolio Items Navigation Order', 'bauman'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'forward' => esc_html__('Forward in time (next item is newer or loops to the oldest if current item is the newest)', 'bauman'),
											  'backward' => esc_html__('Backward in time (next item is older or loops to the newest if current item is the oldest)', 'bauman') ),
			)
		);
		/*** End Portfolio Settings section ***/
		
		/*** Blog Settings section ***/
		$wp_customize->add_section(
			'blog_settings',
			array(
				'title'    => esc_html__( 'Blog Settings', 'bauman' ),
				'priority' => ($bauman_before_default_section - 3),
			)
		);
		
		// Blog Layout
		$wp_customize->add_setting(
			'clapat_bauman_blog_layout',
			array(
				'default'           	=> 'blog-normal',
				'sanitize_callback' 	=> 'bauman_sanitize_blog_layout_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_blog_layout',
			array(
				'label'   		=> esc_html__('Blog Pages Layout', 'bauman'),
				'description'	=> esc_html__('The layout of all pages containing blog posts.', 'bauman'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 	'blog-minimal-lists' => esc_html__('Minimal Lists', 'bauman'),
														'blog-thumbnails-grid' => esc_html__('Thumbnails Grid', 'bauman') ),
			)
		);
		
		// Navigation caption
		$wp_customize->add_setting(
			'clapat_bauman_blog_next_post_caption',
			array(
				'default'           	=> esc_html__('Next', 'bauman'),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_blog_next_post_caption',
			array(
				'label'   		=> esc_html__('Next Post Caption', 'bauman'),
				'description'	=> esc_html__('Caption of the button linking to the next single blog post page.', 'bauman'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_bauman_blog_prev_posts_caption',
			array(
				'default'           	=> esc_html__('Prev', 'bauman'),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_blog_prev_posts_caption',
			array(
				'label'   		=> esc_html__('Previous Posts Page Caption', 'bauman'),
				'description'	=> esc_html__('Caption of the button linking to the previous blog posts page.', 'bauman'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_bauman_blog_next_posts_caption',
			array(
				'default'           	=> esc_html__('Next', 'bauman'),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_blog_next_posts_caption',
			array(
				'label'   		=> esc_html__('Next Posts Page Caption', 'bauman'),
				'description'	=> esc_html__('Caption of the button linking to the next blog posts page.', 'bauman'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		
		// Blog pages default title
		$wp_customize->add_setting(
			'clapat_bauman_blog_default_title',
			array(
				'default'           	=> esc_html__('Blog', 'bauman'),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_blog_default_title',
			array(
				'label'   		=> esc_html__('Default Posts Page Title', 'bauman'),
				'description'	=> esc_html__('Title of the default blog posts page. The default blog posts page is the page displaying blog posts when there is no front page set in Settings -> Reading.', 'bauman'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		/*** End Blog Settings section ***/
		
		/*** Map Settings section ***/
		$wp_customize->add_section(
			'map_settings',
			array(
				'title'    => esc_html__( 'Map Settings', 'bauman' ),
				'priority' => ($bauman_before_default_section - 2),
			)
		);
		
		// Map address
		$wp_customize->add_setting(
			'clapat_bauman_map_address',
			array(
				'default'           	=>  esc_html__('775 New York Ave, Brooklyn, Kings, New York 11203', 'bauman'),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_map_address',
			array(
				'label'   		=> esc_html__('Google Map Address', 'bauman'),
				'description'  	=> esc_html__('Example: 775 New York Ave, Brooklyn, Kings, New York 11203. Or you can enter latitude and longitude for greater precision. Example: 41.40338, 2.17403 (in decimal degrees - DDD)', 'bauman'),
				'section' 		=> 'map_settings',
				'type'    		=> 'text',
			)
		);
		
		// Map marker image
		$wp_customize->add_setting(
			'clapat_bauman_map_marker',
			array(
				'default'           	=> get_template_directory_uri() . '/images/marker.png',
				'sanitize_callback' 	=> 'esc_url_raw',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( 
			$wp_customize, 
			'clapat_bauman_map_marker', 
			array(
				'label'      => esc_html__( 'Map Marker', 'bauman' ),
				'description' => esc_html__('Please choose an image file for the marker.', 'bauman'),
				'section'    => 'map_settings'
			)
		));
		
		// Map zoom
		$wp_customize->add_setting(
			'clapat_bauman_map_zoom',
			array(
				'default'           	=> 16,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_map_zoom',
			array(
				'label'   		=> esc_html__( 'Map Zoom Level', 'bauman' ),
				'description'  	=> esc_html__('Higher number will be more zoomed in.', 'bauman'),
				'section' 		=> 'map_settings',
				'type'    		=> 'number',
				'input_attrs' 	=> array( 'min' => 0, 'max' => 30, 'step'  => 1 )
			)
		);
		
		// Pop-up marker title
		$wp_customize->add_setting(
			'clapat_bauman_map_company_name',
			array(
				'default'           	=> esc_html__('Bauman', 'bauman'),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_map_company_name',
			array(
				'label'   		=> esc_html__('Pop-up marker title', 'bauman'),
				'section' 		=> 'map_settings',
				'type'    		=> 'text',
			)
		);
		
		// Pop-up marker text
		$wp_customize->add_setting(
			'clapat_bauman_map_company_info',
			array(
				'default'           	=> esc_html__('Here we are. Come to drink a coffee!', 'bauman'),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_map_company_info',
			array(
				'label'   		=> esc_html__('Pop-up marker text', 'bauman'),
				'section' 		=> 'map_settings',
				'type'    		=> 'text',
			)
		);
		
		// Map type
		$wp_customize->add_setting(
			'clapat_bauman_map_type',
			array(
				'default'           	=> 'satellite',
				'sanitize_callback' 	=> 'bauman_sanitize_map_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_map_type',
			array(
				'label'   		=> esc_html__('Map Type', 'bauman'),
				'description'	=> esc_html__('Set the map type as road map or satellite.', 'bauman'),
				'section' 		=> 'map_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'satellite' => esc_html__('Satellite', 'bauman'),
										'roadmap' => esc_html__('Roadmap', 'bauman') ),
			)
		);
		
		// Google maps API key
		$wp_customize->add_setting(
			'clapat_bauman_map_api_key',
			array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_map_api_key',
			array(
				'label'   		=> esc_html__('Google Maps API Key', 'bauman'),
				'description'	=> esc_html__('Without it, the map may not be displayed. If you have an api key paste it here. More information on how to obtain a google maps api key: https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key', 'bauman'),
				'section' 		=> 'map_settings',
				'type'    		=> 'text',
			)
		);
		/*** End Map Settings section ***/
		
		/*** Error Page section ***/
		$wp_customize->add_section(
			'error_page_settings',
			array(
				'title'    => esc_html__( 'Error Page Settings', 'bauman' ),
				'priority' => ($bauman_before_default_section - 1),
			)
		);
		
		// Error page title
		$wp_customize->add_setting(
			'clapat_bauman_error_title',
			array(
				'default'           	=> esc_html__('404', 'bauman'),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_error_title',
			array(
				'label'   		=> esc_html__('Error Page Title', 'bauman'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// Error page info
		$wp_customize->add_setting(
			'clapat_bauman_error_info',
			array(
				'default'           	=> esc_html__('The page you are looking for could not be found.', 'bauman'),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_error_info',
			array(
				'label'   		=> esc_html__('Error Page Info Text', 'bauman'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// Error back button
		$wp_customize->add_setting(
			'clapat_bauman_error_back_button',
			array(
				'default'           	=> esc_html__('Home Page', 'bauman'),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_error_back_button',
			array(
				'label'   		=> esc_html__('Back Button Caption', 'bauman'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// Error back button - caption on hover
		$wp_customize->add_setting(
			'clapat_bauman_error_back_button_hover_caption',
			array(
				'default'           	=> esc_html__('Go Back', 'bauman'),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_error_back_button_hover_caption',
			array(
				'label'   		=> esc_html__('Back Button Caption On Hover', 'bauman'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// Error back button url
		$wp_customize->add_setting(
			'clapat_bauman_error_back_button_url',
			array(
				'default'           	=> esc_url( get_home_url() ),
				'sanitize_callback' 	=> 'bauman_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_error_back_button_url',
			array(
				'label'   		=> esc_html__('Back Button URL', 'bauman'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// 404 page background type
		$wp_customize->add_setting(
			'clapat_bauman_error_page_bknd_type',
			array(
				'default'           	=> 'light-content',
				'sanitize_callback' 	=> 'bauman_sanitize_error_page_bknd_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_bauman_error_page_bknd_type',
			array(
				'label'   		=> esc_html__('Background Type', 'bauman'),
				'description'	=> esc_html__('Background type for the 404 error page.', 'bauman'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'dark-content' 	=> esc_html__('White', 'bauman'),
										'light-content' => esc_html__('Black', 'bauman') ),
			)
		);
		/*** End Error Page Settings section ***/
	}

	add_action( 'customize_register', 'bauman_options_config' );
}

/**
 * Sanitize a text or textarea field
 *
 * @param string $input - the text
 */
function bauman_sanitize_text_field( $input ) {
	
	return wp_kses_post( $input );
}

/**
 * Sanitize a custom slug field
 *
 * @param string $input - the input slug
 */
function bauman_sanitize_slug_field( $input ) {
	
	return sanitize_title( $input );
}


/**
 * Sanitize the social network options.
 *
 * @param string $input social network id.
 */
function bauman_sanitize_social_links( $input ) {
	
	global $bauman_social_links;
	$valid = array_keys( $bauman_social_links );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'Fb';
}


/**
 * Sanitize the portfolio navigation order.
 *
 * @param string $input - portfolio navigation order
 */
function bauman_sanitize_portfolio_navigation_order( $input ) {
	
	$valid = array( 'forward', 'backward' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'forward';
}

/**
 * Sanitize the map type
 *
 * @param string $input - map type
 */
function bauman_sanitize_map_type( $input ) {
	
	$valid = array( 'satellite', 'roadmap' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'satellite';
}

/**
 * Sanitize the global page background type
 *
 * @param string $input - background type
 */
function bauman_sanitize_default_page_bknd_type( $input ) {
	
	$valid = array( 'dark-content', 'light-content' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'dark-content';
}

/**
 * Sanitize the error page background type
 *
 * @param string $input - background type
 */
function bauman_sanitize_error_page_bknd_type( $input ) {
	
	$valid = array( 'dark-content', 'light-content' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'dark-content';
}

/**
 * Sanitize the blog pages layout type
 *
 * @param string $input - layout type
 */
function bauman_sanitize_blog_layout_type( $input ) {
	
	$valid = array( 'blog-minimal-lists', 'blog-thumbnails-grid');
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'blog-normal';
}