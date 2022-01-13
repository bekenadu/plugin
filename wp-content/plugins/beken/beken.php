<?php
/*
Plugin Name: beken
Plugin URI : www.a.com
Description: Rad Demo for plugin development date jan 3, 2022 11:29
version: 1.0.0
Author: beken A.
license: GPL2
*/
if (!defined('ABSPATH')){
    die("Hey, what you think you doing");
}



function pluginTest_add_form(){
    require_once plugin_dir_path(__FILE__).'setting/gallery.php';

}

add_shortcode('gallary_shortcode', 'pluginTest_add_form');


function displayCode(){
    require_once plugin_dir_path(__FILE__).'setting/st.php';

}
function pluginTest_add_menu(){
    add_menu_page( 
        "contact form", 
        "Slider Form", 
        "manage_options", 
        "/contact_form", 
        "displayCode",
        "dashicons-feedback",
        '69'
    );
}

add_action('admin_menu', 'pluginTest_add_menu');
?>
