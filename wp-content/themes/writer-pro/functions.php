<?php 

/**
 * writer Free functions and definitions.
 *
 * 
 */

require_once(get_theme_file_path("/inc/tgm.php"));
require_once(get_theme_file_path("/inc/csf.php"));

if ( site_url() == "http://wpkanak.com" ) {
    define( "VERSION", time() );
} else {
    define( "VERSION", wp_get_theme()->get( "Version" ) );
}

function writer_theme_setup(){

    // Text_domain
	load_theme_textdomain( 'writer-pro' );

	// Featured image
	add_theme_support( 'post-thumbnails' );

	 /*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array( 
           'height'   => '250',
           'width'    => '250',
           'flex-width' => true,

	) );

    // Add default content width
     if ( ! isset( $content_width ) ) $content_width = 900;

   // Add Custom header
	add_theme_support( 'custom-header');
   
   // Add Custom Background
    add_theme_support( 'custom-background'); 

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
  add_theme_support('html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'audio',
                'video',
                'link',
            )
        );


    // This theme styles the visual editor to resemble the theme style,
	// specifically font, colors, and column width.
	
	add_editor_style( "/assets/css/editor-style.css" );
	// add_editor_style( array( 'assets/css/editor-style.css' ) );


	// This theme uses wp_nav_menu() in two locations.
	register_nav_menu( 'topmenu', __( 'Top Menu','writer-pro' ) );
    register_nav_menu( 'footermenu', __( 'Footer Menu','writer-pro' ) );

    remove_theme_support( 'widgets-block-editor' );
}

add_action( 'after_setup_theme','writer_theme_setup' );

	/*
	*Enable support for Post Formats.
	*/ 

function writer_enqueue_rigister(){

	// styles_enqueue 

    // Google fonts
    wp_enqueue_style( 'writer-fonts', writer_fonts_url(), array(), '1.0.0' );

	// Bootstrap-CSS
	wp_enqueue_style( 'bootstrap-css',get_theme_file_uri( '/assets/css/bootstrap.min.css' ), null, '1.0.0' );

	// fontawesome-CSS
	wp_enqueue_style( 'fontawesome-css',get_theme_file_uri( '/assets/css/font-awesome.min.css' ), null, '1.0.0' );

	// main-CSS
	wp_enqueue_style( 'main-css',get_theme_file_uri( '/assets/css/main.css' ), null, '1.0.0' );

    // main-min-CSS
    wp_enqueue_style( 'custom-css',get_theme_file_uri( '/assets/css/custom.css' ), null, '1.0.0' );

	// Responsive-CSS
	wp_enqueue_style( 'responsive-css',get_theme_file_uri( '/assets/css/responsive.css' ), null, '1.0.0' );

    // Style-CSS
    wp_enqueue_style( 'writer-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	


     wp_enqueue_script( 'main-min', get_theme_file_uri( '/assets/js/jquery-1.11.2.min.js' ), array( 'jquery' ), '1.0', true );

    // jpanelmenu
    wp_enqueue_script( 'jpanelmenu-min', get_theme_file_uri( '/assets/js/vendor/jquery.jpanelmenu.min.js' ), array( 'jquery' ), '1.0', true ); 

     // modernizr
    wp_enqueue_script( 'modernizr', get_theme_file_uri( '/assets/js/vendor/modernizr.custom.32229-2.8-respondjs-1-4-2.js' ), array( 'jquery' ), '1.0', false );

    // Bootstrap-JS
    wp_enqueue_script( 'bootstrap-min', get_theme_file_uri( '/assets/js/vendor/bootstrap.min.js' ), array( 'jquery' ), '1.0', true );

    // fastclick
    wp_enqueue_script( 'fastclick-min', get_theme_file_uri( '/assets/js/vendor/fastclick.min.js' ), array( 'jquery' ), '1.0', true );

	 //main-JS 
	 wp_enqueue_script( 'main', get_theme_file_uri( '/assets/js/main.js' ), array( 'jquery' ), '1.0', true );


     if ( is_singular() ) {
        wp_enqueue_script( "comment-reply" );
    }
}

add_action( 'wp_enqueue_scripts','writer_enqueue_rigister' );

// Pagination

function writer_pagination() {
    global $wp_query;
    $links = paginate_links( array(
        'current'  => max( 1, get_query_var( 'paged' ) ),
        'total'    => $wp_query->max_num_pages,
        'type'     => 'plain',
        'mid_size' =>  3 
    ) );
    $links = str_replace( "page-numbers", "pgn__num", $links );
    $links = str_replace( "<ul class='pgn__num'>", "<ul>", $links );
    $links = str_replace( "next pgn__num", "pgn__next", $links );
    $links = str_replace( "prev pgn__num", "pgn__prev", $links );
    echo wp_kses_post( $links );
}

// widgets_init area

function writer_widgets_register(){


    register_sidebar( array(
        'name'          => __( 'Sidebar Widget', 'writer-pro' ),
        'id'            => 'sidebar-right',
        'description'   => __( 'Widgets in this area will be shown on sidebar', 'writer-pro' ),
        'before_widget' => '<div id="%1$s" class="similar-post %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="favorites">',
        'after_title'   => '</h2>',
    ) );

}

add_action( "widgets_init", "writer_widgets_register" );

// Filter except length to 35 words.
// tn custom excerpt length

function powerx_excerpt_length( $length ) {
return 20;
}
add_filter( 'excerpt_length', 'powerx_excerpt_length', 999 );


function writer_fonts_url() {
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'writer-pro' ) ) {
        $font_url = 'http://fonts.googleapis.com/css?'. urlencode('family=Source+Sans+Pro:400,700|Droid+Serif:400,400italic,700&display=swap');
    }
    return $font_url;
}


// Display from Theme Option sarfox_option

if ( ! function_exists( 'writer_options' ) ) {
    function writer_options( $option = '', $default = null ) {
        $options  = get_option('writer_theme_options');
        $default  = ( ! isset( $default ) && isset( $defaults[ $option ] ) ) ? $defaults[ $option ] : $default;
        return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
    }
}
