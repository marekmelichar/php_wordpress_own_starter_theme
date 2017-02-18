<?php
/*
* Template Name: Uvod
*/

$hero_bg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

// Custom Fields
$hero_text = get_field( 'hero_text' );

get_header() ?>

	<div class="row banner" style="background-image: url(<?php echo $hero_bg; ?>); background-repeat: no-repeat; background-size: cover; height: 100vh;">

				<?php wp_nav_menu( array(
					'theme_location'  => 'primary',
					'menu_class'      => 'main-menu',
					'container'       => false,
				) ) ?>

		<h1><?php echo $hero_text; ?></h1>
	</div>

<?php get_footer() ?>
