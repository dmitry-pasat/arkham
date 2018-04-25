<?php

/*** Quote Post Format ***/

$quote_post_format_meta_box = hoshi_mikado_add_meta_box(
    array(
        'scope' => array('post'),
        'title' => esc_html__('Quote Post Format', 'hoshi'),
        'name'  => 'post_format_quote_meta'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_post_quote_text_meta',
        'type'        => 'text',
        'label'       => esc_html__('Quote Text', 'hoshi'),
        'description' => esc_html__('Enter Quote text', 'hoshi'),
        'parent'      => $quote_post_format_meta_box,

    )
);
