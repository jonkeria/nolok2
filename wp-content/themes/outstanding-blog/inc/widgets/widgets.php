<?php

// Social Widget.
require get_theme_file_path() . '/inc/widgets/social-widget.php';

/**
 * Register Widgets
 */
function outstanding_blog_register_widgets() {

	register_widget( 'Wonderful_Blog_Social_Widget' );

}
add_action( 'widgets_init', 'outstanding_blog_register_widgets' );
