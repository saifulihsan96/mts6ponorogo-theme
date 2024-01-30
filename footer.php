<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package future
 */

$contentFooter = get_field( 'footer_content', 'option' );
$content       = ( $contentFooter ) ? $contentFooter : [];
$information   = ( $content[ 'school_information' ] ) ? $content[ 'school_information' ] : [];
?>
		<?php if ( !is_front_page() ) { ?>
		<section class="post-highlight">
			<div class="mts-container">
			<?php 
			
			$args = [
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'posts_per_page' => 10,
				'tax_query'      => [
					[
						'taxonomy' => 'group-post',
						'field'    => 'slug',
						'terms'    => 'highlight',
					]
				]
			];

			$query = new wp_query( $args );
			if ( $query->have_posts() ) {
				?>
				<h2 class="heading5">Highlight Artikel</h2>
				<div class="swiper footer-post">
					<div class="swiper-wrapper">

					<?php
					while ( $query->have_posts() ) {
						$query->the_post();
						$title = get_the_title();
						$url   = get_permalink();

						$image_id = get_post_thumbnail_id();
						$image    = wp_get_attachment_image( $image_id, 'full' );
						$category = get_the_category();

						$name_cat = '';
						$class    = '';
						if ( $category ) {
							foreach ( $category as $cat ) {
								$name_cat .= $cat->name;

								if ( $cat->slug == 'event' ) {
									$class .= 'red'; 
								}
								if ( $cat->slug == 'informasi' ) {
									$class .= 'blue'; 
								}
								if ( $cat->slug == 'news' ) {
									$class .= 'green'; 
								}
							}
						}
						?>
						
						<a href="<?php echo $url; ?>" class="swiper-slide item-post">
							<div class="post-media">
								<div class="post-category <?php echo $class; ?>"><?php echo $name_cat; ?></div>
								<?php echo $image; ?>
							</div>
							<h3 class="title-post"><?php echo $title; ?></h3>
						</a>

						<?php
					}
					wp_reset_postdata();
					?>

					</div>
					<div class="swiper-button-next footer-next setArrow"></div>
					<div class="swiper-button-prev footer-prev setArrow"></div>
				</div>
				<?php
			} 
			?>
			</div>
		</section>
		<?php } ?>

		<section class="map-location">
			<?php
			
			$urlIframe = get_field( 'iframe_map', 'option' );
			if ( $urlIframe ) {
				
			?>

			<iframe src="<?php echo $urlIframe; ?>" width="600" height="313" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

			<?php } ?>
		</section>

		<section class="subscriber">
			<div class="mts-container">

				<div class="row-column">
					<div class="column">
						<h2 class="heading4">Join Our Newsletter</h2>
						<p>Inputkan email anda dan ikuti artikel - artikel terbaru dari kami</p>
					</div>
					<div class="column">
						<?php
						
						$form_subscriber = get_field( 'form_footer', 'option' );
						echo '<div class="form_sub">' . do_shortcode( $form_subscriber ) . '</div>';

						?>
					</div>
				</div>

			</div>
		</section>
		<footer class="footer-main">
			<div class="top-footer">
				<div class="mts-container">
					<?php

					$logo_id = $information[ 'logo_footer' ][ 'id' ];
					$logo    = wp_get_attachment_image( $logo_id, 'full', [ 'class' => 'footer-logo' ] );
					echo '<a href="/">' . $logo . '</a>';

					?>
					<div class="row-footer">
						<div class="column">

							<div class="set-row">
								<div class="text-footer">
								<?php 

								$desc = ( $information[ 'description' ] ) ? $information[ 'description' ] : '';
								echo $desc;

								?>
								</div>
							</div>

							<div class="set-row">
								<div class="text-head">Lokasi Sekolah</div>
								<div class="text-footer">
								<?php 

								$address = ( $information[ 'address' ] ) ? $information[ 'address' ] : '';
								echo $address;

								?>
								</div>
							</div>

							<div class="set-row">
								<?php

								$phone    = ( $information[ 'phone' ] ) ? $information[ 'phone' ] : '';
								$urlPhone = str_replace( ' ', '', $phone );
								echo '<a href="tel:' . $urlPhone . '">' . $phone . '</a>';

								$email    = ( $information[ 'email' ] ) ? $information[ 'email' ] : '';
								echo '<a href="mailto:' . $email . '">' . $email . '</a>';

								?>
							</div>

						</div>
						<div class="column">

							<div class="set-row">
								<div class="text-head">MTs Negeri 6 Po</div>
								<ul>
									<?php
									
									$menu_footer = ( $content[ 'menu_footer' ] ) ? $content[ 'menu_footer' ] : [];
									$menus        = $menu_footer[ 'menu' ];
									if ( $menus) {
										foreach ( $menus as $menu ) {
											$page       = $menu[ 'item_menu' ];
											$title_page = $page->post_title;
											$url_page   = get_permalink( $page->ID );

											echo '<li><a href="' . $url_page .'">' . $title_page . '</a></li>';
										}
									}

									?>
								</ul>
							</div>

						</div>
						<div class="column">

							<div class="set-row">
								<div class="text-head">News Artikel</div>
								<ul>
									<?php
									
									$post_footer = get_field( 'post_bottom', 'option' );
									if ( $post_footer ) {
										foreach ( $post_footer as $post ) {
											$post_title = get_the_title( $post );
											$post_url   = get_permalink( $post );

											echo '<li><a href="' . $post_url . '">' . $post_title . '</a></li>';
										}
									}

									?>
								</ul>
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="bottom-footer">
				<div class="mts-container">

					<div class="row-footer">
						<div class="column">Copyright © <?php echo date( 'Y' ) ?> MTsN 6 Ponorogo || All Rights Reserved</div>
						<div class="column">
							<?php

							$sosialMedia = $content[ 'sosial_media' ];
							if ( $sosialMedia ) {
								foreach ( $sosialMedia as $sosial ) {
									$media = $sosial[ 'media' ];
									$url   = $sosial[ 'url_sosial_media' ];

									if ( $media == 'facebook' ) {
										echo '<a href="' . $url . '" target="_blank" class="set-sosial ss-facebook"></a>';
									}
									if ( $media == 'instagram' ) {
										echo '<a href="' . $url . '" target="_blank" class="set-sosial ss-instagram"></a>';
									}
									if ( $media == 'youtube' ) {
										echo '<a href="' . $url . '" target="_blank" class="set-sosial ss-youtube"></a>';
									}
								}
							}

							?>
						</div>
					</div>

				</div>
			</div>

		</footer>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
	<script src="<?php echo FTR_URI ?>/dist/js/main.bundle.js"></script>
	<?php wp_footer(); ?>
	
	</body>
</html>
