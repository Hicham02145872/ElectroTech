<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 8.6.0
 */

	defined( 'ABSPATH' ) || exit;

	if( woodmart_is_woo_ajax() === 'fragments' ) {
		woodmart_woocommerce_main_loop( true );
		die();
	}

	if ( ! woodmart_is_woo_ajax() ) {
		get_header( 'shop' );
	} else {
		woodmart_page_top_part();
	}

	$cat_desc_position = woodmart_get_opt( 'cat_desc_position' );
?>

<?php
	if ( 'sidebar-left' === woodmart_get_page_layout() ) {
		/**
		 * Hook: woocommerce_sidebar.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	}
?>

<?php
	/**
	 * Hook: woocommerce_before_main_content.
	 *
	 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
	 * @hooked woocommerce_breadcrumb - 20
	 * @hooked WC_Structured_Data::generate_website_data() - 30
	 */
	do_action( 'woocommerce_before_main_content' );

	/**
	 * Hook: woocommerce_shop_loop_header.
	 *
	 * @since 8.6.0
	 *
	 * @hooked woocommerce_product_taxonomy_archive_header - 10
	 */
	do_action( 'woocommerce_shop_loop_header' );
?>

<?php do_action( 'woodmart_before_shop_page' ); ?>

<?php
	if ( $cat_desc_position == 'before' ) {
		/**
		 * Hook: woocommerce_archive_description.
		 *
		 * @hooked woocommerce_taxonomy_archive_description - 10
		 * @hooked woocommerce_product_archive_description - 10
		 */
		do_action( 'woocommerce_archive_description' );
	}
?>

<?php woodmart_enqueue_inline_style( 'woo-shop-predefined' ); ?>
<?php woodmart_enqueue_inline_style( 'woo-mod-shop-loop-head' ); ?>

<div class="shop-loop-head">
	<div class="wd-shop-tools<?php echo woodmart_get_old_classes( ' woodmart-woo-breadcrumbs' ); ?>">
		<?php if ( woodmart_get_opt( 'shop_page_breadcrumbs', '1' ) ) : ?>
			<?php woodmart_current_breadcrumbs( 'shop' ); ?>
		<?php endif; ?>

		<?php woocommerce_result_count(); ?>
	</div>
	<div class="wd-shop-tools<?php echo woodmart_get_old_classes( ' woodmart-shop-tools' ); ?>">
		<?php if ( woocommerce_product_loop() ) : ?>
			<?php
			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked wc_print_notices - 10
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			do_action( 'woocommerce_before_shop_loop' );
			?>
		<?php endif; ?>
	</div>
</div>

<?php do_action( 'woodmart_shop_filters_area' ); ?>

<?php do_action( 'woodmart_woocommerce_main_loop' ); ?>

<?php
	if ( $cat_desc_position == 'after' ) {
		/**
		 * Hook: woocommerce_archive_description.
		 *
		 * @hooked woocommerce_taxonomy_archive_description - 10
		 * @hooked woocommerce_product_archive_description - 10
		 */
		do_action( 'woocommerce_archive_description' );
	}
?>

<?php
	/**
	 * Hook: woocommerce_after_main_content.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action( 'woocommerce_after_main_content' );
?>

<?php
if ( 'sidebar-left' !== woodmart_get_page_layout() ) {
	/**
	 * Hook: woocommerce_sidebar.
	 *
	 * @hooked woocommerce_get_sidebar - 10
	 */
	do_action( 'woocommerce_sidebar' );
}
?>

<?php
	if ( ! woodmart_is_woo_ajax() ) {
		get_footer( 'shop' );
	} else {
		woodmart_page_bottom_part();
	}
?>
