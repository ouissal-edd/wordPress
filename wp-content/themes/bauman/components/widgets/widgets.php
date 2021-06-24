<?php

// more widgets in the (near) future...

// Register widgetized locations
if(  !function_exists('bauman_widgets_init') ){

    function bauman_widgets_init(){

		$args = array( 'name'          	=> esc_html__( 'Blog Sidebar', 'bauman' ),
								'id'           	=> 'bauman-blog-sidebar',
								'description'  	=> '',
								'class'        	=> '',
								'before_widget'	=> '<div id="%1$s" class="widget bauman-sidebar-widget %2$s">',
								'after_widget'  => '</div>',
								'before_title'  => '<h5 class="widgettitle bauman-widgettitle">',
								'after_title'   => '</h5>' );
		
		register_sidebar( $args );
        
    }
}

add_action( 'widgets_init', 'bauman_widgets_init' );

?>