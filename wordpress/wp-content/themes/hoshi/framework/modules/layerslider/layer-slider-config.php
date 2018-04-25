<?php
if(!function_exists('hoshi_mikado_layerslider_overrides')) {
	/**
	 * Disables Layer Slider auto update box
	 */
	function hoshi_mikado_layerslider_overrides() {
		$GLOBALS['lsAutoUpdateBox'] = false;
	}

	add_action('layerslider_ready', 'hoshi_mikado_layerslider_overrides');
}
?>