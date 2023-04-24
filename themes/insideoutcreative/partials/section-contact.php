<?php
// start of contact
if(have_rows('contact_section','options')): while(have_rows('contact_section','options')): the_row();
echo '<section class="pb-5 position-relative" id="contact">';
echo '<div class="bg-accent text-center pt-5 pb-5 pl-2 pr-2 text-white">';
if(is_page(60)){
    echo '<h1 class="mb-0" style="font-family:blairitc_ttlight;">Contact Us</h1>';    
} else {
    echo '<h2 class="mb-0">Contact Us</h2>';
}
echo '</div>';


// echo '<div class="position-relative">';
// echo '<div class="position-absolute w-100 h-50" style="top:50%;left:0;transform:translate(0,-50%);background:#ebebeb;"></div>';

echo '<div class="container pt-5">';


echo '<div class="row justify-content-center">';
echo '<div class="col-md-6">';

// echo '<div class="position-relative bg-gray text-center p-5" style="border:10px solid white;box-shadow:inset 0px 0px 5px rgba(0,0,0,.5);">';

echo get_sub_field('column_left');

// echo '</div>';

echo '</div>';
echo '<div class="col-md-6">';

// echo '<div class="position-relative bg-gray text-center p-5" style="border:10px solid white;box-shadow:inset 0px 0px 5px rgba(0,0,0,.5);">';

echo get_sub_field('column_right');

// echo '</div>';

echo '</div>';
echo '</div>';
echo '</div>';

// echo '</div>';

echo '</section>';
endwhile; endif;
// end of contact
?>