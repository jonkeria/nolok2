<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Wonderful Blog
 */

// Instagram Section.
$instagram_section = get_theme_mod( 'wonderful_blog_instagram_section_enable', false );

if ( false === $instagram_section ) {
	return;
}

$insta_username   = get_theme_mod( 'wonderful_blog_instagram_username', __( 'Instagram', 'wonderful-blog' ) );
$insta_text_label = get_theme_mod( 'wonderful_blog_instagram_text_label', __( 'Follow Us on', 'wonderful-blog' ) );
$instagram_url    = get_theme_mod( 'wonderful_blog_instagram_user_link', '#' );
?>

<div id="wonderful_blog_instagram_section" class="frontpage instagram-section">
	<div class="theme-wrapper-large insta-wrap">
		<div class="instagram-head">
			<h3> <?php echo esc_html( $insta_text_label ); ?>
				<?php if ( ! empty( $insta_username ) ) : ?>
					<a href="<?php echo esc_url( $instagram_url ); ?>" target="_blank"><i class="fas fa-at"></i><?php echo esc_html( $insta_username ); ?></a>
				<?php endif; ?>
			</h3>
		</div>
		<div class="instagram-wrapper">
			<?php
			for ( $i = 1; $i <= 5; $i++ ) {
				$instagram_image = get_theme_mod( 'wonderful_blog_instagram_image_' . $i, '' );
				?>
				<?php if ( ! empty( $instagram_image ) ) { ?>
					<div class="instagram-img">
						<img src="<?php echo esc_url( $instagram_image ); ?>" alt="<?php echo esc_attr( 'instagram image ' . $i ); ?>">
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>

<?php
