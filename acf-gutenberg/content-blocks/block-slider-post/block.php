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
$sliderpost = get_field( 'post_slider' );

if ( $sliderpost && $name_sec ) {
    foreach ( $sliderpost as $slider ) {
        $id_post  = $slider->ID;
        $title    = get_the_title( $id_post );
        $url      = get_permalink( $id_post );

        $image_id = get_post_thumbnail_id( $id_post );
        $image    = wp_get_attachment_image( $image_id, 'full' );
        $category = get_the_category( $id_post );

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

        $itemslide .= <<<HTML
        <a href="{$url}" class="swiper-slide item-slide">
            <div class="post-media">
                <div class="post-category {$class}">{$name_cat}</div>
                {$image}
            </div>
            <h3 class="title-post">{$title}</h3>
        </a>
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
                <a href="">Selengkapnya</a>
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