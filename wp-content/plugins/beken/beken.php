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
function register_mysettings() { 
    register_setting( 'myoption-group', 'new_option_name' );
    register_setting( 'myoption-group', 'some_other_option' );
    register_setting( 'myoption-group', 'option_etc' );
  }
function pluginTest_add_menu(){
    add_menu_page( 
        "contact form", 
        "Slider Form", 
        "manage_options", 
        "/contact_form", 
        "beken",
        "dashicons-feedback",
        '69'
    );
}
if (is_admin()){
add_action('admin_menu', 'pluginTest_add_menu');
add_action('admin_init', 'register_mysettings');}


function beken(){
// Save attachment ID
if ( isset( $_POST['submit_image_selector'] ) && isset( $_POST['image_attachment_id'] ) ) :
    update_option( 'media_selector_attachment_id', absint( $_POST['image_attachment_id'] ) );
endif;

wp_enqueue_media();
// image html
?><form method='post'>
    <style>
        .img{
            height : 200px;
            width: 200px;
            padding :5px
        }
        </style>
        
    <div class='image-preview-wrapper' id="body">
    <h1>Beken Slider</h1>
        <h3>Select Attribute For Your Slider Carousel</h3>
        <p> Beken Slider is the most powerful and intuitive WordPress plugin to create sliders which was never possible before.</p></br><br>

        <label for="SliderTheme"><strong>Slider Theme</strong></label>
          <input type="Text" id="SliderTheme" name="SliderTheme" value ="Defualt" ><br><br>
        <label for="SliderDimention"><strong>Slider Dimention:</strong></label>
        <input type="number" id="SliderDimention" name="SliderDimention">*
          <input type="number" id="SliderDimention1" name="SliderDimention1">px<br><br>
          <label for="speed"><strong>Slider Speed:</strong></label>
          <input type="number" id="shadow" name="shadow"><br><br>
          <label for="shadow"><strong>Shadow:</strong></label>
          <input type="number" id="border" name="border"><br><br>

    </div>
    <input id="upload_image_button" type="button" class="button" value="<?php _e( 'Upload image' ); ?>" />
    <input type='hidden' name='image_attachment_id' id='image_attachment_id' value='<?php echo get_option( 'media_selector_attachment_id' ); ?>'>
    <input type="submit" name="submit_image_selector" value="Save" class="button-primary">
</form><?php

}


?>
