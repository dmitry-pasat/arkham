<?php

if(!function_exists('hoshi_mikado_vc_grid_elements_enabled')) {

	/**
	 * Function that checks if Visual Composer Grid Elements are enabled
	 *
	 * @return bool
	 */
	function hoshi_mikado_vc_grid_elements_enabled() {

		return (hoshi_mikado_options()->getOptionValue('enable_grid_elements') == 'yes') ? true : false;

	}
}

if(!function_exists('hoshi_mikado_visual_composer_grid_elements')) {

	/**
	 * Removes Visual Composer Grid Elements post type if VC Grid option disabled
	 * and enables Visual Composer Grid Elements post type
	 * if VC Grid option enabled
	 */
	function hoshi_mikado_visual_composer_grid_elements() {

		if(!hoshi_mikado_vc_grid_elements_enabled()) {
			remove_action('init', 'vc_grid_item_editor_create_post_type');
		}
	}

	add_action('vc_after_init', 'hoshi_mikado_visual_composer_grid_elements', 12);
}

if(!function_exists('hoshi_mikado_grid_elements_ajax_disable')) {
	/**
	 * Function that disables ajax transitions if grid elements are enabled in theme options
	 */
	function hoshi_mikado_grid_elements_ajax_disable() {
		global $hoshi_options;

		if(hoshi_mikado_vc_grid_elements_enabled()) {
			$hoshi_options['page_transitions'] = '0';
		}
	}

	add_action('wp', 'hoshi_mikado_grid_elements_ajax_disable');
}


if(!function_exists('hoshi_mikado_get_vc_version')) {
	/**
	 * Return Visual Composer version string
	 *
	 * @return bool|string
	 */
	function hoshi_mikado_get_vc_version() {
		if(hoshi_mikado_visual_composer_installed()) {
			return WPB_VC_VERSION;
		}

		return false;
	}
}