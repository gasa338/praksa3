<?php
/**
 * praksa2 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package praksa2
 */


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'praksa2_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function praksa2_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on praksa2, use a find and replace
		 * to change 'praksa2' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'praksa2', get_template_directory() . '/languages' );

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
			array(
				'header-menu' => esc_html__( 'Header Menu', 'praksa2' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'praksa2' ),
			)
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
				'praksa2_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'praksa2_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function praksa2_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'praksa2_content_width', 640 );
}
add_action( 'after_setup_theme', 'praksa2_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
/*
function praksa2_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'praksa2' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'praksa2' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'praksa2_widgets_init' );
*/
/**
 * Enqueue scripts and styles.
 */
function praksa2_scripts() {
	wp_enqueue_style( 'praksa2-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'praksa2-style', 'rtl', 'replace' );

	wp_enqueue_script( 'praksa2-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'praksa2_scripts' );
/* ========================================================================================== */
/*
* Composer autoload
*/
require_once get_template_directory() .'/vendor/autoload.php';
/**
* Twig init
*/
require_once get_template_directory() .'/inc/TwigInit.php';
// Singleton pattern for init twig
$instance = TwigInit::getInit();
$dir = $instance->getDir();
$loader = $instance->loadTwig();
$twig = $instance->initEnv();

function crb_load() {
	require_once(  ABSPATH . 'wp-content/plugins/carbon-fields/vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
 }
add_action( 'after_setup_theme', 'crb_load' );

/* =========================================================================================== */

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Load JS and CSS
 */

function komo_load_stylesheet(){
    //wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', false, '1.0.0', 'all');
    
	wp_enqueue_style( 'breakpoints', get_template_directory_uri() . '/assets/css/breakpoints.css', false, '1.0.0', 'all');
    wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/assets/owlcarousel/owl.carousel.min.css', false, '2.3.4', 'all');
    wp_enqueue_style( 'owl-carousel-theme', get_template_directory_uri() . '/assets/owlcarousel/owl.theme.default.min.css', false, '2.3.4', 'all');

    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css', false, '4.5.3', 'all');

    wp_dequeue_script('jquery');
    wp_deregister_script('jquery');

    wp_enqueue_script('jquery', 'http://code.jquery.com/jquery.min.js', array(), '1.11.1', false);
    wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array(), '1.12.9', false);
    wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array(), '4.0.0', false);
    wp_enqueue_script('owl-carousel-js', get_template_directory_uri() . '/assets/owlcarousel/owl.carousel.min.js', array(), '2.3.4', false);

    wp_enqueue_script('greensock-gsap', get_template_directory_uri() . '/assets/js/greensock/gsap.min.js', array(), '3.5.1', false);
    wp_enqueue_script('greensock-ScrollTrigger', get_template_directory_uri() . '/assets/js/greensock/ScrollTrigger.min.js', array(), '3.5.1', false);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', false);
}

add_action('wp_enqueue_scripts', 'komo_load_stylesheet');

/**
 * Disable text editor from home page
 */
/*
add_action( 'admin_init', 'komoyu_hide_editor_from_homepage' );
 
function komoyu_hide_editor_from_homepage() {
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    if( !isset( $post_id ) ) return; 
 
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
     
    if($template_file == 'templates/homepage.php' and $post_id == 20){ // edit the template name
        remove_post_type_support('page', 'editor');
    }
}
*/
/**
 * add custom column to Proizvodi
 */
function komoyu_add_custom_column_proizvodi( $columns ){

	$columns = array(
		"cb" => "<input type='checkbox' />",
		"title" => "Title",
		"custom_category" => "Category",
		"date" => "Date"
	);

	return $columns;
}
add_action( 'manage_proizvodi_posts_columns', 'komoyu_add_custom_column_proizvodi' );

function komoyu_custom_column_data_proizvodi( $column, $post_id ) { // adding data

	switch ($column){
		case 'custom_category':
			$term_list = get_the_terms($post_id, 'proizvodi_cat');
			$types ='';
			foreach($term_list as $term_single) {
				$types .= $term_single->slug.', ';
			}
			$custom_category = rtrim($types, ', ');
			echo "<b>".$custom_category."</b>";
			break;
	}
}

add_action( 'manage_proizvodi_posts_custom_column', 'komoyu_custom_column_data_proizvodi', 10, 2 );

// sort custom columns
function komoyu_custom_column_sortable( $columns ) {

	$columns['custom_category'] = 'custom_category';

	return $columns;
}

add_filter( "manage_edit-proizvodi_sortable_columns", "komoyu_custom_column_sortable" );


/**
 * include WALKER CLASS
 */
require get_template_directory() . '/inc/walker.php';


require get_template_directory() . '/inc/carbon-fields.php';

/**
 * Footer options
 */


// Copyright
function komoyu_copyright_option() {
    register_sidebar( array(
        'name' => __( 'Footer Copyright area' ),
        'id' => 'footer-copyright',
        'description' => __( 'Appears in the footer' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

	register_sidebar( array(
        'name' => __( 'Adresa' ),
        'id' => 'footer-adresa',
        'description' => __( 'Appears in the footer' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'komoyu_copyright_option' );


/** Dodavanje mogucnosti za upload SVG fajlova */

function codeless_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
    $new_filetypes['svgz'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_filter('upload_mimes', 'codeless_file_types_to_uploads');

