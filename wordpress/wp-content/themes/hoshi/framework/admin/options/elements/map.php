<?php

if(!function_exists('hoshi_mikado_load_elements_map')) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function hoshi_mikado_load_elements_map() {

		hoshi_mikado_add_admin_page(
			array(
				'slug'  => '_elements_page',
				'title' => esc_html__('Elements', 'hoshi'),
				'icon'  => 'icon_star_alt '
			)
		);

		do_action('hoshi_mikado_options_elements_map');

	}

	add_action('hoshi_mikado_options_map', 'hoshi_mikado_load_elements_map');

}