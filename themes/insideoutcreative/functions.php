<?php

function dynamicclaims_stylesheets() {
wp_enqueue_style('style', get_stylesheet_uri() );

wp_enqueue_style('bootstrap', get_theme_file_uri('/css/bootstrap.min.css'));
wp_enqueue_style('body', get_theme_file_uri('/css/sections/body.css'));
wp_enqueue_style('nav', get_theme_file_uri('/css/sections/nav.css'));
wp_enqueue_style('popup', get_theme_file_uri('/css/sections/popup.css'));
wp_enqueue_style('hero', get_theme_file_uri('/css/sections/hero.css'));
wp_enqueue_style('contact', get_theme_file_uri('/css/sections/contact.css'));
wp_enqueue_style('img', get_theme_file_uri('/css/elements/img.css'));

if(is_front_page()){
	wp_enqueue_style('home', get_theme_file_uri('/css/sections/home.css'));
}

wp_enqueue_style('inner-page', get_theme_file_uri('/css/sections/inner-page.css'));

if(is_single() || is_page_template('templates/blog.php') || is_archive() || is_category() || is_tag() || is_404() || is_home() ) {
wp_enqueue_style('blog', get_theme_file_uri('/css/sections/blog.css'));
}

wp_enqueue_style('footer', get_theme_file_uri('/css/sections/footer.css'));
wp_enqueue_style('sidebar', get_theme_file_uri('/css/sections/sidebar.css'));
wp_enqueue_style('social-icons', get_theme_file_uri('/css/sections/social-icons.css'));
wp_enqueue_style('btn', get_theme_file_uri('/css/elements/btn.css'));
// fonts
wp_enqueue_style('fonts', get_theme_file_uri('/css/elements/fonts.css'));
wp_enqueue_style('proxima-nova', get_theme_file_uri('/proxima-nova/proxima-nova.css'));
wp_enqueue_style('blair-itc', get_theme_file_uri('/blair-itc/blair-itc.css'));
wp_enqueue_style('aspira', get_theme_file_uri('/aspira-font/aspira-font.css'));
wp_enqueue_style('gotham', get_theme_file_uri('/font-gotham/font-gotham.css'));

}
add_action('wp_enqueue_scripts', 'dynamicclaims_stylesheets');

// for footer
function dynamicclaims_stylesheets_footer() {
	// wp_enqueue_style('style-footer', get_theme_file_uri('/css/style-footer.css'));
	// owl carousel
	wp_enqueue_style('owl.carousel.min', get_theme_file_uri('/owl-carousel/owl.carousel.min.css'));
	wp_enqueue_style('owl.theme.default', get_theme_file_uri('/owl-carousel/owl.theme.default.min.css'));

	// owl carousel
	wp_enqueue_script('jquery-min', get_theme_file_uri('/owl-carousel/jquery.min.js'));
	wp_enqueue_script('owl-carousel', get_theme_file_uri('/owl-carousel/owl.carousel.min.js'));
	wp_enqueue_script('owl-carousel-custom', get_theme_file_uri('/owl-carousel/owl-carousels.js'));
	
    // aos
    wp_enqueue_script('aos-js', get_theme_file_uri('/aos/aos.js'));
    wp_enqueue_script('aos-custom-js', get_theme_file_uri('/aos/aos-custom.js'));
    wp_enqueue_style('aos-css', get_theme_file_uri('/aos/aos.css'));


	wp_enqueue_script('nav-js', get_theme_file_uri('/js/nav.js'));

	wp_enqueue_script('popup-js', get_theme_file_uri('/js/popup.js'));
	
	if(is_single()){
		wp_enqueue_script('blog-js', get_theme_file_uri('/js/blog.js'));
		}
	if(is_front_page()){
		wp_enqueue_script('home-js', get_theme_file_uri('/js/home.js'));
		}
	}
	
add_action('get_footer', 'dynamicclaims_stylesheets_footer');

// loads enqueued javascript files deferred
function mind_defer_scripts( $tag, $handle, $src ) {
	$defer = array( 
	  'jquery-min',
	  'owl-carousel',
	  'owl-carousel-custom',
	  'lightbox-min-js',
	  'lightbox-js',
	  'aos-js',
	  'aos-custom-js',
	  'nav-js',
	  'blog-js',
	  'contact-js'
	);
	if ( in_array( $handle, $defer ) ) {
	   return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
	}
	  
	  return $tag;
  } 
  add_filter( 'script_loader_tag', 'mind_defer_scripts', 10, 3 );

function dynamicclaims_menus() {
 register_nav_menus( array(
   'primary' => __( 'Primary' )));
register_nav_menus( array(
'secondary' => __( 'Secondary' )));
 register_nav_menu('footer',__( 'Footer' ));
 add_theme_support('title-tag');
 add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'dynamicclaims_menus');

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();
}

// removes gutenberg styles from all pages but the blog posts
function smartwp_remove_wp_block_library_css(){

	if(!is_single()) {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
	}
} 
// add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

// add_filter('show_admin_bar', '__return_false');

