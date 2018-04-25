<?php

//top header bar
add_action('hoshi_mikado_before_page_header', 'hoshi_mikado_get_header_top');

//mobile header
add_action('hoshi_mikado_after_page_header', 'hoshi_mikado_get_mobile_header');