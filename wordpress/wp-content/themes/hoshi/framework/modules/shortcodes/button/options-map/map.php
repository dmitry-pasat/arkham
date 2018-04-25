<?php

if(!function_exists('hoshi_mikado_button_map')) {
	function hoshi_mikado_button_map() {
		$panel = hoshi_mikado_add_admin_panel(array(
			'title' => esc_html__('Button', 'hoshi'),
			'name'  => 'panel_button',
			'page'  => '_elements_page'
		));

		hoshi_mikado_add_admin_field(array(
			'name'        => 'button_hover_animation',
			'type'        => 'select',
			'label'       => esc_html__('Hover Animation', 'hoshi'),
			'description' => esc_html__('Choose default hover animation type', 'hoshi'),
			'parent'      => $panel,
			'options'     => hoshi_mikado_get_btn_hover_animation_types()
		));

		//Typography options
		hoshi_mikado_add_admin_section_title(array(
			'name'   => 'typography_section_title',
			'title'  => esc_html__('Typography', 'hoshi'),
			'parent' => $panel
		));

		$typography_group = hoshi_mikado_add_admin_group(array(
			'name'        => 'typography_group',
			'title'       => esc_html__('Typography', 'hoshi'),
			'description' => esc_html__('Setup typography for all button types', 'hoshi'),
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
			'name'          => 'button_font_family',
			'default_value' => '',
			'label'         => esc_html__('Font Family', 'hoshi'),
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'selectsimple',
			'name'          => 'button_text_transform',
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'hoshi'),
			'options'       => hoshi_mikado_get_text_transform_array()
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'selectsimple',
			'name'          => 'button_font_style',
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'hoshi'),
			'options'       => hoshi_mikado_get_font_style_array()
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'textsimple',
			'name'          => 'button_letter_spacing',
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
			'name'          => 'button_font_weight',
			'default_value' => '',
			'label'         => esc_html__('Font Weight', 'hoshi'),
			'options'       => hoshi_mikado_get_font_weight_array()
		));

		//Outline type options
		hoshi_mikado_add_admin_section_title(array(
			'name'   => 'type_section_title',
			'title'  => esc_html__('Types', 'hoshi'),
			'parent' => $panel
		));

		$outline_group = hoshi_mikado_add_admin_group(array(
			'name'        => 'outline_group',
			'title'       => esc_html__('Outline Type', 'hoshi'),
			'description' => esc_html__('Setup outline button type', 'hoshi'),
			'parent'      => $panel
		));

		$outline_row = hoshi_mikado_add_admin_row(array(
			'name'   => 'outline_row',
			'next'   => true,
			'parent' => $outline_group
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $outline_row,
			'type'          => 'colorsimple',
			'name'          => 'btn_outline_text_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'hoshi'),
			'description'   => ''
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $outline_row,
			'type'          => 'colorsimple',
			'name'          => 'btn_outline_hover_text_color',
			'default_value' => '',
			'label'         => esc_html__('Text Hover Color', 'hoshi'),
			'description'   => ''
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $outline_row,
			'type'          => 'colorsimple',
			'name'          => 'btn_outline_hover_bg_color',
			'default_value' => '',
			'label'         => esc_html__('Hover Background Color', 'hoshi'),
			'description'   => ''
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $outline_row,
			'type'          => 'colorsimple',
			'name'          => 'btn_outline_border_color',
			'default_value' => '',
			'label'         => esc_html__('Border Color', 'hoshi'),
			'description'   => ''
		));

		$outline_row2 = hoshi_mikado_add_admin_row(array(
			'name'   => 'outline_row2',
			'next'   => true,
			'parent' => $outline_group
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $outline_row2,
			'type'          => 'colorsimple',
			'name'          => 'btn_outline_hover_border_color',
			'default_value' => '',
			'label'         => esc_html__('Hover Border Color', 'hoshi'),
			'description'   => ''
		));

		//Solid type options
		$solid_group = hoshi_mikado_add_admin_group(array(
			'name'        => 'solid_group',
			'title'       => esc_html__('Solid Type', 'hoshi'),
			'description' => esc_html__('Setup solid button type', 'hoshi'),
			'parent'      => $panel
		));

		$solid_row = hoshi_mikado_add_admin_row(array(
			'name'   => 'solid_row',
			'next'   => true,
			'parent' => $solid_group
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $solid_row,
			'type'          => 'colorsimple',
			'name'          => 'btn_solid_text_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'hoshi'),
			'description'   => ''
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $solid_row,
			'type'          => 'colorsimple',
			'name'          => 'btn_solid_hover_text_color',
			'default_value' => '',
			'label'         => esc_html__('Text Hover Color', 'hoshi'),
			'description'   => ''
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $solid_row,
			'type'          => 'colorsimple',
			'name'          => 'btn_solid_bg_color',
			'default_value' => '',
			'label'         => esc_html__('Background Color', 'hoshi'),
			'description'   => ''
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $solid_row,
			'type'          => 'colorsimple',
			'name'          => 'btn_solid_hover_bg_color',
			'default_value' => '',
			'label'         => esc_html__('Hover Background Color', 'hoshi'),
			'description'   => ''
		));

		$solid_row2 = hoshi_mikado_add_admin_row(array(
			'name'   => 'solid_row2',
			'next'   => true,
			'parent' => $solid_group
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $solid_row2,
			'type'          => 'colorsimple',
			'name'          => 'btn_solid_border_color',
			'default_value' => '',
			'label'         => esc_html__('Border Color', 'hoshi'),
			'description'   => ''
		));

		hoshi_mikado_add_admin_field(array(
			'parent'        => $solid_row2,
			'type'          => 'colorsimple',
			'name'          => 'btn_solid_hover_border_color',
			'default_value' => '',
			'label'         => esc_html__('Hover Border Color', 'hoshi'),
			'description'   => ''
		));
	}

	add_action('hoshi_mikado_options_elements_map', 'hoshi_mikado_button_map');
}