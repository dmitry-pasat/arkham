<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if(function_exists('vc_set_as_theme')) {
    vc_set_as_theme(true);
}

/**
 * Change path for overridden templates
 */
if(function_exists('vc_set_shortcodes_templates_dir')) {
    $dir = MIKADO_ROOT_DIR.'/vc-templates';
    vc_set_shortcodes_templates_dir($dir);
}

if(!function_exists('hoshi_mikado_configure_visual_composer')) {
    /**
     * Configuration for Visual Composer
     * Hooks on vc_after_init action
     */
    function hoshi_mikado_configure_visual_composer() {

        /**
         * Removing shortcodes
         */
        vc_remove_element('vc_wp_search');
        vc_remove_element('vc_wp_meta');
        vc_remove_element('vc_wp_recentcomments');
        vc_remove_element('vc_wp_calendar');
        vc_remove_element('vc_wp_pages');
        vc_remove_element('vc_wp_tagcloud');
        vc_remove_element('vc_wp_custommenu');
        vc_remove_element('vc_wp_text');
        vc_remove_element('vc_wp_posts');
        vc_remove_element('vc_wp_links');
        vc_remove_element('vc_wp_categories');
        vc_remove_element('vc_wp_archives');
        vc_remove_element('vc_wp_rss');
        vc_remove_element('vc_teaser_grid');
        vc_remove_element('vc_button');
        vc_remove_element('vc_cta_button');
        vc_remove_element('vc_cta_button2');
        vc_remove_element('vc_message');
        vc_remove_element('vc_tour');
        vc_remove_element('vc_progress_bar');
        vc_remove_element('vc_pie');
        vc_remove_element('vc_posts_slider');
        vc_remove_element('vc_toggle');
        vc_remove_element('vc_images_carousel');
        vc_remove_element('vc_posts_grid');
        vc_remove_element('vc_carousel');
        vc_remove_element('vc_gmaps');
        vc_remove_element('vc_btn');
        vc_remove_element('vc_cta');
        vc_remove_element('vc_round_chart');
        vc_remove_element('vc_line_chart');
        vc_remove_element('vc_tta_accordion');
        vc_remove_element('vc_tta_tour');
        vc_remove_element('vc_tta_tabs');
        vc_remove_element('vc_separator');
        vc_remove_element("vc_section");

        /**
         * Remove unused parameters
         */
        if(function_exists('vc_remove_param')) {
            vc_remove_param('vc_row', 'full_width');
            vc_remove_param('vc_row', 'full_height');
            vc_remove_param('vc_row', 'content_placement');
            vc_remove_param('vc_row', 'video_bg');
            vc_remove_param('vc_row', 'video_bg_url');
            vc_remove_param('vc_row', 'video_bg_parallax');
            vc_remove_param('vc_row', 'parallax');
            vc_remove_param('vc_row', 'parallax_image');
            vc_remove_param('vc_row', 'gap');
            vc_remove_param('vc_row', 'columns_placement');
            vc_remove_param('vc_row', 'equal_height');
            vc_remove_param('vc_row', 'parallax_speed_bg');
            vc_remove_param('vc_row', 'parallax_speed_video');
            vc_remove_param('vc_row', 'disable_element');
            vc_remove_param('vc_row', 'css_animation');

            vc_remove_param('vc_row_inner', 'content_placement');
            vc_remove_param('vc_row_inner', 'equal_height');
            vc_remove_param('vc_row_inner', 'gap');
            vc_remove_param('vc_row_inner', 'disable_element');
        }

    }

    add_action('vc_after_init', 'hoshi_mikado_configure_visual_composer');

}


