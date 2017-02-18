<?php

/**
 * Setup Theme
 */
add_action( 'after_setup_theme', 'muzli_setup' );
function muzli_setup()
{
	/**
	 * Theme Support
	 */
	add_theme_support( 'menus' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );


	/**
	 * Menus
	 */
	register_nav_menus(array(
		'primary' => 'Primary Menu',
		'categories' => 'Category Menu',
	));


	/**
	 * Editor Style
	 */
	add_editor_style( 'css/editor-style.css' );
}


// Add specific CSS class by filter
add_filter( 'body_class', 'muzli_class_names' );
function muzli_class_names( $classes )
{
	$slug = get_post_field( 'post_name', get_post() );

	$classes = array( $slug );

	return $classes;
}


// Turn on 'Kitchen Sink' for all users
add_filter( 'tiny_mce_before_init', 'muzli_unhide_kitchensink' );
function muzli_unhide_kitchensink( $args )
{
	$args['wordpress_adv_hidden'] = false;
	return $args;
}


// Add buttons to the Editor
add_filter('mce_buttons_2', 'muzli_more_mce_buttons');
function muzli_more_mce_buttons( $buttons )
{
	$buttons[] = 'hr';
	// $buttons[] = 'del';
	// $buttons[] = 'sub';
	// $buttons[] = 'sup';
	// $buttons[] = 'anchor';
	// $buttons[] = 'fontselect';
	// $buttons[] = 'fontsizeselect';
	// $buttons[] = 'cleanup';
	// $buttons[] = 'styleselect';

	return $buttons;
}