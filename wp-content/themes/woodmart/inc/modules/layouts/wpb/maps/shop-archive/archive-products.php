<?php
/**
 * Archive products map.
 *
 * @package Woodmart
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

if ( ! function_exists( 'woodmart_get_vc_map_shop_archive_products' ) ) {
	/**
	 * Archive products map.
	 */
	function woodmart_get_vc_map_shop_archive_products() {
		return array(
			'base'        => 'woodmart_shop_archive_products',
			'name'        => esc_html__( 'Archive products', 'woodmart' ),
			'category'    => woodmart_get_tab_title_category_for_wpb( esc_html__( 'Products archive', 'woodmart' ), 'shop_archive' ),
			'description' => esc_html__( 'Show WooCommerce product grid', 'woodmart' ),
			'icon'        => WOODMART_ASSETS . '/images/vc-icon/sa-icons/sa-archive-products.svg',
			'params'      => array(
				array(
					'type'       => 'woodmart_css_id',
					'param_name' => 'woodmart_css_id',
				),

				array(
					'heading'          => esc_html__( 'Products view', 'woodmart' ),
					'type'             => 'dropdown',
					'param_name'       => 'products_view',
					'value'            => array(
						esc_html__( 'Inherit from Theme Settings', 'woodmart' ) => 'inherit',
						esc_html__( 'Grid', 'woodmart' ) => 'grid',
						esc_html__( 'List', 'woodmart' ) => 'list',
					),
					'std'              => 'inherit',
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Products columns', 'woodmart' ),
					'hint'             => esc_html__( 'How many products you want to show per row.', 'woodmart' ),
					'type'             => 'wd_select',
					'param_name'       => 'products_columns',
					'style'            => 'select',
					'selectors'        => array(),
					'devices'          => array(
						'desktop' => array(
							'value' => 'inherit',
						),
						'tablet'  => array(
							'value' => 'inherit',
						),
						'mobile'  => array(
							'value' => 'inherit',
						),
					),
					'value'            => array(
						esc_html__( 'Inherit from Theme Settings', 'woodmart' ) => 'inherit',
						esc_html__( '1', 'woodmart' ) => '1',
						esc_html__( '2', 'woodmart' ) => '2',
						esc_html__( '3', 'woodmart' ) => '3',
						esc_html__( '4', 'woodmart' ) => '4',
						esc_html__( '5', 'woodmart' ) => '5',
						esc_html__( '6', 'woodmart' ) => '6',
					),
					'dependency'       => array(
						'element'            => 'products_view',
						'value_not_equal_to' => 'list',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Space between products', 'woodmart' ),
					'hint'             => esc_html__( 'You can set different spacing between blocks on shop page.', 'woodmart' ),
					'type'             => 'wd_select',
					'param_name'       => 'products_spacing',
					'style'            => 'select',
					'selectors'        => array(),
					'devices'          => array(
						'desktop' => array(
							'value' => 'inherit',
						),
						'tablet'  => array(
							'value' => 'inherit',
						),
						'mobile'  => array(
							'value' => 'inherit',
						),
					),
					'value'            => array(
						esc_html__( 'Inherit from Theme Settings', 'woodmart' ) => 'inherit',
						esc_html__( '0', 'woodmart' )  => '0',
						esc_html__( '2', 'woodmart' )  => '2',
						esc_html__( '6', 'woodmart' )  => '6',
						esc_html__( '10', 'woodmart' ) => '10',
						esc_html__( '20', 'woodmart' ) => '20',
						esc_html__( '30', 'woodmart' ) => '30',
					),
					'dependency'       => array(
						'element'            => 'products_view',
						'value_not_equal_to' => 'list',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Products pagination', 'woodmart' ),
					'hint'             => esc_html__( 'Choose a type for the pagination on your shop page.', 'woodmart' ),
					'type'             => 'dropdown',
					'param_name'       => 'shop_pagination',
					'value'            => array(
						esc_html__( 'Inherit from Theme Settings', 'woodmart' )    => 'inherit',
						esc_html__( 'Pagination', 'woodmart' ) => 'pagination',
						__( '"Load more" button', 'woodmart' ) => 'more-btn',
						esc_html__( 'Infinite scrolling', 'woodmart' ) => 'infinit',
					),
					'std'              => 'inherit',
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'      => esc_html__( 'Hover on product', 'woodmart' ),
					'group'        => esc_html__( 'Design', 'woodmart' ),
					'hint'         => esc_html__( 'Choose one of those hover effects for products', 'woodmart' ),
					'type'         => 'woodmart_image_select',
					'param_name'   => 'product_hover',
					'value'        => array(
						esc_html__( 'Inherit from Theme Settings', 'woodmart' ) => 'inherit',
						esc_html__( 'Full info on hover', 'woodmart' ) => 'info-alt',
						esc_html__( 'Full info on image', 'woodmart' ) => 'info',
						esc_html__( 'Icons and "add to cart" on hover', 'woodmart' ) => 'alt',
						esc_html__( 'Icons on hover', 'woodmart' ) => 'icons',
						esc_html__( 'Quick', 'woodmart' ) => 'quick',
						esc_html__( 'Show button on hover on image', 'woodmart' ) => 'button',
						esc_html__( 'Show summary on hover', 'woodmart' ) => 'base',
						esc_html__( 'Standard button', 'woodmart' ) => 'standard',
						esc_html__( 'Tiled', 'woodmart' ) => 'tiled',
						esc_html__( 'Full width button', 'woodmart' ) => 'fw-button',
						esc_html__( 'Buttons on hover', 'woodmart' ) => 'buttons-on-hover',
					),
					'images_value' => array(
						'inherit'          => WOODMART_ASSETS_IMAGES . '/settings/empty.jpg',
						'info-alt'         => WOODMART_ASSETS_IMAGES . '/settings/hover/info-alt.jpg',
						'info'             => WOODMART_ASSETS_IMAGES . '/settings/hover/info.jpg',
						'alt'              => WOODMART_ASSETS_IMAGES . '/settings/hover/alt.jpg',
						'icons'            => WOODMART_ASSETS_IMAGES . '/settings/hover/icons.jpg',
						'quick'            => WOODMART_ASSETS_IMAGES . '/settings/hover/quick.jpg',
						'button'           => WOODMART_ASSETS_IMAGES . '/settings/hover/button.jpg',
						'base'             => WOODMART_ASSETS_IMAGES . '/settings/hover/base.jpg',
						'standard'         => WOODMART_ASSETS_IMAGES . '/settings/hover/standard.jpg',
						'tiled'            => WOODMART_ASSETS_IMAGES . '/settings/hover/tiled.jpg',
						'fw-button'        => WOODMART_ASSETS_IMAGES . '/settings/hover/fw-button.jpg',
						'buttons-on-hover' => WOODMART_ASSETS_IMAGES . '/settings/hover/buttons-on-hover.jpg',
					),
					'dependency'   => array(
						'element'            => 'products_view',
						'value_not_equal_to' => 'list',
					),
				),

				array(
					'heading'          => esc_html__( 'Images size', 'woodmart' ),
					'group'            => esc_html__( 'Design', 'woodmart' ),
					'type'             => 'textfield',
					'param_name'       => 'img_size',
					'hint'             => esc_html__( 'Enter image size. Example: \'thumbnail\', \'medium\', \'large\', \'full\' or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use \'thumbnail\' size.', 'woodmart' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'    => esc_html__( 'Products color scheme', 'woodmart' ),
					'group'      => esc_html__( 'Design', 'woodmart' ),
					'type'       => 'dropdown',
					'param_name' => 'products_color_scheme',
					'std'        => 'inherit',
					'value'      => array(
						esc_html__( 'Inherit from Theme Settings', 'woodmart' ) => 'inherit',
						esc_html__( 'Default', 'woodmart' ) => 'default',
						esc_html__( 'Dark', 'woodmart' )  => 'dark',
						esc_html__( 'Light', 'woodmart' ) => 'light',
					),
				),

				array(
					'heading'          => esc_html__( 'Products border', 'woodmart' ),
					'group'            => esc_html__( 'Design', 'woodmart' ),
					'type'             => 'dropdown',
					'param_name'       => 'products_bordered_grid',
					'value'            => array(
						esc_html__( 'Inherit from Theme Settings', 'woodmart' ) => 'inherit',
						esc_html__( 'Enable', 'woodmart' ) => 'enable',
						esc_html__( 'Disable', 'woodmart' ) => 'disable',
					),
					'std'              => 'inherit',
					'edit_field_class' => 'vc_col-sm-12 vc_column',
				),

				array(
					'type'             => 'dropdown',
					'heading'          => esc_html__( 'Border position', 'woodmart' ),
					'param_name'       => 'products_bordered_grid_style',
					'value'            => array(
						esc_html__( 'Inherit from Theme Settings', 'woodmart' ) => 'inherit',
						esc_html__( 'Outside', 'woodmart' ) => 'outside',
						esc_html__( 'Inside', 'woodmart' ) => 'inside',
					),
					'std'              => 'inherit',
					'group'            => esc_html__( 'Design', 'woodmart' ),
					'dependency'       => array(
						'element' => 'products_bordered_grid',
						'value'   => 'enable',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'          => esc_html__( 'Custom products border color', 'woodmart' ),
					'hint'             => esc_html__( 'Set custom border color for products.', 'woodmart' ),
					'group'            => esc_html__( 'Design', 'woodmart' ),
					'type'             => 'wd_colorpicker',
					'param_name'       => 'products_border_color',
					'selectors'        => array(
						'{{WRAPPER}} [class*="products-bordered-grid"], {{WRAPPER}} [class*="products-bordered-grid"] .wd-product' => array(
							'--wd-bordered-brd:{{VALUE}};',
						),
					),
					'dependency'       => array(
						'element' => 'products_bordered_grid',
						'value'   => 'enable',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),

				array(
					'heading'    => esc_html__( 'Products background', 'woodmart' ),
					'hint'       => esc_html__( 'Add a background to the products in your grid.', 'woodmart' ),
					'group'      => esc_html__( 'Design', 'woodmart' ),
					'type'       => 'dropdown',
					'param_name' => 'products_with_background',
					'std'        => 'inherit',
					'value'      => array(
						esc_html__( 'Inherit from Theme Settings', 'woodmart' ) => 'inherit',
						esc_html__( 'Yes', 'woodmart' ) => 'yes',
						esc_html__( 'No', 'woodmart' )  => 'no',
					),
				),

				array(
					'heading'    => esc_html__( 'Custom products background color', 'woodmart' ),
					'hint'       => esc_html__( 'Set custom background color for products.', 'woodmart' ),
					'group'      => esc_html__( 'Design', 'woodmart' ),
					'type'       => 'wd_colorpicker',
					'param_name' => 'products_background',
					'selectors'  => array(
						'{{WRAPPER}} .products.wd-products-with-bg, {{WRAPPER}} .products.wd-products-with-bg :is(.wd-product,.wd-cat)' => array(
							'--wd-prod-bg:{{VALUE}}; --wd-bordered-bg:{{VALUE}};',
						),
					),
					'dependency' => array(
						'element' => 'products_with_background',
						'value'   => array( 'yes' ),
					),
				),

				array(
					'heading'    => esc_html__( 'Products shadow', 'woodmart' ),
					'hint'       => esc_html__( 'Add a shadow to products if the initial product style did not have one.', 'woodmart' ),
					'group'      => esc_html__( 'Design', 'woodmart' ),
					'type'       => 'dropdown',
					'param_name' => 'products_shadow',
					'default'    => 'inherit',
					'value'      => array(
						esc_html__( 'Inherit from Theme Settings', 'woodmart' ) => 'inherit',
						esc_html__( 'Yes', 'woodmart' ) => 'yes',
						esc_html__( 'No', 'woodmart' )  => 'no',
					),
				),

				array(
					'heading'    => esc_html__( 'CSS box', 'woodmart' ),
					'group'      => esc_html__( 'Design Options', 'js_composer' ),
					'type'       => 'css_editor',
					'param_name' => 'css',
				),
				woodmart_get_vc_responsive_spacing_map(),

				// Width option (with dependency Columns option, responsive).
				woodmart_get_responsive_dependency_width_map( 'responsive_tabs' ),
				woodmart_get_responsive_dependency_width_map( 'width_desktop' ),
				woodmart_get_responsive_dependency_width_map( 'custom_width_desktop' ),
				woodmart_get_responsive_dependency_width_map( 'width_tablet' ),
				woodmart_get_responsive_dependency_width_map( 'custom_width_tablet' ),
				woodmart_get_responsive_dependency_width_map( 'width_mobile' ),
				woodmart_get_responsive_dependency_width_map( 'custom_width_mobile' ),
			),
		);
	}
}
