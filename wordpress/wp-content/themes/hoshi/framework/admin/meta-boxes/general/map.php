<?php

$general_meta_box = hoshi_mikado_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('General', 'hoshi'),
        'name'  => 'general_meta'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_smooth_page_transitions_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__( 'Smooth Page Transitions', 'hoshi' ),
        'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'hoshi' ),
        'parent'        => $general_meta_box,
        'options'     => array(
            ''      => esc_html__('Default','hoshi'),
            'yes'   => esc_html__('Yes','hoshi'),
            'no'    => esc_html__('No','hoshi'),
        ),
        'args'          => array(
            "dependence"             => true,
            "hide"       => array(
                ""    => "#mkd_page_transitions_container_meta",
                "no"  => "#mkd_page_transitions_container_meta",
                "yes" => ""
            ),
            "show"       => array(
                ""    => "",
                "no"  => "",
                "yes" => "#mkd_page_transitions_container_meta"
            )
        )
    )
);

$page_transitions_container_meta = hoshi_mikado_add_admin_container(
    array(
        'parent'          => $general_meta_box,
        'name'            => 'page_transitions_container_meta',
        'hidden_property' => 'mkd_smooth_page_transitions_meta',
        'hidden_values'   => array('','no')
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_page_transition_preloader_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__( 'Enable Preloading Animation', 'hoshi' ),
        'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'hoshi' ),
        'parent'        => $page_transitions_container_meta,
        'options'     => array(
            ''      => esc_html__('Default','hoshi'),
            'yes'   => esc_html__('Yes','hoshi'),
            'no'    => esc_html__('No','hoshi'),
        ),
        'args'          => array(
            "dependence"             => true,
            "hide"       => array(
                ""    => "#mkd_page_transition_preloader_container_meta",
                "no"  => "#mkd_page_transition_preloader_container_meta",
                "yes" => ""
            ),
            "show"       => array(
                ""    => "",
                "no"  => "",
                "yes" => "#mkd_page_transition_preloader_container_meta"
            )
        )
    )
);

$page_transition_preloader_container_meta = hoshi_mikado_add_admin_container(
    array(
        'parent'          => $page_transitions_container_meta,
        'name'            => 'page_transition_preloader_container_meta',
        'hidden_property' => 'mkd_page_transition_preloader_meta',
        'hidden_values'   => array('','no')
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'   => 'mkd_smooth_pt_bgnd_color_meta',
        'type'   => 'color',
        'label'  => esc_html__( 'Page Loader Background Color', 'hoshi' ),
        'parent' => $page_transition_preloader_container_meta
    )
);

$group_pt_spinner_animation_meta = hoshi_mikado_add_admin_group(
    array(
        'name'        => 'group_pt_spinner_animation_meta',
        'title'       => esc_html__( 'Loader Style', 'hoshi' ),
        'description' => esc_html__( 'Define styles for loader spinner animation', 'hoshi' ),
        'parent'      => $page_transition_preloader_container_meta
    )
);

$row_pt_spinner_animation_meta = hoshi_mikado_add_admin_row(
    array(
        'name'   => 'row_pt_spinner_animation_meta',
        'parent' => $group_pt_spinner_animation_meta
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'type'          => 'selectsimple',
        'name'          => 'mkd_smooth_pt_spinner_type_meta',
        'default_value' => '',
        'label'         => esc_html__( 'Spinner Type', 'hoshi' ),
        'parent'        => $row_pt_spinner_animation_meta,
        'options'       => array(
            'rotate_circles'        => esc_html__( 'Rotate Circles', 'hoshi' ),
            'pulse'                 => esc_html__( 'Pulse', 'hoshi' ),
            'double_pulse'          => esc_html__( 'Double Pulse', 'hoshi' ),
            'cube'                  => esc_html__( 'Cube', 'hoshi' ),
            'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'hoshi' ),
            'stripes'               => esc_html__( 'Stripes', 'hoshi' ),
            'wave'                  => esc_html__( 'Wave', 'hoshi' ),
            'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'hoshi' ),
            'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'hoshi' ),
            'atom'                  => esc_html__( 'Atom', 'hoshi' ),
            'clock'                 => esc_html__( 'Clock', 'hoshi' ),
            'mitosis'               => esc_html__( 'Mitosis', 'hoshi' ),
            'lines'                 => esc_html__( 'Lines', 'hoshi' ),
            'fussion'               => esc_html__( 'Fussion', 'hoshi' ),
            'wave_circles'          => esc_html__( 'Wave Circles', 'hoshi' ),
            'pulse_circles'         => esc_html__( 'Pulse Circles', 'hoshi' )
        ),
        'args'          => array(
            "dependence" => true,
            'show'       => array(
                "pulse"                 => "#mkd_smooth_pt_spinner_gradient_container",
                "double_pulse"          => "",
                "cube"                  => "#mkd_smooth_pt_spinner_gradient_container",
                "rotating_cubes"        => "",
                "stripes"               => "",
                "wave"                  => "",
                "two_rotating_circles"  => "",
                "five_rotating_circles" => "",
                "atom"                  => "",
                "clock"                 => "",
                "mitosis"               => "",
                "lines"                 => "",
                "fussion"               => "",
                "wave_circles"          => "",
                "pulse_circles"         => ""
            ),
            'hide'       => array(
                "pulse"                 => "",
                "double_pulse"          => "#mkd_smooth_pt_spinner_gradient_container",
                "cube"                  => "",
                "rotating_cubes"        => "#mkd_smooth_pt_spinner_gradient_container",
                "stripes"               => "#mkd_smooth_pt_spinner_gradient_container",
                "wave"                  => "#mkd_smooth_pt_spinner_gradient_container",
                "two_rotating_circles"  => "#mkd_smooth_pt_spinner_gradient_container",
                "five_rotating_circles" => "#mkd_smooth_pt_spinner_gradient_container",
                "atom"                  => "#mkd_smooth_pt_spinner_gradient_container",
                "clock"                 => "#mkd_smooth_pt_spinner_gradient_container",
                "mitosis"               => "#mkd_smooth_pt_spinner_gradient_container",
                "lines"                 => "#mkd_smooth_pt_spinner_gradient_container",
                "fussion"               => "#mkd_smooth_pt_spinner_gradient_container",
                "wave_circles"          => "#mkd_smooth_pt_spinner_gradient_container",
                "pulse_circles"         => "#mkd_smooth_pt_spinner_gradient_container"
            )
        )
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'type'          => 'colorsimple',
        'name'          => 'mkd_smooth_pt_spinner_color_meta',
        'default_value' => '',
        'label'         => esc_html__( 'Spinner Color', 'hoshi' ),
        'parent'        => $row_pt_spinner_animation_meta
    )
);

