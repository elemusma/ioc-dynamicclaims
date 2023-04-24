<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 

if(get_field('header', 'options')) { the_field('header', 'options'); }

if(get_field('custom_css')) { 
?> 
<style>
<?php the_field('custom_css'); ?>
</style>
<?php } ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if(get_field('body','options')) { the_field('body','options'); } 

if(!is_front_page()){

echo '<div class="blank-space"></div>';
echo '<header class="position-relative pt-3 pb-3 z-3 box-shadow bg-white w-100" style="top:0;left:0;">';

echo '<div class="nav">';
echo '<div class="container-fluid">';
echo '<div class="row align-items-center justify-content-md-center justify-content-around">';

echo '<div class="col-lg-4 col-3 desktop-hidden">';

echo '<a id="navToggle" class="nav-toggle">';
echo '<div>';
echo '<div class="line-1 bg-accent"></div>';
echo '<div class="line-2 bg-accent"></div>';
echo '<div class="line-3 bg-accent"></div>';
echo '</div>';
echo '</a>';

echo '</div>';

echo '<div class="col-lg-2 col-3">';
echo '<a href="' . home_url() . '">';

$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto','style'=>'max-width:100px;']); 
}

echo '</a>';
echo '</div>';

echo '<div class="col-8 mobile-hidden">';


wp_nav_menu(array(
    'menu' => 'Primary',
    'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-between mb-0',
	'container' => 'nav',
	'container_class' => 'your-container-class',
	'link_class' => 'your-link-class',
));


echo '</div>';
echo '<div class="col-md-2 col-3 text-center">';

echo '<div class="position-relative search-icon open-modal" style="" id="search-icon">';
echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 117.11 117.1" class="" style="height:45px;width:45px;"><defs><style>.cls-1{fill:#edb91d;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="ehXgD7.tif"><path class="cls-1" d="M75.63,68l7.84,7.74a13.28,13.28,0,0,0-7.55,7.47L68.3,75.44C57,83.7,44.91,86.32,31.77,83.07A41,41,0,0,1,7.57,66.28,42.21,42.21,0,1,1,75.63,68ZM11.15,42.21A31.06,31.06,0,1,0,42.26,11.13,31,31,0,0,0,11.15,42.21Z"></path><path class="cls-1" d="M117.11,108.2a9,9,0,0,1-5.55,8.1,8.84,8.84,0,0,1-10.1-2c-4.83-4.78-9.62-9.6-14.43-14.41-1.88-1.88-3.8-3.73-5.63-5.66a9.09,9.09,0,0,1,5.79-15.42,8.34,8.34,0,0,1,6.9,2.43q10.34,10.23,20.57,20.56A9,9,0,0,1,117.11,108.2Z"></path><path class="cls-1" d="M14.83,41.43A27.43,27.43,0,0,1,41.44,14.82c1.92-.08,3,1.06,2.39,2.48-.45,1-1.33,1.06-2.26,1.1A23.93,23.93,0,0,0,18.41,41.68c-.08,1.73-1,2.65-2.32,2.19S14.77,42.5,14.83,41.43Z"></path></g></g></g></svg>';
echo '</div>';
// wp_nav_menu(array(
//     'menu' => 'Contact',
//     'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-end mb-0'
// ));


echo '</div>';


// start of mobile menu
echo '<div id="navMenuOverlay" class="position-fixed z-2"></div>';
echo '<div class="col-lg-3 col-md-8 col-11 nav-items bg-white desktop-hidden pb-5" id="navItems">';

echo '<div class="pt-5 pb-5">';
echo '<div class="close-menu">';
echo '<div>';
echo '<span id="navMenuClose" class="close h1">X</span>';
echo '</div>';
echo '</div>';
echo '<a href="' . home_url() . '">';

$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto','style'=>'max-width:150px;']);
}

echo '</a>';
echo '</div>';

wp_nav_menu(array(
'menu' => 'primary',
'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-start mb-0'
));
echo '</div>';


echo '<div class="col-lg-3 col-md-8 col-11 nav-items bg-white pr-0 d-none" id="navItemsTwo">';
$featured_posts = get_field('navigation_menu','options');
if( $featured_posts ):
$counterSections = 0;
foreach( $featured_posts as $post ): 
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post); 
$counterSections++;
$ID = sanitize_title_with_dashes(get_the_title());

echo '<div class="col col-12 p-0 col-dropdown-menu-images overflow-h" id="section-' . $counterSections . '">';
echo '<a href="' . get_the_permalink() . '">';
the_post_thumbnail('medium',array('class'=>'w-100 dropdown-menu-images-single'));
echo '<div class="overlay position-absolute w-100 h-100"></div>';
// <!-- <div class="pt-5 pb-5 bg-gray2 position-absolute"> -->
echo '<div class="position-absolute dropdown-menu-images-content text-center w-100 text-white z-1 pl-5 pr-5">';
echo '<p class="bold text-accent-green title text-shadow" style="font-size:200%;line-height:1;">' . get_the_title() . '</p>';
echo '</div>';
// <!-- </div> -->
echo '</a>';
echo '</div>';

endforeach;
// Reset the global post object so that the rest of the page works correctly.
wp_reset_postdata();
endif; 
echo '</div>';
// end of mobile navigation


echo '</div>';
echo '</div>';
echo '</div>';

echo '</header>';




if(!is_page() && !is_front_page() && !is_single() && !is_search()){
echo '<section class="hero position-relative">';
$globalPlaceholderImg = get_field('global_placeholder_image','options');
if(is_page()){
if(has_post_thumbnail()){
the_post_thumbnail('full', array('class' => 'w-100 h-100 bg-img position-absolute'));
} else {
echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute']);
}
} else {
echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute']);
}




echo '<div class="container pt-5 pb-5 text-white text-center">';
echo '<div class="row">';
echo '<div class="col-md-12">';

if(is_page() && !is_front_page()){
echo '<h1 class="">' . get_the_title() . '</h1>';
} elseif(is_single()){
echo '<h1 class="single-title">' . single_post_title() . '</h1>';
} elseif(is_author()){
echo '<h1 class="author-title">Author: ' . get_the_author() . '</h1>';
} elseif(is_tag()){
echo '<h1 class="tag-title">' . get_single_tag_title() . '</h1>';
} elseif(is_category()){
echo '<h1 class="category-title">' . get_single_cat_title() . '</h1>';
} elseif(is_archive()){
echo '<h1 class="archive-title">' . get_archive_title() . '</h1>';
} 
elseif(!is_front_page() && is_home()){
echo '<h1 class="text-shadow">The Morgan Birgé Blog</h1>';
echo '<h2 class="text-shadow">Welcome to our little corner of the Internet. Kick your feet up and stay a while.</h2>';
}
echo '</div>';
echo '</div>';
echo '</div>';

echo '</section>';
}

}
?>