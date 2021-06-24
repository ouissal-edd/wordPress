<?php
/**
 * Created by Clapat.
 * Date: 27/11/19
 * Time: 1:34 PM
 */
$bauman_hero_properties = bauman_get_hero_properties( get_post_type() );

$hero_styles = $bauman_hero_properties->position;

if( $bauman_hero_properties->enabled ){

?>

		<!-- Hero Section -->
		<div id="hero" class="<?php if( $bauman_hero_properties->image && !empty( $bauman_hero_properties->image['url'] ) ){ echo 'has-image'; } ?>">
				<div id="hero-styles" class="<?php echo esc_attr( $hero_styles ); ?>">
					<div id="hero-caption">
						<div class="inner">
							<div class="hero-subtitle"><?php echo wp_kses_post( $bauman_hero_properties->caption_subtitle ); ?></div>
							<div class="hero-title"><?php echo wp_kses_post( $bauman_hero_properties->caption_title ); ?></div>
						</div>
					</div>
					<?php if( $bauman_hero_properties->image && !empty( $bauman_hero_properties->image['url'] ) ){ ?>
					<div class="hero-bottom">
						<?php if( !empty( $bauman_hero_properties->scroll_down_caption ) ){ ?>
                       	<div class="hb-left">
                           	<div id="scrolldown" class="link">
								<?php echo wp_kses_post( $bauman_hero_properties->scroll_down_caption ); ?>
							</div>
						</div>
						<?php } ?>
						<?php if( !empty( $bauman_hero_properties->project_info ) ){ ?>
                        <div class="hb-right link"><?php echo wp_kses_post( $bauman_hero_properties->project_info ); ?></div>
						<?php } ?>
                    </div>
					<?php } ?>
				</div>
		</div>
		<?php if( $bauman_hero_properties->image && !empty( $bauman_hero_properties->image['url'] ) ){ ?>
		<div id="hero-bg-wrapper">
			<div id="hero-image-parallax">
				<div id="hero-bg-image" style="background-image:url(<?php echo esc_url( $bauman_hero_properties->image['url'] ); ?>)">
				<?php if( $bauman_hero_properties->video ){ ?>
					<div class="hero-video-wrapper">
						<video loop muted class="bgvid">
						<?php if( !empty( $bauman_hero_properties->video_mp4 ) ){ ?>
							<source src="<?php echo esc_url( $bauman_hero_properties->video_mp4 ); ?>" type="video/mp4">
						<?php } ?>
						<?php if( !empty( $bauman_hero_properties->video_webm ) ){ ?>
							<source src="<?php echo esc_url( $bauman_hero_properties->video_webm ); ?>" type="video/webm">
						<?php } ?>
						</video>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
		<?php	
		}
		?>
		<!--/Hero Section -->

<?php
}
?>
