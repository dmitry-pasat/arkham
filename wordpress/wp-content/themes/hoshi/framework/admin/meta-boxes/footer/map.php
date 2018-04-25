<?php

$footer_meta_box = hoshi_mikado_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('Footer', 'hoshi'),
        'name'  => 'footer_meta'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_enable_footer_image_meta',
        'type'          => 'yesno',
        'default_value' => 'no',
        'label'         => esc_html__('Disable Footer Image for this Page', 'hoshi'),
        'description'   => esc_html__('Enabling this option will hide footer image on this page', 'hoshi'),
        'parent'        => $footer_meta_box,
        'args'          => array(
            'dependence'             => true,
            'dependence_hide_on_yes' => '#mkd_mkd_footer_background_image_meta',
            'dependence_show_on_yes' => ''
        )
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_footer_style_meta',
        'label'         => esc_html__('Footer Skin', 'hoshi'),
        'type'          => 'select',
        'default_value' => '',
        'description'   => esc_html__('Choose Footer Skin on single page', 'hoshi'),
        'parent'        => $footer_meta_box,
        'options'       => array(
            ''               => '',
            'default-footer' => esc_html__('Default', 'hoshi'),
            'dark-footer'    => esc_html__('Dark', 'hoshi'),
            'light-footer'   => esc_html__('Light', 'hoshi')
        )
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'            => 'mkd_footer_background_image_meta',
        'type'            => 'image',
        'label'           => esc_html__('Background Image', 'hoshi'),
        'description'     => esc_html__('Choose Background Image for Footer Area on this page', 'hoshi'),
        'parent'          => $footer_meta_box,
        'hidden_property' => 'mkd_enable_footer_background_image_meta',
        'hidden_value'    => 'yes'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'            => 'mkd_uncovering_footer_meta',
        'type'            => 'yesno',
        'default_value'   => 'no',
        'label'           => esc_html__('Enable Uncovering Footer for this Page', 'hoshi'),
        'description'     => esc_html__('Enabling this option will make uncovering Footer on this page', 'hoshi'),
        'parent'          => $footer_meta_box,
        'hidden_property' => 'mkd_enable_uncovering_footer_meta',
        'hidden_value'    => 'yes'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_disable_footer_meta',
        'type'          => 'select',
        'default_value' => 'no',
        'label'         => esc_html__('Disable Footer for this Page', 'hoshi'),
        'description'   => esc_html__('Enabling this option will hide footer on this page', 'hoshi'),
        'parent'        => $footer_meta_box,
        'options'       => array(
            ''    => '',
            'no'  => esc_html__('No', 'hoshi'),
            'yes' => esc_html__('Yes', 'hoshi')
        ),
        'args'          => array(
            "dependence" => true,
            "hide"       => array(
                ""    => "#mkd_mkd_disable_footer_meta_container",
                "no"  => "",
                "yes" => "#mkd_mkd_disable_footer_meta_container"
            ),
            "show"       => array(
                ""    => "",
                "no"  => "#mkd_mkd_disable_footer_meta_container",
                "yes" => ""
            )
        )
    )
);

$disable_footer_meta_container = hoshi_mikado_add_admin_container(
    array(
        'parent'          => $footer_meta_box,
        'name'            => 'mkd_disable_footer_meta_container',
        'hidden_property' => 'mkd_disable_footer_meta',
        'hidden_value'    => 'yes'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_show_footer_top_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Show Footer Top for this Page', 'hoshi'),
        'description'   => esc_html__('Enabling this option will show footer top on this page', 'hoshi'),
        'options'       => array(
            ''    => '',
            'no'  => esc_html__('No', 'hoshi'),
            'yes' => esc_html__('Yes', 'hoshi')
        ),
        'parent'        => $disable_footer_meta_container,
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_show_footer_bottom_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Show Footer Bottom for this Page', 'hoshi'),
        'description'   => esc_html__('Enabling this option will show footer bottom on this page', 'hoshi'),
        'options'       => array(
            ''    => '',
            'no'  => esc_html__('No', 'hoshi'),
            'yes' => esc_html__('Yes', 'hoshi')
        ),
        'parent'        => $disable_footer_meta_container,
    )
);