// add_filter('comment_form_default_fields', 'remove_website_field_from_comment_form');
function remove_website_field_from_comment_form($fields)
{
    if (isset($fields['url'])) {
        unset($fields['url']);
    }
    return $fields;
}

/*Base URL shorcode*/
add_shortcode( 'base_url', 'baseurl_shortcode' );
function baseurl_shortcode( $atts ) {

    return site_url();
	// [base_url]

}

function divider_shortcode( $atts, $content = null ) {

	$a = shortcode_atts( array(

		'class' => '',

		'style' => ''

	), $atts );

	return '<div class="divider ' . esc_attr($a['class']) . '" style="' . esc_attr($a['style']) . '"></div>';

// [divider class="" style=""]

}

add_shortcode( 'divider', 'divider_shortcode' );

function add_menu_link_class( $atts, $item, $args ) {
    if( isset($args->link_class) ) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 10, 3 );

// gets current year
function current_year( $atts, $content = null ) {

	$current_year = date("Y");

	return $current_year;

	// [currentyear]
}

add_shortcode( 'currentyear', 'current_year' );

function btn_shortcode( $atts, $content = null ) {

	$a = shortcode_atts( array(
	
	'class' => '',
	
	'href' => '',
	
	'style' => '',
	
	'target' => '',

	'id' => '',
	
	'aria-label' => ''
	
	), $atts );

	$id = esc_attr($a['id']);

	// Check if the ID contains the word "modal"
	if (strpos($id, 'modal') !== false) {
		return '<span class="btn-accent-outline ' . esc_attr($a['class']) . '" aria-label="' . esc_attr($a['aria-label']) . '" style="' . esc_attr($a['style']) . '" target="' . esc_attr($a['target']) . '" id="' . esc_attr($a['id']) . '">' . $content . '</span>';
	} else {
		return '<a class="btn-accent-outline ' . esc_attr($a['class']) . '" href="' . esc_attr($a['href']) . '" style="' . esc_attr($a['style']) . '" target="' . esc_attr($a['target']) . '" id="' . esc_attr($a['id']) . '">' . $content . '</a>';
	}
	
	// [button href="#" class="btn-main" style=""]Learn More[/button]
	
	}
	
add_shortcode( 'button', 'btn_shortcode' );

function my_page_title_shortcode() {
    return get_the_title();
	// [page_title]
}
add_shortcode('page_title', 'my_page_title_shortcode');

