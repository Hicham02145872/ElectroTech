<?php
/**
 * Reviews map.
 *
 * @package Woodmart
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

if ( ! function_exists( 'woodmart_get_vc_map_single_product_reviews' ) ) {
	/**
	 * Reviews map.
	 */
	function woodmart_get_vc_map_single_product_reviews() {
		return array(
			'base'        => 'woodmart_single_product_reviews',
			'name'        => esc_html__( 'Product reviews', 'woodmart' ),
			'category'    => woodmart_get_tab_title_category_for_wpb( esc_html__( 'Single product elements', 'woodmart' ), 'single_product' ),
			'description' => esc_html__( 'Reviews and review form', 'woodmart' ),
			'icon'        => WOODMART_ASSETS . '/images/vc-icon/sp-icons/sp-reviews.svg',
			'params'      => array(
				array(
					'type'       => 'woodmart_css_id',
					'param_name' => 'woodmart_css_id',
				),

				array(
					'heading'          => esc_html__( 'Layout', 'woodmart' ),
					'type'             => 'wd_select',
					'param_name'       => 'layout',
					'style'            => 'select',
					'selectors'        => array(),
					'devices'          => array(
						'desktop' => array(
							'value' => 'one-column',
						),
					),
					'value'            => array(
						esc_html__( 'One column', 'woodmart' ) => 'one-column',
						esc_html__( 'Two columns', 'woodmart' ) => 'two-column',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'heading'          => esc_html__( 'Gap', 'woodmart' ),
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
						'{{WRAPPER}} .woocommerce-Reviews' => array(
							'--wd-col-gap: {{VALUE}}{{UNIT}};',
						),
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'type'       => 'woodmart_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Reviews', 'woodmart' ),
					'param_name' => 'reviews_general_divider',
				),

				array(
					'heading'          => esc_html__( 'Columns', 'woodmart' ),
					'type'             => 'wd_select',
					'param_name'       => 'reviews_columns',
					'style'            => 'select',
					'selectors'        => array(),
					'devices'          => array(
						'desktop' => array(
							'value' => '1',
						),
						'tablet'  => array(
							'value' => '1',
						),
						'mobile'  => array(
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
