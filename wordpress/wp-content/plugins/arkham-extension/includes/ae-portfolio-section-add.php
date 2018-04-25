<?php

add_action( 'admin_menu', 'ae_portfolio_section_submenu', 20 );

function ae_portfolio_section_submenu()
{
    add_action('admin_init', 'ae_portfolio_section_register_portfolio');

    add_submenu_page(
        'portfolio_section',
        'Portfolio Add New Item',
        'Portfolio Add New',
        'manage_options',
        'portfolio_section/add-edit',
        'ae_portfolio_section_content_add',
        'dashicons-tickets',
        6
    );

}

function ae_portfolio_section_content_add(){

    $admin_url = admin_url();

    global $post_type_object;
    $post_type_object = get_post_type_object('ae_portfolio_section');
    $post_type = $post_type_object->name;

    $portfolio_section_post_id = $_GET['post_id'];
    $portfolio_section_post_updated = $_GET['success'];

    if(isset($portfolio_section_post_id) && !empty($portfolio_section_post_id)){

        //get post data
        $get_portfolio_section_by_postid = get_post( $portfolio_section_post_id );

        $get_portfolio_section_post_id = $get_portfolio_section_by_postid->ID;
        $get_portfolio_section_post_title = $get_portfolio_section_by_postid->post_title;
        $get_portfolio_section_post_content = $get_portfolio_section_by_postid->post_content;

        //get post meta data
        $get_portfolio_section_metadata_by_postid = get_post_meta( $portfolio_section_post_id );

        $get_portfolio_section_metadata_take = array();

        foreach($get_portfolio_section_metadata_by_postid as $key => $value){
            $get_portfolio_section_metadata_take[$key] = $value[0];
        }
        //print_r($get_portfolio_section_metadata_by_postid);
        $metadata_take_desktop_path = $get_portfolio_section_metadata_take['desktop_path'];
        $metadata_take_tablet_path = $get_portfolio_section_metadata_take['tablet_path'];
        $metadata_take_mobile_path = $get_portfolio_section_metadata_take['mobile_path'];
        $metadata_take_logo_client_path = $get_portfolio_section_metadata_take['logo_client_path'];

        $metadata_take_testimonial_text_meta = $get_portfolio_section_metadata_take['testimonial_text_meta'];
        $metadata_take_testimonial_person_name_meta = $get_portfolio_section_metadata_take['testimonial_person_name_meta'];
        $metadata_take_testimonial_person_title_meta = $get_portfolio_section_metadata_take['testimonial_person_title_meta'];

    }

    if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['submit'] )) {

//store our post vars into variables for later use
//now would be a good time to run some basic error checking/validation
//to ensure that data for these values have been set

        $post_id     = $_POST['ae_portfolio_section_id'];
        $title     = $_POST['ae_portfolio_section_title'];
        $content   = $_POST['ae_portfolio_section_description'];
        //$post_type = 'my_custom_post';
        $custom_field_desktop = $_POST['ae_portfolio_section_desktop'];
        $custom_field_tablet = $_POST['ae_portfolio_section_tablet'];
        $custom_field_mobile = $_POST['ae_portfolio_section_mobile'];
        $custom_field_logo = $_POST['ae_portfolio_section_logo'];

        $testimonial_person_name = $_POST['ae_portfolio_section_testimonial_person_name'];
        $testimonial_person_title = $_POST['ae_portfolio_section_testimonial_person_title'];
        $testimonial_text = $_POST['ae_portfolio_section_testimonial_text'];

        if(isset($portfolio_section_post_id) && !empty($portfolio_section_post_id)){

            $update_post = array(
                'ID'    => $post_id,
                'post_title'    => $title,
                'post_content'  => $content,
                'post_status'   => 'publish',
                'post_type'     => $post_type
            );
            // Update the post into the database

            wp_update_post( $update_post );

            //update post meta
            update_post_meta( $post_id, 'desktop_path', $custom_field_desktop, $metadata_take_desktop_path );
            update_post_meta( $post_id, 'tablet_path', $custom_field_tablet, $metadata_take_tablet_path );
            update_post_meta( $post_id, 'mobile_path', $custom_field_mobile, $metadata_take_mobile_path );
            update_post_meta( $post_id, 'logo_client_path', $custom_field_logo, $metadata_take_logo_client_path );

            update_post_meta( $post_id, 'testimonial_text_meta', $testimonial_text, $metadata_take_testimonial_text_meta );
            update_post_meta( $post_id, 'testimonial_person_name_meta', $testimonial_person_name, $metadata_take_testimonial_person_name_meta );
            update_post_meta( $post_id, 'testimonial_person_title_meta', $testimonial_person_title, $metadata_take_testimonial_person_title_meta );

            $portfolio_section_current_url = admin_url() .'admin.php?page=portfolio_section/add-edit&post_id="'. $portfolio_section_post_id .'"&action=edit&success=updated';

            wp_redirect($portfolio_section_current_url);
            exit;
        } else {

            //the array of arguements to be inserted with wp_insert_post
            $new_post = array(
                'post_title'    => $title,
                'post_content'  => $content,
                'post_status'   => 'publish',
                'post_type'     => $post_type
             );

            //insert the the post into database by passing $new_post to wp_insert_post
            //store our post ID in a variable $pid
            $pid = wp_insert_post($new_post);

            //we now use $pid (post id) to help add out post meta data
            add_post_meta($pid, 'desktop_path', $custom_field_desktop, true);
            add_post_meta($pid, 'tablet_path', $custom_field_tablet, true);
            add_post_meta($pid, 'mobile_path', $custom_field_mobile, true);
            add_post_meta($pid, 'logo_client_path', $custom_field_logo, true);
            add_post_meta($pid, 'logo_client_path', $custom_field_logo, true);

            add_post_meta($pid, 'testimonial_text_meta', $testimonial_text, true);
            add_post_meta($pid, 'testimonial_person_name_meta', $testimonial_person_name, true);
            add_post_meta($pid, 'testimonial_person_title_meta', $testimonial_person_title, true);

             //Redirect on successful saving

            $portfolio_section_added_url = admin_url() .'admin.php?page=portfolio_section/add-edit&post_id="'. $pid .'"&action=edit&success=added';

            if($pid){
                wp_redirect( $portfolio_section_added_url  );
                exit;
            }
        }
    }

    ob_start(); ?>
    <div class="wrap">
        <div id="portfolio-message" class="updated notice notice-success is-dismissible" style="display:<?php if(isset($portfolio_section_post_updated)){?> block; <?php } else { ?> none; <?php } ?>">
            <p>Beitrag veröffentlicht.
                <a href="#">Beitrag ansehen</a>
            </p>
            <button type="button" class="notice-dismiss"><span class="screen-reader-text">Diese Meldung verwerfen.</span></button>
        </div>
        <h1 class="wp-heading-inline"><?php if(isset($portfolio_section_post_id)){ _e('Edit Portfolio', 'ae_domain'); } else{ _e('Add New Portfolio', 'ae_domain'); }  ?></h1>
        <?php if(isset($portfolio_section_post_id)): ?>
            <a href="<?php echo $admin_url .'admin.php?page=portfolio_section/add-edit'; ?>" class="page-title-action">Erstellen</a>
        <?php endif;?>
        <div id="portfolio-message" class="updated notice notice-success is-dismissible" style="display:none;">
            <p>Beitrag aktualisiert.
                <a href="#">Beitrag ansehen</a>
            </p>
            <button type="button" class="notice-dismiss"><span class="screen-reader-text">Diese Meldung verwerfen.</span></button>
        </div>
        <form id="form-portfolio" method="post" action="">
            <?php get_post_field('ae_portfolio_section_post_group'); ?>

            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-2">
                    <div id="post-body-content">
                        <div id="titlediv">
                            <div id="titlewrap">
                                <input name="ae_portfolio_section_title" type="text" id="ae_portfolio_section_title" value="<?php if(isset($get_portfolio_section_post_title)){ echo $get_portfolio_section_post_title; } ?>" >
                                <input type="hidden" name="ae_portfolio_section_id" type="text" id="ae_portfolio_section_id" value="<?php if(isset($get_portfolio_section_post_id)){ echo $get_portfolio_section_post_id; } ?>" >
                            </div>
                        </div>
                        <div id="postdivrich" class="postarea wp-editor-expand">
                            <?php
                                if(isset($get_portfolio_section_post_content) && !empty($get_portfolio_section_post_content)){
                                    $content = $get_portfolio_section_post_content;
                                } else{
                                    $content = '';
                                }

                                $editor_id = 'ae_portfolio_section_description';
                                wp_editor( $content, $editor_id, $settings = array("textarea_rows" => 12 ) );
                            ?>
                        </div>

                        <div id="testimonial">

                           <div id="postbox-container-2" class="postbox-container">
                               <div id="normal-sortables" class="meta-box-sortables ui-sortable">
                                   <div id="mymetabox_revslider_0" class="postbox closed">
                                       <button type="button" class="handlediv" aria-expanded="true">
                                           <span class="screen-reader-text">Bedienfeld umschalten: Revolution Slider Options</span>
                                           <span id="toggle-testimonial-down" class="toggle-indicator" aria-hidden="true"></span>
                                           <span id="toggle-testimonial-up" style="display:none;" class="toggle-indicator" aria-hidden="true"></span>
                                           </button>
                                            <h2 class="hndle ui-sortable-handle"><span><?php _e('Testimonials', 'ae_domain'); ?></span></h2>
                                       <div id="testimonial-area" class="inside">
                                           <div class="testimonial-block">
                                               <h4>Name</h4>
                                               <p>Person Name</p>
                                               <input name="ae_portfolio_section_testimonial_person_name" type="text" id="ae_portfolio_section_testimonial_person_name" value="<?php if(isset($metadata_take_testimonial_person_name_meta)){ echo $metadata_take_testimonial_person_name_meta; } ?>" >

                                           </div>

                                           <div class="testimonial-block">
                                               <h4>Title</h4>
                                               <p>Person Title</p>
                                               <input name="ae_portfolio_section_testimonial_person_title" type="text" id="ae_portfolio_section_testimonial_person_title" value="<?php if(isset($metadata_take_testimonial_person_title_meta)){ echo $metadata_take_testimonial_person_title_meta; } ?>" >
                                           </div>

                                           <div class="testimonial-block">
                                               <h4>Text</h4>
                                               <p>Testimonial text</p>
                                               <textarea name="ae_portfolio_section_testimonial_text" type="text" id="ae_portfolio_section_testimonial_text" rows="10" cols="90" ><?php if(isset($metadata_take_testimonial_text_meta)){ echo $metadata_take_testimonial_text_meta; } ?></textarea>                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>

                <div id="postbox-container-1" class="postbox-container">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                        <div id="postimagediv-desktop" class="postbox closed">
                            <button type="button" class="handlediv" aria-expanded="true"><span class="screen-reader-text">Bedienfeld umschalten: Beitragsbild</span>
                                <span id="toggle-desktop-down" class="toggle-indicator" aria-hidden="true"></span>
                                <span id="toggle-desktop-up" style="display:none;" class="toggle-indicator" aria-hidden="true"></span>
                            </button>
                            <h2 class="hndle ui-sortable-handle">
                                <span><?php _e('Screenshot Desktop', 'ae_domain'); ?></span>
                            </h2>
                            <div id="desktop-screen" class="inside" style="display:none;">
                                <p class="hide-if-no-js">
                                    <?php wp_enqueue_media(); ?>
                                    <img id='image-preview-desktop' style="<?php if(empty($metadata_take_desktop_path)) echo 'display:none;'; ?>"  width="266" height="266" src="<?php if(isset($metadata_take_desktop_path)){ echo $metadata_take_desktop_path; } else{ echo get_option( 'media_selector_attachment_id' ); } ?>" class="attachment-266x266 size-266x266" alt="a">
                                </p>
                                <p class="hide-if-no-js howto" id="set-post-thumbnail-desc">Bild zum Bearbeiten oder Ändern anklicken.</p>
                                <p class="hide-if-no-js">
                                    <a href="#" id="upload_image_button_desktop" >Beitragsbild entfernen</a>
                                    <input type='hidden' name='ae_portfolio_section_desktop' id='image_attachment_desktop' value='<?php if(isset($metadata_take_desktop_path)){ echo $metadata_take_desktop_path; } else{ echo get_option( 'media_selector_attachment_id' ); } ?>'>
                                </p>
                            </div>
                        </div>
                        <div id="postimagediv-tablet" class="postbox closed">
                            <button type="button" class="handlediv" aria-expanded="false">
                                <span class="screen-reader-text">Bedienfeld umschalten: Beitragsbild</span>
                                <span id="toggle-tablet-down" class="toggle-indicator" aria-hidden="true"></span>
                                <span id="toggle-tablet-up" style="display:none;" class="toggle-indicator" aria-hidden="true"></span>
                            </button>
                            <h2 class="hndle ui-sortable-handle"><span><?php _e('Screenshot Tablet', 'ae_domain'); ?></span></h2>
                            <div id="tablet-screen" class="inside" style="display:none;">
                                <p class="hide-if-no-js">
                                    <img id='image-preview-tablet' style="<?php if(empty($metadata_take_tablet_path)) echo 'display:none;'; ?>"  width="266" height="266" src="<?php if(isset($metadata_take_tablet_path)){ echo $metadata_take_tablet_path; } else{ echo get_option( 'media_selector_attachment_id' ); } ?>" class="attachment-266x266 size-266x266" alt="a">
                                </p>
                                <p class="hide-if-no-js howto" id="set-post-thumbnail-tablet">Bild zum Bearbeiten oder Ändern anklicken.</p>
                                <p class="hide-if-no-js">
                                    <a href="#" id="upload_image_button_tablet" >Beitragsbild entfernen</a>
                                    <input type='hidden' name='ae_portfolio_section_tablet' id='image_attachment_tablet' value='<?php if(isset($metadata_take_tablet_path)){ echo $metadata_take_tablet_path; } else{ echo get_option( 'media_selector_attachment_id' ); } ?>'>
                                </p>
                            </div>
                        </div>
                        <div id="postimagediv-mobile" class="postbox closed">
                            <button type="button" class="handlediv" aria-expanded="true">
                                <span class="screen-reader-text">Bedienfeld umschalten: Beitragsbild</span>
                                <span id="toggle-mobile-down" class="toggle-indicator" aria-hidden="true"></span>
                                <span id="toggle-mobile-up" style="display:none;" class="toggle-indicator" aria-hidden="true"></span>
                            </button>
                            <h2 class="hndle ui-sortable-handle"><span><?php _e('Screenshot Mobile', 'ae_domain'); ?></span></h2>
                            <div id="mobile-screen" class="inside" style="display:none;">
                                <p class="hide-if-no-js">
                                    <img id='image-preview-mobile' style="<?php if(empty($metadata_take_mobile_path)) echo 'display:none;'; ?>"  width="266" height="266" src="<?php if(isset($metadata_take_mobile_path)){ echo $metadata_take_mobile_path; } else{ echo get_option( 'media_selector_attachment_id' ); } ?>" class="attachment-266x266 size-266x266" alt="a">
                                </p>
                                <p class="hide-if-no-js howto" id="set-post-thumbnail-mobile">Bild zum Bearbeiten oder Ändern anklicken.</p>
                                <p class="hide-if-no-js">
                                    <a href="#" id="upload_image_button_mobile" >Beitragsbild entfernen</a>
                                    <input type='hidden' name='ae_portfolio_section_mobile' id='image_attachment_mobile' value='<?php if(isset($metadata_take_mobile_path)){ echo $metadata_take_mobile_path; } else{ echo get_option( 'media_selector_attachment_id' ); } ?>'>
                                </p>
                            </div>
                        </div>
                        <div id="postimagediv-logo" class="postbox closed">
                            <button type="button" class="handlediv" aria-expanded="true">
                                <span class="screen-reader-text">Bedienfeld umschalten: Beitragsbild</span>
                                <span id="toggle-logo-down" class="toggle-indicator" aria-hidden="true"></span>
                                <span id="toggle-logo-up" style="display:none;" class="toggle-indicator" aria-hidden="true"></span>
                            </button>
                            <h2 class="hndle ui-sortable-handle"><span><?php _e('Logo Client', 'ae_domain'); ?></span></h2>
                            <div id="logo-screen" class="inside" style="display:none;">
                                <p class="hide-if-no-js">
                                    <img id='image-preview-logo' style="<?php if(empty($metadata_take_logo_client_path)) echo 'display:none;'; ?>"  width="266" height="266" src="<?php if(isset($metadata_take_logo_client_path)){ echo $metadata_take_logo_client_path; } else{ echo get_option( 'media_selector_attachment_id' ); } ?>" class="attachment-266x266 size-266x266" alt="a">
                                </p>
                                <p class="hide-if-no-js howto" id="set-post-thumbnail-logo">Bild zum Bearbeiten oder Ändern anklicken.</p>
                                <p class="hide-if-no-js">
                                    <a href="#" id="upload_image_button_logo" >Beitragsbild entfernen</a>
                                    <input type='hidden' name='ae_portfolio_section_logo' id='image_attachment_logo' value='<?php if(isset($metadata_take_logo_client_path)){ echo $metadata_take_logo_client_path; } else{ echo get_option( 'media_selector_attachment_id' ); } ?>'>
                                </p>
                            </div>
                        </div>
                        <div>
                            <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save changes', 'ae_domain') ?>"></p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
    echo ob_get_clean();
}

