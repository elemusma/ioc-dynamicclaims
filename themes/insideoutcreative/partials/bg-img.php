<?php

if(have_rows('background_image_group')): while(have_rows('background_image_group')): the_row();

$image = get_sub_field('image');

if($image){
    echo wp_get_attachment_image($image["id"],'full','',[
        'class'=>'w-100 h-100 position-absolute bg-img ' . get_sub_field('image_classes'),
        'style'=>'top:0;left:0;object-fit:cover;pointer-events:none;' . get_sub_field('image_style')
    ]);
}

endwhile; endif;

?>