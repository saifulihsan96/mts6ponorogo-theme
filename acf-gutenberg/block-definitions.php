<?php
// Register Blocks
// based on ACF functionality https://www.advancedcustomfields.com/resources/acf_register_block_type/

add_action( 'acf/init', function() {

	if ( function_exists( 'acf_register_block_type' ) ) {

		$supports = [
			'anchor' => true,
		];

        acf_register_block_type( [
			'name' 				=> 'block-hero',
			'title' 			=> 'Block Hero',
			'description' 		=> '',
			'render_template'   => get_stylesheet_directory() . '/acf-gutenberg/content-blocks/block-hero/block.php',
			'category' 			=> 'widgets',
			'icon'              => 'book-alt',
			'supports' 			=> $supports,
			'align' 			=> [ 'left', 'right', 'full' ],
			'keywords' 			=> [ 'block', 'hero' ],
		] );

        acf_register_block_type( [
			'name' 				=> 'block-post-grid',
			'title' 			=> 'Block Post Grid',
			'description' 		=> '',
			'render_template'   => get_stylesheet_directory() . '/acf-gutenberg/content-blocks/block-post-grid/block.php',
			'category' 			=> 'widgets',
			'icon'              => 'book-alt',
			'supports' 			=> $supports,
			'align' 			=> [ 'left', 'right', 'full' ],
			'keywords' 			=> [ 'block', 'post', 'grid' ],
		] );

        acf_register_block_type( [
			'name' 				=> 'block-post-mirror',
			'title' 			=> 'Block Post Mirror',
			'description' 		=> '',
			'render_template'   => get_stylesheet_directory() . '/acf-gutenberg/content-blocks/block-post-mirror/block.php',
			'category' 			=> 'widgets',
			'icon'              => 'book-alt',
			'supports' 			=> $supports,
			'align' 			=> [ 'left', 'right', 'full' ],
			'keywords' 			=> [ 'block', 'mirror', 'post' ],
		] );

        acf_register_block_type( [
			'name' 				=> 'block-featured',
			'title' 			=> 'Block Featured',
			'description' 		=> '',
			'render_template'   => get_stylesheet_directory() . '/acf-gutenberg/content-blocks/block-featured/block.php',
			'category' 			=> 'widgets',
			'icon'              => 'book-alt',
			'supports' 			=> $supports,
			'align' 			=> [ 'left', 'right', 'full' ],
			'keywords' 			=> [ 'block', 'featured' ],
		] );

        acf_register_block_type( [
			'name' 				=> 'block-slider-post',
			'title' 			=> 'Block Slider Post',
			'description' 		=> '',
			'render_template'   => get_stylesheet_directory() . '/acf-gutenberg/content-blocks/block-slider-post/block.php',
			'category' 			=> 'widgets',
			'icon'              => 'book-alt',
			'supports' 			=> $supports,
			'align' 			=> [ 'left', 'right', 'full' ],
			'keywords' 			=> [ 'block', 'slider', 'post' ],
		] );

        acf_register_block_type( [
			'name' 				=> 'block-two-column',
			'title' 			=> 'Block Two Column',
			'description' 		=> '',
			'render_template'   => get_stylesheet_directory() . '/acf-gutenberg/content-blocks/block-two-column/block.php',
			'category' 			=> 'widgets',
			'icon'              => 'book-alt',
			'supports' 			=> $supports,
			'align' 			=> [ 'left', 'right', 'full' ],
			'keywords' 			=> [ 'block', 'two', 'column' ],
		] );

	}
} );
