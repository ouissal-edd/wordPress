<?php

if ( ! class_exists( 'BaumanHeroProperties' ) ) {

	class BaumanHeroProperties
	{
		public $enabled;
		public $caption_title;
		public $caption_subtitle;
		public $position;
		public $opacity;
		public $image;
		public $foreground;
		public $video;
		public $video_webm;
		public $video_mp4;
		public $scroll_down_caption;
		public $project_info;

		public function __construct(){

			$this->enabled = false;
			$this->caption_title = "";
			$this->caption_subtitle = "";
			$this->position = esc_attr("fixed-onscrol");
			$this->image = true;
			$this->foreground= esc_attr('light-content');
			$this->text_alignment = "";
			$this->video = false;
			$this->video_webm = "";
			$this->video_mp4 = "";
			$this->scroll_down_caption = "";
			$this->project_info = "";
		}

		public function getProperties( $post_type ){

			if( $post_type == 'bauman_portfolio' ){

				$this->enabled 			= true; // in portfolio projects hero is always enabled and the hero image will be displayed in showcase slider
				$this->caption_title	= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-hero-caption-title' );
				$this->caption_subtitle = bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-hero-caption-subtitle' );
				$this->position 		= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-hero-position' );
				$this->foreground 		= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-bknd-color' );
				$this->image		 	= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-hero-img' );
				$this->video 			= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-video' );
				$this->video_webm 		= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-video-webm' );
				$this->video_mp4 		= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-video-mp4' );
				$this->scroll_down_caption = bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-hero-scroll-caption' );
				$this->project_info 	= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-portfolio-hero-project-info' );

			} else if( $post_type == 'post' ){

				$this->enabled = true; // the hero section is always enabled in case of blog posts, displaying post title and categories
				$this->caption_title 	= get_the_title();
				$this->caption_subtitle	= bauman_blog_post_hero_caption();
				$this->position 		= esc_attr("parallax-onscroll");
				$this->foreground 		= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-blog-bknd-color' );
				$this->image		 	= null;

			} else if( !empty( $post_type ) ){

				$this->enabled 			= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-page-enable-hero' );
				$this->caption_title	= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-page-hero-caption-title' );
				$this->caption_subtitle = bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-page-hero-caption-subtitle' );
				$this->position 		= esc_attr("parallax-onscroll");
				$this->foreground 		= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-page-bknd-color' );
				$this->image		 	= null;

			}
		}

	}
}

$bauman_hero_properties = new BaumanHeroProperties();

?>
