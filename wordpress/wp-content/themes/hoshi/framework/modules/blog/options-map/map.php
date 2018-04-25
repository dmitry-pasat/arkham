<?php

if(!function_exists('hoshi_mikado_blog_options_map')) {

    function hoshi_mikado_blog_options_map() {

        hoshi_mikado_add_admin_page(
            array(
                'slug'  => '_blog_page',
                'title' => esc_html__('Blog','hoshi'),
                'icon'  => 'icon_book_alt'
            )
        );

        /**
         * Blog Lists
         */

        $custom_sidebars = hoshi_mikado_get_custom_sidebars();

        $panel_blog_lists = hoshi_mikado_add_admin_panel(
            array(
                'page'  => '_blog_page',
                'name'  => 'panel_blog_lists',
                'title' => esc_html__('Blog Lists', 'hoshi')
            )
        );

        hoshi_mikado_add_admin_field(array(
            'name'          => 'blog_list_type',
            'type'          => 'select',
            'label'         => esc_html__('Blog Layout for Archive Pages', 'hoshi'),
            'description'   => esc_html__('Choose a default blog layout', 'hoshi'),
            'default_value' => 'standard',
            'parent'        => $panel_blog_lists,
            'options'       => array(
                'standard'           => esc_html__(' Blog: Standard', 'hoshi'),
                'simple'             => esc_html__('Blog: Simple', 'hoshi'),
                'masonry'            => esc_html__('Blog: Masonry', 'hoshi'),
                'masonry-full-width' => esc_html__('Blog: Masonry Full Width', 'hoshi'),
                'masonry-no-image'   => esc_html__('Blog: Masonry No Image', 'hoshi'),
                'masonry-simple'     => esc_html__('Blog: Masonry Simple', 'hoshi'),
            )
        ));

        hoshi_mikado_add_admin_field(array(
            'name'        => 'archive_sidebar_layout',
            'type'        => 'select',
            'label'       => esc_html__('Archive and Category Sidebar', 'hoshi'),
            'description' => esc_html__('Choose a sidebar layout for archived Blog Post Lists and Category Blog Lists', 'hoshi'),
            'parent'      => $panel_blog_lists,
            'options'     => array(
                'default'          => esc_html__('No Sidebar', 'hoshi'),
                'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'hoshi'),
                'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'hoshi'),
                'sidebar-33-left'  => esc_html__('Sidebar 1/3 Left', 'hoshi'),
                'sidebar-25-left'  => esc_html__('Sidebar 1/4 Left', 'hoshi'),
            )
        ));


        if(count($custom_sidebars) > 0) {
            hoshi_mikado_add_admin_field(array(
                'name'        => 'blog_custom_sidebar',
                'type'        => 'selectblank',
                'label'       => esc_html__('Sidebar to Display', 'hoshi'),
                'description' => esc_html__('Choose a sidebar to display on Blog Post Lists and Category Blog Lists. Default sidebar is "Sidebar Page"', 'hoshi'),
                'parent'      => $panel_blog_lists,
                'options'     => hoshi_mikado_get_custom_sidebars()
            ));
        }

        hoshi_mikado_add_admin_field(array(
            'type'          => 'color',
            'name'          => 'blog_archive_background_color',
            'default_value' => '#fafafa',
            'label'         => esc_html__('Background color for Archive pages', 'hoshi'),
            'description'   => esc_html__('Choose background color for blog archive pages', 'hoshi'),
            'parent'        => $panel_blog_lists
        ));

        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'pagination',
                'default_value' => 'yes',
                'label'         => esc_html__('Pagination', 'hoshi'),
                'parent'        => $panel_blog_lists,
                'description'   => esc_html__('Enabling this option will display pagination links on bottom of Blog Post List', 'hoshi'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_mkd_pagination_container'
                )
            )
        );

        $pagination_container = hoshi_mikado_add_admin_container(
            array(
                'name'            => 'mkd_pagination_container',
                'hidden_property' => 'pagination',
                'hidden_value'    => 'no',
                'parent'          => $panel_blog_lists,
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $pagination_container,
                'type'          => 'text',
                'name'          => 'blog_page_range',
                'default_value' => '',
                'label'         => esc_html__('Pagination Range limit', 'hoshi'),
                'description'   => esc_html__('Enter a number that will limit pagination to a certain range of links', 'hoshi'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        hoshi_mikado_add_admin_field(array(
            'name'        => 'masonry_pagination',
            'type'        => 'select',
            'label'       => esc_html__('Pagination on Masonry', 'hoshi'),
            'description' => esc_html__('Choose a pagination style for Masonry Blog List', 'hoshi'),
            'parent'      => $pagination_container,
            'options'     => array(
                'no-pagination'   => esc_html__('No Pagination', 'hoshi'),
                'standard'        => esc_html__('Standard', 'hoshi'),
                'load-more'       => esc_html__('Load More', 'hoshi'),
                'infinite-scroll' => esc_html__('Infinite Scroll', 'hoshi')
            ),

        ));
        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'enable_load_more_pag',
                'default_value' => 'no',
                'label'         => esc_html__('Load More Pagination on Other Lists', 'hoshi'),
                'parent'        => $pagination_container,
                'description'   => esc_html__('Enable Load More Pagination on other lists', 'hoshi'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'masonry_filter',
                'default_value' => 'no',
                'label'         => esc_html__('Masonry Filter', 'hoshi'),
                'parent'        => $panel_blog_lists,
                'description'   => esc_html__('Enabling this option will display category filter on Masonry and Masonry Full Width Templates', 'hoshi'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_mkd_blog_filter_container'
                )
            )
        );

        $blog_filter_container = hoshi_mikado_add_admin_container(
            array(
                'name'            => 'mkd_blog_filter_container',
                'hidden_property' => 'masonry_filter',
                'hidden_value'    => 'no',
                'parent'          => $panel_blog_lists,
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $blog_filter_container,
                'type'          => 'text',
                'name'          => 'blog_filter_margin',
                'default_value' => '0',
                'label'         => esc_html__('Masonry filter margin', 'hoshi'),
                'description'   => esc_html__('Insert margin in format: 0px 0px 1px 0px', 'hoshi'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $blog_filter_container,
                'type'          => 'text',
                'name'          => 'blog_filter_padding',
                'default_value' => '0',
                'label'         => esc_html__('Masonry filter padding', 'hoshi'),
                'description'   => esc_html__('Insert padding in format: 0px 0px 1px 0px', 'hoshi'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        hoshi_mikado_add_admin_field(array(
            'name'          => 'blog_filter_position',
            'type'          => 'select',
            'label'         => esc_html__('Masonry filter position', 'hoshi'),
            'description'   => esc_html__('Default value is center', 'hoshi'),
            'parent'        => $blog_filter_container,
            'options'       => array(
                'center' => esc_html__('Center', 'hoshi'),
                'left'   => esc_html__('Left', 'hoshi'),
                'right'  => esc_html__('Right', 'hoshi'),
            ),
            'default_value' => 'center'
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'color',
            'name'          => 'blog_filter_text_color',
            'default_value' => '#ffffff',
            'label'         => esc_html__('Masonry filter text color', 'hoshi'),
            'description'   => esc_html__('Choose text color for masonry filter', 'hoshi'),
            'parent'        => $blog_filter_container
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'color',
            'name'          => 'blog_filter_background_color',
            'default_value' => '#d4145a',
            'label'         => esc_html__('Masonry filter background color', 'hoshi'),
            'description'   => esc_html__('Choose background color for masonry filter', 'hoshi'),
            'parent'        => $blog_filter_container
        ));

        hoshi_mikado_add_admin_field(
            array(
                'parent'        => $blog_filter_container,
                'type'          => 'text',
                'name'          => 'blog_filter_background_transparency',
                'default_value' => '1',
                'label'         => esc_html__('Masonry filter background transparency', 'hoshi'),
                'description'   => esc_html__('Choose a transparency for the masonry filter background color (0 = fully transparent, 1 = opaque)', 'hoshi'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'text',
                'name'          => 'number_of_chars',
                'default_value' => '',
                'label'         => esc_html__('Number of Words in Excerpt', 'hoshi'),
                'parent'        => $panel_blog_lists,
                'description'   => esc_html__('Enter a number of words in excerpt (article summary)', 'hoshi'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );
        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'text',
                'name'          => 'standard_number_of_chars',
                'default_value' => '45',
                'label'         => esc_html__('Standard Type Number of Words in Excerpt', 'hoshi'),
                'parent'        => $panel_blog_lists,
                'description'   => esc_html__('Enter a number of words in excerpt (article summary)', 'hoshi'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );
        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'text',
                'name'          => 'masonry_number_of_chars',
                'default_value' => '45',
                'label'         => esc_html__('Masonry Type Number of Words in Excerpt', 'hoshi'),
                'parent'        => $panel_blog_lists,
                'description'   => esc_html__('Enter a number of words in excerpt (article summary)', 'hoshi'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );
        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'text',
                'name'          => 'split_column_number_of_chars',
                'default_value' => '45',
                'label'         => esc_html__('Split Column Type Number of Words in Excerpt', 'hoshi'),
                'parent'        => $panel_blog_lists,
                'description'   => esc_html__('Enter a number of words in excerpt (article summary)', 'hoshi'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );
        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'blog_gradient_element_style',
                'default_value' => 'mkd-type1-gradient-diagonal',
                'label'         => esc_html__('Gradient Elements Style', 'hoshi'),
                'parent'        => $panel_blog_lists,
                'description'   => esc_html__('Choose style for gradient elements', 'hoshi'),
                'options'       => hoshi_mikado_get_gradient_diagonal_styles('', false)
            )
        );

        /**
         * Blog Single
         */
        $panel_blog_single = hoshi_mikado_add_admin_panel(
            array(
                'page'  => '_blog_page',
                'name'  => 'panel_blog_single',
                'title' => esc_html__('Blog Single', 'hoshi')
            )
        );

        hoshi_mikado_add_admin_field(array(
            'name'          => 'blog_single_sidebar_layout',
            'type'          => 'select',
            'label'         => esc_html__('Sidebar Layout', 'hoshi'),
            'description'   => esc_html__('Choose a sidebar layout for Blog Single pages', 'hoshi'),
            'parent'        => $panel_blog_single,
            'options'       => array(
                'default'          => esc_html__('No Sidebar', 'hoshi'),
                'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'hoshi'),
                'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'hoshi'),
                'sidebar-33-left'  => esc_html__('Sidebar 1/3 Left', 'hoshi'),
                'sidebar-25-left'  => esc_html__('Sidebar 1/4 Left', 'hoshi'),
            ),
            'default_value' => 'default'
        ));


        if(count($custom_sidebars) > 0) {
            hoshi_mikado_add_admin_field(array(
                'name'        => 'blog_single_custom_sidebar',
                'type'        => 'selectblank',
                'label'       => esc_html__('Sidebar to Display', 'hoshi'),
                'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'hoshi'),
                'parent'      => $panel_blog_single,
                'options'     => hoshi_mikado_get_custom_sidebars()
            ));
        }

        hoshi_mikado_add_admin_field(array(
            'name'          => 'blog_single_title_in_title_area',
            'type'          => 'yesno',
            'label'         => esc_html__('Show Post Title in Title Area', 'hoshi'),
            'description'   => esc_html__('Enabling this option will show post title in title area on single post pages', 'hoshi'),
            'parent'        => $panel_blog_single,
            'default_value' => 'no'
        ));

        hoshi_mikado_add_admin_field(array(
            'name'          => 'blog_single_likes',
            'type'          => 'yesno',
            'label'         => esc_html__('Show Likes', 'hoshi'),
            'description'   => esc_html__('Enabling this option will show likes on your page.', 'hoshi'),
            'parent'        => $panel_blog_single,
            'default_value' => 'yes'
        ));

        hoshi_mikado_add_admin_field(array(
            'name'          => 'blog_single_comments',
            'type'          => 'yesno',
            'label'         => esc_html__('Show Comments', 'hoshi'),
            'description'   => esc_html__('Enabling this option will show comments on your page.', 'hoshi'),
            'parent'        => $panel_blog_single,
            'default_value' => 'yes'
        ));

        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'blog_single_navigation',
                'default_value' => 'yes',
                'label'         => esc_html__('Enable Prev/Next Single Post Navigation Links', 'hoshi'),
                'parent'        => $panel_blog_single,
                'description'   => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)', 'hoshi'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_mkd_blog_single_navigation_container'
                )
            )
        );

        $blog_single_navigation_container = hoshi_mikado_add_admin_container(
            array(
                'name'            => 'mkd_blog_single_navigation_container',
                'hidden_property' => 'blog_single_navigation',
                'hidden_value'    => 'no',
                'parent'          => $panel_blog_single,
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'blog_navigation_through_same_category',
                'default_value' => 'no',
                'label'         => esc_html__('Enable Navigation Only in Current Category', 'hoshi'),
                'description'   => esc_html__('Limit your navigation only through current category', 'hoshi'),
                'parent'        => $blog_single_navigation_container,
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        hoshi_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'blog_enable_single_tags',
            'default_value' => 'yes',
            'label'         => esc_html__('Enable Tags on Single Post', 'hoshi'),
            'description'   => esc_html__('Enabling this option will display posts\s tags on single post page', 'hoshi'),
            'parent'        => $panel_blog_single
        ));


        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'blog_author_info',
                'default_value' => 'yes',
                'label'         => esc_html__('Show Author Info Box', 'hoshi'),
                'parent'        => $panel_blog_single,
                'description'   => esc_html__('Enabling this option will display author name and descriptions on Blog Single pages', 'hoshi'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_mkd_blog_single_author_info_container'
                )
            )
        );

        $blog_single_author_info_container = hoshi_mikado_add_admin_container(
            array(
                'name'            => 'mkd_blog_single_author_info_container',
                'hidden_property' => 'blog_author_info',
                'hidden_value'    => 'no',
                'parent'          => $panel_blog_single,
            )
        );

        hoshi_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'blog_author_info_email',
                'default_value' => 'no',
                'label'         => esc_html__('Show Author Email', 'hoshi'),
                'description'   => esc_html__('Enabling this option will show author email', 'hoshi'),
                'parent'        => $blog_single_author_info_container,
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

    }

    add_action('hoshi_mikado_options_map', 'hoshi_mikado_blog_options_map', 12);

}











