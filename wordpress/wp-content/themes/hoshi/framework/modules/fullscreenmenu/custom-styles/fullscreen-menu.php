<?php

if(!function_exists('hoshi_mikado_fullscreen_menu_general_styles')) {

	function hoshi_mikado_fullscreen_menu_general_styles() {
		$fullscreen_menu_background_color = '';
		if(hoshi_mikado_options()->getOptionValue('fullscreen_alignment') !== '') {
			echo hoshi_mikado_dynamic_css('nav.mkd-fullscreen-menu ul li, .mkd-fullscreen-above-menu-widget-holder, .mkd-fullscreen-below-menu-widget-holder, .mkd-fullscreen-logo-wrapper', array(
				'text-align' => hoshi_mikado_options()->getOptionValue('fullscreen_alignment')
			));
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_background_color') !== '') {
			$fullscreen_menu_background_color = hoshi_mikado_hex2rgb(hoshi_mikado_options()->getOptionValue('fullscreen_menu_background_color'));
			if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_background_transparency') !== '') {
				$fullscreen_menu_background_transparency = hoshi_mikado_options()->getOptionValue('fullscreen_menu_background_transparency');
			} else {
				$fullscreen_menu_background_transparency = 0.9;
			}
		}

		if($fullscreen_menu_background_color !== '') {
			echo hoshi_mikado_dynamic_css('.mkd-fullscreen-menu-holder', array(
				'background-color' => 'rgba('.$fullscreen_menu_background_color[0].','.$fullscreen_menu_background_color[1].','.$fullscreen_menu_background_color[2].','.$fullscreen_menu_background_transparency.')'
			));
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_background_image') !== '') {
			echo hoshi_mikado_dynamic_css('.mkd-fullscreen-menu-holder', array(
				'background-image'    => 'url('.hoshi_mikado_options()->getOptionValue('fullscreen_menu_background_image').')',
				'background-position' => 'center 0',
				'background-repeat'   => 'no-repeat'
			));
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_pattern_image') !== '') {
			echo hoshi_mikado_dynamic_css('.mkd-fullscreen-menu-holder', array(
				'background-image'    => 'url('.hoshi_mikado_options()->getOptionValue('fullscreen_menu_pattern_image').')',
				'background-repeat'   => 'repeat',
				'background-position' => '0 0'
			));
		}

	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_fullscreen_menu_general_styles');

}

