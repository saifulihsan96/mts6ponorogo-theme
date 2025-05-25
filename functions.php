<?php
/**
 * future functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package future
 */

// define( 'FTR_VERSION', '1.0.0' );
define( 'FTR_VERSION', time() );
define( 'FTR_PATH', get_template_directory() );
define( 'FTR_URI', get_template_directory_uri() );

require FTR_PATH . '/inc/core-functions.php';
require FTR_PATH . '/inc/acf.php';
require FTR_PATH . '/acf-gutenberg/block-definitions.php';


/**
 * Enqueue scripts and styles.
 */
function future_scripts() {
	wp_enqueue_style( 'future', get_stylesheet_uri(), [], FTR_VERSION );
	wp_style_add_data( 'future', 'rtl', 'replace' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// wp_enqueue_style( 'future-style', FTR_URI . '/assets/dist/main.css', [], FTR_VERSION );
	// wp_enqueue_script( 'future-script', FTR_URI . '/assets/dist/main.bundle.js', [], FTR_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'future_scripts' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function future_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on future, use a find and replace
		* to change 'future' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'future', FTR_PATH . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		[
			'menu-1' => esc_html__( 'Primary', 'future' ),
		]
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'future_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'future_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function future_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'future_content_width', 640 );
}
add_action( 'after_setup_theme', 'future_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function future_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'future' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'future' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'future_widgets_init' );

// svg.
add_filter( 'upload_mimes', function( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
} );

/**
 * Implement the Custom Header feature.
 */
require FTR_PATH . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require FTR_PATH . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require FTR_PATH . '/inc/template-functions.php';

/**
 * Functions grid template campres.
 */
// require FTR_PATH . '/template-parts/content-filter-template.php';

/**
 * Customizer additions.
 */
require FTR_PATH . '/inc/customizer.php';

/**
 * filter content.
 */
// require FTR_PATH . '/template-parts/content-filter.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require FTR_PATH . '/inc/jetpack.php';
}


add_action( 'enqueue_block_editor_assets', 'my_admin_style' );
function my_admin_style() {
    $style_version = filemtime( FTR_PATH . '/dist/css/main.css' );
    $script_version = filemtime( FTR_PATH . '/dist/js/main.bundle.js' );

    wp_enqueue_style( 'style-global', FTR_URI . '/dist/css/main.css', array(), $style_version );
    wp_enqueue_script( 'script-global', FTR_URI . '/dist/js/main.bundle.js', array(), $script_version );
}


function sidebar_set() {
	$text_head    = get_field( 'text_head', 'option' );
	$sidebar_post = get_field( 'sidebar_post', 'option' );
	echo '<div class="text-head heading5">' . $text_head . '</div>';
	echo '<div class="sidebar-single">';
	if ( $sidebar_post ) {
		foreach ( $sidebar_post as $post ) {

			$get_id = $post->ID;
			$title  = get_the_title( $get_id );
			$url    = get_permalink( $get_id );
			$category = category_post( $get_id );

			?>
			<div class="item-post-sidebar">
				<?php echo $category; ?>
				<h3><a href="<?php echo $url; ?>"><?php echo $title; ?></a></h3>
			</div>
			<?php

		}
	}
	echo '</div>';
}


function head_title( $template ) {
	$title2 = '';
	$title  = '';

	if ( $template == 'archive' ) {
		$archive     = get_the_archive_title();
		$title_parts = explode( ':', $archive );

		$title  .= $title_parts[1];
		$title2 .= $title_parts[1];
	} 
	if ( $template == 'page' ) {
		$title  .= get_the_title();
		$title2 .= get_the_title();
	}
	if ( $template == 'search' ) {
		$title  .= 'Search Results for: <span>' . get_search_query() . '</span>';
		$title2 .= get_search_query();

	}
	?>
	<div class="head-page">
		<div class="mts-container">
			<h1><?php echo $title; ?></h1>
			<div class="nav-page">
				<a href="/">Home</a>
				<span><?php echo $title2; ?></span>
			</div>
		</div>
	</div>
	<?php
}


function category_post( $id ) {
	$item_category = '';
	$category = get_the_category( $id );

	if ( $category ) {
		foreach ( $category as $cat ) {
			$id_cat    = $cat->term_id;
			$name_cat  = $cat->name;
			$url_cat   = get_category_link( $id_cat );
			$class     = '';

			if ( $cat->slug == 'event' ) {
				$class .= 'red'; 
			}
			if ( $cat->slug == 'informasi' ) {
				$class .= 'blue'; 
			}
			if ( $cat->slug == 'news' ) {
				$class .= 'green'; 
			}

			$item_category .= '<a href="' . $url_cat . '" class="item-category ' . $class . '">' . $name_cat .  '</a>';
		}
	}

	$html = '<div class="category-post">' . $item_category . '</div>';
	return $html;
}

