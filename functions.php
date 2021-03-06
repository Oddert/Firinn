<?php
/**
 * firinn functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package firinn
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'firinn_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function firinn_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on firinn, use a find and replace
		 * to change 'firinn' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'firinn', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'firinn' ),
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
				'firinn_custom_background_args',
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
add_action( 'after_setup_theme', 'firinn_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function firinn_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'firinn_content_width', 640 );
}
add_action( 'after_setup_theme', 'firinn_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function firinn_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'firinn' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'firinn' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'firinn_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function firinn_scripts() {
	wp_enqueue_style( 'firinn-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'firinn-style', 'rtl', 'replace' );

	wp_enqueue_script( 'firinn-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'firin-rolecall', get_template_directory_uri() . '/js/rolecall.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'firinn_scripts' );

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
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/**
 * WooCommerce Hook Overrides
 */

 


remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
// remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
// add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

function firinn_shop_loop_item_title ( $tabs ) {
	global $product;
	$author = $product->get_attribute( 'author' );

	echo '<div class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">'
		.'<h2>' 
			. get_the_title() 
		. '</h2>'
		. '<p>'
			. $author
		. '</p>' 
	. '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

add_action( 'woocommerce_shop_loop_item_title', 'firinn_shop_loop_item_title', 10 );



/**
 * Product Summary Box.
 *
 * @see woocommerce_template_single_title()
 * @see woocommerce_template_single_rating()
 * @see woocommerce_template_single_price()
 * @see woocommerce_template_single_excerpt()
 * @see woocommerce_template_single_meta()
 * @see woocommerce_template_single_sharing()
 * 
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary', 'firinn_template_single_author', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

function firinn_template_single_author () {
	if ( ! defined('ABSPATH' ) ) {
		exit;
	}
	global $product;
	$author = $product->get_attribute( 'author' );
	echo '<p class="product_author">' . $author . '</p>';
}


function firinn_custom_comment_fields( $fields ) {
	$commenter = wp_get_current_commenter();

	$required = get_option( 'require_name_email' );
	$aria_req = $required ? ' aria-required="true"' : '';

	// unset($fields['email']);
	
	$fields['author'] = '<p class="comment-form-author" data-oddert="hellow from functions php this is author">'
		.'<label for="author" class="screen-reader-text">' . __( 'author' ) . '</label>'
		.'<input id="author" name="author" type="text" value="' .  esc_attr( $commenter[ 'comment_author' ] ) . '" placeholder="Your Name"' . $aria_req . ' />'
		.( $required ? '<span class="required" title="required">*</span>' : '' )
	.'</p>';

	$fields['email'] = '<p class="comment-form-email" data-oddert="hellow from functions php this is email">'
		.'<label for="email" class="screen-reader-text">' . __( 'Email' ) . '</label>'
		.'<input id="email" name="email" type="email" value="' .  esc_attr( $commenter[ 'comment_author_email' ] ) . '" placeholder="Your email"' . $aria_req . ' />'
		.( $required ? '<span class="required" title="required">*</span>' : '' )
	.'</p>';

	// $fields['cookies'] = '<p class="comment-form-cookies-consent">'
	// 	.'<label for="wp-comment-cookies-consent checkmark__conatiner">'
	// 		.'Save my name, email, and website in this browser for the next time I comment.'
	// 		.'<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" /> '
	// 		.'<span class="checkmark"></span>'
	// 	.'</label>'
	// .'</p>';
	$fields['cookies'] = '<p class="comment-form-cookies-consent"><label class="checkbox_container">
	Save my name, email, and website in this browser for the next time I comment.
  <input type="checkbox" checked="checked">
  <span class="checkmark"></span>
</label></p>';

	return $fields;
}

add_filter( 'comment_form_fields', 'firinn_custom_comment_fields' );