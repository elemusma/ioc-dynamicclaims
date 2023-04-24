<?php
/**
 * Template Name: Content Page
 */
get_header(); 

//  start of header
echo '<section class="bg-attachment section-hero" style="background:url(' . get_the_post_thumbnail_url() . ');background-size:cover;background-attachment:fixed;padding-top:300px;padding-bottom:100px;">';


echo '<div class="container-fluid">';
echo '<div class="row">';
echo '<div class="col-lg-5 col-md-9 col-11 ml-auto p-0">';
echo '<div class="bg-accent pt-3 pb-3">';
echo '<h1 class="text-white mb-0 thin pl-md-5 pl-3">' . get_the_title() . '</h1>';
echo '</div>';

echo '<div class="pt-3 pb-3 pl-md-5 pl-3 pr-md-5 pr-3" style="background:rgba(255,255,255,.6);">';

if(get_field('page_subtitle')):
echo '<div class="pl-3" style="border-left:3px solid var(--accent-secondary);font-size:130%;">';
echo get_field('page_subtitle');
echo '</div>';
endif;

echo '</div>';


echo '</div>';

echo '<div class="col-1"></div>';

echo '</div>';
echo '</div>';


echo '</section>';
//  end of header


if(have_rows('content_page')): while(have_rows('content_page')): the_row();

$options = get_sub_field('options');

// start of testimonials
if($options == 'Testimonials'){
    if(have_rows('testimonials')): while(have_rows('testimonials')): the_row();

    $bgImg = get_sub_field('background_image');
    $classes = get_sub_field('classes');
    $style = get_sub_field('style');

    if($bgImg){
        echo '<section class="position-relative bg-attachment section-content ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:cover;background-repeat:no-repeat;background-attachment:fixed;padding:100px 0;' . $style . '">';
        // echo '</section>';
    } else {
        echo '<section class="position-relative bg-attachment section-content ' . $classes . '" style="padding:100px 0;' . $style . '">';
    }

    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-12 bg-white pt-5 pb-5">';

    echo '<div class="position-relative">';

    echo '<div class="position-absolute" style="width:25px;top:0;left:0;">';
        echo '<?xml version="1.0" encoding="UTF-8"?>
        <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 385.35 255.57">
          <g id="Layer_1-2" data-name="Layer 1">
            <g id="MATTZP.tif">
              <g>
                <path d="M385.35,.42c-7.76,4.03-14.88,7.27-21.55,11.27-13.76,8.26-25.78,18.41-31.86,33.87-6.15,15.63-4.65,30.98,2.85,45.8,.97,1.92,2.92,3.63,4.81,4.77,29.22,17.47,43.9,43.29,43.59,77.2-.4,43.97-38.4,80.94-82.35,82.2-42.3,1.22-79.77-29.49-86.55-71.02-2.95-18.06-.81-35.94,4.37-53.23,18.08-60.46,56.13-102.4,116.38-123.02,15.96-5.46,32.58-7.71,50.32-7.84Z"/>
                <path d="M173.24,0c-8.86,4.64-16.54,8.23-23.77,12.55-11.7,7-21.79,15.81-28.22,28.19-8.85,17.04-7.54,33.99,.64,50.75,.93,1.9,3,3.5,4.9,4.64,27.83,16.79,43.19,41.45,43.52,73.85,.45,43.54-31.24,77.91-70.69,84.3C42.25,263.59-6.22,216.12,.65,158.51,5.9,114.49,24.51,77.46,56.33,47.15,86.2,18.68,122.07,3.21,163.4,.78c1.49-.09,2.98-.29,4.47-.42,1.3-.11,2.6-.18,5.37-.36Z"/>
              </g>
            </g>
          </g>
        </svg>';
        echo '</div>';

        echo '<div class="position-absolute" style="width:25px;bottom:25px;right:0;">';
        echo '<?xml version="1.0" encoding="UTF-8"?>
        <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 385.35 255.57">
          <g id="Layer_1-2" data-name="Layer 1">
            <g id="MATTZP.tif">
              <g>
                <path d="M0,255.14c7.76-4.03,14.88-7.27,21.55-11.27,13.76-8.26,25.78-18.41,31.86-33.87,6.15-15.63,4.65-30.98-2.85-45.8-.97-1.92-2.92-3.63-4.81-4.77C16.53,141.97,1.85,116.15,2.16,82.24,2.56,38.27,40.56,1.3,84.51,.03c42.3-1.22,79.77,29.49,86.55,71.02,2.95,18.06,.81,35.94-4.37,53.23-18.08,60.46-56.13,102.4-116.38,123.02-15.96,5.46-32.58,7.71-50.32,7.84Z"/>
                <path d="M212.11,255.57c8.86-4.64,16.54-8.23,23.77-12.55,11.7-7,21.79-15.81,28.22-28.19,8.85-17.04,7.54-33.99-.64-50.75-.93-1.9-3-3.5-4.9-4.64-27.83-16.79-43.19-41.45-43.52-73.85-.45-43.54,31.24-77.91,70.69-84.3,57.38-9.3,105.84,38.17,98.98,95.78-5.25,44.02-23.86,81.05-55.68,111.36-29.88,28.46-65.74,43.93-107.08,46.37-1.49,.09-2.98,.29-4.47,.42-1.3,.11-2.6,.18-5.37,.36Z"/>
              </g>
            </g>
          </g>
        </svg>';
        echo '</div>';

    if(have_rows('individual_testimonial')):
    echo '<div class="testimonial-carousel owl-carousel owl-theme">';
        while(have_rows('individual_testimonial')): the_row();
        echo '<div class="individual-testimonial position-relative pl-5 pr-5">';

        echo '<div class="testimonial-content">';
        echo get_sub_field('content');
        echo '</div>';
        echo '<div class="testimonial-name text-gray">';
        echo get_sub_field('name');
        echo '</div>';

        echo '</div>';
        endwhile;
    echo '</div>';
    endif;

    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '</section>';

    endwhile; endif;
}
// end of testimonials

