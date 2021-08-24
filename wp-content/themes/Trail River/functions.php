<?php 
function tr_bootstrapping(){
    load_theme_textdomain("trail-river");
    add_theme_support("post-thumbnails");
    register_nav_menu("mainmenu", __("Main Menu", "trail-river"));
    register_nav_menu("footermenu", __("Footer Menu", "trail-river"));
}
add_action("after_setup_theme", "tr_bootstrapping");