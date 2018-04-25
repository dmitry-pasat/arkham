<?php

if(!function_exists('hoshi_mikado_header_class')) {
	/**
	 * Function that adds class to header based on theme options
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added header class
	 */
	function hoshi_mikado_header_class($classes) {
		$header_type = hoshi_mikado_get_meta_field_intersect('header_type', hoshi_mikado_get_page_id());

		$classes[] = 'mkd-'.$header_type;

		return $classes;
	}

	add_filter('body_class', 'hoshi_mikado_header_class');
}

if(!function_exists('hoshi_mikado_header_behaviour_class')) {
	/**
	 * Function that adds behaviour class to header based on theme options
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added behaviour class
	 */
	function hoshi_mikado_header_behaviour_class($classes) {
        $id = hoshi_mikado_get_page_id();
        $header_behaviour = hoshi_mikado_get_meta_field_intersect('header_behaviour', $id);

		$classes[] = 'mkd-'.$header_behaviour;

		return $classes;
	}

	add_filter('body_class', 'hoshi_mikado_header_behaviour_class');
}

if(!function_exists('hoshi_mikado_mobile_header_class')) {
	/**
	 * @param $classes
	 *
	 * @return array
	 */
	function hoshi_mikado_mobile_header_class($classes) {
		$classes[] = 'mkd-default-mobile-header';

		$classes[] = 'mkd-sticky-up-mobile-header';

		return $classes;
	}

	add_filter('body_class', 'hoshi_mikado_mobile_header_class');
}

if(!function_exists('hoshi_mikado_header_class_first_level_bg_color')) {
	/**
	 * Function that adds first level menu background color class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added first level menu background color class
	 */
	function hoshi_mikado_header_class_first_level_bg_color($classes) {

		//check if first level hover background color is set
		if(hoshi_mikado_options()->getOptionValue('menu_hover_background_color') !== '') {
			$classes[] = 'mkd-menu-item-first-level-bg-color';
		}

		return $classes;
	}

	add_filter('body_class', 'hoshi_mikado_header_class_first_level_bg_color');
}

if(!function_exists('hoshi_mikado_menu_dropdown_appearance')) {
	/**
	 * Function that adds menu dropdown appearance class to body tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added menu dropdown appearance class
	 */
	function hoshi_mikado_menu_dropdown_appearance($classes) {

		if(hoshi_mikado_options()->getOptionValue('menu_dropdown_appearance') !== 'default') {
			$classes[] = 'mkd-'.hoshi_mikado_options()->getOptionValue('menu_dropdown_appearance');
		}

		return $classes;
	}

	add_filter('body_class', 'hoshi_mikado_menu_dropdown_appearance');
}

if(!function_exists('hoshi_mikado_header_skin_class')) {

	/**
	 * @param $classes
	 *
	 * @return array
	 */
	function hoshi_mikado_header_skin_class($classes) {

		$id = hoshi_mikado_get_page_id();

		if(($meta_temp = get_post_meta($id, 'mkd_header_style_meta', true)) !== '') {
			$classes[] = 'mkd-'.$meta_temp;
		} else if(hoshi_mikado_options()->getOptionValue('header_style') !== '') {
			$classes[] = 'mkd-'.hoshi_mikado_options()->getOptionValue('header_style');
		}

		return $classes;

	}

	add_filter('body_class', 'hoshi_mikado_header_skin_class');

}

if(!function_exists('hoshi_mikado_header_scroll_style_class')) {

	/**
	 * @param $classes
	 *
	 * @return array
	 */
	function hoshi_mikado_header_scroll_style_class($classes) {

		if(hoshi_mikado_get_meta_field_intersect('enable_header_style_on_scroll') == 'yes') {
			$classes[] = 'mkd-header-style-on-scroll';
		}

		return $classes;

	}

	add_filter('body_class', 'hoshi_mikado_header_scroll_style_class');

}

if(!function_exists('hoshi_mikado_header_global_js_var')) {
	/**
	 * @param $global_variables
	 *
	 * @return mixed
	 */
	function hoshi_mikado_header_global_js_var($global_variables) {

		$global_variables['mkdTopBarHeight']                   = hoshi_mikado_get_top_bar_height();
		$global_variables['mkdStickyHeaderHeight']             = hoshi_mikado_get_sticky_header_height();
		$global_variables['mkdStickyHeaderTransparencyHeight'] = hoshi_mikado_get_sticky_header_height_of_complete_transparency();

		return $global_variables;
	}

	add_filter('hoshi_mikado_js_global_variables', 'hoshi_mikado_header_global_js_var');
}

if(!function_exists('hoshi_mikado_header_per_page_js_var')) {
	/**
	 * @param $perPageVars
	 *
	 * @return mixed
	 */
	function hoshi_mikado_header_per_page_js_var($perPageVars) {
		$id = hoshi_mikado_get_page_id();

		$perPageVars['mkdStickyScrollAmount']           = hoshi_mikado_get_sticky_scroll_amount();
		$perPageVars['mkdStickyScrollAmountFullScreen'] = get_post_meta($id, 'mkd_scroll_amount_for_sticky_fullscreen_meta', true) === 'yes';

		return $perPageVars;
	}

	add_filter('hoshi_mikado_per_page_js_vars', 'hoshi_mikado_header_per_page_js_var');
}

