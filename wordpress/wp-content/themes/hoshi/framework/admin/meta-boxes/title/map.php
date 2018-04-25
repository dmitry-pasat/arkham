<?php

$title_meta_box = hoshi_mikado_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('Title', 'hoshi'),
        'name'  => 'title_meta'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_show_title_area_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Show Title Area', 'hoshi'),
        'description'   => esc_html__('Disabling this option will turn off page title area', 'hoshi'),
        'parent'        => $title_meta_box,
        'options'       => array(
            ''    => '',
            'no'  => esc_html__('No', 'hoshi'),
            'yes' => esc_html__('Yes', 'hoshi')
        ),
        'args'          => array(
            "dependence" => true,
            "hide"       => array(
                ""    => "",
                "no"  => "#mkd_mkd_show_title_area_meta_container",
                "yes" => ""
            ),
            "show"       => array(
                ""    => "#mkd_mkd_show_title_area_meta_container",
                "no"  => "",
                "yes" => "#mkd_mkd_show_title_area_meta_container"
            )
        )
    )
);

$show_title_area_meta_container = hoshi_mikado_add_admin_container(
    array(
        'parent'          => $title_meta_box,
        'name'            => 'mkd_show_title_area_meta_container',
        'hidden_property' => 'mkd_show_title_area_meta',
        'hidden_value'    => 'no'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_title_area_type_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Title Area Type', 'hoshi'),
        'description'   => esc_html__('Choose title type', 'hoshi'),
        'parent'        => $show_title_area_meta_container,
        'options'       => array(
            ''           => '',
            'standard'   => esc_html__('Standard', 'hoshi'),
            'breadcrumb' => esc_html__('Breadcrumb', 'hoshi')
        ),
        'args'          => array(
            "dependence" => true,
            "hide"       => array(
                "standard"   => "",
                "standard"   => "",
                "breadcrumb" => "#mkd_mkd_title_area_type_meta_container"
            ),
            "show"       => array(
                ""           => "#mkd_mkd_title_area_type_meta_container",
                "standard"   => "#mkd_mkd_title_area_type_meta_container",
                "breadcrumb" => ""
            )
        )
    )
);

$title_area_type_meta_container = hoshi_mikado_add_admin_container(
    array(
        'parent'          => $show_title_area_meta_container,
        'name'            => 'mkd_title_area_type_meta_container',
        'hidden_property' => 'mkd_title_area_type_meta',
        'hidden_value'    => '',
        'hidden_values'   => array('breadcrumb'),
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_title_area_enable_breadcrumbs_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Enable Breadcrumbs', 'hoshi'),
        'description'   => esc_html__('This option will display Breadcrumbs in Title Area', 'hoshi'),
        'parent'        => $title_area_type_meta_container,
        'options'       => array(
            ''    => '',
            'no'  => esc_html__('No', 'hoshi'),
            'yes' => esc_html('Yes', 'hoshi')
        ),
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'			=> 'mkd_title_area_text_size_meta',
        'type'			=> 'select',
        'default_value'	=> '',
        'label'			=> esc_html__('Text Size', 'hoshi'),
        'description'	=> esc_html__('Choose a default Title size', 'hoshi'),
        'parent'		=> $show_title_area_meta_container,
        'options'		=> array(
            '' => '',
            'small'     => esc_html__('Small','hoshi'),
            'medium'    => esc_html__('Medium','hoshi'),
            'large'     => esc_html__('Large','hoshi')


        )
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_title_area_gradient_overaly_animation_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Animated Gradient Overlay', 'hoshi'),
        'description'   => esc_html__('Show animated gradient overlay for Title Area', 'hoshi'),
        'parent'        => $show_title_area_meta_container,
        'options'       => array(
            ''    => '',
            'no'  => esc_html__('No', 'hoshi'),
            'yes' => esc_html('Yes', 'hoshi')
        ),
        'args'          => array(
            "dependence" => true,
            "hide"       => array(
                ""    => "#mkd_title_area_gradient_overaly_animation_container",
                "no"  => "#mkd_title_area_gradient_overaly_animation_container",
                "yes" => ""
            ),
            "show"       => array(
                ""    => "",
                "no"  => "",
                "yes" => "#mkd_title_area_gradient_overaly_animation_container"
            )
        )
    )
);

