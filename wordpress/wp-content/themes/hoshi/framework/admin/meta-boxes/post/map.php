<?php

/*** Post Options ***/

$post_meta_box = hoshi_mikado_add_meta_box(
    array(
        'scope' => array('post'),
        'title' => esc_html__('Post', 'hoshi'),
        'name'  => 'post-meta'
    )
);

$all_pages = array(
    '' => 'Default'
);

$pages = get_pages();
foreach($pages as $page) {
    $all_pages[$page->ID] = $page->post_title;
}

hoshi_mikado_add_meta_box_field(array(
    'name'          => 'mkd_blog_masonry_gallery_dimensions',
    'type'          => 'select',
    'label'         => esc_html__('Dimensions for Masonry Gallery', 'hoshi'),
    'description'   => esc_html__('Choose image layout when it appears in Masonry Gallery list', 'hoshi'),
    'parent'        => $post_meta_box,
    'options'       => array(
        'square'             => esc_html__('Square', 'hoshi'),
        'large-width'        => esc_html__('Large width', 'hoshi'),
        'large-height'       => esc_html__('Large height', 'hoshi'),
        'large-width-height' => esc_html__('Large width/height', 'hoshi')
    ),
    'default_value' => 'square'
));
