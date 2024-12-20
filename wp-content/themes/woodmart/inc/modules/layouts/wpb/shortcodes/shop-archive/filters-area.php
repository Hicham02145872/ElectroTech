<?php
/**
 * Filters area shortcode.
 *
 * @package Woodmart
 */

use XTS\Modules\Layouts\Main;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

if ( ! function_exists( 'woodmart_shortcode_shop_archive_filters_area' ) ) {
	/**
	 * Filters area shortcode.
	 *
	 * @param array $settings Shortcode attributes.
	 */
	function woodmart_shortcode_shop_archive_filters_area( $settings ) {
		$default_settings = array(
			'css' => '',
		);

		$settings = wp_parse_args( $settings, $default_settings );

		$wrapper_classes  = 'wd-shop-filters-area wd-wpb';
		$wrapper_classes .= apply_filters( 'vc_shortcodes_css_class', '', '', $settings );

		if ( $settings['css'] ) {
			$wrapper_classes .= ' ' . vc_shortcode_custom_css_class( $settings['css'] );
		}

		ob_start();

		Main::setup_preview();

		woodmart_shop_filters_area(
			array(
				'classes' => $wrapper_classes,
			)
		);

		Main::restore_preview();

		return ob_get_clean();
	}
}
