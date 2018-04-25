<?php
/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if(!defined('ABSPATH')) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters('woocommerce_product_tabs', array());
$tabs['description']['icon'] = hoshi_mikado_icon_collections()->renderIcon('fa-pencil-square-o', 'font_awesome');
$tabs['reviews']['icon'] = hoshi_mikado_icon_collections()->renderIcon('fa-user', 'font_awesome');
$tabs['additional_information']['icon'] = hoshi_mikado_icon_collections()->renderIcon('fa-sticky-note-o', 'font_awesome');


if(!empty($tabs)) : ?>

	<div class="mkd-tabs woocommerce-tabs wc-tabs-wrapper mkd-horizontal">
		<ul class="mkd-tabs-nav tabs wc-tabs">
			<?php foreach($tabs as $key => $tab) : ?>
				<li class="<?php echo esc_attr($key); ?>_tab">
					<a href="#tab-<?php echo esc_attr($key); ?>"><?php if( isset($tab['icon'])) { print $tab['icon'];} ?><?php echo apply_filters('woocommerce_product_'.$key.'_tab_title', esc_html($tab['title']), $key); ?></a>
				</li>
			<?php endforeach; ?>
			<li class="mkd-tab-line mkd-type1-gradient-left-to-right-after"><span class="mkd-tab-line-inner mkd-type1-gradient-left-to-right-after"></span></li>
		</ul>
		<?php foreach($tabs as $key => $tab) : ?>
			<div class="mkd-tab-container woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr($key); ?>">
				<?php call_user_func($tab['callback'], $key, $tab); ?>
			</div>
		<?php endforeach; ?>
	</div>

<?php endif; ?>
