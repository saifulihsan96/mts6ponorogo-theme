<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package future
 */


// $posts_per_page = 6;
// $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args_first = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 4,
    'order'          => 'DESC',
);


$query_first = new WP_Query( $args_first );

if ( $query_first->have_posts() ) :
    echo '<h2 class="heading5 text-heading">Berita Terbaru</h2>';
    echo '<div class="grid-post-mirror">';
    while ( $query_first->have_posts() ) :
        $query_first->the_post();
        $id_post  = get_the_ID();
        $title    = get_the_title( $id_post );
        $url      = get_permalink( $id_post );

        $image_id = get_post_thumbnail_id( $id_post );
        $image    = wp_get_attachment_image( $image_id, 'full' );
        $category = category_post( $id_post );

        ?>
        <div class="item-post">
            <?php echo $image ?>
            <div class="overlay-post"></div>
            <div class="content-post">
                <?php echo $category; ?>
                <h3><a href="<?php echo $url; ?>"><?php echo $title ?></a></h3>
            </div>
        </div>
        <?php

    endwhile;
    echo '</div>';

    wp_reset_postdata();
endif;


?>

<div class="row-post">
    <div class="content-grid-post">

        <div class="section-post">

            <?php
            $args_riset = array(
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 10,
                'order'          => 'DESC',
                'tax_query'      => [
                    [
                        'taxonomy' => 'group-post',
                        'field'    => 'slug',
                        'terms'    => 'riset-teknologi',
                    ]
                ]
            );

            $query_riset = new wp_query( $args_riset );
            $term_link   = get_term_link( 'riset-teknologi', 'group-post' );
            ?>

            <div class="head-text">
                <h2 class="heading5">Riset Dan Teknologi</h2>
                <a href="<?php echo $term_link; ?>">Selengkapnya</a>
            </div>
            <div class="swiper carousel-post slider-blog">
                <div class="swiper-wrapper">
                    <?php

                    if ( $query_riset->have_posts() ) :
                        while ( $query_riset->have_posts() ) :
                            $query_riset->the_post();
                            $get_id = get_the_ID();

                            $title    = get_the_title( $get_id );
                            $url      = get_permalink( $get_id );

                            $image_id = get_post_thumbnail_id( $get_id );
                            $image    = wp_get_attachment_image( $image_id, 'full' );
                            $category = category_post( $get_id );

                            ?>

                            <div class="swiper-slide item-slide">
                                <div class="post-media">
                                    <?php echo $category; ?>
                                    <?php echo $image; ?>
                                </div>
                                <h3 class="title-post"><a href="<?php echo $url; ?>"><?php echo $title ?></a></h3>
                            </div>

                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;

                    ?>
                </div>
                <div class="swiper-button-next blog-next setArrow"></div>
                <div class="swiper-button-prev blog-prev setArrow"></div>
                <div class="swiper-scrollbar"></div>
            </div>

        </div>

        <div class="section-post">

            <?php
            $args_informasi = array(
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 6,
                'order'          => 'DESC',
                'tax_query'      => [
                    [
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => 'informasi',
                    ]
                ]
            );

            $query_informasi = new wp_query( $args_informasi );
            $term_link   = get_term_link( 'informasi', 'category' );
            ?>

            <div class="head-text">
                <h2 class="heading5">Informasi</h2>
                <a href="<?php echo $term_link; ?>">Selengkapnya</a>
            </div>

            <div class="grid-blog-post">
                <?php
                if ( $query_informasi->have_posts() ) :
                    while ( $query_informasi->have_posts() ) :
                        $query_informasi->the_post();
                        $id_post  = get_the_ID();

                        $title    = get_the_title( $id_post );
                        $url      = get_permalink( $id_post );

                        $date     = get_the_date( 'l j, F', $id_post );
                        $desc     = get_the_excerpt( $id_post );
                        $description = strlen( $desc ) > 300 ? substr( $desc, 0, 80 ) . ' ...' : $desc;

                        $image_id = get_post_thumbnail_id( $id_post );
                        $image    = wp_get_attachment_image( $image_id, 'full' );
                        $category = category_post( $id_post );
                        ?>

                        <div class="item-post">
                            <a href="<?php echo $url; ?>"><?php echo $image; ?></a>
                            <div class="content-post">
                                <?php echo $category ?>
                                <div class="date"><?php echo $date; ?></div>
                                <h3><a href="<?php echo $url ?>"><?php echo $title ?></a></h3>
                                <p><?php echo $description ?></p>
                            </div>
                        </div>

                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

        </div>

        <div class="section-post">

            <?php
            $args_event = array(
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 4,
                'order'          => 'DESC',
                'tax_query'      => [
                    [
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => 'event',
                    ]
                ]
            );

            $query_event = new wp_query( $args_event );
            $term_link   = get_term_link( 'event', 'category' );
            ?>

            <div class="head-text">
                <h2 class="heading5">Event</h2>
                <a href="<?php echo $term_link; ?>">Selengkapnya</a>
            </div>

            <div class="post-box">
                <?php
                if ( $query_event->have_posts() ) :
                    while ( $query_event->have_posts() ) :
                        $query_event->the_post();
                        $id_post  = get_the_ID();

                        $title    = get_the_title( $id_post );
                        $url      = get_permalink( $id_post );

                        $image_id = get_post_thumbnail_id( $id_post );
                        $image    = wp_get_attachment_image( $image_id, 'full' );
                        $category = category_post( $id_post );
                        ?>

                        <div class="post-box-item">
                            <a href="<?php echo $url; ?>" class="post-media"><?php echo $image; ?></a>
                            <div class="content-post">
                                <div class="box-content">
                                    <?php echo $category ?>
                                    <div class="date"><?php echo $date; ?></div>
                                    <h3><a href="<?php echo $url ?>"><?php echo $title ?></a></h3>
                                </div>
                            </div>
                        </div>

                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

        </div>

    </div>
    <div class="sidebar">
        <?php sidebar_set(); ?>
    </div>
</div>