<?php

if(!function_exists('hoshi_mikado_header_register_main_navigation')) {
	/**
	 * Registers main navigation
	 */
	function hoshi_mikado_header_register_main_navigation() {
		register_nav_menus(
			array(
				'main-navigation' => esc_html__('Main Navigation', 'hoshi'),
				'vertical-navigation' => esc_html__('Vertical Navigation', 'hoshi'),
                'divided-left-navigation' => esc_html__('Divided Left Navigation', 'hoshi'),
                'divided-right-navigation' => esc_html__('Divided Right Navigation', 'hoshi'),
			)
		);
	}

	add_action('after_setup_theme', 'hoshi_mikado_header_register_main_navigation');
}

if(!function_exists('hoshi_mikado_is_top_bar_transparent')) {
	/**
	 * Checks if top bar is transparent or not
	 *
	 * @return bool
	 */
	function hoshi_mikado_is_top_bar_transparent() {
		$top_bar_enabled = hoshi_mikado_is_top_bar_enabled();

		$top_bar_bg_color     = hoshi_mikado_options()->getOptionValue('top_bar_background_color');
		$top_bar_transparency = hoshi_mikado_options()->getOptionValue('top_bar_background_transparency');

		if($top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '') {
			return $top_bar_transparency >= 0 && $top_bar_transparency < 1;
		}

		return false;
	}
}

if(!function_exists('hoshi_mikado_is_top_bar_completely_transparent')) {
	function hoshi_mikado_is_top_bar_completely_transparent() {
		$top_bar_enabled = hoshi_mikado_is_top_bar_enabled();

		$top_bar_bg_color     = hoshi_mikado_options()->getOptionValue('top_bar_background_color');
		$top_bar_transparency = hoshi_mikado_options()->getOptionValue('top_bar_background_transparency');

		if($top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '') {
			return $top_bar_transparency === '0';
		}

		return false;
	}
}

if(!function_exists('hoshi_mikado_is_top_bar_enabled')) {
	function hoshi_mikado_is_top_bar_enabled() {
		$id = hoshi_mikado_get_page_id();

		$top_bar_enabled = hoshi_mikado_get_meta_field_intersect('top_bar', $id) === 'yes';

		return $top_bar_enabled;
	}
}

if(!function_exists('hoshi_mikado_get_top_bar_height')) {
	/**
	 * Returns top bar height
	 *
	 * @return bool|int|void
	 */
	function hoshi_mikado_get_top_bar_height() {
		if(hoshi_mikado_is_top_bar_enabled()) {
			$top_bar_height = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('top_bar_height'));
            $header_type = hoshi_mikado_get_meta_field_intersect('header_type');
            switch ($header_type){
                default:
                    $def_top_bar_height = 37;
                    break;
            }
			return $top_bar_height !== '' ? intval($top_bar_height) : $def_top_bar_height;
		}

		return 0;
	}
}

if(!function_exists('hoshi_mikado_get_top_bar_background_height')) {
    /**
     * Returns top bar background height
     *
     * @return bool|int|void
     */
    function hoshi_mikado_get_top_bar_background_height() {

        $top_bar_height = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('top_bar_height'));
        $header_height = '';

        if($top_bar_height == ''){
            $top_bar_height = 47;
        }
        if($header_height == ''){
            $header_height = 85;
        }

        $top_bar_background_height = round($top_bar_height) + round($header_height / 2);
        return $top_bar_background_height;
    }
}

if(!function_exists('hoshi_mikado_get_sticky_header_height')) {
	/**
	 * Returns top sticky header height
	 *
	 * @return bool|int|void
	 */
	function hoshi_mikado_get_sticky_header_height() {
		//sticky menu height, needed only for sticky header on scroll up
		if(hoshi_mikado_get_meta_field_intersect('header_type') !== 'header-vertical' &&
		   in_array(hoshi_mikado_get_meta_field_intersect('header_behaviour'), array('sticky-header-on-scroll-up'))
		) {

			$sticky_header_height = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('sticky_header_height'));

			return $sticky_header_height !== '' ? intval($sticky_header_height) : 60;
		}

		return 0;

	}
}

if(!function_exists('hoshi_mikado_get_sticky_header_height_of_complete_transparency')) {
	/**
	 * Returns top sticky header height it is fully transparent. used in anchor logic
	 *
	 * @return bool|int|void
	 */
	function hoshi_mikado_get_sticky_header_height_of_complete_transparency() {

		if(hoshi_mikado_options()->getOptionValue('header_type') !== 'header-vertical') {
			if(hoshi_mikado_options()->getOptionValue('sticky_header_transparency') === '0') {
				$stickyHeaderTransparent = hoshi_mikado_options()->getOptionValue('sticky_header_grid_background_color') !== '' &&
				                           hoshi_mikado_options()->getOptionValue('sticky_header_grid_transparency') === '0';
			} else {
				$stickyHeaderTransparent = hoshi_mikado_options()->getOptionValue('sticky_header_background_color') !== '' &&
				                           hoshi_mikado_options()->getOptionValue('sticky_header_transparency') === '0';
			}

			if($stickyHeaderTransparent) {
				return 0;
			} else {
				$sticky_header_height = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('sticky_header_height'));

				return $sticky_header_height !== '' ? intval($sticky_header_height) : 60;
			}
		}

		return 0;
	}
}

if(!function_exists('hoshi_mikado_get_sticky_scroll_amount')) {
	/**
	 * Returns top sticky scroll amount
	 *
	 * @return bool|int|void
	 */
	function hoshi_mikado_get_sticky_scroll_amount() {

		//sticky menu scroll amount
		if(hoshi_mikado_get_meta_field_intersect('header_type') !== 'header-vertical' &&
		   in_array(hoshi_mikado_get_meta_field_intersect('header_behaviour'), array(
			   'sticky-header-on-scroll-up',
			   'sticky-header-on-scroll-down-up'
		   ))
		) {

			$sticky_scroll_amount = hoshi_mikado_filter_px(hoshi_mikado_get_meta_field_intersect('scroll_amount_for_sticky'));

			return $sticky_scroll_amount !== '' ? intval($sticky_scroll_amount) : 0;
		}

		return 0;

	}
}