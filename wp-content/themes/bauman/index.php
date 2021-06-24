<?php

get_header();

if ( have_posts() ){

$bauman_blog_layout = bauman_get_theme_options( 'clapat_bauman_blog_layout' );

?>
	
	<!-- Main -->
	<div id="main">
	
		<!-- Hero Section -->
        <div id="hero">
           <div id="hero-styles" class="parallax-onscroll">
                <div id="hero-caption" class="text-align-center">
                    <div class="inner">
						<div class="scale-wrapper">
							<div class="hero-title"><?php  echo wp_kses_post( bauman_get_theme_options('clapat_bauman_blog_default_title') ); ?></div> 
						</div>
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
						
					// the loop
					while( have_posts() ){

						the_post();

						get_template_part( 'sections/blog_post_section' );
						
					}
							
				?>
				<!-- /Blog-Content-->
				</div>
				<?php
						
					bauman_pagination();

				?>
			</div>
			<!-- /Blog-->
		</div>
		<!--/Main Content-->
	</div>
	<!-- /Main -->
<?php

}
	
get_footer();

?>