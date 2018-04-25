<?php

if(!function_exists('hoshi_mikado_reset_options_map')) {
    /**
     * Reset options panel
     */
    function hoshi_mikado_reset_options_map() {

        hoshi_mikado_add_admin_page(
            array(
                'slug'  => '_reset_page',
                'title' => esc_html__('Reset', 'hoshi'),
                'icon'  => 'icon_refresh'
            )
        );

        $panel_reset = hoshi_mikado_add_admin_panel(
            array(
                'page'  => '_reset_page',
                'name'  => 'panel_reset',
                'title' => esc_html__('Reset', 'hoshi')
            )
        );

        hoshi_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'reset_to_defaults',
            'default_value' => 'no',
            'label'         => esc_html__('Reset to Defaults', 'hoshi'),
            'description'   => esc_html__('This option will reset all Mikado Options values to defaults', 'hoshi'),
            'parent'        => $panel_reset
        ));

    }

    add_action('hoshi_mikado_options_map', 'hoshi_mikado_reset_options_map', 19);

}