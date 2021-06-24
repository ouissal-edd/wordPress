<?php
/**
 * Created by Clapat
 * Date: 26/11/19
 * Time: 11:00 AM
 */

 // Extra classes to the body
if ( ! function_exists( 'bauman_body_class' ) ){

	function bauman_body_class( $classes ) {

		$classes[] = 'hidden';
		$classes[] = 'hidden-ball';

		if( bauman_get_theme_options( 'clapat_bauman_enable_smooth_scrolling' ) ){
			
			$classes[] = 'smooth-scroll';
		}
		
		if( !bauman_get_theme_options( 'clapat_bauman_enable_ajax' ) ){
			
			$classes[] = 'load-no-ajax';
		}
		
		// return the $classes array
		return $classes;
	}
}
add_filter( 'body_class', 'bauman_body_class' );

// site/blog title
if ( ! function_exists( '_wp_render_title_tag' ) ) {

	function bauman_wp_title() {

		echo wp_title( '|', false, 'right' );

	}
	add_action( 'wp_head', 'bauman_wp_title' );
}

if ( ! function_exists( 'bauman_menu_classes' ) ){

    function bauman_menu_classes(  $classes , $item, $args ){

		$classes[] = 'link';
		if( $item->menu_item_parent == "0" ){
			
			$classes[] = 'menu-timeline';
		}
		if( in_array( 'current-menu-item', $item->classes ) || in_array( 'current-menu-ancestor', $item->classes ) ){

			$classes[] = 'active';
		}
				
		return $classes;
    }

}
if ( ! function_exists( 'bauman_menu_link_attributes' ) ){

    function bauman_menu_link_attributes(  $atts, $item, $args ){

		$arr_classes = array();
		
		if( !empty($item->classes) ){

			if( !in_array( 'menu-item-type-custom', $item->classes ) && !in_array( 'menu-item-has-children', $item->classes ) ){
				
				// if the menu item is not a custom link
				$atts['data-type'] = 'page-transition';	
				$arr_classes[] = 'ajax-link';
			}
		}
		
		if( !empty($item->classes) ){
			if( in_array( 'current-menu-item', $item->classes ) || in_array( 'current-menu-ancestor', $item->classes ) ){

				$arr_classes[] = 'active';
			}
		}

		if( !empty($item->classes) ){

			if( in_array( 'menu-item-has-children', $item->classes ) ){
				// if the menu item is a parent item, just use an empty <a> tag
				if( isset( $atts['data-type'] ) ){
					$atts['data-type'] = null;
				}
			}
		}
		if( !empty( $arr_classes ) ){

			$atts['class'] = implode( ' ', $arr_classes );
		}

		return $atts;
    }

}
if ( ! function_exists( 'bauman_menu_item_title' ) ){

    function bauman_menu_item_title(  $title, $item, $args, $depth ){

		if( $depth === 0 ){
			
			$title = '<span data-hover="' . esc_attr( $title ) . '">' . $title . '</span>';
		}
		return $title;
    }

}
// change priority here if there are more important actions associated with the hook
add_action('nav_menu_css_class', 'bauman_menu_classes', 10, 3);
add_filter('nav_menu_link_attributes', 'bauman_menu_link_attributes', 10, 3 );
add_filter( 'nav_menu_item_title', 'bauman_menu_item_title', 10, 4 );

