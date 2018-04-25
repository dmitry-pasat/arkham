<?php

if(!function_exists('hoshi_mikado_register_footer_sidebar')) {

    function hoshi_mikado_register_footer_sidebar() {

        register_sidebar(array(
            'name'          => esc_html__('Footer Column 1', 'hoshi'),
            'id'            => 'footer_column_1',
            'description'   => esc_html__('Footer Column 1', 'hoshi'),
            'before_widget' => '<div id="%1$s" class="widget mkd-footer-column-1 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="mkd-footer-widget-title">',
            'after_title'   => '</h4>'
        ));

        register_sidebar(array(
            'name'          => esc_html__('Footer Column 2', 'hoshi'),
            'id'            => 'footer_column_2',
            'description'   => esc_html__('Footer Column 2', 'hoshi'),
            'before_widget' => '<div id="%1$s" class="widget mkd-footer-column-2 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="mkd-footer-widget-title">',
            'after_title'   => '</h4>'
        ));

        register_sidebar(array(
            'name'          => esc_html__('Footer Column 3', 'hoshi'),
            'id'            => 'footer_column_3',
            'description'   => esc_html__('Footer Column 3', 'hoshi'),
            'before_widget' => '<div id="%1$s" class="widget mkd-footer-column-3 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="mkd-footer-widget-title">',
            'after_title'   => '</h4>'
        ));

        register_sidebar(array(
            'name'          => esc_html__('Footer Column 4', 'hoshi'),
            'id'            => 'footer_column_4',
            'description'   => esc_html__('Footer Column 4', 'hoshi'),
            'before_widget' => '<div id="%1$s" class="widget mkd-footer-column-4 %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="mkd-footer-widget-title">',
            'after_title'   => '</h4>'
        ));

        register_sidebar(array(
            'name'          => esc_html__('Footer Bottom', 'hoshi'),
            'id'            => 'footer_text',
            'description'   => esc_html__('Footer Bottom', 'hoshi'),
            'before_widget' => '<div id="%1$s" class="widget mkd-footer-text %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="mkd-footer-widget-title">',
            'after_title'   => '</h4>'
        ));

        register_sidebar(array(
            'name'          => esc_html__('Footer Bottom Left', 'hoshi'),
            'id'            => 'footer_bottom_left',
            'description'   => esc_html__('Footer Bottom Left', 'hoshi'),
            'before_widget' => '<div id="%1$s" class="widget mkd-footer-bottom-left %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="mkd-footer-widget-title">',
            'after_title'   => '</h4>'
        ));

        register_sidebar(array(
            'name'          => esc_html__('Footer Bottom Right', 'hoshi'),
            'id'            => 'footer_bottom_right',
            'description'   => esc_html__('Footer Bottom Right', 'hoshi'),
            'before_widget' => '<div id="%1$s" class="widget mkd-footer-bottom-right %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="mkd-footer-widget-title">',
            'after_title'   => '</h4>'
        ));

    }

    add_action('widgets_init', 'hoshi_mikado_register_footer_sidebar');

}

if(!function_exists('hoshi_mikado_get_footer')) {
    /**
     * Loads footer HTML
     */
    function hoshi_mikado_get_footer() {

        $parameters                          = array();
        $id                                  = hoshi_mikado_get_page_id();
        $parameters['footer_classes']        = hoshi_mikado_get_footer_classes($id);
        $parameters['display_footer_top']    = hoshi_mikado_show_footer_top();
        $parameters['display_footer_bottom'] = hoshi_mikado_show_footer_bottom();

        hoshi_mikado_get_module_template_part('templates/footer', 'footer', '', $parameters);

    }

}


if(!function_exists('hoshi_mikado_show_footer_top')){
    /**
     * Check footer top showing
     * Function check value from options and checks if footer columns are empty.
     * return bool
     */
    function hoshi_mikado_show_footer_top(){
        $footer_top_flag = false;

        //check value from options and meta field on current page
        $option_flag = (hoshi_mikado_get_meta_field_intersect('show_footer_top') === 'yes') ? true : false;

        //check footer columns.If they are empty, disable footer top
        $columns_flag = false;
        for($i = 1; $i <= 4; $i++){
            $footer_columns_id = 'footer_column_'.$i;
            if(is_active_sidebar($footer_columns_id)) {
                $columns_flag = true;
                break;
            }
        }

        if($option_flag && $columns_flag){
            $footer_top_flag = true;
        }

        return $footer_top_flag;
    }
}

if(!function_exists('hoshi_mikado_show_footer_bottom')){
    /**
     * Check footer bottom showing
     * Function check value from options and checks if footer columns are empty.
     * return bool
     */
    function hoshi_mikado_show_footer_bottom(){
        $footer_bottom_flag = false;

        //check value from options and meta field on current page
        $option_flag = (hoshi_mikado_get_meta_field_intersect('show_footer_bottom') === 'yes') ? true : false;

        //check footer columns.If they are empty, disable footer bottom
        $columns_flag = false;
        if(is_active_sidebar('footer_text') || is_active_sidebar('footer_bottom_left') || is_active_sidebar('footer_bottom_right')) {
            $columns_flag = true;
        }

        if($option_flag && $columns_flag){
            $footer_bottom_flag = true;
        }

        return $footer_bottom_flag;
    }
}

