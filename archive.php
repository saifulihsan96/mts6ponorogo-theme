<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package future
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php echo head_title( 'archive' ); ?>
		<div class="mts-container">

			<div class="row-content-template">
				<div class="content-inner">
					<?php if ( have_posts() ) : ?>

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', 'archive' );

						endwhile;

						// the_posts_navigation();
						?>
						<nav class="pagination">
							<?php
							the_posts_pagination( array(
								'mid_size'  => 2,
								'prev_text' => __( 'Previous', 'textdomain' ),
								'next_text' => __( 'Next', 'textdomain' ),
							) );
							?>
						</nav>
						<?php

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>

				<div class="sidebar">
					<?php sidebar_set(); ?>
				</div>
			</div>

		</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
