<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<main>
    <?php if( bauman_get_theme_options('clapat_bauman_enable_preloader') ){ ?>
		<!-- Preloader -->
        <div class="preloader-wrap">
            <div class="outer">
				<div class="inner">
                    <div class="percentage" id="precent"></div>
                    <div class="trackbar">
                        <div class="loadbar"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--/Preloader -->
  <?php } ?>
		
		<!--Cd-main-content -->
		<div class="cd-index cd-main-content">
			
		<?php
		$bauman_bknd_color = bauman_get_theme_options( 'clapat_bauman_default_page_bknd_type' );
		if( is_singular( 'bauman_portfolio' ) ){
	
			$bauman_bknd_color = bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-bknd-color' );
			
		}
		else if( is_singular( 'post' ) ){
	
			$bauman_bknd_color = bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-blog-bknd-color' );
			
		}
		else if( is_404() ){
			
			$bauman_bknd_color = bauman_get_theme_options( 'clapat_bauman_error_page_bknd_type' );
			
		}
		else if( is_page() ){
	
			$bauman_bknd_color = bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-page-bknd-color' );

		}
		
		?>
	
		<?php if( is_page_template( 'blog-page.php' ) || is_home() || is_archive() || is_search() ){ ?>
			<!-- Page Content -->
			<div id="page-content" class="blog-template <?php echo sanitize_html_class( $bauman_bknd_color ); if( !bauman_get_theme_options( 'clapat_bauman_enable_magic_cursor' ) ){ echo " magic-cursor-disabled"; } ?>">
		<?php } else { ?>
			<!-- Page Content -->
			<div id="page-content" class="<?php echo sanitize_html_class( $bauman_bknd_color ); if( !bauman_get_theme_options( 'clapat_bauman_enable_magic_cursor' ) ){ echo " magic-cursor-disabled"; } ?>">
		<?php } ?>
		
			<?php 
				// display header section
				get_template_part('sections/header_section'); 		
			?>