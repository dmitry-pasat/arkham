<?php

//Create menu link
function ae_portfolio_options_menu_link(){
    add_options_page(
        'Portfolio Section Options',
        'Portfolio Section Settings',
        'manage_options',
        'ae_portfolio_options',
        'ae_portfolio_options_content'
    );
    add_action('admin_init', 'ae_portfolio_register_settings');
}

//Create options page content
function ae_portfolio_options_content(){

    //Init options global
    global $ae_portfolio_options;

    $args = array('post_type' => 'ae_portfolio_section', 'posts_per_page' => -1);
    $portfolio_section_obj = get_posts( $args );

    $post_ids_titles = wp_list_pluck( $portfolio_section_obj , 'post_title', 'ID');

    ob_start(); ?>
    <div class="wrap">
        <h2><?php _e('Portfolio Section Settings', 'ae_portfolio_domain'); ?></h2>
        <p><?php _e('Settings for the Portfolio', 'ae_portfolio_domain'); ?></p>
        <form method="post" action="options.php">
            <?php settings_fields('ae_portfolio_settings_group'); ?>
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row"><label for="ae_portfolio_settings[choosed_portfolio]"><?php _e('Choose the Portfolio Section', 'ae_portfolio_domain') ?></label></th>
                    <td>
                        <select id="ae_portfolio_settings[choosed_portfolio]" name="ae_portfolio_settings[choosed_portfolio]" id="country">
                            <?php foreach($post_ids_titles as $ids => $titles) :  ?>
                                <option value='<?php echo $ids; ?>' <?php selected($ids, $ae_portfolio_options['choosed_portfolio']); ?>><?php echo $titles; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                </tbody>
            </table>
            <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save changes', 'ae_portfolio_domain') ?>"></p>
        </form>
    </div>
    <?php
    echo ob_get_clean();
}

add_action('admin_menu', 'ae_portfolio_options_menu_link');

//Register Settings
function ae_portfolio_register_settings(){
    register_setting('ae_portfolio_settings_group', 'ae_portfolio_settings');
}