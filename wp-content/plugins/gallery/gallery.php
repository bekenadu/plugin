<?php 
/*
Plugin Name : gallery
Plugin URI:
Description : This Is a plugin made for small project as a demo
Author: Beken
Authour URI: https://youtube.com
Version: 1:0
License: GPLv2 or later
Text Domain: gallery
*/

if ( ! defined( 'ABSPATH' ) ) {
    die;
}


class gallery {
    // methods
    function activate(){

    }
    function deactivate(){

    }
    function uninstall(){

    }

}
if (class_exists( 'gallery' ) ){
    $galleryPlugin = new gallery();
}

//activation
regiter_activation_hook(--FILE__,array( b ))



