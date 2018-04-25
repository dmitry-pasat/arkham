<?php

if(!function_exists('hoshi_mikado_archive_bg_color_styles')) {
	/**
	 * Outputs background color styles for blog archive pages
	 */
	function hoshi_mikado_archive_bg_color_styles() {
		$blog_archive_background_color = hoshi_mikado_options()->getOptionValue('blog_archive_background_color');

		if($blog_archive_background_color !== '') {
			$archive_bg_color_styles['background-color'] = $blog_archive_background_color;

			echo hoshi_mikado_dynamic_css('body.archive:not(.woocommerce) .mkd-wrapper-inner, body.archive:not(.woocommerce) .mkd-content', $archive_bg_color_styles);
		}
	}

	add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_archive_bg_color_styles');
}
