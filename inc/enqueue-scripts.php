<?php

/**
 * Add scripts & styles
 */
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

add_action('wp_enqueue_scripts', 'kovarstvi_theme_scripts');
function kovarstvi_theme_scripts()
{

	wp_enqueue_script(
		'kovarstvi-what-input', get_template_directory_uri() . '/js/vendor/what-input.js'
	);

	wp_enqueue_script(
		'kovarstvi-foundation-js', get_template_directory_uri() . '/js/vendor/foundation.min.js', array( 'jquery' ), '6.0', true );

  wp_enqueue_script( 'site-js', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), '', true );

	// wp_enqueue_script(
	// 	'kovarstvi-jquery', get_template_directory_uri() . '/js/vendor/jquery.js'
	// );

	// wp_enqueue_style( 'motion-ui-css', get_template_directory_uri() . '/vendor/motion-ui/dist/motion-ui.min.css', array(), '', 'all' );




	// wp_enqueue_script(
	// 	'kovarstvi-app', get_template_directory_uri() . '/js/app.js'
	// );

	wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/css/foundation.min.css', array(), '', 'all' );

	// wp_enqueue_style(
	// 	'kovarstvi-foundation', get_template_directory_uri() . '/css/foundation.min.css'
	// );

	wp_enqueue_style(
		'kovarstvi-animations', get_template_directory_uri() . '/css/animations.css'
	);

	wp_enqueue_style(
		'kovarstvi-fonts', 'http://fonts.googleapis.com/css?family=Montserrat:400,700'
	);

	wp_enqueue_style(
		'kovarstvi-style', get_stylesheet_uri()
	);



	// only load CONTACT FORM 7 on contact page
	if ( is_page('contact') )
	{
		if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
			wpcf7_enqueue_scripts();
		}

		if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
			wpcf7_enqueue_styles();
		}
	}
}
