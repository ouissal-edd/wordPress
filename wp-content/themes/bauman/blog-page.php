<?php
/*
Template name: Blog Template
*/
get_header();

while ( have_posts() ){

the_post();

$bauman_blog_layout = bauman_get_theme_options( 'clapat_bauman_blog_layout' );

?>
			
	
	<?php 
		
		// display hero section, if any
		get_template_part('sections/hero_section'); 
		
	?>
		<!-- Main Content -->
    	<div id="main-content">
			<!-- Blog-->
			<div id="blog" class="<?php echo sanitize_html_class( $bauman_blog_layout ); ?>">
				<!-- Blog-Content-->
				<div data-fx="1">
				<?php 
						
					$bauman_paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
					
					$bauman_args = array(
						'post_type' => 'post',
						'paged' => $bauman_paged
					);
					$bauman_posts_query = new WP_Query( $bauman_args );

					// the loop
					while( $bauman_posts_query->have_posts() ){

						$bauman_posts_query->the_post();

						get_template_part( 'sections/blog_post_section' );
						
					}
							
				?>
				</div>
				<!-- /Blog-Content -->
					
				<?php
						
					bauman_pagination( $bauman_posts_query );

					wp_reset_postdata();
				?>
			</div>
			<!-- /Blog-->
		</div>
		<!--/Main Content-->
	
<?php

}
	
get_footer();

?>
