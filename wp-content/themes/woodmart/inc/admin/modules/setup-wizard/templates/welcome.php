<?php
/**
 * Welcome template.
 *
 * @package woodmart
 */

?>

<div class="xts-wizard-content-inner xts-wizard-welcome">

	<div class="xts-wizard-logo">
		<img class="xts-wizard-logo" src="<?php echo esc_url( $this->get_image_url( 'logo.svg' ) ); ?>" alt="logo">
		</div>

	<h3>
		<?php esc_html_e( 'Thank you for choosing our theme!', 'woodmart' ); ?>
	</h3>

	<p>
		<?php
		esc_html_e(
			'Congratulations! You have successfully installed our theme and are ready to start building your amazing website! With our theme, you have full control over the layout and style, giving you the flexibility to create a site that suits your vision perfectly.',
			'woodmart'
		);
		?>
	</p>

	<p>
		<?php
		esc_html_e(
			'Check our next steps and enjoy creating your new project. Feel free to contact us if you will have any questions and check our other products.',
			'woodmart'
		);
		?>
	</p>

	<p class="xts-wizard-signature">
		<span>
			<?php esc_html_e( 'Good Luck!', 'woodmart' ); ?>
		</span>

		<img src="<?php echo esc_url( $this->get_image_url( 'signature.svg' ) ); ?>" alt="signature">
	</p>

	<div class="xts-wizard-buttons">
		<a class="xts-inline-btn xts-style-underline" href="<?php echo esc_url( admin_url( 'admin.php?page=xts_dashboard&skip_setup' ) ); ?>">
			<?php esc_html_e( 'Skip setup', 'woodmart' ); ?>
		</a>

		<a class="xts-btn xts-color-primary xts-next" href="<?php echo esc_url( $this->get_page_url( 'activation' ) ); ?>">
			<?php esc_html_e( 'Let\'s start', 'woodmart' ); ?>
		</a>
	</div>

</div>
