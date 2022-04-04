<?php
/**
 * Skill Test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Skill_Test
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function skill_test_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Skill Test, use a find and replace
		* to change 'skill-test' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'skill-test', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'skill-test' ),
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
			'skill_test_custom_background_args',
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
add_action( 'after_setup_theme', 'skill_test_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function skill_test_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'skill_test_content_width', 640 );
}
add_action( 'after_setup_theme', 'skill_test_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skill_test_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'skill-test' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'skill-test' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'skill_test_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function skill_test_scripts() {
	wp_enqueue_style( 'bootstrap5', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'skill-test-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'skill-test-style', 'rtl', 'replace' );

	wp_enqueue_script( 'skill-test-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap5', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'swiper-bundle', get_template_directory_uri() . '/assets/swiper/swiper-bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/isotope-layout/isotope.pkgd.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skill_test_scripts' );

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

// Redirecting user if ip starts with 77.29
function redirecting_users() {
	
	global $pagenow;

	$api_response = wp_remote_get('https://api.ipify.org');
	$api_response_body = wp_remote_retrieve_body($api_response);
	
	$nums = explode(".", $api_response_body);
	$api_num = $nums[0]. "." .$nums[1];

	if( 'wp-login.php' == $pagenow && $api_num == 77.29) {
		wp_safe_redirect(site_url());
		exit;
	} 
}
add_action('init', 'redirecting_users');

// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Projects', 'text_domain' ),
		'name_admin_bar'        => __( 'Projects', 'text_domain' ),
		'archives'              => __( 'Projects Archives', 'text_domain' ),
		'attributes'            => __( 'Projects Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Project:', 'text_domain' ),
		'all_items'             => __( 'All Projects', 'text_domain' ),
		'add_new_item'          => __( 'Add New Project', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Project', 'text_domain' ),
		'edit_item'             => __( 'Edit Project', 'text_domain' ),
		'update_item'           => __( 'Update Project', 'text_domain' ),
		'view_item'             => __( 'View Project', 'text_domain' ),
		'view_items'            => __( 'View Projects', 'text_domain' ),
		'search_items'          => __( 'Search Project', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Project', 'text_domain' ),
		'description'           => __( 'Projects', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail' ),
		'taxonomies'            => array( 'project_type' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'show_in_rest' 			=> true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'projects', $args );

}
add_action( 'init', 'custom_post_type', 0 );

// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Project Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Project Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Project Type', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels' => $labels,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
	);
	register_taxonomy( 'project_type', array( 'projects' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );

function enqueue_ajax_scripts() {
	wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/admin-ajax.js', array('jquery') );
	wp_localize_script( 'ajax-script', 'ajax_object', array( 
	'restURL' => rest_url(),
	'restNonce' => wp_create_nonce('wp_rest')
));
}
add_action( 'wp_enqueue_scripts', 'enqueue_ajax_scripts' );

add_action( 'rest_api_init', function () {
    //Path to REST route and the callback function
    register_rest_route( 'wp-json/wp/v2', '/projects/', array(
            'methods' => 'POST', 
            'callback' => 'get_architecture_posts' 
    ) );
});

function get_architecture_posts($request) {
	
	$project_type = $request['projectType'];	

	if ( is_user_logged_in() ) {
		$args = array( 
			'post_type' => 'projects',
			'posts_per_page' => 6, 
			'tax_query' => array(
				array(
					'taxonomy' => 'project_type',
					'field'    => 'slug',
					'terms'    => $project_type,
				),
			),
		);
	 } else {
		$args = array( 
			'post_type' => 'projects',
			'posts_per_page' => 3, 
			'tax_query' => array(
				array(
					'taxonomy' => 'project_type',
					'field'    => 'slug',
					'terms'    => $project_type,
				),
			),	
		); 
	 }
	
	$query = new WP_Query($args);
	$ind = 0;
	while ( $query->have_posts() ) :
		$query->the_post();
		$response[$ind]['id'] = get_the_id();
		$response[$ind]['title'] = get_the_title();
		$response[$ind]['link'] = get_permalink();
		$ind++;
	endwhile;

	return $response;
}
add_action('wp_ajax_nopriv_get_architecture_posts', 'get_architecture_posts');
add_action('wp_ajax_get_architecture_posts', 'get_architecture_posts');


function hs_give_me_coffee() {

$api_response = wp_remote_get('https://coffee.alexflipnote.dev/random.json');
$api_response_body = wp_remote_retrieve_body($api_response);
return $api_response_body;

}

