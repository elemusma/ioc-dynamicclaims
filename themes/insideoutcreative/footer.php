<?php 
    if(!is_front_page()){

echo '<footer>';

echo get_template_part('partials/join-list-banner');

echo '<section class="pt-5">';
echo '<div class="container">';
echo '<div class="row justify-content-center">';
echo '<div class="col-md-5 text-center pb-5">';
echo '<a href="' . home_url() . '">';

$logo = get_field('logo','options'); 
$logoFooter = get_field('logo_footer','options'); 

// if($logoFooter){
// echo wp_get_attachment_image($logoFooter['id'],'full',"",['class'=>'w-100 h-auto','style'=>'max-width:200px;']); 
// } else
if($logo) {
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto','style'=>'max-width:200px;']);
}

echo '</a>';
		
// 		echo get_template_part('partials/si');
		
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';

echo '<section class="bg-accent text-white pt-5 pb-5">';
echo '<div class="container">';
echo '<div class="row justify-content-end">';
echo '<div class="col-lg-6 text-center">';

the_field('website_message','options');

echo '</div>';

echo '<div class="col-lg-3 text-center">';
wp_nav_menu(array(
    'menu' => 'Contact',
    'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-center mb-0'
));
echo '</div>';

echo '</div>';
echo '</div>';
echo '</section>';

echo '<div class="pt-3 pb-3 text-center">';
echo '<a href="https://insideoutcreative.io/" target="_blank" title="Website Development, Design &amp SEO in Colorado - Florida" style="padding-top:35px;">';
echo '<img class="auto img-backlink" src="
https://insideoutcreative.io/wp-content/uploads/2022/06/created-by-inside-out-creative-black.png
" alt="Website Development, Design &amp SEO in Colorado - Florida" width="125px" />';
echo '</a>';
echo '</div>';

echo '</footer>';

echo '<div class="modal-content search-icon position-fixed w-100 h-100 z-3" style="opacity:0;">';
echo '<div class="bg-overlay"></div>';
echo '<div class="bg-content">';
echo '<div class="bg-content-inner">';
echo '<div class="close text-white" id="">X</div>              ';
echo '<span class="h3 text-white">Search for:</span>';
echo get_search_form();
echo '</div>';
echo '</div>';
echo '</div>';

}

if(get_field('footer', 'options')) { the_field('footer', 'options'); } 

wp_footer(); 

echo '</body>';
echo '</html>';
?>