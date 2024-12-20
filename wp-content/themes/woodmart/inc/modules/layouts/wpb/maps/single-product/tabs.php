<?php
/**
 * Tabs map.
 *
 * @package Woodmart
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

if ( ! function_exists( 'woodmart_get_vc_map_single_product_tabs' ) ) {
	/**
	 * Tabs map.
	 */
	function woodmart_get_vc_map_single_product_tabs() {
		$typography_tabs_title       = woodmart_get_typography_map(
			array(
				'group'      => esc_html__( 'Style', 'woodmart' ),
				'key'        => 'tabs_title',
				'selector'   => '{{WRAPPER}} .woocommerce-tabs > .wd-nav-wrapper li > a',
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'tabs',
				),
			)
		);
		$typography_accordion_title  = woodmart_get_typography_map(
			array(
				'group'      => esc_html__( 'Style', 'woodmart' ),
				'key'        => 'accordion_title',
				'selector'   => '{{WRAPPER}} [class*="tab-title-"] .wd-accordion-title-text',
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'accordion',
				),
			)
		);
		$typography_all_open_title   = woodmart_get_typography_map(
			array(
				'group'      => esc_html__( 'Style', 'woodmart' ),
				'key'        => 'all_open_title',
				'selector'   => '{{WRAPPER}} .wd-all-open-title',
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'all-open',
				),
			)
		);
		$typography_tabs_side_hidden = woodmart_get_typography_map(
			array(
				'group'      => esc_html__( 'Style', 'woodmart' ),
				'key'        => 'side_hidden_title',
				'selector'   => '{{WRAPPER}} .wd-hidden-tab-title',
				'dependency' => array(
					'element' => 'layout',
					'value'   => 'side-hidden',
				),
			)
		);

		$name_typography = woodmart_get_typography_map(
			array(
				'title'         => esc_html__( 'Name Typography', 'woodmart' ),
				'group'         => esc_html__( 'Style', 'woodmart' ),
				'key'           => 'additional_info_name',
				'selector'      => '{{WRAPPER}} .woocommerce-product-attributes-item__label, .wd-single-attrs.wd-side-hidden .woocommerce-product-attributes-item__label',
				'wd_dependency' => array(
					'element' => 'additional_info_style_tabs',
					'value'   => array( 'name' ),
				),
				'dependency'    => array(
					'element' => 'attr_hide_name',
					'value'   => 'no',
				),
			)
		);
		$term_typography = woodmart_get_typography_map(
			array(
				'title'         => esc_html__( 'Term typography', 'woodmart' ),
				'group'         => esc_html__( 'Style', 'woodmart' ),
				'key'           => 'additional_info_term',
				'selector'      => '{{WRAPPER}} .woocommerce-product-attributes-item__value, .wd-single-attrs.wd-side-hidden .woocommerce-product-attributes-item__value',
				'wd_dependency' => array(
					'element' => 'additional_info_style_tabs',
					'value'   => array( 'term' ),
				),
			)
		);

		return array(
			'base'        => 'woodmart_single_product_tabs',
			'name'        => esc_html__( 'Product tabs', 'woodmart' ),
			'category'    => woodmart_get_tab_title_category_for_wpb( esc_html__( 'Single product elements', 'woodmart' ), 'single_product' ),
			'description' => esc_html__( 'WooCommerce single product tabs', 'woodmart' ),
			'icon'        => WOODMART_ASSETS . '/images/vc-icon/sp-icons/sp-tabs.svg',
			'params'      => array(
				array(
					'type'       => 'woodmart_css_id',
					'param_name' => 'woodmart_css_id',
				),

				array(
					'heading'    => esc_html__( 'Layout', 'woodmart' ),
					'type'       => 'dropdown',
					'param_name' => 'layout',
					'value'      => array(
						esc_html__( 'Tabs', 'woodmart' ) => 'tabs',
						esc_html__( 'Accordion', 'woodmart' ) => 'accordion',
						esc_html__( 'All open', 'woodmart' ) => 'all-open',
						esc_html__( 'Hidden sidebar', 'woodmart' ) => 'side-hidden',
					),
				),

				array(
					'heading'     => esc_html__( 'Accordion on mobile', 'woodmart' ),
					'type'        => 'woodmart_switch',
					'param_name'  => 'accordion_on_mobile',
					'true_state'  => 'yes',
					'false_state' => 'no',
					'default'     => 'no',
					'dependency' => array(
						'element' => 'layout',
						'value'   => 'tabs',
					),
				),

				array(
					'heading'     => esc_html__( 'Enable description tab', 'woodmart' ),
					'type'        => 'woodmart_switch',
					'param_name'  => 'enable_description',
					'true_state'  => 'yes',
					'false_state' => 'no',
					'default'     => 'yes',
				),

				array(
					'heading'     => esc_html__( 'Enable additional info tab', 'woodmart' ),
					'type'        => 'woodmart_switch',
					'param_name'  => 'enable_additional_info',
					'true_state'  => 'yes',
					'false_state' => 'no',
					'default'     => 'yes',
				),

				array(
					'heading'     => esc_html__( 'Enable reviews tab', 'woodmart' ),
					'type'        => 'woodmart_switch',
					'param_name'  => 'enable_reviews',
					'true_state'  => 'yes',
					'false_state' => 'no',
					'default'     => 'yes',
				),

				// Tabs title.
				array(
					'title'      => esc_html__( 'Title', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'woodmart_title_divider',
					'param_name' => 'tabs_title_divider',
					'dependency' => array(
						'element' => 'layout',
						'value'   => 'tabs',
					),
				),

				array(
					'heading'          => esc_html__( 'Style', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'dropdown',
					'param_name'       => 'tabs_style',
					'value'            => array(
						esc_html__( 'Default', 'woodmart' )   => 'default',
						esc_html__( 'Underline', 'woodmart' ) => 'underline',
						esc_html__( 'Overline', 'woodmart' )  => 'underline-reverse',
					),
					'dependency'       => array(
						'element' => 'layout',
						'value'   => 'tabs',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Color scheme', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'dropdown',
					'param_name'       => 'tabs_title_text_color_scheme',
					'value'            => array(
						esc_html__( 'Inherit', 'woodmart' ) => 'inherit',
						esc_html__( 'Light', 'woodmart' )   => 'light',
						esc_html__( 'Dark', 'woodmart' )    => 'dark',
						esc_html__( 'Custom', 'woodmart' )  => 'custom',
					),
					'dependency'       => array(
						'element' => 'layout',
						'value'   => 'tabs',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Idle color', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'tabs_title_text_idle_color',
					'selectors'        => array(
						'{{WRAPPER}} .woocommerce-tabs > .wd-nav-wrapper li > a' => array(
							'color: {{VALUE}};',
						),
					),
					'dependency'       => array(
						'element' => 'tabs_title_text_color_scheme',
						'value'   => 'custom',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Hover color', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'tabs_title_text_hover_color',
					'selectors'        => array(
						'{{WRAPPER}} .woocommerce-tabs > .wd-nav-wrapper li:hover > a' => array(
							'color: {{VALUE}};',
						),
					),
					'dependency'       => array(
						'element' => 'tabs_title_text_color_scheme',
						'value'   => 'custom',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Active color', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'tabs_title_text_active_color',
					'selectors'        => array(
						'{{WRAPPER}} .woocommerce-tabs > .wd-nav-wrapper li.active > a' => array(
							'color: {{VALUE}};',
						),
					),
					'dependency'       => array(
						'element' => 'tabs_title_text_color_scheme',
						'value'   => 'custom',
					),
					'edit_field_class' => 'vc_col-sm-12 vc_column',
				),

				$typography_tabs_title['font_family'],
				$typography_tabs_title['font_size'],
				$typography_tabs_title['font_weight'],
				$typography_tabs_title['text_transform'],
				$typography_tabs_title['font_style'],
				$typography_tabs_title['line_height'],

				array(
					'heading'          => esc_html__( 'Alignment', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_select',
					'param_name'       => 'tabs_alignment',
					'style'            => 'images',
					'selectors'        => array(),
					'devices'          => array(
						'desktop' => array(
							'value' => 'center',
						),
					),
					'value'            => array(
						esc_html__( 'Left', 'woodmart' )   => 'left',
						esc_html__( 'Center', 'woodmart' ) => 'center',
						esc_html__( 'Right', 'woodmart' )  => 'right',
					),
					'images'           => array(
						'left'   => WOODMART_ASSETS_IMAGES . '/settings/align/left.jpg',
						'center' => WOODMART_ASSETS_IMAGES . '/settings/align/center.jpg',
						'right'  => WOODMART_ASSETS_IMAGES . '/settings/align/right.jpg',
					),
					'dependency'       => array(
						'element' => 'layout',
						'value'   => 'tabs',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'    => esc_html__( 'Horizontal spacing', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'wd_slider',
					'param_name' => 'tabs_space_between_tabs_title_horizontal',
					'selectors'  => array(
						'{{WRAPPER}} .wd-nav-tabs' => array(
							'--nav-gap: {{VALUE}}{{UNIT}};',
						),
					),
					'devices'    => array(
						'desktop' => array(
							'value' => '',
							'unit'  => 'px',
						),
						'tablet'  => array(
							'value' => '',
							'unit'  => 'px',
						),
						'mobile'  => array(
							'value' => '',
							'unit'  => 'px',
						),
					),
					'range'      => array(
						'px' => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
					'dependency' => array(
						'element' => 'layout',
						'value'   => 'tabs',
					),
				),

				array(
					'heading'    => esc_html__( 'Vertical spacing', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'wd_slider',
					'param_name' => 'tabs_space_between_tabs_title_vertical',
					'selectors'  => array(
						'{{WRAPPER}} div.wd-nav-tabs-wrapper' => array(
							'margin-bottom: {{VALUE}}{{UNIT}};',
						),
					),
					'devices'    => array(
						'desktop' => array(
							'value' => '',
							'unit'  => 'px',
						),
						'tablet'  => array(
							'value' => '',
							'unit'  => 'px',
						),
						'mobile'  => array(
							'value' => '',
							'unit'  => 'px',
						),
					),
					'range'      => array(
						'px' => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
					'dependency' => array(
						'element' => 'layout',
						'value'   => 'tabs',
					),
				),

				// Accordion title.
				array(
					'title'      => esc_html__( 'Title', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'woodmart_title_divider',
					'param_name' => 'accordion_title_divider',
					'dependency' => array(
						'element' => 'layout',
						'value'   => 'accordion',
					),
				),

				array(
					'heading'          => esc_html__( 'Items state', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'dropdown',
					'param_name'       => 'accordion_state',
					'value'            => array(
						esc_html__( 'First opened', 'woodmart' ) => 'first',
						esc_html__( 'All closed', 'woodmart' )   => 'all_closed',
					),
					'dependency'       => array(
						'element' => 'layout',
						'value'   => 'accordion',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Style', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'dropdown',
					'param_name'       => 'accordion_style',
					'value'            => array(
						esc_html__( 'Default', 'woodmart' ) => 'default',
						esc_html__( 'Boxed', 'woodmart' )  => 'shadow',
						esc_html__( 'Simple', 'woodmart' ) => 'simple',
					),
					'dependency'       => array(
						'element' => 'layout',
						'value'   => 'accordion',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'    => esc_html__( 'Box shadow', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'js_composer' ),
					'type'       => 'wd_box_shadow',
					'param_name' => 'shadow',
					'selectors'  => array(
						'{{WRAPPER}} > div.wd-accordion.wd-style-shadow > .wd-accordion-item' => array(
							'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}};',
						),
					),
					'default'    => array(
						'horizontal' => '0',
						'vertical'   => '0',
						'blur'       => '9',
						'spread'     => '0',
						'color'      => 'rgba(0, 0, 0, .15)',
					),
					'dependency' => array(
						'element' => 'accordion_style',
						'value'   => 'shadow',
					),
				),

				array(
					'heading'          => esc_html__( 'Background color', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'accordion_shadow_bg_color',
					'selectors'        => array(
						'{{WRAPPER}} > div.wd-accordion.wd-style-shadow > .wd-accordion-item' => array(
							'background-color: {{VALUE}};',
						),
					),
					'dependency'       => array(
						'element' => 'accordion_style',
						'value'   => 'shadow',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Title alignment', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_select',
					'param_name'       => 'accordion_alignment',
					'style'            => 'images',
					'selectors'        => array(),
					'devices'          => array(
						'desktop' => array(
							'value' => 'left',
						),
					),
					'value'            => array(
						esc_html__( 'Left', 'woodmart' )  => 'left',
						esc_html__( 'Right', 'woodmart' ) => 'right',
					),
					'images'           => array(
						'left'  => WOODMART_ASSETS_IMAGES . '/settings/align/left.jpg',
						'right' => WOODMART_ASSETS_IMAGES . '/settings/align/right.jpg',
					),
					'dependency'       => array(
						'element' => 'layout',
						'value'   => 'accordion',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Hide top & bottom border', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'woodmart_switch',
					'param_name'       => 'accordion_hide_top_bottom_border',
					'true_state'       => 'yes',
					'false_state'      => 'no',
					'default'          => 'no',
					'dependency'       => array(
						'element' => 'accordion_style',
						'value'   => array( 'default' ),
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				$typography_accordion_title['font_family'],
				$typography_accordion_title['font_size'],
				$typography_accordion_title['font_weight'],
				$typography_accordion_title['text_transform'],
				$typography_accordion_title['font_style'],
				$typography_accordion_title['line_height'],

				array(
					'heading'          => esc_html__( 'Color scheme', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'dropdown',
					'param_name'       => 'accordion_title_text_color_scheme',
					'value'            => array(
						esc_html__( 'Inherit', 'woodmart' ) => 'inherit',
						esc_html__( 'Light', 'woodmart' )   => 'light',
						esc_html__( 'Dark', 'woodmart' )    => 'dark',
						esc_html__( 'Custom', 'woodmart' )  => 'custom',
					),
					'dependency'       => array(
						'element' => 'layout',
						'value'   => 'accordion',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Idle color', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'accordion_title_text_idle_color',
					'selectors'        => array(
						'{{WRAPPER}} [class*="tab-title-"] .wd-accordion-title-text' => array(
							'color: {{VALUE}};',
						),
					),
					'dependency'       => array(
						'element' => 'accordion_title_text_color_scheme',
						'value'   => 'custom',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Hover color', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'accordion_title_text_hover_color_tab',
					'selectors'        => array(
						'{{WRAPPER}} .wd-accordion-title[class*="tab-title-"]:hover .wd-accordion-title-text' => array(
							'color: {{VALUE}};',
						),
					),
					'dependency'       => array(
						'element' => 'accordion_title_text_color_scheme',
						'value'   => 'custom',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Active color', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'accordion_title_text_active_color',
					'selectors'        => array(
						'{{WRAPPER}} .wd-accordion-title[class*="tab-title-"].wd-active .wd-accordion-title-text' => array(
							'color: {{VALUE}};',
						),
					),
					'dependency'       => array(
						'element' => 'accordion_title_text_color_scheme',
						'value'   => 'custom',
					),
					'edit_field_class' => 'vc_col-sm-12 vc_column',
				),

				// Hidden sidebar title.
				array(
					'title'      => esc_html__( 'Title', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'woodmart_title_divider',
					'param_name' => 'side_hidden_title_divider',
					'dependency' => array(
						'element' => 'layout',
						'value'   => 'side-hidden',
					),
				),

				$typography_tabs_side_hidden['font_family'],
				$typography_tabs_side_hidden['font_size'],
				$typography_tabs_side_hidden['font_weight'],
				$typography_tabs_side_hidden['text_transform'],
				$typography_tabs_side_hidden['font_style'],
				$typography_tabs_side_hidden['line_height'],

				array(
					'heading'          => esc_html__( 'Color scheme', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'dropdown',
					'param_name'       => 'side_hidden_title_text_color_scheme',
					'value'            => array(
						esc_html__( 'Inherit', 'woodmart' ) => 'inherit',
						esc_html__( 'Light', 'woodmart' )  => 'light',
						esc_html__( 'Dark', 'woodmart' )   => 'dark',
						esc_html__( 'Custom', 'woodmart' ) => 'custom',
					),
					'dependency'       => array(
						'element' => 'layout',
						'value'   => 'side-hidden',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Idle color', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'side_hidden_title_text_idle_color',
					'selectors'        => array(
						'{{WRAPPER}} .wd-hidden-tab-title' => array(
							'color: {{VALUE}};',
						),
					),
					'dependency'       => array(
						'element' => 'side_hidden_title_text_color_scheme',
						'value'   => 'custom',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Hover color', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'side_hidden_title_text_hover_color',
					'selectors'        => array(
						'{{WRAPPER}} .wd-hidden-tab-title:hover' => array(
							'color: {{VALUE}};',
						),
					),
					'dependency'       => array(
						'element' => 'side_hidden_title_text_color_scheme',
						'value'   => 'custom',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Active color', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'side_hidden_title_text_active_color',
					'selectors'        => array(
						'{{WRAPPER}} .wd-hidden-tab-title.wd-active' => array(
							'color: {{VALUE}};',
						),
					),
					'dependency'       => array(
						'element' => 'side_hidden_title_text_color_scheme',
						'value'   => 'custom',
					),
					'edit_field_class' => 'vc_col-sm-12 vc_column',
				),

				// General.
				array(
					'title'      => esc_html__( 'General', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'woodmart_title_divider',
					'param_name' => 'general_divider',
					'dependency' => array(
						'element' => 'layout',
						'value'   => 'all-open',
					),
				),

				array(
					'heading'    => esc_html__( 'Vertical spacing', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'wd_slider',
					'param_name' => 'all_open_vertical_spacing',
					'selectors'  => array(
						'{{WRAPPER}} div.wd-tab-wrapper:not(:last-child)' => array(
							'margin-bottom: {{VALUE}}{{UNIT}};',
						),
					),
					'devices'    => array(
						'desktop' => array(
							'value' => '',
							'unit'  => 'px',
						),
						'tablet'  => array(
							'value' => '',
							'unit'  => 'px',
						),
						'mobile'  => array(
							'value' => '',
							'unit'  => 'px',
						),
					),
					'range'      => array(
						'px' => array(
							'min'  => 0,
							'max'  => 200,
							'step' => 1,
						),
					),
				),

				// All open title.
				array(
					'title'      => esc_html__( 'Title', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'woodmart_title_divider',
					'param_name' => 'all_open_title_divider',
					'dependency' => array(
						'element' => 'layout',
						'value'   => 'all-open',
					),
				),

				array(
					'heading'          => esc_html__( 'Style', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'dropdown',
					'param_name'       => 'all_open_style',
					'value'            => array(
						esc_html__( 'Default', 'woodmart' )  => 'default',
						esc_html__( 'Overline', 'woodmart' ) => 'overline',
					),
					'dependency'       => array(
						'element' => 'layout',
						'value'   => 'all-open',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Color', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'all_open_title_text_color',
					'selectors'        => array(
						'{{WRAPPER}} .wd-all-open-title' => array(
							'color: {{VALUE}};',
						),
					),
					'dependency'       => array(
						'element' => 'layout',
						'value'   => 'all-open',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				$typography_all_open_title['font_family'],
				$typography_all_open_title['font_size'],
				$typography_all_open_title['font_weight'],
				$typography_all_open_title['text_transform'],
				$typography_all_open_title['font_style'],
				$typography_all_open_title['line_height'],

				// Opener.
				array(
					'title'      => esc_html__( 'Opener', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'woodmart_title_divider',
					'param_name' => 'opener_divider',
					'dependency' => array(
						'element' => 'layout',
						'value'   => 'accordion',
					),
				),

				array(
					'heading'          => esc_html__( 'Style', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'dropdown',
					'param_name'       => 'accordion_opener_style',
					'value'            => array(
						esc_html__( 'Arrow', 'woodmart' ) => 'arrow',
						esc_html__( 'Plus', 'woodmart' )  => 'plus',
					),
					'dependency'       => array(
						'element' => 'layout',
						'value'   => 'accordion',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Position', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_select',
					'param_name'       => 'accordion_opener_alignment',
					'style'            => 'images',
					'selectors'        => array(),
					'devices'          => array(
						'desktop' => array(
							'value' => 'left',
						),
					),
					'value'            => array(
						esc_html__( 'Left', 'woodmart' )  => 'left',
						esc_html__( 'Right', 'woodmart' ) => 'right',
					),
					'images'           => array(
						'left'  => WOODMART_ASSETS_IMAGES . '/settings/infobox/position/left.png',
						'right' => WOODMART_ASSETS_IMAGES . '/settings/infobox/position/right.png',
					),
					'dependency'       => array(
						'element' => 'layout',
						'value'   => 'accordion',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				// Content.
				array(
					'title'      => esc_html__( 'Content', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'woodmart_title_divider',
					'param_name' => 'content_divider',
					'dependency' => array(
						'element'            => 'layout',
						'value_not_equal_to' => 'all-open',
					),
				),

				array(
					'heading'    => esc_html__( 'Color scheme', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'dropdown',
					'param_name' => 'tabs_content_text_color_scheme',
					'value'      => array(
						esc_html__( 'Inherit', 'woodmart' ) => 'inherit',
						esc_html__( 'Light', 'woodmart' ) => 'light',
						esc_html__( 'Dark', 'woodmart' )  => 'dark',
					),
					'dependency' => array(
						'element'            => 'layout',
						'value_not_equal_to' => 'all-open',
					),
				),

				array(
					'heading'          => esc_html__( 'Hidden sidebar position', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_select',
					'param_name'       => 'side_hidden_content_position',
					'style'            => 'images',
					'selectors'        => array(),
					'devices'          => array(
						'desktop' => array(
							'value' => 'right',
						),
					),
					'value'            => array(
						esc_html__( 'Left', 'woodmart' )  => 'left',
						esc_html__( 'Right', 'woodmart' ) => 'right',
					),
					'images'           => array(
						'left'  => WOODMART_ASSETS_IMAGES . '/settings/sidebar-layout/left.png',
						'right' => WOODMART_ASSETS_IMAGES . '/settings/sidebar-layout/right.png',
					),
					'dependency'       => array(
						'element' => 'layout',
						'value'   => 'side-hidden',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'    => esc_html__( 'Hidden sidebar width', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'wd_slider',
					'param_name' => 'side_hidden_content_width',
					'selectors'  => array(
						'.wd-side-hidden[class*="woocommerce-Tabs-panel--"]' => array(
							'--wd-side-hidden-w: {{VALUE}}{{UNIT}};',
						),
					),
					'devices'    => array(
						'desktop' => array(
							'value' => '',
							'unit'  => 'px',
						),
						'tablet'  => array(
							'value' => '',
							'unit'  => 'px',
						),
						'mobile'  => array(
							'value' => '',
							'unit'  => 'px',
						),
					),
					'range'      => array(
						'px' => array(
							'min'  => 0,
							'max'  => 1000,
							'step' => 1,
						),
						'%'  => array(
							'min'  => 1,
							'max'  => 100,
							'step' => 1,
						),
					),
					'dependency' => array(
						'element' => 'layout',
						'value'   => 'side-hidden',
					),
				),

				// Additional information.
				array(
					'title'      => esc_html__( 'Additional information', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'woodmart_title_divider',
					'param_name' => 'additional_info_divider',
				),

				array(
					'heading'          => esc_html__( 'Layout', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'dropdown',
					'param_name'       => 'additional_info_layout',
					'value'            => array(
						esc_html__( 'List', 'woodmart' )   => 'list',
						esc_html__( 'Grid', 'woodmart' )   => 'grid',
						esc_html__( 'Inline', 'woodmart' ) => 'inline',
					),
					'wood_tooltip'     => true,
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Style', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'dropdown',
					'param_name'       => 'additional_info_style',
					'value'            => array(
						esc_html__( 'Default', 'woodmart' )  => 'default',
						esc_html__( 'Bordered', 'woodmart' ) => 'bordered',
					),
					'std'              => 'bordered',
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'    => esc_html__( 'Columns', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'wd_slider',
					'param_name' => 'additional_info_columns',
					'selectors'  => array(
						'{{WRAPPER}} .shop_attributes, .wd-single-attrs.wd-side-hidden .shop_attributes' => array(
							'--wd-attr-col: {{VALUE}};',
						),
					),
					'devices'    => array(
						'desktop' => array(
							'value' => '',
							'unit'  => '-',
						),
						'tablet'  => array(
							'value' => '',
							'unit'  => '-',
						),
						'mobile'  => array(
							'value' => '',
							'unit'  => '-',
						),
					),
					'range'      => array(
						'-' => array(
							'min'  => 1,
							'max'  => 6,
							'step' => 1,
						),
					),
				),

				array(
					'heading'    => esc_html__( 'Vertical spacing', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'wd_slider',
					'param_name' => 'additional_info_vertical_gap',
					'selectors'  => array(
						'{{WRAPPER}} .shop_attributes, .wd-single-attrs.wd-side-hidden .shop_attributes' => array(
							'--wd-attr-v-gap: {{VALUE}}{{UNIT}};',
						),
					),
					'devices'    => array(
						'desktop' => array(
							'value' => '',
							'unit'  => 'px',
						),
						'tablet'  => array(
							'value' => '',
							'unit'  => 'px',
						),
						'mobile'  => array(
							'value' => '',
							'unit'  => 'px',
						),
					),
					'range'      => array(
						'px' => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),

				array(
					'heading'    => esc_html__( 'Horizontal spacing', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'wd_slider',
					'param_name' => 'additional_info_horizontal_gap',
					'selectors'  => array(
						'{{WRAPPER}} .shop_attributes, .wd-single-attrs.wd-side-hidden .shop_attributes' => array(
							'--wd-attr-h-gap: {{VALUE}}{{UNIT}};',
						),
					),
					'devices'    => array(
						'desktop' => array(
							'value' => '',
							'unit'  => 'px',
						),
						'tablet'  => array(
							'value' => '',
							'unit'  => 'px',
						),
						'mobile'  => array(
							'value' => '',
							'unit'  => 'px',
						),
					),
					'range'      => array(
						'px' => array(
							'min'  => 0,
							'max'  => 150,
							'step' => 1,
						),
					),
				),

				array(
					'heading'    => esc_html__( 'Table width', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'wd_slider',
					'param_name' => 'additional_info_max_width',
					'selectors'  => array(
						'{{WRAPPER}} .shop_attributes, .wd-single-attrs.wd-side-hidden .shop_attributes' => array(
							'max-width: {{VALUE}}{{UNIT}};',
						),
					),
					'devices'    => array(
						'desktop' => array(
							'value' => '',
							'unit'  => '%',
						),
						'tablet'  => array(
							'value' => '',
							'unit'  => '%',
						),
						'mobile'  => array(
							'value' => '',
							'unit'  => '%',
						),
					),
					'range'      => array(
						'%'  => array(
							'min'  => 1,
							'max'  => 100,
							'step' => 1,
						),
						'px' => array(
							'min'  => 1,
							'max'  => 1000,
							'step' => 1,
						),
					),
					'dependency' => array(
						'element' => 'layout',
						'value'   => 'tabs',
					),
				),

				array(
					'heading'          => esc_html__( 'Hide image', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'woodmart_switch',
					'param_name'       => 'attr_hide_image',
					'true_state'       => 'yes',
					'false_state'      => 'no',
					'default'          => 'no',
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'    => esc_html__( 'Image width', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'hint'       => esc_html__( 'Attribute image container width', 'woodmart' ),
					'type'       => 'wd_slider',
					'param_name' => 'additional_info_image_width',
					'selectors'  => array(
						'{{WRAPPER}} .shop_attributes, .wd-single-attrs.wd-side-hidden .shop_attributes' => array(
							'--wd-attr-img-width: {{VALUE}}{{UNIT}};',
						),
					),
					'devices'    => array(
						'desktop' => array(
							'value' => '',
							'unit'  => 'px',
						),
						'tablet'  => array(
							'value' => '',
							'unit'  => 'px',
						),
						'mobile'  => array(
							'value' => '',
							'unit'  => 'px',
						),
					),
					'range'      => array(
						'px' => array(
							'min'  => 0,
							'max'  => 300,
							'step' => 1,
						),
					),
					'dependency' => array(
						'element' => 'attr_hide_icon',
						'value'   => array( 'no' ),
					),
				),

				array(
					'type'       => 'woodmart_button_set',
					'heading'    => esc_html__( 'Typography', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'param_name' => 'additional_info_style_tabs',
					'tabs'       => true,
					'value'      => array(
						esc_html__( 'Name', 'woodmart' ) => 'name',
						esc_html__( 'Term', 'woodmart' ) => 'term',
					),
					'default'    => 'name',
				),

				array(
					'heading'          => esc_html__( 'Hide name', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'woodmart_switch',
					'param_name'       => 'attr_hide_name',
					'true_state'       => 'yes',
					'false_state'      => 'no',
					'default'          => 'no',
					'wd_dependency'    => array(
						'element' => 'additional_info_style_tabs',
						'value'   => array( 'name' ),
					),
				),

				$name_typography['font_family'],
				$name_typography['font_size'],
				$name_typography['font_weight'],
				$name_typography['text_transform'],
				$name_typography['font_style'],
				$name_typography['line_height'],

				array(
					'heading'          => esc_html__( 'Name color', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'additional_info_name_color',
					'selectors'        => array(
						'{{WRAPPER}} .woocommerce-product-attributes-item__label, .wd-single-attrs.wd-side-hidden .woocommerce-product-attributes-item__label' => array(
							'color: {{VALUE}};',
						),
					),
					'wd_dependency'    => array(
						'element' => 'additional_info_style_tabs',
						'value'   => array( 'name' ),
					),
					'dependency'       => array(
						'element' => 'attr_hide_name',
						'value'   => 'no',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'       => esc_html__( 'Name column width', 'woodmart' ),
					'group'         => esc_html__( 'Style', 'woodmart' ),
					'type'          => 'wd_slider',
					'param_name'    => 'attr_name_column_width',
					'selectors'     => array(
						'{{WRAPPER}} .woocommerce-product-attributes-item__label, .wd-single-attrs.wd-side-hidden .woocommerce-product-attributes-item__label' => array(
							'width: {{VALUE}}{{UNIT}};',
						),
					),
					'devices'       => array(
						'desktop' => array(
							'value' => '',
							'unit'  => 'px',
						),
						'tablet'  => array(
							'value' => '',
							'unit'  => 'px',
						),
						'mobile'  => array(
							'value' => '',
							'unit'  => 'px',
						),
					),
					'range'         => array(
						'px' => array(
							'min'  => 0,
							'max'  => 300,
							'step' => 1,
						),
						'%'  => array(
							'min'  => 1,
							'max'  => 100,
							'step' => 1,
						),
					),
					'wd_dependency' => array(
						'element' => 'additional_info_style_tabs',
						'value'   => array( 'name' ),
					),
					'dependency'    => array(
						'element' => 'additional_info_layout',
						'value'   => 'inline',
					),
				),

				$term_typography['font_family'],
				$term_typography['font_size'],
				$term_typography['font_weight'],
				$term_typography['text_transform'],
				$term_typography['font_style'],
				$term_typography['line_height'],

				array(
					'heading'          => esc_html__( 'Term color', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'additional_info_term_color',
					'selectors'        => array(
						'{{WRAPPER}} .woocommerce-product-attributes-item__value, .wd-single-attrs.wd-side-hidden .woocommerce-product-attributes-item__value' => array(
							'color: {{VALUE}};',
						),
					),
					'wd_dependency'    => array(
						'element' => 'additional_info_style_tabs',
						'value'   => array( 'term' ),
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				// Reviews.
				array(
					'title'      => esc_html__( 'Reviews', 'woodmart' ),
					'group'      => esc_html__( 'Style', 'woodmart' ),
					'type'       => 'woodmart_title_divider',
					'param_name' => 'reviews_divider',
				),

				array(
					'heading'          => esc_html__( 'Layout', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_select',
					'param_name'       => 'reviews_layout',
					'style'            => 'select',
					'selectors'        => array(),
					'devices'          => array(
						'desktop' => array(
							'value' => 'one-column',
						),
					),
					'value'            => array(
						esc_html__( 'One column', 'woodmart' )  => 'one-column',
						esc_html__( 'Two columns', 'woodmart' ) => 'two-column',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'heading'          => esc_html__( 'Gap', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_slider',
					'param_name'       => 'reviews_gap',
					'devices'          => array(
						'desktop' => array(
							'unit'  => 'px',
							'value' => '',
						),
						'tablet'  => array(
							'unit'  => 'px',
							'value' => '',
						),
						'mobile'  => array(
							'unit'  => 'px',
							'value' => '',
						),
					),
					'range'            => array(
						'px' => array(
							'min'  => 0,
							'max'  => 100,
							'step' => 1,
						),
					),
					'selectors'        => array(
						'{{WRAPPER}} .woocommerce-Reviews, .wd-single-reviews.wd-side-hidden .woocommerce-Reviews' => array(
							'--wd-col-gap: {{VALUE}}{{UNIT}};',
						),
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'heading'          => esc_html__( 'Reviews columns', 'woodmart' ),
					'group'            => esc_html__( 'Style', 'woodmart' ),
					'type'             => 'wd_select',
					'param_name'       => 'reviews_columns',
					'style'            => 'select',
					'selectors'        => array(),
					'devices'          => array(
						'desktop' => array(
							'value' => '1',
						),
						'tablet' => array(
							'value' => '1',
						),
						'mobile' => array(
							'value' => '1',
						),
					),
					'value'            => array(
						esc_html__( '1', 'woodmart' ) => '1',
						esc_html__( '2', 'woodmart' ) => '2',
						esc_html__( '3', 'woodmart' ) => '3',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'    => esc_html__( 'CSS box', 'woodmart' ),
					'group'      => esc_html__( 'Design Options', 'js_composer' ),
					'type'       => 'css_editor',
					'param_name' => 'css',
				),
				woodmart_get_vc_responsive_spacing_map(),
			),
		);
	}
}
