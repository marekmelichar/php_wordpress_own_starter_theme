<?php

/**
 * Sidebars & Widgets
 */

// enable shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

// register sidebars
add_action( 'widgets_init', 'muzli_widgets_init' );
function muzli_widgets_init()
{
	register_sidebar( array(
		'name'          => 'Off canvas menu sidebar',
		'id'            => 'sidebar-primary',
		'description'   => 'leve menu na mobilu',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
