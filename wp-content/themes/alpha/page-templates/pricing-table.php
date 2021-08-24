<?php 
/**
 * Template Name: Pricing Table
 */

get_header();
$pricing_data = get_post_meta(get_the_ID(),'_alpha_pt_pricing_table', true);
$services = get_post_meta(get_the_ID(),'_alpha_service', true);
// echo "<pre>";
// print_r($services);
// echo "</pre>";
// die;
?>
<div class="container">
    <div class="row">
        <?php foreach($pricing_data as $p_d): ?>
            <div class="col-md-4">
                <h2><?php echo esc_html($p_d['_alpha_pt_pricing_caption']) ?></h2>
                <ul>
                <?php foreach($p_d['_alpha_pt_pricing_options'] as $p_t_op): ?>
                    <li>
                        <?php echo esc_html( $p_t_op); ?>
                </li>
                    
                <?php endforeach; ?>  
                </ul>
                <h4><?php echo esc_html($p_d['_alpha_pt_price']) ?></h4>
                
            </div>
              
                
        <?php endforeach; ?>
    </div>
    <br><br>
    <div class="row">
        <?php foreach($services as $service): ?>
            <?php $service_icon = $service['_alpha_icon']; ?>
            <div class="col-md-4">
                <i class="fa <?php echo esc_attr($service_icon) ?>"></i>
                <h2><?php echo esc_html($service['_alpha_title']) ?></h2>
                <p><?php echo apply_filters('the_content',$service['_alpha_content']) ?></p>

            </div>
         <?php endforeach; ?>   
    </div>
</div>

<?php

get_footer();