if(!function_exists('hoshi_mikado_get_content_bottom_area')) {
    /**
     * Loads content bottom area HTML with all needed parameters
     */
    function hoshi_mikado_get_content_bottom_area() {

        $parameters = array();

        //Current page id
        $id = hoshi_mikado_get_page_id();

        //is content bottom area enabled for current page?
        $parameters['content_bottom_area'] = hoshi_mikado_get_meta_field_intersect('enable_content_bottom_area');
        if($parameters['content_bottom_area'] == 'yes') {
            //Sidebar for content bottom area
            $parameters['content_bottom_area_sidebar'] = hoshi_mikado_get_meta_field_intersect('content_bottom_sidebar_custom_display');
            //Content bottom area in grid
            $parameters['content_bottom_area_in_grid'] = hoshi_mikado_get_meta_field_intersect('content_bottom_in_grid');
            //Content bottom area background color
            $parameters['content_bottom_background_color'] = 'background-color: '.hoshi_mikado_get_meta_field_intersect('content_bottom_background_color');
        }

        hoshi_mikado_get_module_template_part('templates/parts/content-bottom-area', 'footer', '', $parameters);

    }

}

if(!function_exists('hoshi_mikado_get_footer_top')) {
    /**
     * Return footer top HTML
     */
    function hoshi_mikado_get_footer_top() {

        $parameters = array();

        $parameters['footer_top_border']         = hoshi_mikado_get_footer_top_border();
        $parameters['footer_top_border_in_grid'] = (hoshi_mikado_options()->getOptionValue('footer_top_border_in_grid') == 'yes') ? 'mkd-in-grid' : '';
        $parameters['footer_in_grid']            = (hoshi_mikado_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
        $parameters['footer_top_classes']        = hoshi_mikado_footer_top_classes();
        $parameters['footer_top_columns']        = hoshi_mikado_options()->getOptionValue('footer_top_columns');

        hoshi_mikado_get_module_template_part('templates/parts/footer-top', 'footer', '', $parameters);

    }

}

if(!function_exists('hoshi_mikado_get_footer_bottom')) {
    /**
     * Return footer bottom HTML
     */
    function hoshi_mikado_get_footer_bottom() {

        $parameters = array();

        $parameters['footer_bottom_border']         = hoshi_mikado_get_footer_bottom_border();
        $parameters['footer_bottom_border_in_grid'] = (hoshi_mikado_options()->getOptionValue('footer_bottom_border_in_grid') == 'yes') ? 'mkd-in-grid' : '';
        $parameters['footer_in_grid']               = (hoshi_mikado_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
        $parameters['footer_bottom_columns']        = hoshi_mikado_options()->getOptionValue('footer_bottom_columns');
        $parameters['footer_bottom_border_bottom']  = hoshi_mikado_get_footer_bottom_bottom_border();

        hoshi_mikado_get_module_template_part('templates/parts/footer-bottom', 'footer', '', $parameters);

    }

}

//Functions for loading sidebars

if(!function_exists('hoshi_mikado_get_footer_sidebar_25_25_50')) {

    function hoshi_mikado_get_footer_sidebar_25_25_50() {
        hoshi_mikado_get_module_template_part('templates/sidebars/sidebar-three-columns-25-25-50', 'footer');
    }

}

if(!function_exists('hoshi_mikado_get_footer_sidebar_50_25_25')) {

    function hoshi_mikado_get_footer_sidebar_50_25_25() {
        hoshi_mikado_get_module_template_part('templates/sidebars/sidebar-three-columns-50-25-25', 'footer');
    }

}

if(!function_exists('hoshi_mikado_get_footer_sidebar_four_columns')) {

    function hoshi_mikado_get_footer_sidebar_four_columns() {
        hoshi_mikado_get_module_template_part('templates/sidebars/sidebar-four-columns', 'footer');
    }

}

if(!function_exists('hoshi_mikado_get_footer_sidebar_three_columns')) {

    function hoshi_mikado_get_footer_sidebar_three_columns() {
        hoshi_mikado_get_module_template_part('templates/sidebars/sidebar-three-columns', 'footer');
    }

}

if(!function_exists('hoshi_mikado_get_footer_sidebar_two_columns')) {

    function hoshi_mikado_get_footer_sidebar_two_columns() {
        hoshi_mikado_get_module_template_part('templates/sidebars/sidebar-two-columns', 'footer');
    }

}

if(!function_exists('hoshi_mikado_get_footer_sidebar_one_column')) {

    function hoshi_mikado_get_footer_sidebar_one_column() {
        hoshi_mikado_get_module_template_part('templates/sidebars/sidebar-one-column', 'footer');
    }

}

if(!function_exists('hoshi_mikado_get_footer_bottom_sidebar_three_columns')) {

    function hoshi_mikado_get_footer_bottom_sidebar_three_columns() {
        hoshi_mikado_get_module_template_part('templates/sidebars/sidebar-bottom-three-columns', 'footer');
    }

}

if(!function_exists('hoshi_mikado_get_footer_bottom_sidebar_two_columns')) {

    function hoshi_mikado_get_footer_bottom_sidebar_two_columns() {
        hoshi_mikado_get_module_template_part('templates/sidebars/sidebar-bottom-two-columns', 'footer');
    }

}

if(!function_exists('hoshi_mikado_get_footer_bottom_sidebar_one_column')) {

    function hoshi_mikado_get_footer_bottom_sidebar_one_column() {
        hoshi_mikado_get_module_template_part('templates/sidebars/sidebar-bottom-one-column', 'footer');
    }

}

