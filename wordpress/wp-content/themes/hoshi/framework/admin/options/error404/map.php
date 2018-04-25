<?php

if(!function_exists('hoshi_mikado_error_404_options_map')) {

    function hoshi_mikado_error_404_options_map() {

        hoshi_mikado_add_admin_page(array(
            'slug'  => '__404_error_page',
            'title' => esc_html__('404 Error Page', 'hoshi'),
            'icon'  => 'icon_info_alt'
        ));

        $panel_404_options = hoshi_mikado_add_admin_panel(array(
            'page'  => '__404_error_page',
            'name'  => 'panel_404_options',
            'title' => esc_html__('404 Page Option', 'hoshi')
        ));

        hoshi_mikado_add_admin_field(array(
            'parent' => $panel_404_options,
            'type' => 'image',
            'name' => '404_image',
            'default_value' => MIKADO_ASSETS_ROOT."/css/img/image404.jpg",
            'label' => esc_html__('Background Image', 'hoshi'),
            'description' => esc_html__('Set background image for 404 page', 'hoshi'),
        ));

        hoshi_mikado_add_admin_field(array(
            'parent'        => $panel_404_options,
            'type'          => 'text',
            'name'          => '404_title',
            'default_value' => '',
            'label'         => esc_html__('Title', 'hoshi'),
            'description'   => esc_html__('Enter title for 404 page', 'hoshi')
        ));

        hoshi_mikado_add_admin_field(array(
            'parent'        => $panel_404_options,
            'type'          => 'text',
            'name'          => '404_text',
            'default_value' => '',
            'label'         => esc_html__('Text', 'hoshi'),
            'description'   => esc_html__('Enter text for 404 page', 'hoshi')
        ));

        hoshi_mikado_add_admin_field(array(
            'parent'        => $panel_404_options,
            'type'          => 'text',
            'name'          => '404_back_to_home',
            'default_value' => '',
            'label'         => esc_html__('Back to Home Button Label', 'hoshi'),
            'description'   => esc_html__('Enter label for "Back to Home" button', 'hoshi')
        ));

    }

    add_action('hoshi_mikado_options_map', 'hoshi_mikado_error_404_options_map', 17);

}