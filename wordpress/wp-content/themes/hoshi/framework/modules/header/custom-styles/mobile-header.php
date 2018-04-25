<?php

if(!function_exists('hoshi_mikado_mobile_header_general_styles')) {
	/**
	 * Generates general custom styles for mobile header
	 */
	function hoshi_mikado_mobile_header_general_styles() {
		$mobile_header_styles = array();
		if(hoshi_mikado_options()->getOptionValue('mobile_header_height') !== '') {
			$mobile_header_styles['height'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('mobile_header_height')).'px';
		}

		if(hoshi_mikado_options()->getOptionValue('mobile_header_background_color')) {
			$mobile_header_styles['background-color'] = hoshi_mikado_options()->getOptionValue('mobile_header_background_color');
		}

		echo hoshi_mikado_dynamic_css('.mkd-mobile-header .mkd-mobile-header-inner', $mobile_header_styles);
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_mobile_header_general_styles');
}

if(!function_exists('hoshi_mikado_mobile_navigation_styles')) {
	/**
	 * Generates styles for mobile navigation
	 */
	function hoshi_mikado_mobile_navigation_styles() {
		$mobile_nav_styles = array();
		if(hoshi_mikado_options()->getOptionValue('mobile_menu_background_color')) {
			$mobile_nav_styles['background-color'] = hoshi_mikado_options()->getOptionValue('mobile_menu_background_color');
		}

		echo hoshi_mikado_dynamic_css('.mkd-mobile-header .mkd-mobile-nav', $mobile_nav_styles);

		$mobile_nav_item_styles = array();
		if(hoshi_mikado_options()->getOptionValue('mobile_menu_separator_color') !== '') {
			$mobile_nav_item_styles['border-bottom-color'] = hoshi_mikado_options()->getOptionValue('mobile_menu_separator_color');
		}

		if(hoshi_mikado_options()->getOptionValue('mobile_text_color') !== '') {
			$mobile_nav_item_styles['color'] = hoshi_mikado_options()->getOptionValue('mobile_text_color');
		}

		if(hoshi_mikado_is_font_option_valid(hoshi_mikado_options()->getOptionValue('mobile_font_family'))) {
			$mobile_nav_item_styles['font-family'] = hoshi_mikado_get_formatted_font_family(hoshi_mikado_options()->getOptionValue('mobile_font_family'));
		}

		if(hoshi_mikado_options()->getOptionValue('mobile_font_size') !== '') {
			$mobile_nav_item_styles['font-size'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('mobile_font_size')).'px';
		}

		if(hoshi_mikado_options()->getOptionValue('mobile_line_height') !== '') {
			$mobile_nav_item_styles['line-height'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('mobile_line_height')).'px';
		}

		if(hoshi_mikado_options()->getOptionValue('mobile_text_transform') !== '') {
			$mobile_nav_item_styles['text-transform'] = hoshi_mikado_options()->getOptionValue('mobile_text_transform');
		}

		if(hoshi_mikado_options()->getOptionValue('mobile_font_style') !== '') {
			$mobile_nav_item_styles['font-style'] = hoshi_mikado_options()->getOptionValue('mobile_font_style');
		}

		if(hoshi_mikado_options()->getOptionValue('mobile_font_weight') !== '') {
			$mobile_nav_item_styles['font-weight'] = hoshi_mikado_options()->getOptionValue('mobile_font_weight');
		}

		$mobile_nav_item_selector = array(
			'.mkd-mobile-header .mkd-mobile-nav a',
			'.mkd-mobile-header .mkd-mobile-nav h4'
		);

		echo hoshi_mikado_dynamic_css($mobile_nav_item_selector, $mobile_nav_item_styles);

		$mobile_nav_item_hover_styles = array();
		if(hoshi_mikado_options()->getOptionValue('mobile_text_hover_color') !== '') {
			$mobile_nav_item_hover_styles['color'] = hoshi_mikado_options()->getOptionValue('mobile_text_hover_color');
		}

		$mobile_nav_item_selector_hover = array(
			'.mkd-mobile-header .mkd-mobile-nav a:hover',
			'.mkd-mobile-header .mkd-mobile-nav h4:hover'
		);

		echo hoshi_mikado_dynamic_css($mobile_nav_item_selector_hover, $mobile_nav_item_hover_styles);
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_mobile_navigation_styles');
}

if(!function_exists('hoshi_mikado_mobile_logo_styles')) {
	/**
	 * Generates styles for mobile logo
	 */
	function hoshi_mikado_mobile_logo_styles() {
		if(hoshi_mikado_options()->getOptionValue('mobile_logo_height') !== '') { ?>
			@media only screen and (max-width: 1000px) {
			<?php echo hoshi_mikado_dynamic_css(
				'.mkd-mobile-header .mkd-mobile-logo-wrapper a',
				array('height' => hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('mobile_logo_height')).'px !important')
			); ?>
			}
		<?php }

		if(hoshi_mikado_options()->getOptionValue('mobile_logo_height_phones') !== '') { ?>
			@media only screen and (max-width: 480px) {
			<?php echo hoshi_mikado_dynamic_css(
				'.mkd-mobile-header .mkd-mobile-logo-wrapper a',
				array('height' => hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('mobile_logo_height_phones')).'px !important')
			); ?>
			}
		<?php }

		if(hoshi_mikado_options()->getOptionValue('mobile_header_height') !== '') {
			$max_height = intval(hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('mobile_header_height')) * 0.9).'px';
			echo hoshi_mikado_dynamic_css('.mkd-mobile-header .mkd-mobile-logo-wrapper a', array('max-height' => $max_height));
		}
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_mobile_logo_styles');
}

if(!function_exists('hoshi_mikado_mobile_icon_styles')) {
	/**
	 * Generates styles for mobile icon opener
	 */
	function hoshi_mikado_mobile_icon_styles() {
		$mobile_icon_styles = array();
		if(hoshi_mikado_options()->getOptionValue('mobile_icon_color') !== '') {
			$mobile_icon_styles['color'] = hoshi_mikado_options()->getOptionValue('mobile_icon_color');
		}

		if(hoshi_mikado_options()->getOptionValue('mobile_icon_size') !== '') {
			$mobile_icon_styles['font-size'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('mobile_icon_size')).'px';
		}

		echo hoshi_mikado_dynamic_css('.mkd-mobile-header .mkd-mobile-menu-opener a', $mobile_icon_styles);

		if(hoshi_mikado_options()->getOptionValue('mobile_icon_hover_color') !== '') {
			echo hoshi_mikado_dynamic_css(
				'.mkd-mobile-header .mkd-mobile-menu-opener a:hover',
				array('color' => hoshi_mikado_options()->getOptionValue('mobile_icon_hover_color')));
		}
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_mobile_icon_styles');
}