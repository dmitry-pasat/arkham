<?php

if(!function_exists('hoshi_mikado_portfolio_options_map')) {

	function hoshi_mikado_portfolio_options_map() {

		hoshi_mikado_add_admin_page(array(
			'slug'  => '_portfolio',
			'title' => esc_html__('Portfolio', 'hoshi'),
			'icon'  => 'icon_images'
		));

		$panel = hoshi_mikado_add_admin_panel(array(
			'title' => esc_html__('Portfolio Single', 'hoshi'),
			'name'  => 'panel_portfolio_single',
			'page'  => '_portfolio'
		));

		hoshi_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_template',
			'type'          => 'select',
			'label'         => esc_html__('Portfolio Type', 'hoshi'),
			'default_value' => 'small-images',
			'description'   => esc_html__('Choose a default type for Single Project pages','hoshi'),
			'parent'        => $panel,
			'options'       => array(
				'small-images'      => esc_html__('Portfolio small images', 'hoshi'),
				'small-slider'      => esc_html__('Portfolio small slider', 'hoshi'),
				'big-images'        => esc_html__('Portfolio big images', 'hoshi'),
				'big-slider'        => esc_html__('Portfolio big slider', 'hoshi'),
				'custom'            => esc_html__('Portfolio custom', 'hoshi'),
				'full-width-custom' => esc_html__('Portfolio full width custom', 'hoshi'),
				'masonry'   => esc_html__('Portfolio masonry', 'hoshi'),
				'gallery'           => esc_html__('Portfolio gallery', 'hoshi')
			)
		));

		hoshi_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_images',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Images', 'hoshi'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for projects with images.', 'hoshi'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		hoshi_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_videos',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Videos', 'hoshi'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects.', 'hoshi'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		hoshi_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_hide_categories',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Categories', 'hoshi'),
			'description'   => esc_html__('Enabling this option will disable category meta description on Single Projects.', 'hoshi'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		hoshi_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_hide_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Date', 'hoshi'),
			'description'   => esc_html__('Enabling this option will disable date meta on Single Projects.', 'hoshi'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		hoshi_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_likes',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Likes', 'hoshi'),
			'description'   => esc_html__('Enabling this option will show likes on your page.', 'hoshi'),
			'parent'        => $panel,
			'default_value' => 'no'
		));


		hoshi_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'hoshi'),
			'description'   => esc_html__('Enabling this option will show comments on your page.', 'hoshi'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		hoshi_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_sticky_sidebar',
			'type'          => 'yesno',
			'label'         => esc_html__('Sticky Side Text', 'hoshi'),
			'description'   => esc_html__('Enabling this option will make side text sticky on Single Project pages', 'hoshi'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		hoshi_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_hide_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Pagination', 'hoshi'),
			'description'   => esc_html__('Enabling this option will turn off portfolio pagination functionality.', 'hoshi'),
			'parent'        => $panel,
			'default_value' => 'no',
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '#mkd_navigate_same_category_container'
			)
		));

		$container_navigate_category = hoshi_mikado_add_admin_container(array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'portfolio_single_hide_pagination',
			'hidden_value'    => 'yes'
		));

		hoshi_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_nav_same_category',
			'type'          => 'yesno',
			'label'         => esc_html__('Enable Pagination Through Same Category', 'hoshi'),
			'description'   => esc_html__('Enabling this option will make portfolio pagination sort through current category.', 'hoshi'),
			'parent'        => $container_navigate_category,
			'default_value' => 'no'
		));

		hoshi_mikado_add_admin_field(array(
			'name'          => 'portfolio_single_numb_columns',
			'type'          => 'select',
			'label'         => esc_html__('Number of Columns', 'hoshi'),
			'default_value' => 'three-columns',
			'description'   => esc_html__('Enter the number of columns for Portfolio Gallery type', 'hoshi'),
			'parent'        => $panel,
			'options'       => array(
				'two-columns'   => esc_html__('2 columns', 'hoshi'),
				'three-columns' => esc_html__('3 columns', 'hoshi'),
				'four-columns'  => esc_html__('4 columns', 'hoshi')
			)
		));

		hoshi_mikado_add_admin_field(array(
			'name'        => 'portfolio_single_slug',
			'type'        => 'text',
			'label'       => esc_html__('Portfolio Single Slug', 'hoshi'),
			'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'hoshi'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

	}

	add_action('hoshi_mikado_options_map', 'hoshi_mikado_portfolio_options_map', 14);

}