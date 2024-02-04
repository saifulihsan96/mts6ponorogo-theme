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
$class_name = 'block-slider-post';

if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}


$itemslide  = '';
$name_sec   = get_field( 'name_section' );
$link       = get_field( 'link_next' );
$link_next  = ( $link ) ? '<a href="/" class="next">Selengkapnya</a>' : '';
$sliderpost = get_field( 'post_slider' );

if ( $sliderpost && $name_sec ) {
    foreach ( $sliderpost as $slider ) {
        $id_post  = $slider->ID;
        $title    = get_the_title( $id_post );
        $url      = get_permalink( $id_post );

        $image_id = get_post_thumbnail_id( $id_post );
        $image    = wp_get_attachment_image( $image_id, 'full' );
        $category = category_post( $id_post );

        $itemslide .= <<<HTML
        <div class="swiper-slide item-slide">
            <div class="post-media">
                {$category}
                {$image}
            </div>
            <h3 class="title-post"><a href="{$url}">{$title}</a></h3>
        </div>
HTML;
    }
}


/**
 * This variable as the HTML structure for the block hero view.
 * Section 'block-hero'.
 */
$view = <<<HTML
	<section id="{$id}" class="{$class_name}">
        <div class="mts-container">
            <div class="head-section">
                <h2 class="heading5">{$name_sec}</h2>
                {$link_next}
            </div>
            <div class="swiper carousel-post slide-post">
                <div class="swiper-wrapper">
                    {$itemslide}
                </div>
                <div class="swiper-button-next slider-next setArrow"></div>
                <div class="swiper-button-prev slider-prev setArrow"></div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
	</section>
HTML;

// HTML structure printing.
echo $view;