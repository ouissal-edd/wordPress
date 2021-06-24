<?php
/**
 * Created by Clapat.
 * Date: 12/02/19
 * Time: 11:33 AM
 */

// hero section container properties
$bauman_hero_properties = bauman_get_hero_properties( get_post_type() );

if( $bauman_hero_properties->enabled ){

	get_template_part('sections/hero_section_container');
}
else {
		
?>
		<!-- Hero Section -->
        <div id="hero" <?php if( !bauman_get_theme_options( 'clapat_bauman_enable_page_title_as_hero' ) ){ echo 'class="hero-hidden"'; } ?>>
			<div id="hero-styles" class="parallax-onscroll">
				<div id="hero-caption">
					<div class="inner">
						<div class="hero-title"><?php echo wp_kses_post( get_the_title() ); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <!--/Hero Section -->

<?php

}

?>
