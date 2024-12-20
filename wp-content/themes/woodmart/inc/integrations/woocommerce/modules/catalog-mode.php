<?php if ( ! defined( 'WOODMART_THEME_DIR' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * ------------------------------------------------------------------------------------------------
 * WooCommerce catalog mode functions
 * ------------------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'woodmart_catalog_mode_init' ) ) {
	function woodmart_catalog_mode_init() {
		if ( ! woodmart_get_opt( 'catalog_mode' ) ) {
			return;
		}

		remove_action( 'woodmart_add_loop_btn', 'woocommerce_template_loop_add_to_cart', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	}

	add_action( 'wp', 'woodmart_catalog_mode_init', 10 );
	add_action( 'woocommerce_before_shop_loop_item', 'woodmart_catalog_mode_init', 10 );
}

if ( ! function_exists( 'woodmart_catalog_mode_pages_redirect' ) ) {
	function woodmart_catalog_mode_pages_redirect() {
		if ( ! woodmart_get_opt( 'catalog_mode' ) || ! woodmart_woocommerce_installed() ) {
			return;
		}

		$cart     = is_page( wc_get_page_id( 'cart' ) );
		$checkout = is_page( wc_get_page_id( 'checkout' ) );

		wp_reset_postdata();

		if ( $cart || $checkout ) {
			wp_redirect( home_url() );
			exit;
		}
	}

	add_action( 'wp', 'woodmart_catalog_mode_pages_redirect', 10 );
}

if ( ! function_exists( 'woodmart_add_class_for_catalog_mode_in_admin_panel' ) ) {
	function woodmart_add_class_for_catalog_mode_in_admin_panel( $classes ) {
		if ( get_current_screen() && get_current_screen()->is_block_editor() && woodmart_get_opt( 'catalog_mode' ) ) {
			$classes .= ' catalog-mode-on';
		}

		return $classes;
	}

	add_filter( 'admin_body_class', 'woodmart_add_class_for_catalog_mode_in_admin_panel' );
}