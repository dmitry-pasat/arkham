<?php

//Testimonials

$testimonial_meta_box = hoshi_mikado_add_meta_box(
    array(
        'scope' => array('testimonials'),
        'title' => esc_html__('Testimonial', 'hoshi'),
        'name'  => 'testimonial_meta'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_testimonial_title',
        'type'        => 'text',
        'label'       => esc_html__('Title', 'hoshi'),
        'description' => esc_html__('Enter testimonial title', 'hoshi'),
        'parent'      => $testimonial_meta_box,
    )
);


hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_testimonial_author',
        'type'        => 'text',
        'label'       => esc_html__('Author', 'hoshi'),
        'description' => esc_html__('Enter author name', 'hoshi'),
        'parent'      => $testimonial_meta_box,
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_testimonial_author_position',
        'type'        => 'text',
        'label'       => esc_html__('Job Position', 'hoshi'),
        'description' => esc_html__('Enter job position', 'hoshi'),
        'parent'      => $testimonial_meta_box,
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_testimonial_text',
        'type'        => 'text',
        'label'       => esc_html__('Text', 'hoshi'),
        'description' => esc_html__('Enter testimonial text', 'hoshi'),
        'parent'      => $testimonial_meta_box,
    )
);