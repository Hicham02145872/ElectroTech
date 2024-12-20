<?php if ( ! defined( 'WOODMART_THEME_DIR' ) ) {
	exit( 'No direct script access allowed' );}
/**
* ------------------------------------------------------------------------------------------------
* Testimonials element map
* ------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'woodmart_get_vc_map_testimonials' ) ) {
	function woodmart_get_vc_map_testimonials() {
		return array(
			'name'                    => esc_html__( 'Testimonials', 'woodmart' ),
			'base'                    => 'testimonials',
			'as_parent'               => array( 'only' => 'testimonial' ),
			'content_element'         => true,
			'show_settings_on_create' => false,
			'category'                => woodmart_get_tab_title_category_for_wpb( esc_html__( 'Theme elements', 'woodmart' ) ),
			'description'             => esc_html__( 'User testimonials slider or grid', 'woodmart' ),
			'icon'                    => WOODMART_ASSETS . '/images/vc-icon/testimonials.svg',
			'params'                  => array(
				array(
					'type'       => 'woodmart_css_id',
					'param_name' => 'woodmart_css_id',
				),
				array(
					'type'       => 'woodmart_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Title', 'woodmart' ),
					'param_name' => 'title_divider',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Element title', 'woodmart' ),
					'param_name' => 'title',
					'value'      => '',
				),
				/**
				 * Layout
				 */
				array(
					'type'       => 'woodmart_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Layout', 'woodmart' ),
					'param_name' => 'layout_divider',
				),
				array(
					'type'             => 'woodmart_button_set',
					'heading'          => esc_html__( 'Layout', 'woodmart' ),
					'param_name'       => 'layout',
					'value'            => array(
						esc_html__( 'Carousel', 'woodmart' ) => 'slider',
						esc_html__( 'Grid', 'woodmart' ) => 'grid',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type'             => 'woodmart_button_set',
					'heading'          => esc_html__( 'Columns', 'woodmart' ),
					'param_name'       => 'columns_tabs',
					'tabs'             => true,
					'value'            => array(
						esc_html__( 'Desktop', 'woodmart' ) => 'desktop',
						esc_html__( 'Tablet', 'woodmart' ) => 'tablet',
						esc_html__( 'Mobile', 'woodmart' ) => 'mobile',
					),
					'dependency'       => array(
						'element' => 'layout',
						'value'   => array( 'grid' ),
					),
					'default'          => 'desktop',
					'edit_field_class' => 'wd-res-control wd-custom-width vc_col-sm-12 vc_column',
				),
				array(
					'type'             => 'dropdown',
					'param_name'       => 'columns',
					'value'            => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
					),
					'std'              => '3',
					'dependency'       => array(
						'element' => 'layout',
						'value'   => array( 'grid' ),
					),
					'wd_dependency'    => array(
						'element' => 'columns_tabs',
						'value'   => array( 'desktop' ),
					),
					'edit_field_class' => 'wd-res-item vc_col-sm-12 vc_column',
				),
				array(
					'type'             => 'dropdown',
					'param_name'       => 'columns_tablet',
					'value'            => array(
						esc_html__( 'Auto', 'woodmart' ) => 'auto',
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
					),
					'std'              => 'auto',
					'dependency'       => array(
						'element' => 'layout',
						'value'   => array( 'grid' ),
					),
					'wd_dependency'    => array(
						'element' => 'columns_tabs',
						'value'   => array( 'tablet' ),
					),
					'edit_field_class' => 'wd-res-item vc_col-sm-12 vc_column',
				),
				array(
					'type'             => 'dropdown',
					'param_name'       => 'columns_mobile',
					'value'            => array(
						esc_html__( 'Auto', 'woodmart' ) => 'auto',
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
					),
					'std'              => 'auto',
					'dependency'       => array(
						'element' => 'layout',
						'value'   => array( 'grid' ),
					),
					'wd_dependency'    => array(
						'element' => 'columns_tabs',
						'value'   => array( 'mobile' ),
					),
					'edit_field_class' => 'wd-res-item vc_col-sm-12 vc_column',
				),

				array(
					'type'             => 'woodmart_button_set',
					'heading'          => esc_html__( 'Space between testimonial', 'woodmart' ),
					'param_name'       => 'spacing_tabs',
					'tabs'             => true,
					'value'            => array(
						esc_html__( 'Desktop', 'woodmart' ) => 'desktop',
						esc_html__( 'Tablet', 'woodmart' ) => 'tablet',
						esc_html__( 'Mobile', 'woodmart' ) => 'mobile',
					),
					'default'          => 'desktop',
					'edit_field_class' => 'wd-res-control wd-custom-width vc_col-sm-12 vc_column',
				),
				array(
					'type'             => 'dropdown',
					'param_name'       => 'spacing',
					'value'            => array(
						30,
						20,
						10,
						6,
						2,
						0,
					),
					'wd_dependency'    => array(
						'element' => 'spacing_tabs',
						'value'   => array( 'desktop' ),
					),
					'edit_field_class' => 'wd-res-item vc_col-sm-12 vc_column',
				),
				array(
					'type'             => 'dropdown',
					'param_name'       => 'spacing_tablet',
					'value'            => array(
						esc_html__( 'Inherit', 'woodmart' ) => '',
						'30' => '30',
						'20' => '20',
						'10' => '10',
						'6'  => '6',
						'2'  => '2',
						'0'  => '0',
					),
					'std'              => '',
					'wd_dependency'    => array(
						'element' => 'spacing_tabs',
						'value'   => array( 'tablet' ),
					),
					'edit_field_class' => 'wd-res-item vc_col-sm-12 vc_column',
				),
				array(
					'type'             => 'dropdown',
					'param_name'       => 'spacing_mobile',
					'value'            => array(
						esc_html__( 'Inherit', 'woodmart' ) => '',
						'30' => '30',
						'20' => '20',
						'10' => '10',
						'6'  => '6',
						'2'  => '2',
						'0'  => '0',
					),
					'std'              => '',
					'wd_dependency'    => array(
						'element' => 'spacing_tabs',
						'value'   => array( 'mobile' ),
					),
					'edit_field_class' => 'wd-res-item vc_col-sm-12 vc_column',
				),
				/**
				 * Slider
				 */
				array(
					'type'       => 'woodmart_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Carousel', 'woodmart' ),
					'group'      => esc_html__( 'Carousel', 'woodmart' ),
					'param_name' => 'slider_divider',
					'dependency' => array(
						'element' => 'layout',
						'value'   => array( 'slider' ),
					),
				),
				/**
				 * Style
				 */
				array(
					'type'       => 'woodmart_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Style', 'woodmart' ),
					'param_name' => 'style_divider',
				),
				array(
					'type'             => 'woodmart_button_set',
					'heading'          => esc_html__( 'Color Scheme', 'woodmart' ),
					'param_name'       => 'woodmart_color_scheme',
					'value'            => array(
						esc_html__( 'Inherit', 'woodmart' ) => '',
						esc_html__( 'Light', 'woodmart' )   => 'light',
						esc_html__( 'Dark', 'woodmart' )    => 'dark',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type'             => 'woodmart_button_set',
					'heading'          => esc_html__( 'Style', 'woodmart' ),
					'param_name'       => 'style',
					'value'            => array(
						esc_html__( 'Standard', 'woodmart' ) => 'standard',
						esc_html__( 'Boxed', 'woodmart' ) => 'boxed',
						esc_html__( 'Information top', 'woodmart' ) => 'info-top',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type'             => 'dropdown',
					'heading'          => esc_html__( 'Text size', 'woodmart' ),
					'param_name'       => 'text_size',
					'value'            => array(
						esc_html__( 'Default', 'woodmart' ) => '',
						esc_html__( 'Small (14px)', 'woodmart' ) => 'small',
						esc_html__( 'Medium (16px)', 'woodmart' ) => 'medium',
						esc_html__( 'Large (18px)', 'woodmart' ) => 'large',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type'             => 'woodmart_colorpicker',
					'heading'          => esc_html__( 'Text background color', 'woodmart' ),
					'param_name'       => 'text_background_color_normal',
					'css_args'         => array(
						'background-color'    => array(
							' .wd-testimon-text',
						),
						'border-bottom-color' => array(
							' .wd-testimon-text:before',
						),
					),
					'dependency'       => array(
						'element' => 'style',
						'value'   => array( 'info-top' ),
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type'             => 'woodmart_colorpicker',
					'heading'          => esc_html__( 'Text color', 'woodmart' ),
					'param_name'       => 'text_color_normal',
					'css_args'         => array(
						'color' => array(
							' .wd-testimon-text',
						),
					),
					'dependency'       => array(
						'element' => 'style',
						'value'   => array( 'info-top' ),
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type'             => 'woodmart_image_select',
					'heading'          => esc_html__( 'Align', 'woodmart' ),
					'param_name'       => 'align',
					'value'            => array(
						esc_html__( 'Left', 'woodmart' )   => 'left',
						esc_html__( 'Center', 'woodmart' ) => 'center',
						esc_html__( 'Right', 'woodmart' )  => 'right',
					),
					'images_value'     => array(
						'center' => WOODMART_ASSETS_IMAGES . '/settings/align/center.jpg',
						'left'   => WOODMART_ASSETS_IMAGES . '/settings/align/left.jpg',
						'right'  => WOODMART_ASSETS_IMAGES . '/settings/align/right.jpg',
					),
					'dependency'       => array(
						'element'            => 'style',
						'value_not_equal_to' => array( 'info-top' ),
					),
					'std'              => 'center',
					'wood_tooltip'     => true,
					'edit_field_class' => 'vc_col-sm-6 vc_column title-align',
				),
				array(
					'type'             => 'woodmart_switch',
					'heading'          => esc_html__( 'Display stars rating', 'woodmart' ),
					'param_name'       => 'stars_rating',
					'true_state'       => 'yes',
					'false_state'      => 'no',
					'default'          => 'yes',
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				/**
				 * Extra
				 */
				array(
					'type'       => 'woodmart_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Extra options', 'woodmart' ),
					'param_name' => 'extra_divider',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Extra class name', 'woodmart' ),
					'param_name' => 'el_class',
					'hint'       => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'woodmart' ),
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'CSS box', 'woodmart' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design Options', 'js_composer' ),
				),
				function_exists( 'woodmart_get_vc_responsive_spacing_map' ) ? woodmart_get_vc_responsive_spacing_map() : '',
			),
			'js_view'                 => 'VcColumnView',
		);
	}
}

