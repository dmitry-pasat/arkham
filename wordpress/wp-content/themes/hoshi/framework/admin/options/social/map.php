<?php

if(!function_exists('hoshi_mikado_social_options_map')) {

    function hoshi_mikado_social_options_map() {

        hoshi_mikado_add_admin_page(
            array(
                'slug'  => '_social_page',
                'title' => esc_html__('Social Networks', 'hoshi'),
                'icon'  => 'icon_group'
            )
        );

        /**
         * Enable Social Share
         */
        $panel_social_share = hoshi_mikado_add_admin_panel(array(
            'page'  => '_social_page',
            'name'  => 'panel_social_share',
            'title' => esc_html__('Enable Social Share', 'hoshi')
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_social_share',
            'default_value' => 'no',
            'label'         => esc_html__('Enable Social Share', 'hoshi'),
            'description'   => esc_html__('Enabling this option will allow social share on networks of your choice', 'hoshi'),
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkd_panel_social_networks, #mkd_panel_show_social_share_on'
            ),
            'parent'        => $panel_social_share
        ));

        $panel_show_social_share_on = hoshi_mikado_add_admin_panel(array(
            'page'            => '_social_page',
            'name'            => 'panel_show_social_share_on',
            'title'           => esc_html__('Show Social Share On', 'hoshi'),
            'hidden_property' => 'enable_social_share',
            'hidden_value'    => 'no'
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_social_share_on_post',
            'default_value' => 'no',
            'label'         => esc_html__('Posts', 'hoshi'),
            'description'   => esc_html__('Show Social Share on Blog Posts', 'hoshi'),
            'parent'        => $panel_show_social_share_on
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_social_share_on_page',
            'default_value' => 'no',
            'label'         => esc_html__('Pages', 'hoshi'),
            'description'   => esc_html__('Show Social Share on Pages', 'hoshi'),
            'parent'        => $panel_show_social_share_on
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_social_share_on_attachment',
            'default_value' => 'no',
            'label'         => esc_html__('Media', 'hoshi'),
            'description'   => esc_html__('Show Social Share for Images and Videos', 'hoshi'),
            'parent'        => $panel_show_social_share_on
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_social_share_on_portfolio-item',
            'default_value' => 'no',
            'label'         => esc_html__('Portfolio Item', 'hoshi'),
            'description'   => esc_html__('Show Social Share for Portfolio Items', 'hoshi'),
            'parent'        => $panel_show_social_share_on
        ));

        if(hoshi_mikado_is_woocommerce_installed()) {
            hoshi_mikado_add_admin_field(array(
                'type'          => 'yesno',
                'name'          => 'enable_social_share_on_product',
                'default_value' => 'no',
                'label'         => esc_html__('Product', 'hoshi'),
                'description'   => esc_html__('Show Social Share for Product Items', 'hoshi'),
                'parent'        => $panel_show_social_share_on
            ));
        }

        /**
         * Social Share Networks
         */
        $panel_social_networks = hoshi_mikado_add_admin_panel(array(
            'page'            => '_social_page',
            'name'            => 'panel_social_networks',
            'title'           => esc_html__('Social Networks', 'hoshi'),
            'hidden_property' => 'enable_social_share',
            'hidden_value'    => 'no'
        ));

        /**
         * Facebook
         */
        hoshi_mikado_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name'   => 'facebook_title',
            'title'  => esc_html__('Share on Facebook', 'hoshi')
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_facebook_share',
            'default_value' => 'no',
            'label'         => esc_html__('Enable Share', 'hoshi'),
            'description'   => esc_html__('Enabling this option will allow sharing via Facebook', 'hoshi'),
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkd_enable_facebook_share_container'
            ),
            'parent'        => $panel_social_networks
        ));

        $enable_facebook_share_container = hoshi_mikado_add_admin_container(array(
            'name'            => 'enable_facebook_share_container',
            'hidden_property' => 'enable_facebook_share',
            'hidden_value'    => 'no',
            'parent'          => $panel_social_networks
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'image',
            'name'          => 'facebook_icon',
            'default_value' => '',
            'label'         => esc_html__('Upload Icon', 'hoshi'),
            'parent'        => $enable_facebook_share_container
        ));

        /**
         * Twitter
         */
        hoshi_mikado_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name'   => 'twitter_title',
            'title'  => 'Share on Twitter'
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_twitter_share',
            'default_value' => 'no',
            'label'         => esc_html__('Enable Share', 'hoshi'),
            'description'   => esc_html__('Enabling this option will allow sharing via Twitter', 'hoshi'),
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkd_enable_twitter_share_container'
            ),
            'parent'        => $panel_social_networks
        ));

        $enable_twitter_share_container = hoshi_mikado_add_admin_container(array(
            'name'            => 'enable_twitter_share_container',
            'hidden_property' => 'enable_twitter_share',
            'hidden_value'    => 'no',
            'parent'          => $panel_social_networks
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'image',
            'name'          => 'twitter_icon',
            'default_value' => '',
            'label'         => esc_html__('Upload Icon', 'hoshi'),
            'parent'        => $enable_twitter_share_container
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'text',
            'name'          => 'twitter_via',
            'default_value' => '',
            'label'         => esc_html__('Via', 'hoshi'),
            'parent'        => $enable_twitter_share_container
        ));

        /**
         * Google Plus
         */
        hoshi_mikado_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name'   => 'google_plus_title',
            'title'  => esc_html__('Share on Google Plus', 'hoshi')
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_google_plus_share',
            'default_value' => 'no',
            'label'         => esc_html__('Enable Share', 'hoshi'),
            'description'   => esc_html__('Enabling this option will allow sharing via Google Plus', 'hoshi'),
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkd_enable_google_plus_container'
            ),
            'parent'        => $panel_social_networks
        ));

        $enable_google_plus_container = hoshi_mikado_add_admin_container(array(
            'name'            => 'enable_google_plus_container',
            'hidden_property' => 'enable_google_plus_share',
            'hidden_value'    => 'no',
            'parent'          => $panel_social_networks
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'image',
            'name'          => 'google_plus_icon',
            'default_value' => '',
            'label'         => esc_html__('Upload Icon', 'hoshi'),
            'parent'        => $enable_google_plus_container
        ));

        /**
         * Linked In
         */
        hoshi_mikado_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name'   => 'linkedin_title',
            'title'  => esc_html__('Share on LinkedIn', 'hoshi')
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_linkedin_share',
            'default_value' => 'no',
            'label'         => esc_html__('Enable Share', 'hoshi'),
            'description'   => esc_html__('Enabling this option will allow sharing via LinkedIn', 'hoshi'),
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkd_enable_linkedin_container'
            ),
            'parent'        => $panel_social_networks
        ));

        $enable_linkedin_container = hoshi_mikado_add_admin_container(array(
            'name'            => 'enable_linkedin_container',
            'hidden_property' => 'enable_linkedin_share',
            'hidden_value'    => 'no',
            'parent'          => $panel_social_networks
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'image',
            'name'          => 'linkedin_icon',
            'default_value' => '',
            'label'         => esc_html__('Upload Icon', 'hoshi'),
            'parent'        => $enable_linkedin_container
        ));

        /**
         * Tumblr
         */
        hoshi_mikado_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name'   => 'tumblr_title',
            'title'  => esc_html__('Share on Tumblr', 'hoshi')
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_tumblr_share',
            'default_value' => 'no',
            'label'         => esc_html__('Enable Share', 'hoshi'),
            'description'   => esc_html__('Enabling this option will allow sharing via Tumblr', 'hoshi'),
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkd_enable_tumblr_container'
            ),
            'parent'        => $panel_social_networks
        ));

        $enable_tumblr_container = hoshi_mikado_add_admin_container(array(
            'name'            => 'enable_tumblr_container',
            'hidden_property' => 'enable_tumblr_share',
            'hidden_value'    => 'no',
            'parent'          => $panel_social_networks
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'image',
            'name'          => 'tumblr_icon',
            'default_value' => '',
            'label'         => esc_html__('Upload Icon', 'hoshi'),
            'parent'        => $enable_tumblr_container
        ));

        /**
         * Pinterest
         */
        hoshi_mikado_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name'   => 'pinterest_title',
            'title'  => esc_html__('Share on Pinterest', 'hoshi')
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_pinterest_share',
            'default_value' => 'no',
            'label'         => esc_html__('Enable Share', 'hoshi'),
            'description'   => esc_html__('Enabling this option will allow sharing via Pinterest', 'hoshi'),
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkd_enable_pinterest_container'
            ),
            'parent'        => $panel_social_networks
        ));

        $enable_pinterest_container = hoshi_mikado_add_admin_container(array(
            'name'            => 'enable_pinterest_container',
            'hidden_property' => 'enable_pinterest_share',
            'hidden_value'    => 'no',
            'parent'          => $panel_social_networks
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'image',
            'name'          => 'pinterest_icon',
            'default_value' => '',
            'label'         => esc_html__('Upload Icon', 'hoshi'),
            'parent'        => $enable_pinterest_container
        ));

        /**
         * VK
         */
        hoshi_mikado_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name'   => 'vk_title',
            'title'  => esc_html__('Share on VK', 'hoshi')
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_vk_share',
            'default_value' => 'no',
            'label'         => esc_html__('Enable Share', 'hoshi'),
            'description'   => esc_html__('Enabling this option will allow sharing via VK', 'hoshi'),
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkd_enable_vk_container'
            ),
            'parent'        => $panel_social_networks
        ));

        $enable_vk_container = hoshi_mikado_add_admin_container(array(
            'name'            => 'enable_vk_container',
            'hidden_property' => 'enable_vk_share',
            'hidden_value'    => 'no',
            'parent'          => $panel_social_networks
        ));

        hoshi_mikado_add_admin_field(array(
            'type'          => 'image',
            'name'          => 'vk_icon',
            'default_value' => '',
            'label'         => esc_html__('Upload Icon', 'hoshi'),
            'parent'        => $enable_vk_container
        ));

        if(defined('MIKADO_TWITTER_FEED_VERSION')) {
            $twitter_panel = hoshi_mikado_add_admin_panel(array(
                'title' => esc_html__('Twitter', 'hoshi'),
                'name'  => 'panel_twitter',
                'page'  => '_social_page'
            ));

            hoshi_mikado_add_admin_twitter_button(array(
                'name'   => 'twitter_button',
                'parent' => $twitter_panel
            ));
        }

        if(defined('MIKADO_INSTAGRAM_FEED_VERSION')) {
            $instagram_panel = hoshi_mikado_add_admin_panel(array(
                'title' => esc_html__('Instagram', 'hoshi'),
                'name'  => 'panel_instagram',
                'page'  => '_social_page'
            ));

            hoshi_mikado_add_admin_instagram_button(array(
                'name'   => 'instagram_button',
                'parent' => $instagram_panel
            ));
        }
    }

    add_action('hoshi_mikado_options_map', 'hoshi_mikado_social_options_map', 15);
}