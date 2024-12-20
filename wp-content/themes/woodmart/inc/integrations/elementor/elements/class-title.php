<?php
/**
 * Title map.
 *
 * @package xts
 */

namespace XTS\Elementor;

use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

/**
 * Elementor widget that inserts an embeddable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Title extends Widget_Base {
	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'wd_title';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Section title', 'woodmart' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wd-icon-title';
	}

	/**
	 * Get widget categories.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'wd-elements' );
	}

	/**
	 * Register the widget controls.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		/**
		 * Content tab.
		 */

		/**
		 * General settings.
		 */
		$this->start_controls_section(
			'general_content_section',
			array(
				'label' => esc_html__( 'General', 'woodmart' ),
			)
		);

		$this->add_control(
			'extra_width_classes',
			array(
				'type'         => 'wd_css_class',
				'default'      => 'wd-width-100',
				'prefix_class' => '',
			)
		);

		$this->add_control(
			'subtitle',
			array(
				'label'   => esc_html__( 'Subtitle', 'woodmart' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Subtitle text example',
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'woodmart' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Title text example',
			)
		);

		$this->add_control(
			'after_title',
			array(
				'label'   => esc_html__( 'Text', 'woodmart' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => 'Text after title text example',
			)
		);

		$this->end_controls_section();

		/**
		 * Style tab.
		 */

		/**
		 * General settings.
		 */
		$this->start_controls_section(
			'general_style_section',
			array(
				'label' => esc_html__( 'General', 'woodmart' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'style',
			array(
				'label'   => esc_html__( 'Style', 'woodmart' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'default'      => esc_html__( 'Default', 'woodmart' ),
					'simple'       => esc_html__( 'Simple', 'woodmart' ),
					'bordered'     => esc_html__( 'Bordered', 'woodmart' ),
					'underlined'   => esc_html__( 'Underlined', 'woodmart' ),
					'underlined-2' => esc_html__( 'Underlined 2', 'woodmart' ),
					'overlined'    => esc_html__( 'Overlined', 'woodmart' ),
					'shadow'       => esc_html__( 'Shadow', 'woodmart' ),
					'image'        => esc_html__( 'With image', 'woodmart' ),
				),
				'default' => 'default',
			)
		);

		$this->add_control(
			'color',
			array(
				'label'   => esc_html__( 'Predefined color', 'woodmart' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'default'  => esc_html__( 'Default', 'woodmart' ),
					'primary'  => esc_html__( 'Primary', 'woodmart' ),
					'alt'      => esc_html__( 'Alternative', 'woodmart' ),
					'black'    => esc_html__( 'Black', 'woodmart' ),
					'white'    => esc_html__( 'White', 'woodmart' ),
					'gradient' => esc_html__( 'Gradient', 'woodmart' ),
				),
				'default' => 'default',
			)
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'      => 'color_gradient',
				'label'     => esc_html__( 'Background', 'woodmart' ),
				'types'     => array( 'gradient' ),
				'selector'  => '{{WRAPPER}} .woodmart-title-container',
				'condition' => array(
					'color' => 'gradient',
				),
			)
		);

		$this->add_control(
			'size',
			array(
				'label'   => esc_html__( 'Predefined size', 'woodmart' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'default'     => esc_html__( 'Default (22px)', 'woodmart' ),
					'small'       => esc_html__( 'Small (18px)', 'woodmart' ),
					'medium'      => esc_html__( 'Medium (26px)', 'woodmart' ),
					'large'       => esc_html__( 'Large (36px)', 'woodmart' ),
					'extra-large' => esc_html__( 'Extra Large (46px)', 'woodmart' ),
				),
				'default' => 'default',
			)
		);

		$this->add_control(
			'align',
			array(
				'label'   => esc_html__( 'Align', 'woodmart' ),
				'type'    => 'wd_buttons',
				'options' => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'woodmart' ),
						'image' => WOODMART_ASSETS_IMAGES . '/settings/align/left.jpg',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'woodmart' ),
						'image' => WOODMART_ASSETS_IMAGES . '/settings/align/center.jpg',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'woodmart' ),
						'image' => WOODMART_ASSETS_IMAGES . '/settings/align/right.jpg',
					),
				),
				'default' => 'center',
			)
		);

		$this->add_responsive_control(
			'width',
			array(
				'label'          => esc_html__( 'Width', 'woodmart' ),
				'type'           => Controls_Manager::SLIDER,
				'default'        => array(
					'unit' => '%',
				),
				'tablet_default' => array(
					'unit' => '%',
				),
				'mobile_default' => array(
					'unit' => '%',
				),
				'size_units'     => array( '%', 'px' ),
				'range'          => array(
					'%'  => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 1000,
					),
				),
				'selectors'      => array(
					'{{WRAPPER}} .title-after_title, {{WRAPPER}} .title-subtitle, {{WRAPPER}} .woodmart-title-container' => 'max-width: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		/**
		 * Subtitle settings.
		 */
		$this->start_controls_section(
			'subtitle_style_section',
			array(
				'label' => esc_html__( 'Subtitle', 'woodmart' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'subtitle_style',
			array(
				'label'   => esc_html__( 'Style', 'woodmart' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'default'    => esc_html__( 'Default', 'woodmart' ),
					'background' => esc_html__( 'Background', 'woodmart' ),
				),
				'default' => 'default',
			)
		);

		$this->add_control(
			'subtitle_color',
			array(
				'label'     => esc_html__( 'Color', 'woodmart' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title-subtitle' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'subtitle_bg_color',
			array(
				'label'     => esc_html__( 'Background color', 'woodmart' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title-subtitle' => 'background-color: {{VALUE}}',
				),
				'condition' => array(
					'subtitle_style' => 'background',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'subtitle_typography',
				'label'    => esc_html__( 'Typography', 'woodmart' ),
				'selector' => '{{WRAPPER}} .title-subtitle',
			)
		);

		$this->end_controls_section();

		/**
		 * Title settings.
		 */
		$this->start_controls_section(
			'title_style_section',
			array(
				'label' => esc_html__( 'Title', 'woodmart' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title_decoration_style',
			array(
				'label'       => esc_html__( 'Highlight text style', 'woodmart' ),
				'description' => esc_html__( 'The text must be wrapped with the <u></u> tag to highlight it.', 'woodmart' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'default'     => esc_html__( 'Default', 'woodmart' ),
					'colored'     => esc_html__( 'Primary color', 'woodmart' ),
					'colored-alt' => esc_html__( 'Primary color + secondary font', 'woodmart' ),
					'bordered'    => esc_html__( 'Bordered', 'woodmart' ),
				),
				'default'     => 'default',
			)
		);

		$this->add_control(
			'image',
			array(
				'label'     => esc_html__( 'Choose image', 'woodmart' ),
				'type'      => Controls_Manager::MEDIA,
				'condition' => array(
					'style' => array( 'image' ),
				),
			)
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			array(
				'name'      => 'image',
				'default'   => 'thumbnail',
				'separator' => 'none',
				'condition' => array(
					'style' => array( 'image' ),
				),
			)
		);

		$this->add_control(
			'tag',
			array(
				'label'   => esc_html__( 'Tag', 'woodmart' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'h1'   => esc_html__( 'h1', 'woodmart' ),
					'h2'   => esc_html__( 'h2', 'woodmart' ),
					'h3'   => esc_html__( 'h3', 'woodmart' ),
					'h4'   => esc_html__( 'h4', 'woodmart' ),
					'h5'   => esc_html__( 'h5', 'woodmart' ),
					'h6'   => esc_html__( 'h6', 'woodmart' ),
					'p'    => esc_html__( 'p', 'woodmart' ),
					'div'  => esc_html__( 'div', 'woodmart' ),
					'span' => esc_html__( 'span', 'woodmart' ),
				),
				'default' => 'h4',
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Color', 'woodmart' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => esc_html__( 'Typography', 'woodmart' ),
				'selector' => '{{WRAPPER}} .title',
			)
		);

		$this->end_controls_section();

		/**
		 * Text settings.
		 */
		$this->start_controls_section(
			'text_style_section',
			array(
				'label' => esc_html__( 'Text', 'woodmart' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'text_color',
			array(
				'label'     => esc_html__( 'Color', 'woodmart' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title-after_title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'text_typography',
				'label'    => esc_html__( 'Typography', 'woodmart' ),
				'selector' => '{{WRAPPER}} .title-after_title',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$default_settings = array(
			// General.
			'align'                  => 'center',
			'tag'                    => 'h4',
			'image'                  => '',
			'image_custom_dimension' => '',

			// Title.
			'title'                  => 'Title',
			'color'                  => 'default',
			'style'                  => 'default',
			'size'                   => 'default',
			'title_decoration_style' => 'default',

			// Subtitle.
			'subtitle'               => '',
			'subtitle_style'         => 'default',

			// Text.
			'after_title'            => '',
		);

		$settings     = wp_parse_args( $this->get_settings_for_display(), $default_settings );
		$image_output = '';

		$this->add_render_attribute(
			array(
				'wrapper'     => array(
					'class' => array(
						'title-wrapper wd-set-mb reset-last-child',
						'wd-title-color-' . $settings['color'],
						'wd-title-style-' . $settings['style'],
						'wd-title-size-' . $settings['size'],
						'text-' . $settings['align'],
					),
				),
				'subtitle'    => array(
					'class' => array(
						'title-subtitle',
						'subtitle-color-' . $settings['color'],
						'subtitle-style-' . $settings['subtitle_style'],
						woodmart_get_new_size_classes( 'title', $settings['size'], 'subtitle' ),
					),
				),
				'title'       => array(
					'class' => array(
						'woodmart-title-container',
						'title',
						woodmart_get_new_size_classes( 'title', $settings['size'], 'title' ),
					),
				),
				'after_title' => array(
					'class' => array(
						'title-after_title reset-last-child',
						woodmart_get_new_size_classes( 'title', $settings['size'], 'after_title' ),
					),
				),
			)
		);

		if ( 'default' !== $settings['title_decoration_style'] ) {
			$this->add_render_attribute( 'title', 'class', 'wd-underline-' . $settings['title_decoration_style'] );
		}

		$this->add_inline_editing_attributes( 'title' );
		$this->add_inline_editing_attributes( 'subtitle' );
		$this->add_inline_editing_attributes( 'after_title' );

		// Image settings.
		$custom_image_size = isset( $settings['image_custom_dimension']['width'] ) && $settings['image_custom_dimension']['width'] ? $settings['image_custom_dimension'] : array(
			'width'  => 128,
			'height' => 128,
		);

		if ( isset( $settings['image']['id'] ) && $settings['image']['id'] ) {
			$image_output              = '<span class="img-wrapper">' . woodmart_otf_get_image_html( $settings['image']['id'], $settings['image_size'], $settings['image_custom_dimension'] ) . '</span>';
			$render_svg_with_image_tag = apply_filters( 'woodmart_render_svg_with_image_tag', true );

			if ( woodmart_is_svg( $settings['image']['url'] ) ) {
				if ( $render_svg_with_image_tag ) {
					$custom_image_size = 'custom' !== $settings['image_size'] && 'full' !== $settings['image_size'] ? $settings['image_size'] : $custom_image_size;
					$image_output      = '<span class="img-wrapper">' . woodmart_get_svg_html( $settings['image']['id'], $custom_image_size ) . '</span>';
				} else {
					$image_output = '<span class="img-wrapper"><span class="svg-icon" style="width:' . esc_attr( $custom_image_size['width'] ) . 'px; height:' . esc_attr( $custom_image_size['height'] ) . 'px;">' . woodmart_get_any_svg( $settings['image']['url'], rand( 999, 9999 ) ) . '</span></span>';
				}
			}
		}

		woodmart_enqueue_inline_style( 'section-title' );

		if ( in_array( $settings['style'], array( 'bordered', 'simple' ), true ) ) {
			woodmart_enqueue_inline_style( 'section-title-style-simple-and-brd' );
		} elseif ( in_array( $settings['style'], array( 'overlined', 'underlined', 'underlined-2' ), true ) ) {
			woodmart_enqueue_inline_style( 'section-title-style-under-and-over' );
		}

		if ( isset( $settings['title_decoration_style'] ) && 'default' !== $settings['title_decoration_style'] ) {
			woodmart_enqueue_inline_style( 'mod-highlighted-text' );
		}

		?>
		<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>

			<?php if ( $settings['subtitle'] ) : ?>
				<?php woodmart_enqueue_inline_style( 'el-subtitle-style' ); ?>
				<div <?php echo $this->get_render_attribute_string( 'subtitle' ); ?>>
					<?php echo nl2br( wp_kses( $settings['subtitle'], woodmart_get_allowed_html() ) ); ?>
				</div>
			<?php endif; ?>

			<div class="liner-continer">
				<<?php echo esc_attr( $settings['tag'] ); ?> <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo nl2br( wp_kses( $settings['title'], woodmart_get_allowed_html() ) ); ?></<?php echo esc_attr( $settings['tag'] ); ?>> <?php // Must be in one line Yoast SEO fix bug. ?>

				<?php if ( $image_output ) : ?>
					<?php echo $image_output; // phpcs:ignore ?>
				<?php endif; ?>
			</div>

			<?php if ( $settings['after_title'] ) : ?>
				<div <?php echo $this->get_render_attribute_string( 'after_title' ); ?>>
					<?php echo nl2br( wp_kses( $settings['after_title'], woodmart_get_allowed_html() ) ); ?>
				</div>
			<?php endif; ?>
		</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Title() );
