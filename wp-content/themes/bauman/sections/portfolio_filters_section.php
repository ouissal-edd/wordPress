			<!-- Filters Overlay -->
			<div id="filters-overlay">                
                <div id="close-filters"></div>
                <div class="outer">
                    <div class="inner">    
                        <ul id="filters">
                            <li class="filters-timeline link"><a id="all" href="#" data-filter="*" class="active hide-ball"><?php echo wp_kses_post( bauman_get_theme_options( 'clapat_bauman_portfolio_filter_all_caption' ) ); ?></a></li>
                            <?php
							
								// check if the category filter is specified in page options
								$bauman_portfolio_category_filter	= bauman_get_post_meta( BAUMAN_THEME_OPTIONS, get_the_ID(), 'bauman-opt-page-portfolio-filter-category' );

								$bauman_portfolio_category = null;
								if( !empty( $bauman_portfolio_category_filter ) ){
	
									$bauman_portfolio_category = array();
									$bauman_category_slugs = explode( ",", $bauman_portfolio_category_filter );
									foreach( $bauman_category_slugs as $bauman_category_slug ){
										
										$bauman_category_object = get_term_by( 'slug', $bauman_category_slug, 'portfolio_category' );
										if( $bauman_category_object ){
											
											array_push( $bauman_portfolio_category, $bauman_category_object );
										}
									}
								}
								else {

									$bauman_portfolio_category = get_terms('portfolio_category', array( 'hide_empty' => 0 ));
								}

								if( $bauman_portfolio_category ){

									foreach( $bauman_portfolio_category as $portfolio_cat ){

							?>
							<li class="filters-timeline link"><a href="#" data-filter=".<?php echo sanitize_title( $portfolio_cat->slug ); ?>" class="hide-ball"><?php echo wp_kses_post( $portfolio_cat->name ); ?></a></li>
							<?php

									}
								}

							?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Filters Overlay -->