<?php

if(!function_exists('hoshi_mikado_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function hoshi_mikado_register_sidebars() {

        register_sidebar(array(
            'name'          => esc_html__('Sidebar', 'hoshi'),
            'id'            => 'sidebar',
            'description'   => esc_html__('Default Sidebar', 'hoshi'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4><span class="mkd-sidearea-title">',
            'after_title'   => '</span></h4>'
        ));

    }

    add_action('widgets_init', 'hoshi_mikado_register_sidebars');
}

if(!function_exists('hoshi_mikado_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates HoshiMikadoSidebar object
     */
    function hoshi_mikado_add_support_custom_sidebar() {
        add_theme_support('HoshiMikadoSidebar');
        if(get_theme_support('HoshiMikadoSidebar')) {
            new HoshiMikadoSidebar();
        }
    }

    add_action('after_setup_theme', 'hoshi_mikado_add_support_custom_sidebar');
}