function map_location( $atts, $content = null ) { 
	
	return '<div id="map" style="height:750px;width:100%;background:red;"></div>';

	?>

<script>
function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            // 43.42564548895474, -88.18134401131695
          center: { lat: 43.42564548895474, lng: -88.18134401131695 },
          zoom: 8,
        });

        const markers = [
            {
  position: { lat: 42.98578077474132, lng: -87.93406274313439 },
  label: "1",
  color: "green",
  title: "Ascension St. Francis Hospital",
  description: "3327 S. 16th Street Milwaukee, WI 53215",
  link: "https://goo.gl/maps/RXsrpaTuu6nKk6weA?coh=178573&entry=tt"
},
{
  position: { lat: 42.73156438538003, lng: -87.82770954596829 },
  label: "5",
  color: "green",
  title: "Ascension All Saints Hospital",
  description: "3801 Spring Street Racine, WI 53405",
  link: "https://goo.gl/maps/ZDpgBxgWWrh6cYnh9?coh=178573&entry=tt"
},
{
  position: { lat: 44.02544759372584, lng: -88.15364916138708 },
  label: "10",
  color: "green",
  title: "Ascension Calumet Hospital",
  description: "614 Memorial Drive Chilton, WI 53014",
  link: "https://goo.gl/maps/h47QB5oZycwdv2kX8?coh=178573&entry=tt"
},
{
  position: { lat: 42.86030396100947, lng: -87.95356671726879 },
  label: "2",
  color: "green",
  title: "Ascension Franklin Hospital",
  description: "10101 S. 27th Street Franklin, WI 53132",
  link: "https://goo.gl/maps/wVhXeE2y49yhfN6L7?coh=178573&entry=tt"
},
{
  position: { lat: 43.061981280623684, lng: -87.87979748742579 },
  label: "6",
  color: "green",
  title: "Ascension Columbia St. Mary's - Milwaukee",
  description: "2301 N. Lake Drive Milwaukee, WI 53211",
  link: "https://goo.gl/maps/98HL21MbRuXFvYmX8?coh=178573&entry=tt"
},
{
  position: { lat: 43.17789799279878, lng: -88.08771050353998 },
  label: "11",
  color: "green",
  title: "Ascension Menomonee Falls Hospital",
  description: "N88 W14275 Main Street Menomonee Falls, WI 53051",
  link: "https://goo.gl/maps/M3d39vaQy3xA2yLn8?coh=178573&entry=tt"
},
{
  position: { lat: 43.05913867152742, lng: -88.15447587572396 },
  label: "3",
  color: "green",
  title: "Ascension Elmbrook Hospital",
  description: "19333 W. North Avenue Brookfield, WI 53045",
  link: "https://goo.gl/maps/hP5PRfVNo5EVEixa7?coh=178573&entry=tt"
},{
    position: { lat: 43.256766000318635, lng: -87.92618860322683 },
    label: "7",
    color: "green",
    title: "Ascension Columbia St. Mary's - Ozaukee",
    description: "13111 N. Port Washington Road Mequon, WI 53097",
    link: "https://goo.gl/maps/NQjmc5RyJ1sAbehf7?coh=178573&entry=tt"
},
{
    position: { lat: 42.955747059077254, lng: -88.0088555572109 },
    label: "12",
    color: "green",
    title: "Ascension Greenfield Hospital",
    description: "4935 S 76th Street Greenfield, WI 53220",
    link: "https://goo.gl/maps/VqUTGxvAfREcF21F8?coh=178573&entry=tt"
},
{
    position: { lat: 43.07455939758491, lng: -87.97655866090837 },
    label: "4",
    color: "green",
    title: "Ascension St. Joseph's Hospital",
    description: "5000 W. Chambers Street Milwaukee, WI 53210",
    link: "https://goo.gl/maps/x2it5MbxFSvJvZnu8?coh=178573&entry=tt"
},
{
    position: { lat: 44.248953315687636, lng: -88.40310358359731 },
    label: "8",
    color: "green",
    title: "Ascension St. Elizabeth Hospital",
    description: "1506 S. Oneida Street Appleton, WI 54915",
    link: "https://goo.gl/maps/SpYanF7CxdrfeukU8?coh=178573&entry=tt"
},
{
    position: { lat: 42.98926816194466, lng: -88.26842555906101 },
    label: "13",
    color: "green",
    title: "Ascension Waukesha Hospital",
    description: "2325 Fox Run Blvd, Suite 100 Waukesha, WI 53188",
    link: "https://goo.gl/maps/3mJ4WF3WCiWPXNK4A?coh=178573&entry=tt"
},
{
    position: { lat: 44.013423007365844, lng: -88.60017605715485 },
    label: "9",
    color: "green",
    title: "Ascension Mercy Hospital",
    description: "500 S. Oakwood Road Oshkosh, WI 54904",
    link: "https://goo.gl/maps/ViE5iYPVyJkMcDUbA?coh=178573&entry=tt"
},

// start of urgent cares
{
  position: { lat: 43.03290418287602, lng: -88.04835170886348 },
  label: "A",
  color: "yellow",
  title: "Ascension at Mayfair Road - St. Joseph's Urgent Care",
  description: "201 North Mayfair Road Wauwatosa, WI 53226",
  link: "https://goo.gl/maps/YTofFyjCGtHacaRx5?coh=178573&entry=tt"
},
{
  position: { lat: 43.097428531800595, lng: -87.91123211857914 },
  label: "B",
  color: "yellow",
  title: "Ascension Riverwoods Urgent Care",
  description: "375 W. River Woods Parkway Glendale, WI 53212",
  link: "https://goo.gl/maps/sUv8H3Sq1xVYHzvU6?coh=178573&entry=tt"
},
{
  position: { lat: 43.320891963217214, lng: -87.93707211671551 },
  label: "C",
  color: "yellow",
  title: "Ascension Grafton Urgent Care",
  description: "2061 Cheyenne Court Grafton, WI 53024",
  link: "https://goo.gl/maps/QgHbmqyuLeHcAuBB6?coh=178573&entry=tt"
},
{
  position: { lat: 42.73094487352876, lng: -87.82869181674646 },
  label: "D",
  color: "yellow",
  title: "Ascension All Saints Urgent Care",
  description: "3807 Spring St, Racine, WI 53405",
  link: "https://goo.gl/maps/QgHbmqyuLeHcAuBB6?coh=178573&entry=tt"
},

// start of wound clinic

{
  position: { lat: 44.248653591237364, lng: -88.40269588783012 },
  label: "D",
  color: "red",
  title: "Ascension St. Elizabeth Hospital",
  description: "1506 S. Oneida Street Appleton, WI 54915",
  link: "https://goo.gl/maps/T6mdewYcZaQoqqBd9?coh=178573&entry=tt"
},

        ];

        markers.forEach((marker) => {
          const markerOptions = {
            position: marker.position,
            map: map,
            label: marker.label,
            icon: {
              path: google.maps.SymbolPath.CIRCLE,
              fillColor: marker.color,
              fillOpacity: 1,
              strokeWeight: 0,
              scale: 12,
            },
          };
          const markerObject = new google.maps.Marker(markerOptions);
          const infoWindow = new google.maps.InfoWindow({
            content: `<div><h3>${marker.title}</h3><p>${marker.description}</p><a href="${marker.link}" target="_blank" class="bold">Get directions</a></div>`,
          });
          markerObject.addListener("click", () => {
            infoWindow.open(map, markerObject);
          });
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqmsW5-PBWrbZP0ixZJSsUsrYNOHWFYjI&callback=initMap"
    async defer></script>
	
<?php }
	
add_shortcode( 'locations', 'map_location' );

