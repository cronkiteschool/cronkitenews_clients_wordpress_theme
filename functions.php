<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}

if ( ! function_exists( 'asu_s_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function asu_s_posted_on() {
	$date_format = 'l, F jS - G:i';
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date($date_format) ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date($date_format) )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'asu_s' ),
		$time_string
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'asu_s' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

/**
 * Enqueue scripts and styles.
 */
function cronkitenews_scripts() {

	wp_register_script( 'swap-page-nav', get_stylesheet_directory_uri() . '/js/swap-page-nav.js', array( 'jquery' ), '20150527', true );
	wp_enqueue_script( 'swap-page-nav' );
	wp_register_script( 'move-by-line', get_stylesheet_directory_uri() . '/js/move-by-line.js', array( 'jquery' ), '20150604', true );
	wp_enqueue_script( 'move-by-line' );

}
add_action( 'wp_enqueue_scripts', 'cronkitenews_scripts' );