// start of content section with icon
elseif($options == 'Content Section with Icon') {
if(have_rows('content_section_with_icon')): while(have_rows('content_section_with_icon')): the_row();
    echo '<section class="position-relative ' . get_sub_field('classes') . '" style="padding:100px 0;' . get_sub_field('style') . '">';
    echo '<div class="container">';
    echo '<div class="row justify-content-center">';
    echo '<div class="col-md-9 text-center">';

    if(get_sub_field('icon')):
    echo '<div class="bg-accent p-3 m-auto icon-col" style="width:60px;height:60px;border-radius:50%;">';
    echo get_sub_field('icon');
    echo '</div>';
    echo '<div class="mt-4">';
    echo '</div>';
    endif;

    echo get_sub_field('content');

    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</section>';
endwhile; endif;
}
// end of content section with icon

// start of columns with icon
elseif($options == 'Columns with Icons'){
  if(have_rows('columns_with_icon')): while(have_rows('columns_with_icon')): the_row();
  echo '<section class="position-relative ' . get_sub_field('classes') . '" style="padding:100px 0;' . get_sub_field('style') . '">';
  echo '<div class="container">';
  echo '<div class="row pb-5">';

  echo '<div class="col-12 d-flex align-items-center text-center">';
  echo '<div class="w-100" style="border-top:2px groove gray;"></div>';
  echo '<h2 class="pl-3 pr-3 mb-0" style="white-space:nowrap;">' . get_sub_field('title') . '</h2>';
  echo '<div class="w-100" style="border-top:2px groove gray;"></div>';
  echo '</div>';

  echo '</div>';
  
  if(have_rows('columns')):
  echo '<div class="row justify-content-center">';
    while(have_rows('columns')): the_row();
      echo '<div class="col-lg-4 col-md-6 text-center mb-5 ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '">';

      if(get_sub_field('icon')):
      echo '<div class="bg-accent p-3 m-auto icon-col" style="width:60px;height:60px;border-radius:50%;">';
      echo get_sub_field('icon');
      echo '</div>';
      endif;

      echo '<div class="pt-4">';
      if(get_sub_field('title')):
        echo '<span class="h4">' . get_sub_field('title') . '</span>';
      endif;
      echo '<div class="d-block text-gray">' . get_sub_field('description') . '</div>';
      echo '</div>';

      echo '</div>  ';
    endwhile;
  echo '</div>';
  endif;


  echo '</div>';
  echo '</section>';
  endwhile; endif;
}
// end of columns with icon