if ( ! function_exists( 'woodmart_get_vc_map_testimonial' ) ) {
	function woodmart_get_vc_map_testimonial() {
		return array(
			'name'            => esc_html__( 'Testimonial', 'woodmart' ),
			'base'            => 'testimonial',
			'class'           => '',
			'as_child'        => array( 'only' => 'testimonials' ),
			'content_element' => true,
			'category'        => woodmart_get_tab_title_category_for_wpb( esc_html__( 'Theme elements', 'woodmart' ) ),
			'description'     => esc_html__( 'User testimonial', 'woodmart' ),
			'icon'            => WOODMART_ASSETS . '/images/vc-icon/testimonials.svg',
			'params'          => array(
				/**
				 * Image
				 */
				array(
					'type'       => 'woodmart_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Image', 'woodmart' ),
					'param_name' => 'image_divider',
				),
				array(
					'type'             => 'attach_image',
					'heading'          => esc_html__( 'User Avatar', 'woodmart' ),
					'param_name'       => 'image',
					'value'            => '',
					'hint'             => esc_html__( 'Enter the person’s title or job position. For example: CEO or Senior Developer.', 'woodmart' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type'             => 'textfield',
					'heading'          => esc_html__( 'Image size', 'woodmart' ),
					'param_name'       => 'img_size',
					'hint'             => esc_html__( 'Enter image size. Example: \'thumbnail\', \'medium\', \'large\', \'full\' or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use \'thumbnail\' size.', 'woodmart' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				/**
				 * Content
				 */
				array(
					'type'       => 'woodmart_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Content', 'woodmart' ),
					'param_name' => 'content_divider',
				),
				array(
					'type'             => 'textfield',
					'heading'          => esc_html__( 'Name', 'woodmart' ),
					'param_name'       => 'name',
					'value'            => '',
					'hint'             => esc_html__( 'Enter the person’s name.', 'woodmart' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type'             => 'textfield',
					'heading'          => esc_html__( 'Title', 'woodmart' ),
					'param_name'       => 'title',
					'value'            => '',
					'hint'             => esc_html__( 'User title', 'woodmart' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type'       => 'textarea_html',
					'holder'     => 'div',
					'heading'    => esc_html__( 'Text', 'woodmart' ),
					'param_name' => 'content',
				),
				/**
				 * Extra
				 */
				array(
					'type'       => 'woodmart_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Extra options', 'woodmart' ),
					'param_name' => 'extra_divider',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Extra class name', 'woodmart' ),
					'param_name' => 'el_class',
					'hint'       => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'woodmart' ),
				),
			),
		);
	}
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_testimonials extends WPBakeryShortCodesContainer {

	}
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_testimonial extends WPBakeryShortCode {

	}
}
