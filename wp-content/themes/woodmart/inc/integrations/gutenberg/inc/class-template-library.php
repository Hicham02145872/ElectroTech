<?php
/**
 * Gutenberg post CSS class.
 *
 * @package Woodmart
 */

namespace XTS\Gutenberg;

use WP_Query;
use XTS\Singleton;

/**
 * Post CSS module.
 *
 * @package Woodmart
 */
class Template_Library extends Singleton {

	/**
	 * Init.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'wp_ajax_woodmart_get_template', array( $this, 'get_template' ) );
	}

	/**
	 * Get template.
	 *
	 * @return void
	 */
	public function get_template() {
		if ( ! isset( $_GET['template_id'] ) ) {
			return;
		}

		$template_id = sanitize_text_field( $_GET['template_id'] );
		$template    = '';

		$response = wp_remote_get( WOODMART_DEMO_URL . '?woodmart_action=woodmart_get_template&id=' . $template_id );

		if ( is_wp_error( $response ) || ! is_array( $response ) ) {
			wp_send_json(
				array(
					'success' => false,
					'message' => $response,
				)
			);
		}

		$data = json_decode( $response['body'], true );

		if ( is_object( $data ) ) {
			if ( property_exists( $data, 'error' ) ) {
				wp_send_json(
					array(
						'success' => false,
						'message' => $data->error->message,
					)
				);
			}
		}

		if ( ! empty( $data['element']['gutenberg_content'] ) ) {
			$template = $data['element']['gutenberg_content'];
			$matches  = array();

			preg_match_all( '/id":\s*(\d+),\s*"url":"(https?:\/\/[^\"]+)"/', $template, $matches );

			if ( ! empty( $matches[1] ) && ! empty( $matches[2] ) ) {
				foreach ( $matches[1] as $key => $attachment_id ) {
					$attachment_url = $matches[2][ $key ];
					$attachment_id  = $matches[1][ $key ];

					$attachment_id_new = $this->get_image( $attachment_url );

					if ( is_wp_error( $attachment_id_new ) ) {
						wp_send_json(
							array(
								'success' => false,
								'message' => $attachment_id_new->get_error_message(),
							)
						);
					}

					$attachment_url_new = wp_get_attachment_url( $attachment_id_new );

					$template = str_replace( $attachment_url, $attachment_url_new, $template );
					$template = str_replace( '"id":' . $attachment_id, '"id":' . $attachment_id_new, $template );
					$template = str_replace( 'wp-image-' . $attachment_id, 'wp-image-' . $attachment_id_new, $template );
				}
			}
		} else {
			wp_send_json(
				array(
					'success' => false,
					'message' => esc_html__( 'No template found', 'woodmart' ),
				)
			);
		}

		wp_send_json(
			array(
				'success'  => true,
				'template' => $template,
			)
		);
	}

	/**
	 * Get imported image.
	 *
	 * @param string $url Image URL.
	 * @return int|\WP_Error
	 */
	private function get_image($url ) {
		preg_match( '/\/([^\/]+)\.[a-zA-Z0-9]+$/', $url, $url_matches );
		$img_name = wp_basename( $url_matches[0] );

		$get_attachment = new WP_Query(
			array(
				'posts_per_page' => 1,
				'post_type'      => 'attachment',
				'name'           => trim( $img_name ),
			)
		);

		if ( ! isset( $get_attachment->posts, $get_attachment->posts[0] ) ) {
			add_filter( 'image_sideload_extensions', array( $this, 'allowed_image_sideload_extensions' ) );
			$image_url = media_sideload_image( $url, 0, '', 'src' );
			remove_filter( 'image_sideload_extensions', array( $this, 'allowed_image_sideload_extensions' ) );

			$id = wp_insert_attachment(
				array(
					'post_title' => $img_name,
					'post_type'  => 'attachment',
					'guid'       => $image_url,
				),
				$image_url
			);
		} else {
			$id = $get_attachment->posts[0]->ID;
		}

		return $id;
	}

	/**
	 * Allow image sideload extensions.
	 *
	 * @param array $allowed_extensions Allowed extensions.
	 * @return array
	 */
	public function allowed_image_sideload_extensions( $allowed_extensions ) {
		$allowed_extensions[] = 'svg';

		return $allowed_extensions;
	}

}

Template_Library::get_instance();
