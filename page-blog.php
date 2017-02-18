<?php get_header() ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post() ?>

			<?php the_content() ?>

			<div class="post-list">
				<?php

					$posts = get_posts(array(
						'posts_per_page' => get_option('posts_per_page'),
						'suppress_filters' => true,
					));

					foreach ( $posts as $post ) : ?>

						<article class="post" id="post-<?php echo esc_attr( $post->ID ) ?>">
							<h1 class="post-title"><?php echo apply_filters( 'the_title', $post->post_title ) ?></h1>
							<?php echo apply_filters( 'the_content', $post->post_content ) ?>
						</article>

					<?php endforeach ?>

					<?php echo do_shortcode('[button color="yellow" link="archive"]Older articles[/button]') ?>
				</div>

		<?php endwhile ?>
	<?php endif ?>

<?php get_footer() ?>