<div class="si d-flex flex-wrap justify-content-end">
<?php if(have_rows('social_icons','options')): while(have_rows('social_icons','options')): the_row(); 
$svgOrImg = get_sub_field('svg_or_image');
$socialLink = get_sub_field('link');
$svg = get_sub_field('svg');
$image = get_sub_field('image');

$socialLink_url = $socialLink['url'];
$socialLink_title = $socialLink['title'];
$socialLink_target = $socialLink['target'] ? $socialLink['target'] : '_self';
?>



<a href="<?php echo $socialLink_url; ?>" target="<?php echo $socialLink_target; ?>" style="text-decoration:none;" class="si-icon-link">
<?php 
if($svgOrImg == 'SVG') {
?>
<div class="svg-icon">
<?php echo $svg; ?>
</div>
<?php } elseif($svgOrImg == 'Image') {
?>
<?php echo wp_get_attachment_image($image['id'],'full','',['class'=>'img-si']); ?>
<?php } ?>
</a>




<?php endwhile; else : endif; ?>
</div>