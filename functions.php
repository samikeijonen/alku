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
