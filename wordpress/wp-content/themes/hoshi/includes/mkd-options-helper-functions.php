<?php

if(!function_exists('hoshi_mikado_is_responsive_on')) {
	/**
	 * Checks whether responsive mode is enabled in theme options
	 * @return bool
	 */
	function hoshi_mikado_is_responsive_on() {
		return hoshi_mikado_options()->getOptionValue('responsiveness') !== 'no';
	}
}