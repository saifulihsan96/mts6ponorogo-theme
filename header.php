<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package future
 */

$contentFooter = get_field( 'footer_content', 'option' );
$content       = ( $contentFooter ) ? $contentFooter : [];
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<link rel="stylesheet" id="main-css" href="<?php echo FTR_URI ?>/dist/css/main.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

		<div id="page" class="site">
			<header id="masthead" class="site-header">
				<div class="header-menu">
				
					<div class="row-header-top">
						<div class="mts-container">

							<div class="row-header">
								<div class="header-setpost">
									<?php

									$postTop = get_field( 'post_top', 'option' );
									if ( $postTop ) {
										$title = get_the_title( $postTop );
										$url   = get_permalink( $postTop );
										$date  = get_the_date( 'l j, F', $postTop );
										?>

										<span class="header-post-date"><?php echo $date; ?></span>
										<span class="header-post"><strong>Latest : </strong><a href="<?php echo $url; ?>"> <?php echo $title; ?></a></span>

										<?php
									}

									?>
								</div>

								<div class="header-sosial">
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

					<div class="row-header-center">
						<div class="mts-container">

							<div class="row-header">
								<div class="logo-main">
									<a href="/">
									<?php

									$custom_logo_id = get_theme_mod( 'custom_logo' );
									$image          = wp_get_attachment_image( $custom_logo_id , 'full' );

									echo $image;

									?>
									</a>
								</div>

								<div class="mobile-menu">

									<div class="icon_bar">
										<svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12" fill="none">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M0 11C0 10.4477 0.447715 10 1 10H17C17.5523 10 18 10.4477 18 11V11C18 11.5523 17.5523 12 17 12H1C0.447716 12 0 11.5523 0 11V11ZM0 6C0 5.44772 0.447715 5 1 5H17C17.5523 5 18 5.44772 18 6V6C18 6.55228 17.5523 7 17 7H1C0.447716 7 0 6.55228 0 6V6ZM0 1C0 0.447715 0.447715 0 1 0H17C17.5523 0 18 0.447715 18 1V1C18 1.55228 17.5523 2 17 2H1C0.447716 2 0 1.55228 0 1V1Z" fill="black"/>
										</svg>
									</div>

									<div class="setmenu">
										<div class="close-menu">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M6.4 19L5 17.6L10.6 12L5 6.4L6.4 5L12 10.6L17.6 5L19 6.4L13.4 12L19 17.6L17.6 19L12 13.4L6.4 19Z" fill="black"/>
											</svg>
										</div>
										<?php

										wp_nav_menu( [
											'menu'       => 'Menu 1',
											'menu_class' => 'main-mobile-header',
										] );

										?>
									</div>
									<div class="overlay-menu"></div>

								</div>
							</div>

						</div>
					</div>

					<div class="row-header-bottom">
						<div class="mts-container">

							<div class="row-header">
								<div class="main-menu">
									<?php

									wp_nav_menu( [
										'menu'       => 'Menu 1',
										'menu_class' => 'main-menu-header',
									] );

									?>
								</div>

								<div class="search-head">
									
									<div class="search-menu icon-search"></div>
									<form action="/" method="get" class="form-search-page">
										<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search"/>
									</form>
										
								</div>
							</div>

						</div>
					</div>

				</div>
			</header>
