			<!-- Footer -->
			<?php if( is_page_template('showcase-page.php') || is_page_template('carousel-page.php')  || is_page_template('carousel-high-columns-page.php') ){ ?>
			</div>
			
			<footer class="fixed">
			<?php } else { ?>
			<footer class="hidden">
			<?php } ?>
                <div id="footer-container">
                	
					<?php if( bauman_get_theme_options( 'clapat_bauman_enable_back_to_top' ) ){  ?>
						<?php if( !is_page_template('carousel-page.php') &&  !is_page_template('carousel-high-columns-page.php') && !is_page_template('showcase-page.php') ){ ?>
                    <div id="backtotop" class="button-wrap left">
						<div class="icon-wrap parallax-wrap">
							<div class="button-icon parallax-element">
								<i class="fa fa-angle-up"></i>
							</div>
						</div>
						<div class="button-text"><span data-hover="<?php echo esc_attr( bauman_get_theme_options( 'clapat_bauman_back_to_top_caption' ) ); ?>"><?php echo wp_kses_post( bauman_get_theme_options( 'clapat_bauman_back_to_top_caption' ) ); ?></span></div> 
					</div>
						<?php } ?>
					<?php } ?>
					
					<?php if( is_page_template('carousel-page.php') ||  is_page_template('carousel-high-columns-page.php') || is_page_template('showcase-page.php') ){ ?>
					<div class="arrows-wrap">
                        <div class="prev-wrap parallax-wrap"><div class="swiper-button-prev swiper-button-white parallax-element"></div></div>
                        <div class="next-wrap parallax-wrap"><div class="swiper-button-next swiper-button-white parallax-element"></div></div>
                    </div>
					<?php } ?>
					
					<?php if( is_page_template('carousel-page.php') ||  is_page_template('carousel-high-columns-page.php') ){ ?>
					<div class="swiper-scrollbar"></div>
					<?php } else { ?>
					<div class="footer-middle">
						<?php if( !is_page_template('showcase-page.php') ){ ?>
							<?php if( bauman_get_theme_options('clapat_bauman_footer_copyright') ){ ?>
							<div class="copyright"><?php echo wp_kses_post( bauman_get_theme_options('clapat_bauman_footer_copyright') ); ?></div>
							<?php } ?>
						<?php } else { ?>
							<div class="showcase-subtitles-wrap"></div>
						<?php }  ?>
                    </div>
					<?php } ?>
					
					<?php get_template_part('sections/footer_social_links_section'); ?>
                                        
                </div>
            </footer>
            <!--/Footer -->
			
			<?php if( !is_page_template('showcase-page.php') && !is_page_template('carousel-page.php')  && !is_page_template('carousel-high-columns-page.php') ){ ?>
			</div>
			<?php } ?>
			
			<?php if ( is_singular('bauman_portfolio') ){
				
				$bauman_next_project_image = bauman_portfolio_next_project_image();
			?>
			<div class="next-project-image">
                <div class="next-project-image-bg" style="background-image:url(<?php echo esc_url( $bauman_next_project_image ); ?>)"></div>
            </div>
			<?php } ?>
		
			<?php if( is_page_template('portfolio-hover-page.php') ){ ?>
			<div id="image-slider">
                <div class="image-slider-wrapper">                
                    <?php
					$bauman_page_container_list = bauman_portfolio_images();
					$bauman_items_count = 0;
					foreach( $bauman_page_container_list as $bauman_page_container_item ){
						
						$bauman_items_count++;
						
						$bauman_hover_image_url = "";
						if( $bauman_page_container_item->image && isset( $bauman_page_container_item->image['url'] ) ){
							
							$bauman_hover_image_url = $bauman_page_container_item->image['url'];
						}
						
						echo '<div class="slider-img" data-slide="' . esc_attr( $bauman_items_count ) . '" data-src="' . esc_url( $bauman_hover_image_url ) . '">';
						?>
						<?php if($bauman_page_container_item->video ) { ?>
							<div class="hero-video-wrapper">
								<video loop muted class="bgvid">
									<?php if( !empty( $bauman_page_container_item->video_mp4 ) ) { ?>
                                    <source src="<?php echo esc_url( $bauman_page_container_item->video_mp4 ); ?>" type="video/mp4">
                                    <?php } ?>
                                    <?php if( !empty( $bauman_page_container_item->video_webm ) ) { ?>
                                    <source src="<?php echo esc_url( $bauman_page_container_item->video_webm ); ?>" type="video/webm">
                                    <?php } ?>
                                </video>
                            </div>
                        <?php } ?>
						<?php	echo '</div>';
					}
					?>
				</div>
			</div>
			<?php } ?>
			
			<?php if( is_page_template('carousel-page.php') || is_page_template('carousel-high-columns-page.php') || is_page_template('portfolio-page.php') || is_page_template('portfolio-mixed-page.php') || is_page_template('portfolio-hover-page.php') || is_tax('portfolio_category') ){ ?>
			<div class="thumb-container">
				<?php
					$bauman_page_container_list = bauman_portfolio_images();
					foreach( $bauman_page_container_list as $bauman_page_container_item ){
						
						$bauman_hover_image_url = "";
						if( $bauman_page_container_item->image && isset( $bauman_page_container_item->image['url'] ) ){
							
							$bauman_hover_image_url = $bauman_page_container_item->image['url'];
						}
						
						echo '<div class="thumb-page" data-src="' . esc_url( $bauman_hover_image_url ) . '"></div>';
					}
				?>
            </div>
			<?php } ?>