<?php

if(!function_exists('hoshi_mikado_search_body_class')) {
    /**
     * Function that adds body classes for different search types
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function hoshi_mikado_search_body_class($classes) {

        if(is_active_widget(false, false, 'mkd_search_opener')) {

            $classes[] = 'mkd-'.hoshi_mikado_options()->getOptionValue('search_type');

            if(hoshi_mikado_options()->getOptionValue('search_type') == 'fullscreen-search') {

                $is_fullscreen_bg_image_set = hoshi_mikado_options()->getOptionValue('fullscreen_search_background_image') !== '';

                if($is_fullscreen_bg_image_set) {
                    $classes[] = 'mkd-fullscreen-search-with-bg-image';
                }

                $classes[] = 'mkd-search-fade';

            }

        }

        return $classes;

    }

    add_filter('body_class', 'hoshi_mikado_search_body_class');
}

if(!function_exists('hoshi_mikado_get_search')) {
    /**
     * Loads search HTML based on search type option.
     */
    function hoshi_mikado_get_search() {

        if(hoshi_mikado_active_widget(false, false, 'mkd_search_opener')) {

            $search_type = hoshi_mikado_options()->getOptionValue('search_type');

            if($search_type == 'search-covers-header') {
                hoshi_mikado_set_position_for_covering_search();

                return;
            } else if($search_type == 'search-slides-from-window-top') {
                hoshi_mikado_set_search_position_in_menu($search_type);
                if(hoshi_mikado_is_responsive_on()) {
                    hoshi_mikado_set_search_position_mobile();
                }

                return;
            } elseif($search_type === 'search-dropdown') {
                hoshi_mikado_set_dropdown_search_position();

                return;
            }

            hoshi_mikado_load_search_template();

        }
    }

}

if(!function_exists('hoshi_mikado_set_position_for_covering_search')) {
    /**
     * Finds part of header where search template will be loaded
     */
    function hoshi_mikado_set_position_for_covering_search() {

        $containing_sidebar = hoshi_mikado_active_widget(false, false, 'mkd_search_opener');

        foreach($containing_sidebar as $sidebar) {

            if(strpos($sidebar, 'top-bar') !== false) {
                add_action('hoshi_mikado_after_header_top_html_open', 'hoshi_mikado_load_search_template');
            } else if(strpos($sidebar, 'main-menu') !== false) {
                add_action('hoshi_mikado_after_header_menu_area_html_open', 'hoshi_mikado_load_search_template');
            } else if(strpos($sidebar, 'mobile-logo') !== false) {
                add_action('hoshi_mikado_after_mobile_header_html_open', 'hoshi_mikado_load_search_template');
            } else if(strpos($sidebar, 'logo') !== false) {
                add_action('hoshi_mikado_after_header_logo_area_html_open', 'hoshi_mikado_load_search_template');
            } else if(strpos($sidebar, 'sticky') !== false) {
                add_action('hoshi_mikado_after_sticky_menu_html_open', 'hoshi_mikado_load_search_template');
            }

        }

    }

}

if(!function_exists('hoshi_mikado_set_search_position_in_menu')) {
    /**
     * Finds part of header where search template will be loaded
     */
    function hoshi_mikado_set_search_position_in_menu($type) {

        add_action('hoshi_mikado_after_header_menu_area_html_open', 'hoshi_mikado_load_search_template');

    }
}

if(!function_exists('hoshi_mikado_set_search_position_mobile')) {
    /**
     * Hooks search template to mobile header
     */
    function hoshi_mikado_set_search_position_mobile() {

        add_action('hoshi_mikado_after_mobile_header_html_open', 'hoshi_mikado_load_search_template');

    }

}

if(!function_exists('hoshi_mikado_load_search_template')) {
    /**
     * Loads HTML template with parameters
     */
    function hoshi_mikado_load_search_template() {
        global $hoshi_IconCollections;

        $search_type = hoshi_mikado_options()->getOptionValue('search_type');

        $search_icon       = '';
        $search_icon_close = '';
        if(hoshi_mikado_options()->getOptionValue('search_icon_pack') !== '') {
            $search_icon       = $hoshi_IconCollections->getSearchIcon(hoshi_mikado_options()->getOptionValue('search_icon_pack'), true);
            $search_icon_close = $hoshi_IconCollections->getSearchClose(hoshi_mikado_options()->getOptionValue('search_icon_pack'), true);
        }

        $parameters = array(
            'search_in_grid'    => hoshi_mikado_options()->getOptionValue('search_in_grid') == 'yes' ? true : false,
            'search_icon'       => $search_icon,
            'search_icon_close' => $search_icon_close
        );

        hoshi_mikado_get_module_template_part('templates/types/'.$search_type, 'search', '', $parameters);

    }

}

if(!function_exists('hoshi_mikado_set_dropdown_search_position')) {
    function hoshi_mikado_set_dropdown_search_position() {
        add_action('hoshi_mikado_after_search_opener', 'hoshi_mikado_load_search_template');
    }
}