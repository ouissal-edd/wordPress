<?php

// You may replace $redux_opt_name with a string if you wish. If you do so, change loader.php
// as well as all the instances below.
$redux_opt_name = 'clapat_' . BAUMAN_THEME_ID . '_theme_options';


if ( !function_exists( "bauman_add_metaboxes" ) ){

    function bauman_add_metaboxes( $metaboxes ) {

    $metaboxes = array();


    ////////////// Page Options //////////////
    $page_options = array();
    $page_options[] = array(
        'title'         => esc_html__('General', 'bauman'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-wrench',
        'desc'          => esc_html__('Options concerning all page templates.', 'bauman'),
        'fields'        => array(
			
			array(
                'id'        => 'bauman-opt-page-bknd-color',
                'type'      => 'select',
                'title'     => esc_html__('Background color', 'bauman'),
				'desc'      => esc_html__('Background color for this page.', 'bauman'),
                'options'   => array(
                    'dark-content' 	=> esc_html__('White', 'bauman'),
                    'light-content' => esc_html__('Black', 'bauman')

                ),
				'default'   => 'light-content',
            ),
			
			/**************************HERO SECTION OPTIONS**************************/
			array(
                'id'        => 'bauman-opt-page-enable-hero',
                'type'      => 'switch',
                'title'     => esc_html__('Display Hero Section', 'bauman'),
                'desc'      => esc_html__('Enable "hero" section displayed immediately below page header. Showcase and Carousel pages do not have a hero section.', 'bauman'),
				'on'       => esc_html__('Yes', 'bauman'),
				'off'      => esc_html__('No', 'bauman'),
                'default'   => false
            ),

			array(
                'id'        => 'bauman-opt-page-hero-caption-title',
                'type'      => 'text',
				'required'  => array( 'bauman-opt-page-enable-hero', '=', true ),
                'title'     => esc_html__('Hero Caption Title', 'bauman'),
                'subtitle'  => esc_html__('Caption title displayed over hero section.', 'bauman'),
	        ),

			array(
                'id'        => 'bauman-opt-page-hero-caption-subtitle',
                'type'      => 'textarea',
				'required'  => array( 'bauman-opt-page-enable-hero', '=', true ),
                'title'     => esc_html__('Hero Caption Subtitle', 'bauman'),
                'subtitle'  => esc_html__('Caption subtitle displayed over hero section. Enter plain text.', 'bauman'),
                'validate'  => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
	        ),

			/**************************END - HERO SECTION OPTIONS**************************/
			
			/**************************PAGE NAVIGATION SECTION OPTIONS**************************/
			array(
                'id'        => 'bauman-opt-page-enable-navigation',
                'type'      => 'switch',
                'title'     => esc_html__('Enable Page Navigation Section', 'bauman'),
                'desc'      => esc_html__('Enable page navigation section displayed above the footer. Available only in Default, Portfolio and Portfolio Mixed templates.', 'bauman'),
				'on'       => esc_html__('Yes', 'bauman'),
				'off'      => esc_html__('No', 'bauman'),
                'default'   => false
            ),
			
			array(
                'id'        => 'bauman-opt-page-navigation-caption-title',
                'type'      => 'text',
				'required'  => array( 'bauman-opt-page-enable-navigation', '=', true ),
                'title'     => esc_html__('Navigation Caption', 'bauman'),
                'desc'  => esc_html__('Caption displayed above the next page title.', 'bauman'),
	        ),

			array(
                'id'        => 'bauman-opt-page-navigation-next-url',
                'type'      => 'url',
				'required'  => array( 'bauman-opt-page-enable-navigation', '=', true ),
                'title'     => esc_html__('Next Page Url', 'bauman'),
                'desc'  => esc_html__('The url of the next page in navigation.', 'bauman'),
	        ),
			
			array(
                'id'        => 'bauman-opt-page-navigation-next-title',
                'type'      => 'text',
				'required'  => array( 'bauman-opt-page-enable-navigation', '=', true ),
                'title'     => esc_html__('Next Page Title', 'bauman'),
                'desc'  => esc_html__('The title of the next page in navigation. For an optimal transition between pages this field is the next page hero title or next page title (if hero is disabled).', 'bauman'),
	        ),

			array(
                'id'        => 'bauman-opt-page-navigation-next-subtitle',
                'type'      => 'text',
				'required'  => array( 'bauman-opt-page-enable-navigation', '=', true ),
                'title'     => esc_html__('Next Page Subtitle', 'bauman'),
                'desc'  => esc_html__('The subtitle of the next page in navigation. For an optimal transition between pages this field is the next page hero subtitle (if hero is enabled).', 'bauman'),
	        ),
			/**************************END - PAGE NAVIGATION SECTION OPTIONS**************************/
        ),
    );

	$page_options[] = array(
        'title'         => esc_html__('Portfolio and Portfolio Mixed Templates', 'bauman'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-folder-open',
        'desc'          => esc_html__('Options concerning only Portfolio templates.', 'bauman'),
        'fields'        => array(

			array(
                'id'        	=> 'bauman-opt-page-portfolio-filter-category',
                'type'      	=> 'text',
				'title'     	=> esc_html__('Category Filter', 'bauman'),
                'desc'  		=> esc_html__('Paste here the portfolio category slugs you want to include in the Portfolio or Portfolio Mixed separated by comma. Do not include spaces. For example photography,branding. It will exclude the rest of the categories. The portfolio category slugs can be found in Portfolio -> Categories.', 'bauman'),
				'default'  	=> '',
	        ),
			
			array(
                'id'        => 'bauman-opt-page-portfolio-enable-spacing',
                'type'      => 'switch',
                'title'     => esc_html__('Add Space Between Thumbnails', 'bauman'),
                'desc'      => esc_html__('Enables spacing between portfolio thumbnails.', 'bauman'),
				'on'       => esc_html__('Yes', 'bauman'),
				'off'      => esc_html__('No', 'bauman'),
                'default'   => false
            ),
			
			array(
                'id'        => 'bauman-opt-page-portfolio-caption-type',
                'type'      => 'select',
                'title'     => esc_html__('Caption', 'bauman'),
				'desc'      => esc_html__('Type of caption on portfolio grid thumbnails.', 'bauman'),
                'options'   => array(
                    'over-caption' 	=> esc_html__('Over Thumbnail', 'bauman'),
                    'below-caption' => esc_html__('Below Thumbnail', 'bauman')

                ),
				'default'   => 'over-caption',
            ),
			
			array(
                 'id'       => 'bauman-opt-page-portfolio-mixed-items',
                 'type'     => 'text',
                 'title'    => esc_html__( 'First Number Of Items In Portfolio Mixed', 'bauman' ),
                 'desc' => esc_html__( 'Available only for Portfolio Mixed Template: the first number of portfolio items displayed as portfolio grid tiles. The rest are displayed as secondary items. Leave empty for ALL.', 'bauman' )
             ),
			
		),
	);
		
	$page_options[] = array(
        'title'         => esc_html__('Showcase and Carousel Templates', 'bauman'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-folder-open',
        'desc'          => esc_html__('Options concerning only Showcase and Carousel templates.', 'bauman'),
        'fields'        => array(

			array(
                'id'        	=> 'bauman-opt-page-showcase-filter-category',
                'type'      	=> 'text',
				'title'     	=> esc_html__('Category Filter', 'bauman'),
                'desc'  		=> esc_html__('Paste here the portfolio category slugs you want to include in the Showcase slider separated by comma. Do not include spaces. For example photography,branding. It will exclude the rest of the categories. The portfolio category slugs can be found in Portfolio -> Categories.', 'bauman'),
				'default'  	=> '',
	        ),
						
        ),

    );
	
	$metaboxes[] = array(
        'id'            => 'clapat_' . BAUMAN_THEME_ID . '_page_options',
        'title'         => esc_html__( 'Page Options', 'bauman'),
        'post_types'    => array( 'page' ),
        'position'      => 'normal', // normal, advanced, side
        'priority'      => 'high', // high, core, default, low
        'sidebar'       => false, // enable/disable the sidsebar in the normal/advanced positions
        'sections'      => $page_options,
    );

    $blog_post_options = array();
    $blog_post_options[] = array(

         'icon_class'    => 'icon-large',
         'icon'          => 'el-icon-wrench',
         'fields'        => array(

			array(
                'id'        => 'bauman-opt-blog-bknd-color',
                'type'      => 'select',
                'title'     => esc_html__('Background color', 'bauman'),
				'desc'      => esc_html__('Background color for this blog post.', 'bauman'),
                'options'   => array(
                    'dark-content' 	=> esc_html__('White', 'bauman'),
                    'light-content' => esc_html__('Black', 'bauman')

                ),
				'default'   => 'light-content',
            ),
				  
          )
        );
			/**************************END - HERO SECTION OPTIONS**************************/

    $metaboxes[] = array(
       'id'            => 'clapat_' . BAUMAN_THEME_ID . '_post_options',
       'title'         => esc_html__( 'Post Options', 'bauman'),
       'post_types'    => array( 'post' ),
       'position'      => 'normal', // normal, advanced, side
       'priority'      => 'high', // high, core, default, low
       'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
       'sections'      => $blog_post_options,
    );


    $portfolio_options = array();
    $portfolio_options[] = array(

        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-wrench',
        'fields'        => array(

			array(
                'id'        => 'bauman-opt-portfolio-bknd-color',
                'type'      => 'select',
                'title'     => esc_html__('Background color', 'bauman'),
				'desc'      => esc_html__('Background color for this page.', 'bauman'),
                'options'   => array(
                    'dark-content' 	=> esc_html__('White', 'bauman'),
                    'light-content' => esc_html__('Black', 'bauman')

                ),
				'default'   => 'light-content',
            ),
			
			array(
                'id'        => 'bauman-opt-portfolio-thumbnail-size',
                'type'      => 'select',
                'title'     => esc_html__('Thumbnail Size', 'bauman'),
                'desc'      => esc_html__('Size of the thumbnail for this item as it appears in portfolio pages. The thumbnail image is the hero image assigned for this item.', 'bauman'),
				'options'   => array(
                    'normal' => esc_html__('Normal', 'bauman'),
                    'wide' => esc_html__('Wide', 'bauman')
                ),
                'default'   => 'normal'
            ),
			
			array(
                'id'        => 'bauman-opt-portfolio-showcase-include',
                'type'      => 'select',
                'title'     => esc_html__('Include In Showcase Slider', 'bauman'),
                'desc'      => esc_html__('Include this portfolio item in the Showcase slider. The slider is displayed in Showcase page template.', 'bauman'),
				'options'   => array(
                    'yes'		=> esc_html__('Include in Showcase', 'bauman'),
                    'no'  	=> esc_html__('Exclude from Showcase', 'bauman')

                ),
                'default'   => 'yes'
            ),
			
			/**************************HERO SECTION OPTIONS**************************/
			array(
				'id'        => 'bauman-opt-portfolio-hero-img',
                'type'      => 'media',
                'url'       => true,
                'title'     => esc_html__('Hero Image', 'bauman'),
                'desc'      => esc_html__('Upload hero background image.  The hero image is being displayed in portfolio showcase. Hero section is the header section displayed at the top of the project page.', 'bauman'),
                'default'   => array(),
            ),
			
			array(
                'id'        => 'bauman-opt-portfolio-video',
                'type'      => 'switch',
				'title'     => esc_html__('Video Hero', 'bauman'),
				'desc'   	=> esc_html__('Video displayed as hero section and showcase slide. If you check this option set the Hero Image as the first frame image of the video to avoid flickering!', 'bauman'),
                'on'       => esc_html__('Yes', 'bauman'),
				'off'      => esc_html__('No', 'bauman'),
                'default'   => false
            ),
			
			array(
                'id'        => 'bauman-opt-portfolio-video-webm',
                'type'      => 'text',
                'title'     => esc_html__('Webm Video URL', 'bauman'),
                'desc'   	=> esc_html__('URL of the showcase slide background webm video. Webm format is previewed in Chrome and Firefox.', 'bauman'),
				'required'	=> array('bauman-opt-portfolio-video', '=', true),
            ),
			
			array(
                'id'        => 'bauman-opt-portfolio-video-mp4',
                'type'      => 'text',
                'title'     => esc_html__('MP4 Video URL', 'bauman'),
                'desc'   	=> esc_html__('URL of the showcase slide background MP4 video. MP4 format is previewed in IE, Safari and other browsers.', 'bauman'),
                'required'	=> array('bauman-opt-portfolio-video', '=', true),
            ),
						
			array(
                'id'        => 'bauman-opt-portfolio-hero-caption-title',
                'type'      => 'text',
				'title'     => esc_html__('Hero Caption Title', 'bauman'),
                'subtitle'  => esc_html__('Caption title displayed over hero section. The hero background image is set in the hero image set in preceding option.', 'bauman'),
	        ),

			array(
                'id'        => 'bauman-opt-portfolio-hero-caption-subtitle',
                'type'      => 'textarea',
				'title'     => esc_html__('Hero Caption Subtitle', 'bauman'),
                'subtitle'  => esc_html__('Caption subtitle displayed over hero section. Enter plain text.', 'bauman'),
                'validate'  => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
	        ),
			
			array(
                'id'        => 'bauman-opt-portfolio-hero-scroll-caption',
                'type'      => 'text',
				'title'     => esc_html__('Scroll Down Caption', 'bauman'),
                'desc'  => esc_html__('Scroll down caption displayed to the left of the hero image indicating scrolling down to reveal the content. Leave empty for no scroll down button.', 'bauman'),
				'default'   => esc_html__('Scroll Down', 'bauman'),
	        ),

			array(
                'id'        => 'bauman-opt-portfolio-hero-project-info',
                'type'      => 'text',
				'title'     => esc_html__('Hero Project Info', 'bauman'),
                'desc'  => esc_html__('Short text describing the project to the bottom right of the hero image. Usually the year when the project has been accomplished.', 'bauman')
	        ),
			
			array(
                'id'        => 'bauman-opt-portfolio-hero-position',
                'type'      => 'select',
                'title'     => esc_html__('Hero Position', 'bauman'),
                'desc'      => esc_html__('Position of the "hero" section displayed as page header.', 'bauman'),
				'options'   => array(
                    'fixed-onscroll' 	=> esc_html__('Relative', 'bauman'),
                    'parallax-onscroll' => esc_html__('Parallax', 'bauman')
                ),
                'default'   => 'fixed-onscroll'
            ),
			/**************************END - HERO SECTION OPTIONS**************************/

        ),
    );

    $metaboxes[] = array(
        'id'            => 'clapat_' . BAUMAN_THEME_ID . '_portfolio_options',
        'title'         => esc_html__( 'Portfolio Item Options', 'bauman'),
        'post_types'    => array( 'bauman_portfolio' ),
        'position'      => 'normal', // normal, advanced, side
        'priority'      => 'high', // high, core, default, low
        'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
        'sections'      => $portfolio_options,
    );

	return $metaboxes;
  }
  
}

if( class_exists('Clapat\Bauman\Metaboxes\Meta_Boxes') ){

	$metabox_definitions = array();
	$metabox_definitions = bauman_add_metaboxes( $metabox_definitions );
	do_action( 'clapat/bauman/add_metaboxes', $metabox_definitions );
}