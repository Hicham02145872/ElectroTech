<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

$woodmart_loop  = woodmart_loop_prop( 'woodmart_loop' );
$blog_design    = woodmart_loop_prop( 'blog_design' );
$blog_style     = woodmart_get_opt( 'blog_style', 'shadow' );
$post_format    = get_post_format();
$thumb_classes  = '';
$gallery        = array();
$gallery_slider = apply_filters( 'woodmart_gallery_slider', true );

$classes = array(
	'wd-post',
	'blog-design-' . $blog_design,
	'blog-post-loop',
);

if ( 'chess' === $blog_design ) {
	$classes[] = 'blog-design-small-images';
}

if ( 'shadow' === $blog_style ) {
	$classes[] = 'blog-style-bg';

	if ( woodmart_get_opt( 'blog_with_shadow', true ) ) {
		$classes[] = 'wd-add-shadow';
	}
} else {
	$classes[] = 'blog-style-' . $blog_style;
}

if ( 'grid' === woodmart_loop_prop( 'blog_layout' ) ) {
	$classes[] = 'wd-col';
}

if ( ! get_the_title() ) {
	$classes[] = 'post-no-title';
}

if ( 'quote' === $post_format ) {
	woodmart_enqueue_inline_style( 'blog-loop-format-quote' );
} elseif ( 'gallery' === $post_format && $gallery_slider ) {
	$gallery = get_post_gallery( false, false );

	if ( ! empty( $gallery['src'] ) ) {
		$thumb_classes .= ' wd-carousel-container wd-post-gallery color-scheme-light';
	}
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<div class="article-inner">
		<?php if ( woodmart_loop_prop( 'parts_meta' ) && get_the_category_list( ', ' ) ) : ?>
			<div class="meta-post-categories wd-post-cat wd-style-with-bg">
				<?php echo get_the_category_list( ', ' ); ?>
			</div>
		<?php endif ?>

		<?php if ( woodmart_loop_prop( 'parts_title' ) ) : ?>
			<h3 class="wd-entities-title title post-title">
				<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h3>
		<?php endif; ?>

		<?php if ( woodmart_loop_prop( 'parts_meta' ) ) : ?>
			<div class="entry-meta wd-entry-meta">
				<?php
				woodmart_post_meta(
					array(
						'author'        => 1,
						'author_avatar' => 1,
						'date'          => 0,
						'comments'      => 1,
						'author_label'  => 'long',
					)
				);
				?>
			</div>
		<?php endif; ?>

		<header class="entry-header">
			<?php if ( ( has_post_thumbnail() || ! empty( $gallery['src'] ) ) && ! post_password_required() && ! is_attachment() && woodmart_loop_prop( 'parts_media' ) ) : ?>
				<figure class="entry-thumbnail<?php echo esc_attr( $thumb_classes ); ?>">
					<?php if ( 'gallery' === $post_format && $gallery_slider && ! empty( $gallery['src'] ) ) : ?>
						<?php
						woodmart_enqueue_js_library( 'swiper' );
						woodmart_enqueue_js_script( 'swiper-carousel' );
						woodmart_enqueue_inline_style( 'swiper' );
						?>
						<div class="wd-carousel-inner">
							<div class="wd-carousel wd-grid"<?php echo woodmart_get_carousel_attributes( array( 'autoheight' => 'yes' ) ); //phpcs:ignore ?>>
								<div class="wd-carousel-wrap">
									<?php
									foreach ( $gallery['src'] as $src ) {
										if ( preg_match( '/data:image/is', $src ) ) {
											continue;
										}
										?>
										<div class="wd-carousel-item">
											<?php echo apply_filters( 'woodmart_image', '<img src="' . esc_url( $src ) . '" />' ); ?>
										</div>
										<?php
									}
									?>
								</div>
							</div>
							<?php woodmart_get_carousel_nav_template( ' wd-post-arrows wd-pos-sep wd-custom-style' ); ?>
						</div>
					<?php else : ?>
						<div class="post-img-wrapp">
							<a href="<?php echo esc_url( get_permalink() ); ?>">
								<?php echo woodmart_get_post_thumbnail( 'large' ); ?>
							</a>
						</div>
						<div class="post-image-mask">
							<span></span>
						</div>
					<?php endif; ?>
				</figure>
			<?php endif; ?>

			<?php woodmart_post_date( array( 'style' => 'wd-style-with-bg' ) ); ?>
		</header>

		<div class="article-body-container">
			<?php if ( is_search() && woodmart_loop_prop( 'parts_text' ) && 'gallery' !== get_post_format() ) : // Only display Excerpts for Search. ?>
				<div class="entry-summary">
					<?php echo get_the_excerpt(); //phpcs:ignore ?>
				</div>
			<?php else : ?>
				<?php if ( woodmart_loop_prop( 'parts_text' ) ) : ?>
					<div class="entry-content wd-post-desc<?php echo woodmart_get_old_classes( ' woodmart-entry-content' ); //phpcs:ignore. ?>">
						<?php
							woodmart_get_content( woodmart_loop_prop( 'parts_btn' ), 'full' === woodmart_get_opt( 'blog_excerpt' ) );

							wp_link_pages(
								array(
									'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'woodmart' ) . '</span>',
									'after'       => '</div>',
									'link_before' => '<span>',
									'link_after'  => '</span>',
								)
							);
						?>
					</div>
				<?php endif; ?>

				<?php if ( 'full' !== woodmart_get_opt( 'blog_excerpt' ) && woodmart_loop_prop( 'parts_btn' ) ) : ?>
					<?php woodmart_render_read_more_btn( 'link' ); ?>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ( woodmart_loop_prop( 'parts_meta' ) ) : ?>
				<div class="share-with-lines">
					<span class="left-line"></span>
					<?php if ( woodmart_is_social_link_enable( 'share' ) && function_exists( 'woodmart_shortcode_social' ) ) : ?>
						<?php
							echo woodmart_shortcode_social(
								array(
									'style' => 'bordered',
									'size'  => 'small',
									'form'  => 'circle',
								)
							);
						?>
					<?php endif; ?>
					<span class="right-line"></span>
				</div>
			<?php endif; ?>
		</div>
	</div>
</article>


<?php
// Increase loop count.
woodmart_set_loop_prop( 'woodmart_loop', $woodmart_loop + 1 );