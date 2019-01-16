<?php
// BEGIN CSS SECTION
	function theme_styles() {

		// LOAD BOOTSTRAP CSS
		wp_enqueue_style( 'bootstrap_css', '//stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css' );
		// LOAD THEME CSS
		wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
		// LOAD FONT AWESOME CSS
		wp_enqueue_style( 'load-fa', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

	}

	add_action( 'wp_enqueue_scripts', 'theme_styles');

	function theme_js() {

		global $wp_scripts;

		// LOAD BOOTSTRAP JS
		wp_enqueue_script( 'bootstrap_js', '//stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js', array('jquery'));

	}

	add_action( 'wp_enqueue_scripts', 'theme_js');
//END CSS SECTION

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'WPTheme' ),
	'social'	=>	__( 'Social menu', 'WPTheme' ),
	'comments'	=>	__( 'Comments menu', 'WPTheme' ),
) )

?>

<?php
//Add theme support for document title tag
add_theme_support( 'title-tag' );
?>

<?php
//Add theme support for featured images
add_theme_support( 'post-thumbnails' );
?>

<?php
//Create comma seperated nav list
class Comments_Links extends Walker_Nav_Menu
{
    public function walk( $elements, $max_depth )
    {
        $list = array ();

        foreach ( $elements as $item )
            $list[] = "<a href='$item->url'>$item->title</a>";

        return join( ' no ', $list );
    }
}
?>
