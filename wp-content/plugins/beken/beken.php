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
/**
 * Create Settings Menu
 */
function beken()
{
    include_once plugin_dir_path(__FILE__) .'./setting/gallery.php';
}

// add shortcut 
add_shortcode('gallery_1', 'beken');

function beken_settings_menu() {

    $hook = add_menu_page(
        __( 'beken Settings', 'my-plugin' ),
        __( 'beken Settings', 'my-plugin' ),
        'manage_options',
        'beken-settings-page',
        'beken_settings_template_callback',
        '',
        null
    );

    add_action( 'admin_head-'.$hook, 'beken_image_uplaoder_assets', 10, 1 );
}
add_action('admin_menu', 'beken_settings_menu');

/**
 * Enqueue Image Uploader Assets
 */
function beken_image_uplaoder_assets() {
    wp_enqueue_media();
    wp_enqueue_style( 'beken-image-uplaoder');
    wp_enqueue_script( 'beken-image-uploader' );
}


/**
 * Settings Template Page
 */
function beken_settings_template_callback() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

        <form action="options.php" method="post">
            <?php 
                // security field
                settings_fields( 'beken-settings-page' );

                // output settings section here
                do_settings_sections('beken-settings-page');

                // save settings button
                submit_button( 'Save Settings' );
            ?>
        </form>
    </div>
    <?php 
}

/**
 * Settings Template
 */
function beken_settings_init() {

    // Setup settings section
    add_settings_section(
        'beken_settings_section',
        'beken Settings Page',
        '',
        'beken-settings-page'
    );

    // Register image uploader field
    register_setting(
        'beken-settings-page',
        'beken_settings_image_uploader_field1',
        array(
            'type' => 'integer',
            'sanitize_callback' => 'sanitize_image_uploader',
            'default' => ''
        )
    );

	    // Add radio fields
		add_settings_field(
			'beken_settings_image_uploader_field1',
			__( 'Image Uplaoder', 'my-plugin' ),
			'beken_settings_image_uploader_field_callback1',
			'beken-settings-page',
			'beken_settings_section'
		);

    // Register image uploader field
    register_setting(
        'beken-settings-page',
        'beken_settings_image_uploader_field2',
        array(
            'type' => 'integer',
            'sanitize_callback' => 'sanitize_image_uploader',
            'default' => ''
        )
    );

	    // Add radio fields
		add_settings_field(
			'beken_settings_image_uploader_field2',
			__( 'Image Uplaoder', 'my-plugin' ),
			'beken_settings_image_uploader_field_callback2',
			'beken-settings-page',
			'beken_settings_section'
		);

		    // Register image uploader field
			register_setting(
				'beken-settings-page',
				'beken_settings_image_uploader_field3',
				array(
					'type' => 'integer',
					'sanitize_callback' => 'sanitize_image_uploader',
					'default' => ''
				)
			);
		
				// Add radio fields
				add_settings_field(
					'beken_settings_image_uploader_field3',
					__( 'Image Uplaoder', 'my-plugin' ),
					'beken_settings_image_uploader_field_callback3',
					'beken-settings-page',
					'beken_settings_section'
				);

				    // Register image uploader field
					register_setting(
						'beken-settings-page',
						'beken_settings_image_uploader_field4',
						array(
							'type' => 'integer',
							'sanitize_callback' => 'sanitize_image_uploader',
							'default' => ''
						)
					);
				
						// Add radio fields
						add_settings_field(
							'beken_settings_image_uploader_field4',
							__( 'Image Uplaoder', 'my-plugin' ),
							'beken_settings_image_uploader_field_callback4',
							'beken-settings-page',
							'beken_settings_section'
						);

}
add_action( 'admin_init', 'beken_settings_init' );

/**
 * Sanitize Image Uploader
 */
function sanitize_image_uploader( $value ) {
    if(isset($value)) {
        return intval($value);
    }else {
        return false;
    }
}

?>
    <?php 


/**
 * Image Uploader Template
 */
function beken_settings_image_uploader_field_callback1() {

    $beken_image_id = get_option('beken_settings_image_uploader_field1');

    ?>
    <div class="beken-upload-wrap">
        <img data-src="" src="<?php echo esc_url(wp_get_attachment_url(isset($beken_image_id) ? (int) $beken_image_id : 0)); ?>" width="250" />
        <div class="beken-upload-action">
            <input type="hidden" name="beken_settings_image_uploader_field1" value="<?php echo esc_attr(isset($beken_image_id) ? (int) $beken_image_id : 0); ?>" />
            <button type="button" class="upload_image_button"><span class="dashicons dashicons-plus"></span></button>
            <button type="button" class="remove_image_button"><span class="dashicons dashicons-minus"></span></button>
        </div>
    </div>
	<script>
	 ;(function($) {
    'use strict';
    $(document.body).on('click', '.upload_image_button', function() {

        var send_attachment_bkp = wp.media.editor.send.attachment;

        var button = $(this);

        wp.media.editor.send.attachment = function(props, attachment) {

            $(button).parent().prev().attr('src', attachment.url);

            $(button).prev().val(attachment.id);

            wp.media.editor.send.attachment = send_attachment_bkp;

        }

        wp.media.editor.open(button);

        return false;

    });



    // The "Remove" button (remove the value from input type='hidden')

    $(document.body).on('click', '.remove_image_button', function() {

        var answer = confirm('Are you sure?');

        if (answer == true) {

            var src = $(this).parent().prev().attr('data-src');

            $(this).parent().prev().attr('src', src);

            $(this).prev().prev().val('');

        }

        return false;

    });

})(jQuery);
 </script>
    <?php 
}


