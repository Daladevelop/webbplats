<?php

$daladevelop = array(
    'version' => daladevelop_is_development() ? time() : '1.0.0'
);

// Require modules.
require_once( 'app/custom-post-types.php' );
require_once( 'app/advanced-custom-fields.php' );
require_once( 'app/menus.php' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 570; /* pixels */
}

if ( ! function_exists( 'daladevelop_setup' ) ) :
function daladevelop_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form'
    ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => 'Huvudmeny',
	) );

    // Enable support for HTML5 markup.
    /*add_theme_support( 'post-formats', array(
		'aside',
        'image',
        'link',
        'quote',
        'video'
	) );*/

    // Actions and filters.
    add_action( 'widgets_init', 'daladevelop_widgets_init' );
    add_action( 'wp_enqueue_scripts', 'daladevelop_scripts' );
    add_filter( 'wp_title', 'daladevelop_front_page_title' );

    add_filter( 'acf/settings/save_json', 'daladevelop_acf_json_save_point' );

    if ( ! daladevelop_is_development() ) {
        // Hide ACF admin link.
        add_filter( 'acf/settings/show_admin', '__return_false' );
        add_filter( 'acf/settings/load_json', 'daladevelop_acf_json_load_point' );
    }

    if ( function_exists( 'acf_add_options_page' ) ) {
        acf_add_options_page( array(
            'page_title' => 'Temainställningar',
            'menu_title' => 'Temainställningar',
            'menu_slug' => 'theme-mockfjardshus-settings',
            'capability' => 'edit_posts',
            'redirect' 	=> false
        ) );
    }
}
endif;
add_action( 'after_setup_theme', 'daladevelop_setup' );

function daladevelop_widgets_init() {
	register_sidebar( array(
		'name'          => 'Off-canvas meny',
		'id'            => 'offcanvas',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}

function daladevelop_scripts() {
    global $daladevelop;

    wp_enqueue_style( 'google-fonts-open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,800,800italic,700italic,600italic,600,300italic' );
    wp_enqueue_style( 'daladevelop-style', get_stylesheet_directory_uri() . '/assets/css/main.css', array( 'google-fonts-open-sans' ), $daladevelop[ 'version' ] );

    if ( daladevelop_is_development() ) {
        wp_enqueue_script( 'daladevelop-script', get_stylesheet_directory_uri() . '/assets/js/require.js', array( 'jquery' ), '2.1.18', true );
        add_filter( 'clean_url', 'daladevelop_add_main_attribute', 11, 1 );
    } else {
        wp_enqueue_script( 'daladevelop-script', get_stylesheet_directory_uri() . '/assets/js/main.min.js', array( 'jquery' ), $daladevelop[ 'version' ], true );
    }

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function daladevelop_add_main_attribute( $url ) {
    if ( strpos( $url, 'require.js' ) === false ) {
        return $url;
    }

    return "$url' data-main='" . get_stylesheet_directory_uri() . '/assets/js/main';
};

function daladevelop_front_page_title( $title ) {
    if ( is_front_page() ) {
        $title = get_bloginfo( 'name' );
    }

    return $title;
}

function daladevelop_events_archive_action( $query ) {
    if ( !$query->is_admin() && $query->is_post_type_archive( 'evenemang' ) && $query->is_main_query() ) {
        $query->set( 'meta_key', 'date' );
        $query->set( 'meta_query', array(
            array(
                'key' => 'date',
                'value' => date( 'Y-m-d' ),
                'type' => 'DATE',
                'compare' => '>='
            )
        ) );
        $query->set( 'orderby', 'meta_value' );
        $query->set( 'order', 'ASC' );
        $query->set( 'posts_per_page', -1 );
    }
}
add_action( 'pre_get_posts', 'daladevelop_events_archive_action' );

function daladevelop_is_development() {
    return defined( 'WP_LOCAL_DEV' ) && WP_LOCAL_DEV;
}