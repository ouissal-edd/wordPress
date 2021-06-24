<?php

if( !function_exists('bauman_render_footer_social_links' ) )
{
	function bauman_render_footer_social_links(){

		global $bauman_social_links_icons;
		$bauman_social_links = "";
		for( $idx = 1; $idx <= BAUMAN_MAX_SOCIAL_LINKS; $idx++ ){

			$social_name = bauman_get_theme_options( 'clapat_bauman_footer_social_' . $idx );
			$social_url  = bauman_get_theme_options( 'clapat_bauman_footer_social_url_' . $idx );

			if( $social_url ){

				if( bauman_get_theme_options( 'clapat_bauman_social_links_icons' ) ){
					
					$bauman_social_links .= '<li><span class="parallax-wrap"><a class="parallax-element" href="' . esc_url( $social_url ) . '" target="_blank"><i class="fa fa-'. esc_attr( $bauman_social_links_icons[ $social_name ] ) . '"></i></a></span></li>';
				}
				else {
					
					$bauman_social_links .= '<li><span class="parallax-wrap"><a class="parallax-element" href="' . esc_url( $social_url ) . '" target="_blank">' . wp_kses_post( $social_name ) . '</a></span></li>';
				}

			}

		}
		
		if( !empty( $bauman_social_links ) ){
?>
						<div class="socials-wrap">            	
							<div class="socials-icon"><i class="fa fa-share-alt" aria-hidden="true"></i></div>
							<div class="socials-text"><?php echo wp_kses_post( bauman_get_theme_options('clapat_bauman_footer_social_links_prefix') ); ?></div>
							<ul class="socials">
								<?php echo wp_kses_post( $bauman_social_links ); ?>
							</ul>
						</div>
<?php			
		
		}

	}
}

bauman_render_footer_social_links();

?>
