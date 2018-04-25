<?php

/*** Video Post Format ***/

$video_post_format_meta_box = hoshi_mikado_add_meta_box(
    array(
        'scope' => array('post'),
        'title' => esc_html__('Video Post Format', 'hoshi'),
        'name'  => 'post_format_video_meta'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_video_type_meta',
        'type'          => 'select',
        'label'         => esc_html__('Video Type', 'hoshi'),
        'description'   => esc_html__('Choose video type', 'hoshi'),
        'parent'        => $video_post_format_meta_box,
        'default_value' => 'youtube',
        'options'       => array(
            'youtube' => esc_html__('Youtube', 'hoshi'),
            'vimeo'   => esc_html__('Vimeo', 'hoshi'),
            'self'    => esc_html__('Self Hosted', 'hoshi')
        ),
        'args'          => array(
            'dependence' => true,
            'hide'       => array(
                'youtube' => '#mkd_mkd_video_self_hosted_container',
                'vimeo'   => '#mkd_mkd_video_self_hosted_container',
                'self'    => '#mkd_mkd_video_embedded_container'
            ),
            'show'       => array(
                'youtube' => '#mkd_mkd_video_embedded_container',
                'vimeo'   => '#mkd_mkd_video_embedded_container',
                'self'    => '#mkd_mkd_video_self_hosted_container'
            )
        )
    )
);

$mkd_video_embedded_container = hoshi_mikado_add_admin_container(
    array(
        'parent'          => $video_post_format_meta_box,
        'name'            => 'mkd_video_embedded_container',
        'hidden_property' => 'mkd_video_type_meta',
        'hidden_value'    => 'self'
    )
);

$mkd_video_self_hosted_container = hoshi_mikado_add_admin_container(
    array(
        'parent'          => $video_post_format_meta_box,
        'name'            => 'mkd_video_self_hosted_container',
        'hidden_property' => 'mkd_video_type_meta',
        'hidden_values'   => array('youtube', 'vimeo')
    )
);


hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_post_video_id_meta',
        'type'        => 'text',
        'label'       => esc_html__('Video ID', 'hoshi'),
        'description' => esc_html__('Enter Video ID', 'hoshi'),
        'parent'      => $mkd_video_embedded_container,

    )
);


hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_post_video_image_meta',
        'type'        => 'image',
        'label'       => esc_html__('Video Image', 'hoshi'),
        'description' => esc_html__('Upload video image', 'hoshi'),
        'parent'      => $mkd_video_self_hosted_container,

    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_post_video_webm_link_meta',
        'type'        => 'text',
        'label'       => esc_html__('Video WEBM', 'hoshi'),
        'description' => esc_html__('Enter video URL for WEBM format', 'hoshi'),
        'parent'      => $mkd_video_self_hosted_container,

    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_post_video_mp4_link_meta',
        'type'        => 'text',
        'label'       => esc_html__('Video MP4', 'hoshi'),
        'description' => esc_html__('Enter video URL for MP4 format', 'hoshi'),
        'parent'      => $mkd_video_self_hosted_container,

    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_post_video_ogv_link_meta',
        'type'        => 'text',
        'label'       => esc_html__('Video OGV', 'hoshi'),
        'description' => esc_html__('Enter video URL for OGV format', 'hoshi'),
        'parent'      => $mkd_video_self_hosted_container,

    )
);