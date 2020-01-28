<?php
/**
 * This file includes functionality of our theme.
 *
 * @package Alku
 */

// Enqueue our main `style.css`.
wp_enqueue_style( 'style', get_stylesheet_uri(), [], '1.0.0' );

/**
 * Register menus.
 *
 * @return void
 */
function alku_register_my_menus() {
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Header Menu', 'alku' ),
		)
	);
}
add_action( 'init', 'alku_register_my_menus' );

/**
 * Add supports for theme.
 *
 * @return void
 */
function alku_setup() {
	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'alku_setup' );
