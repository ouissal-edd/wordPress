<?php
/**
 * The template for displaying Search Results pages
*/

get_header();

$bauman_blog_layout = bauman_get_theme_options( 'clapat_bauman_blog_layout' );

?>
		
	
		<!-- Hero Section -->
        <div id="hero">
           <div id="hero-styles">
                <div id="hero-caption">
                    <div class="inner">
						<div class="hero-subtitle"><?php echo wp_kses_post( esc_html__( 'Search Results', 'bauman') ); ?></div>
						<div class="hero-title"><?php echo wp_kses_post( get_search_query() ); ?></div> 
                    </div>
                </div>                    
            </div>
        </div>                      
        <!--/Hero Section -->
		
	   	<!-- Main Content -->
    	<div id="main-content">
			<!-- Blog-->
			<div id="blog" class="<?php echo sanitize_html_class( $bauman_blog_layout ); ?>">
				<!-- Blog-Content-->
				<div data-fx="1">
					<?php

						if( have_posts() ){
						
							while( have_posts() ){

								the_post();

								get_template_part( 'sections/blog_post_section' );

							}
						} else{

							echo '<h4 class="search_results">' . esc_html__('No posts found', 'bauman') . '</h4>';

						}

					?>
					
				<!-- /Blog-Content -->
				</div>

				<?php

					bauman_pagination();
				?>
			</div>
			<!-- /Blog-->
		</div>
		<!--/Main Content-->
	
<?php

get_footer();

?>