<?php

if(!function_exists('hoshi_mikado_accordions_typography_styles')) {
	function hoshi_mikado_accordions_typography_styles() {
		$selector = '.mkd-accordion-holder .mkd-title-holder';
		$styles   = array();

		$font_family = hoshi_mikado_options()->getOptionValue('accordions_font_family');
		if(hoshi_mikado_is_font_option_valid($font_family)) {
			$styles['font-family'] = hoshi_mikado_get_font_option_val($font_family);
		}

		$text_transform = hoshi_mikado_options()->getOptionValue('accordions_text_transform');
		if(!empty($text_transform)) {
			$styles['text-transform'] = $text_transform;
		}

		$font_style = hoshi_mikado_options()->getOptionValue('accordions_font_style');
		if(!empty($font_style)) {
			$styles['font-style'] = $font_style;
		}

		$letter_spacing = hoshi_mikado_options()->getOptionValue('accordions_letter_spacing');
		if($letter_spacing !== '') {
			$styles['letter-spacing'] = hoshi_mikado_filter_px($letter_spacing).'px';
		}

		$font_weight = hoshi_mikado_options()->getOptionValue('accordions_font_weight');
		if(!empty($font_weight)) {
			$styles['font-weight'] = $font_weight;
		}

		echo hoshi_mikado_dynamic_css($selector, $styles);
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_accordions_typography_styles');
}

if(!function_exists('hoshi_mikado_accordions_inital_title_color_styles')) {
	function hoshi_mikado_accordions_inital_title_color_styles() {
		$selector = '.mkd-accordion-holder.mkd-initial .mkd-title-holder';
		$styles   = array();

		if(hoshi_mikado_options()->getOptionValue('accordions_title_color')) {
			$styles['color'] = hoshi_mikado_options()->getOptionValue('accordions_title_color');
		}
		echo hoshi_mikado_dynamic_css($selector, $styles);
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_accordions_inital_title_color_styles');
}

if(!function_exists('hoshi_mikado_accordions_active_title_color_styles')) {

	function hoshi_mikado_accordions_active_title_color_styles() {
		$selector = array(
			'.mkd-accordion-holder.mkd-initial .mkd-title-holder.ui-state-active',
			'.mkd-accordion-holder.mkd-initial .mkd-title-holder.ui-state-hover'
		);
		$styles   = array();

		if(hoshi_mikado_options()->getOptionValue('accordions_title_color_active')) {
			$styles['color'] = hoshi_mikado_options()->getOptionValue('accordions_title_color_active');
		}

		echo hoshi_mikado_dynamic_css($selector, $styles);
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_accordions_active_title_color_styles');
}
if(!function_exists('hoshi_mikado_accordions_inital_icon_color_styles')) {

	function hoshi_mikado_accordions_inital_icon_color_styles() {
		$selector = '.mkd-accordion-holder.mkd-initial .mkd-title-holder .mkd-accordion-mark';
		$styles   = array();

		if(hoshi_mikado_options()->getOptionValue('accordions_icon_color')) {
			$styles['color'] = hoshi_mikado_options()->getOptionValue('accordions_icon_color');
		}
		if(hoshi_mikado_options()->getOptionValue('accordions_icon_back_color')) {
			$styles['background-color'] = hoshi_mikado_options()->getOptionValue('accordions_icon_back_color');
		}
		echo hoshi_mikado_dynamic_css($selector, $styles);
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_accordions_inital_icon_color_styles');
}
if(!function_exists('hoshi_mikado_accordions_active_icon_color_styles')) {

	function hoshi_mikado_accordions_active_icon_color_styles() {
		$selector = array(
			'.mkd-accordion-holder.mkd-initial .mkd-title-holder.ui-state-active  .mkd-accordion-mark',
			'.mkd-accordion-holder.mkd-initial .mkd-title-holder.ui-state-hover  .mkd-accordion-mark'
		);
		$styles   = array();

		if(hoshi_mikado_options()->getOptionValue('accordions_icon_color_active')) {
			$styles['color'] = hoshi_mikado_options()->getOptionValue('accordions_icon_color_active');
		}
		if(hoshi_mikado_options()->getOptionValue('accordions_icon_back_color_active')) {
			$styles['background-color'] = hoshi_mikado_options()->getOptionValue('accordions_icon_back_color_active');
		}
		echo hoshi_mikado_dynamic_css($selector, $styles);
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_accordions_active_icon_color_styles');
}

if(!function_exists('hoshi_mikado_boxed_accordions_inital_color_styles')) {
	function hoshi_mikado_boxed_accordions_inital_color_styles() {
		$selector = '.mkd-accordion-holder.mkd-boxed .mkd-title-holder';
		$styles   = array();

		if(hoshi_mikado_options()->getOptionValue('boxed_accordions_color')) {
			$styles['color'] = hoshi_mikado_options()->getOptionValue('boxed_accordions_color');
			echo hoshi_mikado_dynamic_css('.mkd-accordion-holder.mkd-boxed .mkd-title-holder .mkd-accordion-mark', array('color' => hoshi_mikado_options()->getOptionValue('boxed_accordions_color')));
		}
		if(hoshi_mikado_options()->getOptionValue('boxed_accordions_back_color')) {
			$styles['background-color'] = hoshi_mikado_options()->getOptionValue('boxed_accordions_back_color');
		}
		if(hoshi_mikado_options()->getOptionValue('boxed_accordions_border_color')) {
			$styles['border-color'] = hoshi_mikado_options()->getOptionValue('boxed_accordions_border_color');
		}

		echo hoshi_mikado_dynamic_css($selector, $styles);
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_boxed_accordions_inital_color_styles');
}
if(!function_exists('hoshi_mikado_boxed_accordions_active_color_styles')) {

	function hoshi_mikado_boxed_accordions_active_color_styles() {
		$selector       = array(
			'.mkd-accordion-holder.mkd-boxed.ui-accordion .mkd-title-holder.ui-state-active',
			'.mkd-accordion-holder.mkd-boxed.ui-accordion .mkd-title-holder.ui-state-hover'
		);
		$selector_icons = array(
			'.mkd-accordion-holder.mkd-boxed .mkd-title-holder.ui-state-active .mkd-accordion-mark',
			'.mkd-accordion-holder.mkd-boxed .mkd-title-holder.ui-state-hover .mkd-accordion-mark'
		);
		$styles         = array();

		if(hoshi_mikado_options()->getOptionValue('boxed_accordions_color_active')) {
			$styles['color'] = hoshi_mikado_options()->getOptionValue('boxed_accordions_color_active');
			echo hoshi_mikado_dynamic_css($selector_icons, array('color' => hoshi_mikado_options()->getOptionValue('boxed_accordions_color_active')));
		}
		if(hoshi_mikado_options()->getOptionValue('boxed_accordions_back_color_active')) {
			$styles['background-color'] = hoshi_mikado_options()->getOptionValue('boxed_accordions_back_color_active');
		}
		if(hoshi_mikado_options()->getOptionValue('boxed_accordions_border_color_active')) {
			$styles['border-color'] = hoshi_mikado_options()->getOptionValue('boxed_accordions_border_color_active');
		}

		echo hoshi_mikado_dynamic_css($selector, $styles);
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_boxed_accordions_active_color_styles');
}