<?php
/*
* Template Name: Kovarske vyrobky
*/

$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

// Custom Fields
//$hero_text = get_field( 'hero_text' );

get_header() ?>

    <div class="row">

        <?php wp_nav_menu( array(
            'theme_location'  => 'categories',
            'menu_class'      => 'categories-menu hidden-for-small-only',
            'container'       => false,
        ) ) ?>

    </div>

<?php get_footer() ?>
