<?php 
function mollyBrand_bootstrapping(){
    load_theme_textdomain("mollyBrand");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    register_nav_menu("mainmenu", __("Main Menu", "mollyBrand"));
    register_nav_menu("footermenu", __("Footer Menu", "mollyBrand"));
    require_once get_template_directory() . '/lib/class-wp-bootstrap-navwalker.php';
}
add_action("after_setup_theme", "mollyBrand_bootstrapping");