// hooks to add extra classes for next & prev portfolio projects and single blog posts
if ( ! function_exists( 'bauman_prev_post_link' ) ){

    function bauman_prev_post_link( $output, $format, $link, $post ){

			if( $format == 'bauman_portfolio' ){

				$output = '';
				$next_post = $post;

				if( $post ){

					$next_post = $post;
				}
				else{ // could not find the next post so rewind to the oldest one

					$args = array(
							'posts_per_page'	=> 2,
							'order'           => 'DESC',
							'post_type'       => 'bauman_portfolio',
						);

					$find_query = new WP_Query( $args );
					if ( $find_query->have_posts() && ($find_query->found_posts > 1) )  {

						$find_query->the_post();

						$next_post = $find_query->post;

					} else {
						// no posts found
					}

					wp_reset_postdata();
				}

				if( $next_post ){

					$bauman_hero_image = bauman_get_post_meta( BAUMAN_THEME_OPTIONS, $next_post->ID, 'bauman-opt-portfolio-hero-img' );
					$bauman_hero_title = bauman_get_post_meta( BAUMAN_THEME_OPTIONS, $next_post->ID, 'bauman-opt-portfolio-hero-caption-title' );
					$bauman_hero_subtitle = bauman_get_post_meta( BAUMAN_THEME_OPTIONS, $next_post->ID, 'bauman-opt-portfolio-hero-caption-subtitle' );
					bauman_portfolio_next_project_image( $bauman_hero_image['url'] );
					
					$output = '<!-- Project Navigation --> ';
					$output .= '<div id="project-nav">';
                    $output .= '<div class="next-project-wrap">';
                    $output .= '<div class="next-project-title">';
					$output .= '<div class="inner">';
                    $output .= '<div class="next-title">' . wp_kses_post( bauman_get_theme_options( 'clapat_bauman_portfolio_next_caption' ) ) . '</div>';
					$output .= '<div class="next-subtitle-name">' . wp_kses_post( $bauman_hero_subtitle ) . '</div>';
                    $output .= '<a class="main-title next-ajax-link-project hide-ball" data-type="page-transition" href="'. esc_url( get_permalink( $next_post ) ) .'"><span>' . wp_kses_post( $bauman_hero_title ) . '</span></a>';
                    $output .= '</div>';                   
                    $output .= '</div>';
					$output .= '</div>';
                    $output .= '</div>';
                    $output .= '<!--/Project Navigation -->';

				}

			}
			else if(  $format == 'blog-post' ){

				$output = '';
				if( $post ){

					$output = '<div class="post-navigation">';
                    $output .= '<div class="container">';
                    $output .= '<div class="post-next">';
					$output .= wp_kses_post( bauman_get_theme_options( 'clapat_bauman_blog_next_post_caption' ) );
					$output .= '<div class="post-next-title">';
                    $output .= '<a href="' . get_permalink( $post ) . '" class="ajax-link hide-ball" data-type="page-transition">';
                    $output .= '<span>' . get_the_title( $post ) . '</span>';
					$output .= '</a>';
					$output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';

				}

				return $output;
			}
			else {

				if( $post ){

					$output = get_permalink( $post );
				}
			}

			return $output;
    }

}
if ( ! function_exists( 'bauman_next_post_link' ) ){

    function bauman_next_post_link( $output, $format, $link, $post ){

			if( $format == 'bauman_portfolio' ){

				$output = '';
				$next_post = $post;

				if( $post ){

					$next_post = $post;
				}
				else{ // could not find the next post so rewind to the oldest one

					$args = array(
								'posts_per_page'   => 2,
								'order'            => 'ASC',
								'post_type'        => 'bauman_portfolio',
							);

					$find_query = new WP_Query( $args );
					if ( $find_query->have_posts() && ($find_query->found_posts > 1) )  {

						$find_query->the_post();

						$next_post = $find_query->post;

					} else {
						// no posts found
					}

					wp_reset_postdata();
				}

				if( $next_post ){

					$bauman_hero_image = bauman_get_post_meta( BAUMAN_THEME_OPTIONS, $next_post->ID, 'bauman-opt-portfolio-hero-img' );
					$bauman_hero_title = bauman_get_post_meta( BAUMAN_THEME_OPTIONS, $next_post->ID, 'bauman-opt-portfolio-hero-caption-title' );
					$bauman_hero_subtitle = bauman_get_post_meta( BAUMAN_THEME_OPTIONS, $next_post->ID, 'bauman-opt-portfolio-hero-caption-subtitle' );
					bauman_portfolio_next_project_image( $bauman_hero_image['url'] );
					
					$output = '<!-- Project Navigation --> ';
					$output .= '<div id="project-nav">';
                    $output .= '<div class="next-project-wrap">';
                    $output .= '<div class="next-project-title">';
					$output .= '<div class="inner">';
                    $output .= '<div class="next-title">' . wp_kses_post( bauman_get_theme_options( 'clapat_bauman_portfolio_next_caption' ) ) . '</div>';
					$output .= '<div class="next-subtitle-name">' . wp_kses_post( $bauman_hero_subtitle ) . '</div>';
                    $output .= '<a class="main-title next-ajax-link-project hide-ball" data-type="page-transition" href="'. esc_url( get_permalink( $next_post ) ) .'"><span>' . wp_kses_post( $bauman_hero_title ) . '</span></a>';
                    $output .= '</div>';                   
                    $output .= '</div>';
					$output .= '</div>';
                    $output .= '</div>';
                    $output .= '<!--/Project Navigation -->';

				}

			}
			else if( $format == 'blog-post' ){

				// nothing here for the moment
			}
			else {

				if( $post ){

					$output = get_permalink( $post );
				}
			}

		return $output;
	}

}
// change priority here if there are more important actions associated with the hook
add_filter('next_post_link', 'bauman_next_post_link', 10, 4);
add_filter('previous_post_link', 'bauman_prev_post_link', 10, 4);

// hooks to add extra classes for next & prev blog posts
if ( ! function_exists( 'bauman_next_posts_link_attributes' ) ){

	function bauman_next_posts_link_attributes(){

		return 'class="ajax-link" data-type="page-transition"';
	}
}
if ( ! function_exists( 'bauman_prev_posts_link_attributes' ) ){

	function bauman_prev_posts_link_attributes(){

		return 'class="ajax-link" data-type="page-transition"';
	}
}
// change priority here if there are more important actions associated with the hook
add_filter('next_posts_link_attributes', 'bauman_next_posts_link_attributes', 10, 4);
add_filter('previous_posts_link_attributes', 'bauman_prev_posts_link_attributes', 10, 4);

if ( ! function_exists( 'bauman_comment_reply_link' ) ){

	function bauman_comment_reply_link($link, $args, $comment, $post){

		return str_replace("class='comment-reply-link", "class='comment-reply-link reply hide-ball", $link);
	}
}
// change priority here if there are more important actions associated with the hook
add_filter('comment_reply_link', 'bauman_comment_reply_link', 99, 4);

// category filter
if ( ! function_exists( 'bauman_category' ) ){
	
	function bauman_category( $thelist, $separator, $parents ){
		
		return str_replace('<a href="', '<a class="ajax-link link" data-type="page-transition" href="', $thelist);
	}
}
add_filter('the_category', 'bauman_category', 10, 3);

// tags filter
if ( ! function_exists( 'bauman_tags' ) ){
	
	function bauman_tags( $tag_list, $before, $sep, $after, $id ){
		
		return str_replace('<a href="', '<a class="ajax-link link" data-type="page-transition" href="', $tag_list);
	}
}
add_filter('the_tags', 'bauman_tags', 10, 5);

// search filter
if( !function_exists('bauman_searchfilter') ){

    function bauman_searchfilter( $query ) {

    	if ( !is_admin() && $query->is_main_query() ) {

    		if ($query->is_search ) {

    			$post_types = get_query_var('post_type');

    			if( empty( $post_types ) ){

            		$query->set('post_type', array('post'));
    			}
        	}

        }

        return $query;

    }
    add_filter('pre_get_posts','bauman_searchfilter');

}
