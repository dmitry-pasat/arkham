<?php

$header_meta_box = hoshi_mikado_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('Header', 'hoshi'),
        'name'  => 'header_meta'
    )
);

$temp_holder_show             = '';
$temp_holder_hide             = '';
$temp_array_standard          = array();
$temp_array_divided           = array();
$temp_array_minimal           = array();
$temp_array_centered          = array();
$temp_array_vertical          = array();
$temp_array_top_header        = array();
$temp_array_behaviour         = array();
switch(hoshi_mikado_options()->getOptionValue('header_type')) {

    case 'header-standard':
        $temp_holder_show = '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_behaviour_meta';
        $temp_holder_hide = '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container';

        $temp_array_standard = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                'header-vertical',
                'header-minimal',
                'header-divided',
                'header-centered',
            )
        );

        $temp_array_minimal = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-vertical',
                'header-divided',
                'header-centered',
            )
        );

        $temp_array_divided = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-minimal',
                'header-vertical',
                'header-centered',
            )
        );

        $temp_array_centered = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-minimal',
                'header-vertical',
                'header-divided',
            )
        );

        $temp_array_vertical = array(
            'hidden_values' => array(
                '',
                'header-standard',
                'header-minimal',
                'header-divided',
                'header-centered',
            )
        );

        $temp_array_behaviour = array(
            'hidden_values' => array('header-vertical')
        );

        $temp_array_top_header = array(
            'hidden_value' => 'header-vertical'
        );
        break;


    case 'header-minimal':
        $temp_holder_show = '#mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_behaviour_meta';
        $temp_holder_hide = '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container';

        $temp_array_standard = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                '',
                'header-vertical',
                'header-minimal',
                'header-divided',
                'header-centered',
            )
        );

        $temp_array_minimal = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                'header-standard',
                'header-vertical',
                'header-divided',
                'header-centered',
            )
        );

        $temp_array_divided = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-minimal',
                'header-vertical',
                'header-centered',
            )
        );

        $temp_array_centered = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-minimal',
                'header-vertical',
                'header-divided',
            )
        );

        $temp_array_vertical = array(
            'hidden_values' => array(
                '',
                'header-standard',
                'header-minimal',
                'header-divided',
                'header-centered',
            )
        );

        $temp_array_behaviour = array(
            'hidden_values' => array('header-vertical')
        );

        $temp_array_top_header = array(
            'hidden_value' => 'header-vertical'
        );
        break;

    case 'header-divided':
        $temp_holder_show = '#mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_behaviour_meta';
        $temp_holder_hide = '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_centered_type_meta_container';

        $temp_array_standard = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                '',
                'header-vertical',
                'header-minimal',
                'header-divided',
                'header-centered',
            )
        );

        $temp_array_minimal = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-vertical',
                'header-divided',
                'header-centered',
            )
        );

        $temp_array_divided = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                'header-standard',
                'header-minimal',
                'header-vertical',
                'header-centered',
            )
        );

        $temp_array_centered = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-minimal',
                'header-vertical',
                'header-divided',
            )
        );


        $temp_array_vertical = array(
            'hidden_values' => array(
                '',
                'header-standard',
                'header-minimal',
                'header-divided',
                'header-centered',
            )
        );

        $temp_array_behaviour = array(
            'hidden_values' => array('header-vertical')
        );

        $temp_array_top_header = array(
            'hidden_value' => 'header-vertical'
        );
        break;

    case 'header-centered':
        $temp_holder_show = '#mkd_mkd_header_centered_type_meta_container, #mkd_mkd_header_behaviour_meta';
        $temp_holder_hide = '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_divided_type_meta_container';

        $temp_array_standard = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                '',
                'header-vertical',
                'header-minimal',
                'header-divided',
                'header-centered',
            )
        );

        $temp_array_minimal = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-vertical',
                'header-divided',
                'header-centered',
            )
        );

        $temp_array_divided = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-minimal',
                'header-vertical',
                'header-centered',
            )
        );

        $temp_array_centered = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                'header-standard',
                'header-minimal',
                'header-vertical',
                'header-divided',
            )
        );

        $temp_array_vertical = array(
            'hidden_values' => array(
                '',
                'header-standard',
                'header-minimal',
                'header-divided',
                'header-centered',
            )
        );

        $temp_array_behaviour = array(
            'hidden_values' => array('header-vertical')
        );

        $temp_array_top_header = array(
            'hidden_value' => 'header-vertical'
        );
        break;

    case 'header-vertical':
        $temp_holder_show = '#mkd_mkd_header_vertical_type_meta_container';
        $temp_holder_hide = '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_behaviour_meta, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container';

        $temp_array_standard = array(
            'hidden_values' => array(
                '',
                'header-vertical',
                'header-minimal',
                'header-divided',
                'header-centered',
            )
        );

        $temp_array_minimal = array(
            'hidden_values' => array(
                '',
                'header-vertical',
                'header-standard',
                'header-divided',
                'header-centered',
            )
        );

        $temp_array_divided = array(
            'hidden_values' => array(
                '',
                'header-standard',
                'header-minimal',
                'header-vertical',
                'header-centered',
            )
        );

        $temp_array_centered = array(
            'hidden_values' => array(
                '',
                'header-standard',
                'header-minimal',
                'header-vertical',
                'header-divided',
            )
        );

        $temp_array_vertical = array(
            'hidden_value'  => 'default',
            'hidden_values' => array(
                'header-standard',
                'header-minimal',
                'header-divided',
                'header-centered',
            )
        );

        $temp_array_behaviour = array(
            'hidden_values' => array('', 'header-vertical')
        );

        $temp_array_top_header = array(
            'hidden_value'  => 'default',
            'hidden_values' => array('', 'header-vertical')
        );
        break;
}

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_header_type_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Choose Header Type', 'hoshi'),
        'description'   => esc_html__('Select header type layout', 'hoshi'),
        'parent'        => $header_meta_box,
        'options'       => array(
            ''                         => esc_html__('Default','hoshi'),
            'header-standard'          => esc_html__('Standard Header', 'hoshi'),
            'header-minimal'           => esc_html__('Minimal Header', 'hoshi'),
            'header-divided'           => esc_html__('Divided Header', 'hoshi'),
            'header-centered'          => esc_html__('Centered Header', 'hoshi'),
            'header-vertical'          => esc_html__('Vertical Header', 'hoshi')
        ),
        'args'          => array(
            "dependence" => true,
            "hide"       => array(
                ""                         => $temp_holder_hide,
                'header-standard'          => '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container',
                'header-minimal'           => '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container',
                'header-divided'           => '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_centered_type_meta_container',
                'header-centered'          => '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_divided_type_meta_container',
                'header-vertical'          => '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_header_behaviour_meta, #mkd_mkd_header_divided_type_meta_container, #mkd_mkd_header_centered_type_meta_container'
            ),
            "show"       => array(
                ""                         => $temp_holder_show,
                "header-standard"          => '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_header_behaviour_meta',
                "header-minimal"           => '#mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_header_behaviour_meta',
                'header-divided'           => '#mkd_mkd_header_divided_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_header_behaviour_meta',
                'header-centered'          => '#mkd_mkd_header_centered_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_header_behaviour_meta',
                "header-vertical"          => '#mkd_mkd_header_vertical_type_meta_container'
            )
        )
    )
);

