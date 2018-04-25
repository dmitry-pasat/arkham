<?php

if(!function_exists('hoshi_mikado_tabs_map')) {
	function hoshi_mikado_tabs_map() {

		$panel = hoshi_mikado_add_admin_panel(array(
			'title' => esc_html__('Tabs', 'hoshi'),
			'name'  => 'panel_tabs',
			'page'  => '_elements_page'
		));

		//Typography options
		hoshi_mikado_add_admin_section_title(array(
			'name'   => 'typography_section_title',
			'title'  => esc_html__('Tabs Navigation Typography', 'hoshi'),
			'parent' => $panel
		));

		$typography_group = hoshi_mikado_add_admin_group(array(
			'name'        => 'typography_group',
			'title'       => esc_html__('Tabs Navigation Typography', 'hoshi'),
			'description' => esc_html__('Setup typography for tabs navigation', 'hoshi'),
			'parent'      => $panel
		));

		$typography_row = hoshi_mikado_add_admin_row(array(
			'name'   => 'typography_row',
			'next'   => true,
			'parent' => $typography_group
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'fontsimple',
			'name'          => 'tabs_font_family',
			'default_value' => '',
			'label'         => esc_html__('Font Family', 'hoshi'),
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'selectsimple',
			'name'          => 'tabs_text_transform',
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'hoshi'),
			'options'       => hoshi_mikado_get_text_transform_array()
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'selectsimple',
			'name'          => 'tabs_font_style',
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'hoshi'),
			'options'       => hoshi_mikado_get_font_style_array()
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'textsimple',
			'name'          => 'tabs_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'hoshi'),
			'args'          => array(
				'suffix' => 'px'
			)
		));

		$typography_row2 = hoshi_mikado_add_admin_row(array(
			'name'   => 'typography_row2',
			'next'   => true,
			'parent' => $typography_group
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $typography_row2,
			'type'          => 'selectsimple',
			'name'          => 'tabs_font_weight',
			'default_value' => '',
			'label'         => esc_html__('Font Weight', 'hoshi'),
			'options'       => hoshi_mikado_get_font_weight_array()
		));

		//Initial Tab Color Styles

		hoshi_mikado_add_admin_section_title(array(
			'name'   => 'tab_color_section_title',
			'title'  => esc_html__('Tab Navigation Color Styles', 'hoshi'),
			'parent' => $panel
		));
		$tabs_color_group = hoshi_mikado_add_admin_group(array(
			'name'        => 'tabs_color_group',
			'title'       => esc_html__('Tab Navigation Color Styles', 'hoshi'),
			'description' => esc_html__('Set color styles for tab navigation', 'hoshi'),
			'parent'      => $panel
		));
		$tabs_color_row   = hoshi_mikado_add_admin_row(array(
			'name'   => 'tabs_color_row',
			'next'   => true,
			'parent' => $tabs_color_group
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $tabs_color_row,
			'type'          => 'colorsimple',
			'name'          => 'tabs_color',
			'default_value' => '',
			'label'         => esc_html__('Color', 'hoshi')
		));
		hoshi_mikado_add_admin_field(array(
			'parent'        => $tabs_color_row,
			'type'          => 'colorsimple',
			'name'          => 'tabs_back_color',
			'default_value' => '',
			'label'         => esc_html__('Background Color', 'hoshi')
		));
		hoshi_mikado_add_admin_field(array(
			'parent'        => $tabs_color_row,
			'type'          => 'colorsimple',
			'name'          => 'tabs_border_color',
			'default_value' => '',
			'label'         => esc_html__('Border Color', 'hoshi')
		));

		//Active Tab Color Styles

		$active_tabs_color_group = hoshi_mikado_add_admin_group(array(
			'name'        => 'active_tabs_color_group',
			'title'       => esc_html__('Active and Hover Navigation Color Styles', 'hoshi'),
			'description' => esc_html__('Set color styles for active and hover tabs', 'hoshi'),
			'parent'      => $panel
		));
		$active_tabs_color_row   = hoshi_mikado_add_admin_row(array(
			'name'   => 'active_tabs_color_row',
			'next'   => true,
			'parent' => $active_tabs_color_group
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $active_tabs_color_row,
			'type'          => 'colorsimple',
			'name'          => 'tabs_color_active',
			'default_value' => '',
			'label'         => esc_html__('Color', 'hoshi')
		));
		hoshi_mikado_add_admin_field(array(
			'parent'        => $active_tabs_color_row,
			'type'          => 'colorsimple',
			'name'          => 'tabs_back_color_active',
			'default_value' => '',
			'label'         => esc_html__('Background Color', 'hoshi')
		));
		hoshi_mikado_add_admin_field(array(
			'parent'        => $active_tabs_color_row,
			'type'          => 'colorsimple',
			'name'          => 'tabs_border_color_active',
			'default_value' => '',
			'label'         => esc_html__('Border Color', 'hoshi')
		));

	}

	add_action('hoshi_mikado_options_elements_map', 'hoshi_mikado_tabs_map');
}