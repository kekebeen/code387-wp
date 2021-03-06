<?php
/**
 * code387 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package code387
 */

if ( ! function_exists( 'code387_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function code387_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on code387, use a find and replace
	 * to change 'code387' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'code387', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'code387' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
endif;
add_action( 'after_setup_theme', 'code387_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function code387_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'code387_content_width', 640 );
}
add_action( 'after_setup_theme', 'code387_content_width', 0 );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function code387_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'code387' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'code387' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'code387_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function code387_scripts() {
	wp_enqueue_style( 'code387-style', get_stylesheet_uri() );
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/custom.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'code387_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// add custom post type with custom fields
// Register Custom Post Type
function register_portfolio_type() {

	$labels = array(
		'name'                  => _x( 'Portfolios', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Portfolio', 'text_domain' ),
		'name_admin_bar'        => __( 'Portfolio', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
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
		'label'                 => __( 'Portfolio', 'text_domain' ),
		'description'           => __( 'Portfolio items', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'excerpt', 'thumbnail', 'custom-fields', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'register_portfolio_type', 0 );

//show custom post type in main loop without args
// Show posts of 'post', 'page' and 'movie' post types on home page
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'post_type', array( 'portfolio'));
  return $query;
}

// hide acf menu in admin dashboard
add_filter('acf/settings/show_admin', '__return_false');
// include acf lite for speed
if( ! class_exists('Acf') )
{
	define( 'ACF_LITE' , true );
	include_once('advanced-custom-fields/acf.php' );
}

// add work custom thumbnail
add_image_size( 'work_thumb', 306, 306, true );

//remove jquery migrate if using jquery
add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

function remove_jquery_migrate( &$scripts)
{
    if(!is_admin())
    {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
    }
}

//remove meta tags from head
function action_remove_wp_head_extras() {
  remove_action( 'wp_head', 'feed_links_extra', 3 ); // Remove the links to the extra feeds such as category feeds
  remove_action( 'wp_head', 'feed_links', 2 ); // Remove the links to the general feeds: Post and Comment Feed
  remove_action( 'wp_head', 'rsd_link' ); // Remove the link to the Really Simple Discovery service endpoint, EditURI link
  remove_action( 'wp_head', 'wlwmanifest_link' ); // Remove the link to the Windows Live Writer manifest file.
  remove_action( 'wp_head', 'index_rel_link' ); // Remove Index link
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // Remove Prev link
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // Remove Start link
  remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Remove relational links for the posts adjacent to the current post.
  remove_action( 'wp_head', 'wp_generator' ); // Remove the XHTML generator that is generated on the wp_head hook, WP version
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
  remove_action( 'wp_head', 'rel_canonical' );
  remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
}
add_action( 'init', 'action_remove_wp_head_extras' );

//emoji junk
function disable_wp_emojicons() {
 // all actions related to emojis
 remove_action('admin_print_styles', 'print_emoji_styles');
 remove_action('wp_head', 'print_emoji_detection_script', 7);
 remove_action('admin_print_scripts', 'print_emoji_detection_script');
 remove_action('wp_print_styles', 'print_emoji_styles');
 remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
 remove_filter('the_content_feed', 'wp_staticize_emoji');
 remove_filter('comment_text_rss', 'wp_staticize_emoji');
 // filter to remove TinyMCE emojis
 add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce');
}
add_action('init', 'disable_wp_emojicons');

//embed junk on front
function crunchify_stop_loading_wp_embed_and_jquery() {
	if (!is_admin()) {
		wp_deregister_script('wp-embed');
	}
}
add_action('init', 'crunchify_stop_loading_wp_embed_and_jquery');
