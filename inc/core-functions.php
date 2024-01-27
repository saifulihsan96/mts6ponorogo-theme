<?php
/**
 * Generate img from id thumbnail
 *
 * @param int    $id The ID of attachment.
 * @param string $class The class of img element.
 * @param string $size The size of attachment.
 * @param string $loading The loading behavior of img, lazy|eager.
 * @param string $alt The alt of img element.
 * @param string $height The height of img element.
 * @param string $width The width of img element.
 *
 * @return string img element.
 */
function render_image(
	int $id = 0,
	string $class = '',
	string $size = 'full',
	string $loading = 'lazy',
	string $alt = '',
	string $height = '',
	string $width = ''
	) {
	if ( 0 === $id ) {
		$fallback = FTR_URI . '/assets/image/No_Image_Available.jpg';

		return '<img class="' . $class . '" src="' . $fallback . '" alt="No Image Available" width="300" height="300">';
	}

	$class .= 'eager' === $loading ? ' skip-lazy' : '';

	// if image does not have alt text, use the file name.
	if ( empty( $alt ) ) {
		$alt = get_post_meta( $id, '_wp_attachment_image_alt', true );

		if ( empty( $alt ) ) {
			$filename = basename( get_attached_file( $id ) );
			$alt      = preg_replace( '/\\.[^.\\s]{3,4}$/', '', $filename );
		}
	}

	if ( ! empty( $height ) && ! empty( $width ) ) {
		return wp_get_attachment_image( $id, $size, false, [
			'class'   => $class,
			'loading' => $loading,
			'alt'     => $alt,
			'height'  => $height,
			'width'   => $width,
		] );
	} else {
		return wp_get_attachment_image( $id, $size, false, [
			'class'   => $class,
			'loading' => $loading,
			'alt'     => $alt,
		] );
	}
}

function render_link($text, $url, $class, $label){
	if(!$url){
		$url = "#";
	}
	if(!$label){
		$label = $text;
	}
	ob_start();
	?>
	<a href="<?php echo $url;?>" class="<?php echo $class;?>" aria-label="<?php echo $label?>"><?php echo $text;?></a>
	<?php
	return ob_get_clean();
}
function render_button($text, $class, $label){
	if(!$label){
		$label = $text;
	}
	ob_start();
	?>
	<button class="<?php echo $class;?>" aria-label="<?php echo $label?>"><?php echo $text;?></button>
	<?php
	return ob_get_clean();
}
?>
