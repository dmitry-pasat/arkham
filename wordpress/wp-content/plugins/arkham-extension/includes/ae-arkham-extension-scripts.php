<?php

//Add scripts
function ae_arkham_extension_scripts(){
    wp_enqueue_style('ae-main-style', plugins_url().'/arkham-extension/css/style.css');
    wp_enqueue_script('ae-jquery-script', plugins_url().'/arkham-extension/js/jquery-3.3.1.min.js');
    wp_enqueue_script('ae-main-script', plugins_url().'/arkham-extension/js/main.js');
}
add_action( 'wp_enqueue_scripts', 'ae_arkham_extension_scripts', 10 );

//Add fullPage scripts
function ae_arkham_extension_fullpage_scripts(){
    wp_enqueue_style('ae-fullpage-style', plugins_url().'/arkham-extension/css/jquery.fullPage.css');

    wp_enqueue_script('ae-fullpage-script', plugins_url().'/arkham-extension/js/jquery.fullPage.js');
}
add_action( 'wp_enqueue_scripts', 'ae_arkham_extension_fullpage_scripts', 20 );

//Add bootstrap scripts
function ae_arkham_extension_bootstrap_scripts(){
    wp_enqueue_style('ae-bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');

    wp_enqueue_script('ae-bootstrap-script', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
}
add_action( 'wp_enqueue_scripts', 'ae_arkham_extension_bootstrap_scripts', 30 );