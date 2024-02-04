<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package future
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="media-single">
		<?php future_post_thumbnail(); ?>
		<div class="overlay-single-post"></div>
		<div class="mts-container">

			<div class="content-head">
				<div class="post-date"><?php echo the_date( 'l j, F' ); ?></div>
				<header class="entry-header">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
					?>
				</header>
			</div>

		</div>
	</div>

	<div class="entry-content">
		<div class="mts-container">

			<div class="row-content">
				<div class="content-post">
					<div class="share-content">
						<div class="text">Share :</div>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><div class="set-sosial ss-facebook"></div></a>
						<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank"><div class="set-sosial ss-twitter"></div></a>
						<a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>&description=<?php echo get_the_title(); ?>" target="_blank"><div class="set-sosial ss-pinterest"></div></a>
					</div>
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'future' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);
					?>
					<div class="tag-content">
						<?php 
						$tags = get_the_tags();
						if ( $tags ) {
							echo '<div class="tax-head">Tag : </div>';
							echo '<ul>';
							foreach ( $tags as $tag ) {
								echo '<li><a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a></li>';
							}
							echo '</ul>';
						}
						?>
					</div>
				</div>
				<div class="sidebar">
					<?php sidebar_set(); ?>
				</div>
			</div>

		</div>
	</div><!-- .entry-content -->
	

</article><!-- #post-<?php the_ID(); ?> -->
