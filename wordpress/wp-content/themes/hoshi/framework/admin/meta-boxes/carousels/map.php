<?php

//Carousels

$carousel_meta_box = hoshi_mikado_add_meta_box(
    array(
        'scope' => array('carousels'),
        'title' => esc_html__('Carousel', 'hoshi'),
        'name'  => 'carousel_meta'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_carousel_image',
        'type'        => 'image',
        'label'       => esc_html__('Carousel Image', 'hoshi'),
        'description' => esc_html__('Choose carousel image (min width needs to be 215px)', 'hoshi'),
        'parent'      => $carousel_meta_box
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_carousel_hover_image',
        'type'        => 'image',
        'label'       => esc_html__('Carousel Hover Image', 'hoshi'),
        'description' => esc_html__('Choose carousel hover image (min width needs to be 215px)', 'hoshi'),
        'parent'      => $carousel_meta_box
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_carousel_item_link',
        'type'        => 'text',
        'label'       => esc_html__('Link', 'hoshi'),
        'description' => esc_html__('Enter the URL to which you want the image to link to (e.g. http://www.example.com)', 'hoshi'),
        'parent'      => $carousel_meta_box
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_carousel_item_target',
        'type'        => 'selectblank',
        'label'       => esc_html__('Target', 'hoshi'),
        'description' => esc_html__('Specify where to open the linked document', 'hoshi'),
        'parent'      => $carousel_meta_box,
        'options'     => array(
            '_self'  => esc_html__('Self', 'hoshi'),
            '_blank' => esc_html__('Blank', 'hoshi')
        )
    )
);