hoshi_mikado_add_meta_box_field(
    array_merge(
        array(
            'parent'          => $header_meta_box,
            'type'            => 'select',
            'name'            => 'mkd_header_behaviour_meta',
            'default_value'   => '',
            'label'           => esc_html__('Choose Header behaviour', 'hoshi'),
            'description'     => esc_html__('Select the behaviour of header when you scroll down to page', 'hoshi'),
            'options'         => array(
                ''                                => '',
                'no-behavior'                     => esc_html__('No Behavior', 'hoshi'),
                'sticky-header-on-scroll-up'      => esc_html__('Sticky on scrol up', 'hoshi'),
                'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down', 'hoshi'),
                'fixed-on-scroll'                 => esc_html__('Fixed on scroll', 'hoshi')
            ),
            'hidden_property' => 'mkd_header_type_meta',
            'hidden_value'    => '',
            'args'            => array(
                'dependence' => true,
                'show'       => array(
                    ''                                => '',
                    'sticky-header-on-scroll-up'      => '',
                    'sticky-header-on-scroll-down-up' => '#mkd_mkd_sticky_amount_container_meta_container',
                    'no-behavior'                     => ''
                ),
                'hide'       => array(
                    ''                                => '#mkd_mkd_sticky_amount_container_meta_container',
                    'sticky-header-on-scroll-up'      => '#mkd_mkd_sticky_amount_container_meta_container',
                    'sticky-header-on-scroll-down-up' => '',
                    'no-behavior'                     => '#mkd_mkd_sticky_amount_container_meta_container'
                )
            )
        ),
        $temp_array_behaviour
    )
);

$sticky_amount_container = hoshi_mikado_add_admin_container(
    array(
        'parent'          => $header_meta_box,
        'name'            => 'mkd_sticky_amount_container_meta_container',
        'hidden_property' => 'mkd_header_behaviour_meta',
        'hidden_value'    => '',
        'hidden_values'   => array('', 'no-behavior', 'sticky-header-on-scroll-up'),
    )
);

$sticky_amount_group = hoshi_mikado_add_admin_group(array(
    'name'        => 'sticky_amount_group',
    'title'       => esc_html__('Scroll Amount for Sticky Header Appearance', 'hoshi'),
    'parent'      => $sticky_amount_container,
    'description' => esc_html__('Enter the amount of pixels for sticky header appearance, or set browser height to "Yes" for predefined sticky header appearance amount', 'hoshi')
));

$sticky_amount_row = hoshi_mikado_add_admin_row(array(
    'name'   => 'sticky_amount_group',
    'parent' => $sticky_amount_group
));

