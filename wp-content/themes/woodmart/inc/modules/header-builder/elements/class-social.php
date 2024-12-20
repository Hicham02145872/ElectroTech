<?php

namespace XTS\Modules\Header_Builder\Elements;

use XTS\Modules\Header_Builder\Element;

/**
 * ------------------------------------------------------------------------------------------------
 * Social buttons element
 * ------------------------------------------------------------------------------------------------
 */
class Social extends Element {

	public function __construct() {
		parent::__construct();

		$this->template_name = 'social';
	}

	public function map() {
		$this->args = array(
			'type'            => 'social',
			'title'           => esc_html__( 'Social links icons', 'woodmart' ),
			'text'            => esc_html__( 'Social links icons', 'woodmart' ),
			'icon'            => 'xts-i-social',
			'editable'        => true,
			'container'       => false,
			'edit_on_create'  => true,
			'drag_target_for' => array(),
			'drag_source'     => 'content_element',
			'removable'       => true,
			'addable'         => true,
			'params'          => array(
				'type'             => array(
					'id'      => 'type',
					'title'   => esc_html__( 'Buttons type', 'woodmart' ),
					'tab'     => esc_html__( 'General', 'woodmart' ),
					'type'    => 'selector',
					'value'   => 'share',
					'options' => array(
						'share'  => array(
							'label' => esc_html__( 'Share', 'woodmart' ),
							'value' => 'share',
						),
						'follow' => array(
							'label' => esc_html__( 'Follow', 'woodmart' ),
							'value' => 'follow',
						),
					),
				),
				'el_class'         => array(
					'id'          => 'el_class',
					'title'       => esc_html__( 'Additional CSS class', 'woodmart' ),
					'type'        => 'text',
					'tab'         => esc_html__( 'General', 'woodmart' ),
					'value'       => '',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'woodmart' ),
				),
				'style'            => array(
					'id'      => 'style',
					'title'   => esc_html__( 'Button style', 'woodmart' ),
					'tab'     => esc_html__( 'Style', 'woodmart' ),
					'group'   => esc_html__( 'Icons', 'woodmart' ),
					'type'    => 'selector',
					'value'   => 'default',
					'options' => array(
						'default'     => array(
							'label' => esc_html__( 'Default', 'woodmart' ),
							'value' => 'default',
							'image' => WOODMART_ASSETS_IMAGES . '/settings/social-buttons/style/default.png',
						),
						'simple'      => array(
							'label' => esc_html__( 'Simple', 'woodmart' ),
							'value' => 'simple',
							'image' => WOODMART_ASSETS_IMAGES . '/settings/social-buttons/style/simple.png',
						),
						'colored'     => array(
							'label' => esc_html__( 'Colored', 'woodmart' ),
							'value' => 'colored',
							'image' => WOODMART_ASSETS_IMAGES . '/settings/social-buttons/style/colored.png',
						),
						'colored-alt' => array(
							'label' => esc_html__( 'Colored alternative', 'woodmart' ),
							'value' => 'colored-alt',
							'image' => WOODMART_ASSETS_IMAGES . '/settings/social-buttons/style/colored-alt.png',
						),
						'bordered'    => array(
							'label' => esc_html__( 'Bordered', 'woodmart' ),
							'value' => 'bordered',
							'image' => WOODMART_ASSETS_IMAGES . '/settings/social-buttons/style/bordered.png',
						),
						'primary'     => array(
							'label' => esc_html__( 'Primary color', 'woodmart' ),
							'value' => 'primary',
							'image' => WOODMART_ASSETS_IMAGES . '/settings/social-buttons/style/primary.png',
						),
					),
				),
				'form'             => array(
					'id'      => 'form',
					'title'   => esc_html__( 'Button shape', 'woodmart' ),
					'tab'     => esc_html__( 'Style', 'woodmart' ),
					'group'   => esc_html__( 'Icons', 'woodmart' ),
					'type'    => 'selector',
					'value'   => 'circle',
					'options' => array(
						'circle'  => array(
							'label' => esc_html__( 'Circle', 'woodmart' ),
							'value' => 'circle',
							'image' => WOODMART_ASSETS_IMAGES . '/settings/social-buttons/shape/circle.png',
						),
						'square'  => array(
							'label' => esc_html__( 'Square', 'woodmart' ),
							'value' => 'square',
							'image' => WOODMART_ASSETS_IMAGES . '/settings/social-buttons/shape/square.png',
						),
						'rounded' => array(
							'label' => esc_html__( 'Rounded', 'woodmart' ),
							'value' => 'rounded',
							'image' => WOODMART_ASSETS_IMAGES . '/settings/social-buttons/shape/rounded.png',
						),
					),
				),
				'size'             => array(
					'id'      => 'size',
					'title'   => esc_html__( 'Button size', 'woodmart' ),
					'tab'     => esc_html__( 'Style', 'woodmart' ),
					'group'   => esc_html__( 'Icons', 'woodmart' ),
					'type'    => 'select',
					'value'   => '',
					'options' => array(
						''      => array(
							'label' => esc_html__( 'Default', 'woodmart' ),
							'value' => '',
						),
						'small' => array(
							'label' => esc_html__( 'Small', 'woodmart' ),
							'value' => 'small',
						),
						'large' => array(
							'label' => esc_html__( 'Large', 'woodmart' ),
							'value' => 'large',
						),
					),
				),
				'color'            => array(
					'id'      => 'color',
					'title'   => esc_html__( 'Color', 'woodmart' ),
					'tab'     => esc_html__( 'Style', 'woodmart' ),
					'group'   => esc_html__( 'Icons', 'woodmart' ),
					'type'    => 'selector',
					'value'   => 'dark',
					'options' => array(
						'dark'  => array(
							'label' => esc_html__( 'Dark', 'woodmart' ),
							'value' => 'dark',
						),
						'light' => array(
							'label' => esc_html__( 'Light', 'woodmart' ),
							'value' => 'light',
						),
					),
				),
			),
		);
	}
}
