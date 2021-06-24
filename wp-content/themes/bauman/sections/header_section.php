<?php
// retrieve the path to the logo displayed in the menu bar
$bauman_logo = bauman_get_theme_options( 'clapat_bauman_logo' );
$bauman_logo_path = esc_url( $bauman_logo );
if( !$bauman_logo_path ){
    $bauman_logo_path = get_template_directory_uri() . "/images/logo.png";
}

$bauman_logo_light = bauman_get_theme_options( 'clapat_bauman_logo_light' );
$bauman_logo_light_path = esc_url( $bauman_logo_light );
if( !$bauman_logo_light_path ){
    $bauman_logo_light_path = get_template_directory_uri() . "/images/logo-white.png";
}

?>
		<!-- Header -->
        <header class="<?php if( bauman_get_theme_options( 'clapat_bauman_enable_fullscreen_menu' ) ){ echo "fullscreen-menu"; } else { echo "classic-menu"; } ?>">
            <div id="header-container">
            
				<!-- Logo -->
				<div id="logo" class="hide-ball">
					<a class="ajax-link" data-type="page-transition" href="<?php echo esc_url( get_home_url() ); ?>">
						<img class="black-logo" src="<?php echo esc_url( $bauman_logo_path ); ?>" alt="<?php echo esc_attr__('Logo Black', 'bauman'); ?>">
						<img class="white-logo" src="<?php echo esc_url( $bauman_logo_light_path ); ?>" alt="<?php echo esc_attr__('Logo White', 'bauman'); ?>">
					</a>
				</div>
				<!--/Logo -->             
				
				<?php

				get_template_part('sections/menu_section');

				?>
		
				<!-- Menu Burger -->
                <div class="button-wrap right  menu">
                    <div class="icon-wrap parallax-wrap">
                        <div class="button-icon parallax-element">
                            <div id="burger-wrapper">
                                <div id="menu-burger">
                                    <span></span>
                                    <span></span>
									<span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-text"><span data-hover="<?php echo esc_attr( bauman_get_theme_options('clapat_bauman_menu_btn_caption') ); ?>"><?php echo wp_kses_post( bauman_get_theme_options('clapat_bauman_menu_btn_caption') ); ?></span></div> 
                </div>
                <!--/Menu Burger -->
        
				<?php if( is_page_template( 'blog-page.php' ) || is_home() || is_archive() || is_search() || is_singular( 'post' ) ){
					if( !is_tax('portfolio_category') ){
				?>
				<div id="open-sidebar-nav"><i class="fa fa-arrow-left"></i></div>
				<?php 
					}
				}
				?>
            </div>
        </header>
        <!--/Header -->
		
		<?php if( is_page_template( 'blog-page.php' ) || is_home() || is_archive() || is_search() || is_singular( 'post' ) ){ 
			
			if( !is_tax('portfolio_category') ){
				
				// display sidebar section, if defined
				get_template_part('sections/blog_sidebar_section'); 
			}
		} 
		?>
		
		<?php if( is_page_template( 'portfolio-page.php' ) || is_page_template( 'portfolio-mixed-page.php' ) ){
			
			// display sidebar section, if defined
			get_template_part('sections/portfolio_filters_section'); 
		} 
		?>
		
		<div id="content-scroll">