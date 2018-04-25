<?php

if(!function_exists('hoshi_mikado_map_portfolio_settings')) {
    function hoshi_mikado_map_portfolio_settings() {
        $meta_box = hoshi_mikado_add_meta_box(array(
            'scope' => 'portfolio-item',
            'title' => esc_html__('Portfolio Settings', 'hoshi'),
            'name'  => 'portfolio_settings_meta_box'
        ));

        hoshi_mikado_add_meta_box_field(array(
            'name'        => 'mkd_portfolio_single_template_meta',
            'type'        => 'select',
            'label'       => esc_html__('Portfolio Type', 'hoshi'),
            'description' => esc_html__('Choose a default type for Single Project pages', 'hoshi'),
            'parent'      => $meta_box,
            'options'     => array(
                ''                  => esc_html__('Default', 'hoshi'),
                'small-images'      => esc_html__('Portfolio small images', 'hoshi'),
                'small-slider'      => esc_html__('Portfolio small slider', 'hoshi'),
                'big-images'        => esc_html__('Portfolio big images', 'hoshi'),
                'big-slider'        => esc_html__('Portfolio big slider', 'hoshi'),
                'custom'            => esc_html__('Portfolio custom', 'hoshi'),
                'full-width-custom' => esc_html__('Portfolio full width custom', 'hoshi'),
                'masonry'           => esc_html__('Portfolio masonry', 'hoshi'),
                'gallery'           => esc_html__('Portfolio gallery', 'hoshi')
            )
        ));

        $all_pages = array();
        $pages     = get_pages();
        foreach($pages as $page) {
            $all_pages[$page->ID] = $page->post_title;
        }

        hoshi_mikado_add_meta_box_field(array(
            'name'        => 'portfolio_single_back_to_link',
            'type'        => 'select',
            'label'       => esc_html__('"Back To" Link', 'hoshi'),
            'description' => esc_html__('Choose "Back To" page to link from portfolio Single Project page', 'hoshi'),
            'parent'      => $meta_box,
            'options'     => $all_pages
        ));

        $group_portfolio_external_link = hoshi_mikado_add_admin_group(array(
            'name'        => 'group_portfolio_external_link',
            'title'       => esc_html__('Portfolio External Link', 'hoshi'),
            'description' => esc_html__('Enter URL to link from Portfolio List page', 'hoshi'),
            'parent'      => $meta_box
        ));

        $row_portfolio_external_link = hoshi_mikado_add_admin_row(array(
            'name'   => 'row_gradient_overlay',
            'parent' => $group_portfolio_external_link
        ));

        hoshi_mikado_add_meta_box_field(array(
            'name'        => 'portfolio_external_link',
            'type'        => 'textsimple',
            'label'       => esc_html__('Link', 'hoshi'),
            'description' => '',
            'parent'      => $row_portfolio_external_link,
            'args'        => array(
                'col_width' => 3
            )
        ));

        hoshi_mikado_add_meta_box_field(array(
            'name'        => 'portfolio_external_link_target',
            'type'        => 'selectsimple',
            'label'       => esc_html__('Target', 'hoshi'),
            'description' => '',
            'parent'      => $row_portfolio_external_link,
            'options'     => array(
                '_self'  => esc_html__('Same Window', 'hoshi'),
                '_blank' => esc_html__('New Window', 'hoshi')
            )
        ));


        hoshi_mikado_add_meta_box_field(array(
            'name'        => 'portfolio_masonry_dimenisions',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Masonry', 'hoshi'),
            'description' => esc_html__('Choose image layout when it appears in Masonry type portfolio lists', 'hoshi'),
            'parent'      => $meta_box,
            'options'     => array(
                'default'            => esc_html__('Default', 'hoshi'),
                'large_width'        => esc_html__('Large width', 'hoshi'),
                'large_height'       => esc_html__('Large height', 'hoshi'),
                'large_width_height' => esc_html__('Large width/height', 'hoshi')
            )
        ));
    }

    add_action('hoshi_mikado_meta_boxes_map', 'hoshi_mikado_map_portfolio_settings');
}