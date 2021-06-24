<?php
/*
Template name: Showcase Template
*/

get_header();

if ( have_posts() ){

the_post();

$bauman_page_container_list = array();

$bauman_showcase_tax_query = null;
$bauman_showcase_category_filter	= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-page-showcase-filter-category' );

if( !empty( $bauman_showcase_category_filter ) ){
	
	$bauman_array_terms = explode( ",", $bauman_showcase_category_filter );
	$bauman_showcase_tax_query = array(
										array(
											'taxonomy' 	=> 'portfolio_category',
											'field'		=> 'slug',
											'terms'		=> $bauman_array_terms,
											),
									);
}
?>

		<!-- Main -->
		<div id="main">

			<!-- Main Content -->
			<div id="main-content">

				<!-- Showcase Holder -->
                <div id="showcase-holder"> 
					<div id="showcase-holder-wrap">
						<div id="showcase-tilt-wrap">
							<div id="showcase-tilt">
								<div id="showcase-slider" class="swiper-container">
									<div class="swiper-wrapper">
									<?php

										$bauman_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
										$bauman_args = array(
													'post_type' => 'bauman_portfolio',
													'paged' => $bauman_paged,
													'tax_query' => $bauman_showcase_tax_query,
													'posts_per_page' => 1000,
													 );

										$bauman_portfolio = new WP_Query( $bauman_args );

										$bauman_slides_count = 1;
										while( $bauman_portfolio->have_posts() ){

											$bauman_portfolio->the_post();
											
											$bauman_showcase_include	= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-showcase-include' );
											
											if( $bauman_showcase_include == "yes" ){
											
												$bauman_hero_properties = new BaumanHeroProperties();
												$bauman_hero_properties->getProperties( get_post_type( get_the_ID() ) );
												
												?>
												<!-- Section Slide -->
												<div class="swiper-slide<?php if( $bauman_hero_properties->video ) { echo " bg-video"; } ?>" data-number="<?php echo esc_attr( $bauman_slides_count ); ?>" data-title="<?php echo esc_attr( $bauman_hero_properties->caption_title ); ?>" data-subtitle="<?php echo esc_attr( $bauman_hero_properties->caption_subtitle ); ?>">
													<div class="img-mask">
														<div class="section-image" data-src="<?php echo esc_url( $bauman_hero_properties->image['url'] ); ?>">
														<?php if( $bauman_hero_properties->video ) { ?>
															<div class="hero-video-wrapper">
																<video loop muted class="bgvid">
																	<?php if( !empty( $bauman_hero_properties->video_mp4 ) ) { ?>
																	<source src="<?php echo esc_url( $bauman_hero_properties->video_mp4 ); ?>" type="video/mp4">
																	<?php } ?>
																	<?php if( !empty( $bauman_hero_properties->video_webm ) ) { ?>
																	<source src="<?php echo esc_url( $bauman_hero_properties->video_webm ); ?>" type="video/webm">
																	<?php } ?>
																</video>
															</div>
														<?php } ?>
														</div>
													</div>
													<?php if( bauman_get_theme_options('clapat_bauman_enable_ajax') ){ ?>
													<a class="title hide-ball" data-type="page-transition" href="<?php the_permalink(); ?>">
													<?php } else { ?>
													<a  class="title hide-ball" href="<?php the_permalink(); ?>">
													<?php } ?>
													<?php echo wp_kses_post( $bauman_hero_properties->caption_title ); ?>
													</a>
												</div>
												<!--/Section Slide -->
												<?php
												
												$bauman_page_container_list[] = $bauman_hero_properties;
												
												$bauman_slides_count++;
											}

										}

										wp_reset_postdata();
										
										bauman_portfolio_images( $bauman_page_container_list );
									?>
									</div>
								</div>
							</div>
						</div>             
					</div>
					<div class="showcase-captions-wrap">
                       	<div class="showcase-counter" data-total="<?php echo esc_attr( $bauman_slides_count - 1 ); ?>"></div>                                
                        <div class="showcase-captions"></div>
                    </div>
                </div>    
                <!-- Showcase Holder -->
				
			</div>
			<!-- /Main Content -->

		</div>
        <!--/Main -->

<?php
}

get_footer();

?>
