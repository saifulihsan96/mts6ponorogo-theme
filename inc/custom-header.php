<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * <?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package future
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses future_header_style()
 */
function future_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'future_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => '000000',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => 'future_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'future_custom_header_setup' );

if ( ! function_exists( 'future_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see future_custom_header_setup().
	 */
	function future_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
				}
			<?php
			// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;

add_action( 'before_main_menu', function() {
	$html  = '';

	$reviews = get_field( 'review', 'option' );
	if ( $reviews ) {
		foreach ( $reviews as $key => $review ) {
			$rating     = isset( $review[ 'rating' ] ) ? $review[ 'rating' ] . '/5' : '5.0/5';
			$total      = isset( $review[ 'total_rating' ] ) ? $review[ 'total_rating' ] : '100';
			$icon       = isset( $review[ 'icon_review' ]['url'] ) ? $review[ 'icon_review' ]['url'] : '';
			$icon_light = isset( $review[ 'icon_light' ]['url'] ) ? $review[ 'icon_light' ]['url'] : '';
			$urlreview  = isset( $review[ 'url' ] ) ? $review[ 'url' ] : '';
			
			switch ( $key > 3 ) {
				case 0:
				$html .= <<<HTML
				<li>
					<a href="{$urlreview}" class="social-rating">
						<p class="rating-wrapper">
							<img src="{$icon_light}" width="20" height="20" class="social-hollow" alt="Social Hollow">
							<img src="{$icon}" width="20" height="20" class="social-filled" alt="Social Filled">
							<span class="rating">{$rating}</span>
							<span class="dashicons"></span>
						</p>
					</a>
				</li>
HTML;
				break;
			}
		}
	}

	// phpcs:ignore
	echo <<<HTML
<ul class="social-ratings">
	{$html}
</ul>
HTML;
} );

add_action( 'after_main_menu', function() {
	$html = '';
	$user = esc_html__( 'Sign in', 'future' );
	$surl = wp_login_url();
	$stxt = $user;

	if ( is_user_logged_in() ) {
		$user = wp_get_current_user()->display_name;
		$surl = esc_url( wp_logout_url() );
		$stxt = esc_html__( 'Sign out', 'future' );
	}

	$user = sprintf( '%1$s, %2$s', esc_html__( 'Hello', 'future' ), esc_html( $user ) );
	$lang = esc_html__( 'English - ISK', 'future' );
	$down = get_stylesheet_directory_uri() . '/assets/image/icondown.svg';
	$hi   = get_stylesheet_directory_uri() . '/assets/image/iconhy.svg';

	$html .= <<<HTML
<li>
	<div class="about-wrapper">
		<p class="about-title">{$lang} <span><img src="{$down}" class="icondown" alt="down"></span></p>
		<div class="about-content">
			<p class="about-item">{$lang}</p>
			<p class="about-item">{$lang}</p>
		</div>
	</div>
</li>
HTML;

	$html .= <<<HTML
<li>
	<div class="about-wrapper">
		<p class="about-title">{$user} <span><img src="{$down}" class="icondown" alt="down"><img src="{$hi}" class="iconhi" alt="hi icon"></span></p>
		<div class="about-content">
			<p class="about-item"><a href="{$surl}">{$stxt}</a></p>
		</div>
	</div>
</li>
HTML;

	// phpcs:ignore
	echo <<<HTML
<ul class="about-user">
	{$html}
</ul>
HTML;
} );
