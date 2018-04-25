<?php

$mkd_blog_categories = array();
$categories          = get_categories();
foreach($categories as $category) {
    $mkd_blog_categories[$category->term_id] = $category->name;
}

$blog_meta_box = hoshi_mikado_add_meta_box(
    array(
        'scope' => array('page'),
        'title' => esc_html__('Blog', 'hoshi'),
        'name'  => 'blog_meta'
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_blog_category_meta',
        'type'        => 'selectblank',
        'label'       => esc_html__('Blog Category', 'hoshi'),
        'description' => esc_html__('Choose category of posts to display (leave empty to display all categories)', 'hoshi'),
        'parent'      => $blog_meta_box,
        'options'     => $mkd_blog_categories
    )
);

hoshi_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_show_posts_per_page_meta',
        'type'        => 'text',
        'label'       => esc_html__('Number of Posts', 'hoshi'),
        'description' => esc_html__('Enter the number of posts to display', 'hoshi'),
        'parent'      => $blog_meta_box,
        'options'     => $mkd_blog_categories,
        'args'        => array("col_width" => 3)
    )
);
	

