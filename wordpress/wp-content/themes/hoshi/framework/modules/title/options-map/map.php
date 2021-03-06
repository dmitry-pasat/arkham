<?php

if(!function_exists('hoshi_mikado_title_options_map')) {

    function hoshi_mikado_title_options_map() {

        hoshi_mikado_add_admin_page(
            array(
                'slug'  => '_title_page',
                'title' => esc_html__('Title', 'hoshi'),
                'icon'  => 'icon_archive_alt'
            )
        );

        $panel_title = hoshi_mikado_add_admin_panel(
            array(
                'page'  => '_title_page',
                'name'  => 'panel_title',
                'title' => esc_html__('Title Settings', 'hoshi')
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'show_title_area',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Show Title Area', 'hoshi'),
                'description'   => esc_html__('This option will enable/disable Title Area', 'hoshi'),
                'parent'        => $panel_title,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_show_title_area_container"
                )
            )
        );

        $show_title_area_container = hoshi_mikado_add_admin_container(
            array(
                'parent'          => $panel_title,
                'name'            => 'show_title_area_container',
                'hidden_property' => 'show_title_area',
                'hidden_value'    => 'no'
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'title_area_type',
                'type'          => 'select',
                'default_value' => 'standard',
                'label'         => esc_html__('Title Area Type', 'hoshi'),
                'description'   => esc_html__('Choose title type', 'hoshi'),
                'parent'        => $show_title_area_container,
                'options'       => array(
                    'standard'   => esc_html__('Standard', 'hoshi'),
                    'breadcrumb' => esc_html__('Breadcrumb', 'hoshi')
                ),
                'args'          => array(
                    "dependence" => true,
                    "hide"       => array(
                        "standard"   => "",
                        "breadcrumb" => "#mkd_title_area_type_container"
                    ),
                    "show"       => array(
                        "standard"   => "#mkd_title_area_type_container",
                        "breadcrumb" => ""
                    )
                )
            )
        );

        $title_area_type_container = hoshi_mikado_add_admin_container(
            array(
                'parent'          => $show_title_area_container,
                'name'            => 'title_area_type_container',
                'hidden_property' => 'title_area_type',
                'hidden_value'    => '',
                'hidden_values'   => array('breadcrumb'),
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'title_area_enable_breadcrumbs',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Enable Breadcrumbs', 'hoshi'),
                'description'   => esc_html__('This option will display Breadcrumbs in Title Area', 'hoshi'),
                'parent'        => $title_area_type_container,
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'			=> 'title_area_text_size',
                'type'			=> 'select',
                'default_value'	=> 'medium',
                'label'			=> esc_html__('Text Size', 'hoshi'),
                'description'	=> esc_html__('Choose a default Title size', 'hoshi'),
                'parent'		=> $show_title_area_container,
                'options'		=> array(
                    'small'     => esc_html__('Small','hoshi'),
                    'medium'    => esc_html__('Medium','hoshi'),
                    'large'     => esc_html__('Large','hoshi')
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'title_area_gradient_overaly_animation',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Animated Gradient Overlay', 'hoshi'),
                'description'   => esc_html__('Show animated gradient overlay for Title Area', 'hoshi'),
                'parent'        => $show_title_area_container,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_title_area_gradient_overaly_animation_container"
                )
            )
        );

        $title_area_gradient_overaly_animation_container = hoshi_mikado_add_admin_container(
            array(
                'parent'          => $show_title_area_container,
                'name'            => 'title_area_gradient_overaly_animation_container',
                'hidden_property' => 'title_area_gradient_overaly_animation',
                'hidden_value'    => 'no'
            )
        );

        $group_title_area_gradient_overlay = hoshi_mikado_add_admin_group(array(
            'name'        => 'group_page_title_styles',
            'title'       => esc_html__('Animated Gradient Overlay Colors', 'hoshi'),
            'description' => esc_html__('Define colors for gradient overlay', 'hoshi'),
            'parent'      => $title_area_gradient_overaly_animation_container
        ));

        $row_gradient_overlay = hoshi_mikado_add_admin_row(array(
            'name'   => 'row_gradient_overlay',
            'parent' => $group_title_area_gradient_overlay
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'title_gradient_overlay_color1',
            'default_value' => '#e14b4f',
            'label'         => esc_html__('Color 1 (def. #e14b4f)', 'hoshi'),
            'parent'        => $row_gradient_overlay
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'title_gradient_overlay_color2',
            'default_value' => '#58b0e3',
            'label'         => esc_html__('Color 2 (def. #58b0e3)', 'hoshi'),
            'parent'        => $row_gradient_overlay
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'title_gradient_overlay_color3',
            'default_value' => '#48316b',
            'label'         => esc_html__('Color 3 (def. #48316b)', 'hoshi'),
            'parent'        => $row_gradient_overlay
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'title_gradient_overlay_color4',
            'default_value' => '#913156',
            'label'         => esc_html__('Color 4 (def. #913156)', 'hoshi'),
            'parent'        => $row_gradient_overlay
        ));

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'title_area_animation',
                'type'          => 'select',
                'default_value' => 'no',
                'label'         => esc_html__('Animations', 'hoshi'),
                'description'   => esc_html__('Choose an animation for Title Area', 'hoshi'),
                'parent'        => $show_title_area_container,
                'options'       => array(
                    'no'         => esc_html__('No Animation', 'hoshi'),
                    'right-left' => esc_html__('Text right to left', 'hoshi'),
                    'left-right' => esc_html__('Text left to right', 'hoshi')
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'title_area_vertial_alignment',
                'type'          => 'select',
                'default_value' => 'header_bottom',
                'label'         => esc_html__('Vertical Alignment', 'hoshi'),
                'description'   => esc_html__('Specify title vertical alignment', 'hoshi'),
                'parent'        => $show_title_area_container,
                'options'       => array(
                    'header_bottom' => esc_html__('From Bottom of Header', 'hoshi'),
                    'window_top'    => esc_html__('From Window Top', 'hoshi')
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'title_area_content_alignment',
                'type'          => 'select',
                'default_value' => 'left',
                'label'         => esc_html__('Horizontal Alignment', 'hoshi'),
                'description'   => esc_html__('Specify title horizontal alignment', 'hoshi'),
                'parent'        => $show_title_area_container,
                'options'       => array(
                    'left'   => esc_html__('Left', 'hoshi'),
                    'center' => esc_html__('Center', 'hoshi'),
                    'right'  => esc_html__('Right', 'hoshi')
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'        => 'title_area_background_color',
                'type'        => 'color',
                'label'       => esc_html__('Background Color', 'hoshi'),
                'description' => esc_html__('Choose a background color for Title Area', 'hoshi'),
                'parent'      => $show_title_area_container
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'        => 'title_area_background_image',
                'type'        => 'image',
                'label'       => esc_html__('Background Image', 'hoshi'),
                'description' => esc_html__('Choose an Image for Title Area', 'hoshi'),
                'parent'      => $show_title_area_container
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'title_area_background_image_responsive',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Background Responsive Image', 'hoshi'),
                'description'   => esc_html__('Enabling this option will make Title background image responsive', 'hoshi'),
                'parent'        => $show_title_area_container,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "#mkd_title_area_background_image_responsive_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $title_area_background_image_responsive_container = hoshi_mikado_add_admin_container(
            array(
                'parent'          => $show_title_area_container,
                'name'            => 'title_area_background_image_responsive_container',
                'hidden_property' => 'title_area_background_image_responsive',
                'hidden_value'    => 'yes'
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'name'          => 'title_area_background_image_parallax',
                'type'          => 'select',
                'default_value' => 'no',
                'label'         => esc_html__('Background Image in Parallax', 'hoshi'),
                'description'   => esc_html__('Enabling this option will make Title background image parallax', 'hoshi'),
                'parent'        => $title_area_background_image_responsive_container,
                'options'       => array(
                    'no'       => esc_html__('No', 'hoshi'),
                    'yes'      => esc_html__('Yes', 'hoshi'),
                    'yes_zoom' => esc_html__('Yes, with zoom out', 'hoshi')
                )
            )
        );

        hoshi_mikado_add_admin_field(array(
            'name'        => 'title_area_height',
            'type'        => 'text',
            'label'       => esc_html__('Height', 'hoshi'),
            'description' => esc_html__('Set a height for Title Area', 'hoshi'),
            'parent'      => $title_area_background_image_responsive_container,
            'args'        => array(
                'col_width' => 2,
                'suffix'    => 'px'
            )
        ));


        $panel_typography = hoshi_mikado_add_admin_panel(
            array(
                'page'  => '_title_page',
                'name'  => 'panel_title_typography',
                'title' => esc_html__('Typography', 'hoshi')
            )
        );

        $group_page_title_styles = hoshi_mikado_add_admin_group(array(
            'name'        => 'group_page_title_styles',
            'title'       => esc_html__('Title', 'hoshi'),
            'description' => esc_html__('Define styles for page title', 'hoshi'),
            'parent'      => $panel_typography
        ));

        $row_page_title_styles_1 = hoshi_mikado_add_admin_row(array(
            'name'   => 'row_page_title_styles_1',
            'parent' => $group_page_title_styles
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'page_title_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'hoshi'),
            'parent'        => $row_page_title_styles_1
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'page_title_fontsize',
            'default_value' => '',
            'label'         => esc_html__('Font Size', 'hoshi'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_page_title_styles_1
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'page_title_lineheight',
            'default_value' => '',
            'label'         => esc_html__('Line Height', 'hoshi'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_page_title_styles_1
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'page_title_texttransform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'hoshi'),
            'options'       => hoshi_mikado_get_text_transform_array(),
            'parent'        => $row_page_title_styles_1
        ));

        $row_page_title_styles_2 = hoshi_mikado_add_admin_row(array(
            'name'   => 'row_page_title_styles_2',
            'parent' => $group_page_title_styles,
            'next'   => true
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'fontsimple',
            'name'          => 'page_title_google_fonts',
            'default_value' => '-1',
            'label'         => esc_html__('Font Family', 'hoshi'),
            'parent'        => $row_page_title_styles_2
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'page_title_fontstyle',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'hoshi'),
            'options'       => hoshi_mikado_get_font_style_array(),
            'parent'        => $row_page_title_styles_2
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'page_title_fontweight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'hoshi'),
            'options'       => hoshi_mikado_get_font_weight_array(),
            'parent'        => $row_page_title_styles_2
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'page_title_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'hoshi'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_page_title_styles_2
        ));

        $group_page_subtitle_styles = hoshi_mikado_add_admin_group(array(
            'name'        => 'group_page_subtitle_styles',
            'title'       => esc_html__('Subtitle', 'hoshi'),
            'description' => esc_html__('Define styles for page subtitle', 'hoshi'),
            'parent'      => $panel_typography
        ));

        $row_page_subtitle_styles_1 = hoshi_mikado_add_admin_row(array(
            'name'   => 'row_page_subtitle_styles_1',
            'parent' => $group_page_subtitle_styles
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'page_subtitle_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'hoshi'),
            'parent'        => $row_page_subtitle_styles_1
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'page_subtitle_fontsize',
            'default_value' => '',
            'label'         => esc_html__('Font Size', 'hoshi'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_page_subtitle_styles_1
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'page_subtitle_lineheight',
            'default_value' => '',
            'label'         => esc_html__('Line Height', 'hoshi'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_page_subtitle_styles_1
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'page_subtitle_texttransform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'hoshi'),
            'options'       => hoshi_mikado_get_text_transform_array(),
            'parent'        => $row_page_subtitle_styles_1
        ));

        $row_page_subtitle_styles_2 = hoshi_mikado_add_admin_row(array(
            'name'   => 'row_page_subtitle_styles_2',
            'parent' => $group_page_subtitle_styles,
            'next'   => true
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'fontsimple',
            'name'          => 'page_subtitle_google_fonts',
            'default_value' => '-1',
            'label'         => esc_html__('Font Family', 'hoshi'),
            'parent'        => $row_page_subtitle_styles_2
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'page_subtitle_fontstyle',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'hoshi'),
            'options'       => hoshi_mikado_get_font_style_array(),
            'parent'        => $row_page_subtitle_styles_2
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'page_subtitle_fontweight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'hoshi'),
            'options'       => hoshi_mikado_get_font_weight_array(),
            'parent'        => $row_page_subtitle_styles_2
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'page_subtitle_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'hoshi'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_page_subtitle_styles_2
        ));

        $group_page_breadcrumbs_styles = hoshi_mikado_add_admin_group(array(
            'name'        => 'group_page_breadcrumbs_styles',
            'title'       => esc_html__('Breadcrumbs', 'hoshi'),
            'description' => esc_html__('Define styles for page breadcrumbs', 'hoshi'),
            'parent'      => $panel_typography
        ));

        $row_page_breadcrumbs_styles_1 = hoshi_mikado_add_admin_row(array(
            'name'   => 'row_page_breadcrumbs_styles_1',
            'parent' => $group_page_breadcrumbs_styles
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'page_breadcrumb_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'hoshi'),
            'parent'        => $row_page_breadcrumbs_styles_1
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'page_breadcrumb_fontsize',
            'default_value' => '',
            'label'         => esc_html__('Font Size', 'hoshi'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_page_breadcrumbs_styles_1
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'page_breadcrumb_lineheight',
            'default_value' => '',
            'label'         => esc_html__('Line Height', 'hoshi'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_page_breadcrumbs_styles_1
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'page_breadcrumb_texttransform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'hoshi'),
            'options'       => hoshi_mikado_get_text_transform_array(),
            'parent'        => $row_page_breadcrumbs_styles_1
        ));

        $row_page_breadcrumbs_styles_2 = hoshi_mikado_add_admin_row(array(
            'name'   => 'row_page_breadcrumbs_styles_2',
            'parent' => $group_page_breadcrumbs_styles,
            'next'   => true
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'fontsimple',
            'name'          => 'page_breadcrumb_google_fonts',
            'default_value' => '-1',
            'label'         => esc_html__('Font Family', 'hoshi'),
            'parent'        => $row_page_breadcrumbs_styles_2
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'page_breadcrumb_fontstyle',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'hoshi'),
            'options'       => hoshi_mikado_get_font_style_array(),
            'parent'        => $row_page_breadcrumbs_styles_2
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'page_breadcrumb_fontweight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'hoshi'),
            'options'       => hoshi_mikado_get_font_weight_array(),
            'parent'        => $row_page_breadcrumbs_styles_2
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'page_breadcrumb_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'hoshi'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_page_breadcrumbs_styles_2
        ));

        $row_page_breadcrumbs_styles_3 = hoshi_mikado_add_admin_row(array(
            'name'   => 'row_page_breadcrumbs_styles_3',
            'parent' => $group_page_breadcrumbs_styles,
            'next'   => true
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'page_breadcrumb_hovercolor',
            'default_value' => '',
            'label'         => esc_html__('Hover/Active Color', 'hoshi'),
            'parent'        => $row_page_breadcrumbs_styles_3
        ));

    }

    add_action('hoshi_mikado_options_map', 'hoshi_mikado_title_options_map', 7);

}