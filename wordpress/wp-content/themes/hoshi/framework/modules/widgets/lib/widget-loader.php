<?php

if(!function_exists('hoshi_mikado_register_widgets')) {

	function hoshi_mikado_register_widgets() {

		$widgets = array(
			'HoshiMikadoLatestPosts',
			'HoshiMikadoSearchOpener',
			'HoshiMikadoSideAreaOpener',
			'HoshiMikadoStickySidebar',
			'HoshiMikadoSocialIconWidget',
			'HoshiMikadoSeparatorWidget',
			'HoshiMikadoCallToActionButton',
			'HoshiMikadoHtmlWidget',
			'HoshiMikadoPostCategories'
		);

		foreach($widgets as $widget) {
			register_widget($widget);
		}
	}
}

add_action('widgets_init', 'hoshi_mikado_register_widgets');