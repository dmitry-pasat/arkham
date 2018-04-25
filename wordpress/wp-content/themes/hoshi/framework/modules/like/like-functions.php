<?php

if ( ! function_exists('hoshi_mikado_like') ) {
	/**
	 * Returns HoshiMikadoLike instance
	 *
	 * @return HoshiMikadoLike
	 */
	function hoshi_mikado_like() {
		return HoshiMikadoLike::get_instance();
	}

}

function hoshi_mikado_get_like() {

	echo wp_kses(hoshi_mikado_like()->add_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
		'i' => array(
			'class' => true,
			'style' => true,
			'id' => true
		),
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}

if ( ! function_exists('hoshi_mikado_like_latest_posts') ) {
	/**
	 * Add like to latest post
	 *
	 * @return string
	 */
	function hoshi_mikado_like_latest_posts() {
		return hoshi_mikado_like()->add_like();
	}

}

if ( ! function_exists('hoshi_mikado_like_portfolio_list') ) {
	/**
	 * Add like to portfolio project
	 *
	 * @param $portfolio_project_id
	 * @return string
	 */
	function hoshi_mikado_like_portfolio_list($portfolio_project_id) {
		return hoshi_mikado_like()->add_like_portfolio_list($portfolio_project_id);
	}

}