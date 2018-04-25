<?php

if(!function_exists('hoshi_mikado_footer_options_map')) {
    /**
     * Add footer options
     */
    function hoshi_mikado_footer_options_map() {

        hoshi_mikado_add_admin_page(
            array(
                'slug'  => '_footer_page',
                'title' => esc_html__('Footer', 'hoshi'),
                'icon'  => 'icon_cone_alt'
            )
        );

        $footer_panel = hoshi_mikado_add_admin_panel(
            array(
                'title' => esc_html__('Footer', 'hoshi'),
                'name'  => 'footer',
                'page'  => '_footer_page'
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__('Uncovering Footer', 'hoshi'),
                'description'   => esc_html__('Enabling this option will make Footer gradually appear on scroll', 'hoshi'),
                'parent'        => $footer_panel,
            )
        );
        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $footer_panel,
                'type'          => 'select',
                'name'          => 'footer_style',
                'default_value' => '',
                'label'         => esc_html__('Footer Skin', 'hoshi'),
                'description'   => esc_html__('Choose Footer Skin for Footer Area', 'hoshi'),
                'options'       => array(
                    ''             => '',
                    'dark-footer'  => esc_html__('Dark', 'hoshi'),
                    'light-footer' => esc_html__('Light', 'hoshi')
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'        => 'footer_background_image',
                'type'        => 'image',
                'label'       => esc_html__('Background Image', 'hoshi'),
                'description' => esc_html__('Choose Background Image for Footer Area', 'hoshi'),
                'parent'      => $footer_panel
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'footer_in_grid',
                'default_value' => 'yes',
                'label'         => esc_html__('Footer in Grid', 'hoshi'),
                'description'   => esc_html__('Enabling this option will place Footer content in grid', 'hoshi'),
                'parent'        => $footer_panel,
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'show_footer_top',
                'default_value' => 'yes',
                'label'         => esc_html__('Show Footer Top', 'hoshi'),
                'description'   => esc_html__('Enabling this option will show Footer Top area', 'hoshi'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_show_footer_top_container'
                ),
                'parent'        => $footer_panel,
            )
        );

        $show_footer_top_container = hoshi_mikado_add_admin_container(
            array(
                'name'            => 'show_footer_top_container',
                'hidden_property' => 'show_footer_top',
                'hidden_value'    => 'no',
                'parent'          => $footer_panel
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'footer_top_columns',
                'default_value' => '4',
                'label'         => esc_html__('Footer Top Columns', 'hoshi'),
                'description'   => esc_html__('Choose number of columns for Footer Top area', 'hoshi'),
                'options'       => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '5' => '3(25%+25%+50%)',
                    '6' => '3(50%+25%+25%)',
                    '4' => '4'
                ),
                'parent'        => $show_footer_top_container,
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'footer_top_columns_alignment',
                'default_value' => '',
                'label'         => esc_html__('Footer Top Columns Alignment', 'hoshi'),
                'description'   => esc_html__('Text Alignment in Footer Columns', 'hoshi'),
                'options'       => array(
                    'left'   => esc_html__('Left', 'hoshi'),
                    'center' => esc_html__('Center', 'hoshi'),
                    'right'  => esc_html__('Right', 'hoshi')
                ),
                'parent'        => $show_footer_top_container,
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'show_footer_bottom',
                'default_value' => 'yes',
                'label'         => esc_html__('Show Footer Bottom', 'hoshi'),
                'description'   => esc_html__('Enabling this option will show Footer Bottom area', 'hoshi'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_show_footer_bottom_container'
                ),
                'parent'        => $footer_panel,
            )
        );

        $show_footer_bottom_container = hoshi_mikado_add_admin_container(
            array(
                'name'            => 'show_footer_bottom_container',
                'hidden_property' => 'show_footer_bottom',
                'hidden_value'    => 'no',
                'parent'          => $footer_panel
            )
        );


        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'footer_bottom_columns',
                'default_value' => '3',
                'label'         => esc_html__('Footer Bottom Columns', 'hoshi'),
                'description'   => esc_html__('Choose number of columns for Footer Bottom area', 'hoshi'),
                'options'       => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3'
                ),
                'parent'        => $show_footer_bottom_container,
            )
        );

    }

    add_action('hoshi_mikado_options_map', 'hoshi_mikado_footer_options_map');

}