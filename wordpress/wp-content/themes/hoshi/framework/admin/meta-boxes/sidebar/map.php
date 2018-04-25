<?php

$custom_sidebars = hoshi_mikado_get_custom_sidebars();

$sidebar_meta_box = hoshi_mikado_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('Sidebar', 'hoshi'),
        'name'  => 'sidebar_meta'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_sidebar_meta',
        'type'        => 'select',
        'label'       => esc_html__('Layout', 'hoshi'),
        'description' => esc_html__('Choose the sidebar layout', 'hoshi'),
        'parent'      => $sidebar_meta_box,
        'options'     => array(
            ''                 => esc_html__('Default', 'hoshi'),
            'no-sidebar'       => esc_html__('No Sidebar', 'hoshi'),
            'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'hoshi'),
            'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'hoshi'),
            'sidebar-33-left'  => esc_html__('Sidebar 1/3 Left', 'hoshi'),
            'sidebar-25-left'  => esc_html__('Sidebar 1/4 Left', 'hoshi'),
        )
    )
);

if(count($custom_sidebars) > 0) {
    hoshi_mikado_add_meta_box_field(array(
        'name'        => 'mkd_custom_sidebar_meta',
        'type'        => 'selectblank',
        'label'       => esc_html__('Choose Widget Area in Sidebar', 'hoshi'),
        'description' => esc_html__('Choose Custom Widget area to display in Sidebar"', 'hoshi'),
        'parent'      => $sidebar_meta_box,
        'options'     => $custom_sidebars
    ));
}
