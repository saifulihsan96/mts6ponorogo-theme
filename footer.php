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

		<footer class="footer-main">
			<div class="top-footer">
				<div class="mts-container">
					<?php

					$logo_id = $information[ 'logo_footer' ][ 'id' ];
					$logo    = wp_get_attachment_image( $logo_id, 'full', [ 'class' => 'footer-logo' ] );
					echo $logo;

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
	<script src="<?php echo FTR_URI ?>/dist/js/main.bundle.js"></script>
	<?php wp_footer(); ?>
	
	</body>
</html>
