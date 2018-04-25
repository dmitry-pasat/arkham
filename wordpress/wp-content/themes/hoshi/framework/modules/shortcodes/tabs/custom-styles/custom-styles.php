<?php
if(!function_exists('hoshi_mikado_tabs_typography_styles')) {
	function hoshi_mikado_tabs_typography_styles() {
		$selector              = '.mkd-tabs .mkd-tabs-nav li a';
		$tabs_tipography_array = array();
		$font_family           = hoshi_mikado_options()->getOptionValue('tabs_font_family');

		if(hoshi_mikado_is_font_option_valid($font_family)) {
			$tabs_tipography_array['font-family'] = hoshi_mikado_is_font_option_valid($font_family);
		}

		$text_transform = hoshi_mikado_options()->getOptionValue('tabs_text_transform');
		if(!empty($text_transform)) {
			$tabs_tipography_array['text-transform'] = $text_transform;
		}

		$font_style = hoshi_mikado_options()->getOptionValue('tabs_font_style');
		if(!empty($font_style)) {
			$tabs_tipography_array['font-style'] = $font_style;
		}

		$letter_spacing = hoshi_mikado_options()->getOptionValue('tabs_letter_spacing');
		if($letter_spacing !== '') {
			$tabs_tipography_array['letter-spacing'] = hoshi_mikado_filter_px($letter_spacing).'px';
		}

		$font_weight = hoshi_mikado_options()->getOptionValue('tabs_font_weight');
		if(!empty($font_weight)) {
			$tabs_tipography_array['font-weight'] = $font_weight;
		}

		echo hoshi_mikado_dynamic_css($selector, $tabs_tipography_array);
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_tabs_typography_styles');
}

if(!function_exists('hoshi_mikado_tabs_inital_color_styles')) {
	function hoshi_mikado_tabs_inital_color_styles() {
		$selector = '.mkd-tabs .mkd-tabs-nav li a';
		$styles   = array();

		if(hoshi_mikado_options()->getOptionValue('tabs_color')) {
			$styles['color'] = hoshi_mikado_options()->getOptionValue('tabs_color');
		}
		if(hoshi_mikado_options()->getOptionValue('tabs_back_color')) {
			$styles['background-color'] = hoshi_mikado_options()->getOptionValue('tabs_back_color');
		}
		if(hoshi_mikado_options()->getOptionValue('tabs_border_color')) {
			$styles['border-color'] = hoshi_mikado_options()->getOptionValue('tabs_border_color');
		}

		echo hoshi_mikado_dynamic_css($selector, $styles);
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_tabs_inital_color_styles');
}
if(!function_exists('hoshi_mikado_tabs_active_color_styles')) {
	function hoshi_mikado_tabs_active_color_styles() {
		$selector = '.mkd-tabs .mkd-tabs-nav li.ui-state-active a, .mkd-tabs .mkd-tabs-nav li.ui-state-hover a';
		$styles   = array();

		if(hoshi_mikado_options()->getOptionValue('tabs_color_active')) {
			$styles['color'] = hoshi_mikado_options()->getOptionValue('tabs_color_active');
		}
		if(hoshi_mikado_options()->getOptionValue('tabs_back_color_active')) {
			$styles['background-color'] = hoshi_mikado_options()->getOptionValue('tabs_back_color_active');
		}
		if(hoshi_mikado_options()->getOptionValue('tabs_border_color_active')) {
			$styles['border-color'] = hoshi_mikado_options()->getOptionValue('tabs_border_color_active');
		}

		echo hoshi_mikado_dynamic_css($selector, $styles);
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_tabs_active_color_styles');
}