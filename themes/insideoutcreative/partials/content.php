<?php

// start of builder
if(have_rows('builder_repeater')): while(have_rows('builder_repeater')): the_row();

$layout = get_sub_field('layout');

if($layout == 'Content + Image'){
    if(have_rows('content_image_group')): while(have_rows('content_image_group')): the_row();
    echo '<section class="position-relative content-image ' . get_sub_field('classes') . '" style="padding:50px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

        echo get_template_part('partials/bg-img');

    echo '<div class="container-fluid">';

    $imageSide = get_sub_field('image_side');

    echo '<div class="row justify-content-end align-items-center">';

    echo '<div class="col-lg-4 ' . get_sub_field('content_col_classes') . '" style="' . get_sub_field('content_col_style') . '">';
    echo '<div data-aos="fade-up">';
    echo get_sub_field('content');
    echo '</div>';
    echo '</div>';

    echo '<div class="col-lg-1"></div>';

    echo '<div class="col-lg-6 text-center ' . get_sub_field('content_col_classes') . '" style="' . get_sub_field('content_col_style') . '">';
    echo '<div data-aos="fade-up">';
    
    if(have_rows('image_block_clone')): while(have_rows('image_block_clone')): the_row();

    $image = get_sub_field('image');

        echo wp_get_attachment_image($image["id"],'full','',[
            'class'=>'w-100 h-100',
            'style'=>'top:0;left:0;object-fit:cover;pointer-events:none;'
        ]);
    endwhile; endif;
    
    echo '</div>';
    echo '</div>';

    echo '</div>';

    echo '</div>';

    echo '</section>';
    endwhile; endif;
} elseif($layout == 'Content'){
    if(have_rows('content_group')): while(have_rows('content_group')): the_row();
    echo '<section class="position-relative content-image ' . get_sub_field('classes') . '" style="padding:100px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

        echo get_template_part('partials/bg-img');

    echo '<div class="container-fluid">';

    echo '<div class="row justify-content-center ' . get_sub_field('row_classes') . '" style="' . get_sub_field('row_style') . '">';

    echo '<div class="col-lg-6 text-center ' . get_sub_field('column_classes') . '" style="' . get_sub_field('column_style') . '">';
    echo '<div data-aos="fade-up">';
    echo get_sub_field('content');
    echo '</div>';
    echo '</div>';



    echo '</div>';

    echo '</div>';

    echo '</section>';
    endwhile; endif;
} elseif ($layout == 'Image'){
    if(have_rows('image_group')): while(have_rows('image_group')): the_row();
    echo '<section class="position-relative content-image ' . get_sub_field('classes') . '" style="padding:100px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

        echo get_template_part('partials/bg-img');

        $img = get_sub_field('image');

        echo '<div class="" data-aos="fade-up">';
        echo wp_get_attachment_image($img['id'],'full','',[
            'class'=>'w-100 h-auto',
            'style'=>''
        ]);
        echo '</div>';


    if(get_sub_field('content')){
        echo '<div class="container">';

        echo '<div class="row justify-content-center ' . get_sub_field('row_classes') . '" style="' . get_sub_field('row_style') . '">';

        echo '<div class="col-lg-12 text-center ' . get_sub_field('column_classes') . '" style="padding-top:100px;' . get_sub_field('column_style') . '">';
        echo '<div data-aos="fade-up">';
        echo get_sub_field('content');
        echo '</div>';
        echo '</div>';

        echo '</div>';

        echo '</div>';
    }

    
    echo '</section>';
    endwhile; endif;
} elseif($layout == 'Services'){
    if(have_rows('services_group')): while(have_rows('services_group')): the_row();
    // echo '<section class="position-relative content-image ' . get_sub_field('classes') . '" style="padding:100px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    //     echo get_template_part('partials/bg-img');

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

if($counter > 3){
    $counter = 1;
}

// echo $counter;

// if($counter-4 == 0) {
//     echo '<div class="col-md-6 text-white mb-4">';
// } else {
    echo '<div class="col-md-4 text-white mb-4">';
    // echo '</div>';
// }
echo '<div class="position-relative pr-4 pl-4 h-100 d-flex align-items-end col-services" style="background:rgba(0,0,0,.45);" data-aos="fade-up" data-aos-delay="' . $counter . '00">';

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
echo '<span class="h1 d-inline-block" style="padding-bottom:100px;">' . str_pad($counter, 2, '0', STR_PAD_LEFT) . '</span>';

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

    // echo '</section>';
    endwhile; endif;
}

endwhile; endif;
// end of builder

?>