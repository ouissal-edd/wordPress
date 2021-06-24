<?php

if ( function_exists( 'vc_map' ) ) {
	
vc_map( array(
	'name' => 'Title',
	'base' => 'title',
	'icon' => 'icon-vc-clapat-bauman',
	'is_container' => 'true',
	'category' => esc_html__('Bauman - Typo Elements', 'bauman'),
	'description' => esc_html__('Title', 'bauman'),
	'admin_enqueue_css' => array( get_template_directory_uri() . '/include/vc-extend.css' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Title Size', 'bauman'),
			'description' => '',
			'param_name' => 'size',
			'value' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'),
		),
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Has Underline?', 'bauman'),
			'description' => esc_html__('If the title is displayed underlined or without underline', 'bauman'),
			'param_name' => 'underline',
			'value' => array( 'no', 'yes'),
		),
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Big Title?', 'bauman'),
			'description' => esc_html__('This parameter applies only for H1 headings. If the title is normal or bigger title font size.', 'bauman'),
			'param_name' => 'big',
			'value' => array( 'no', 'yes'),
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'bauman'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'bauman'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Content', 'bauman'),
			'param_name' => 'content',
			'value' => esc_html__('Content goes here', 'bauman'),
		),
	)
) );

vc_map( array(
	'name' => 'Button',
	'base' => 'button',
	'icon' => 'icon-vc-clapat-bauman',
	'is_container' => 'true',
	'category' => esc_html__('Bauman - Typo Elements', 'bauman'),
	'description' => esc_html__('Button', 'bauman'),
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Button Link', 'bauman'),
			'description' => esc_html__('URL for the button', 'bauman'),
			'param_name' => 'link',
			'value' => 'http://',
		),
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Target Window', 'bauman'),
			'description' => esc_html__('Button link opens in a new or current window', 'bauman'),
			'param_name' => 'target',
			'value' => array( '_blank', '_self'),
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Hover Caption', 'bauman'),
			'description' => esc_html__('Caption when hovering the button', 'bauman'),
			'param_name' => 'hover_caption',
			'value' => esc_html__('Hover Caption', 'bauman'),
		),
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Button type', 'bauman'),
			'description' => '',
			'param_name' => 'type',
			'value' => array( 'normal', 'outline'),
		),
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Rounded border', 'bauman'),
			'description' => '',
			'param_name' => 'rounded',
			'value' => array( 'yes', 'no'),
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'bauman'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'bauman'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Caption', 'bauman'),
			'param_name' => 'content',
			'value' => esc_html__('Caption goes here', 'bauman'),
		),
		)
) );

vc_map( array(
	'name' => 'Space Between Buttons',
	'base' => 'space_between_buttons',
	'icon' => 'icon-vc-clapat-bauman',
	'category' => esc_html__('Bauman - Typo Elements', 'bauman'),
	'description' => esc_html__('Adds a space between two button shortcodes', 'bauman'),
	'show_settings_on_create' => false
) );

vc_map( array(
	'name' => 'Accordion',
	'base' => 'accordion',
	'icon' => 'icon-vc-clapat-bauman',
	'as_parent' => array('only' => 'accordion_item'),
	'category' => esc_html__('Bauman - Elements', 'bauman'),
	'description' => esc_html__('Accordion', 'bauman'),
	'content_element' => true,
	'show_settings_on_create' => false,
	"params" => array(
        // add params same as with any other content element
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'bauman'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'bauman'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_accordion extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Accordion Item',
	'base' => 'accordion_item',
	'icon' => 'icon-vc-clapat-bauman',
	'as_child' => array('only' => 'accordion' ),
	'category' => esc_html__('Bauman - Elements', 'bauman'),
	'description' => esc_html__('Accordion Item', 'bauman'),
	'content_element' => true,
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Title', 'bauman'),
			'description' => '',
			'param_name' => 'title',
			'value' => 'Accordion Item Title',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Content', 'bauman'),
			'param_name' => 'content',
			'value' => esc_html__('Content goes here', 'bauman'),
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_accordion_item extends WPBakeryShortCode {}}

vc_map( array(
	'name' => 'Icon Service',
	'base' => 'service',
	'icon' => 'icon-vc-clapat-bauman',
	'is_container' => 'true',
	'category' => esc_html__('Bauman - Elements', 'bauman'),
	'description' => esc_html__('Service Box', 'bauman'),
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Icon', 'bauman'),
			'description' => esc_html__('Icon displayed within service box. Type in the class of the icon in this edit box. The complete and latest list: http://fortawesome.github.io/Font-Awesome/icons/', 'bauman'),
			'param_name' => 'icon',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Service Title', 'bauman'),
			'description' => esc_html__('Title of the service', 'bauman'),
			'param_name' => 'title',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'bauman'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'bauman'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Content', 'bauman'),
			'param_name' => 'content',
			'value' => esc_html__('Content goes here', 'bauman'),
		),
	)
) );

