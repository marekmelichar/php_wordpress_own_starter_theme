<?php

/**
 * Shortcodes
 */

// [ buttons ]
add_shortcode('button', 'muzli_button_shortcode');
function muzli_button_shortcode( $atts, $text = 'enter text' )
{
	// set defaults
	$atts = shortcode_atts(array(
		'color' => '',
		'link'  => '#',
	), $atts );

	// create css class from color
	if ( $atts['color'] ) $atts['color'] = 'btn-'.$atts['color'];

	// outside or internal link?
	$parsed = wp_parse_url( $atts['link'] );
	if ( !isset($parsed['scheme']) ) {
		$atts['link'] = home_url( $atts['link'] );
	}

	// create the html
	$html  = '<a href="'. $atts['link'] .'" class="btn '. $atts['color'] .' animate">';
	$html .= 	$text;
	$html .= '</a>';

	return $html;
}

// [ simple_gallery ]
add_shortcode('simple_gallery', 'simple_gallery_shortcode');
function simple_gallery_shortcode( $atts, $text = 'enter text' )
{
	// extract variables and set defaults
	$atts = shortcode_atts(array(
		'gallery_class' => 'image-grid group',
		'img_class'     => 'gallery-img',
	), $atts );

	$post  = get_post();
	$media = get_attached_media( 'image', $post->ID );

	if ( ! $media ) return '';

	$html = '<div class="'. esc_attr($atts['gallery_class']) .'">';
	foreach ( $media as $img )
	{
		$html .= '<img src="'. esc_url( wp_get_attachment_image_url($img->ID, 'full') ) .'"
					class="'. esc_attr( $atts['img_class'] ) .'"
					alt="'. esc_attr( $img->post_title ) .'">';
	}
	$html .= '</div>';

	return $html;
}