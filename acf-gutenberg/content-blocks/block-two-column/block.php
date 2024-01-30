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
$class_name = 'block-two-column';

if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

$columnMedia = get_field( 'column_media' );
$optionMedia = $columnMedia[ 'select_media' ];
$image       = $columnMedia[ 'image' ];
$urlYoutube  = $columnMedia[ 'video_youtube' ];

$media_content  = '';
if ( $optionMedia == 'image' ) {

    $image_id   = $image[ 'id' ];
    $setimage   = wp_get_attachment_image( $image_id, 'full', '', [ 'class' => 'content-image' ] );
    $media_content .= ( $image ) ? $setimage : '';

} else if ( $optionMedia == 'video' ) {
    $image_id   = $image[ 'id' ];
    $img_video  = wp_get_attachment_image( $image_id, 'full', '', [ 'class' => 'thumbnail-image' ] );
    $iconplay   = FTR_URI . '/assets/image/play-button.svg';
    
    $parsed_url = parse_url($urlYoutube);
    $query_string = isset($parsed_url['query']) ? $parsed_url['query'] : '';
    parse_str($query_string, $query_params);
    $video_id = isset($query_params['v']) ? $query_params['v'] : '';

    $media_content .= <<<HTML
    <div class="content_video">
        <div class="image-thumbnail">
            {$img_video}
            <img src="{$iconplay}" alt="play-button" class="playbtn">
        </div>
        <iframe width="1280" height="720" src="https://www.youtube.com/embed/{$video_id}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
HTML;
}

$columnContent = get_field( 'column_content' );
$optionContent = $columnContent[ 'option_content' ];
$links         = $columnContent[ 'link' ];

$link_content = '';
if ( $links ) {
    $titleLink  = $links[ 'title' ];
    $targetLink = $links[ 'target' ] ? $links[ 'target' ] : '_self';
    $urlLink    = $links[ 'url' ];

    $link_content .= '<a href="' . $urlLink . '" target="' . $targetLink . '" class="btn-link">' . $titleLink . '</a>'; 
}          

$text_content = '';
if ( $optionContent == 'normal' || $optionContent == 'list' ) {
    $text = $columnContent[ 'text_content' ];
    $text_content .= '<div class="content-text">' . $text . '</div>';
}

$list_content = '';
if ( $optionContent == 'list' ) {
    $lists = $columnContent[ 'list_content' ];

    if ( $lists ) {
        foreach ( $lists as $key => $list ) {
            $textHead = $list[ 'head_text' ];
            $textSub  = $list[ 'text' ];
            $number   = $key + 1;

            $list_content .= <<<HTML
            <div class="list-item">
                <div class="head-list">
                    <span>{$number}</span>
                    <h3>{$textHead}</h3>
                </div>
                <div class="list-content">{$textSub}</div>
            </div>
HTML;

        }
    }

}

/**
 * This variable as the HTML structure for the block hero view.
 * Section 'block-hero'.
 */
$view = <<<HTML
	<section id="{$id}" class="{$class_name}">
        <div class="mts-container">
            
            <div class="row-column">
                <div class="column-media">
                    {$media_content}
                </div>
                <div class="column-content">
                    {$text_content}
                    <div class="list_cotent">{$list_content}</div>
                    {$link_content}
                </div>
            </div>

        </div>
	</section>
HTML;

// HTML structure printing.
echo $view;