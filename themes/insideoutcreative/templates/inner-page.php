<?php

/**
 * Template Name: Inner Page
 */

 get_header();

//  start of header
echo '<section class="bg-attachment section-hero" style="background:url(' . get_the_post_thumbnail_url() . ');background-size:cover;background-attachment:fixed;padding-top:300px;padding-bottom:100px;">';


echo '<div class="container-fluid">';
echo '<div class="row">';
echo '<div class="col-lg-5 col-md-9 col-11 ml-auto p-0">';
echo '<div class="bg-accent pt-3 pb-3">';
echo '<h1 class="text-white text-md-center mb-0 thin pl-md-0 pl-3">' . get_the_title() . '</h1>';
echo '</div>';

if(have_rows('header_content')): while(have_rows('header_content')): the_row();
echo '<div class="pt-3 pb-3 pl-md-5 pl-3 pr-md-5 pr-3" style="background:rgba(255,255,255,.6);">';

if(get_sub_field('page_subtitle')):
echo '<div class="pl-3" style="border-left:3px solid var(--accent-secondary);font-size:130%;">';
echo get_sub_field('subtitle');
echo '</div>';
endif;

echo '</div>';
endwhile; endif;

echo '</div>';

echo '<div class="col-1"></div>';

echo '</div>';
echo '</div>';


echo '</section>';
//  end of header

// start of intro
echo get_template_part('partials/section-intro-content');
// end of intro

// start of content
if(have_rows('content_group')): 
    while(have_rows('content_group')): the_row();

    if(have_rows('content_sections')): 
    while(have_rows('content_sections')): the_row();
    $contentLeftRight = get_sub_field('content_left_or_right');
    $classes = get_sub_field('classes');
    $style = get_sub_field('style');
    $bgImg = get_sub_field('background_image');
    $imgDataAos = get_sub_field('image_data_aos');
    $img = get_sub_field('image');
    $contentDataAos = get_sub_field('content_data_aos');
    $content = get_sub_field('content');

    if($bgImg){
        if($img){
            echo '<section class="position-relative bg-attachment mt-5 mb-5 section-content ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:contain;background-repeat:no-repeat;background-attachment:fixed;padding:100px 0;' . $style . '">';
        } else {
            echo '<section class="position-relative bg-attachment mt-5 mb-5 section-content ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:contain;background-repeat:no-repeat;background-attachment:fixed;padding:250px 0;' . $style . '">';
            // echo '</section>';
        }
    } else {
        if($img){
            echo '<section class="position-relative bg-attachment mt-5 mb-5 section-content ' . $classes . '" style="padding:100px 0;' . $style . '">';
        // echo '</section>';
        } else {
            echo '<section class="position-relative bg-attachment mt-5 mb-5 section-content ' . $classes . '" style="padding:250px 0;' . $style . '">';
        }
    }

    echo '<div class="container-fluid">';

    if($contentLeftRight == 'Left'){
        echo '<div class="row row-content justify-content-end flex-column-reverse flex-lg-row">';
    } elseif($contentLeftRight == 'Right') {
        echo '<div class="row row-content justify-content-end right flex-lg-row-reverse flex-column-reverse flex-lg-row">';
        // echo '</div>';
    }


    echo '<div class="col-lg-5 overflow-h pt-lg-0 pt-5">';
    echo '<div class="d-flex h-100 align-items-center" data-aos="' . $contentDataAos . '">';
    echo '<div>';
        echo $content;
    echo '</div>';
    echo '</div>';
    echo '</div>';

    // echo '<div class="col-lg-1">';
    // echo '</div>';

    echo '<div class="col-lg-6 overflow-h p-md-0">';

    if($contentLeftRight == 'Left'){
        echo '<div class="pl-lg-5" data-aos="' . $imgDataAos . '">';
    } elseif($contentLeftRight == 'Right') {
        echo '<div class="pr-lg-5" data-aos="' . $imgDataAos . '">';
        // echo '</div>';
    }
    if($img):
        echo '<div class="" data-aos="' . $imgDataAos . '">';
        echo wp_get_attachment_image($img['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:cover;']);
        echo '</div>';
    endif;
    echo '</div>';

    echo '</div>';
    echo '</div>';

    echo '</section>';
    endwhile; 
    endif;

endwhile; 
endif;
// end of content

