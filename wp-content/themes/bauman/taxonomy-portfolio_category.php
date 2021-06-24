<?php
// archive template for portfolio categories

get_header();

$bauman_page_container_list = array();
?>
				
		<!-- Main -->
		<div id="main">
		
			<!-- Hero Section -->
			<div id="hero">
				<div id="hero-styles" class="parallax-onscroll">
					<div id="hero-caption">
						<div class="inner">
							<div class="hero-title"><?php single_cat_title(); ?></div>
						</div>
					</div>
				</div>
			</div>
			<!--/Hero Section -->
			
			<!-- Main Content -->
			<div id="main-content">
				<div id="main-page-content">
				
					<!-- Portfolio Wrap - Classic -->
                    <div class="portfolio-wrap">
                        <!-- Portfolio Columns -->
                        <div class="portfolio <?php if( !bauman_get_theme_options('clapat_bauman_enable_ajax') ){ echo 'thumb-no-ajax'; } ?>">
						<?php

							while( have_posts() ){

								the_post();
								
								get_template_part('sections/portfolio_section_item');
								
								$bauman_hero_properties = new BaumanHeroProperties();
                                $bauman_hero_properties->getProperties( get_post_type( get_the_ID() ) );
								
								$bauman_page_container_list[] = $bauman_hero_properties;
								
							}
							
							wp_reset_postdata();
							
							bauman_portfolio_images( $bauman_page_container_list );
						?>
						</div>
					</div>
					<!--/Portfolio -->
					
				</div>
                <!--/Main Page Content -->
			</div>
			<!-- /Main Content -->
		</div>
        <!--/Main -->
<?php
	
get_footer();

?>