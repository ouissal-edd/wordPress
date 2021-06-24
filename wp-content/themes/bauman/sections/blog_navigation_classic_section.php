				<div class="blog-navigation has-animation">
					<?php
					$big = 999999999; // need an unlikely integer

					$bauman_current_query = bauman_get_current_query();
					if ( get_query_var( 'paged' ) ) { $bauman_current_page = get_query_var( 'paged' ); }
					elseif ( get_query_var( 'page' ) ) { $bauman_current_page = get_query_var( 'page' ); }
					else { $bauman_current_page = 1; }
					
					$bauman_paginate_links = paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'type' => 'list',
						'format' => '?paged=%#%',
						'current' => $bauman_current_page,
						'total' => $bauman_current_query->max_num_pages,
						'prev_text' => wp_kses_post( bauman_get_theme_options('clapat_bauman_blog_prev_posts_caption') ),
						'next_text' => wp_kses_post( bauman_get_theme_options('clapat_bauman_blog_next_posts_caption') )
					) );
					
					if( bauman_get_theme_options( 'clapat_bauman_enable_ajax' ) ){
						
						$bauman_paginate_links = str_replace( 'a class="prev page-numbers"', 'a class="prev page-numbers ajax-link" data-type="page-transition"', $bauman_paginate_links ); 
						$bauman_paginate_links = str_replace( 'a class="page-numbers"', 'a class="page-numbers ajax-link" data-type="page-transition"', $bauman_paginate_links ); 
						$bauman_paginate_links = str_replace( 'a class="next page-numbers"', 'a class="next page-numbers ajax-link" data-type="page-transition"', $bauman_paginate_links ); 
					}
						
					echo wp_kses_post( $bauman_paginate_links ); 
					
					?>
				</div>