//Register Portfolio Post Types
function ae_portfolio_section_register_portfolio(){

    //register_post_type('ae_portfolio_section', 'ae_portfolio_section_post');

    register_post_type( 'ae_portfolio_section',
        // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Movies' ),
                'singular_name' => __( 'Movie' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'ae_portfolio_section'),
        )
    );
}

//Desktop Screenshot Scripts
add_action( 'admin_footer', 'media_selector_print_desktop_scripts');

function media_selector_print_desktop_scripts() {
    $my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );
    ?><script type='text/javascript'>
        jQuery( document ).ready( function( $ ) {
            // Uploading files
            var file_frame;
            var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
            var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this
            jQuery('#upload_image_button_desktop').on('click', function( event ){

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
                    multiple: false	// Set to true to allow multiple files to be selected
                });
                // When an image is selected, run a callback.
                file_frame.on( 'select', function() {
                    // We set multiple to false so only get one image from the uploader
                    attachment = file_frame.state().get('selection').first().toJSON();
                    // Do something with attachment.id and/or attachment.url here

                    $( '#image-preview-desktop' ).attr( 'src', attachment.url );
                    $( '#image-preview-desktop').show();
                    $( '#image_attachment_desktop' ).val( attachment.url );

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

//Tablet Screenshot Scripts
add_action( 'admin_footer', 'media_selector_print_tablet_scripts');

function media_selector_print_tablet_scripts() {
    $my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );
    ?><script type='text/javascript'>
        jQuery( document ).ready( function( $ ) {
            // Uploading files
            var file_frame;
            var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
            var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this
            jQuery('#upload_image_button_tablet').on('click', function( event ){

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
                    multiple: false	// Set to true to allow multiple files to be selected
                });
                // When an image is selected, run a callback.
                file_frame.on( 'select', function() {
                    // We set multiple to false so only get one image from the uploader
                    attachment = file_frame.state().get('selection').first().toJSON();
                    // Do something with attachment.id and/or attachment.url here

                    $( '#image-preview-tablet' ).attr( 'src', attachment.url );
                    $( '#image-preview-tablet' ).show();
                    $( '#image_attachment_tablet' ).val( attachment.url );

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

//Mobile Screenshot Scripts
add_action( 'admin_footer', 'media_selector_print_mobile_scripts');

function media_selector_print_mobile_scripts() {
    $my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );
    ?><script type='text/javascript'>
        jQuery( document ).ready( function( $ ) {
            // Uploading files
            var file_frame;
            var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
            var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this
            jQuery('#upload_image_button_mobile').on('click', function( event ){

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
                    multiple: false	// Set to true to allow multiple files to be selected
                });
                // When an image is selected, run a callback.
                file_frame.on( 'select', function() {
                    // We set multiple to false so only get one image from the uploader
                    attachment = file_frame.state().get('selection').first().toJSON();
                    // Do something with attachment.id and/or attachment.url here

                    $( '#image-preview-mobile' ).attr( 'src', attachment.url );
                    $( '#image-preview-mobile' ).show();
                    $( '#image_attachment_mobile' ).val( attachment.url );

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

//Logo Client Scripts
add_action( 'admin_footer', 'media_selector_print_logo_scripts');

function media_selector_print_logo_scripts() {
    $my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );
    ?><script type='text/javascript'>
        jQuery( document ).ready( function( $ ) {
            // Uploading files
            var file_frame;
            var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
            var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this
            jQuery('#upload_image_button_logo').on('click', function( event ){

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
                    multiple: false	// Set to true to allow multiple files to be selected
                });
                // When an image is selected, run a callback.
                file_frame.on( 'select', function() {
                    // We set multiple to false so only get one image from the uploader
                    attachment = file_frame.state().get('selection').first().toJSON();
                    // Do something with attachment.id and/or attachment.url here

                    $( '#image-preview-logo' ).attr( 'src', attachment.url );
                    $( '#image-preview-logo' ).show();
                    $( '#image_attachment_logo' ).val( attachment.url );

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

//Logo Client Scripts
add_action( 'admin_footer', 'portfolio_custom_styles');

function portfolio_custom_styles() {

    ?>

   <style>
       #form-portfolio input[type="text"]{
           padding: 3px 8px;
           font-size: 1.7em;
           line-height: 100%;
           height: 1.7em;
           width: 100%;
           outline: 0;
           margin: 0 0 3px;
           background-color: #fff;
       }
       #form-portfolio textarea{
           font-size: 16px;
           width: 100%;
           margin: 32px 0;
       }

       #form-portfolio #post-body.columns-2 {
           margin-right: 303px;
       }

       #form-portfolio #postbox-container-1{
           float: right;
           width: 280px;
       }
       #form-portfolio #side-sortables{
           width: 280px;
           min-height: 250px;
       }
       #form-portfolio #poststuff #postbox-container-2 {
           width: 100%;
       }
        #form-portfolio .testimonial-block{
            padding: 15px 20px 15px 0;
            display: block;
            height: 100%;
            vertical-align: middle;
        }
       #form-portfolio .testimonial-block h4{
           margin:0;
       }
       #form-portfolio .testimonial-block p{
           display:inline;
           opacity: 0.5;
       }
       #form-portfolio .testimonial-block input{
           width: 73%;
           position: relative;
           margin-left: 66px;
       }
       #form-portfolio #testimonial{
           margin-top: 28px;
       }

    </style>

    <?php
}

add_action( 'admin_footer', 'portfolio_custom_scripts');

function portfolio_custom_scripts(){

    ?>
        <script>
            jQuery( document ).ready(function() {

                //Desktop toggle
                jQuery("#toggle-desktop-down").click(function(){
                    jQuery("#toggle-desktop-up").show();
                    jQuery("#toggle-desktop-down").hide();
                    jQuery("#desktop-screen").show();

                   jQuery("#toggle-desktop-down").parent().parent().removeClass("closed");
                })
                jQuery("#toggle-desktop-up").click(function(){
                    jQuery("#toggle-desktop-down").show();
                    jQuery("#toggle-desktop-up").hide();
                    jQuery("#desktop-screen").hide();

                    jQuery("#toggle-desktop-down").parent().parent().addClass("closed");
                })

                //Tablet toggle
                jQuery("#toggle-tablet-down").click(function(){
                    jQuery("#toggle-tablet-up").show();
                    jQuery("#toggle-tablet-down").hide();
                    jQuery("#tablet-screen").show();

                    jQuery("#toggle-tablet-down").parent().parent().removeClass("closed");
                })
                jQuery("#toggle-tablet-up").click(function(){
                    jQuery("#toggle-tablet-down").show();
                    jQuery("#toggle-tablet-up").hide();
                    jQuery("#tablet-screen").hide();

                    jQuery("#toggle-tablet-down").parent().parent().addClass("closed");
                })

                //Mobile toggle
                jQuery("#toggle-mobile-down").click(function(){
                    jQuery("#toggle-mobile-up").show();
                    jQuery("#toggle-mobile-down").hide();
                    jQuery("#mobile-screen").show();

                    jQuery("#toggle-mobile-down").parent().parent().removeClass("closed");
                })
                jQuery("#toggle-mobile-up").click(function(){
                    jQuery("#toggle-mobile-down").show();
                    jQuery("#toggle-mobile-up").hide();
                    jQuery("#mobile-screen").hide();

                    jQuery("#toggle-mobile-down").parent().parent().addClass("closed");
                })

                //LOgo toggle
                jQuery("#toggle-logo-down").click(function(){
                    jQuery("#toggle-logo-up").show();
                    jQuery("#toggle-logo-down").hide();
                    jQuery("#logo-screen").show();

                    jQuery("#toggle-logo-down").parent().parent().removeClass("closed");
                })
                jQuery("#toggle-logo-up").click(function(){
                    jQuery("#toggle-logo-down").show();
                    jQuery("#toggle-logo-up").hide();
                    jQuery("#logo-screen").hide();

                    jQuery("#toggle-logo-down").parent().parent().addClass("closed");
                })

                //Testimonial toggle
                jQuery("#toggle-testimonial-down").click(function(){
                    jQuery("#toggle-testimonial-up").show();
                    jQuery("#toggle-testimonial-down").hide();
                    jQuery("#testimonial-area").show();

                    jQuery("#toggle-testimonial-down").parent().parent().removeClass("closed");
                })
                jQuery("#toggle-testimonial-up").click(function(){
                    jQuery("#toggle-testimonial-down").show();
                    jQuery("#toggle-testimonial-up").hide();
                    jQuery("#testimonial-area").hide();

                    jQuery("#toggle-testimonial-down").parent().parent().addClass("closed");
                })


            });
        </script>
    <?php

}