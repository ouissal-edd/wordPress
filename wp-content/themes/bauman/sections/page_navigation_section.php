<?php

	$bauman_page_nav_enable	= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-page-enable-navigation' );
	$bauman_page_nav_title	= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-page-navigation-caption-title' );
	$bauman_next_url		= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-page-navigation-next-url' );
	$bauman_next_title		= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-page-navigation-next-title' );
	$bauman_next_subtitle	= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-page-navigation-next-subtitle' );
	
	if( $bauman_page_nav_enable ){
?>
				<!-- Project Navigation --> 
                <div id="page-nav">
					<div class="next-page-wrap">
						<div class="next-page-title">
							<div class="inner">
								<div class="subtitle-info has-animation"><?php echo wp_kses_post( $bauman_page_nav_title ); ?></div>
								<div class="subtitle-name"><?php echo wp_kses_post( $bauman_next_subtitle ); ?></div>
								<div class="page-title-wrapper has-animation">
									<a class="page-title hide-ball next-ajax-link-page" data-type="page-transition" href="<?php echo esc_url( $bauman_next_url	); ?>"><span><?php echo wp_kses_post( $bauman_next_title ); ?></span></a>
								</div>
                            </div>                   
                        </div>
					</div>
                </div>      
                <!--/Project Navigation -->
<?php } ?>