<?php

/**
 * Customizer
 */
add_action( 'customize_register', 'muzli_customize_register' );
function muzli_customize_register( $wp_customize )
{
	$wp_customize->add_section('copyright', array(
		'title'    => 'Copyright',
		'priority' => 30,
	));

	$wp_customize->add_setting('copy_by', array(
		'default'   => get_option( 'blogname' ),
		'transport' => 'refresh',
		'sanitize_callback' => function( $content ) {
			return sanitize_text_field( $content );
		},
	));

	$wp_customize->add_setting('copy_text', array(
		'default'   => 'Created with hate',
		'transport' => 'refresh',
		'sanitize_callback' => function( $content ) {
			return wp_kses( $content, array(
				'strong' => array(),
				'a' => array(
					'href' => array(),
					'title' => array(),
				)
			));
		},
	));

	$wp_customize->add_control( 'copy_by', array(
		'type'     => 'text',
		'priority' => 10,
		'section'  => 'copyright',
		'label'    => 'Copyright by',
	) );

	$wp_customize->add_control( 'copy_text', array(
		'type'     => 'textarea',
		'priority' => 20,
		'section'  => 'copyright',
		'label'    => 'Copyright text',
	) );

}