if(!function_exists('hoshi_mikado_configure_visual_composer_grid_elemets')) {

    /**
     * Configuration for Visual Composer for Grid Elements
     * Hooks on vc_after_init action
     */

    function hoshi_mikado_configure_visual_composer_grid_elemets() {

        /**
         * Remove Grid Elements if grid elements disabled
         */
        vc_remove_element('vc_basic_grid');
        vc_remove_element('vc_media_grid');
        vc_remove_element('vc_masonry_grid');
        vc_remove_element('vc_masonry_media_grid');
        vc_remove_element('vc_icon');
        vc_remove_element('vc_button2');
        vc_remove_element("vc_custom_heading");


        /**
         * Remove unused parameters from grid elements
         */
        if(function_exists('vc_remove_param')) {
            vc_remove_param('vc_basic_grid', 'button_style');
            vc_remove_param('vc_basic_grid', 'button_color');
            vc_remove_param('vc_basic_grid', 'button_size');
            vc_remove_param('vc_basic_grid', 'filter_color');
            vc_remove_param('vc_basic_grid', 'filter_style');
            vc_remove_param('vc_media_grid', 'button_style');
            vc_remove_param('vc_media_grid', 'button_color');
            vc_remove_param('vc_media_grid', 'button_size');
            vc_remove_param('vc_media_grid', 'filter_color');
            vc_remove_param('vc_media_grid', 'filter_style');
            vc_remove_param('vc_masonry_grid', 'button_style');
            vc_remove_param('vc_masonry_grid', 'button_color');
            vc_remove_param('vc_masonry_grid', 'button_size');
            vc_remove_param('vc_masonry_grid', 'filter_color');
            vc_remove_param('vc_masonry_grid', 'filter_style');
            vc_remove_param('vc_masonry_media_grid', 'button_style');
            vc_remove_param('vc_masonry_media_grid', 'button_color');
            vc_remove_param('vc_masonry_media_grid', 'button_size');
            vc_remove_param('vc_masonry_media_grid', 'filter_color');
            vc_remove_param('vc_masonry_media_grid', 'filter_style');
            vc_remove_param('vc_basic_grid', 'paging_color');
            vc_remove_param('vc_basic_grid', 'arrows_color');
            vc_remove_param('vc_media_grid', 'paging_color');
            vc_remove_param('vc_media_grid', 'arrows_color');
            vc_remove_param('vc_masonry_grid', 'paging_color');
            vc_remove_param('vc_masonry_grid', 'arrows_color');
            vc_remove_param('vc_masonry_media_grid', 'paging_color');
            vc_remove_param('vc_masonry_media_grid', 'arrows_color');
        }
    }

    add_action('vc_after_init', 'hoshi_mikado_configure_visual_composer_grid_elemets');
}


if(!function_exists('hoshi_mikado_configure_visual_composer_frontend_editor')) {
    /**
     * Configuration for Visual Composer FrontEnd Editor
     * Hooks on vc_after_init action
     */
    function hoshi_mikado_configure_visual_composer_frontend_editor() {

        /**
         * Remove frontend editor
         */
        if(function_exists('vc_disable_frontend')) {
            vc_disable_frontend();
        }

    }

    add_action('vc_after_init', 'hoshi_mikado_configure_visual_composer_frontend_editor');
}


if(class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Mkd_Elements_Holder extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Elements_Holder_Item extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Tabs extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Tab extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Accordion extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Accordion_Tab extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Pricing_Tables extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Animations_Holder extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Process_Holder extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Team_Slider extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Workflow extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Zooming_Slider extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Vertical_Split_Slider extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Vertical_Split_Slider_Left_Panel extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Vertical_Split_Slider_Right_Panel extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Vertical_Split_Slider_Content_Item extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Box_Holder extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Mkd_Cards_Slider extends WPBakeryShortCodesContainer {
    }

}

if(class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_Mkd_Pricing_Table extends WPBakeryShortCode {
    }
}

