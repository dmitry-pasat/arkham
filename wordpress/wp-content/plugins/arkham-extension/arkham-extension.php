<?php
/**
 * Plugin name: Arkham Extension
 * Description: Ads a quick contact functionality. Visual Composer Element
 * Version: 1.0
 * Author: Dmitry Pasat
 */

//exit if accesed directly
if(!defined('ABSPATH')){
    exit;
}

//Global Options vVariable
$ae_options = get_option('ae_settings');

//Load Arkham Extension Scripts
require_once(plugin_dir_path(__FILE__).'/includes/ae-arkham-extension-scripts.php');

//Load Quick Contact Content
require_once(plugin_dir_path(__FILE__).'/includes/ae-quick-contact-content.php');

//Load Settings
if(is_admin()){
    require_once(plugin_dir_path(__FILE__).'/includes/ae-quick-contact-settings.php');
}

// Before VC Init
add_action( 'vc_before_init', 'ae_vc_before_init_actions' );


function ae_vc_before_init_actions() {

    // Require new custom Element
    require_once( plugin_dir_path(__FILE__).'/includes/ae-full-page-block.php' );
}

// Before VC Init
add_action( 'vc_before_init', 'ae_vc_before_init_item_actions' );

function ae_vc_before_init_item_actions() {

    // Require new custom Element
    require_once( plugin_dir_path(__FILE__).'/includes/ae-full-page-block-item.php' );
}


/*
Portfolio Section
*/

$ae_portfolio_options = get_option('ae_portfolio_settings');

//Load Portfolio Section Content
require_once(plugin_dir_path(__FILE__).'/includes/ae-portfolio-section-content.php');

//Load Portfolio Section Settings
if(is_admin()){
    require_once(plugin_dir_path(__FILE__).'/includes/ae-portfolio-section-all.php');
    require_once(plugin_dir_path(__FILE__).'/includes/ae-portfolio-section-add.php');
    require_once(plugin_dir_path(__FILE__).'/includes/ae-portfolio-section-settings.php');
}

// Before VC Init
add_action( 'vc_before_init', 'ae_before_init_portfolio_actions' );

function ae_before_init_portfolio_actions() {
    // Require new custom Element
    require_once( plugin_dir_path(__FILE__) .'/includes/ae-portfolio-section-element.php' );
}

