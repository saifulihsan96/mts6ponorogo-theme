<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package future
 */

get_header();
?>

<main id="primary" class="site-main">
<?php
while ( have_posts() ) :
	the_post();
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses_post(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'future' )
					),
					esc_html( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>

		</footer><!-- .entry-footer -->
		<?php endif; ?>

	</article>
	<!-- #post-<?php the_ID(); ?> -->

<?php endwhile; ?>
</main><!-- #main -->

<?php
get_footer();