hoshi_mikado_add_meta_box_field(
    array(
        'name'   => 'mkd_scroll_amount_for_sticky_meta',
        'type'   => 'textsimple',
        'label'  => esc_html__('Amount in px', 'hoshi'),
        'parent' => $sticky_amount_row,
        'args'   => array(
            'suffix' => 'px'
        )
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_scroll_amount_for_sticky_fullscreen_meta',
        'type'          => 'yesnosimple',
        'label'         => esc_html__('Browser Height', 'hoshi'),
        'default_value' => 'no',
        'parent'        => $sticky_amount_row
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_header_style_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Header Skin', 'hoshi'),
        'description'   => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'hoshi'),
        'parent'        => $header_meta_box,
        'options'       => array(
            ''             => '',
            'light-header' => esc_html__('Light', 'hoshi'),
            'dark-header'  => esc_html__('Dark', 'hoshi')
        )
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'parent'        => $header_meta_box,
        'type'          => 'select',
        'name'          => 'mkd_enable_header_style_on_scroll_meta',
        'default_value' => '',
        'label'         => esc_html__('Enable Header Style on Scroll', 'hoshi'),
        'description'   => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'hoshi'),
        'options'       => array(
            ''    => '',
            'no'  => esc_html__('No', 'hoshi'),
            'yes' => esc_html__('Yes', 'hoshi')
        )
    )
);

$header_standard_type_meta_container = hoshi_mikado_add_admin_container(
    array_merge(
        array(
            'parent'          => $header_meta_box,
            'name'            => 'mkd_header_standard_type_meta_container',
            'hidden_property' => 'mkd_header_type_meta',

        ),
        $temp_array_standard
    )
);

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_in_grid_header_standard_meta',
    'type'          => 'select',
    'label'         => esc_html__('Header In Grid', 'hoshi'),
    'description'   => esc_html__('Set header content to be in grid', 'hoshi'),
    'parent'        => $header_standard_type_meta_container,
    'default_value' => '',
    'options'       => array(
        ''    => esc_html__('Default', 'hoshi'),
        'no'  => esc_html__('No', 'hoshi'),
        'yes' => esc_html__('Yes', 'hoshi')
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''    => '#mkd_menu_area_in_grid_header_standard_container',
            'no'  => '#mkd_menu_area_in_grid_header_standard_container',
            'yes' => ''
        ),
        'show'       => array(
            ''    => '',
            'no'  => '',
            'yes' => '#mkd_menu_area_in_grid_header_standard_container'
        )
    )
));

$menu_area_in_grid_header_standard_container = hoshi_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'menu_area_in_grid_header_standard_container',
    'parent'          => $header_standard_type_meta_container,
    'hidden_property' => 'mkd_menu_area_in_grid_header_standard_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('', 'no')
));


hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_grid_background_color_header_standard_meta',
        'type'        => 'color',
        'label'       => esc_html__('Grid Background Color', 'hoshi'),
        'description' => esc_html__('Set grid background color for header area', 'hoshi'),
        'parent'      => $menu_area_in_grid_header_standard_container
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_grid_background_transparency_header_standard_meta',
        'type'        => 'text',
        'label'       => esc_html__('Grid Background Transparency', 'hoshi'),
        'description' => esc_html__('Set grid background transparency for header (0 = fully transparent, 1 = opaque)', 'hoshi'),
        'parent'      => $menu_area_in_grid_header_standard_container,
        'args'        => array(
            'col_width' => 2
        )
    )
);

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_in_grid_border_header_standard_meta',
    'type'          => 'select',
    'label'         => esc_html__('Grid Area Border', 'hoshi'),
    'description'   => esc_html__('Set border on grid area', 'hoshi'),
    'parent'        => $menu_area_in_grid_header_standard_container,
    'default_value' => '',
    'options'       => array(
        ''    => '',
        'no'  => esc_html__('No', 'hoshi'),
        'yes' => esc_html__('Yes', 'hoshi')
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''    => '#mkd_menu_area_in_grid_border_header_standard_container',
            'no'  => '#mkd_menu_area_in_grid_border_header_standard_container',
            'yes' => ''
        ),
        'show'       => array(
            ''    => '',
            'no'  => '',
            'yes' => '#mkd_menu_area_in_grid_border_header_standard_container'
        )
    )
));

$menu_area_in_grid_border_header_standard_container = hoshi_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'menu_area_in_grid_border_header_standard_container',
    'parent'          => $header_standard_type_meta_container,
    'hidden_property' => 'mkd_menu_area_in_grid_border_header_standard_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('', 'no')
));

hoshi_mikado_add_meta_box_field(array(
    'name'        => 'mkd_menu_area_in_grid_border_color_header_standard_meta',
    'type'        => 'color',
    'label'       => esc_html__('Border Color', 'hoshi'),
    'description' => esc_html__('Set border color for grid area', 'hoshi'),
    'parent'      => $menu_area_in_grid_border_header_standard_container
));


hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_background_color_header_standard_meta',
        'type'        => 'color',
        'label'       => esc_html__('Background Color', 'hoshi'),
        'description' => esc_html__('Choose a background color for header area', 'hoshi'),
        'parent'      => $header_standard_type_meta_container
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_background_transparency_header_standard_meta',
        'type'        => 'text',
        'label'       => esc_html__('Transparency', 'hoshi'),
        'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'hoshi'),
        'parent'      => $header_standard_type_meta_container,
        'args'        => array(
            'col_width' => 2
        )
    )
);

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_border_header_standard_meta',
    'type'          => 'select',
    'label'         => esc_html__('Header Area Border', 'hoshi'),
    'description'   => esc_html__('Set border on header area', 'hoshi'),
    'parent'        => $header_standard_type_meta_container,
    'default_value' => '',
    'options'       => array(
        ''    => '',
        'no'  => esc_html__('No', 'hoshi'),
        'yes' => esc_html__('Yes', 'hoshi')
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''    => '#mkd_border_bottom_color_container',
            'no'  => '#mkd_border_bottom_color_container',
            'yes' => ''
        ),
        'show'       => array(
            ''    => '',
            'no'  => '',
            'yes' => '#mkd_border_bottom_color_container'
        )
    )
));

$border_bottom_color_container = hoshi_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'border_bottom_color_container',
    'parent'          => $header_standard_type_meta_container,
    'hidden_property' => 'mkd_menu_area_border_header_standard_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('', 'no')
));

hoshi_mikado_add_meta_box_field(array(
    'name'        => 'mkd_menu_area_border_color_header_standard_meta',
    'type'        => 'color',
    'label'       => esc_html__('Border Color', 'hoshi'),
    'description' => esc_html__('Choose color of header bottom border', 'hoshi'),
    'parent'      => $border_bottom_color_container
));


$header_minimal_type_meta_container = hoshi_mikado_add_admin_container(
    array_merge(
        array(
            'parent'          => $header_meta_box,
            'name'            => 'mkd_header_minimal_type_meta_container',
            'hidden_property' => 'mkd_header_type_meta',

        ),
        $temp_array_minimal
    )
);

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_in_grid_header_minimal_meta',
    'type'          => 'select',
    'label'         => esc_html__('Header In Grid', 'hoshi'),
    'description'   => esc_html__('Set header content to be in grid', 'hoshi'),
    'parent'        => $header_minimal_type_meta_container,
    'default_value' => '',
    'options'       => array(
        ''    => esc_html__('Default', 'hoshi'),
        'no'  => esc_html__('No', 'hoshi'),
        'yes' => esc_html__('Yes', 'hoshi')
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''    => '#mkd_menu_area_in_grid_header_minimal_container',
            'no'  => '#mkd_menu_area_in_grid_header_minimal_container',
            'yes' => ''
        ),
        'show'       => array(
            ''    => '',
            'no'  => '',
            'yes' => '#mkd_menu_area_in_grid_header_minimal_container'
        )
    )
));

$menu_area_in_grid_header_minimal_container = hoshi_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'menu_area_in_grid_header_minimal_container',
    'parent'          => $header_minimal_type_meta_container,
    'hidden_property' => 'mkd_menu_area_in_grid_header_minimal_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('', 'no')
));


hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_grid_background_color_header_minimal_meta',
        'type'        => 'color',
        'label'       => esc_html__('Grid Background Color', 'hoshi'),
        'description' => esc_html__('Set grid background color for header area', 'hoshi'),
        'parent'      => $menu_area_in_grid_header_minimal_container
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_grid_background_transparency_header_minimal_meta',
        'type'        => 'text',
        'label'       => esc_html__('Grid Background Transparency', 'hoshi'),
        'description' => esc_html__('Set grid background transparency for header (0 = fully transparent, 1 = opaque)', 'hoshi'),
        'parent'      => $menu_area_in_grid_header_minimal_container,
        'args'        => array(
            'col_width' => 2
        )
    )
);

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_in_grid_border_header_minimal_meta',
    'type'          => 'select',
    'label'         => esc_html__('Grid Area Border', 'hoshi'),
    'description'   => esc_html__('Set border on grid area', 'hoshi'),
    'parent'        => $menu_area_in_grid_header_minimal_container,
    'default_value' => '',
    'options'       => array(
        ''    => '',
        'no'  => esc_html__('No', 'hoshi'),
        'yes' => esc_html__('Yes', 'hoshi')
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''    => '#mkd_menu_area_in_grid_border_header_minimal_container',
            'no'  => '#mkd_menu_area_in_grid_border_header_minimal_container',
            'yes' => ''
        ),
        'show'       => array(
            ''    => '',
            'no'  => '',
            'yes' => '#mkd_menu_area_in_grid_border_header_minimal_container'
        )
    )
));

$menu_area_in_grid_border_header_minimal_container = hoshi_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'menu_area_in_grid_border_header_minimal_container',
    'parent'          => $header_minimal_type_meta_container,
    'hidden_property' => 'mkd_menu_area_in_grid_border_header_minimal_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('', 'no')
));

hoshi_mikado_add_meta_box_field(array(
    'name'        => 'mkd_menu_area_in_grid_border_color_header_minimal_meta',
    'type'        => 'color',
    'label'       => esc_html__('Border Color', 'hoshi'),
    'description' => esc_html__('Set border color for grid area', 'hoshi'),
    'parent'      => $menu_area_in_grid_border_header_minimal_container
));


hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_background_color_header_minimal_meta',
        'type'        => 'color',
        'label'       => esc_html__('Background Color', 'hoshi'),
        'description' => esc_html__('Choose a background color for header area', 'hoshi'),
        'parent'      => $header_minimal_type_meta_container
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_background_transparency_header_minimal_meta',
        'type'        => 'text',
        'label'       => esc_html__('Transparency', 'hoshi'),
        'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'hoshi'),
        'parent'      => $header_minimal_type_meta_container,
        'args'        => array(
            'col_width' => 2
        )
    )
);

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_border_header_minimal_meta',
    'type'          => 'select',
    'label'         => esc_html__('Header Area Border', 'hoshi'),
    'description'   => esc_html__('Set border on header area', 'hoshi'),
    'parent'        => $header_minimal_type_meta_container,
    'default_value' => '',
    'options'       => array(
        ''    => '',
        'no'  => esc_html__('No', 'hoshi'),
        'yes' => esc_html__('Yes', 'hoshi')
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''    => '#mkd_border_bottom_color_minimal_container',
            'no'  => '#mkd_border_bottom_color_minimal_container',
            'yes' => ''
        ),
        'show'       => array(
            ''    => '',
            'no'  => '',
            'yes' => '#mkd_border_bottom_color_minimal_container'
        )
    )
));

$border_bottom_color_minimal_container = hoshi_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'border_bottom_color_minimal_container',
    'parent'          => $header_minimal_type_meta_container,
    'hidden_property' => 'mkd_menu_area_border_header_minimal_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('', 'no')
));

hoshi_mikado_add_meta_box_field(array(
    'name'        => 'mkd_menu_area_border_color_header_minimal_meta',
    'type'        => 'color',
    'label'       => esc_html__('Border Color', 'hoshi'),
    'description' => esc_html__('Choose color of header bottom border', 'hoshi'),
    'parent'      => $border_bottom_color_minimal_container
));

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_fullscreen_menu_background_image_meta',
        'type'          => 'image',
        'default_value' => '',
        'label'         => esc_html__('Fullscreen Background Image', 'hoshi'),
        'description'   => esc_html__('Set background image for Fullscreen Menu', 'hoshi'),
        'parent'        => $header_minimal_type_meta_container
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_disable_fullscreen_menu_background_image_meta',
        'type'          => 'yesno',
        'default_value' => 'no',
        'label'         => esc_html__('Disable Fullscreen Background Image', 'hoshi'),
        'description'   => esc_html__('Enabling this option will hide background image in Fullscreen Menu', 'hoshi'),
        'parent'        => $header_minimal_type_meta_container
    )
);

$header_divided_type_meta_container = hoshi_mikado_add_admin_container(
    array_merge(
        array(
            'parent'          => $header_meta_box,
            'name'            => 'mkd_header_divided_type_meta_container',
            'hidden_property' => 'mkd_header_type_meta',

        ),
        $temp_array_divided
    )
);

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_in_grid_header_divided_meta',
    'type'          => 'select',
    'label'         => esc_html__('Header In Grid', 'hoshi'),
    'description'   => esc_html__('Set header content to be in grid', 'hoshi'),
    'parent'        => $header_divided_type_meta_container,
    'default_value' => '',
    'options'       => array(
        ''    => esc_html__('Default', 'hoshi'),
        'no'  => esc_html__('No', 'hoshi'),
        'yes' => esc_html__('Yes', 'hoshi')
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''    => '#mkd_menu_area_in_grid_header_divided_container',
            'no'  => '#mkd_menu_area_in_grid_header_divided_container',
            'yes' => ''
        ),
        'show'       => array(
            ''    => '',
            'no'  => '',
            'yes' => '#mkd_menu_area_in_grid_header_divided_container'
        )
    )
));

$menu_area_in_grid_header_divided_container = hoshi_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'menu_area_in_grid_header_divided_container',
    'parent'          => $header_divided_type_meta_container,
    'hidden_property' => 'mkd_menu_area_in_grid_header_divided_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('', 'no')
));


hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_grid_background_color_header_divided_meta',
        'type'        => 'color',
        'label'       => esc_html__('Grid Background Color', 'hoshi'),
        'description' => esc_html__('Set grid background color for header area', 'hoshi'),
        'parent'      => $menu_area_in_grid_header_divided_container
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_grid_background_transparency_header_divided_meta',
        'type'        => 'text',
        'label'       => esc_html__('Grid Background Transparency', 'hoshi'),
        'description' => esc_html__('Set grid background transparency for header (0 = fully transparent, 1 = opaque)', 'hoshi'),
        'parent'      => $menu_area_in_grid_header_divided_container,
        'args'        => array(
            'col_width' => 2
        )
    )
);

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_in_grid_border_header_divided_meta',
    'type'          => 'select',
    'label'         => esc_html__('Grid Area Border', 'hoshi'),
    'description'   => esc_html__('Set border on grid area', 'hoshi'),
    'parent'        => $menu_area_in_grid_header_divided_container,
    'default_value' => '',
    'options'       => array(
        ''    => '',
        'no'  => esc_html__('No', 'hoshi'),
        'yes' => esc_html__('Yes', 'hoshi')
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''    => '#mkd_menu_area_in_grid_border_header_divided_container',
            'no'  => '#mkd_menu_area_in_grid_border_header_divided_container',
            'yes' => ''
        ),
        'show'       => array(
            ''    => '',
            'no'  => '',
            'yes' => '#mkd_menu_area_in_grid_border_header_divided_container'
        )
    )
));

