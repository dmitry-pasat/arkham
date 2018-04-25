<?php

if(!function_exists('hoshi_mikado_sidearea_options_map')) {

    function hoshi_mikado_sidearea_options_map() {

        hoshi_mikado_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'hoshi'),
                'icon'  => 'icon_menu'
            )
        );

        $side_area_panel = hoshi_mikado_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'hoshi'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'hoshi'),
                'description'   => esc_html__('Choose a type of Side Area', 'hoshi'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'hoshi'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'hoshi'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'hoshi')
                ),
                'args'          => array(
                    'dependence' => true,
                    'hide'       => array(
                        'side-menu-slide-from-right'       => '#mkd_side_area_slide_with_content_container',
                        'side-menu-slide-with-content'     => '#mkd_side_area_width_container',
                        'side-area-uncovered-from-content' => '#mkd_side_area_width_container, #mkd_side_area_slide_with_content_container'
                    ),
                    'show'       => array(
                        'side-menu-slide-from-right'       => '#mkd_side_area_width_container',
                        'side-menu-slide-with-content'     => '#mkd_side_area_slide_with_content_container',
                        'side-area-uncovered-from-content' => ''
                    )
                )
            )
        );

        $side_area_width_container = hoshi_mikado_add_admin_container(
            array(
                'parent'          => $side_area_panel,
                'name'            => 'side_area_width_container',
                'hidden_property' => 'side_area_type',
                'hidden_value'    => '',
                'hidden_values'   => array(
                    'side-menu-slide-with-content',
                    'side-area-uncovered-from-content'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'hoshi'),
                'description'   => esc_html__('Enter a width for Side Area (in percentages, enter more than 30)', 'hoshi'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => '%'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'hoshi'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'hoshi'),
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'hoshi'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'hoshi'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        $side_area_slide_with_content_container = hoshi_mikado_add_admin_container(
            array(
                'parent'          => $side_area_panel,
                'name'            => 'side_area_slide_with_content_container',
                'hidden_property' => 'side_area_type',
                'hidden_value'    => '',
                'hidden_values'   => array(
                    'side-menu-slide-from-right',
                    'side-area-uncovered-from-content'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_slide_with_content_container,
                'type'          => 'select',
                'name'          => 'side_area_slide_with_content_width',
                'default_value' => 'width-470',
                'label'         => esc_html__('Side Area Width', 'hoshi'),
                'description'   => esc_html__('Choose width for Side Area', 'hoshi'),
                'options'       => array(
                    'width-270' => '270px',
                    'width-370' => '370px',
                    'width-470' => '470px'
                )
            )
        );

        hoshi_mikado_add_admin_field(array(
                'parent'      => $side_area_panel,
                'type'        => 'image',
                'name'        => 'side_area_bakground_image',
                'label'       => esc_html__('Side Area Background Image', 'hoshi'),
                'description' => esc_html__('Choose background image for Side Area', 'hoshi')
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'yesno',
                'name'          => 'side_area_enable_default_opener',
                'default_value' => 'yes',
                'label'         => esc_html__('Enable Default Side Area Opener Icon', 'hoshi'),
                'description'   => esc_html__('Enabling this option will enable default side area opener icon', 'hoshi'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_show_on_yes' => '',
                    'dependence_hide_on_yes' => '#mkd_side_area_opener_icon_container_no_style'
                )
            )
        );

//init icon pack hide and show array. It will be populated dinamically from collections array
        $side_area_icon_pack_hide_array = array();
        $side_area_icon_pack_show_array = array();

//do we have some collection added in collections array?
        if(is_array(hoshi_mikado_icon_collections()->iconCollections) && count(hoshi_mikado_icon_collections()->iconCollections)) {
            //get collections params array. It will contain values of 'param' property for each collection
            $side_area_icon_collections_params = hoshi_mikado_icon_collections()->getIconCollectionsParams();

            //foreach collection generate hide and show array
            foreach(hoshi_mikado_icon_collections()->iconCollections as $dep_collection_key => $dep_collection_object) {
                $side_area_icon_pack_hide_array[$dep_collection_key] = '';

                //we need to include only current collection in show string as it is the only one that needs to show
                $side_area_icon_pack_show_array[$dep_collection_key] = '#mkd_side_area_icon_'.$dep_collection_object->param.'_container';

                //for all collections param generate hide string
                foreach($side_area_icon_collections_params as $side_area_icon_collections_param) {
                    //we don't need to include current one, because it needs to be shown, not hidden
                    if($side_area_icon_collections_param !== $dep_collection_object->param) {
                        $side_area_icon_pack_hide_array[$dep_collection_key] .= '#mkd_side_area_icon_'.$side_area_icon_collections_param.'_container,';
                    }
                }

                //remove remaining ',' character
                $side_area_icon_pack_hide_array[$dep_collection_key] = rtrim($side_area_icon_pack_hide_array[$dep_collection_key], ',');
            }

        }

        $side_area_opener_icon_container_no_style = hoshi_mikado_add_admin_container_no_style(array(
            'name'            => 'side_area_opener_icon_container_no_style',
            'parent'          => $side_area_panel,
            'hidden_property' => 'side_area_enable_default_opener',
            'hidden_value'    => 'yes'
        ));

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_opener_icon_container_no_style,
                'type'          => 'select',
                'name'          => 'side_area_button_icon_pack',
                'default_value' => 'font_awesome',
                'label'         => esc_html__('Side Area Button Icon Pack', 'hoshi'),
                'description'   => esc_html__('Choose icon pack for side area button', 'hoshi'),
                'options'       => hoshi_mikado_icon_collections()->getIconCollections(),
                'args'          => array(
                    'dependence' => true,
                    'hide'       => $side_area_icon_pack_hide_array,
                    'show'       => $side_area_icon_pack_show_array
                )
            )
        );

        if(is_array(hoshi_mikado_icon_collections()->iconCollections) && count(hoshi_mikado_icon_collections()->iconCollections)) {
            //foreach icon collection we need to generate separate container that will have dependency set
            //it will have one field inside with icons dropdown
            foreach(hoshi_mikado_icon_collections()->iconCollections as $collection_key => $collection_object) {
                $icons_array = $collection_object->getIconsArray();

                //get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
                $icon_collections_keys = hoshi_mikado_icon_collections()->getIconCollectionsKeys();

                //unset current one, because it doesn't have to be included in dependency that hides icon container
                unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

                $side_area_icon_hide_values = $icon_collections_keys;

                $side_area_icon_container = hoshi_mikado_add_admin_container(
                    array(
                        'parent'          => $side_area_opener_icon_container_no_style,
                        'name'            => 'side_area_icon_'.$collection_object->param.'_container',
                        'hidden_property' => 'side_area_button_icon_pack',
                        'hidden_value'    => '',
                        'hidden_values'   => $side_area_icon_hide_values
                    )
                );

                hoshi_mikado_add_admin_field(
                    array(
                        'parent'        => $side_area_icon_container,
                        'type'          => 'select',
                        'name'          => 'side_area_icon_'.$collection_object->param,
                        'default_value' => 'fa-bars',
                        'label'         => esc_html__('Side Area Icon', 'hoshi'),
                        'description'   => esc_html__('Choose Side Area Icon', 'hoshi'),
                        'options'       => $icons_array,
                    )
                );

            }

        }

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_opener_icon_container_no_style,
                'type'          => 'text',
                'name'          => 'side_area_icon_font_size',
                'default_value' => '',
                'label'         => esc_html__('Side Area Icon Size', 'hoshi'),
                'description'   => esc_html__('Choose a size for Side Area (px)', 'hoshi'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => 'px'
                ),
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_opener_icon_container_no_style,
                'type'          => 'select',
                'name'          => 'side_area_predefined_icon_size',
                'default_value' => 'normal',
                'label'         => esc_html__('Predefined Side Area Icon Size', 'hoshi'),
                'description'   => esc_html__('Choose predefined size for Side Area icons', 'hoshi'),
                'options'       => array(
                    'normal' => esc_html__('Normal', 'hoshi'),
                    'medium' => esc_html__('Medium', 'hoshi'),
                    'large'  => esc_html__('Large', 'hoshi')
                ),
            )
        );

        $side_area_icon_style_group = hoshi_mikado_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'hoshi'),
                'description' => esc_html__('Define styles for Side Area icon', 'hoshi')
            )
        );

        $side_area_icon_style_row1 = hoshi_mikado_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_icon_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'side_area_icon_color',
                'default_value' => '',
                'label'         => esc_html__('Color', 'hoshi'),
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_icon_style_row1,
                'type'          => 'colorsimple',
                'name'          => 'side_area_icon_hover_color',
                'default_value' => '',
                'label'         => esc_html__('Hover Color', 'hoshi'),
            )
        );

        $side_area_icon_style_row2 = hoshi_mikado_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_icon_style_row2,
                'type'          => 'colorsimple',
                'name'          => 'side_area_light_icon_color',
                'default_value' => '',
                'label'         => esc_html__('Light Menu Icon Color', 'hoshi'),
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_icon_style_row2,
                'type'          => 'colorsimple',
                'name'          => 'side_area_light_icon_hover_color',
                'default_value' => '',
                'label'         => esc_html__('Light Menu Icon Hover Color', 'hoshi'),
            )
        );

        $side_area_icon_style_row3 = hoshi_mikado_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row3',
                'next'   => true
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_icon_style_row3,
                'type'          => 'colorsimple',
                'name'          => 'side_area_dark_icon_color',
                'default_value' => '',
                'label'         => esc_html__('Dark Menu Icon Color', 'hoshi'),
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_icon_style_row3,
                'type'          => 'colorsimple',
                'name'          => 'side_area_dark_icon_hover_color',
                'default_value' => '',
                'label'         => esc_html__('Dark Menu Icon Hover Color', 'hoshi'),
            )
        );

        $icon_spacing_group = hoshi_mikado_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'icon_spacing_group',
                'title'       => esc_html__('Side Area Icon Spacing', 'hoshi'),
                'description' => esc_html__('Define padding and margin for side area icon', 'hoshi')
            )
        );

        $icon_spacing_row = hoshi_mikado_add_admin_row(
            array(
                'parent' => $icon_spacing_group,
                'name'   => 'icon_spancing_row',
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $icon_spacing_row,
                'type'          => 'textsimple',
                'name'          => 'side_area_icon_padding_left',
                'default_value' => '',
                'label'         => esc_html__('Padding Left', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $icon_spacing_row,
                'type'          => 'textsimple',
                'name'          => 'side_area_icon_padding_right',
                'default_value' => '',
                'label'         => esc_html__('Padding Right', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $icon_spacing_row,
                'type'          => 'textsimple',
                'name'          => 'side_area_icon_margin_left',
                'default_value' => '',
                'label'         => esc_html__('Margin Left', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $icon_spacing_row,
                'type'          => 'textsimple',
                'name'          => 'side_area_icon_margin_right',
                'default_value' => '',
                'label'         => esc_html__('Margin Right', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'yesno',
                'name'          => 'side_area_icon_border_yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Icon Border', 'hoshi'),
                'descritption'  => esc_html__('Enable border around icon', 'hoshi'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_side_area_icon_border_container'
                )
            )
        );

        $side_area_icon_border_container = hoshi_mikado_add_admin_container(
            array(
                'parent'          => $side_area_panel,
                'name'            => 'side_area_icon_border_container',
                'hidden_property' => 'side_area_icon_border_yesno',
                'hidden_value'    => 'no'
            )
        );

        $border_style_group = hoshi_mikado_add_admin_group(
            array(
                'parent'      => $side_area_icon_border_container,
                'name'        => 'border_style_group',
                'title'       => esc_html__('Border Style', 'hoshi'),
                'description' => esc_html__('Define styling for border around icon', 'hoshi')
            )
        );

        $border_style_row_1 = hoshi_mikado_add_admin_row(
            array(
                'parent' => $border_style_group,
                'name'   => 'border_style_row_1',
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $border_style_row_1,
                'type'          => 'colorsimple',
                'name'          => 'side_area_icon_border_color',
                'default_value' => '',
                'label'         => esc_html__('Color', 'hoshi'),
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $border_style_row_1,
                'type'          => 'colorsimple',
                'name'          => 'side_area_icon_border_hover_color',
                'default_value' => '',
                'label'         => esc_html__('Hover Color', 'hoshi'),
            )
        );

        $border_style_row_2 = hoshi_mikado_add_admin_row(
            array(
                'parent' => $border_style_group,
                'name'   => 'border_style_row_2',
                'next'   => true
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $border_style_row_2,
                'type'          => 'textsimple',
                'name'          => 'side_area_icon_border_width',
                'default_value' => '',
                'label'         => esc_html__('Width', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $border_style_row_2,
                'type'          => 'textsimple',
                'name'          => 'side_area_icon_border_radius',
                'default_value' => '',
                'label'         => esc_html__('Radius', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $border_style_row_2,
                'type'          => 'selectsimple',
                'name'          => 'side_area_icon_border_style',
                'default_value' => '',
                'label'         => esc_html__('Style', 'hoshi'),
                'options'       => array(
                    'solid'  => esc_html__('Solid', 'hoshi'),
                    'dashed' => esc_html__('Dashed', 'hoshi'),
                    'dotted' => esc_html__('Dotted', 'hoshi')
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Aligment', 'hoshi'),
                'description'   => esc_html__('Choose text aligment for side area', 'hoshi'),
                'options'       => array(
                    'center' => esc_html__('Center', 'hoshi'),
                    'left'   => esc_html__('Left', 'hoshi'),
                    'right'  => esc_html__('Right', 'hoshi')
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_title',
                'default_value' => '',
                'label'         => esc_html__('Side Area Title', 'hoshi'),
                'description'   => esc_html__('Enter a title to appear in Side Area', 'hoshi'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'color',
                'name'          => 'side_area_background_color',
                'default_value' => '',
                'label'         => esc_html__('Background Color', 'hoshi'),
                'description'   => esc_html__('Choose a background color for Side Area', 'hoshi'),
            )
        );

        $padding_group = hoshi_mikado_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'padding_group',
                'title'       => esc_html__('Padding', 'hoshi'),
                'description' => esc_html__('Define padding for Side Area', 'hoshi')
            )
        );

        $padding_row = hoshi_mikado_add_admin_row(
            array(
                'parent' => $padding_group,
                'name'   => 'padding_row',
                'next'   => true
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $padding_row,
                'type'          => 'textsimple',
                'name'          => 'side_area_padding_top',
                'default_value' => '',
                'label'         => esc_html__('Top Padding', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $padding_row,
                'type'          => 'textsimple',
                'name'          => 'side_area_padding_right',
                'default_value' => '',
                'label'         => esc_html__('Right Padding', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $padding_row,
                'type'          => 'textsimple',
                'name'          => 'side_area_padding_bottom',
                'default_value' => '',
                'label'         => esc_html__('Bottom Padding', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $padding_row,
                'type'          => 'textsimple',
                'name'          => 'side_area_padding_left',
                'default_value' => '',
                'label'         => esc_html__('Left Padding', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_close_icon',
                'default_value' => 'light',
                'label'         => esc_html__('Close Icon Style', 'hoshi'),
                'description'   => esc_html__('Choose a type of close icon', 'hoshi'),
                'options'       => array(
                    'light' => 'Light',
                    'dark'  => 'Dark'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_close_icon_size',
                'default_value' => '',
                'label'         => esc_html__('Close Icon Size', 'hoshi'),
                'description'   => esc_html__('Define close icon size', 'hoshi'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => 'px'
                )
            )
        );

        $title_group = hoshi_mikado_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'title_group',
                'title'       => esc_html__('Title', 'hoshi'),
                'description' => esc_html__('Define Style for Side Area title', 'hoshi')
            )
        );

        $title_row_1 = hoshi_mikado_add_admin_row(
            array(
                'parent' => $title_group,
                'name'   => 'title_row_1',
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $title_row_1,
                'type'          => 'colorsimple',
                'name'          => 'side_area_title_color',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'hoshi'),
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $title_row_1,
                'type'          => 'textsimple',
                'name'          => 'side_area_title_fontsize',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $title_row_1,
                'type'          => 'textsimple',
                'name'          => 'side_area_title_lineheight',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $title_row_1,
                'type'          => 'selectblanksimple',
                'name'          => 'side_area_title_texttransform',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'hoshi'),
                'options'       => hoshi_mikado_get_text_transform_array()
            )
        );

        $title_row_2 = hoshi_mikado_add_admin_row(
            array(
                'parent' => $title_group,
                'name'   => 'title_row_2',
                'next'   => true
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $title_row_2,
                'type'          => 'fontsimple',
                'name'          => 'side_area_title_google_fonts',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'hoshi'),
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $title_row_2,
                'type'          => 'selectblanksimple',
                'name'          => 'side_area_title_fontstyle',
                'default_value' => '',
                'label'         => esc_html__('Font Style', 'hoshi'),
                'options'       => hoshi_mikado_get_font_style_array()
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $title_row_2,
                'type'          => 'selectblanksimple',
                'name'          => 'side_area_title_fontweight',
                'default_value' => '',
                'label'         => esc_html__('Font Weight', 'hoshi'),
                'options'       => hoshi_mikado_get_font_weight_array()
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $title_row_2,
                'type'          => 'textsimple',
                'name'          => 'side_area_title_letterspacing',
                'default_value' => '',
                'label'         => esc_html__('Letter Spacing', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );


        $text_group = hoshi_mikado_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'text_group',
                'title'       => esc_html__('Text', 'hoshi'),
                'description' => esc_html__('Define Style for Side Area text', 'hoshi')
            )
        );

        $text_row_1 = hoshi_mikado_add_admin_row(
            array(
                'parent' => $text_group,
                'name'   => 'text_row_1',
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $text_row_1,
                'type'          => 'colorsimple',
                'name'          => 'side_area_text_color',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'hoshi'),
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $text_row_1,
                'type'          => 'textsimple',
                'name'          => 'side_area_text_fontsize',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $text_row_1,
                'type'          => 'textsimple',
                'name'          => 'side_area_text_lineheight',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $text_row_1,
                'type'          => 'selectblanksimple',
                'name'          => 'side_area_text_texttransform',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'hoshi'),
                'options'       => hoshi_mikado_get_text_transform_array()
            )
        );

        $text_row_2 = hoshi_mikado_add_admin_row(
            array(
                'parent' => $text_group,
                'name'   => 'text_row_2',
                'next'   => true
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $text_row_2,
                'type'          => 'fontsimple',
                'name'          => 'side_area_text_google_fonts',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'hoshi'),
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $text_row_2,
                'type'          => 'fontsimple',
                'name'          => 'side_area_text_google_fonts',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'hoshi'),
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $text_row_2,
                'type'          => 'selectblanksimple',
                'name'          => 'side_area_text_fontstyle',
                'default_value' => '',
                'label'         => esc_html__('Font Style', 'hoshi'),
                'options'       => hoshi_mikado_get_font_style_array()
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $text_row_2,
                'type'          => 'selectblanksimple',
                'name'          => 'side_area_text_fontweight',
                'default_value' => '',
                'label'         => esc_html__('Font Weight', 'hoshi'),
                'options'       => hoshi_mikado_get_font_weight_array()
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $text_row_2,
                'type'          => 'textsimple',
                'name'          => 'side_area_text_letterspacing',
                'default_value' => '',
                'label'         => esc_html__('Letter Spacing', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $widget_links_group = hoshi_mikado_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'widget_links_group',
                'title'       => esc_html__('Link Style', 'hoshi'),
                'description' => esc_html__('Define styles for Side Area widget links', 'hoshi')
            )
        );

        $widget_links_row_1 = hoshi_mikado_add_admin_row(
            array(
                'parent' => $widget_links_group,
                'name'   => 'widget_links_row_1',
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $widget_links_row_1,
                'type'          => 'colorsimple',
                'name'          => 'sidearea_link_color',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'hoshi'),
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $widget_links_row_1,
                'type'          => 'textsimple',
                'name'          => 'sidearea_link_font_size',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $widget_links_row_1,
                'type'          => 'textsimple',
                'name'          => 'sidearea_link_line_height',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $widget_links_row_1,
                'type'          => 'selectblanksimple',
                'name'          => 'sidearea_link_text_transform',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'hoshi'),
                'options'       => hoshi_mikado_get_text_transform_array()
            )
        );

        $widget_links_row_2 = hoshi_mikado_add_admin_row(
            array(
                'parent' => $widget_links_group,
                'name'   => 'widget_links_row_2',
                'next'   => true
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $widget_links_row_2,
                'type'          => 'fontsimple',
                'name'          => 'sidearea_link_font_family',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'hoshi'),
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $widget_links_row_2,
                'type'          => 'selectblanksimple',
                'name'          => 'sidearea_link_font_style',
                'default_value' => '',
                'label'         => esc_html__('Font Style', 'hoshi'),
                'options'       => hoshi_mikado_get_font_style_array()
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $widget_links_row_2,
                'type'          => 'selectblanksimple',
                'name'          => 'sidearea_link_font_weight',
                'default_value' => '',
                'label'         => esc_html__('Font Weight', 'hoshi'),
                'options'       => hoshi_mikado_get_font_weight_array()
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $widget_links_row_2,
                'type'          => 'textsimple',
                'name'          => 'sidearea_link_letter_spacing',
                'default_value' => '',
                'label'         => esc_html__('Letter Spacing', 'hoshi'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $widget_links_row_3 = hoshi_mikado_add_admin_row(
            array(
                'parent' => $widget_links_group,
                'name'   => 'widget_links_row_3',
                'next'   => true
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $widget_links_row_3,
                'type'          => 'colorsimple',
                'name'          => 'sidearea_link_hover_color',
                'default_value' => '',
                'label'         => esc_html__('Hover Color', 'hoshi'),
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'yesno',
                'name'          => 'side_area_enable_bottom_border',
                'default_value' => 'no',
                'label'         => esc_html__('Border Bottom on Elements', 'hoshi'),
                'description'   => esc_html__('Enable border bottom on elements in side area', 'hoshi'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_side_area_bottom_border_container'
                )
            )
        );

        $side_area_bottom_border_container = hoshi_mikado_add_admin_container(
            array(
                'parent'          => $side_area_panel,
                'name'            => 'side_area_bottom_border_container',
                'hidden_property' => 'side_area_enable_bottom_border',
                'hidden_value'    => 'no'
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $side_area_bottom_border_container,
                'type'          => 'color',
                'name'          => 'side_area_bottom_border_color',
                'default_value' => '',
                'label'         => esc_html__('Border Bottom Color', 'hoshi'),
                'description'   => esc_html__('Choose color for border bottom on elements in sidearea', 'hoshi')
            )
        );

    }

    add_action('hoshi_mikado_options_map', 'hoshi_mikado_sidearea_options_map', 5);

}