// start of new content
if(have_rows('content_columns')): 
    while(have_rows('content_columns')): the_row();

    $mainBgImg = get_sub_field('background_image');
    $mainClasses = get_sub_field('classes');
    $mainStyle = get_sub_field('style');
    // echo get_sub_field('style');

    if(have_rows('content_sections')): 
        echo '<section class="position-relative bg-attachment section-content '. $mainClasses . '" style="padding:100px 0;background:url(' . $mainBgImg['url'] . ');background-size:cover;background-repeat:no-repeat;background-position:right;' . $mainStyle . '">';
        echo '<div class="container-fluid" style="max-width:1300px;">';
        echo '<div class="row">';
        while(have_rows('content_sections')): the_row();
        echo '<div class="col-lg-4 col-md-6 ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '">';
            echo get_sub_field('content');
        echo '</div>';
        endwhile;
        echo '</div>';
        echo '</div>';
    echo '</section>';
    endif;

    endwhile; 
endif;
// end of new content

// start of services
if(have_rows('services_content')): while(have_rows('services_content')): the_row();
$bgImg = get_sub_field('background_image');
$content = get_sub_field('content');
$relationship = get_sub_field('relationship');

if($bgImg){
    echo '<section class="pt-5 pb-5 position-relative bg-attachment" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:cover;background-attachment:fixed;">';
    // echo '</section>';
} else {
    echo '<section class="pt-5 pb-5 position-relative" style="">';
}
echo '<div class="position-relative pt-5 pb-5">';
echo '<div class="position-absolute w-100 h-100 bg-accent" style="mix-blend-mode:screen;opacity:.62;top:0;left:0;pointer-events:none;"></div>';
echo '<div class="container">';
echo '<div class="row justify-content-center">';
echo '<div class="col-lg-10 text-center text-white pb-5">';

echo $content;

echo '</div>';
echo '</div>';


if( $relationship ):
    echo '<div class="row justify-content-center">';
    $counter = 0;
foreach( $relationship as $post ): 
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post);
$counter++;

// echo $counter;

// if($counter-4 == 0) {
//     echo '<div class="col-md-6 text-white mb-4">';
// } else {
    echo '<div class="col-md-4 text-white mb-4">';
    // echo '</div>';
// }
echo '<div class="position-relative pr-4 pl-4 h-100 d-flex align-items-end col-services" style="background:rgba(0,0,0,.45);padding-top:100px;">';

echo '<a class="position-absolute w-100 h-100 bg-accent-quaternary d-flex align-items-center justify-content-center z-2 col-services-link" style="top:0;left:0;border:4px solid var(--accent-tertiary);opacity:0;pointer-events:none;text-decoration:none;">';
// echo '<a href="' . get_the_permalink() . '" class="position-absolute w-100 h-100 bg-accent-quaternary d-flex align-items-center justify-content-center z-2 col-services-link" style="top:0;left:0;border:4px solid var(--accent-tertiary);opacity:0;pointer-events:none;text-decoration:none;">';

echo '<div class="text-left pl-4 pr-4 small">';
echo '<h6 class="mb-0 bold" style="">' . get_the_title() . '</h6>';
// echo '<div class="">';
echo get_field('page_subtitle');
// echo '</div>';
echo '</div>';

echo '</a>';

echo '<div class="w-100">';
echo '<span class="h1 pb-5 d-inline-block">' . str_pad($counter, 2, '0', STR_PAD_LEFT) . '</span>';

echo '<div class="row align-items-baseline">';
echo '<div class="col-md-2 pb-lg-0 pb-3 text-white">';

echo '<div class="" style="border:1px solid var(--accent-tertiary);border-radius:50%;width: 35px;height: 35px;display: flex;align-items: center;justify-content: center;">';
echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width:15px;" fill="white"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/></svg>';
echo '</div>';

echo '</div>';

echo '<div class="col-lg-5 text-white">';
echo '<h6 class="mb-0 pb-4" style="border-bottom:10px solid var(--accent-primary);"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h6>';
echo '</div>';
echo '</div>';

echo '</div>';
echo '</div>';
echo '</div>';
endforeach;
// Reset the global post object so that the rest of the page works correctly.
wp_reset_postdata(); 
echo '</div>';
endif;


echo '</div>';
echo '</div>';
echo '</section>';
endwhile; endif;
// end of services

if(get_field('show_contact_section') == 'Yes'){
    echo get_template_part('partials/section-contact');
}

 get_footer();

?>