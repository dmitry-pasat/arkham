<?php

    function hoshi_child_scripts(){
    wp_enqueue_style('custom css', get_stylesheet_directory_uri() .'/css/custom.css');
    }
    add_action('wp_enqueue_scripts', 'hoshi_child_scripts');