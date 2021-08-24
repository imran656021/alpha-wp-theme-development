<?php 
require_once get_theme_file_path('/inc/tgm.php') ;
// require_once get_theme_file_path('/inc/acf-mb.php') ;
require_once get_theme_file_path('/inc/cmb2-mb.php') ;
if (class_exists( 'Attachments') ){
    require_once('lib/attachment.php'); 
}


if(site_url() == "http://localhost/wpFirstProject"){
    define("VERSION", time());
}else{
    define("VERSION", wp_get_theme()->get('Version'));
}

function alpha_bootstrapping(){
    load_theme_textdomain("alpha");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    $alpha_custom_header_details = array('width' => "1200px", 'height' => '500px', 'flex-height' => true);
    add_theme_support('custom-header', $alpha_custom_header_details);
    $alpha_custome_logo_default = array('height'=> '100px', 'width'=>'100px');
    add_theme_support('custom-logo', $alpha_custome_logo_default);
    add_theme_support('custom-background');
    register_nav_menu("alpha-topmenu", __("Alpha Top Menu", "alpha"));
    register_nav_menu("alpha-footer-menu", __("Alpha Footer Menu", "alpha"));
    add_theme_support('post-formats', array('image', 'quote', 'audio', 'video', 'link'));
    add_theme_support( 'html5', array( 'search-form' ) );

    add_image_size('alpha-square', 400, 400, array('left', 'top'));    /**true = hardcrop*/
    add_image_size('alpha-square-1', 500, 500, array('left', 'bottom'));
    add_image_size('alpha-square-2', 700, 400, array('center', 'top'));
    add_image_size('alpha-square-3', 400, 650, array('center', 'center'));
    add_image_size('alpha-square-4', 480, 480, array('right', 'top'));
    
}
add_action("after_setup_theme", "alpha_bootstrapping");

function alpha_assets(){
    
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    
    wp_enqueue_style('featherlight-css', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css');
    wp_enqueue_style('dashicons');
    wp_enqueue_style('tiny-slider-css', '//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css',null, VERSION);
    wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' );
    wp_enqueue_style("styl-css",get_stylesheet_uri(), null, VERSION);

    wp_enqueue_style('alpha-style', get_template_directory_uri().'/assets/css/alpha.css');
    wp_enqueue_script('featherlight-js', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js', array('jquery'), VERSION, true);
    wp_enqueue_script('tiny-slider-js', '//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', null, VERSION, true);
    wp_enqueue_script('alpha-main-js', get_template_directory_uri().'/assets/js/main.js', array('jquery', 'featherlight-js'), VERSION, true);
}
add_action("wp_enqueue_scripts","alpha_assets");

function alpha_sidebar(){
    register_sidebar(array(
        'name'          => __( 'Right Sidebar', 'alpha' ),
        'id'            => 'right-sidebar-1',
        'description'   => __( 'Single Page Right Sidebar', 'alpha' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name'          => __( 'Footer Left', 'alpha' ),
        'id'            => 'footer-left',
        'description'   => __( 'Footer Left Sidebar', 'alpha' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name'          => __( 'Footer Right', 'alpha' ),
        'id'            => 'footer-right',
        'description'   => __( 'Footer Right Sidebar', 'alpha' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));
}
add_action("widgets_init", "alpha_sidebar");
function alpha_the_excerpt($excerpt){
    if(!post_password_required()){
        return $excerpt;
    }else{
        return get_the_password_form();
    }
}
add_filter('the_excerpt', 'alpha_the_excerpt');

function protected_title_change(){
    return "%s";
}
add_filter("protected_title_format", "protected_title_change");

if(!function_exists('alpha_about_page_template_banner')){
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
                    </style>
                <?php
            }
        }
    }
}


add_action("wp_head","alpha_about_page_template_banner",10);

function alpha_body_class($classes){
   unset($classes[array_search("first-class", $classes)]);
   return $classes;
}
add_filter('body_class', 'alpha_body_class');


// function alpha_highlight_search_result($text){
//     if(is_search()){
//         $pattern = '/('.join('|', explode(' ', get_search_query())).')/i';
//     $text = preg_replace($pattern, '<span class="search-highlight">\0</span>', $text);
//     return $text;
//     }
// }
// add_filter('the_title','alpha_highlight_search_result');
// add_filter('the_content','alpha_highlight_search_result');
// add_filter('the_excerpt','alpha_highlight_search_result');

function alpha_image_srcset(){
    return null;
}
add_filter('wp_calculate_image_srcset', 'alpha_image_srcset');

if(!function_exists('alpha_todays_date')){
function alpha_todays_date(){
    echo date('d/m/Y');
}
}

function alpha_modify_main_query($wpq){
    if(is_home() && $wpq->is_main_query(  )){

        // $wpq->set('post__not_in', array(210));
        $wpq->set('tag__not_in', array(6));
    }
}
add_action('pre_get_posts', 'alpha_modify_main_query');

add_filter('acf/settings/show_admin', '__return_false');

function alpha_admin_assets($hook){
    if(isset($_REQUEST['post']) || isset($_REQUEST['post_ID'])){
		$post_id = empty($_REQUEST['post_ID']) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
	}
    
    
    if($hook == "post.php"){
        $post_format = get_post_format($post_id);

        wp_enqueue_script('alpha-admin-js', get_theme_file_uri('/assets/js/admin.js'), array('jquery'), time(), true);
        wp_localize_script('alpha-admin-js','alpha_pf', array('format' => $post_format));
}

}
add_action('admin_enqueue_scripts', 'alpha_admin_assets');


// 17.3 completed
  
