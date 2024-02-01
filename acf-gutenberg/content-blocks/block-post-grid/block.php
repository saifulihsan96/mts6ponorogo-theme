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
$class_name = 'block-post-grid';

if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}


$item_post = '';
$select    = get_field( 'select_post' );
$grids     = get_field( 'post_custom' );

$head_text = get_field( 'name_section' );
$link      = get_field( 'link_next' );
$link_next = ( $link ) ? '<a href="/" class="next">Selengkapnya</a>' : '';

if ( $select == 'dynamis' ) {

    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 4,
        'order'          => 'DESC',
        'orderby'        => 'date'
    ];

    $query = new wp_query( $args );
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $id_post  = get_the_ID();
            $title    = get_the_title( $id_post );
            $url      = get_permalink( $id_post );

            $date     = get_the_date( 'l j, F', $p_post );
            $desc     = get_the_excerpt( $id_post );
            $description = strlen( $desc ) > 300 ? substr( $desc, 0, 120 ) . ' ...' : $desc;

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

            $item_post .= <<<HTML
            <a href="{$url}" class="item-post">
                {$image}
                <div class="content-post">
                    <div class="category {$class}">{$name_cat}</div>
                    <div class="date">{$date}</div>
                    <h3>{$title}</h3>
                    <p>{$description}</p>
                </div>
            </a>
HTML;

        }
    }

}

if ( $select == 'custom' ) {
    if ( $grids ) {
        foreach ( $grids as $grid ) {
            $id_post  = $grid->ID;
            $title    = get_the_title( $id_post );
            $url      = get_permalink( $id_post );

            $date     = get_the_date( 'l j, F', $id_post );
            $desc     = get_the_excerpt( $id_post );
            $description = strlen( $desc ) > 300 ? substr( $desc, 0, 120 ) . ' ...' : $desc;

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

            $item_post .= <<<HTML
            <a href="{$url}" class="item-post">
                {$image}
                <div class="content-post">
                    <div class="category {$class}">{$name_cat}</div>
                    <div class="date">{$date}</div>
                    <h3>{$title}</h3>
                    <p>{$description}</p>
                </div>
            </a>
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

            <div class="text-head">
                <h2 class="heading5">{$head_text}</h2>
                {$link_next}
            </div>
            <div class="grid-post">
                {$item_post}
            </div>

        </div>
	</section>
HTML;

// HTML structure printing.
echo $view;