$smooth_pt_spinner_gradient_container = hoshi_mikado_add_admin_container(
    array(
        'parent'          => $page_transition_preloader_container_meta,
        'name'            => 'smooth_pt_spinner_gradient_container',
        'hidden_property' => 'smooth_pt_spinner_type',
        'hidden_value'    => '',
        'hidden_values'   => array(
            "double_pulse",
            "rotating_cubes",
            "stripes",
            "wave",
            "two_rotating_circles",
            "five_rotating_circles",
            "atom",
            "clock",
            "mitosis",
            "lines",
            "fussion",
            "wave_circles",
            "pulse_circles"
        )
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'type'          => 'select',
        'name'          => 'mkd_smooth_pt_spinner_gradient_meta',
        'default_value' => 'mkd-type2-gradient-left-bottom-to-right-top',
        'label'         => 'Spinner Gradient Color',
        'parent'        => $smooth_pt_spinner_gradient_container,
        'options'       => hoshi_mikado_get_gradient_left_bottom_to_right_top_styles('', false)
    )
);


hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_page_background_color_meta',
        'type'          => 'color',
        'default_value' => '',
        'label'         => esc_html__('Page Background Color', 'hoshi'),
        'description'   => esc_html__('Choose background color for page content', 'hoshi'),
        'parent'        => $general_meta_box
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_page_padding_meta',
        'type'          => 'text',
        'default_value' => '',
        'label'         => esc_html__('Page Padding', 'hoshi'),
        'description'   => esc_html__('Insert padding in format 10px 10px 10px 10px', 'hoshi'),
        'parent'        => $general_meta_box
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_page_content_behind_header_meta',
        'type'          => 'yesno',
        'default_value' => 'no',
        'label'         => esc_html__('Always put content behind header', 'hoshi'),
        'description'   => esc_html__('Enabling this option will put page content behind page header', 'hoshi'),
        'parent'        => $general_meta_box,
        'args'          => array(
            'suffix' => 'px'
        )
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_page_transition_fadeout_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__( 'Enable Fade Out Animation', 'hoshi' ),
        'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'hoshi' ),
        'options'     => array(
            ''      => esc_html__('Default','hoshi'),
            'yes'   => esc_html__('Yes','hoshi'),
            'no'    => esc_html__('No','hoshi'),
        ),
        'parent'        => $page_transitions_container_meta

    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_page_slider_meta',
        'type'          => 'text',
        'default_value' => '',
        'label'         => esc_html__('Slider Shortcode', 'hoshi'),
        'description'   => esc_html__('Paste your slider shortcode here', 'hoshi'),
        'parent'        => $general_meta_box
    )
);

if(hoshi_mikado_options()->getOptionValue('smooth_pt_true_ajax') === 'yes') {
    hoshi_mikado_add_meta_box_field(
        array(
            'name'          => 'mkd_page_transition_type',
            'type'          => 'selectblank',
            'label'         => esc_html__('Page Transition', 'hoshi'),
            'description'   => esc_html__('Choose the type of transition to this page', 'hoshi'),
            'parent'        => $general_meta_box,
            'default_value' => '',
            'options'       => array(
                'no-animation' => esc_html__('No animation', 'hoshi'),
                'fade'         => esc_html__('Fade', 'hoshi')
            )
        )
    );
}

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_page_likes_meta',
        'type'        => 'selectblank',
        'label'       => esc_html__('Show Likes', 'hoshi'),
        'description' => esc_html__('Enabling this option will show likes on your page', 'hoshi'),
        'parent'      => $general_meta_box,
        'options'     => array(
            'yes' => esc_html__('Yes', 'hoshi'),
            'no'  => esc_html__('No', 'hoshi'),
        )
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_page_comments_meta',
        'type'        => 'selectblank',
        'label'       => esc_html__('Show Comments', 'hoshi'),
        'description' => esc_html__('Enabling this option will show comments on your page', 'hoshi'),
        'parent'      => $general_meta_box,
        'options'     => array(
            'yes' => esc_html__('Yes', 'hoshi'),
            'no'  => esc_html__('No', 'hoshi'),
        )
    )
);