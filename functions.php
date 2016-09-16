<?php 
//Initial Settings
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';
require_once get_template_directory() . '/options.php';

add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');

if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

add_filter( 'wp_title', 'paper_theme_title_for_home' );
function paper_theme_title_for_home( $title )
{
  if ( empty( $title ) && ( is_home() || is_front_page() ) ) {
    $title = __( 'Home', 'newpaper' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}

function paper_theme_name_scripts() {
	wp_enqueue_style( 'paper-bootstrap', get_template_directory_uri() .'/css/bootstrap.css', array(), 'v3.3.6', 'screen' );
	wp_enqueue_style( 'paper-bootstrap-theme', get_template_directory_uri() .'/css/bootstrap-theme.css', array(), 'v3.3.6', 'screen' );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); 
	wp_enqueue_style( 'paper-base', get_stylesheet_uri() );
	wp_enqueue_style( 'paper-responsive', get_template_directory_uri() .'/css/responsive.css', array(), '0.1', 'screen' );
    
	wp_enqueue_script( 'paper-modernizr-custom', get_template_directory_uri() . '/js/modernizr.custom.js', array(), '2.6.2', true );
	wp_enqueue_script( 'paper-jqery', get_template_directory_uri() . '/js/jquery-1.11.0.min.js', array(), '1.11.0', true );
	wp_enqueue_script( 'paper-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), 'v3.3.6', true );
	wp_enqueue_script( 'paper-custom', get_template_directory_uri() . '/js/custom.js', array(), '0.1', true );
	
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
}
add_action( 'wp_enqueue_scripts', 'paper_theme_name_scripts' );

add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}

add_action( 'widgets_init', 'paper_theme_widgets_init' );
function paper_theme_widgets_init(){
	$args = array(
		'name'          => __( 'Sidebar 1', 'newpaper' ),
		'id'            => "sidebar-1",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
	);
	register_sidebar( $args );
}