function beken_settings_image_uploader_field_callback2() {

    $beken_image_id = get_option('beken_settings_image_uploader_field2');

    ?>
    <div class="beken-upload-wrap">
        <img data-src="" src="<?php echo esc_url(wp_get_attachment_url(isset($beken_image_id) ? (int) $beken_image_id : 0)); ?>" width="250" />
        <div class="beken-upload-action">
            <input type="hidden" name="beken_settings_image_uploader_field2" value="<?php echo esc_attr(isset($beken_image_id) ? (int) $beken_image_id : 0); ?>" />
            <button type="button" class="upload_image_button1"><span class="dashicons dashicons-plus"></span></button>
            <button type="button" class="remove_image_button1"><span class="dashicons dashicons-minus"></span></button>
        </div>
    </div>
	<script>
	 ;(function($) {
    'use strict';
    $(document.body).on('click', '.upload_image_button1', function() {

        var send_attachment_bkp = wp.media.editor.send.attachment;

        var button = $(this);

        wp.media.editor.send.attachment = function(props, attachment) {

            $(button).parent().prev().attr('src', attachment.url);

            $(button).prev().val(attachment.id);

            wp.media.editor.send.attachment = send_attachment_bkp;

        }

        wp.media.editor.open(button);

        return false;

    });



    // The "Remove" button (remove the value from input type='hidden')

    $(document.body).on('click', '.remove_image_button1', function() {

        var answer = confirm('Are you sure?');

        if (answer == true) {

            var src = $(this).parent().prev().attr('data-src');

            $(this).parent().prev().attr('src', src);

            $(this).prev().prev().val('');

        }

        return false;

    });

})(jQuery);
 </script>
    <?php 
}


function beken_settings_image_uploader_field_callback3() {

    $beken_image_id = get_option('beken_settings_image_uploader_field3');

    ?>
    <div class="beken-upload-wrap">
        <img data-src="" src="<?php echo esc_url(wp_get_attachment_url(isset($beken_image_id) ? (int) $beken_image_id : 0)); ?>" width="250" />
        <div class="beken-upload-action">
            <input type="hidden" name="beken_settings_image_uploader_field3" value="<?php echo esc_attr(isset($beken_image_id) ? (int) $beken_image_id : 0); ?>" />
            <button type="button" class="upload_image_button2"><span class="dashicons dashicons-plus"></span></button>
            <button type="button" class="remove_image_button2"><span class="dashicons dashicons-minus"></span></button>
        </div>
    </div>
	<script>
	 ;(function($) {
    'use strict';
    $(document.body).on('click', '.upload_image_button2', function() {

        var send_attachment_bkp = wp.media.editor.send.attachment;

        var button = $(this);

        wp.media.editor.send.attachment = function(props, attachment) {

            $(button).parent().prev().attr('src', attachment.url);

            $(button).prev().val(attachment.id);

            wp.media.editor.send.attachment = send_attachment_bkp;

        }

        wp.media.editor.open(button);

        return false;

    });



    // The "Remove" button (remove the value from input type='hidden')

    $(document.body).on('click', '.remove_image_button2', function() {

        var answer = confirm('Are you sure?');

        if (answer == true) {

            var src = $(this).parent().prev().attr('data-src');

            $(this).parent().prev().attr('src', src);

            $(this).prev().prev().val('');

        }

        return false;

    });

})(jQuery);
 </script>
    <?php 
}


function beken_settings_image_uploader_field_callback4() {

    $beken_image_id = get_option('beken_settings_image_uploader_field4');

    ?>
    <div class="beken-upload-wrap">
        <img data-src="" src="<?php echo esc_url(wp_get_attachment_url(isset($beken_image_id) ? (int) $beken_image_id : 0)); ?>" width="250" />
        <div class="beken-upload-action">
            <input type="hidden" name="beken_settings_image_uploader_field4" value="<?php echo esc_attr(isset($beken_image_id) ? (int) $beken_image_id : 0); ?>" />
            <button type="button" class="upload_image_button3"><span class="dashicons dashicons-plus"></span></button>
            <button type="button" class="remove_image_button3"><span class="dashicons dashicons-minus"></span></button>
        </div>
    </div>
	<script>
	 ;(function($) {
    'use strict';
    $(document.body).on('click', '.upload_image_button3', function() {

        var send_attachment_bkp = wp.media.editor.send.attachment;

        var button = $(this);

        wp.media.editor.send.attachment = function(props, attachment) {

            $(button).parent().prev().attr('src', attachment.url);

            $(button).prev().val(attachment.id);

            wp.media.editor.send.attachment = send_attachment_bkp;

        }

        wp.media.editor.open(button);

        return false;

    });



    // The "Remove" button (remove the value from input type='hidden')

    $(document.body).on('click', '.remove_image_button3', function() {

        var answer = confirm('Are you sure?');

        if (answer == true) {

            var src = $(this).parent().prev().attr('data-src');

            $(this).parent().prev().attr('src', src);

            $(this).prev().prev().val('');

        }

        return false;

    });

})(jQuery);
 </script>
    <?php 
}
 