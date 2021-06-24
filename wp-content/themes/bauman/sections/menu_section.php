			<?php
				
				$bauman_menu_breakpoint = "1025";
				$bauman_menu_additionaL_text = "";
				if( bauman_get_theme_options( 'clapat_bauman_enable_fullscreen_menu' ) ){
					
					$bauman_menu_breakpoint = "10025";
					$bauman_menu_additionaL_text = '<div class="menu-box-wrapper"><div class="menu-box menu-timeline">' . wp_kses_post( bauman_get_theme_options( 'clapat_bauman_fullscreen_menu_text' ) ) . '</div></div>';
				}
				
				$bauman_theme_location = '';
				if( has_nav_menu( 'primary-menu' ) ){
					
					$bauman_theme_location = 'primary-menu';
				}
				wp_nav_menu(array(
					'theme_location' 	=> $bauman_theme_location,
					'container' 			=> 'nav',
					'items_wrap' 		=> '<div class="nav-height"><div class="outer"><div class="inner"><ul id="%1$s" data-breakpoint="' . esc_attr( $bauman_menu_breakpoint ) . '" class="flexnav %2$s">%3$s</ul></div>' . wp_kses_post( $bauman_menu_additionaL_text ) . '</div></div>'
				));

			?>
