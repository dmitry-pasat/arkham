<?php

$content_bottom_meta_box = hoshi_mikado_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('Content Bottom', 'hoshi'),
        'name'  => 'content_bottom_meta'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_enable_content_bottom_area_meta',
        'type'          => 'selectblank',
        'default_value' => '',
        'label'         => esc_html__('Enable Content Bottom Area', 'hoshi'),
        'description'   => esc_html__('This option will enable Content Bottom area on pages', 'hoshi'),
        'parent'        => $content_bottom_meta_box,
        'options'       => array(
            'no'  => esc_html__('No', 'hoshi'),
            'yes' => esc_html__('Yes', 'hoshi')
        ),
        'args'          => array(
            'dependence' => true,
            'hide'       => array(
                ''   => '#mkd_mkd_show_content_bottom_meta_container',
                'no' => '#mkd_mkd_show_content_bottom_meta_container'
            ),
            'show'       => array(
                'yes' => '#mkd_mkd_show_content_bottom_meta_container'
            )
        )
    )
);

$show_content_bottom_meta_container = hoshi_mikado_add_admin_container(
    array(
        'parent'          => $content_bottom_meta_box,
        'name'            => 'mkd_show_content_bottom_meta_container',
        'hidden_property' => 'mkd_enable_content_bottom_area_meta',
        'hidden_value'    => '',
        'hidden_values'   => array('', 'no')
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_content_bottom_sidebar_custom_display_meta',
        'type'          => 'selectblank',
        'default_value' => '',
        'label'         => esc_html__('Sidebar to Display', 'hoshi'),
        'description'   => esc_html__('Choose a Content Bottom sidebar to display', 'hoshi'),
        'options'       => hoshi_mikado_get_custom_sidebars(),
        'parent'        => $show_content_bottom_meta_container
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'type'          => 'selectblank',
        'name'          => 'mkd_content_bottom_in_grid_meta',
        'default_value' => '',
        'label'         => esc_html__('Display in Grid', 'hoshi'),
        'description'   => esc_html__('Enabling this option will place Content Bottom in grid', 'hoshi'),
        'options'       => array(
            'no'  => esc_html__('No', 'hoshi'),
            'yes' => esc_html__('Yes', 'hoshi')
        ),
        'parent'        => $show_content_bottom_meta_container
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'type'          => 'color',
        'name'          => 'mkd_content_bottom_background_color_meta',
        'default_value' => '',
        'label'         => esc_html__('Background Color', 'hoshi'),
        'description'   => esc_html__('Choose a background color for Content Bottom area', 'hoshi'),
        'parent'        => $show_content_bottom_meta_container
    )
);