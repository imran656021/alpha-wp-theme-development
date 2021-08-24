<?php 
function alpha_child_asset(){
    wp_enqueue_style( 'parent-style', get_parent_theme_file_uri('/style.css'), array('bootstrap'), time(), );
}
add_action('wp_enqueue_scripts', 'alpha_child_asset' );

function alpha_child_asset_dequeue(){
    wp_dequeue_style('alpha-style');
    wp_deregister_style('alpha-style');
    wp_enqueue_style('alpha-style', get_theme_file_uri('/assets/css/alpha.css'), null, time());
}
add_action('wp_enqueue_scripts', 'alpha_child_asset_dequeue',14);

function alpha_child_bootstrap_dequeue(){
    wp_dequeue_style('bootstrap');
    wp_deregister_style('bootstrap');
    wp_enqueue_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
}
add_action('wp_enqueue_scripts', 'alpha_child_bootstrap_dequeue',11);

function alpha_about_page_template_banner(){
    if(is_page()){
        $thumbnails = get_the_post_thumbnail_url(null, "large");
    ?>
    <style>
        /* style goes there */
        .page-header{
            background-image: url(<?php echo $thumbnails ;?>);
        }
    </style>
    <?php
    }

    if(is_front_page()){
        if(current_theme_supports('custom-header')){
            ?>
                <style>
                    .header{
                        background-image: url(<?php echo header_image()?>);
                        margin-bottom: 80px;
                    }
                    .header h1.heading a{
                        font-size: 60px;
                    }
                </style>
            <?php
        }
    }
}

function alpha_todays_date(){
    echo date('d-m-Y');
}