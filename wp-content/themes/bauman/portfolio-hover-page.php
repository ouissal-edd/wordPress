<?php
/*
Template name: Portfolio Hover Template
*/
get_header();

if ( have_posts() ){

the_post();

$bauman_page_container_list = array();

$bauman_portfolio_tax_query = null;
$bauman_portfolio_category_filter	= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-page-portfolio-filter-category' );

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
				</div>
			</div>                      
			<!--/Hero Section --> 
			<?php } ?>
			
			<!-- Main Content -->
			<div id="main-content">
				<div id="main-page-content">
				
					<!-- Portfolio Hover Lists -->
                    <ul id="hover-projects" data-fx="1" class="<?php if( !bauman_get_theme_options('clapat_bauman_enable_ajax') ){ echo 'thumb-no-ajax'; } ?> <?php if( !$bauman_hero_properties->enabled ){ echo 'no-hero-above'; } ?>">
                        <?php

							$bauman_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$bauman_args = array(
										'post_type' => 'bauman_portfolio',
										'paged' => $bauman_paged,
										'tax_query' => $bauman_portfolio_tax_query,
										'posts_per_page' => 1000,
										 );

							$bauman_portfolio = new WP_Query( $bauman_args );

							$bauman_item_count = 0;
							while( $bauman_portfolio->have_posts() ){

								$bauman_portfolio->the_post();

								$bauman_item_count ++;
								
								$bauman_item_categories 	= '';
								$bauman_item_cats = get_the_terms($post->ID, 'portfolio_category');
								if($bauman_item_cats){

									foreach($bauman_item_cats as $item_cat) {
										
										$bauman_item_categories 	.= $item_cat->name . ', ';
									}

									$bauman_item_categories = rtrim($bauman_item_categories, ', ');

								}
								
								?>
								<li class="hide-ball <?php if( $bauman_item_count == 1 ){ echo 'active'; } ?>" data-slide="<?php echo esc_attr( $bauman_item_count ); ?>">
                                    <div class="hl-timeline">
                                        <a class="hover-list-title" data-type="page-transition" href="<?php the_permalink(); ?>">
                                            <div class="hl-cat"><?php echo wp_kses_post( $bauman_item_categories ); ?></div>
                                            <div class="hl-title"><?php the_title(); ?></div>
                                        </a>
                                    </div>
                                </li>
								<?php
								
								$bauman_hero_properties = new BaumanHeroProperties();
                                $bauman_hero_properties->getProperties( get_post_type( get_the_ID() ) );
								
								$bauman_page_container_list[] = $bauman_hero_properties;
								
							}
							
							wp_reset_postdata();
							
							bauman_portfolio_images( $bauman_page_container_list );
						?>
					</ul>
					<!-- Portfolio Hover Lists -->
					
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