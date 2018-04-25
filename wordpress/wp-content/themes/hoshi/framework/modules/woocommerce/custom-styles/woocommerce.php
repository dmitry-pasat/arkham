<?php

if(!function_exists('hoshi_mikado_woo_single_style')) {

	function hoshi_mikado_woo_single_style() {

		$styles = array();

		if(hoshi_mikado_options()->getOptionValue('hide_product_info') === 'yes') {
			$styles['display'] = 'none';
		}

		$selector = array(
			'.single.single-product .product_meta'
		);

		echo hoshi_mikado_dynamic_css($selector, $styles);

	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_woo_single_style');

}

?>