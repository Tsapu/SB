<?php

define( 'TD', 'pandago-child' );
define( 'URL_THEME', get_stylesheet_directory_uri() );

function my_styles() {
  wp_enqueue_style( 'font-primary', "https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;600;700&display=swap" );
  wp_enqueue_style( 'font-secondary', "https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" );

  wp_enqueue_style( 'child-style', URL_THEME . '/assets/css/style.css', array(), wp_get_theme()->get( 'Version' ) );
  wp_enqueue_script( 'theme-script', URL_THEME . '/assets/theme.js', array(), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'my_styles' );

function register_theme_nav() {
  register_nav_menus(
    array(
      'header-nav'  => __( 'Header Navigation', TD ),
      'sidebar-nav' => __( 'Sidebar Navigation', TD )
    )
  );
}

// Debug function
function console_log($output, $with_script_tags = true) {
  $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
  if ($with_script_tags) {
      $js_code = '<script>' . $js_code . '</script>';
  }
  echo $js_code;
}

// Allow line breaks for input
function unescape_br($string) {
  return str_replace( '&lt;br /&gt;', '<br/>', $string);
}
/**
 * Simple Templating function
 *
 * @param $name   - Name of the PHP file that acts as a template. (in /template-parts/block dir)
 * @param $args   - Associative array of variables to pass to the template file.
 * @return string - Output of the template file. Likely HTML.
 */
function template( $name, $args ){

  $file = __DIR__ . '/template-parts/' . $name . '.php';
  
  // ensure the file exists
  if ( !file_exists( $file ) ) {
    return '';
  }

  // Make values in the associative array easier to access by extracting them
  if ( is_array( $args ) ){
    extract( $args );
  }

  // buffer the output (including the file is "output")
  ob_start();
    include $file;
  return ob_get_clean();
}



// Color Palette
add_theme_support( 'editor-color-palette', array(
  array(
    'name' => 'Red',
    'slug' => 'red',
    'color' => '#E40A19',
  ),
  array(
    'name' => 'Indigo',
    'slug' => 'indigo',
    'color' => '#413E6B',
  ),
  array(
    'name' => 'Black',
    'slug' => 'black',
    'color' => '#1A1A1A',
  ),
  array(
    'name' => 'Dark gray',
    'slug' => 'dark-gray',
    'color' => '#6A6A6A',
  ),
  array(
    'name' => 'Medium gray',
    'slug' => 'medium-gray',
    'color' => '#BEBEBE',
  ),
  array(
    'name' => 'Light gray',
    'slug' => 'light-gray',
    'color' => '#E3E3E3',
  ),
  array(
    'name' => 'Pale orange',
    'slug' => 'pale-orange',
    'color' => '#EBAF88',
  ),
  array(
    'name' => 'Pale green',
    'slug' => 'pale-green',
    'color' => '#CBE19C',
  ),
  array(
    'name' => 'Pale pink',
    'slug' => 'pale-pink',
    'color' => '#F8C0C9',
  ),
  array(
    'name' => 'Pale blue',
    'slug' => 'pale-blue',
    'color' => '#92C6ED',
  ),
  array(
    'name' => 'Pale beige',
    'slug' => 'pale-beige',
    'color' => '#F1E2C3',
  ),
  array(
    'name' => 'White',
    'slug' => 'white',
    'color' => '#FFF',
  ),
) );

 // .----------------.  .----------------.  .----------------. 
// | .--------------. || .--------------. || .--------------. |
// | |      __      | || |     ______   | || |  _________   | |
// | |     /  \     | || |   .' ___  |  | || | |_   ___  |  | |
// | |    / /\ \    | || |  / .'   \_|  | || |   | |_  \_|  | |
// | |   / ____ \   | || |  | |         | || |   |  _|      | |
// | | _/ /    \ \_ | || |  \ `.___.'\  | || |  _| |_       | |
// | ||____|  |____|| || |   `._____.'  | || | |_____|      | |
// | |              | || |              | || |              | |
// | '--------------' || '--------------' || '--------------' |
 // '----------------'  '----------------'  '----------------' 

function wd_acf_color_palette() { ?>
  <script type="text/javascript">
    (function($) {
         acf.add_filter('color_picker_args', function( args, $field ){
              args.palettes = ['#E40A19', '#413E6B', '#1A1A1A', '#6A6A6A', '#BEBEBE', '#E3E3E3', '#EBAF88', '#CBE19C', '#F8C0C9', '#92C6ED', '#F1E2C3', '#FFF']
              return args;
         });
    })(jQuery);
  </script>
  <?php }
  add_action( 'acf/input/admin_footer', 'wd_acf_color_palette' );


// Global options for footer
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
    'page_title'    => __('Rediģēt pamatinformāciju'),
    'menu_title'    => __('Rediģēt pamatinformāciju'),
    'menu_slug'     => 'global-options',
    'capability'    => 'edit_posts',
    'redirect'      => false,
    'position'      => '64.4',
  ));
}

