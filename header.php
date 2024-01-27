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
				<div class="container">
					<div class="header-menu mts-content">
					
						<div class="row-header-top">
							<div class="header-setpost">
								<span class="header-post-date">19 January 2024</span>
								<span class="header-post"><strong>Latest : </strong><a href="/"> Profil Perpustakaan Harun Al Rasyid MAN 2 Kudus</a></span>
							</div>

							<div class="header-sosial">
								<span class="set-sosial ss-facebook"></span>
								<span class="set-sosial ss-instagram"></span>
								<span class="set-sosial ss-youtube"></span>
							</div>
						</div>

					</div>
				</div>
			</header>
