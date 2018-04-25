<?php

/*** Audio Post Format ***/

$audio_post_format_meta_box = hoshi_mikado_add_meta_box(
    array(
        'scope' => array('post'),
        'title' => esc_html__('Audio Post Format', 'hoshi'),
        'name'  => 'post_format_audio_meta'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_post_audio_link_meta',
        'type'        => 'text',
        'label'       => esc_html__('Link', 'hoshi'),
        'description' => esc_html__('Enter audio link', 'hoshi'),
        'parent'      => $audio_post_format_meta_box,

    )
);
