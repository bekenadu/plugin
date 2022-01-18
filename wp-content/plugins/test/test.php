<?php
/**
 * Plugin Name: 	test
 * Plugin URI:		http://bbb.com/
 * Description:		Add a media selector to your settings page.
 * Version: 		0.0.1
 * Author: 			Beken
 * Author URI: 		http://www.Beken.com/
 */

add_action( 'admin_menu', 'register_media_selector_settings_pages' );

function register_media_selector_settings_pages() {
    add_menu_page( 
        "contact form", 
        "TEST Form", 
        "manage_options", 
        "/test",
        "media_selector_settings_page_callbacks",
        "dashicons-cover-image",
        '69'
    );
	// add_submenu_page( 'options-general.php', 'Media Selector', 'Media Selector', 'manage_options', 'media-selector', 'media_selector_settings_page_callback' );
}

function media_selector_settings_page_callbacks() {

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


add_action( 'admin_footer', 'media_selector_print_script' );

function media_selector_print_script() {

	$my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );

	?><script type='text/javascript'>

		jQuery( document ).ready( function( $ ) {

			// Uploading files
			var file_frame;
			var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
			var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this

			jQuery('#upload_image_button').on('click', function( event ){

				event.preventDefault();

				// If the media frame already exists, reopen it.
				if ( file_frame ) {
					// Set the post ID to what we want
					file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
					// Open frame
					file_frame.open();
					return;
				} else {
					// Set the wp.media post id so the uploader grabs the ID we want when initialised
					wp.media.model.settings.post.id = set_to_post_id;
				}

				// Create the media frame.
				file_frame = wp.media.frames.file_frame = wp.media({
					title: 'Select a image to upload',
					button: {
						text: 'Use this image',
					},
					multiple: 'add',// Set to true to allow multiple files to be selected
				});

				// When an image is selected, run a callback.
				file_frame.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
                    var selection = file_frame.state().get('selection');

                var attachment_ids = selection.map( function( attachment ) {
                    attachment = attachment.toJSON();
                    return attachment;
                });
                console.log(attachment_ids);

                    for(var i=0; i<attachment_ids.length;i++){
                        var img = document.createElement('img');
                        img.classList.add("img");
            img.src = attachment_ids[i].url;
           down =  document.getElementById('body').appendChild(img);
            
                        
                    }

                   


					// $( '#image-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
					// $( '#image_attachment_id' ).val( attachment.id );
                   
					// Restore the main post ID
					wp.media.model.settings.post.id = wp_media_post_id;
				});

					// Finally, open the modal
					file_frame.open();
			});

			// Restore the main ID when the add media button is pressed
			jQuery( 'a.add_media' ).on( 'click', function() {
				wp.media.model.settings.post.id = wp_media_post_id;
			});
		});

	</script><?php

}