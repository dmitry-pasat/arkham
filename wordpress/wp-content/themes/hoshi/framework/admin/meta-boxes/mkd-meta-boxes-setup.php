<?php

add_action('after_setup_theme', 'hoshi_mikado_meta_boxes_map_init', 1);
function hoshi_mikado_meta_boxes_map_init() {
	/**
	 * Loades all meta-boxes by going through all folders that are placed directly in meta-boxes folder
	 * and loads map.php file in each.
	 *
	 * @see http://php.net/manual/en/function.glob.php
	 */

	do_action('hoshi_mikado_before_meta_boxes_map');

	global $hoshi_options;
	global $hoshi_Framework;
	global $hoshi_options_fontstyle;
	global $hoshi_options_fontweight;
	global $hoshi_options_texttransform;
	global $hoshi_options_fontdecoration;
	global $hoshi_options_arrows_type;

	foreach(glob(MIKADO_FRAMEWORK_ROOT_DIR.'/admin/meta-boxes/*/map.php') as $meta_box_load) {
		include_once $meta_box_load;
	}

	do_action('hoshi_mikado_meta_boxes_map');

	do_action('hoshi_mikado_after_meta_boxes_map');
}