// start of case study
elseif($options == 'Case Study') {

    
if(have_rows('case_study')): while(have_rows('case_study')): the_row();

    $bgImg = get_sub_field('background_image');
    $classes = get_sub_field('classes');
    $style = get_sub_field('style');
    $img = get_sub_field('image');

if($bgImg){
    echo '<section class="position-relative bg-attachment section-content ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:cover;background-repeat:no-repeat;background-attachment:fixed;padding:100px 0;' . $style . '">';
    // echo '</section>';
} else {
    echo '<section class="position-relative bg-attachment section-content ' . $classes . '" style="padding:100px 0;' . $style . '">';
}

    echo '<div class="container">';
    echo '<div class="row bg-white">';
    echo '<div class="col-12 text-white text-center p-5 bg-accent">';

    echo '<h2>' . get_sub_field('title') . '</h2>';

    echo '</div>';

    echo '<div class="col-md-6">';
    echo '<div class="h-100 p-5 d-flex align-items-center">';
    echo '<div>';
    echo wp_get_attachment_image($img['id'],'full','',['class'=>'w-100 h-auto']);
    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '<div class="col-md-6">';
    echo '<div class="h-100 p-5 d-flex align-items-center">';
    echo '<div>';
    echo get_sub_field('content');
    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '</div>';
    if(have_rows('list')): 
        echo '<div class="row bg-white pb-4 row-case-study-list">';
        $listCounter = 0;
        while(have_rows('list')): the_row();
        $listCounter++;

        echo '<div class="col-md-1 col-12 col case-study-col-number">';

        echo '<div class="position-absolute h-100 d-md-block d-none case-study-dashed-line" style="border-left:1px dashed var(--accent-primary);top:0;left:50%;transform:translate(-50%,0);"></div>';

        echo '<div class="bg-accent p-2 m-auto text-white d-flex align-items-center justify-content-center position-relative" style="width:45px;height:45px;border-radius:50%;">';
        echo '<span>' . $listCounter . '</span>';
        echo '</div>';
        echo '</div>';

        echo '<div class="col-md-11 col-12 col">';
        echo get_sub_field('content');
        echo '</div>';

        endwhile;
    echo '</div>';
    endif;
    echo '</div>';

echo '</section>';

endwhile; endif;
}
// end of case study

// start of cta section
elseif($options == 'CTA Section') {
  if(have_rows('cta_section')): while(have_rows('cta_section')): the_row();

    echo '<section class="position-relative bg-accent text-white" style="">';

    echo '<div class="container">';
    echo '<div class="row">';

    echo '<div class="col-lg-7 pt-5 pb-5">';

    echo '<div class="d-flex align-items-center h-100">';
    echo '<div>';
    echo '<h2>' . get_sub_field('title') . '</h2>';
    echo get_sub_field('content');
    echo '</div>';
    echo '</div>';

    echo '</div>';

    echo '<div class="col-lg-5">';

    $img = get_sub_field('image');

    echo '<div class="d-flex align-items-center h-100">';
    echo '<div>';
    echo wp_get_attachment_image($img['id'],'full','',['class'=>'w-100 h-auto']);
    echo '</div>';
    echo '</div>';

    $link = get_sub_field('link');
    if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    echo '<a class="position-absolute w-100 h-100" style="top:0;left:0;" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
    endif;

    echo '</div>';

    echo '</div>';
    echo '</div>';

    echo '</section>';

  endwhile; endif;
}
// end of cta section

endwhile; endif;

if(get_field('show_contact_section') == 'Yes'){
  echo get_template_part('partials/section-contact');
}

get_footer();
?>