<?php
/**
 * Dat Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */


// Create id attribute allowing for custom "anchor" value.
$id = 'mts-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block-video';

if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}


$video = get_field( 'url_youtube' );
$image = get_field( 'image_thumbnail' );

$videoset = '';
if ( $video && $image ) {
    $image_id   = $image[ 'id' ];
    $img_video  = wp_get_attachment_image( $image_id, 'full', '', [ 'class' => 'thumbnail-image' ] );
    $iconplay   = FTR_URI . '/assets/image/play-button.svg';
    
    $parsed_url = parse_url($video);
    $query_string = isset($parsed_url['query']) ? $parsed_url['query'] : '';
    parse_str($query_string, $query_params);
    $video_id = isset($query_params['v']) ? $query_params['v'] : '';

    $videoset .= <<<HTML
    <div class="video-set">
        <div class="image-video">
            {$img_video}
            <img src="{$iconplay}" alt="icon-play" class="icon">
        </div>
        <iframe width="1280" height="720" src="https://www.youtube.com/embed/{$video_id}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
HTML;
}


/**
 * This variable as the HTML structure for the block hero view.
 * Section 'block-hero'.
 */
$view = <<<HTML
	<section id="{$id}" class="{$class_name}">
		<div class="mts-container">
            {$videoset}
        </div>
	</section>
HTML;

// HTML structure printing.
echo $view;