vc_map( array(
	'name' => 'Contact Info Box',
	'base' => 'contact_box',
	'icon' => 'icon-vc-clapat-bauman',
	'is_container' => 'true',
	'category' => esc_html__('Bauman - Elements', 'bauman'),
	'description' => esc_html__('Contact Info  Box', 'bauman'),
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Icon', 'bauman'),
			'description' => esc_html__('Icon displayed within contact info box. Type in the class of the icon in this edit box. The complete and latest list: http://fortawesome.github.io/Font-Awesome/icons/', 'bauman'),
			'param_name' => 'icon',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Title', 'bauman'),
			'description' => esc_html__('Title or header of the contact info box', 'bauman'),
			'param_name' => 'title',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'bauman'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'bauman'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Contact Info', 'bauman'),
			'param_name' => 'content',
			'value' => esc_html__('Contact info goes here', 'bauman'),
		),
	)
) );

vc_map( array(
	'name' => 'Map',
	'base' => 'bauman_map',
	'icon' => 'icon-vc-clapat-bauman',
	'category' => esc_html__('Bauman - Elements', 'bauman'),
	'description' => esc_html__('Adds a google map with settings from theme options.', 'bauman'),
	'show_settings_on_create' => false
) );

vc_map( array(
	'name' => 'Normal Image Slider',
	'base' => 'general_slider',
	'icon' => 'icon-vc-clapat-bauman',
	'as_parent' => array('only' => 'general_slide'),'category' => esc_html__('Bauman - Sliders', 'bauman'),
	'description' => esc_html__('Normal Image Slider', 'bauman'),
	'content_element' => true,
	'show_settings_on_create' =>true,
	"params" => array(
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'bauman'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'bauman'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_general_slider extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Slide',
	'base' => 'general_slide',
	'icon' => 'icon-vc-clapat-bauman',
	'as_child' => array('only' => 'general_slider' ),'category' => esc_html__('Bauman - Sliders', 'bauman'),
	'description' => esc_html__('Slide', 'bauman'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Slider Image', 'bauman'),
			'description' => esc_html__('Image representing this slide', 'bauman'),
			'param_name' => 'img_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Image ALT', 'bauman'),
			'description' => esc_html__('The ALT attribute specifies an alternate text for an image, if the image cannot be displayed', 'bauman'),
			'param_name' => 'alt',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_general_slide extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Carousel Image Slider',
	'base' => 'carousel_slider',
	'icon' => 'icon-vc-clapat-bauman',
	'as_parent' => array('only' => 'carousel_slide'),'category' => esc_html__('Bauman - Sliders', 'bauman'),
	'description' => esc_html__('Carousel Image Slider', 'bauman'),
	'content_element' => true,
	'show_settings_on_create' =>true,
	"params" => array(
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'bauman'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'bauman'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_carousel_slider extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Carousel Slide',
	'base' => 'carousel_slide',
	'icon' => 'icon-vc-clapat-bauman',
	'as_child' => array('only' => 'carousel_slider' ),
	'category' => esc_html__('Bauman - Sliders', 'bauman'),
	'description' => esc_html__('Carousel Slide', 'bauman'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Slider Image', 'bauman'),
			'description' => esc_html__('Image representing this slide', 'bauman'),
			'param_name' => 'img_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Image ALT', 'bauman'),
			'description' => esc_html__('The ALT attribute specifies an alternate text for an image, if the image cannot be displayed', 'bauman'),
			'param_name' => 'alt',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_carousel_slide extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Image Collage',
	'base' => 'clapat_collage',
	'icon' => 'icon-vc-clapat-bauman',
	'as_parent' => array('only' => 'clapat_collage_image'),
	'category' => esc_html__('Bauman - Elements', 'bauman'),
	'description' => esc_html__('Collage with image popup', 'bauman'),
	'content_element' => true,
	'show_settings_on_create' => true,
	"params" => array(
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'bauman'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'bauman'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_clapat_collage extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Collage Image',
	'base' => 'clapat_collage_image',
	'icon' => 'icon-vc-clapat-bauman',
	'as_child' => array('only' => 'clapat_collage' ),
	'category' => esc_html__('Bauman - Elements', 'bauman'),
	'description' => esc_html__('Collage Image', 'bauman'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Collage Image Thumbnail', 'bauman'),
			'description' => esc_html__('Thumbnail image representing this ollage item, included in carousel and linking a high res version.', 'bauman'),
			'param_name' => 'thumb_img_id',
			'value' => '',
		),
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Collage Image', 'bauman'),
			'description' => esc_html__('Image representing this collage item opening in a popup', 'bauman'),
			'param_name' => 'img_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Image ALT', 'bauman'),
			'description' => esc_html__('The ALT attribute specifies an alternate text for an image, if the image cannot be displayed', 'bauman'),
			'param_name' => 'alt',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Collage Image Caption', 'bauman'),
			'description' => esc_html__('The caption of this collage item', 'bauman'),
			'param_name' => 'info',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_clapat_collage_image extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Popup Image',
	'base' => 'clapat_popup_image',
	'icon' => 'icon-vc-clapat-bauman',
	'category' => esc_html__('Bauman - Elements', 'bauman'),
	'description' => esc_html__('Image Popup', 'bauman'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Zoomed Image', 'bauman'),
			'description' => esc_html__('Zoomed image - usually a higher res image', 'bauman'),
			'param_name' => 'img_id',
			'value' => '',
		),
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Thumbnail Image', 'bauman'),
			'description' => esc_html__('The thumbnail', 'bauman'),
			'param_name' => 'thumb_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'bauman'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'bauman'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_clapat_popup_image extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Captioned Image',
	'base' => 'clapat_captioned_image',
	'icon' => 'icon-vc-clapat-bauman',
	'category' => esc_html__('Bauman - Elements', 'bauman'),
	'description' => esc_html__('Captioned Image', 'bauman'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Image', 'bauman'),
			'description' => esc_html__('The image', 'bauman'),
			'param_name' => 'img_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('ALT', 'bauman'),
			'description' => esc_html__('ALT attribute.', 'bauman'),
			'param_name' => 'alt',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Caption', 'bauman'),
			'description' => esc_html__('Image caption.', 'bauman'),
			'param_name' => 'caption',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'bauman'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'bauman'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_clapat_captioned_image extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Testimonials',
	'base' => 'testimonials',
	'icon' => 'icon-vc-clapat-bauman',
	'as_parent' => array('only' => 'testimonial'),
	'category' => esc_html__('Bauman - Elements', 'bauman'),
	'description' => esc_html__('Testimonials Carousel', 'bauman'),
	'content_element' => true,
	'show_settings_on_create' => true,
	"params" => array(
        // add params same as with any other content element
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'bauman'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'bauman'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_testimonials extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Testimonial',
	'base' => 'testimonial',
	'icon' => 'icon-vc-clapat-bauman',
	'as_child' => array('only' => 'testimonials' ),
	'category' => esc_html__('Bauman - Elements', 'bauman'),
	'description' => esc_html__('Testimonial', 'bauman'),
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Name', 'bauman'),
			'description' => esc_html__('Name of the person or company this testimonial belongs to.', 'bauman'),
			'param_name' => 'name',
			'value' => '',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __('Content', 'bauman'),
			'param_name' => 'content',
			'value' => __('Content goes here', 'bauman'),
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_testimonial extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Clients',
	'base' => 'clients',
	'icon' => 'icon-vc-clapat-bauman',
	'as_parent' => array('only' => 'client_item'),
	'category' => esc_html__('Bauman - Elements', 'bauman'),
	'description' => esc_html__('Clients List', 'bauman'),
	'content_element' => true,
	'show_settings_on_create' => true,
	"params" => array(
        // add params same as with any other content element
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'bauman'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'bauman'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_clients extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Client',
	'base' => 'client_item',
	'icon' => 'icon-vc-clapat-bauman',
	'as_child' => array('only' => 'clients' ),
	'category' => esc_html__('Bauman - Elements', 'bauman'),
	'description' => esc_html__('Client Logo or Image', 'bauman'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Client Logo or Image', 'bauman'),
			'description' => esc_html__('The client logo', 'bauman'),
			'param_name' => 'img_id',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_client_item extends WPBakeryShortCode {}}

vc_map( array(
	'name' => 'Video Hosted',
	'base' => 'bauman_video',
	'icon' => 'icon-vc-clapat-bauman',
	'category' => esc_html__('Bauman - Elements', 'bauman'),
	'description' => esc_html__('Self hosted video', 'bauman'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Cover Image', 'bauman'),
			'description' => esc_html__('Cover image for still video', 'bauman'),
			'param_name' => 'cover_img_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Webm URL', 'bauman'),
			'description' => esc_html__('URL of the self hosted video in webm format', 'bauman'),
			'param_name' => 'webm_url',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Mp4 URL', 'bauman'),
			'description' => esc_html__('URL of the self hosted video in mp4 format', 'bauman'),
			'param_name' => 'mp4_url',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'bauman'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'bauman'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_bauman_video extends WPBakeryShortCode {}}

} // if vc_map function exists
?>