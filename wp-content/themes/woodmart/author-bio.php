<?php
/**
 * The template for displaying Author bios
 */

if( ! woodmart_get_opt( 'blog_author_bio' ) ) return;
?>

<div class="author-info">
	<?php
	$author_bio_avatar_size = apply_filters( 'woodmart_author_bio_avatar_size', 74 );
	echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size, '', 'author-avatar' );
	?>
	<h4 class="author-title"><?php printf( esc_html__( 'About %s', 'woodmart' ), get_the_author() ); ?></h4>
	<p class="author-area-info">
		<?php the_author_meta( 'description' ); ?>
		<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
			<?php printf( wp_kses( __( 'View all posts by %s', 'woodmart' ), array( 'span' => array('class') ) ), get_the_author() ); ?>
		</a>
	</p>
</div>