if(!function_exists('hoshi_mikado_fullscreen_menu_first_level_style')) {

	function hoshi_mikado_fullscreen_menu_first_level_style() {

		$first_menu_style = array();

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_color') !== '') {
			$first_menu_style['color'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_color');
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_google_fonts') !== '-1') {
			$first_menu_style['font-family'] = hoshi_mikado_get_formatted_font_family(hoshi_mikado_options()->getOptionValue('fullscreen_menu_google_fonts')).',sans-serif';
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontsize') !== '') {
			$first_menu_style['font-size'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontsize')).'px';
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_lineheight') !== '') {
			$first_menu_style['line-height'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('fullscreen_menu_lineheight')).'px';
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontstyle') !== '') {
			$first_menu_style['font-style'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontstyle');
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontweight') !== '') {
			$first_menu_style['font-weight'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontweight');
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_letterspacing') !== '') {
			$first_menu_style['letter-spacing'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('fullscreen_menu_letterspacing')).'px';
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_texttransform') !== '') {
			$first_menu_style['text-transform'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_texttransform');
		}

		if(!empty($first_menu_style)) {
			echo hoshi_mikado_dynamic_css('nav.mkd-fullscreen-menu > ul > li > a, nav.mkd-fullscreen-menu > ul > li > h6', $first_menu_style);
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_color') !== '') {
			echo hoshi_mikado_dynamic_css('.mkd-fullscreen-menu-opener.opened .mkd-line:after, .mkd-fullscreen-menu-opener.opened .mkd-line:before', array(
				'background-color' => hoshi_mikado_options()->getOptionValue('fullscreen_menu_color')
			));
		}

		$first_menu_hover_style = array();

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_hover_color') !== '') {
			$first_menu_hover_style['color'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_hover_color');
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_hover_background_color') !== '') {
			$first_menu_hover_style['background-color'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_hover_background_color');
		}

		if(!empty($first_menu_hover_style)) {
			echo hoshi_mikado_dynamic_css('nav.mkd-fullscreen-menu > ul > li > a:hover, nav.mkd-fullscreen-menu > ul > li > h6:hover', $first_menu_hover_style);
		}

		$first_menu_active_style = array();

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_active_color') !== '') {
			$first_menu_active_style['color'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_active_color');
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_active_background_color') !== '') {
			$first_menu_active_style['background-color'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_active_background_color');
		}

		if(!empty($first_menu_active_style)) {
			echo hoshi_mikado_dynamic_css('nav.mkd-fullscreen-menu > ul > li > a.current', $first_menu_active_style);
		}

	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_fullscreen_menu_first_level_style');

}

if(!function_exists('hoshi_mikado_fullscreen_menu_second_level_style')) {

	function hoshi_mikado_fullscreen_menu_second_level_style() {
		$second_menu_style = array();
		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_color_2nd') !== '') {
			$second_menu_style['color'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_color_2nd');
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_google_fonts_2nd') !== '-1') {
			$second_menu_style['font-family'] = hoshi_mikado_get_formatted_font_family(hoshi_mikado_options()->getOptionValue('fullscreen_menu_google_fonts_2nd')).',sans-serif';
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontsize_2nd') !== '') {
			$second_menu_style['font-size'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontsize_2nd')).'px';
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_lineheight_2nd') !== '') {
			$second_menu_style['line-height'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('fullscreen_menu_lineheight_2nd')).'px';
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontstyle_2nd') !== '') {
			$second_menu_style['font-style'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontstyle_2nd');
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontweight_2nd') !== '') {
			$second_menu_style['font-weight'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontweight_2nd');
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_letterspacing_2nd') !== '') {
			$second_menu_style['letter-spacing'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('fullscreen_menu_letterspacing_2nd')).'px';
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_texttransform_2nd') !== '') {
			$second_menu_style['text-transform'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_texttransform_2nd');
		}

		if(!empty($second_menu_style)) {
			echo hoshi_mikado_dynamic_css('nav.mkd-fullscreen-menu > ul > li > ul > li > a, nav.mkd-fullscreen-menu > ul > li > ul > li > h6', $second_menu_style);
		}

		$second_menu_hover_style = array();

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_hover_color_2nd') !== '') {
			$second_menu_hover_style['color'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_hover_color_2nd');
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_hover_background_color_2nd') !== '') {
			$second_menu_hover_style['background-color'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_hover_background_color_2nd');
		}

		if(!empty($second_menu_hover_style)) {
			echo hoshi_mikado_dynamic_css('nav.mkd-fullscreen-menu > ul > li > ul > li > a:hover, nav.mkd-fullscreen-menu > ul > li > ul > li > h6:hover', $second_menu_hover_style);
		}
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_fullscreen_menu_second_level_style');

}

if(!function_exists('hoshi_mikado_fullscreen_menu_third_level_style')) {

	function hoshi_mikado_fullscreen_menu_third_level_style() {
		$third_menu_style = array();
		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_color_3rd') !== '') {
			$third_menu_style['color'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_color_3rd');
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_google_fonts_3rd') !== '-1') {
			$third_menu_style['font-family'] = hoshi_mikado_get_formatted_font_family(hoshi_mikado_options()->getOptionValue('fullscreen_menu_google_fonts_3rd')).',sans-serif';
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontsize_3rd') !== '') {
			$third_menu_style['font-size'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontsize_3rd')).'px';
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_lineheight_3rd') !== '') {
			$third_menu_style['line-height'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('fullscreen_menu_lineheight_3rd')).'px';
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontstyle_3rd') !== '') {
			$third_menu_style['font-style'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontstyle_3rd');
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontweight_3rd') !== '') {
			$third_menu_style['font-weight'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_fontweight_3rd');
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_letterspacing_3rd') !== '') {
			$third_menu_style['letter-spacing'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('fullscreen_menu_letterspacing_3rd')).'px';
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_texttransform_3rd') !== '') {
			$third_menu_style['text-transform'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_texttransform_3rd');
		}

		if(!empty($third_menu_style)) {
			echo hoshi_mikado_dynamic_css('nav.mkd-fullscreen-menu ul li ul li ul li a', $third_menu_style);
		}

		$third_menu_hover_style = array();

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_hover_color_3rd') !== '') {
			$third_menu_hover_style['color'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_hover_color_3rd');
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_hover_background_color_3rd') !== '') {
			$third_menu_hover_style['background-color'] = hoshi_mikado_options()->getOptionValue('fullscreen_menu_hover_background_color_3rd');
		}

		if(!empty($third_menu_hover_style)) {
			echo hoshi_mikado_dynamic_css('nav.mkd-fullscreen-menu ul li ul li ul li a:hover', $third_menu_hover_style);
		}
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_fullscreen_menu_third_level_style');

}

if(!function_exists('hoshi_mikado_fullscreen_menu_icon_styles')) {

	function hoshi_mikado_fullscreen_menu_icon_styles() {

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_icon_color') !== '') {

			echo hoshi_mikado_dynamic_css('.mkd-fullscreen-menu-opener', array(
				'color' => hoshi_mikado_options()->getOptionValue('fullscreen_menu_icon_color')
			));

		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_icon_hover_color') !== '') {

			echo hoshi_mikado_dynamic_css('.mkd-fullscreen-menu-opener:hover', array(
				'color' => hoshi_mikado_options()->getOptionValue('fullscreen_menu_icon_hover_color')
			));

		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_light_icon_color') !== '') {
			echo hoshi_mikado_dynamic_css('.mkd-light-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-fullscreen-menu-opener:not(.opened),
			.mkd-light-header.mkd-header-style-on-scroll .mkd-page-header .mkd-fullscreen-menu-opener:not(.opened),
			.mkd-light-header .mkd-top-bar .mkd-fullscreen-menu-opener:not(.opened)', array(
				'color' => hoshi_mikado_options()->getOptionValue('fullscreen_menu_light_icon_color').' !important'
			));

		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_light_icon_hover_color') !== '') {

			echo hoshi_mikado_dynamic_css('.mkd-light-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-fullscreen-menu-opener:not(.opened):hover,
			.mkd-light-header.mkd-header-style-on-scroll .mkd-page-header .mkd-fullscreen-menu-opener:not(.opened):hover,
			.mkd-light-header .mkd-top-bar .mkd-fullscreen-menu-opener:not(.opened):hover', array(
				'color' => hoshi_mikado_options()->getOptionValue('fullscreen_menu_light_icon_hover_color').' !important'
			));

		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_dark_icon_color') !== '') {

			echo hoshi_mikado_dynamic_css('.mkd-dark-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-fullscreen-menu-opener:not(.opened),
			.mkd-dark-header.mkd-header-style-on-scroll .mkd-page-header .mkd-fullscreen-menu-opener:not(.opened),
			.mkd-dark-header .mkd-top-bar .mkd-fullscreen-menu-opener:not(.opened)', array(
				'color' => hoshi_mikado_options()->getOptionValue('fullscreen_menu_dark_icon_color').' !important'
			));

		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_dark_icon_hover_color') !== '') {

			echo hoshi_mikado_dynamic_css('.mkd-dark-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-fullscreen-menu-opener:not(.opened):hover ,
			.mkd-dark-header.mkd-header-style-on-scroll .mkd-page-header .mkd-fullscreen-menu-opener:not(.opened):hover,
			.mkd-dark-header .mkd-top-bar .mkd-fullscreen-menu-opener:not(.opened):hover', array(
				'color' => hoshi_mikado_options()->getOptionValue('fullscreen_menu_dark_icon_hover_color').' !important'
			));

		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_icon_background_color') !== '') {

			echo hoshi_mikado_dynamic_css('.mkd-fullscreen-menu-opener', array(
				'-webkit-backface-visibility' => 'hidden',
				'display'                     => 'inline-block'
			));
			echo hoshi_mikado_dynamic_css('.mkd-fullscreen-menu-opener.normal', array(
				'padding' => '10px 15px',
			));
			echo hoshi_mikado_dynamic_css('.mkd-fullscreen-menu-opener.medium', array(
				'padding' => '10px 13px',
			));
			echo hoshi_mikado_dynamic_css('.mkd-fullscreen-menu-opener.large', array(
				'padding' => '15px',
			));
			echo hoshi_mikado_dynamic_css('.mkd-fullscreen-menu-opener:not(.opened)', array(
				'background-color' => hoshi_mikado_options()->getOptionValue('fullscreen_menu_icon_background_color')
			));

		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_icon_background_hover_color') !== '') {

			hoshi_mikado_dynamic_css('.mkd-fullscreen-menu-opener.normal:not(.opened):hover, .mkd-fullscreen-menu-opener.medium:not(.opened):hover, .mkd-fullscreen-menu-opener.large:not(.opened):hover', array(
				'background-color' => hoshi_mikado_options()->getOptionValue('fullscreen_menu_icon_background_hover_color')
			));

		}

	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_fullscreen_menu_icon_styles');

}

if(!function_exists('hoshi_mikado_fullscreen_menu_icon_spacing')) {

	function hoshi_mikado_fullscreen_menu_icon_spacing() {

		$fullscreen_menu_icon_spacing = array();

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_icon_padding_left') !== '') {
			$fullscreen_menu_icon_spacing['padding-left'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('fullscreen_menu_icon_padding_left')).'px';
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_icon_padding_right') !== '') {
			$fullscreen_menu_icon_spacing['padding-right'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('fullscreen_menu_icon_padding_right')).'px';
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_icon_margin_left') !== '') {
			$fullscreen_menu_icon_spacing['margin-left'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('fullscreen_menu_icon_margin_left')).'px';
		}

		if(hoshi_mikado_options()->getOptionValue('fullscreen_menu_icon_margin_right') !== '') {
			$fullscreen_menu_icon_spacing['margin-right'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('fullscreen_menu_icon_margin_right')).'px';
		}

		if(!empty($fullscreen_menu_icon_spacing)) {
			echo hoshi_mikado_dynamic_css('a.mkd-fullscreen-menu-opener', $fullscreen_menu_icon_spacing);
		}

	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_fullscreen_menu_icon_spacing');

}