// Custom block category
function wpdocs_new_block_category( $categories ) {
  return array_merge(
    array(
      array(
          'title' => 'SB blocks',
          'slug'  => 'sb-category',
          'icon'  => 'pets',
      ),
    ),
    $categories
  );
}
add_filter( 'block_categories', 'wpdocs_new_block_category' );

//The blocks
function my_acf_block_render_callback( $block ) {

	// convert name ("acf/`block`") into path friendly slug ("`block`")
	$slug = str_replace('acf/', '', $block['name']);

	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/template-parts/block/{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/block/{$slug}.php") );
	}
}

function my_acf_init() {
  
  $block_svg = file_get_contents( get_theme_file_path( 'Favicon.svg' ) );
	
	if( function_exists('acf_register_block_type') ) {
		acf_register_block_type(array(
			'name'				=> 'cover-image',
			'title'				=> __('Cover image'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'sb-category',
			'icon'				=> $block_svg,
    ));
    acf_register_block_type(array(
			'name'				=> 'illustrate-lead',
			'title'				=> __('Illustrate lead'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'sb-category',
			'icon'				=> $block_svg,
		));
    acf_register_block_type(array(
			'name'				=> 'stories-lead',
			'title'				=> __('Stories lead'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'sb-category',
			'icon'				=> $block_svg,
		));
    acf_register_block_type(array(
			'name'				=> 'book-sources',
			'title'				=> __('Book sources'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'sb-category',
			'icon'				=> $block_svg,
		));
    acf_register_block_type(array(
			'name'				=> 'author',
			'title'				=> __('Author'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'sb-category',
			'icon'				=> $block_svg,
		));
    acf_register_block_type(array(
			'name'				=> 'book-preview',
			'title'				=> __('Book preview'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'sb-category',
			'icon'				=> $block_svg,
		));
    acf_register_block_type(array(
			'name'				=> 'audio',
			'title'				=> __('Audio pasakas'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'sb-category',
			'icon'				=> $block_svg,
		));
    acf_register_block_type(array(
			'name'				=> 'video',
			'title'				=> __('Video pasakas'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'sb-category',
			'icon'				=> $block_svg,
		));
    acf_register_block_type(array(
			'name'				=> 'illustrate',
			'title'				=> __('Colorbook'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'sb-category',
			'icon'				=> $block_svg,
		));
    acf_register_block_type(array(
			'name'				=> 'write-me-a-poem-charley',
			'title'				=> __('Dzejoļi'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'sb-category',
			'icon'				=> $block_svg,
		));
    acf_register_block_type(array(
			'name'				=> 'text',
			'title'				=> __('Virsraksts & teksts'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'sb-category',
			'icon'				=> $block_svg,
		));
    acf_register_block_type(array(
			'name'				=> 'contacts',
			'title'				=> __('Kontakti'),
			'description'		=> __(''),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'sb-category',
			'icon'				=> $block_svg,
		));
  }
}

add_action('acf/init', 'my_acf_init');
?>



