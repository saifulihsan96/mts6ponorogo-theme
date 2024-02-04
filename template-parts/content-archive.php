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

	<div class="post_item">

		<?php future_post_thumbnail(); ?>
		<div class="content-post">

			<?php
			
			$post_id  = get_the_ID();
			$category = category_post( $post_id );
			echo $category;

			?>
			<?php $date = get_the_date( 'l j, F', get_the_ID() ); ?>
			<div class="date"><?php echo $date ?></div>

			<?php
			if ( is_singular() ) :
				the_title( '<h3 class="entry-title">', '</h3>' );
			else :
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			endif;

            $desc     = get_the_excerpt( get_the_ID() );
            $description = strlen( $desc ) > 300 ? substr( $desc, 0, 180 ) . ' ...' : $desc;
			?>
			<p><?php echo $description ?></p>
		</div>
	</div>

</article>
