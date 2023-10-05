<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Wonderful Blog
 */

// Popular Posts Section.
$popular_posts_section = get_theme_mod( 'wonderful_blog_popular_posts_section_enable', false );

if ( false === $popular_posts_section ) {
	return;
}

$content_ids = array();

$popular_posts_content_type = get_theme_mod( 'wonderful_blog_popular_posts_content_type', 'post' );

if ( $popular_posts_content_type === 'post' ) {

	for ( $i = 1; $i <= 6; $i++ ) {
		$content_ids[] = get_theme_mod( 'wonderful_blog_popular_posts_post_' . $i );
	}

	$args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 6 ),
		'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'wonderful_blog_popular_posts_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 6 ),
	);
}

$query = new WP_Query( $args );
if ( $query->have_posts() ) {

	$section_title    = get_theme_mod( 'wonderful_blog_popular_posts_title', '' );
	$section_subtitle = get_theme_mod( 'wonderful_blog_popular_posts_subtitle', '' );
	$viewall_btn      = get_theme_mod( 'wonderful_blog_popular_posts_view_all_button_label', '' );
	$viewall_btn_link = get_theme_mod( 'wonderful_blog_popular_posts_view_all_button_url' );
	if ( 'category' === $popular_posts_content_type ) {
		$popular_category = get_theme_mod( 'wonderful_blog_popular_posts_category' );
		$viewall_btn_link = ! empty( $viewall_btn_link ) ? $viewall_btn_link : get_category_link( $popular_category );
	} else {
		$viewall_btn_link = ! empty( $viewall_btn_link ) ? $viewall_btn_link : '#';
	}

	?>

	<div id="wonderful_blog_popular_posts_section" class="frontpage popularpost style-1">
		<div class="theme-wrapper-large">
			<?php if ( ! empty( $section_title || $section_subtitle || $viewall_btn ) ) : ?>
				<div class="section-head">
					<div class="section-header">
						<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
						<p class="section-subtitle"><?php echo esc_html( $section_subtitle ); ?></p>
					</div>
					<a href="<?php echo esc_url( $viewall_btn_link ); ?>" class="adore-view-all"><?php echo esc_html( $viewall_btn ); ?></a>
				</div>
			<?php endif; ?>
			<div class="popular-post-wrapper">
				<?php
				$i = 0;
				while ( $query->have_posts() ) :
					$query->the_post();

					$post_item_class  = $i < 3 ? 'post-grid' : 'post-list';
					$post_image_class = has_post_thumbnail() ? 'has-image' : '';
					$classes          = implode( ' ', array( $post_item_class, $post_image_class ) );
					?>
					<div class="post-item <?php echo esc_attr( $classes ); ?>">
						<div class="post-item-image">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'post-thumbnail' ); ?>
							</a>
							<div class="read-time-comment">
								<span class="reading-time">
									<i class="far fa-hourglass"></i>
									<?php
									echo wonderful_blog_time_interval( get_the_content() );
									echo esc_html__( ' min', 'wonderful-blog' );
									?>
								</span>
								<span class="comment">
									<i class="far fa-comment"></i>
									<?php echo absint( get_comments_number( get_the_ID() ) ); ?>
								</span>
							</div>
						</div>
						<div class="post-item-content">
							<div class="entry-cat">
								<?php the_category( '', '', get_the_ID() ); ?>
							</div>
							<h3 class="entry-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>  
							<ul class="entry-meta">
								<li class="post-author"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="far fa-user"></i><?php echo esc_html( get_the_author() ); ?></a></li>
								<li class="post-date"><i class="far fa-calendar-alt"></i></span><?php echo esc_html( get_the_date() ); ?></li>
							</ul>
						</div>
					</div>
					<?php
					$i++;
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>

	<?php
}