/*** Row ***/
if(!function_exists('hoshi_mikado_vc_row_map')) {
    /**
     * Map VC Row shortcode
     * Hooks on vc_after_init action
     */
    function hoshi_mikado_vc_row_map() {

        $animations = array(
            esc_html__('No animation', 'hoshi')                    => '',
            esc_html__('Elements Shows From Left Side', 'hoshi')   => 'mkd-element-from-left',
            esc_html__('Elements Shows From Right Side', 'hoshi')  => 'mkd-element-from-right',
            esc_html__('Elements Shows From Top Side', 'hoshi')    => 'mkd-element-from-top',
            esc_html__('Elements Shows From Bottom Side', 'hoshi') => 'mkd-element-from-bottom',
            esc_html__('Elements Shows From Fade', 'hoshi')        => 'mkd-element-from-fade'
        );

        vc_add_param('vc_row', array(
            'type'       => 'dropdown',
            'class'      => '',
            'heading'    => esc_html__('Row Type', 'hoshi'),
            'param_name' => 'row_type',
            'value'      => array(
                esc_html__('Row', 'hoshi')           => 'row',
                esc_html__('Parallax', 'hoshi')      => 'parallax',
                esc_html__('Intro Section', 'hoshi') => 'intro_section'
            )
        ));

        vc_add_param('vc_row', array(
            'type'       => 'dropdown',
            'class'      => '',
            'heading'    => esc_html__('Content Width', 'hoshi'),
            'param_name' => 'content_width',
            'value'      => array(
                esc_html__('Full Width', 'hoshi') => 'full-width',
                esc_html__('In Grid', 'hoshi')    => 'grid'
            )
        ));

        vc_add_param('vc_row', array(
            'type'       => 'dropdown',
            'class'      => '',
            'heading'    => esc_html__('Header Style', 'hoshi'),
            'param_name' => 'header_style',
            'value'      => array(
                esc_html__('Default', 'hoshi') => '',
                esc_html__('Light', 'hoshi')   => 'mkd-light-header',
                esc_html__('Dark', 'hoshi')    => 'mkd-dark-header'
            ),
            'dependency' => Array('element' => 'row_type', 'value' => array('row', 'parallax', 'intro_section'))
        ));
        vc_add_param('vc_row', array(
            'type'        => 'textfield',
            'class'       => '',
            'heading'     => esc_html__('Anchor ID', 'hoshi'),
            'param_name'  => 'anchor',
            'value'       => '',
            'description' => esc_html__('For example "home"', 'hoshi')
        ));
        vc_add_param('vc_row', array(
            'type'       => 'dropdown',
            'class'      => '',
            'heading'    => esc_html__('Content Aligment', 'hoshi'),
            'param_name' => 'content_aligment',
            'value'      => array(
                esc_html__('Left', 'hoshi')   => 'left',
                esc_html__('Center', 'hoshi') => 'center',
                esc_html__('Right', 'hoshi')  => 'right'
            )
        ));

        vc_add_param('vc_row', array(
            'type'       => 'dropdown',
            'class'      => '',
            'heading'    => esc_html__('Background Gradient Overlay', 'hoshi'),
            'param_name' => 'gradient_overlay',
            'value'      => array_flip(hoshi_mikado_get_gradient_diagonal_styles('', true, true)),
            'dependency' => Array('element' => 'animated_gradient_overlay', 'value' => array('no'))
        ));

        vc_add_param('vc_row', array(
            'type'       => 'colorpicker',
            'class'      => '',
            'heading'    => esc_html__('Custom Gradient Color Top', 'hoshi'),
            'param_name' => 'custom_gradient_gradient_overlay_color_top',
            'value'      => '',
            'dependency' => Array(
                'element' => 'gradient_overlay',
                'value'   => array('mkd-custom-gradient-top-to-bottom')
            )
        ));

        vc_add_param('vc_row', array(
            'type'       => 'colorpicker',
            'class'      => '',
            'heading'    => esc_html__('Custom Gradient Color Bottom', 'hoshi'),
            'param_name' => 'custom_gradient_gradient_overlay_color_bottom',
            'value'      => '',
            'dependency' => Array(
                'element' => 'gradient_overlay',
                'value'   => array('mkd-custom-gradient-top-to-bottom')
            )
        ));

        vc_add_param('vc_row', array(
            'type'        => 'dropdown',
            'class'       => '',
            'heading'     => esc_html__('Animated Gradient Overlay', 'hoshi'),
            'value'       => array(
                esc_html__('No', 'hoshi')  => 'no',
                esc_html__('Yes', 'hoshi') => 'yes'
            ),
            'param_name'  => 'animated_gradient_overlay',
            'description' => '',
            'dependency'  => Array('element' => 'row_type', 'value' => array('row', 'parallax'))
        ));

        vc_add_param('vc_row', array(
            'type'       => 'colorpicker',
            'class'      => '',
            'heading'    => esc_html__('Color 1 (def. #e14b4f)', 'hoshi'),
            'param_name' => 'animated_gradient_overlay_color1',
            'value'      => '#e14b4f',
            'dependency' => Array('element' => 'animated_gradient_overlay', 'value' => array('yes'))
        ));

        vc_add_param('vc_row', array(
            'type'       => 'colorpicker',
            'class'      => '',
            'heading'    => esc_html__('Color 2 (def. #58b0e3)', 'hoshi'),
            'param_name' => 'animated_gradient_overlay_color2',
            'value'      => '#58b0e3',
            'dependency' => Array('element' => 'animated_gradient_overlay', 'value' => array('yes'))
        ));

        vc_add_param('vc_row', array(
            'type'       => 'colorpicker',
            'class'      => '',
            'heading'    => esc_html__('Color 3 (def. #48316b)', 'hoshi'),
            'param_name' => 'animated_gradient_overlay_color3',
            'value'      => '#48316b',
            'dependency' => Array('element' => 'animated_gradient_overlay', 'value' => array('yes'))
        ));

        vc_add_param('vc_row', array(
            'type'       => 'colorpicker',
            'class'      => '',
            'heading'    => esc_html__('Color 4 (def. #913156)', 'hoshi'),
            'param_name' => 'animated_gradient_overlay_color4',
            'value'      => '#913156',
            'dependency' => Array('element' => 'animated_gradient_overlay', 'value' => array('yes'))
        ));

        vc_add_param('vc_row', array(
            'type'        => 'dropdown',
            'class'       => '',
            'heading'     => esc_html__('Video Background', 'hoshi'),
            'value'       => array(
                esc_html__('No', 'hoshi')  => '',
                esc_html__('Yes', 'hoshi') => 'show_video'
            ),
            'param_name'  => 'video',
            'description' => '',
            'dependency'  => Array('element' => 'row_type', 'value' => array('row'))
        ));

        vc_add_param('vc_row', array(
            'type'        => 'dropdown',
            'class'       => '',
            'heading'     => esc_html__('Video Overlay', 'hoshi'),
            'value'       => array(
                esc_html__('No', 'hoshi')  => '',
                esc_html__('Yes', 'hoshi') => 'show_video_overlay'
            ),
            'param_name'  => 'video_overlay',
            'description' => '',
            'dependency'  => Array('element' => 'video', 'value' => array('show_video'))
        ));

        vc_add_param('vc_row', array(
            'type'        => 'attach_image',
            'class'       => '',
            'heading'     => esc_html__('Video Overlay Image (pattern)', 'hoshi'),
            'value'       => '',
            'param_name'  => 'video_overlay_image',
            'description' => '',
            'dependency'  => Array('element' => 'video_overlay', 'value' => array('show_video_overlay'))
        ));

        vc_add_param('vc_row', array(
            'type'        => 'textfield',
            'class'       => '',
            'heading'     => esc_html__('Video Background (webm) File URL', 'hoshi'),
            'value'       => '',
            'param_name'  => 'video_webm',
            'description' => '',
            'dependency'  => Array('element' => 'video', 'value' => array('show_video'))
        ));

        vc_add_param('vc_row', array(
            'type'        => 'textfield',
            'class'       => '',
            'heading'     => esc_html__('Video Background (mp4) file URL', 'hoshi'),
            'value'       => '',
            'param_name'  => 'video_mp4',
            'description' => '',
            'dependency'  => Array('element' => 'video', 'value' => array('show_video'))
        ));

        vc_add_param('vc_row', array(
            'type'        => 'textfield',
            'class'       => '',
            'heading'     => esc_html__('Video Background (ogv) file URL', 'hoshi'),
            'value'       => '',
            'param_name'  => 'video_ogv',
            'description' => '',
            'dependency'  => Array('element' => 'video', 'value' => array('show_video'))
        ));

        vc_add_param('vc_row', array(
            'type'        => 'attach_image',
            'class'       => '',
            'heading'     => esc_html__('Video Preview Image', 'hoshi'),
            'value'       => '',
            'param_name'  => 'video_image',
            'description' => '',
            'dependency'  => Array('element' => 'video', 'value' => array('show_video'))
        ));

        vc_add_param("vc_row", array(
            'type'        => 'dropdown',
            'class'       => '',
            'heading'     => esc_html__('Full Screen Height', 'hoshi'),
            'param_name'  => 'full_screen_section_height',
            'value'       => array(
                esc_html__('No', 'hoshi')  => 'no',
                esc_html__('Yes', 'hoshi') => 'yes'
            ),
            'save_always' => true,
            'dependency'  => Array('element' => 'row_type', 'value' => array('parallax'))
        ));

        vc_add_param('vc_row', array(
            'type'       => 'dropdown',
            'class'      => '',
            'heading'    => esc_html__('Vertically Align Content In Middle', 'hoshi'),
            'param_name' => 'vertically_align_content_in_middle',
            'value'      => array(
                esc_html__('No', 'hoshi')  => 'no',
                esc_html__('Yes', 'hoshi') => 'yes'
            ),
            'dependency' => array('element' => 'full_screen_section_height', 'value' => 'yes')
        ));

        vc_add_param('vc_row', array(
            'type'       => 'textfield',
            'class'      => '',
            'heading'    => esc_html__('Section Height', 'hoshi'),
            'param_name' => 'section_height',
            'value'      => '',
            'dependency' => Array('element' => 'full_screen_section_height', 'value' => array('no'))
        ));

        vc_add_param('vc_row', array(
            'type'        => 'attach_image',
            'class'       => '',
            'heading'     => esc_html__('Parallax Background image', 'hoshi'),
            'value'       => '',
            'param_name'  => 'parallax_background_image',
            'description' => esc_html__('Please note that for parallax row type, background image from Design Options will not work so you should to fill this field', 'hoshi'),
            'dependency'  => Array('element' => 'row_type', 'value' => array('parallax'))
        ));

        vc_add_param('vc_row', array(
            'type'        => 'attach_image',
            'class'       => '',
            'heading'     => esc_html__('Inrto Section Background image', 'hoshi'),
            'value'       => '',
            'param_name'  => 'intro_section_background_image',
            'description' => esc_html__('Please note that for intro section row type, background image from Design Options will not work so you should to fill this field', 'hoshi'),
            'dependency'  => Array('element' => 'row_type', 'value' => array('intro_section'))
        ));

        vc_add_param('vc_row', array(
            'type'       => 'textfield',
            'class'      => '',
            'heading'    => esc_html__('Parallax speed', 'hoshi'),
            'param_name' => 'parallax_speed',
            'value'      => '',
            'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
        ));


        vc_add_param('vc_row', array(
            'type'        => 'dropdown',
            'heading'     => esc_html__('CSS Animation', 'hoshi'),
            'param_name'  => 'css_animation',
            'value'       => $animations,
            'description' => '',
            'dependency'  => Array('element' => 'row_type', 'value' => array('row'))
        ));

        vc_add_param('vc_row', array(
            'type'        => 'textfield',
            'heading'     => esc_html__('Transition delay (ms)', 'hoshi'),
            'param_name'  => 'transition_delay',
            'admin_label' => true,
            'value'       => '',
            'description' => '',
            'dependency'  => array('element' => 'css_animation', 'not_empty' => true)

        ));


        /*** Row Inner ***/

        vc_add_param('vc_row_inner', array(
            'type'       => 'dropdown',
            'class'      => '',
            'heading'    => esc_html__('Row Type', 'hoshi'),
            'param_name' => 'row_type',
            'value'      => array(
                esc_html__('Row', 'hoshi')      => 'row',
                esc_html__('Parallax', 'hoshi') => 'parallax'
            )
        ));

        vc_add_param('vc_row_inner', array(
            'type'       => 'dropdown',
            'class'      => '',
            'heading'    => esc_html__('Content Width', 'hoshi'),
            'param_name' => 'content_width',
            'value'      => array(
                esc_html__('Full Width', 'hoshi') => 'full-width',
                esc_html__('In Grid', 'hoshi')    => 'grid'
            )
        ));

        vc_add_param("vc_row_inner", array(
            'type'        => 'dropdown',
            'class'       => '',
            'heading'     => esc_html__('Full Screen Height', 'hoshi'),
            'param_name'  => 'full_screen_section_height',
            'value'       => array(
                esc_html__('No', 'hoshi')  => 'no',
                esc_html__('Yes', 'hoshi') => 'yes'
            ),
            'save_always' => true,
            'dependency'  => Array('element' => 'row_type', 'value' => array('parallax'))
        ));

        vc_add_param('vc_row_inner', array(
            'type'       => 'dropdown',
            'class'      => '',
            'heading'    => esc_html__('Vertically Align Content In Middle', 'hoshi'),
            'param_name' => 'vertically_align_content_in_middle',
            'value'      => array(
                esc_html__('No', 'hoshi')  => 'no',
                esc_html__('Yes', 'hoshi') => 'yes'
            ),
            'dependency' => array('element' => 'full_screen_section_height', 'value' => 'yes')
        ));

        vc_add_param('vc_row_inner', array(
            'type'       => 'textfield',
            'class'      => '',
            'heading'    => esc_html__('Section Height', 'hoshi'),
            'param_name' => 'section_height',
            'value'      => '',
            'dependency' => Array('element' => 'full_screen_section_height', 'value' => array('no'))
        ));

        vc_add_param('vc_row_inner', array(
            'type'        => 'attach_image',
            'class'       => '',
            'heading'     => esc_html__('Parallax Background image', 'hoshi'),
            'value'       => '',
            'param_name'  => 'parallax_background_image',
            'description' => esc_html__('Please note that for parallax row type, background image from Design Options will not work so you should to fill this field', 'hoshi'),
            'dependency'  => Array('element' => 'row_type', 'value' => array('parallax'))
        ));

        vc_add_param('vc_row_inner', array(
            'type'        => 'attach_image',
            'class'       => '',
            'heading'     => esc_html__('Inrto Section Background image', 'hoshi'),
            'value'       => '',
            'param_name'  => 'intro_section_background_image',
            'description' => esc_html__('Please note that for intro section row type, background image from Design Options will not work so you should to fill this field', 'hoshi'),
            'dependency'  => Array('element' => 'row_type', 'value' => array('intro_section'))
        ));

        vc_add_param('vc_row_inner', array(
            'type'       => 'textfield',
            'class'      => '',
            'heading'    => esc_html__('Parallax speed', 'hoshi'),
            'param_name' => 'parallax_speed',
            'value'      => '',
            'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
        ));
        vc_add_param('vc_row_inner', array(
            'type'       => 'dropdown',
            'class'      => '',
            'heading'    => esc_html__('Content Aligment', 'hoshi'),
            'param_name' => 'content_aligment',
            'value'      => array(
                esc_html__('Left', 'hoshi')   => 'left',
                esc_html__('Center', 'hoshi') => 'center',
                esc_html__('Right', 'hoshi')  => 'right'
            )
        ));

        vc_add_param('vc_row_inner', array(
            'type'        => 'dropdown',
            'heading'     => esc_html__('CSS Animation', 'hoshi'),
            'param_name'  => 'css_animation',
            'admin_label' => true,
            'value'       => $animations,
            'description' => '',
            'dependency'  => Array('element' => 'row_type', 'value' => array('row'))

        ));

        vc_add_param('vc_row_inner', array(
            'type'        => 'textfield',
            'heading'     => esc_html__('Transition delay (ms)', 'hoshi'),
            'param_name'  => 'transition_delay',
            'admin_label' => true,
            'value'       => '',
            'description' => '',
            'dependency'  => Array('element' => 'row_type', 'value' => array('row'))

        ));
    }

    add_action('vc_after_init', 'hoshi_mikado_vc_row_map');
}