$title_area_gradient_overaly_animation_container_meta = hoshi_mikado_add_admin_container(
    array(
        'parent'          => $show_title_area_meta_container,
        'name'            => 'title_area_gradient_overaly_animation_container',
        'hidden_property' => 'mkd_title_area_gradient_overaly_animation_meta',
        'hidden_value'    => 'no'
    )
);

$group_title_area_gradient_overlay = hoshi_mikado_add_admin_group(array(
    'name'        => 'group_page_title_styles',
    'title'       => esc_html__('Animated Gradient Overlay Colors', 'hoshi'),
    'description' => esc_html__('Define colors for gradient overlay', 'hoshi'),
    'parent'      => $title_area_gradient_overaly_animation_container_meta
));

$row_gradient_overlay = hoshi_mikado_add_admin_row(array(
    'name'   => 'row_gradient_overlay',
    'parent' => $group_title_area_gradient_overlay
));

hoshi_mikado_add_meta_box_field(array(
    'type'          => 'colorsimple',
    'name'          => 'mkd_title_gradient_overlay_color1_meta',
    'default_value' => '',
    'label'         => esc_html__('Color 1', 'hoshi'),
    'parent'        => $row_gradient_overlay
));

hoshi_mikado_add_meta_box_field(array(
    'type'          => 'colorsimple',
    'name'          => 'mkd_title_gradient_overlay_color2_meta',
    'default_value' => '',
    'label'         => esc_html__('Color 2', 'hoshi'),
    'parent'        => $row_gradient_overlay
));

hoshi_mikado_add_meta_box_field(array(
    'type'          => 'colorsimple',
    'name'          => 'mkd_title_gradient_overlay_color3_meta',
    'default_value' => '',
    'label'         => esc_html__('Color 3', 'hoshi'),
    'parent'        => $row_gradient_overlay
));

hoshi_mikado_add_meta_box_field(array(
    'type'          => 'colorsimple',
    'name'          => 'mkd_title_gradient_overlay_color4_meta',
    'default_value' => '',
    'label'         => esc_html__('Color 4', 'hoshi'),
    'parent'        => $row_gradient_overlay
));

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_title_area_animation_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Animations', 'hoshi'),
        'description'   => esc_html__('Choose an animation for Title Area', 'hoshi'),
        'parent'        => $show_title_area_meta_container,
        'options'       => array(
            ''           => '',
            'no'         => esc_html__('No Animation', 'hoshi'),
            'right-left' => esc_html__('Text right to left', 'hoshi'),
            'left-right' => esc_html__('Text left to right', 'hoshi')
        )
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_title_area_vertial_alignment_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Vertical Alignment', 'hoshi'),
        'description'   => esc_html__('Specify title vertical alignment', 'hoshi'),
        'parent'        => $show_title_area_meta_container,
        'options'       => array(
            ''              => '',
            'header_bottom' => esc_html__('From Bottom of Header', 'hoshi'),
            'window_top'    => esc_html__('From Window Top', 'hoshi')
        )
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_title_area_content_alignment_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Horizontal Alignment', 'hoshi'),
        'description'   => esc_html__('Specify title horizontal alignment', 'hoshi'),
        'parent'        => $show_title_area_meta_container,
        'options'       => array(
            ''       => '',
            'left'   => esc_html__('Left', 'hoshi'),
            'center' => esc_html__('Center', 'hoshi'),
            'right'  => esc_html__('Right', 'hoshi')
        )
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_title_text_color_meta',
        'type'        => 'color',
        'label'       => esc_html__('Title Color', 'hoshi'),
        'description' => esc_html__('Choose a color for title text', 'hoshi'),
        'parent'      => $show_title_area_meta_container
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_title_breadcrumb_color_meta',
        'type'        => 'color',
        'label'       => esc_html__('Breadcrumb Color', 'hoshi'),
        'description' => esc_html__('Choose a color for breadcrumb text', 'hoshi'),
        'parent'      => $show_title_area_meta_container
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_title_area_background_color_meta',
        'type'        => 'color',
        'label'       => esc_html__('Background Color', 'hoshi'),
        'description' => esc_html__('Choose a background color for Title Area', 'hoshi'),
        'parent'      => $show_title_area_meta_container
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_hide_background_image_meta',
        'type'          => 'yesno',
        'default_value' => 'no',
        'label'         => esc_html__('Hide Background Image', 'hoshi'),
        'description'   => esc_html__('Enable this option to hide background image in Title Area', 'hoshi'),
        'parent'        => $show_title_area_meta_container,
        'args'          => array(
            "dependence"             => true,
            "dependence_hide_on_yes" => "#mkd_mkd_hide_background_image_meta_container",
            "dependence_show_on_yes" => ""
        )
    )
);

