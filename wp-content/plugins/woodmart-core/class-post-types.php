<?php
/**
 * Post types file.
 *
 * @package Woodmart
 */

namespace WOODCORE;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

/**
 * Post types class.
 */
class Post_Types {
	/**
	 * Instance.
	 *
	 * @var null
	 */
	public static $instance = null;

	/**
	 * Instance.
	 *
	 * @return Post_Types|null
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_layout' ), 1 );
		add_action( 'init', array( $this, 'linked_variations' ), 1 );
		add_action( 'init', array( $this, 'bought_together' ), 1 );
		add_action( 'init', array( $this, 'register_discounts' ), 1 );
		add_action( 'init', array( $this, 'register_free_gifts' ), 1 );
		add_action( 'init', array( $this, 'register_estimate_delivery' ), 1 );
	}

	/**
	 * Register layout post type.
	 */
	public function register_layout() {
		register_post_type(
			'woodmart_layout',
			array(
				'label'              => esc_html__( 'Layouts', 'woodmart' ),
				'labels'             => array(
					'name'          => esc_html__( 'Layouts', 'woodmart' ),
					'singular_name' => esc_html__( 'Layout', 'woodmart' ),
					'menu_name'     => esc_html__( 'Layouts', 'woodmart' ),
					'add_new'       => esc_html__( 'Add New', 'woodmart' ),
					'add_new_item'  => esc_html__( 'Add New', 'woodmart' ),
				),
				'supports'           => array( 'title', 'editor' ),
				'hierarchical'       => false,
				'public'             => true,
				'menu_position'      => 32,
				'menu_icon'          => 'dashicons-format-gallery',
				'publicly_queryable' => is_user_logged_in(),
				'show_in_rest'       => true,
				'capability_type'    => 'page',
			)
		);
	}

	/**
	 * Register layout post type.
	 */
	public function linked_variations() {
		if ( ! function_exists( 'woodmart_get_opt' ) || ! woodmart_get_opt( 'linked_variations', 1 ) ) {
			return;
		}

		register_post_type(
			'woodmart_woo_lv',
			array(
				'label'              => esc_html__( 'Linked Variations', 'woodmart' ),
				'labels'             => array(
					'name'          => esc_html__( 'Linked Variations', 'woodmart' ),
					'singular_name' => esc_html__( 'Linked Variations', 'woodmart' ),
					'menu_name'     => esc_html__( 'Linked Variations', 'woodmart' ),
					'add_new'       => esc_html__( 'Add New', 'woodmart' ),
					'add_new_item'  => esc_html__( 'Add New', 'woodmart' ),
				),
				'supports'           => array( 'title' ),
				'hierarchical'       => false,
				'public'             => true,
				'show_in_menu'       => 'edit.php?post_type=product',
				'publicly_queryable' => false,
				'show_in_rest'       => true,
				'capability_type'    => 'product',
			)
		);
	}

	/**
	 * Register frequently bought together post type.
	 */
	public function bought_together() {
		if ( ! function_exists( 'woodmart_get_opt' ) || ! woodmart_get_opt( 'bought_together_enabled', 1 ) ) {
			return;
		}

		register_post_type(
			'woodmart_woo_fbt',
			array(
				'label'              => esc_html__( 'Frequently Bought Together', 'woodmart' ),
				'labels'             => array(
					'name'          => esc_html__( 'Frequently Bought Together', 'woodmart' ),
					'singular_name' => esc_html__( 'Frequently Bought Together', 'woodmart' ),
					'menu_name'     => esc_html__( 'Frequently Bought Together', 'woodmart' ),
					'add_new'       => esc_html__( 'Add New', 'woodmart' ),
					'add_new_item'  => esc_html__( 'Add New', 'woodmart' ),
				),
				'supports'           => array( 'title' ),
				'hierarchical'       => false,
				'public'             => true,
				'show_in_menu'       => 'edit.php?post_type=product',
				'publicly_queryable' => false,
				'show_in_rest'       => true,
				'capability_type'    => 'product',
			)
		);
	}

	/**
	 * Register Dynamic Pricing & Discounts post type.
	 */
	public function register_discounts() {
		if ( ! function_exists( 'woodmart_get_opt' ) || ! woodmart_get_opt( 'discounts_enabled', 0 ) ) {
			return;
		}

		register_post_type(
			'wd_woo_discounts',
			array(
				'label'              => esc_html__( 'Dynamic Discounts', 'woodmart' ),
				'labels'             => array(
					'name'          => esc_html__( 'Dynamic Discounts', 'woodmart' ),
					'singular_name' => esc_html__( 'Dynamic Discount', 'woodmart' ),
					'menu_name'     => esc_html__( 'Dynamic Discounts', 'woodmart' ),
					'add_new'       => esc_html__( 'Add New', 'woodmart' ),
					'add_new_item'  => esc_html__( 'Add New', 'woodmart' ),
				),
				'supports'           => array( 'title' ),
				'hierarchical'       => false,
				'public'             => true,
				'show_in_menu'       => 'edit.php?post_type=product',
				'publicly_queryable' => false,
				'show_in_rest'       => true,
				'capability_type'    => 'product',
			)
		);
	}

	/**
	 * Register Free gifts post type.
	 */
	public function register_free_gifts() {
		if ( ! function_exists( 'woodmart_get_opt' ) || ! woodmart_get_opt( 'free_gifts_enabled', 0 ) ) {
			return;
		}

		register_post_type(
			'wd_woo_free_gifts',
			array(
				'label'              => esc_html__( 'Free Gifts', 'woodmart' ),
				'labels'             => array(
					'name'          => esc_html__( 'Free Gifts', 'woodmart' ),
					'singular_name' => esc_html__( 'Free Gift', 'woodmart' ),
					'menu_name'     => esc_html__( 'Free Gifts', 'woodmart' ),
					'add_new'       => esc_html__( 'Add New', 'woodmart' ),
					'add_new_item'  => esc_html__( 'Add New Gift', 'woodmart' ),
					'edit_item'     => esc_html__( 'Edit Gift Rule', 'woodmart' ),
				),
				'supports'           => array( 'title' ),
				'hierarchical'       => false,
				'public'             => true,
				'show_in_menu'       => 'edit.php?post_type=product',
				'publicly_queryable' => false,
				'show_in_rest'       => true,
				'capability_type'    => 'product',
			)
		);
	}

	/**
	 * Register Estimate Delivery post type.
	 */
	public function register_estimate_delivery() {
		if ( ! function_exists( 'woodmart_get_opt' ) || ! woodmart_get_opt( 'estimate_delivery_enabled', 0 ) ) {
			return;
		}

		register_post_type(
			'wd_woo_est_del',
			array(
				'label'              => esc_html__( 'Estimate Delivery', 'woodmart' ),
				'labels'             => array(
					'name'          => esc_html__( 'Estimate Delivery', 'woodmart' ),
					'singular_name' => esc_html__( 'Estimate Delivery', 'woodmart' ),
					'menu_name'     => esc_html__( 'Estimate Delivery', 'woodmart' ),
					'add_new'       => esc_html__( 'Add New', 'woodmart' ),
					'add_new_item'  => esc_html__( 'Add New Estimate Delivery Rule', 'woodmart' ),
					'edit_item'     => esc_html__( 'Edit Estimate Delivery Rule', 'woodmart' ),
				),
				'supports'           => array( 'title' ),
				'hierarchical'       => false,
				'public'             => true,
				'show_in_menu'       => 'edit.php?post_type=product',
				'publicly_queryable' => false,
				'show_in_rest'       => true,
				'capability_type'    => 'product',
			)
		);
	}
}

Post_Types::get_instance();