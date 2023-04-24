<?php get_header();

// echo '<div class="position-relative z-1">';
// echo '<p>hello again! after doing automatic deploy added SSH url to webhook.</p>';
// echo '<p>after uncommenting line of code and updating webhook url. After updating the server ID</p>';
// echo '<p>after updating the url.</p>';
// echo '<p>after updating main gitautodeploy.php in account rather than app.</p>';
// echo '<p>after after updating app url on webhook</p>';
// echo '</div>';

// start of intro
echo '<section class="position-relative">';
// echo '<div class="container-fluid">';
echo '<div class="d-flex flex-md-row flex-wrap">';

$logoFooter = get_field('logo_footer','options'); 
if($logoFooter){
echo wp_get_attachment_image($logoFooter['id'],'full',"",['class'=>'h-auto position-absolute z-3 logo','style'=>'width:200px;top:40px;left:50%;transform:translate(-50%,0);']); 
}

echo '<a href="' . home_url() . '/contact/" class="position-absolute text-white z-3" style="top:40px;right:25px;">Contact Us</a>';

echo '<div class="h-75 bg-white position-absolute z-1 d-lg-block d-none" style="width:1px;bottom:0;left:50%;transform:translate(-50%,0);"></div>';

if(have_rows('header_left')): while(have_rows('header_left')): the_row();

$link = get_sub_field('link');
$link_url = $link['url'];
$link_title = $link['title'];
$link_target = $link['target'] ? $link['target'] : '_self';

$bgImgLight = get_sub_field('background_image_light');
$bgImg = get_sub_field('background_image');
$divider = get_sub_field('divider');
$pretitle = get_sub_field('pretitle');
$title = get_sub_field('title');

// echo $bgImg['title'];
echo '<div class="position-absolute d-flex align-items-center p-0 col-img text-left overflow-h" style="min-height:100vh;text-decoration:none;left:0;z-index:2">';

// echo '<div class="position-absolute w-100 bg-accent z-1 text-center col-bg-hover" style="top:50%;transform:translate(0,-50%);opacity:0;pointer-events:none;">';
// echo '<h2 class="text-white mb-0 pt-3 pb-3">' . $title . '</h2>';
// echo '</div>';

echo '<a href="' . $link_url . '" target="' . $link_target . '" class="position-absolute d-lg-flex align-items-center h-100 w-75 col-img-link text-left z-1 d-none" style="top:0;left:0;max-width:45vw;"></a>';

// echo wp_get_attachment_image($bgImg,'full','',['class'=>'position-absolute w-100 h-100 bg-img-main','style'=>'top:0;left:0;object-fit:cover;']);
// echo wp_get_attachment_image($bgImgLight,'full','',['class'=>'position-absolute w-100 h-100 bg-img-light','style'=>'top:0;left:0;object-fit:cover;opacity:0;']);
echo wp_get_attachment_image($bgImgLight,'full','',['class'=>'position-absolute w-100 h-100 bg-img-light','style'=>'top:0;left:0;object-fit:cover;']);
echo '<div class="bg-accent w-100 h-100 position-absolute" style="top:0;left:0;mix-blend-mode:multiply;opacity:0.7;"></div>';

echo '<div class="position-relative w-100 col-content" style="max-width:50vw;">';
echo wp_get_attachment_image($divider,'full','',['class'=>'w-75 h-100 img-divider','style'=>'mix-blend-mode:color-dodge;']);
echo '<div class="text-center pt-5 col-img-content">';
echo '<h3 class="text-accent-tertiary h5 col-pretitle" style="letter-spacing:0.3em;">'; 
echo '<a href="' . $link_url . '" target="' . $link_target . '" class="text-accent-tertiary gotham">';
echo $pretitle;
echo '</a>';
echo '</h3>';
echo '<h2 class="text-white col-title" style="letter-spacing:0.2em;">';
echo '<a href="' . $link_url . '" target="' . $link_target . '" class="gotham">';
echo $title;
echo '</a>';
echo '</h2>';

echo '<a class="bg-accent-outline btn btn-lg d-lg-none d-inline-block text-white mt-4" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">Go to ' . esc_html( $link_title ) . '</a>';

echo '</div>';
echo '</div>';