add_filter('show_admin_bar', function($show) {
  if (is_page('cek-kelulusan')) {
    return false;
  }
  return $show;
});


function check_passed() {
	$nisn = isset($_POST['nisn']) ? sanitize_text_field($_POST['nisn']) : '';
	$password = isset($_POST['password']) ? sanitize_text_field($_POST['password']) : '';
	$post_id = isset($_POST['post_id']) ? sanitize_text_field($_POST['post_id']) : '';

	$data = get_field('data_siswa', $post_id);

	$ttlField = "";
	$nisnField = "";
	$nameField = "";
	$status = "";

	$passed = true;
	$login = false;

	$responError = "";
	$nisnError = false;
	$passError = false;

	foreach ($data as $key => $value) {
		if ($value['nisn'] == $nisn && $value['password'] == $password) {
			$login = true;
			$status = $value['status'];
			$nameField = $value['nama'];
			$nisnField = $value['nisn'];
			$ttlField = $value['tempat_tanggal_lahir'];

			if ($status === "Tidak Lulus") {
				$passed = false;
			}
			break;
		} else {
			$login = false;
		}
	}

	if (!$login) {
    $nisnMatch = false;
    foreach ($data as $value) {
			if ($value['nisn'] == $nisn) {
				$nisnMatch = true;
				if ($value['password'] != $password) {
					$passError = true;
					$responError = "Password salah";
				}
				break;
			}
    }

    if (!$nisnMatch) {
			$nisnError = true;
			$responError = "NISN tidak terdaftar";
    }
	}

	$homeUrl = get_template_directory_uri();
	$checkPassed = $passed ? "" : "no-passed";
	$statusText = $passed ? "Selamat Anda Dinyatakan Lulus" : "Maaf Anda Dinyatakan Tidak Lulus";
	$content = <<<HTML
	<div class="success-login">
		<div class="success-header {$checkPassed}">
			<div id="lottie-animation"></div>
			<div id="lottie-animation-2"></div>
		</div>
		<div class="status-text {$checkPassed}">{$statusText}</div>
		<div class="success-content">
			<div class="item">
				<div class="label">Nama</div>
				<h2>{$nameField}</h2>
			</div>
			<div class="item">
				<div class="label">NISN</div>
				<div class="nomer-nisn">{$nisnField}</div>
			</div>
			<div class="item">
				<div class="label">Status</div>
				<p>{$status}</p>
			</div>
			<div class="item">
				<div class="label">TTL</div>
				<p>{$ttlField}</p>
			</div>
		</div>
		<div class="success-footer">
			<img src="https://madsanampo.sch.id/wp-content/uploads/2024/01/Logo-mts.svg" alt="logo">
			<div class="text">Madrasah Tsanawiyah Negeri 6 Tahun Ajaran 2024/2025</div>
		</div>
	</div>

	<script>
		const containerLottie = document.getElementById("lottie-animation");
		const containerLottie2 = document.getElementById("lottie-animation-2");
		const anim = lottie.loadAnimation({
			container: containerLottie,
			renderer: "svg",
			loop: true,
			autoplay: true,
			path: "{$homeUrl}/app-passed/assets/animation.json"
		});
		const anim2 = lottie.loadAnimation({
			container: containerLottie2,
			renderer: "svg",
			loop: false,
			autoplay: true,
			path: "{$homeUrl}/app-passed/assets/no2.json"
		});
		anim.setSpeed(0.4);
	</script>
HTML;

	$response = [
		'login'  => $login,
		'content' => $content,
		'responError' => $responError,
		'nisnError' => $nisnError,
		'passError' => $passError
	];
	wp_send_json($response);
	exit;
}
add_action('wp_ajax_check_passed', 'check_passed');
add_action('wp_ajax_nopriv_check_passed', 'check_passed');

add_action('add_meta_boxes', function () {
	global $post;
	$post_type = get_post_type($post);

	if ($post_type === 'data-kelulusan') {
		add_meta_box(
			'csv_import_box',
			'Import Data Siswa',
			'csv_import_callback',
			'data-kelulusan',
			'side',
			'default'
		);
	}
});

function csv_import_callback($post) {
	?>
	<input type="file" id="csv_file_input" accept=".csv" style="margin-bottom: 10px;">
	<button type="button" class="button button-primary" id="import_csv_button">Import CSV</button>
	<p id="import_status" style="margin-top: 10px;"></p>
	<?php
}

add_action('admin_enqueue_scripts', function ($hook) {
	if ($hook === 'post.php' || $hook === 'post-new.php') {
		wp_enqueue_script('csv-import-script', get_template_directory_uri() . '/js/csv-import.js', ['jquery'], null, true);
		wp_localize_script('csv-import-script', 'csv_import', [
			'ajax_url' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('csv_import_nonce')
		]);
	}
});