if(!function_exists('hoshi_mikado_full_width_wide_menu_class')) {
	/**
	 * @param $classes
	 *
	 * @return array
	 */
	function hoshi_mikado_full_width_wide_menu_class($classes) {
		if(hoshi_mikado_options()->getOptionValue('enable_wide_menu_background') === 'yes') {
			$classes[] = 'mkd-full-width-wide-menu';
		}

		return $classes;
	}

	add_filter('body_class', 'hoshi_mikado_full_width_wide_menu_class');
}

if(!function_exists('hoshi_mikado_header_bottom_border_class')) {
	/**
	 * @param $classes
	 *
	 * @return array
	 */
	function hoshi_mikado_header_bottom_border_class($classes) {
		$id = hoshi_mikado_get_page_id();

		$disable_border_standard = hoshi_mikado_get_meta_field_intersect('menu_area_border_header_standard',$id) == 'no';
		if($disable_border_standard) {
			$classes[] = 'mkd-header-standard-border-disable';
		}

        $disable_grid_border_standard = hoshi_mikado_get_meta_field_intersect('menu_area_in_grid_border_header_standard',$id) == 'no';
        if($disable_grid_border_standard) {
            $classes[] = 'mkd-header-standard-in-grid-border-disable';
        }

        $disable_border_minimal = hoshi_mikado_get_meta_field_intersect('menu_area_border_header_minimal',$id) == 'no';
        if($disable_border_minimal) {
            $classes[] = 'mkd-header-minimal-border-disable';
        }

        $disable_grid_border_minimal = hoshi_mikado_get_meta_field_intersect('menu_area_in_grid_border_header_minimal',$id) == 'no';
        if($disable_grid_border_minimal) {
            $classes[] = 'mkd-header-minimal-in-grid-border-disable';
        }

        $disable_border_divided = hoshi_mikado_get_meta_field_intersect('menu_area_border_header_divided',$id) == 'no';
        if($disable_border_divided) {
            $classes[] = 'mkd-header-divided-border-disable';
        }

        $disable_border_centered = hoshi_mikado_get_meta_field_intersect('menu_area_border_header_centered',$id) == 'no';
        if($disable_border_centered) {
            $classes[] = 'mkd-header-centered-border-disable';
        }

        $disable_grid_border_centered = hoshi_mikado_get_meta_field_intersect('menu_area_in_grid_border_header_centered',$id) == 'no';
        if($disable_grid_border_centered) {
            $classes[] = 'mkd-header-centered-in-grid-border-disable';
        }

		return $classes;
	}

	add_filter('body_class', 'hoshi_mikado_header_bottom_border_class');
}

if(!function_exists('hoshi_mikado_get_top_bar_styles')) {
	/**
	 * Sets per page styles for header top bar
	 *
	 * @param $styles
	 *
	 * @return array
	 */
	function hoshi_mikado_get_top_bar_styles($styles) {
		$id            = hoshi_mikado_get_page_id();
		$class_prefix  = hoshi_mikado_get_unique_page_class();
		$top_bar_style = array();

		$top_bar_bg_color = get_post_meta($id, 'mkd_top_bar_background_color_meta', true);

		$top_bar_selector = array(
			$class_prefix.' .mkd-top-bar, '.$class_prefix.' .mkd-top-bar-background'
		);

		if($top_bar_bg_color !== '') {
			$top_bar_transparency = get_post_meta($id, 'mkd_top_bar_background_transparency_meta', true);
			if($top_bar_transparency === '') {
				$top_bar_transparency = 1;
			}

			$top_bar_style['background'] = hoshi_mikado_rgba_color($top_bar_bg_color, $top_bar_transparency);
		}

        if(get_post_meta($id, 'mkd_top_bar_border_meta', true) == 'no'){
            $top_bar_style['border-bottom'] = '0';
        }else if(get_post_meta($id, 'mkd_top_bar_border_meta', true) == 'yes' && get_post_meta($id, 'mkd_top_bar_border_color_meta', true) !== ''){
            $top_bar_style['border-bottom'] = '1px solid '.get_post_meta($id, 'mkd_top_bar_border_color_meta', true);
        }


		$styles[] = hoshi_mikado_dynamic_css($top_bar_selector, $top_bar_style);

		return $styles;
	}

	add_filter('hoshi_mikado_add_page_custom_style', 'hoshi_mikado_get_top_bar_styles');
}

if(!function_exists('hoshi_mikado_top_bar_skin_class')) {
	/**
	 * @param $classes
	 *
	 * @return array
	 */
	function hoshi_mikado_top_bar_skin_class($classes) {
		$id           = hoshi_mikado_get_page_id();
		$top_bar_skin = get_post_meta($id, 'mkd_top_bar_skin_meta', true);

		if($top_bar_skin !== '') {
			$classes[] = 'mkd-top-bar-'.$top_bar_skin;
		}

		return $classes;
	}

	add_filter('body_class', 'hoshi_mikado_top_bar_skin_class');
}