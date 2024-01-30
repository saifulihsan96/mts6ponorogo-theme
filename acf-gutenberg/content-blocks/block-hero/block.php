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
$class_name = 'block-hero';

if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

$news_post      = get_field( 'news_post' );
$highlight_post = get_field( 'highlight_post' );
$popular_post   = get_field( 'popular_post' );

$inner_post_news = '';
if ( $news_post ) {
    foreach ( $news_post as $key => $n_post ) {
        $image_id = get_post_thumbnail_id( $n_post->ID );
        $image    = wp_get_attachment_image( $image_id, 'full', '', [ 'class' => 'big-image' ] );
        $title    = get_the_title( $n_post->ID );
        $date     = get_the_date( 'l j, F', $n_post->ID );
        $url      = get_permalink( $n_post->ID );
        $desc     = get_the_excerpt( $n_post->ID );
        $description = strlen( $desc ) > 300 ? substr( $desc, 0, 250 ) . ' ...' : $desc;
        
        $classPost  = ( $key == 0 ) ? 'active' : '';
        $inner_post_news .= <<<HTML
        <div id="inner{$key}" class="inner-post {$classPost}">
            {$image}
            <div class="mts-container">
                <div class="column">
                    <div class="date-post-hero">{$date}</div>
                    <h1><a href="{$url}">{$title}</a></h1>
                    <p>{$description}</p>
                    <a href="{$url}" class="button">Baca Selengkapnya</a>
                </div>
                <div class="column">
                    <div class="small-post">
                        <img src="" alt="small-hero" width="260" height="136">
                        <h3></h3>
                    </div>
                </div>
            </div>
        </div>
HTML;
    }
}

$inner_post_highlight = '';
if ( $highlight_post ) {
    foreach ( $highlight_post as $key => $h_post ) {
        $image_id = get_post_thumbnail_id( $h_post->ID );
        $image    = wp_get_attachment_image( $image_id, 'full', '', [ 'class' => 'big-image' ] );
        $title    = get_the_title( $h_post->ID );
        $date     = get_the_date( 'l j, F', $h_post->ID );
        $url      = get_permalink( $h_post->ID );
        $desc     = get_the_excerpt( $h_post->ID );
        $description = strlen( $desc ) > 300 ? substr( $desc, 0, 250 ) . ' ...' : $desc;
        
        $classPost  = ( $key == 0 ) ? 'active' : '';
        $inner_post_highlight .= <<<HTML
        <div id="inner{$key}" class="inner-post {$classPost}">
            {$image}
            <div class="mts-container">
                <div class="column">
                    <div class="date-post-hero">{$date}</div>
                    <h1><a href="{$url}">{$title}</a></h1>
                    <p>{$description}</p>
                    <a href="{$url}" class="button">Baca Selengkapnya</a>
                </div>
                <div class="column">
                    <div class="small-post">
                        <img src="" alt="small-hero" width="260" height="136">
                        <h3></h3>
                    </div>
                </div>
            </div>
        </div>
HTML;
    }
}

$inner_post_popular = '';
if ( $popular_post ) {
    foreach ( $popular_post as $key => $p_post ) {
        $image_id = get_post_thumbnail_id( $p_post->ID );
        $image    = wp_get_attachment_image( $image_id, 'full', '', [ 'class' => 'big-image' ] );
        $title    = get_the_title( $p_post->ID );
        $date     = get_the_date( 'l j, F', $p_post->ID );
        $url      = get_permalink( $p_post->ID );
        $desc     = get_the_excerpt( $p_post->ID );
        $description = strlen( $desc ) > 300 ? substr( $desc, 0, 250 ) . ' ...' : $desc;
        
        $classPost  = ( $key == 0 ) ? 'active' : '';
        $inner_post_popular .= <<<HTML
        <div id="inner{$key}" class="inner-post {$classPost}">
            {$image}
            <div class="mts-container">
                <div class="column">
                    <div class="date-post-hero">{$date}</div>
                    <h1><a href="{$url}">{$title}</a></h1>
                    <p>{$description}</p>
                    <a href="{$url}" class="button">Baca Selengkapnya</a>
                </div>
                <div class="column">
                    <div class="small-post">
                        <img src="" alt="small-hero" width="260" height="136">
                        <h3></h3>
                    </div>
                </div>
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
		<div class="hero-post">

            <div id="news" class="item-hero-post active_post">{$inner_post_news}</div>
            <div id="highlight" class="item-hero-post">{$inner_post_highlight}</div>
            <div id="popular" class="item-hero-post">{$inner_post_popular}</div>

            <div class="plagination-hero">
                <div class="mts-container">
                    <div class="row-plagination">
                        <div class="column">
                            <div data-post="news" class="item-plagination active">01. News Artikel</div>
                            <div data-post="highlight" class="item-plagination">02. Highlight Artikel</div>
                            <div data-post="popular" class="item-plagination">03. Popular Artikel</div>
                        </div>
                        <div class="plagination-line"><span></span></div>
                    </div>
                </div>
            </div>

        </div>
	</section>
HTML;

// HTML structure printing.
echo $view;