add_action('wp_ajax_import_csv_data', 'handle_import_csv_data');
function handle_import_csv_data() {
	if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'csv_import_nonce')) {
		wp_send_json_error(['message' => 'Nonce tidak valid']);
	}

	if (!isset($_POST['post_id']) || !isset($_FILES['csv'])) {
		wp_send_json_error(['message' => 'Data tidak lengkap']);
	}

	$post_id = intval($_POST['post_id']);
	$csv_file = $_FILES['csv']['tmp_name'];

	if (!file_exists($csv_file)) {
		wp_send_json_error(['message' => 'File tidak ditemukan']);
	}

	$handle = fopen($csv_file, 'r');
  if (!$handle) {
    return json_encode(['error' => 'Tidak bisa membuka file']);
  }

  $delimiter = ';';
  $header = fgetcsv($handle, 0, $delimiter);
  if (!$header) {
    return json_encode(['error' => 'Tidak bisa baca header CSV']);
  }

  $header = array_map('trim', $header);

  $data = [];
  while (($row = fgetcsv($handle, 0, $delimiter)) !== false) {
    $row = array_map('trim', $row);
    if (count($row) !== count($header)) {
        continue;
    }
    $data[] = array_combine($header, $row);
  }

  fclose($handle);
	delete_field('data_siswa', $post_id);
	$repeater_data = [];

	foreach ($data as $row) {
		$password = trim($row['password']);
    if (empty($password)) {
        $password = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
    }

		$repeater_data[] = [
			'nama' => sanitize_text_field($row['nama']),
			'tempat_tanggal_lahir' => sanitize_text_field($row['ttl']),
			'nisn' => sanitize_text_field($row['nisn']),
			'status' => sanitize_text_field($row['status'] == 'Lulus' ? 'lulus' : 'tidak-lulus'),
			'password' => sanitize_text_field($password),
		];
	}

	update_field('data_siswa', $repeater_data, $post_id);
	wp_send_json_success(['message' => 'Import berhasil']);
}

function convert_csv_path_to_json($csv_path) {
  if (!file_exists($csv_path)) {
    return json_encode(['error' => 'File tidak ditemukan']);
  }

  $handle = fopen($csv_path, 'r');
  if (!$handle) {
    return json_encode(['error' => 'Tidak bisa membuka file']);
  }

  $delimiter = ';';
  $header = fgetcsv($handle, 0, $delimiter);
  if (!$header) {
    return json_encode(['error' => 'Tidak bisa baca header CSV']);
  }

  $header = array_map('trim', $header);

  $data = [];
  while (($row = fgetcsv($handle, 0, $delimiter)) !== false) {
    $row = array_map('trim', $row);
    if (count($row) !== count($header)) {
        continue;
    }
    $data[] = array_combine($header, $row);
  }

  fclose($handle);
  return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

add_action('add_meta_boxes', function () {
	global $post;
	$post_type = get_post_type($post);

	if ($post_type === 'data-kelulusan') {
		add_meta_box(
			'csv_export_box',
			'Export Data Siswa',
			'export_repeater_callback',
			'data-kelulusan',
			'side',
			'default'
		);
	}
});

function export_repeater_callback($post) {
	?>
	<form method="post" action="" target="_blank">
		<input type="hidden" name="export_repeater_nonce" value="<?php echo wp_create_nonce('export_repeater_nonce'); ?>">
		<input type="hidden" name="post_id" value="<?php echo $post->ID; ?>">
		<button type="submit" name="export_repeater" class="button button-secondary">Export ke CSV</button>
	</form>
	<?php
}

add_action('admin_init', function () {
	if (isset($_POST['export_repeater'])) {
		if (!isset($_POST['export_repeater_nonce']) || !wp_verify_nonce($_POST['export_repeater_nonce'], 'export_repeater_nonce')) {
				wp_die('Nonce tidak valid');
		}

		$post_id = intval($_POST['post_id']);
		if (!$post_id) {
				wp_die('Post ID tidak valid');
		}

		$data_siswa = get_field('data_siswa', $post_id);
		if (empty($data_siswa)) {
				wp_die('Data kosong');
		}

		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=data_siswa_export_' . $post_id . '.csv');

		$output = fopen('php://output', 'w');
		fputcsv($output, ['Nama', 'Tempat & Tanggal Lahir', 'NISN', 'Status', 'Password']);

		foreach ($data_siswa as $row) {
			fputcsv($output, [
				$row['nama'],
				$row['tempat_tanggal_lahir'],
				$row['nisn'],
				$row['status'],
				$row['password'],
			]);
		}

		fclose($output);
		exit;
	}
});
