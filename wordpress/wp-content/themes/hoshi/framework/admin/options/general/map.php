<?php

if(!function_exists('hoshi_mikado_general_options_map')) {
    /**
     * General options page
     */
    function hoshi_mikado_general_options_map() {

        hoshi_mikado_add_admin_page(
            array(
                'slug'  => '',
                'title' => esc_html__('General', 'hoshi'),
                'icon'  => 'icon_building'
            )
        );

        $panel_logo = hoshi_mikado_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_logo',
                'title' => esc_html__('Branding', 'hoshi')
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $panel_logo,
                'type'          => 'yesno',
                'name'          => 'hide_logo',
                'default_value' => 'no',
                'label'         => esc_html__('Hide Logo', 'hoshi'),
                'description'   => esc_html__('Enabling this option will hide logo image', 'hoshi'),
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "#mkd_hide_logo_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $hide_logo_container = hoshi_mikado_add_admin_container(
            array(
                'parent'          => $panel_logo,
                'name'            => 'hide_logo_container',
                'hidden_property' => 'hide_logo',
                'hidden_value'    => 'yes'
            )
        );

        hoshi_mikado_add_admin_section_title(
            array(
                'parent' => $hide_logo_container,
                'name'   => 'standard_minimal_logo_title',
                'title'  => esc_html__('Standard, Centered & Minimal Header Logo', 'hoshi')
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'logo_image',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT."/img/logo.png",
                'label'         => esc_html__('Logo Image - Default', 'hoshi'),
                'description'   => esc_html__('Choose a default logo image to display ', 'hoshi'),
                'parent'        => $hide_logo_container
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_dark',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT."/img/logo_black.png",
                'label'         => esc_html__('Logo Image - Dark', 'hoshi'),
                'description'   => esc_html__('Choose a default logo image to display ', 'hoshi'),
                'parent'        => $hide_logo_container
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_light',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT."/img/logo_white.png",
                'label'         => esc_html__('Logo Image - Light', 'hoshi'),
                'description'   => esc_html__('Choose a default logo image to display ', 'hoshi'),
                'parent'        => $hide_logo_container
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_sticky',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT."/img/logo.png",
                'label'         => esc_html__('Logo Image - Sticky', 'hoshi'),
                'description'   => esc_html__('Choose a default logo image to display ', 'hoshi'),
                'parent'        => $hide_logo_container
            )
        );

        hoshi_mikado_add_admin_section_title(
            array(
                'parent' => $hide_logo_container,
                'name'   => 'divided_logo_title',
                'title'  => esc_html__('Divided Header Logo', 'hoshi')
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_divided',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT."/img/logo_divided.png",
                'label'         => esc_html__('Logo Image - Divided', 'hoshi'),
                'description'   => esc_html__('Choose a default logo image to display ', 'hoshi'),
                'parent'        => $hide_logo_container
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_divided_dark',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT."/img/logo_divided_dark.png",
                'label'         => esc_html__('Logo Image - Divided Dark', 'hoshi'),
                'description'   => esc_html__('Choose a default logo image to display ', 'hoshi'),
                'parent'        => $hide_logo_container
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_divided_light',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT."/img/logo_divided_light.png",
                'label'         => esc_html__('Logo Image - Divided Light', 'hoshi'),
                'description'   => esc_html__('Choose a default logo image to display ', 'hoshi'),
                'parent'        => $hide_logo_container
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_divided_sticky',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT."/img/logo_divided.png",
                'label'         => esc_html__('Logo Image - Divided Sticky', 'hoshi'),
                'description'   => esc_html__('Choose a default logo image to display ', 'hoshi'),
                'parent'        => $hide_logo_container
            )
        );

        hoshi_mikado_add_admin_section_title(
            array(
                'parent' => $hide_logo_container,
                'name'   => 'vertical_logo_title',
                'title'  => esc_html__('Vertical Header Logo', 'hoshi')
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_vertical',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT."/img/logo_white.png",
                'label'         => esc_html__('Logo Image - Vertical Header', 'hoshi'),
                'description'   => esc_html__('Choose a default logo image to display on vertilcal header', 'hoshi'),
                'parent'        => $hide_logo_container
            )
        );

        hoshi_mikado_add_admin_section_title(
            array(
                'parent' => $hide_logo_container,
                'name'   => 'mobile_logo_title',
                'title'  => esc_html__('Mobile Header Logo', 'hoshi')
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_mobile',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT."/img/logo.png",
                'label'         => esc_html__('Logo Image - Mobile', 'hoshi'),
                'description'   => esc_html__('Choose a default logo image to display ', 'hoshi'),
                'parent'        => $hide_logo_container
            )
        );

        $panel_design_style = hoshi_mikado_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_design_style',
                'title' => esc_html__('Appearance', 'hoshi')
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'google_fonts',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'hoshi'),
                'description'   => esc_html__('Choose a default Google font for your site', 'hoshi'),
                'parent'        => $panel_design_style
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'additional_google_fonts',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Additional Google Fonts', 'hoshi'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = hoshi_mikado_add_admin_container(
            array(
                'parent'          => $panel_design_style,
                'name'            => 'additional_google_fonts_container',
                'hidden_property' => 'additional_google_fonts',
                'hidden_value'    => 'no'
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'additional_google_font1',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'hoshi'),
                'description'   => esc_html__('Choose additional Google font for your site', 'hoshi'),
                'parent'        => $additional_google_fonts_container
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'additional_google_font2',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'hoshi'),
                'description'   => esc_html__('Choose additional Google font for your site', 'hoshi'),
                'parent'        => $additional_google_fonts_container
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'additional_google_font3',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'hoshi'),
                'description'   => esc_html__('Choose additional Google font for your site', 'hoshi'),
                'parent'        => $additional_google_fonts_container
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'additional_google_font4',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'hoshi'),
                'description'   => esc_html__('Choose additional Google font for your site', 'hoshi'),
                'parent'        => $additional_google_fonts_container
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'additional_google_font5',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'hoshi'),
                'description'   => esc_html__('Choose additional Google font for your site', 'hoshi'),
                'parent'        => $additional_google_fonts_container
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'        => 'first_color',
                'type'        => 'color',
                'label'       => esc_html__('First Main Color', 'hoshi'),
                'description' => esc_html__('Choose the most dominant theme color. Default color is #ff3a4c', 'hoshi'),
                'parent'      => $panel_design_style
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'        => 'page_background_color',
                'type'        => 'color',
                'label'       => esc_html__('Page Background Color', 'hoshi'),
                'description' => esc_html__('Choose the background color for page content. Default color is #ffffff', 'hoshi'),
                'parent'      => $panel_design_style
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'        => 'selection_color',
                'type'        => 'color',
                'label'       => esc_html__('Text Selection Color', 'hoshi'),
                'description' => esc_html__('Choose the color users see when selecting text', 'hoshi'),
                'parent'      => $panel_design_style
            )
        );

        $group_gradient = hoshi_mikado_add_admin_group(array(
            'name'        => 'group_gradient',
            'title'       => esc_html__('Gradient Colors', 'hoshi'),
            'description' => esc_html__('Define colors for gradient styles', 'hoshi'),
            'parent'      => $panel_design_style
        ));

        $row_gradient_style1 = hoshi_mikado_add_admin_row(array(
            'name'   => 'row_gradient_style1',
            'parent' => $group_gradient
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'gradient_style1_start_color',
            'default_value' => '#595ea5',
            'label'         => esc_html__('Style 1 - Start Color (def. #595ea5)', 'hoshi'),
            'parent'        => $row_gradient_style1
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'gradient_style1_end_color',
            'default_value' => '#ff3a4c',
            'label'         => esc_html__('Style 1 - End Color (def. #ff3a4c)', 'hoshi'),
            'parent'        => $row_gradient_style1
        ));

        $row_gradient_style2 = hoshi_mikado_add_admin_row(array(
            'name'   => 'row_gradient_style2',
            'parent' => $group_gradient
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'gradient_style2_start_color',
            'default_value' => '#0199ef',
            'label'         => esc_html__('Style 2 - Start Color (def. #0199ef)', 'hoshi'),
            'parent'        => $row_gradient_style2
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'gradient_style2_end_color',
            'default_value' => '#ff3a4c',
            'label'         => esc_html__('Style 2 - End Color (def. #ff3a4c)', 'hoshi'),
            'parent'        => $row_gradient_style2
        ));

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'boxed',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Boxed Layout', 'hoshi'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_boxed_container"
                )
            )
        );

        $boxed_container = hoshi_mikado_add_admin_container(
            array(
                'parent'          => $panel_design_style,
                'name'            => 'boxed_container',
                'hidden_property' => 'boxed',
                'hidden_value'    => 'no'
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'        => 'page_background_color_in_box',
                'type'        => 'color',
                'label'       => esc_html__('Page Background Color', 'hoshi'),
                'description' => esc_html__('Choose the page background color outside box.', 'hoshi'),
                'parent'      => $boxed_container
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'        => 'boxed_background_image',
                'type'        => 'image',
                'label'       => esc_html__('Background Image', 'hoshi'),
                'description' => esc_html__('Choose an image to be displayed in background', 'hoshi'),
                'parent'      => $boxed_container
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'        => 'boxed_pattern_background_image',
                'type'        => 'image',
                'label'       => esc_html__('Background Pattern', 'hoshi'),
                'description' => esc_html__('Choose an image to be used as background pattern', 'hoshi'),
                'parent'      => $boxed_container
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'boxed_background_image_attachment',
                'type'          => 'select',
                'default_value' => 'fixed',
                'label'         => esc_html__('Background Image Attachment', 'hoshi'),
                'description'   => esc_html__('Choose background image attachment', 'hoshi'),
                'parent'        => $boxed_container,
                'options'       => array(
                    'fixed'  => 'Fixed',
                    'scroll' => 'Scroll'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'initial_content_width',
                'type'          => 'select',
                'default_value' => 'grid-1300',
                'label'         => esc_html__('Initial Width of Content', 'hoshi'),
                'description'   => esc_html__('Choose the initial width of content which is in grid. Applies to pages set to "Default Template" and rows set to "In Grid"', 'hoshi'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    "grid-1300" => esc_html__("1300px - default", 'hoshi'),
                    "grid-1200" => "1200px",
                    ""          => "1100px",
                    "grid-1000" => "1000px",
                    "grid-800"  => "800px"
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'        => 'preload_pattern_image',
                'type'        => 'image',
                'label'       => esc_html__('Preload Pattern Image', 'hoshi'),
                'description' => esc_html__('Choose preload pattern image to be displayed until images are loaded', 'hoshi'),
                'parent'      => $panel_design_style
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'        => 'element_appear_amount',
                'type'        => 'text',
                'label'       => esc_html__('Element Appearance', 'hoshi'),
                'description' => esc_html__('For animated elements, set distance (related to browser bottom) to start the animation', 'hoshi'),
                'parent'      => $panel_design_style,
                'args'        => array(
                    'col_width' => 2,
                    'suffix'    => 'px'
                )
            )
        );

        $panel_settings = hoshi_mikado_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_settings',
                'title' => esc_html__('Behavior', 'hoshi')
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'smooth_scroll',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Scroll', 'hoshi'),
                'description'   => esc_html__('Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'hoshi'),
                'parent'        => $panel_settings
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'smooth_page_transitions',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Page Transitions', 'hoshi'),
                'description'   => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links.', 'hoshi'),
                'parent'        => $panel_settings,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_page_transitions_container, #mkd_smooth_pt_spinner_gradient_container"
                )
            )
        );

        $page_transitions_container = hoshi_mikado_add_admin_container(
            array(
                'parent'          => $panel_settings,
                'name'            => 'page_transitions_container',
                'hidden_property' => 'smooth_page_transitions',
                'hidden_value'    => 'no'
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'page_transition_preloader',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__( 'Enable Preloading Animation', 'hoshi' ),
                'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'hoshi' ),
                'parent'        => $page_transitions_container,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_page_transition_preloader_container"
                )
            )
        );

        $page_transition_preloader_container = hoshi_mikado_add_admin_container(
            array(
                'parent'          => $page_transitions_container,
                'name'            => 'page_transition_preloader_container',
                'hidden_property' => 'page_transition_preloader',
                'hidden_value'    => 'no'
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'   => 'smooth_pt_bgnd_color',
                'type'   => 'color',
                'label'  => esc_html__('Page Loader Background Color', 'hoshi'),
                'parent' => $page_transition_preloader_container
            )
        );

        $group_pt_spinner_animation = hoshi_mikado_add_admin_group(array(
            'name'        => 'group_pt_spinner_animation',
            'title'       => esc_html__('Loader Style', 'hoshi'),
            'description' => esc_html__('Define styles for loader spinner animation', 'hoshi'),
            'parent'      => $page_transition_preloader_container
        ));

        $row_pt_spinner_animation = hoshi_mikado_add_admin_row(array(
            'name'   => 'row_pt_spinner_animation',
            'parent' => $group_pt_spinner_animation
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'selectsimple',
            'name'          => 'smooth_pt_spinner_type',
            'default_value' => 'cube',
            'label'         => esc_html__('Spinner Type', 'hoshi'),
            'parent'        => $row_pt_spinner_animation,
            'options'       => array(
                'pulse'                 => esc_html__('Pulse', 'hoshi'),
                'double_pulse'          => esc_html__('Double Pulse', 'hoshi'),
                'cube'                  => esc_html__('Cube', 'hoshi'),
                'rotating_cubes'        => esc_html__('Rotating Cubes', 'hoshi'),
                'stripes'               => esc_html__('Stripes', 'hoshi'),
                'wave'                  => esc_html__('Wave', 'hoshi'),
                'two_rotating_circles'  => esc_html__('2 Rotating Circles', 'hoshi'),
                'five_rotating_circles' => esc_html__('5 Rotating Circles', 'hoshi'),
                'atom'                  => esc_html__('Atom', 'hoshi'),
                'clock'                 => esc_html__('Clock', 'hoshi'),
                'mitosis'               => esc_html__('Mitosis', 'hoshi'),
                'lines'                 => esc_html__('Lines', 'hoshi'),
                'fussion'               => esc_html__('Fussion', 'hoshi'),
                'wave_circles'          => esc_html__('Wave Circles', 'hoshi'),
                'pulse_circles'         => esc_html__('Pulse Circles', 'hoshi'),
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
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'smooth_pt_spinner_color',
            'default_value' => '',
            'label'         => esc_html__('Spinner Color', 'hoshi'),
            'parent'        => $row_pt_spinner_animation
        ));

        $smooth_pt_spinner_gradient_container = hoshi_mikado_add_admin_container(
            array(
                'parent'          => $page_transition_preloader_container,
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

        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'smooth_pt_spinner_gradient',
                'default_value' => 'mkd-type2-gradient-left-bottom-to-right-top',
                'label'         => 'Spinner Gradient Color',
                'parent'        => $smooth_pt_spinner_gradient_container,
                'options'       => hoshi_mikado_get_gradient_left_bottom_to_right_top_styles('', false)
            )
        );
        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'page_transition_fadeout',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__( 'Enable Fade Out Animation', 'hoshi' ),
                'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'hoshi' ),
                'parent'        => $page_transitions_container
            )
        );


        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'elements_animation_on_touch',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Elements Animation on Mobile/Touch Devices', 'hoshi'),
                'description'   => esc_html__('Enabling this option will allow elements (shortcodes) to animate on mobile / touch devices', 'hoshi'),
                'parent'        => $panel_settings
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'show_back_button',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Show "Back To Top Button"', 'hoshi'),
                'description'   => esc_html__('Enabling this option will display a Back to Top button on every page', 'hoshi'),
                'parent'        => $panel_settings
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'responsiveness',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Responsiveness', 'hoshi'),
                'description'   => esc_html__('Enabling this option will make all pages responsive', 'hoshi'),
                'parent'        => $panel_settings
            )
        );

        $panel_custom_code = hoshi_mikado_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_custom_code',
                'title' => esc_html__('Custom Code', 'hoshi')
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'        => 'custom_css',
                'type'        => 'textarea',
                'label'       => esc_html__('Custom CSS', 'hoshi'),
                'description' => esc_html__('Enter your custom CSS here', 'hoshi'),
                'parent'      => $panel_custom_code
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'        => 'custom_js',
                'type'        => 'textarea',
                'label'       => esc_html__('Custom JS', 'hoshi'),
                'description' => esc_html__('Enter your custom Javascript here', 'hoshi'),
                'parent'      => $panel_custom_code
            )
        );

        $panel_google_api = hoshi_mikado_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_google_api',
                'title' => esc_html__('Google API', 'hoshi')
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'        => 'google_maps_api_key',
                'type'        => 'text',
                'label'       => esc_html__('Google Maps Api Key', 'hoshi'),
                'description' => esc_html__('Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'hoshi'),
                'parent'      => $panel_google_api
            )
        );
    }

    add_action('hoshi_mikado_options_map', 'hoshi_mikado_general_options_map', 1);

}