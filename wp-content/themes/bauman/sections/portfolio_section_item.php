<?php

$full_image = bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-hero-img' );
$bauman_thumbnail_size = bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-thumbnail-size' );

if( $full_image && isset( $full_image['url'] ) ){

    $bauman_item_classes 	= '';
    $bauman_item_categories 	= '';
	$bauman_item_cats = get_the_terms($post->ID, 'portfolio_category');
	if($bauman_item_cats){

		foreach($bauman_item_cats as $item_cat) {
            $bauman_item_classes 	.= $item_cat->slug . ' ';
            $bauman_item_categories 	.= $item_cat->name . ', ';
        }

		$bauman_item_categories = rtrim($bauman_item_categories, ', ');

	}
	$bauman_is_secondary_item = get_query_var('bauman_query_var_is_secondary_item', false);
	if( $bauman_is_secondary_item ){
		
		$bauman_item_classes .= 'floating hide-ball';
	}

	$item_url = get_the_permalink();

?>
						<div class="item <?php echo esc_attr( $bauman_thumbnail_size ); ?> <?php echo esc_attr( $bauman_item_classes ); ?>">
                            <div class="item-appear">                                    		
                                <div class="item-content">                            	                                    
									<a class="item-wrap ajax-link-project" data-type="page-transition" href="<?php echo esc_url( $item_url ); ?>"><?php if( bauman_get_theme_options('clapat_bauman_enable_ajax') ){ ?></a><?php } ?>
									<div class="item-wrap-image">
										<div class="item-image" data-src="<?php echo esc_url( $full_image['url'] ); ?>">
											<?php if( bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-video' ) ){ 
												$bauman_video_webm_url = bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-video-webm' );
												$bauman_video_mp4_url = bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-video-mp4' );
											?>
											<div class="hero-video-wrapper">
												<video loop muted class="bgvid">
													<?php if( !empty( $bauman_video_mp4_url ) ){ ?>
													<source src="<?php echo esc_url( $bauman_video_mp4_url ); ?>" type="video/mp4">
													<?php } ?>
													<?php if( !empty( $bauman_video_webm_url ) ){ ?>
													<source src="<?php echo esc_url( $bauman_video_webm_url ); ?>" type="video/webm">
													<?php } ?>
												</video>
											</div>
											<?php } ?>
										</div>
									</div>
									<?php if( !bauman_get_theme_options('clapat_bauman_enable_ajax') ){ ?></a><?php } ?>
									<div class="item-caption">
										<h4 class="item-cat"><?php echo wp_kses_post( $bauman_item_categories ); ?></h4>
										<h2 class="item-title"><?php the_title(); ?></h2>
                                    </div>
								</div>
                            </div>
                        </div>

<?php

}
?>
