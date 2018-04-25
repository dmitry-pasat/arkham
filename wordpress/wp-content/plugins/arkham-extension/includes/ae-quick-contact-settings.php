<?php

//Create menu link
function ae_options_menu_link(){
    add_options_page(
        'Quick Contact Button Options',
        'Quick Contact Button',
        'manage_options',
        'ae_options',
        'ae_options_content'
    );
    add_action('admin_init', 'ae_register_settings');
}

//Create options page content
function ae_options_content(){

    //Init options global
    global $ae_options;

    $args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);
    $cf7Forms = get_posts( $args );

    $post_ids_titles = wp_list_pluck( $cf7Forms , 'post_title', 'ID');

    $completed_form_shortcodes = array();
    foreach($post_ids_titles as $product_id => $product_title){
        $completed_form_shortcodes[$product_title] = '[contact-form-7 id="'.$product_id.'" title="'.$product_title.'"]';
    }

    ob_start(); ?>
    <div class="wrap">
        <h2><?php _e('Quick Contact Button Settings', 'ae_domain'); ?></h2>
        <p><?php _e('Settings for the Quick Contact Button Plugin', 'ae_domain'); ?></p>
        <form method="post" action="options.php">
            <?php settings_fields('ae_settings_group'); ?>
            <table class="form-table">
                <tbody>

                <tr>
                    <th scope="row"><label for="ae_settings[enable]"><?php _e('Enable Button', 'ae_domain') ?></label></th>
                    <td><input name="ae_settings[enable]" type="checkbox" id="ae_settings[enable]" value="1" <?php if(isset($ae_options['enable'])){ checked('1', $ae_options['enable']); }?>></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ae_settings[choosed_form]"><?php _e('Choose the Form for Button', 'ae_domain') ?></label></th>
                    <td>
                        <select id="ae_settings[choosed_form]" name="ae_settings[choosed_form]" id="country">
                            <?php foreach($completed_form_shortcodes as $form_title => $form_shortcode) :  ?>
                            <option value='<?php echo $form_shortcode; ?>' <?php selected($form_shortcode, $ae_options['choosed_form']); ?>><?php echo $form_title; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                </tbody>
            </table>
            <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save changes', 'ae_domain') ?>"></p>
        </form>
    </div>
    <?php
    echo ob_get_clean();
}

add_action('admin_menu', 'ae_options_menu_link');

//Register Settings
function ae_register_settings(){
    register_setting('ae_settings_group', 'ae_settings');
}