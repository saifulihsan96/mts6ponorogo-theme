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
$class_name = 'block-featured';

if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}


$item_featured = '';
$featured = get_field( 'featured' );
if ( $featured ) {
    foreach ( $featured as $feature) {

        $icon = $feature[ 'icon' ][ 'id' ];
        $head = $feature[ 'head_text' ];
        $info = $feature[ 'information_text' ];
        $img  = wp_get_attachment_image( $icon, 'full' );

        $item_featured .= <<<HTML
        <div class="item-featured">
            {$img}
            <div class="content">
                <h3>{$head}</h3>
                <div class="information">{$info}</div>
            </div>
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

            <div class="row-featured">
                {$item_featured}
            </div>

        </div>
	</section>
HTML;

// HTML structure printing.
echo $view;
