<?php
/*
Template name: Portfolio Template
*/
get_header();

if ( have_posts() ){

the_post();

$bauman_caption_type	= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-page-portfolio-caption-type' );
$bauman_enable_spacing	= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-page-portfolio-enable-spacing' );

$bauman_page_container_list = array();

$bauman_portfolio_tax_query = null;
$bauman_portfolio_category_filter	= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-page-portfolio-filter-category' );

$bauman_array_terms = null;
if( !empty( $bauman_portfolio_category_filter ) ){
	
	$bauman_array_terms = explode( ",", $bauman_portfolio_category_filter );
	$bauman_portfolio_tax_query = array(
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
		
			<?php

			$bauman_hero_properties = bauman_get_hero_properties( get_post_type() );

			$bauman_hero_styles = $bauman_hero_properties->position;

			if( $bauman_hero_properties->enabled ){

			?>
			<!-- Hero Section -->
            <div id="hero">
				<div id="hero-styles" class="<?php echo esc_attr( $bauman_hero_styles ); ?>">
					<div id="hero-caption">
						<div class="inner">
							<div class="hero-subtitle"><?php echo wp_kses_post( $bauman_hero_properties->caption_subtitle ); ?></div>                                         
                            <div class="hero-title"><?php echo wp_kses_post( $bauman_hero_properties->caption_title ); ?></div>                                                                   
                        </div>
                    </div>
					<?php if( empty( $bauman_portfolio_category_filter ) || ( ( $bauman_array_terms != null ) && ( is_array( $bauman_array_terms ) ) &&  ( count( $bauman_array_terms ) > 1 ) ) ){ ?>
                    <div class="hero-bottom">                         
						<div id="show-filters"><span class="link"><?php echo wp_kses_post( bauman_get_theme_options('clapat_bauman_portfolio_show_filters_caption') ); ?></span></div>
                    </div>
					<?php } ?>
				</div>
			</div>                      
			<!--/Hero Section --> 
			<?php } ?>
			
			<!-- Main Content -->
			<div id="main-content">
				<div id="main-page-content">
				
					<!-- Portfolio Wrap -->
					<div class="portfolio-wrap <?php if( $bauman_enable_spacing ) { echo "spaced "; } ?><?php echo esc_attr( $bauman_caption_type ); ?>">
                        <!-- Portfolio Columns -->
						<div class="portfolio <?php if( !bauman_get_theme_options('clapat_bauman_enable_ajax') ){ echo 'thumb-no-ajax'; } ?>">
						<?php

							$bauman_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$bauman_args = array(
										'post_type' => 'bauman_portfolio',
										'paged' => $bauman_paged,
										'tax_query' => $bauman_portfolio_tax_query,
										'posts_per_page' => 1000,
										 );

							$bauman_portfolio = new WP_Query( $bauman_args );

							while( $bauman_portfolio->have_posts() ){

								$bauman_portfolio->the_post();

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
				
				<?php
		
					// display hero section
					get_template_part('sections/page_navigation_section'); 
		
				?>
			</div>
			<!-- /Main Content -->
		</div>
        <!--/Main -->
<?php
			
}
	
get_footer();

?>