echo '</div>';
endwhile; endif;


if(have_rows('header_right')): while(have_rows('header_right')): the_row();

$link = get_sub_field('link');
$link_url = $link['url'];
$link_title = $link['title'];
$link_target = $link['target'] ? $link['target'] : '_self';

$bgImgLight = get_sub_field('background_image_light');
// $bgImg = get_sub_field('background_image');
$divider = get_sub_field('divider');
$pretitle = get_sub_field('pretitle');
$title = get_sub_field('title');

// echo $bgImg['title'];
echo '<div class="position-absolute d-flex align-items-center p-0 col-img text-right overflow-h justify-content-end" style="min-height:100vh;text-decoration:none;right:0;">';

// echo '<div class="position-absolute w-100 bg-accent z-1 text-center col-bg-hover" style="top:50%;transform:translate(0,-50%);opacity:0;pointer-events:none;">';
// echo '<h2 class="text-white mb-0 pt-3 pb-3">' . $title . '</h2>';
// echo '</div>';

echo '<a href="' . $link_url . '" target="' . $link_target . '" class="position-absolute d-lg-flex align-items-center h-100 w-75 col-img-link text-right z-1 d-none" style="top:0;right:0;max-width:45vw;"></a>';

// echo wp_get_attachment_image($bgImg['id'],'full','',['class'=>'position-absolute w-100 h-100 bg-img-main','style'=>'top:0;left:0;object-fit:cover;']);
// echo wp_get_attachment_image($bgImgLight['id'],'full','',['class'=>'position-absolute w-100 h-100 bg-img-light','style'=>'top:0;left:0;object-fit:cover;opacity:0;']);
echo wp_get_attachment_image($bgImgLight['id'],'full','',['class'=>'position-absolute w-100 h-100 bg-img-light','style'=>'top:0;left:0;object-fit:cover;']);
echo '<div class="bg-accent w-100 h-100 position-absolute" style="top:0;left:0;mix-blend-mode:multiply;opacity:0.4;"></div>';

echo '<div class="position-relative w-100 col-content" style="max-width:50vw;">';
echo wp_get_attachment_image($divider['id'],'full','',['class'=>'w-75 h-100 img-divider','style'=>'mix-blend-mode:color-dodge;']);
echo '<div class="text-center pt-5 col-img-content">';
echo '<h3 class="text-accent-tertiary h5 col-pretitle" style="letter-spacing:0.3em;">'; 
echo '<a href="' . $link_url . '" target="' . $link_target . '" class="text-accent-tertiary gotham">';
echo $pretitle;
echo '</a>';
echo '</h3>';
echo '<h2 class="text-white col-title" style="letter-spacing:0.2em;">';
echo '<a href="' . $link_url . '" target="' . $link_target . '" class="gotham">';
echo $title;
echo '</a>';
echo '</h2>';
echo '<a class="bg-accent-outline btn btn-lg d-lg-none d-inline-block text-white mt-4" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">Go to ' . esc_html( $link_title ) . '</a>';

echo '</div>';
echo '</div>';

echo '</div>';
endwhile; endif;

echo '</div>';
// echo '</div>';
echo '</section>';
// end of intro


// how to use new image hover effect
// echo '<div class="col-6 col-intro-gallery col mb-1 p-1 overflow-h">';
// echo '<div class="position-relative img-hover w-100">';
// echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set">';
// echo wp_get_attachment_image($image['id'], 'full','',['class'=>'w-100 image-intro-gallery','style'=>'object-fit:cover;']);
// echo '</a>';
// echo '</div>';
// echo '</div>';

// // popup trigger
// echo '<span class="btn bg-white text-accent apply-now open-modal" id="apply-now" style="">Apply Now</span>';

// // popup content
// echo '<div class="modal-content apply-now position-fixed w-100 h-100 z-3" style="opacity:0;">';
// echo '<div class="bg-overlay"></div>';
// echo '<div class="bg-content">';
// echo '<div class="bg-content-inner">';
// echo '<div class="close" id="">X</div>';
// echo '<div>';
// echo get_field('popup_content');
// echo '</div>';
// echo '</div>';

// echo '</div>';
// echo '</div>';

get_footer(); ?>