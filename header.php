<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('sitename') ?> Feed" href="<?php echo get_bloginfo('rss2_url') ?>">
	<?php wp_head() ?>
</head>
<body <?php body_class() ?>>
	<div class="off-canvas-wrapper">
      <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <div class="off-canvas position-left" id="offCanvas" data-off-canvas>

          <!-- Close button -->
          <button class="close-button" aria-label="Close menu" type="button" data-close>
            <span aria-hidden="true">&times;</span>
          </button>

          <!-- Menu -->
					<?php wp_nav_menu( array(
							'theme_location'  => 'categories',
							'menu_class'      => 'categories-menu show-for-small-only',
							'container'       => false,
					) ) ?>

        </div>

        <div class="off-canvas-content" data-off-canvas-content>
        <!-- Page content -->
        <button type="button" class="button open-menu show-for-small-only" data-toggle="offCanvas">Open Menu</button><!-- Off canvas BUTTON -->
<main>
