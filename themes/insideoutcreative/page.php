<?php get_header();
global $post; 
if ( ! post_password_required( $post ) ) {

if(!is_page(60)):
//  start of header
echo '<section class="bg-attachment section-hero" style="background:url(' . get_the_post_thumbnail_url() . ');background-size:cover;background-attachment:fixed;padding-top:300px;padding-bottom:100px;">';


echo '<div class="container-fluid">';
echo '<div class="row">';
echo '<div class="col-lg-5 col-md-9 col-11 ml-auto p-0">';
echo '<div class="bg-accent pt-3 pb-3">';
echo '<h1 class="text-white mb-0 thin pl-md-5 pl-3">' . get_the_title() . '</h1>';
echo '</div>';

echo '<div class="pt-3 pb-3 pl-md-5 pl-3 pr-md-5 pr-3" style="background:rgba(255,255,255,.6);">';

echo '<div class="pl-3" style="border-left:3px solid var(--accent-secondary);font-size:130%;">';
echo get_field('page_subtitle');

echo '</div>';
echo '</div>';


echo '</div>';

echo '<div class="col-1"></div>';

echo '</div>';
echo '</div>';


echo '</section>';
//  end of header
endif;

if(get_the_content()){

echo '<section class="pt-5 pb-5">';
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-md-12">';
if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else:
echo '<p>Sorry, no posts matched your criteria.</p>';
endif;
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';

}

if(get_field('show_contact_section') == 'Yes'){
    echo get_template_part('partials/section-contact');
}

} else {
// we will show password form here

echo '<section class="pt-5 pb-5">';
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-md-12">';
echo get_the_password_form();
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
   
}
get_footer(); 
?>