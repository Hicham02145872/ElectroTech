<?php
/**
 * Custom JS options
 *
 * @package xts
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

use XTS\Admin\Modules\Options;

Options::add_field(
	array(
		'id'       => 'custom_js',
		'name'     => esc_html__( 'Global custom JS', 'woodmart' ),
		'type'     => 'editor',
		'language' => 'javascript',
		'section'  => 'custom_js',
		't_tab'    => array(
			'id'    => 'custom_js_tabs',
			'icon'  => 'xts-i-global',
			'tab'   => esc_html__( 'Global', 'woodmart' ),
			'style' => 'default',
		),
		'priority' => 10,
	)
);

Options::add_field(
	array(
		'id'          => 'js_ready',
		'name'        => esc_html__( 'On document ready', 'woodmart' ),
		'description' => esc_html__( 'Will be executed on $(document).ready()', 'woodmart' ),
		'type'        => 'editor',
		'language'    => 'javascript',
		'section'     => 'custom_js',
		't_tab'       => array(
			'id'  => 'custom_js_tabs',
			'tab' => esc_html__( 'On document ready', 'woodmart' ),
		),
		'priority'    => 20,
	)
);
