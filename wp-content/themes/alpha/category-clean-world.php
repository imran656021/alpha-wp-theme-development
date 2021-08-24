<?php 
single_cat_title();
echo "<br>";
$alpha_current_term = get_queried_object();
$alpha_term_thumbnail_id = get_field('thumbnail', $alpha_current_term);
if($alpha_term_thumbnail_id){
    $file_thum_details = wp_get_attachment_image_src($alpha_term_thumbnail_id);
    echo "<img src='".$file_thum_details[0]."'/>";
}
