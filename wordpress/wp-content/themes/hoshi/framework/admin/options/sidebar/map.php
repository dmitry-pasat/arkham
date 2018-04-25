<?php

if(!function_exists('hoshi_mikado_sidebar_options_map')) {

    function hoshi_mikado_sidebar_options_map() {

        $panel_widgets = hoshi_mikado_add_admin_panel(
            array(
                'page'  => '_page_page',
                'name'  => 'panel_widgets',
                'title' => esc_html__('Widgets', 'hoshi')
            )
        );

        /**
         * Navigation style
         */
        hoshi_mikado_add_admin_field(array(
            'type'          => 'color',
            'name'          => 'sidebar_background_color',
            'default_value' => '',
            'label'         => esc_html__('Sidebar Background Color', 'hoshi'),
            'description'   => esc_html__('Choose background color for sidebar', 'hoshi'),
            'parent'        => $panel_widgets
        ));

        $group_sidebar_padding = hoshi_mikado_add_admin_group(array(
            'name'   => 'group_sidebar_padding',
            'title'  => esc_html__('Padding', 'hoshi'),
            'parent' => $panel_widgets
        ));

        $row_sidebar_padding = hoshi_mikado_add_admin_row(array(
            'name'   => 'row_sidebar_padding',
            'parent' => $group_sidebar_padding
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'sidebar_padding_top',
            'default_value' => '',
            'label'         => esc_html__('Top Padding', 'hoshi'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_sidebar_padding
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'sidebar_padding_right',
            'default_value' => '',
            'label'         => esc_html__('Right Padding', 'hoshi'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_sidebar_padding
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'sidebar_padding_bottom',
            'default_value' => '',
            'label'         => esc_html__('Bottom Padding', 'hoshi'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_sidebar_padding
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'sidebar_padding_left',
            'default_value' => '',
            'label'         => esc_html__('Left Padding', 'hoshi'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_sidebar_padding
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'select',
            'name'          => 'sidebar_alignment',
            'default_value' => '',
            'label'         => esc_html__('Text Alignment', 'hoshi'),
            'description'   => esc_html__('Choose text aligment', 'hoshi'),
            'options'       => array(
                'left'   => esc_html__('Left', 'hoshi'),
                'center' => esc_html__('Center', 'hoshi'),
                'right'  => esc_html__('Right', 'hoshi')
            ),
            'parent'        => $panel_widgets
        ));

    }

    add_action('hoshi_mikado_options_map', 'hoshi_mikado_sidebar_options_map');

}