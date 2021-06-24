/**
 * Bauman Shortcodes Gutenberg Blocks
 *
 */
( function( blocks, blockEditor, i18n, element, components ) {
	var el = element.createElement;
	var __ = i18n.__;
	var RichText = blockEditor.RichText;
	var PlainText = blockEditor.PlainText;
	var MediaPlaceHolder = blockEditor.MediaPlaceHolder;
	var TextControl = components.TextControl;
	var TextareaControl = components.TextareaControl;
	var RangeControl = components.RangeControl;
	var ColorPaletteControl = components.ColorPalette;
	var SelectControl = components.SelectControl;
	var InspectorControls = blockEditor.InspectorControls;
	var MediaUpload = blockEditor.MediaUpload;
	var InnerBlocks = blockEditor.InnerBlocks;
	var AlignmentToolbar = blockEditor.AlignmentToolbar;
	var BlockControls = blockEditor.BlockControls;
 	
	/** Utils **/
	function normalizeUndef( x ){
		
		if (typeof x === 'undefined'){
			
			 return '';
		}
		else{
			
			return x;
		}
	}
	
	/** Container **/
	blocks.registerBlockType( 'bauman-gutenberg/container', {
		title: __( 'Bauman: Container', 'bauman-gutenberg' ),
		icon: 'analytics',
		category: 'layout',
		attributes: {
			background_color: {
				type: 'string',
				default: '#f2f2f2'
			},
			padding_top: {
				type: 'number',
				default: 0
			},
			padding_bottom: {
				type: 'number',
				default: 0
			},
			padding_left: {
				type: 'number',
				default: 0
			},
			padding_right: {
				type: 'number',
				default: 0
			},
			alignment: {
				type: 'string',
				default: 'left'
			},
		}, 
		
		keywords: [ __( 'bauman', 'bauman-gutenberg'), __( 'shortcode', 'bauman-gutenberg' ), __( 'container', 'bauman-gutenberg' ) ],
		
		edit: function( props ) {
			
			const colors = [ 
				{ name: 'Default', color: '#f2f2f2' }, 
				{ name: 'White', color: '#ffffff' }, 
				{ name: 'Light Grey', color: '#bbbbbb' }, 
				{ name: 'Dark Grey', color: '#555555' }, 
				{ name: 'Black', color: '#000' },
			];
			
			function onChangeAlignment( newAlignment ) {
				props.setAttributes( { alignment: newAlignment === undefined ? 'none' : newAlignment } );
			}
			
			return	[ el( BlockControls,
							{ key: 'controls' },
							el(
								AlignmentToolbar,
								{
									value: props.attributes.alignment,
									onChange: onChangeAlignment,
								}
							)
						),
						el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-container'},
							el( 'h4', { className: 'clapat-editor-block-title' }, __('Bauman Container', 'bauman-gutenberg' )),
							el( InnerBlocks, {} ),
							/*
							 * InspectorControls lets you add controls to the Block sidebar.
							 */
							el( InspectorControls, {},
								el( 'div', { className: 'components-panel__body is-opened' }, 
									el( 'strong', {}, __('Select Background Color:',  'bauman-gutenberg') ),
									el( 'div', { className : 'clapat-color-palette' },
										el( ColorPaletteControl, {
											colors: colors,
											value: props.attributes.background_color,
											onChange: ( value ) => { 
												props.setAttributes( { background_color: value === undefined ? 'transparent' : value } ); 
											},
										} )
									),
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Padding Top (in pixels)',  'bauman-gutenberg'),
											value: props.attributes.padding_top,
											onChange: ( value ) => { 
												if (typeof value === "undefined") return;
												props.setAttributes( { padding_top: value } ); 
											},
											type: 'number',
											step: 10,
											min: 0,
											max: 100
										} ) ),
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Padding Bottom (in pixels)',  'bauman-gutenberg'),
											value: props.attributes.padding_bottom,
											onChange: ( value ) => {
												if (typeof value === "undefined") return;
												props.setAttributes( { padding_bottom: value } ); 
											},
											type: 'number',
											step: 10,
											min: 0,
											max: 100
										} ) ),
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Padding Left (in pixels)',  'bauman-gutenberg'),
											value: props.attributes.padding_left,
											onChange: ( value ) => {
												if (typeof value === "undefined") return;
												props.setAttributes( { padding_left: value } );
											},
											type: 'number',
											step: 10,
											min: 0,
											max: 100
										} ) ),
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Padding Right (in pixels)',  'bauman-gutenberg'),
											value: props.attributes.padding_right,
											onChange: ( value ) => {
												if (typeof value === "undefined") return;
												props.setAttributes( { padding_right: value } );
											},
											type: 'number',
											step: 10,
											min: 0,
											max: 100
										} ) )
									)
								)
							) ];
		},

		save: function( props ) {
			
			return el( 'div', 
							{ 
								className: props.className,
								style : {
									'background-color': props.attributes.background_color,
									'padding-top': (props.attributes.padding_top !== 0) ? props.attributes.padding_top + 'px' : null,
									'padding-bottom': (props.attributes.padding_bottom !== 0) ? props.attributes.padding_bottom + 'px' : null,
									'padding-left': (props.attributes.padding_left !== 0) ? props.attributes.padding_left + 'px' : null,
									'padding-right': (props.attributes.padding_right !== 0) ? props.attributes.padding_right + 'px' : null,
									'text-align': props.attributes.alignment
								}
							}, InnerBlocks.Content() );
	
		},
	} );
	
	/** Button **/
	blocks.registerBlockType( 'bauman-gutenberg/button', {
		title: __( 'Bauman: Button', 'bauman-gutenberg' ),
		icon: 'editor-removeformatting',
		category: 'layout',
		attributes: {
			caption: {
				type: 'string',
				default: __( 'Caption', 'bauman-gutenberg' )
			},
			hover_caption: {
				type: 'string',
				default: __( 'Hover Caption', 'bauman-gutenberg' )
			},
			link: {
				type: 'string',
				default: 'http://'
			},
			target: {
				type: 'string',
				default: '_blank'
			},
			type: {
				type: 'string',
				default: 'normal'
			},
			rounded: {
				type: 'string',
				default: 'yes'
			},
		},
		
		keywords: [ __( 'bauman', 'bauman-gutenberg'), __( 'shortcode', 'bauman-gutenberg' ), __( 'button', 'bauman-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
				
				 el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
						el( 'h4', { className: 'clapat-editor-block-title' }, __('Bauman Button', 'bauman-gutenberg' )),
						
						el( PlainText,
						{
							className: 'clapat-inline-caption',
							value: props.attributes.caption,
							onChange: ( value ) => { props.setAttributes( { caption: value } ); },
						}),
						el( PlainText,
						{
							className: 'clapat-inline-caption',
							value: props.attributes.hover_caption,
							onChange: ( value ) => { props.setAttributes( { hover_caption: value } ); },
						}),
						el( PlainText,
						{
							className: 'clapat-inline-content',
							value: props.attributes.link,
							onChange: ( value ) => { props.setAttributes( { link: value } ); },
						}),
						
						/*
						 * InspectorControls lets you add controls to the Block sidebar.
						 */
						el( InspectorControls, {},
							el( 'div', { className: 'components-panel__body is-opened' }, 
								el( SelectControl, {
									label: __('Type', 'bauman-gutenberg'),
									value: props.attributes.type,
									options : [
										{ label: __('Normal', 'bauman-gutenberg'), value: 'normal' },
										{ label: __('Outline',  'bauman-gutenberg'), value: 'outline' },
									],
									onChange: ( value ) => { props.setAttributes( { type: value } ); },
								} ),
								el( SelectControl, {
									label: __('Rounded', 'bauman-gutenberg'),
									value: props.attributes.rounded,
									options : [
										{ label: __('Yes', 'bauman-gutenberg'), value: 'yes' },
										{ label: __('No',  'bauman-gutenberg'), value: 'no' },
									],
									onChange: ( value ) => { props.setAttributes( { rounded: value } ); },
								} ),
								el( SelectControl, {
									label: __('Link Target', 'bauman-gutenberg'),
									value: props.attributes.target,
									options: [
										{ label: 'Blank', value: '_blank' },
										{ label: 'Self', value: '_self' },
									],
									onChange: ( value ) => { props.setAttributes( { target: value } ); },
								} ),
							),
						),
					)
			]
		},
		save: function( props ) {
		
			return '[button link="' + props.attributes.link + '" target="' + props.attributes.target + '" hover_caption="' + props.attributes.hover_caption + '" type="' + props.attributes.type + '" rounded="' + props.attributes.rounded + '" extra_class_name=""]' + props.attributes.caption + '[/button]'; 
		},
	} );
	
	/** Title **/
	blocks.registerBlockType( 'bauman-gutenberg/title', {
		title: __( 'Bauman: Title', 'bauman-gutenberg' ),
		icon: 'editor-textcolor',
		category: 'layout',
		attributes: {
			caption: {
				type: 'string',
				default: 'Title'
			},
			size: {
				type: 'string',
				default: 'h1'
			},
			underline: {
				type: 'string',
				default: 'no'
			},
			big: {
				type: 'string',
				default: 'no'
			}
		},
		
		keywords: [ __( 'bauman', 'bauman-gutenberg'), __( 'shortcode', 'bauman-gutenberg' ), __( 'title', 'bauman-gutenberg' ) ],
		
		edit: function( props ) {
			
			if( props.attributes.underline == 'yes'){
				
				props.className = 'title-has-line';
			}
			if( props.attributes.big == 'yes'){
				
				props.className += ' big-title';
			}
			
			return [
				
				 el(  props.attributes.size, { className: props.className }, props.attributes.caption ),
				 
				/*
				 * InspectorControls lets you add controls to the Block sidebar.
				 */
				el( InspectorControls, {},
					el( 'div', { className: 'components-panel__body is-opened' }, 
						el( TextControl, {
							label: __('Caption', 'bauman-gutenberg'),
							value: props.attributes.caption,
							onChange: ( value ) => { props.setAttributes( { caption: value } ); },
						} ),
						el( SelectControl, {
							label: __('Size', 'bauman-gutenberg'),
							value: props.attributes.size,
							options: [
								{ label: 'H1', value: 'h1' },
								{ label: 'H2', value: 'h2' },
								{ label: 'H3', value: 'h3' },
								{ label: 'H4', value: 'h4' },
								{ label: 'H5', value: 'h5' },
								{ label: 'H6', value: 'h6' },
							],
							onChange: ( value ) => { props.setAttributes( { size: value } ); },
						} ),
						el( SelectControl, {
							label: __('Underline',  'bauman-gutenberg'),
							value: props.attributes.underline,
							options : [
								{ label: __('Yes',  'bauman-gutenberg'), value: 'yes' },
								{ label: __('No',  'bauman-gutenberg'), value: 'no' },
							],
							onChange: ( value ) => { props.setAttributes( { underline: value } ); },
						} ),
						el( SelectControl, {
							label: __('Big', 'bauman-gutenberg'),
							value: props.attributes.big,
							options: [
								{ label: __('Yes',  'bauman-gutenberg'), value: 'yes' },
								{ label: __('No',  'bauman-gutenberg'), value: 'no' },
							],
							onChange: ( value ) => { props.setAttributes( { big: value } ); },
						} ),
					),
				),
			]
		},
		save: function( props ) {
			
			if( props.attributes.underline == 'yes'){
				
				props.className = 'title-has-line';
			}
			if( props.attributes.big == 'yes'){
				
				props.className += ' big-title';
			}
			
			return el(  props.attributes.size, { className: props.className }, props.attributes.caption );
		},
	} );

	/** Accordion **/
	const template_clapat_accordion = [
	  [ 'bauman-gutenberg/accordion-item', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'bauman-gutenberg/accordion', {
		title: __( 'Bauman: Accordion', 'bauman-gutenberg' ),
		icon: 'editor-justify',
		category: 'layout',
		allowedBlocks: ['bauman-gutenberg/accordion-item'],

		keywords: [ __( 'clapat', 'bauman-gutenberg'), __( 'shortcode', 'bauman-gutenberg' ), __( 'accordion', 'bauman-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper'},
							el( 'h4', { className: 'clapat-editor-block-title' }, __('Bauman Accordion', 'clapat-blog-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['bauman-gutenberg/accordion-item'], template: template_clapat_accordion} )
						);

		},

		save: function( props ) {
			
			return el( 'dl', { className: 'accordion ' + props.className }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'bauman-gutenberg/accordion-item', {
		title: __( 'Bauman: Accordion Item', 'bauman-gutenberg' ),
		icon: 'editor-justify',
		category: 'layout',
		parent: [ 'bauman-gutenberg/accordion' ],

		attributes: {
			title: {
				type: 'string',
				default: __( 'Accordion Title. Click to edit it.', 'bauman-gutenberg')
			},
			content: {
				type: 'string',
				default: __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non est nec orci ultricies fringilla. Nam ultrices sem in odio scelerisque, sed mollis magna tincidunt.', 'bauman-gutenberg')
			}
		},

		edit: function( props ) {
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.title,
						onChange: ( value ) => { props.setAttributes( { title: value } ); },
					}),
					
					el( PlainText, {
						className: 'clapat-inline-content',
						value: props.attributes.content,
						onChange: ( value ) => { props.setAttributes( { content: value } ); },
					} ),
				),
				
			];
		},

		save: function( props ) {
			
			return '[accordion_item title="' + props.attributes.title + '"]' + props.attributes.content + '[/accordion_item]'; 

		},
	} );
	
	/** Icon Service **/
	blocks.registerBlockType( 'bauman-gutenberg/icon-service', {
		title: __( 'Bauman: Icon Service', 'bauman-gutenberg' ),
		icon: 'editor-justify',
		category: 'layout',
		attributes: {
			icon: {
				type: 'string',
				default: __( 'fa fa-cogs', 'bauman-gutenberg')
			},
			title: {
				type: 'string',
				default: __( 'Icon Service Title. Click to edit it.', 'bauman-gutenberg')
			},
			content: {
				type: 'string',
				default: __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non est nec orci ultricies fringilla. Nam ultrices sem in odio scelerisque, sed mollis magna tincidunt.', 'bauman-gutenberg')
			},
			
		},
		
		keywords: [ __( 'bauman', 'bauman-gutenberg'), __( 'shortcode', 'bauman-gutenberg' ),  __( 'icon', 'bauman-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
				
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'h4', { className: 'clapat-editor-block-title' }, __( 'Bauman Icon Box', 'bauman-gutenberg' ) ),
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.icon,
						onChange: ( value ) => { props.setAttributes( { icon: value } ); },
					}),
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.title,
						onChange: ( value ) => { props.setAttributes( { title: value } ); },
					}),
					
					el( PlainText, {
						className: 'clapat-inline-content',
						value: props.attributes.content,
						onChange: ( value ) => { props.setAttributes( { content: value } ); },
					} ),
					
				),
				 
			]
		},
		save: function( props ) {
			
			return '[service icon="' + props.attributes.icon + '" title="' + props.attributes.title + '" extra_class_name=""]' + props.attributes.content + '[/service]'; 
		},
	} );
	
	/** Contact Box **/
	blocks.registerBlockType( 'bauman-gutenberg/contact-box', {
		title: __( 'Bauman: Contact Box', 'bauman-gutenberg' ),
		icon: 'phone',
		category: 'layout',
		attributes: {
			icon: {
				type: 'string',
				default: __( 'fa fa-envelope', 'bauman-gutenberg')
			},
			title: {
				type: 'string',
				default: __( 'Contact Box Title. Click to edit it.', 'bauman-gutenberg')
			},
			content: {
				type: 'string',
				default: __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non est nec orci ultricies fringilla. Nam ultrices sem in odio scelerisque, sed mollis magna tincidunt.', 'bauman-gutenberg')
			},
			
		},
		
		keywords: [ __( 'bauman', 'bauman-gutenberg'), __( 'shortcode', 'bauman-gutenberg' ),  __( 'contact', 'bauman-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
				
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'h4', { className: 'clapat-editor-block-title' }, __( 'Bauman Icon Box', 'bauman-gutenberg' ) ),
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.icon,
						onChange: ( value ) => { props.setAttributes( { icon: value } ); },
					}),
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.title,
						onChange: ( value ) => { props.setAttributes( { title: value } ); },
					}),
					
					el( PlainText, {
						className: 'clapat-inline-content',
						value: props.attributes.content,
						onChange: ( value ) => { props.setAttributes( { content: value } ); },
					} ),
					
				),
				 
			]
		},
		save: function( props ) {
			
			return '[contact_box icon="' + props.attributes.icon + '" title="' + props.attributes.title + '" extra_class_name=""]' + props.attributes.content + '[/contact_box]'; 
		},
	} );
	
	/** Image Collage **/
	const template_clapat_collage = [
	  [ 'bauman-gutenberg/collage-image', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'bauman-gutenberg/collage', {
		title: __( 'Bauman: Collage', 'bauman-gutenberg' ),
		icon: 'layout',
		category: 'layout',
		allowedBlocks: ['bauman-gutenberg/collage-image'],
		
		keywords: [ __( 'bauman', 'bauman-gutenberg'), __( 'shortcode', 'bauman-gutenberg' ), __( 'collage', 'bauman-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-collage'},
							el( 'h4', { className: 'clapat-editor-block-title' }, __('Bauman Collage', 'bauman-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['bauman-gutenberg/collage-image'], template: template_clapat_collage} )
						);

		},

		save: function( props ) {
			
			return el( 'div', {id: 'justified-grid', className: props.className }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'bauman-gutenberg/collage-image', {
		title: __( 'Bauman: Collage Image', 'bauman-gutenberg' ),
		icon: 'format-image',
		category: 'layout',
		parent: [ 'bauman-gutenberg/collage' ],

		attributes: {
			thumb_image: {
				type: 'string',
				default: ''
			},
			thumb_image_id: {
				type: 'number',
			},
			full_image: {
				type: 'string',
				default: ''
			},
			full_image_id: {
				type: 'number',
			},
			alt: {
				type: 'string',
				default: ''
			},
			info: {
				type: 'string',
				default: __( 'Caption Text', 'bauman-gutenberg' )
			},
		},

		edit: function( props ) {
			
			var onSelectThumbnailImage = function( media ) {
				return props.setAttributes( {
					thumb_image: media.url,
					thumb_image_id: media.id,
				} );
			};
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					full_image: media.url,
					full_image_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectThumbnailImage,
							type: 'image',
							value: props.attributes.thumb_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.thumb_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.thumb_image_id ? i18n.__( 'Upload Collage Thumbnail Image', 'bauman-gutenberg' ) : el( 'img', { src: props.attributes.thumb_image } ),
									el ('p', {}, __( 'Thumb Image', 'bauman-gutenberg' ) )
								);
							}
						} )
					),
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.full_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.full_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.full_image_id ? i18n.__( 'Upload Collage Full Image', 'bauman-gutenberg' ) : el( 'img', { src: props.attributes.full_image } ),
									el ('p', {}, __( 'Full Image', 'bauman-gutenberg' ) )
								);
							}
						} )
					),

				),
				/*
				 * InspectorControls lets you add controls to the Block sidebar.
				 */
				el( InspectorControls, {},
					el( 'div', { className: 'components-panel__body is-opened' }, 
						el( TextControl, {
							label: __( 'ALT attribute', 'bauman-gutenberg' ),
							value: props.attributes.alt,
							onChange: ( value ) => { props.setAttributes( { alt: value } ); },
						} ),
						
						el( TextControl, {
							label: __( 'Collage Image Info', 'bauman-gutenberg' ),
							value: props.attributes.info,
							onChange: ( value ) => { props.setAttributes( { info: value } ); },
						} ),
					),
				),
			];
		},

		save: function( props ) {
			
			return '[clapat_collage_image thumb_img_url="' + props.attributes.thumb_image + '" img_url="' + props.attributes.full_image + '" alt="' + props.attributes.alt + '" info="' + props.attributes.info + '"][/clapat_collage_image]'; 

		},
	} );
	
	/** Image Carousel **/
	const template_clapat_image_carousel = [
	  [ 'bauman-gutenberg/carousel-image', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'bauman-gutenberg/carousel', {
		title: __( 'Bauman: Image Carousel', 'bauman-gutenberg' ),
		icon: 'slides',
		category: 'layout',
		allowedBlocks: ['bauman-gutenberg/carousel-image'],
		
		keywords: [ __( 'bauman', 'bauman-gutenberg'), __( 'shortcode', 'bauman-gutenberg' ), __( 'carousel', 'bauman-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-carousel'},
							el( 'h4', { className: 'clapat-editor-block-title' }, __('Bauman Carousel', 'bauman-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['bauman-gutenberg/carousel-image'], template: template_clapat_image_carousel} )
						);

		},

		save: function( props ) {
			
			return el( 'div', { className: 'carousel' }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'bauman-gutenberg/carousel-image', {
		title: __( 'Bauman: Carousel Image', 'bauman-gutenberg' ),
		icon: 'format-image',
		category: 'layout',
		parent: [ 'bauman-gutenberg/carousel' ],

		attributes: {
			img_url: {
				type: 'string',
				default: ''
			},
			img_id: {
				type: 'number',
			},
			alt: {
				type: 'string',
				default: ''
			},
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					img_url: media.url,
					img_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.img_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.img_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.img_id ? i18n.__( 'Upload Carousel Image', 'bauman-gutenberg' ) : el( 'img', { src: props.attributes.img_url } ),
									el ('p', {}, __( 'Carousel Image', 'bauman-gutenberg' ) )
								);
							}
						} )
					),

				),
				/*
				 * InspectorControls lets you add controls to the Block sidebar.
				 */
				el( InspectorControls, {},
					el( 'div', { className: 'components-panel__body is-opened' }, 
						el( TextControl, {
							label: __( 'ALT attribute', 'bauman-gutenberg' ),
							value: props.attributes.alt,
							onChange: ( value ) => { props.setAttributes( { alt: value } ); },
						} ),
					),
				),
			];
		},

		save: function( props ) {
			
			return '[carousel_slide img_url="' + props.attributes.img_url + '" alt="' + props.attributes.alt + '"][/carousel_slide]'; 

		},
	} );
	
	/** Image Slider **/
	const template_clapat_image_slider = [
	  [ 'bauman-gutenberg/slider-image', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'bauman-gutenberg/slider', {
		title: __( 'Bauman: Image Slider', 'bauman-gutenberg' ),
		icon: 'images-alt2',
		category: 'layout',
		allowedBlocks: ['bauman-gutenberg/slider-image'],
		
		keywords: [ __( 'bauman', 'bauman-gutenberg'), __( 'shortcode', 'bauman-gutenberg' ), __( 'slider', 'bauman-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-slider'},
							el( 'h4', { className: 'clapat-editor-block-title' }, __('Bauman Slider', 'bauman-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['bauman-gutenberg/slider-image'], template: template_clapat_image_slider} )
						);

		},

		save: function( props ) {
			
			return el( 'div', { className: 'slider' }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'bauman-gutenberg/slider-image', {
		title: __( 'Bauman: Slider Image', 'bauman-gutenberg' ),
		icon: 'format-image',
		category: 'layout',
		parent: [ 'bauman-gutenberg/slider' ],

		attributes: {
			img_url: {
				type: 'string',
				default: ''
			},
			img_id: {
				type: 'number',
			},
			alt: {
				type: 'string',
				default: ''
			},
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					img_url: media.url,
					img_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.img_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.img_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.img_id ? i18n.__( 'Upload Slider Image', 'bauman-gutenberg' ) : el( 'img', { src: props.attributes.img_url } ),
									el ('p', {}, __( 'Slider Image', 'bauman-gutenberg' ) )
								);
							}
						} )
					),

				),
				/*
				 * InspectorControls lets you add controls to the Block sidebar.
				 */
				el( InspectorControls, {},
					el( 'div', { className: 'components-panel__body is-opened' }, 
						el( TextControl, {
							label: __( 'ALT attribute', 'bauman-gutenberg' ),
							value: props.attributes.alt,
							onChange: ( value ) => { props.setAttributes( { alt: value } ); },
						} ),
					),
				),
			];
		},

		save: function( props ) {
			
			return '[general_slide img_url="' + props.attributes.img_url + '" alt="' + props.attributes.alt + '"][/general_slide]'; 

		},
	} );
		
	/** Popup Image **/
	blocks.registerBlockType( 'bauman-gutenberg/popup-image', {
		title: __( 'Bauman: Popup Image', 'bauman-gutenberg' ),
		icon: 'format-image',
		category: 'layout',
		
		attributes: {
			thumb_image: {
				type: 'string',
				default: ''
			},
			thumb_image_id: {
				type: 'number',
			},
			full_image: {
				type: 'string',
				default: ''
			},
			full_image_id: {
				type: 'number',
			},
			
		},

		keywords: [ __( 'bauman', 'bauman-gutenberg'), __( 'shortcode', 'bauman-gutenberg' ), __( 'popup', 'bauman-gutenberg' ) ],
		
		edit: function( props ) {
			
			var onSelectThumbnailImage = function( media ) {
				return props.setAttributes( {
					thumb_image: media.url,
					thumb_image_id: media.id,
				} );
			};
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					full_image: media.url,
					full_image_id: media.id,
				} );
			};
				
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'h4', { className: 'clapat-editor-block-title' }, __( 'Clapat Popup Image', 'bauman-gutenberg' )),
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectThumbnailImage,
							type: 'image',
							value: props.attributes.thumb_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.thumb_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.thumb_image_id ? i18n.__( 'Upload Popup Thumbnail Image', 'bauman-gutenberg' ) : el( 'img', { src: props.attributes.thumb_image } ),
									el ('p', {}, __( 'Thumb Image', 'bauman-gutenberg' ) )
								);
							}
						} )
					),
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.full_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.full_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.full_image_id ? i18n.__( 'Upload Popup Full Image', 'bauman-gutenberg' ) : el( 'img', { src: props.attributes.full_image } ),
									el ('p', {}, __( 'Full Image', 'bauman-gutenberg' ) )
								);
							}
						} )
					),

				),
				
			];
		},

		save: function( props ) {
			
			return '[clapat_popup_image img_url="' + props.attributes.full_image + '" thumb_url="' + props.attributes.thumb_image + '" extra_class_name=""][/clapat_popup_image]'; 

		},
	} );
	
	/** Testimonials **/
	const template_clapat_testimonials = [
	  [ 'bauman-gutenberg/testimonial', {} ], // [ blockName, attributes ]
	];

	blocks.registerBlockType( 'bauman-gutenberg/testimonials', {
		title: __( 'Bauman: Testimonials', 'bauman-gutenberg' ),
		icon: 'editor-quote',
		category: 'layout',
		allowedBlocks: ['bauman-gutenberg/testimonial'],
	
		keywords: [ __( 'bauman', 'bauman-gutenberg'), __( 'shortcode', 'bauman-gutenberg' ), __( 'testimonial', 'bauman-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper'},
							el( 'h3', { className: 'clapat-editor-block-title' }, __( 'Bauman Testimonials', 'bauman-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['bauman-gutenberg/testimonial'], template: template_clapat_testimonials } )
						);

		},

		save: function( props ) {
			
			return el( 'div', { className: 'text-carousel' }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'bauman-gutenberg/testimonial', {
		title: __( 'Bauman: Testimonial', 'bauman-gutenberg' ),
		icon: 'editor-quote',
		category: 'layout',
		parent: [ 'bauman-gutenberg/testimonials' ],

		attributes: {
			name: {
				type: 'string',
				default: __( 'Reviewer Name. Click to edit it.', 'bauman-gutenberg' )
			},
			content: {
				type: 'string',
				default: __( 'This is a review placeholder. Click to edit it.', 'bauman-gutenberg' )
			},
		},

		edit: function( props ) {
			
			var content = props.attributes.content;
			function onChangeContent( newContent ) {
				props.setAttributes( { content: newContent } );
			}
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'h3', { className: 'clapat-editor-block-title' }, __( 'Bauman - Testimonial', 'bauman-gutenberg' )),
					
					el( PlainText,
					{
						value: props.attributes.content,
						onChange: ( value ) => { props.setAttributes( { content: value } ); },
					}),
					
					el( PlainText, {
						value: props.attributes.name,
						onChange: ( value ) => { props.setAttributes( { name: value } ); },
					} ),
					
				),
				
			];
		},

		save: function( props ) {
			
			return '[testimonial name="' + props.attributes.name + '"]' + props.attributes.content + '[/testimonial]'; 

		},
	} );
	
	/** Clients **/
	const template_clapat_clients = [
	  [ 'bauman-gutenberg/client', {} ], // [ blockName, attributes ]
	];

	blocks.registerBlockType( 'bauman-gutenberg/clients', {
		title: __( 'Bauman: Clients', 'bauman-gutenberg' ),
		icon: 'businessman',
		category: 'layout',
		allowedBlocks: ['bauman-gutenberg/client'],
	
		keywords: [ __( 'bauman', 'bauman-gutenberg'), __( 'shortcode', 'bauman-gutenberg' ), __( 'client', 'bauman-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper'},
							el( 'h3', { className: 'clapat-editor-block-title' }, __( 'Bauman Clients', 'bauman-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['bauman-gutenberg/client'], template: template_clapat_clients } )
						);

		},

		save: function( props ) {
			
			return el( 'ul', { className: 'clients-table' }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'bauman-gutenberg/client', {
		title: __( 'Bauman: Client', 'bauman-gutenberg' ),
		icon: 'editor-quote',
		category: 'layout',
		parent: [ 'bauman-gutenberg/clients' ],

		attributes: {
			img_url: {
				type: 'string',
				default: ''
			},
			img_id: {
				type: 'number',
			},
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					img_url: media.url,
					img_id: media.id,
				} );
			};
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.img_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.img_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.img_id ? i18n.__( 'Upload Client Image', 'bauman-gutenberg' ) : el( 'img', { src: props.attributes.img_url } ),
									el ('p', {}, __( 'Client Image', 'bauman-gutenberg' ) )
								);
							}
						} )
					),
					
				),
				
			];
		},

		save: function( props ) {
			
			return '[client_item img_url="' + props.attributes.img_url + '"][/client_item]'; 

		},
	} );
	
	/** Hosted Video **/
	blocks.registerBlockType( 'bauman-gutenberg/video-hosted', {
		title: __( 'Bauman: Hosted Video', 'bauman-gutenberg' ),
		icon: 'video-alt',
		category: 'layout',
		attributes: {
			cover_image: {
				type: 'string',
				default: ''
			},
			cover_image_id: {
				type: 'number',
			},
			webm_url: {
				type: 'string',
				default: 'http://'
			},
			mp4_url: {
				type: 'string',
				default: 'http://'
			},
			
		},
		
		keywords: [ __( 'bauman', 'bauman-gutenberg'), __( 'shortcode', 'bauman-gutenberg' ), __( 'video', 'bauman-gutenberg' ) ],
		
		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					cover_image: media.url,
					cover_image_id: media.id,
				} );
			};
			
			return [
				
				 el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
						el( 'h4', { className: 'clapat-editor-block-title' }, __('Bauman Hosted Video', 'bauman-gutenberg' )),
						
						el( 'div', { className: 'clapat-editor-image' },
							el( MediaUpload, {
								onSelect: onSelectImage,
								type: 'image',
								value: props.attributes.cover_image_id,
								render: function( obj ) {
									return el( components.Button, {
											className: props.attributes.cover_image_id ? 'clapat-image-added' : 'button button-large',
											onClick: obj.open
										},
										! props.attributes.cover_image_id ? i18n.__( 'Upload Video Cover Image', 'bauman-gutenberg' ) : el( 'img', { src: props.attributes.cover_image } ),
										el ('p', {}, __( 'Cover Image', 'bauman-gutenberg' ) )
									);
								}
							} ),
						),
						
						el ('p', { className: 'clapat-editor-label' }, __( 'MP4 video url:', 'bauman-gutenberg' ) ),
						
						el( PlainText,
						{
							value: props.attributes.mp4_url,
							className: 'clapat-inline-content',
							onChange: ( value ) => { props.setAttributes( { mp4_url: value } ); },
						}),
						
						el ('p', { className: 'clapat-editor-label' }, __( 'Webm video url:', 'bauman-gutenberg' ) ),
						
						el( PlainText,
						{
							value: props.attributes.webm_url,
							className: 'clapat-inline-content',
							onChange: ( value ) => { props.setAttributes( { webm_url: value } ); },
						}),
					)
			]
		},
		save: function( props ) {
			
			return '[bauman_video cover_img_url="' + props.attributes.cover_image + '" mp4_url="' + props.attributes.mp4_url + '" webm_url="' + props.attributes.webm_url + '" extra_class_name=""][/bauman_video]'; 
		},
	} );
	

	/** Google Map **/
	blocks.registerBlockType( 'bauman-gutenberg/google-map', {
		title: __( 'Bauman: Google Map', 'bauman-gutenberg' ),
		icon: 'admin-site',
		category: 'layout',
		attributes: {	},
		
		keywords: [ __( 'bauman', 'bauman-gutenberg'), __( 'shortcode', 'bauman-gutenberg' ),  __( 'map', 'bauman-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
				
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'h4', { className: 'clapat-editor-block-title' }, __( 'Bauman Google Map', 'bauman-gutenberg' ) ),
					
					el( 'span', { className: 'clapat-inline-caption' },  __( 'Set google map properties in theme options - map.', 'bauman-gutenberg' ) ),
				),
			]
		},
		save: function( props ) {
			
			return '[bauman_map][/bauman_map]'; 
		},
	} );
	
}(
	window.wp.blocks,
	window.wp.blockEditor,
	window.wp.i18n,
	window.wp.element,
	window.wp.components
) );