$hide_background_image_meta_container = hoshi_mikado_add_admin_container(
    array(
        'parent'          => $show_title_area_meta_container,
        'name'            => 'mkd_hide_background_image_meta_container',
        'hidden_property' => 'mkd_hide_background_image_meta',
        'hidden_value'    => 'yes'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_title_area_background_image_meta',
        'type'        => 'image',
        'label'       => esc_html__('Background Image', 'hoshi'),
        'description' => esc_html__('Choose an Image for Title Area', 'hoshi'),
        'parent'      => $hide_background_image_meta_container
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_title_area_background_image_responsive_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Background Responsive Image', 'hoshi'),
        'description'   => esc_html__('Enabling this option will make Title background image responsive', 'hoshi'),
        'parent'        => $hide_background_image_meta_container,
        'options'       => array(
            ''    => '',
            'no'  => esc_html__('No', 'hoshi'),
            'yes' => esc_html__('Yes', 'hoshi')
        ),
        'args'          => array(
            "dependence" => true,
            "hide"       => array(
                ""    => "",
                "no"  => "",
                "yes" => "#mkd_mkd_title_area_background_image_responsive_meta_container, #mkd_mkd_title_area_height_meta"
            ),
            "show"       => array(
                ""    => "#mkd_mkd_title_area_background_image_responsive_meta_container, #mkd_mkd_title_area_height_meta",
                "no"  => "#mkd_mkd_title_area_background_image_responsive_meta_container, #mkd_mkd_title_area_height_meta",
                "yes" => ""
            )
        )
    )
);

$title_area_background_image_responsive_meta_container = hoshi_mikado_add_admin_container(
    array(
        'parent'          => $hide_background_image_meta_container,
        'name'            => 'mkd_title_area_background_image_responsive_meta_container',
        'hidden_property' => 'mkd_title_area_background_image_responsive_meta',
        'hidden_value'    => 'yes'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_title_area_background_image_parallax_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Background Image in Parallax', 'hoshi'),
        'description'   => esc_html__('Enabling this option will make Title background image parallax', 'hoshi'),
        'parent'        => $title_area_background_image_responsive_meta_container,
        'options'       => array(
            ''         => '',
            'no'       => esc_html__('No', 'hoshi'),
            'yes'      => esc_html__('Yes', 'hoshi'),
            'yes_zoom' => esc_html__('Yes, with zoom out', 'hoshi')
        )
    )
);

hoshi_mikado_add_meta_box_field(array(
    'name'        => 'mkd_title_area_height_meta',
    'type'        => 'text',
    'label'       => esc_html__('Height', 'hoshi'),
    'description' => esc_html__('Set a height for Title Area', 'hoshi'),
    'parent'      => $show_title_area_meta_container,
    'args'        => array(
        'col_width' => 2,
        'suffix'    => 'px'
    )
));

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_disable_title_bottom_border_meta',
    'type'          => 'yesno',
    'label'         => esc_html__('Disable Title Bottom Border', 'hoshi'),
    'description'   => esc_html__('This option will disable title area bottom border', 'hoshi'),
    'parent'        => $show_title_area_meta_container,
    'default_value' => 'no'
));

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_title_area_subtitle_meta',
    'type'          => 'text',
    'default_value' => '',
    'label'         => esc_html__('Subtitle Text', 'hoshi'),
    'description'   => esc_html__('Enter your subtitle text', 'hoshi'),
    'parent'        => $show_title_area_meta_container,
    'args'          => array(
        'col_width' => 6
    )
));

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_subtitle_color_meta',
        'type'        => 'color',
        'label'       => esc_html__('Subtitle Color', 'hoshi'),
        'description' => esc_html__('Choose a color for subtitle text', 'hoshi'),
        'parent'      => $show_title_area_meta_container
    )
);