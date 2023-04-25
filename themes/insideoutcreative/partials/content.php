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
}

endwhile; endif;
// end of builder

?>