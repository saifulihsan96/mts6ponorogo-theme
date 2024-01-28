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
										$date  = get_the_date( 'l F j', $postTop );
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
										<svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
										<path d="M10.5 19C10.5 19.2761 10.7239 19.5 11 19.5L20 19.5C20.2761 19.5 20.5 19.2761 20.5 19L20.5 17C20.5 16.7239 20.2761 16.5 20 16.5L11 16.5C10.7239 16.5 10.5 16.7239 10.5 17L10.5 19ZM6.5 3C6.5 3.27614 6.72386 3.5 7 3.5L20 3.5C20.2761 3.5 20.5 3.27614 20.5 3L20.5 0.999999C20.5 0.723857 20.2761 0.499999 20 0.499999L7 0.5C6.72386 0.5 6.5 0.723858 6.5 1L6.5 3ZM0.5 11C0.5 11.2761 0.723857 11.5 1 11.5L20 11.5C20.2761 11.5 20.5 11.2761 20.5 11L20.5 9C20.5 8.72386 20.2761 8.5 20 8.5L1 8.5C0.723857 8.5 0.5 8.72386 0.5 9L0.5 11Z" fill="black" stroke="black" stroke-linejoin="round"/>
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