$menu_area_in_grid_border_header_divided_container = hoshi_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'menu_area_in_grid_border_header_divided_container',
    'parent'          => $header_divided_type_meta_container,
    'hidden_property' => 'mkd_menu_area_in_grid_border_header_divided_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('', 'no')
));

hoshi_mikado_add_meta_box_field(array(
    'name'        => 'mkd_menu_area_in_grid_border_color_header_divided_meta',
    'type'        => 'color',
    'label'       => esc_html__('Border Color', 'hoshi'),
    'description' => esc_html__('Set border color for grid area', 'hoshi'),
    'parent'      => $menu_area_in_grid_border_header_divided_container
));


hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_background_color_header_divided_meta',
        'type'        => 'color',
        'label'       => esc_html__('Background Color', 'hoshi'),
        'description' => esc_html__('Choose a background color for header area', 'hoshi'),
        'parent'      => $header_divided_type_meta_container
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_background_transparency_header_divided_meta',
        'type'        => 'text',
        'label'       => esc_html__('Transparency', 'hoshi'),
        'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'hoshi'),
        'parent'      => $header_divided_type_meta_container,
        'args'        => array(
            'col_width' => 2
        )
    )
);

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_border_header_divided_meta',
    'type'          => 'select',
    'label'         => esc_html__('Header Area Border', 'hoshi'),
    'description'   => esc_html__('Set border on header area', 'hoshi'),
    'parent'        => $header_divided_type_meta_container,
    'default_value' => '',
    'options'       => array(
        ''    => '',
        'no'  => esc_html__('No', 'hoshi'),
        'yes' => esc_html__('Yes', 'hoshi')
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''    => '#mkd_border_bottom_color_divided_container',
            'no'  => '#mkd_border_bottom_color_divided_container',
            'yes' => ''
        ),
        'show'       => array(
            ''    => '',
            'no'  => '',
            'yes' => '#mkd_border_bottom_color_divided_container'
        )
    )
));

$border_bottom_color_divided_container = hoshi_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'border_bottom_color_divided_container',
    'parent'          => $header_divided_type_meta_container,
    'hidden_property' => 'mkd_menu_area_border_header_divided_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('', 'no')
));

hoshi_mikado_add_meta_box_field(array(
    'name'        => 'mkd_menu_area_border_color_header_divided_meta',
    'type'        => 'color',
    'label'       => esc_html__('Border Color', 'hoshi'),
    'description' => esc_html__('Choose color of header bottom border', 'hoshi'),
    'parent'      => $border_bottom_color_divided_container
));


$header_centered_type_meta_container = hoshi_mikado_add_admin_container(
    array_merge(
        array(
            'parent'          => $header_meta_box,
            'name'            => 'mkd_header_centered_type_meta_container',
            'hidden_property' => 'mkd_header_type_meta',

        ),
        $temp_array_centered
    )
);

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_in_grid_header_centered_meta',
    'type'          => 'select',
    'label'         => esc_html__('Header In Grid', 'hoshi'),
    'description'   => esc_html__('Set header content to be in grid', 'hoshi'),
    'parent'        => $header_centered_type_meta_container,
    'default_value' => '',
    'options'       => array(
        ''    => esc_html__('Default', 'hoshi'),
        'no'  => esc_html__('No', 'hoshi'),
        'yes' => esc_html__('Yes', 'hoshi')
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''    => '#mkd_menu_area_in_grid_header_centered_container',
            'no'  => '#mkd_menu_area_in_grid_header_centered_container',
            'yes' => ''
        ),
        'show'       => array(
            ''    => '',
            'no'  => '',
            'yes' => '#mkd_menu_area_in_grid_header_centered_container'
        )
    )
));

$menu_area_in_grid_header_centered_container = hoshi_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'menu_area_in_grid_header_centered_container',
    'parent'          => $header_centered_type_meta_container,
    'hidden_property' => 'mkd_menu_area_in_grid_header_centered_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('', 'no')
));


hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_grid_background_color_header_centered_meta',
        'type'        => 'color',
        'label'       => esc_html__('Grid Background Color', 'hoshi'),
        'description' => esc_html__('Set grid background color for header area', 'hoshi'),
        'parent'      => $menu_area_in_grid_header_centered_container
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_grid_background_transparency_header_centered_meta',
        'type'        => 'text',
        'label'       => esc_html__('Grid Background Transparency', 'hoshi'),
        'description' => esc_html__('Set grid background transparency for header (0 = fully transparent, 1 = opaque)', 'hoshi'),
        'parent'      => $menu_area_in_grid_header_centered_container,
        'args'        => array(
            'col_width' => 2
        )
    )
);

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_in_grid_border_header_centered_meta',
    'type'          => 'select',
    'label'         => esc_html__('Grid Area Border', 'hoshi'),
    'description'   => esc_html__('Set border on grid area', 'hoshi'),
    'parent'        => $menu_area_in_grid_header_centered_container,
    'default_value' => '',
    'options'       => array(
        ''    => '',
        'no'  => esc_html__('No', 'hoshi'),
        'yes' => esc_html__('Yes', 'hoshi')
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''    => '#mkd_menu_area_in_grid_border_header_centered_container',
            'no'  => '#mkd_menu_area_in_grid_border_header_centered_container',
            'yes' => ''
        ),
        'show'       => array(
            ''    => '',
            'no'  => '',
            'yes' => '#mkd_menu_area_in_grid_border_header_centered_container'
        )
    )
));

$menu_area_in_grid_border_header_centered_container = hoshi_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'menu_area_in_grid_border_header_centered_container',
    'parent'          => $header_centered_type_meta_container,
    'hidden_property' => 'mkd_menu_area_in_grid_border_header_centered_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('', 'no')
));

hoshi_mikado_add_meta_box_field(array(
    'name'        => 'mkd_menu_area_in_grid_border_color_header_centered_meta',
    'type'        => 'color',
    'label'       => esc_html__('Border Color', 'hoshi'),
    'description' => esc_html__('Set border color for grid area', 'hoshi'),
    'parent'      => $menu_area_in_grid_border_header_centered_container
));


hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_background_color_header_centered_meta',
        'type'        => 'color',
        'label'       => esc_html__('Background Color', 'hoshi'),
        'description' => esc_html__('Choose a background color for header area', 'hoshi'),
        'parent'      => $header_centered_type_meta_container
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_menu_area_background_transparency_header_centered_meta',
        'type'        => 'text',
        'label'       => esc_html__('Transparency', 'hoshi'),
        'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'hoshi'),
        'parent'      => $header_centered_type_meta_container,
        'args'        => array(
            'col_width' => 2
        )
    )
);

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_menu_area_border_header_centered_meta',
    'type'          => 'select',
    'label'         => esc_html__('Header Area Border', 'hoshi'),
    'description'   => esc_html__('Set border on header area', 'hoshi'),
    'parent'        => $header_centered_type_meta_container,
    'default_value' => '',
    'options'       => array(
        ''    => '',
        'no'  => esc_html__('No', 'hoshi'),
        'yes' => esc_html__('Yes', 'hoshi')
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''    => '#mkd_border_bottom_color_centered_container',
            'no'  => '#mkd_border_bottom_color_centered_container',
            'yes' => ''
        ),
        'show'       => array(
            ''    => '',
            'no'  => '',
            'yes' => '#mkd_border_bottom_color_centered_container'
        )
    )
));

$border_bottom_color_centered_container = hoshi_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'border_bottom_color_centered_container',
    'parent'          => $header_centered_type_meta_container,
    'hidden_property' => 'mkd_menu_area_border_header_centered_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('', 'no')
));

hoshi_mikado_add_meta_box_field(array(
    'name'        => 'mkd_menu_area_border_color_header_centered_meta',
    'type'        => 'color',
    'label'       => esc_html__('Border Color', 'hoshi'),
    'description' => esc_html__('Choose color of header bottom border', 'hoshi'),
    'parent'      => $border_bottom_color_centered_container
));

$top_bar_container = hoshi_mikado_add_admin_container(
    array_merge(
        array(
            'parent'          => $header_meta_box,
            'name'            => 'mkd_top_bar_container_meta_container',
            'hidden_property' => 'mkd_header_type_meta',

        ),
        $temp_array_top_header
    )
);

hoshi_mikado_add_admin_section_title(array(
    'name'   => 'top_bar_section_title',
    'parent' => $top_bar_container,
    'title'  => esc_html__('Top Bar', 'hoshi')
));

$top_bar_global_option = hoshi_mikado_options()->getOptionValue('top_bar');

$top_bar_default_dependency = array(
    '' => '#mkd_top_bar_container_no_style'
);

$top_bar_show_array = array(
    'yes' => '#mkd_top_bar_container_no_style'
);

$top_bar_hide_array = array(
    'no' => '#mkd_top_bar_container_no_style'
);

if($top_bar_global_option === 'yes') {
    $top_bar_show_array           = array_merge($top_bar_show_array, $top_bar_default_dependency);
    $top_bar_container_hide_array = array('no');
} else {
    $top_bar_hide_array           = array_merge($top_bar_hide_array, $top_bar_default_dependency);
    $top_bar_container_hide_array = array('', 'no');
}


hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_top_bar_meta',
    'type'          => 'select',
    'label'         => esc_html__('Enable Top Bar on This Page', 'hoshi'),
    'description'   => esc_html__('Enabling this option will enable top bar on this page', 'hoshi'),
    'parent'        => $top_bar_container,
    'default_value' => '',
    'options'       => array(
        ''    => esc_html__('Default', 'hoshi'),
        'yes' => esc_html__('Yes', 'hoshi'),
        'no'  => esc_html__('No', 'hoshi')
    ),
    'args'          => array(
        'dependence' => true,
        'show'       => $top_bar_show_array,
        'hide'       => $top_bar_hide_array
    )
));

$top_bar_container = hoshi_mikado_add_admin_container_no_style(array(
    'name'            => 'top_bar_container_no_style',
    'parent'          => $top_bar_container,
    'hidden_property' => 'mkd_top_bar_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => $top_bar_container_hide_array
));

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_top_bar_in_grid_meta',
    'type'          => 'select',
    'label'         => esc_html__('Top Bar In Grid', 'hoshi'),
    'description'   => esc_html__('Set top bar content to be in grid', 'hoshi'),
    'parent'        => $top_bar_container,
    'default_value' => '',
    'options'       => array(
        ''    => '',
        'no'  => esc_html__('No', 'hoshi'),
        'yes' => esc_html__('Yes', 'hoshi')
    )
));

hoshi_mikado_add_meta_box_field(array(
    'name'    => 'mkd_top_bar_skin_meta',
    'type'    => 'select',
    'label'   => esc_html__('Top Bar Skin', 'hoshi'),
    'options' => array(
        ''      => esc_html__('Default', 'hoshi'),
        'light' => esc_html__('White', 'hoshi'),
        'dark'  => esc_html__('Black', 'hoshi'),
        'gray'  => esc_html__('Gray', 'hoshi'),
    ),
    'parent'  => $top_bar_container
));

hoshi_mikado_add_meta_box_field(array(
    'name'   => 'mkd_top_bar_background_color_meta',
    'type'   => 'color',
    'label'  => esc_html__('Top Bar Background Color', 'hoshi'),
    'parent' => $top_bar_container
));

hoshi_mikado_add_meta_box_field(array(
    'name'        => 'mkd_top_bar_background_transparency_meta',
    'type'        => 'text',
    'label'       => esc_html__('Top Bar Background Color Transparency', 'hoshi'),
    'description' => esc_html__('Set top bar background color transparenct. Value should be between 0 and 1', 'hoshi'),
    'parent'      => $top_bar_container,
    'args'        => array(
        'col_width' => 3
    )
));

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_top_bar_border_meta',
    'type'          => 'select',
    'label'         => esc_html__('Top Bar Border', 'hoshi'),
    'description'   => esc_html__('Set border on top bar', 'hoshi'),
    'parent'        => $top_bar_container,
    'default_value' => '',
    'options'       => array(
        ''    => '',
        'no'  => esc_html__('No', 'hoshi'),
        'yes' => esc_html__('Yes', 'hoshi')
    ),
    'args'          => array(
        'dependence' => true,
        'hide'       => array(
            ''    => '#mkd_top_bar_border_container',
            'no'  => '#mkd_top_bar_border_container',
            'yes' => ''
        ),
        'show'       => array(
            ''    => '',
            'no'  => '',
            'yes' => '#mkd_top_bar_border_container'
        )
    )
));

$top_bar_border_container = hoshi_mikado_add_admin_container(array(
    'type'            => 'container',
    'name'            => 'top_bar_border_container',
    'parent'          => $top_bar_container,
    'hidden_property' => 'mkd_top_bar_border_meta',
    'hidden_value'    => 'no',
    'hidden_values'   => array('', 'no')
));

hoshi_mikado_add_meta_box_field(array(
    'name'        => 'mkd_top_bar_border_color_meta',
    'type'        => 'color',
    'label'       => esc_html__('Border Color', 'hoshi'),
    'description' => esc_html__('Choose color for top bar border', 'hoshi'),
    'parent'      => $top_bar_border_container
));

$header_vertical_type_meta_container = hoshi_mikado_add_admin_container(
    array_merge(
        array(
            'parent'          => $header_meta_box,
            'name'            => 'mkd_header_vertical_type_meta_container',
            'hidden_property' => 'mkd_header_type_meta'
        ),
        $temp_array_vertical
    )
);

hoshi_mikado_add_meta_box_field(array(
    'name'        => 'mkd_vertical_header_background_color_meta',
    'type'        => 'color',
    'label'       => esc_html__('Background Color', 'hoshi'),
    'description' => esc_html__('Set background color for vertical menu', 'hoshi'),
    'parent'      => $header_vertical_type_meta_container
));

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_vertical_header_background_image_meta',
        'type'          => 'image',
        'default_value' => '',
        'label'         => esc_html__('Background Image', 'hoshi'),
        'description'   => esc_html__('Set background image for vertical menu', 'hoshi'),
        'parent'        => $header_vertical_type_meta_container
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_disable_vertical_header_background_image_meta',
        'type'          => 'yesno',
        'default_value' => 'no',
        'label'         => esc_html__('Disable Background Image', 'hoshi'),
        'description'   => esc_html__('Enabling this option will hide background image in Vertical Menu', 'hoshi'),
        'parent'        => $header_vertical_type_meta_container
    )
);

