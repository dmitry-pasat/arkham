<?php

if(!function_exists('hoshi_mikado_get_button_html')) {
	/**
	 * Calls button shortcode with given parameters and returns it's output
	 *
	 * @param $params
	 *
	 * @return mixed|string
	 */
	function hoshi_mikado_get_button_html($params) {
		$button_html = hoshi_mikado_execute_shortcode('mkd_button', $params);
		$button_html = str_replace("\n", '', $button_html);

		return $button_html;
	}
}

if(!function_exists('hoshi_mikado_get_btn_hover_animation_types')) {
	/**
	 * @param bool $empty_val
	 *
	 * @return array
	 */
	function hoshi_mikado_get_btn_hover_animation_types($empty_val = false) {
		$types = array(
			'disable'         => 'Disable Animation',
			'fill-from-top'   => 'Fill From Top',
			'fill-from-left'  => 'Fill From Left',
			'fill-from-right' => 'Fill From Right'
		);

		if($empty_val) {
			$types = array_merge(array(
				'' => 'Default'
			), $types);
		}

		return $types;
	}
}

if(!function_exists('mkd_get_btn_types')) {
	function hoshi_mikado_get_btn_types($empty_val = false) {
		$types = array(
			'outline'       => 'Outline',
			'solid'         => 'Solid',
			'white'         => 'White',
			'transparent'	=> 'Transparent',
			'white-outline' => 'White Outline',
			'black'         => 'Black',
			'gradient'      => 'Gradient',
            'gradient-outline' => 'Gradient Outline'
		);

		if($empty_val) {
			$types = array_merge(array(
				'' => 'Default'
			), $types);
		}

		return $types;
	}
}