<?php

function styles () {
  wp_enqueue_style("stylesheet", get_stylesheet_directory_uri(). "/css/style.css");
  wp_enqueue_style("Bootstrap", get_stylesheet_directory_uri(). "/css/bootstrap.min.css");
  wp_enqueue_style('font-awesome', get_stylesheet_directory_uri().'/css/font-awesome.css');
  wp_enqueue_style('font-1', 'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300');
  wp_enqueue_style('font-awesome-min', get_stylesheet_directory_uri().'/css/fontawesome.min.css');
  wp_enqueue_style('owl-style', get_stylesheet_directory_uri().'/css/owl.carousel.css');
  wp_enqueue_script('owlscript', get_template_directory_uri().'/js/owl.carousel.js', array('jquery'));
  wp_enqueue_style('owl-style-default', get_stylesheet_directory_uri().'/css/owl.theme.default.css');
  wp_enqueue_script("BootsrapJS", get_template_directory_uri(). "/js/bootstrap.min.js", array("jquery"));
  wp_enqueue_script('javascript', get_template_directory_uri().'/js/script.js', array('jquery'), false, true);
}

add_action("wp_enqueue_scripts", "styles");




if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title' 	=> 'More options',
    'menu_title'	=> 'ACF-options',
    'menu_slug' 	=> 'options',
    'capability'	=> 'edit_posts',
    'redirect'		=> false
  ));
}
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title' 	=> 'Länk hantering',
    'menu_title'	=> 'Center links',
    'menu_slug' 	=> 'options-2',
    'capability'	=> 'edit_posts',
    'redirect'		=> false
  ));
}


register_nav_menu('sidebar', 'Sidebar menu');
register_nav_menu('menu for large hero template', 'Navmeny för stor-hero mallen');

function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform"  action="' . home_url( '/' ) . '" >
    <div id="searchbtn">
    <input class="empty" type="text"  value="' . get_search_query() . '" name="s" id="search-input"/>
    <label for="search-input">&#xF002;</label>
    </div>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );



function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_theme_support( 'post-thumbnails' );


function custom_posttypes() {
  $args1 = array(
    'labels' => array(
      'name' => 'Butiker',
      'singular_name' => 'Butik',
      'add_new_item' => 'Lägg till en butik',
      'all_items' => 'Alla butiker',
      'edit_item' => 'Redigera butik',
      'view_item' => 'Visa butik',
      'update_item' => 'Uppdatera butik',
      'new_item' => 'Ny butik',
      'not_found' => 'Inga butiker funna'),
    'public' => true,
    'menu_position' => 10,
    'menu_icon' => 'dashicons-layout',
    'rewrite' => array('slug' => 'butiker'),
    'has_archive' => true,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    'taxonomies' => array('kategorier'),
  );
  register_post_type('butiker', $args1);
  $args2 = array(
    'labels' => array(
      'name' => 'Lediga jobb',
      'singular_name' => 'Ledigt jobb',
      'add_new_item' => 'Lägg till ett jobb',
      'all_items' => 'Alla jobb',
      'edit_item' => 'Redigera jobb',
      'view_item' => 'Visa jobb',
      'update_item' => 'Uppdatera jobb',
      'new_item' => 'Nytt jobb',
      'not_found' => 'Inga lediga jobb funna'),
    'public' => true,
    'menu_position' => 14,
    'menu_icon' => 'dashicons-universal-access-alt',
    'rewrite' => array('slug' => 'jobb'),
    'has_archive' => true,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    'taxonomies' => array('kategorier'),
  );
  register_post_type('jobb', $args2);
}
add_action('init', 'custom_posttypes');

function taxonomies_reg() {
$taxarg = array(
  'labels' => array(
    'name' => 'Butik-kategorier',
    'singular_name' => 'Butik-kategori',
    'all_items' => 'Alla kategorier',
    'edit_item' => 'Edit kategori',
    'view_item' => 'Visa kategori',
    'update_item' => 'Updatera kategori',
    'add_new_item' => 'Lägg till en ny kategori',
    'new_item_name' => 'Ny kategori namn',
    'not_found' => 'Inga kategorier funna',
  ),
  'hierarchical' => true,
  'has_archive' => true,
);
register_taxonomy('kategorier', 'butiker', $taxarg);
}
add_action('init', 'taxonomies_reg');


//Sidebar
function widget(){
  register_sidebar(array(

  "name" => ("Widgets left"),
  "id"   => "main-sidebar-left",
  "description" => ("Widgets för bloggen (left)"),
  'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => '</h4>'
));
  register_sidebar(array(

  "name" => ("Widgets middle"),
  "id"   => "main-sidebar-middle",
  "description" => ("Widgets för bloggen (middle)"),
  'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => '</h4>'
));
  register_sidebar(array(

  "name" => ("Widgets right"),
  "id"   => "main-sidebar-right",
  "description" => ("Widgets för bloggen (right)"),
  'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => '</h4>'
));
}

add_action("widgets_init", "widget");


//order by title
function order_cats ($query){
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
}
add_action ('pre_get_posts', 'order_cats');

//maps api
$api = array(

	'libraries'		=> 'places',
	'key'			=> 'AIzaSyAek2X6YRcS4XJ1SalmKH7YsKda63eMau0',
	'client'		=> '
8148720931-4d262vr7c4bq9kfv29gmrippqfsridjr.apps.googleusercontent.com
'

);

function my_acf_google_map_api( $api ){

	$api['key'] = 'AIzaSyAek2X6YRcS4XJ1SalmKH7YsKda63eMau0';

	return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function custom_excerpt_length($length){
  return 37;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

function custom_excerpt_more ($more){
  return '[...]<a href="'.get_the_permalink().'">Läs hela...</a>';
}
add_filter('excerpt_more', 'custom_excerpt_more');


/* Show/Hide excerpt function */
function nya_shortcodes() {
   add_shortcode('read', 'egen_excerpt');
}

function egen_excerpt($atts, $content = null) {
	extract(shortcode_atts(array(
		'more' => 'Läs mer',
	), $atts));

	mt_srand((double)microtime() * 1000000);
	$rnum = mt_rand();

$new_string = '<span><a onclick="read_toggle(' . $rnum . ', \'Läs mer\', \'Läs mindre\'); return false;" class="read-link" id="readlink' . $rnum . '" style="readlink" href="#">Läs mer</a></span>' . "\n";
	$new_string .= '<div class="read_div" id="read' . $rnum . '" style="display: none;">' . do_shortcode($content) . '</div>';

	return $new_string;
}

function js_for_excerpten() {
	echo '<script>
	function expand(param) {
		param.style.display = (param.style.display == "none") ? "block" : "none";
	}
	function extend(param) {
		param.style.display = (param.style.display == "block") ? "none" : "block";
	}
	function read_toggle(id, more, less) {
		el = document.getElementById("readlink" + id);
		el.innerHTML = (el.innerHTML == more) ? less : more;
		expand(document.getElementById("read" + id));
		extend(document.getElementById("tom"));
	}
	</script>';
}

add_action('wp_head', 'js_for_excerpten');
add_action('init', 'nya_shortcodes');
?>
