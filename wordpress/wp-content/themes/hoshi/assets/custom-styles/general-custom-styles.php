<?php
if(!function_exists('hoshi_mikado_design_styles')) {
    /**
     * Generates general custom styles
     */
    function hoshi_mikado_design_styles() {

        $preload_background_styles = array();

        if(hoshi_mikado_options()->getOptionValue('preload_pattern_image') !== "") {
            $preload_background_styles['background-image'] = 'url('.hoshi_mikado_options()->getOptionValue('preload_pattern_image').') !important';
        } else {
            $preload_background_styles['background-image'] = 'url('.esc_url(MIKADO_ASSETS_ROOT."/img/preload_pattern.png").') !important';
        }

        echo hoshi_mikado_dynamic_css('.mkd-preload-background', $preload_background_styles);

        if(hoshi_mikado_options()->getOptionValue('google_fonts')) {
            $font_family = hoshi_mikado_options()->getOptionValue('google_fonts');
            if(hoshi_mikado_is_font_option_valid($font_family)) {
                echo hoshi_mikado_dynamic_css('body', array('font-family' => hoshi_mikado_get_font_option_val($font_family)));
            }
        }

        if(hoshi_mikado_options()->getOptionValue('first_color') !== "") {
            $color_selector = array(
                'a',
				'h1 a:hover',
				'h2 a:hover',
				'h3 a:hover',
				'h4 a:hover',
				'h5 a:hover',
				'h6 a:hover',
				'p a',
				'.mkd-comment-holder .mkd-comment-reply-holder a.comment-reply-link:before',
				'.mkd-comment-holder .mkd-comment-reply-holder .mkd-comment-date-icon',
				'.mkd-pagination li.active a',
				'.mkd-pagination li.active span',
				'.mkd-like.liked',
				'.wpb_widgetised_column .widget.widget_categories ul li a:hover',
				'.wpb_widgetised_column .widget.widget_nav_menu .current-menu-item>a',
				'.wpb_widgetised_column .widget.widget_nav_menu ul.menu li a:hover',
				'.wpb_widgetised_column .widget.widget_recent_comments ul li a:hover',
				'.wpb_widgetised_column .widget.widget_rss ul li a:hover',
				'aside.mkd-sidebar .widget.widget_categories ul li a:hover',
				'aside.mkd-sidebar .widget.widget_nav_menu .current-menu-item>a',
				'aside.mkd-sidebar .widget.widget_nav_menu ul.menu li a:hover',
				'aside.mkd-sidebar .widget.widget_recent_comments ul li a:hover',
				'aside.mkd-sidebar .widget.widget_rss ul li a:hover',
				'.wpb_widgetised_column .widget.widget_meta ul li a:hover',
				'.wpb_widgetised_column .widget.widget_pages ul li a:hover',
				'aside.mkd-sidebar .widget.widget_meta ul li a:hover',
				'aside.mkd-sidebar .widget.widget_pages ul li a:hover',
				'.wpb_widgetised_column .widget.widget_archive ul li:hover a',
				'.wpb_widgetised_column .widget.widget_archive ul li:hover:before',
				'.wpb_widgetised_column .widget.widget_product_tag_cloud .tagcloud a:hover',
				'.wpb_widgetised_column .widget.widget_tag_cloud .tagcloud a:hover',
				'aside.mkd-sidebar .widget.widget_archive ul li:hover a',
				'aside.mkd-sidebar .widget.widget_archive ul li:hover:before',
				'aside.mkd-sidebar .widget.widget_product_tag_cloud .tagcloud a:hover',
				'aside.mkd-sidebar .widget.widget_tag_cloud .tagcloud a:hover',
				'.wpb_widgetised_column .widget.widget_archive ul li:hover',
				'aside.mkd-sidebar .widget.widget_archive ul li:hover',
				'.mkd-main-menu ul .mkd-menu-featured-icon',
				'.mkd-drop-down .second .inner ul li ul li:hover>a',
				'.mkd-drop-down .second .inner ul li.current-menu-item>a',
				'.mkd-drop-down .second .inner ul li.sub ul li:hover>a',
				'.mkd-drop-down .second .inner>ul>li:hover>a',
				'.mkd-drop-down .wide .second .inner ul li.sub .flexslider ul li a:hover',
				'.mkd-drop-down .wide .second ul li .flexslider ul li a:hover',
				'.mkd-drop-down .wide .second .inner ul li.sub .flexslider.widget_flexslider .menu_recent_post_text a:hover',
				'.mkd-mobile-header .mkd-mobile-nav a:hover',
				'.mkd-mobile-header .mkd-mobile-nav h4:hover',
				'.mkd-mobile-header .mkd-mobile-menu-opener a:hover',
				'footer .mkd-footer-top-holder .widget.widget_archive ul li a:hover',
				'footer .mkd-footer-top-holder .widget.widget_archive ul li:hover',
				'footer .mkd-footer-top-holder .widget.widget_archive ul li:hover a',
				'footer .mkd-footer-top-holder .widget.widget_archive ul li:hover:before',
				'footer .mkd-footer-top-holder .widget.widget_pages ul li a:hover',
				'footer .mkd-footer-top-holder .widget ul li a:hover',
				'footer .mkd-footer-top-holder .widget.widget_categories ul li a:hover',
				'footer .mkd-footer-top-holder .widget.widget_product_tag_cloud .tagcloud a:hover',
				'footer .mkd-footer-top-holder .widget.widget_tag_cloud .tagcloud a:hover',
				'footer .mkd-footer-bottom-holder .widget.widget_nav_menu ul li a:hover',
				'.mkd-side-menu .mkd-working-hours-holder .mkd-wh-item:last-child .mkd-wh-hours .mkd-wh-from',
				'.mkd-search-cover .mkd-search-close a:hover',
				'.mkd-portfolio-single-holder .mkd-portfolio-info-item h6',
				'.mkd-team.main-info-below-image.mkd-team-boxed .mkd-team-social-wrapp span a:hover',
				'.mkd-team.main-info-below-image .mkd-team-social-wrapp a:hover',
				'.mkd-countdown-one .countdown-amount',
				'.mkd-message .mkd-message-inner a.mkd-close i:hover',
				'.mkd-ordered-list ol>li:before',
				'.mkd-icon-list-item .mkd-icon-list-icon-holder-inner .font_elegant',
				'.mkd-icon-list-item .mkd-icon-list-icon-holder-inner i',
				'.mkd-icon-list-item .mkd-icon-list-icon-holder-inner span',
				'.mkd-top-bar .mkd-icon-list-item .mkd-icon-list-icon-holder-inner .font_elegant',
				'.mkd-top-bar .mkd-icon-list-item .mkd-icon-list-icon-holder-inner i',
				'.mkd-blog-slider-holder .mkd-post-content .mkd-categories-date .mkd-post-info-author a:hover',
				'.mkd-blog-slider-holder.mkd-blog-slider-two .mkd-post-info-comments:hover',
				'.mkd-testimonials .mkd-testimonials-job',
				'.mkd-testimonial-content.testimonials-slider .mkd-testimonials-job.light',
				'.mkd-accordion-holder .mkd-title-holder span.mkd-accordion-number',
				'.mkd-blog-list-holder .mkd-item-info-section>div>a:hover',
				'.mkd-blog-list-holder.mkd-grid-type-1 .mkd-item-info-section i',
				'.mkd-blog-list-holder.mkd-grid-type-2 .mkd-post-item-author-holder a:hover',
				'.mkd-blog-list-holder.mkd-masonry .mkd-post-item-author-holder a:hover',
				'.mkd-blog-list-holder.mkd-image-in-box .mkd-item-title a:hover',
				'.mkd-btn.mkd-btn-outline',
				'.post-password-form input.mkd-btn-outline[type=submit]',
				'.woocommerce .mkd-btn-outline.button',
				'input.mkd-btn-outline.wpcf7-form-control.wpcf7-submit',
				'blockquote .mkd-icon-quotations-holder',
				'.mkd-video-button-play .mkd-video-button-wrapper',
				'.mkd-dropcaps',
				'.mkd-social-share-holder.mkd-list li a:hover',
				'.mkd-section-title-holder .mkd-section-title .mkd-section-highlighted',
				'.mkd-icon-progress-bar .mkd-ipb-active',
				'.mkd-fullscreen-menu-opener',
				'nav.mkd-fullscreen-menu ul li a:hover span',
				'.mkd-blog-holder.mkd-blog-type-simple article.format-link .mkd-post-content .mkd-post-text .mkd-post-info-date span.mkd-post-info-date-icon i',
				'.mkd-blog-holder article.sticky .mkd-post-title a',
				'.mkd-blog-holder article .mkd-post-info .mkd-like.liked i',
				'.mkd-blog-holder article .mkd-post-info a:hover',
				'.mkd-blog-holder article .mkd-post-info a:hover span',
				'.mkd-blog-holder article .mkd-post-info i',
				'.mkd-blog-holder article .mkd-post-info span[class*=icon]',
				'.single .mkd-author-description .mkd-author-social-holder .mkd-author-social-facebook:hover',
				'.single .mkd-author-description .mkd-author-social-holder .mkd-author-social-google-plus:hover',
				'.single .mkd-author-description .mkd-author-social-holder .mkd-author-social-instagram:hover',
				'.single .mkd-author-description .mkd-author-social-holder .mkd-author-social-linkedin:hover',
				'.single .mkd-author-description .mkd-author-social-holder .mkd-author-social-pinterest:hover',
				'.single .mkd-author-description .mkd-author-social-holder .mkd-author-social-tumblr:hover',
				'.single .mkd-author-description .mkd-author-social-holder .mkd-author-social-twitter:hover',
				'.single .mkd-author-description .mkd-author-description-text-holder h6.mkd-author-position',
				'.single .mkd-single-tags-holder .mkd-tags a:hover',
				'.single .mkd-blog-single-navigation .mkd-blog-single-prev .mkd-single-prev-title:hover',
				'.single .mkd-blog-single-navigation .mkd-blog-single-next .mkd-single-next-title:hover',
				'.mkd-post-content .mkd-post-info-category.mkd-post-info-item a',
				'article .mkd-category span.icon_tags',
				'.woocommerce-pagination .page-numbers li a:hover',
				'.woocommerce-pagination .page-numbers li span.current',
				'.woocommerce-pagination .page-numbers li span.current:hover',
				'.woocommerce-pagination .page-numbers li span:hover',
				'.mkd-woocommerce-page .select2-results .select2-highlighted',
				'.mkd-woocommerce-page .price',
				'.woocommerce .price',
				'.mkd-woocommerce-page .price ins',
				'.woocommerce .price ins',
				'.mkd-woocommerce-page .star-rating:before',
				'.woocommerce .star-rating:before',
				'.mkd-woocommerce-page .star-rating span:before',
				'.woocommerce .star-rating span:before',
				'.single-product .mkd-single-product-summary .price .amount',
				'.single-product .mkd-single-product-summary .price ins .amount',
				'.single-product .mkd-single-product-summary form.cart .price ins .amount',
				'.mkd-woocommerce-with-sidebar aside.mkd-sidebar .widget .product-categories a:hover',
				'.mkd-woocommerce-with-sidebar aside.mkd-sidebar .widget.widget_layered_nav a:hover',
				'.wpb_widgetised_column .widget .product-categories a:hover',
				'.wpb_widgetised_column .widget.widget_layered_nav a:hover',
				'.mkd-woocommerce-with-sidebar aside.mkd-sidebar .widget.widget_product_categories .product-categories li a:hover',
				'.wpb_widgetised_column .widget.widget_product_categories .product-categories li a:hover',
				'.mkd-woocommerce-with-sidebar aside.mkd-sidebar .widget .product_list_widget li .mkd-woo-product-widget-content .mkd-woo-product-widget-title:hover .product-title',
				'.wpb_widgetised_column .widget .product_list_widget li .mkd-woo-product-widget-content .mkd-woo-product-widget-title:hover .product-title',
				'.mkd-shopping-cart-dropdown ul li a:hover',
				'.mkd-shopping-cart-dropdown .mkd-item-info-holder .mkd-item-left a:hover',
				'.mkd-shopping-cart-dropdown .mkd-item-info-holder .mkd-item-left .mkd-quantity',
				'.mkd-shopping-cart-dropdown .mkd-item-info-holder .mkd-item-right .remove:hover',
				'.mkd-shopping-cart-dropdown span.mkd-total span',
				'.mkd-shopping-cart-dropdown span.mkd-quantity',
				'.woocommerce-cart .woocommerce form:not(.woocommerce-shipping-calculator) .product-name a:hover',
				'.woocommerce-cart .woocommerce .cart-collaterals .mkd-shipping-calculator .woocommerce-shipping-calculator>p a:hover',
            );

            $color_important_selector = array(
                'input.wpcf7-form-control.wpcf7-submit.mkd-contact2:not(.mkd-btn-custom-hover-color):not(.mkd-btn-transparent):hover',
				'.mkd-btn.mkd-btn-hover-outline:not(.mkd-btn-custom-hover-color):not(.mkd-btn-transparent):hover',
				'.post-password-form input[type=submit]:not(.mkd-btn-custom-hover-color):not(.mkd-btn-transparent):hover',
				'.woocommerce .button:not(.mkd-btn-custom-hover-color):not(.mkd-btn-transparent):hover',
				'input.wpcf7-form-control.wpcf7-submit:not(.mkd-btn-custom-hover-color):not(.mkd-btn-transparent):hover',
				'.mkd-btn.mkd-btn-hover-white:not(.mkd-btn-custom-hover-color):hover',
				'.post-password-form input.mkd-btn-hover-white[type=submit]:not(.mkd-btn-custom-hover-color):hover',
				'.woocommerce .mkd-btn-hover-white.button:not(.mkd-btn-custom-hover-color):hover',
				'input.mkd-btn-hover-white.wpcf7-form-control.wpcf7-submit:not(.mkd-btn-custom-hover-color):hover',
				'.mkd-twitter-slider.mkd-nav-dark .slick-slider .slick-dots li.slick-active button:before',
				'.mkd-team-slider-holder.mkd-nav-light .slick-slider .slick-dots li.slick-active button:before',
				'.mkd-team-slider-holder .slick-dots li.slick-active button:before',
				'.mkd-light-header .mkd-menu-area .mkd-main-menu-widget-area .mkd-btn.checkout:hover span.mkd-btn-text',
            );

            $background_color_selector = array(
                '.mkd-type1-gradient-left-to-right',
				'.mkd-type1-gradient-left-to-right-after:after',
				'.mkd-type1-gradient-bottom-to-top',
				'.mkd-type1-gradient-bottom-to-top-after:after',
				'.mkd-type1-gradient-left-bottom-to-right-top',
				'.mkd-type1-gradient-diagonal',
				'.mkd-type1-gradient-left-to-right-2x',
				'.mkd-type1-gradient-diagonal-2x',
				'.mkd-type1-gradient-left-to-right-text i',
				'.mkd-type1-gradient-left-to-right-text i:before',
				'.mkd-type1-gradient-left-to-right-text span',
				'.mkd-type1-gradient-bottom-to-top-text i',
				'.mkd-type1-gradient-bottom-to-top-text i:before',
				'.mkd-type1-gradient-bottom-to-top-text span',
				'.mkd-type1-gradient-diagonal-text i',
				'.mkd-type1-gradient-diagonal-text i:before',
				'.mkd-type1-gradient-diagonal-text span',
				'.mkd-type2-gradient-left-to-right',
				'.mkd-type2-gradient-bottom-to-top',
				'.mkd-type2-gradient-diagonal',
				'.mkd-type2-gradient-bottom-to-top-after:after',
				'.mkd-type2-gradient-left-bottom-to-right-top',
				'.mkd-type2-gradient-left-to-right-2x',
				'.mkd-type2-gradient-diagonal-2x',
				'.mkd-type2-gradient-left-to-right-text i',
				'.mkd-type2-gradient-left-to-right-text i:before',
				'.mkd-type2-gradient-left-to-right-text span',
				'.mkd-type2-gradient-diagonal-text i',
				'.mkd-type2-gradient-diagonal-text i:before',
				'.mkd-type2-gradient-diagonal-text span',
				'.mkd-type2-gradient-bottom-to-top-text i',
				'.mkd-type2-gradient-bottom-to-top-text i:before',
				'.mkd-type2-gradient-bottom-to-top-text span',
				'.mkd-st-loader .pulse',
				'.mkd-st-loader .double_pulse .double-bounce1',
				'.mkd-st-loader .double_pulse .double-bounce2',
				'.mkd-st-loader .cube',
				'.mkd-st-loader .rotating_cubes .cube1',
				'.mkd-st-loader .rotating_cubes .cube2',
				'.mkd-st-loader .stripes>div',
				'.mkd-st-loader .wave>div',
				'.mkd-st-loader .two_rotating_circles .dot1',
				'.mkd-st-loader .two_rotating_circles .dot2',
				'.mkd-st-loader .five_rotating_circles .container1>div',
				'.mkd-st-loader .five_rotating_circles .container2>div',
				'.mkd-st-loader .five_rotating_circles .container3>div',
				'.mkd-st-loader .atom .ball-1:before',
				'.mkd-st-loader .atom .ball-2:before',
				'.mkd-st-loader .atom .ball-3:before',
				'.mkd-st-loader .atom .ball-4:before',
				'.mkd-st-loader .clock .ball:before',
				'.mkd-st-loader .mitosis .ball',
				'.mkd-st-loader .lines .line1',
				'.mkd-st-loader .lines .line2',
				'.mkd-st-loader .lines .line3',
				'.mkd-st-loader .lines .line4',
				'.mkd-st-loader .fussion .ball',
				'.mkd-st-loader .fussion .ball-1',
				'.mkd-st-loader .fussion .ball-2',
				'.mkd-st-loader .fussion .ball-3',
				'.mkd-st-loader .fussion .ball-4',
				'.mkd-st-loader .wave_circles .ball',
				'.mkd-st-loader .pulse_circles .ball',
				'.mkd-grid-row-no-gutter.mkd-newsletter input.wpcf7-form-control.wpcf7-submit',
				'.mkd-page-not-found h2',
				'.mkd-top-bar',
				'footer .mkd-grid-row-no-gutter.mkd-newsletter input.wpcf7-form-control.wpcf7-submit',
				'.mkd-search-fade .mkd-fullscreen-search-holder .mkd-fullscreen-search-table',
				'.mkd-team .mkd-team-hover',
				'.mkd-team.main-info-below-image .mkd-team-image:after',
				'.mkd-counter-holder.mkd-counter-gradient-icon .mkd-counter-icon i',
				'.mkd-counter-holder.mkd-counter-gradient-icon .mkd-counter-icon i:before',
				'.mkd-counter-holder.mkd-counter-gradient-icon .mkd-counter-icon span',
				'.mkd-icon-shortcode.circle',
				'.mkd-icon-shortcode.square',
				'.mkd-progress-bar .mkd-progress-content-outer .mkd-progress-content',
				'.mkd-blog-slider-holder .mkd-post-content .mkd-categories-date .mkd-post-info-author-icon',
				'.mkd-price-table.mkd-pt-active .mkd-price-table-inner .mkd-price',
				'.mkd-price-table.mkd-pt-active .mkd-price-table-inner .mkd-price sup',
				'.mkd-pie-chart-doughnut-holder .mkd-pie-legend ul li .mkd-pie-color-holder',
				'.mkd-pie-chart-pie-holder .mkd-pie-legend ul li .mkd-pie-color-holder',
				'.mkd-tabs .mkd-tab-line-inner',
				'.mkd-tabs .mkd-tab-line-inner:after',
				'.mkd-tabs .mkd-tab-line:after',
				'.mkd-accordion-holder .mkd-title-holder.ui-state-active .mkd-accordion-mark',
				'.mkd-btn.mkd-btn-solid',
				'.post-password-form input[type=submit]',
				'.woocommerce .button',
				'input.wpcf7-form-control.wpcf7-submit',
				'.mkd-btn.mkd-btn-gradient-outline',
				'.post-password-form input.mkd-btn-gradient-outline[type=submit]',
				'.woocommerce .mkd-btn-gradient-outline.button',
				'input.mkd-btn-gradient-outline.wpcf7-form-control.wpcf7-submit',
				'.mkd-btn.mkd-btn-hover-solid .mkd-btn-helper',
				'.post-password-form input.mkd-btn-hover-solid[type=submit] .mkd-btn-helper',
				'.woocommerce .mkd-btn-hover-solid.button .mkd-btn-helper',
				'input.mkd-btn-hover-solid.wpcf7-form-control.wpcf7-submit .mkd-btn-helper',
				'blockquote .mkd-blockquote-text:after',
				'.mkd-dropcaps.mkd-circle',
				'.mkd-dropcaps.mkd-square',
				'.mkd-process-holder .mkd-number-holder-inner',
				'.mkd-process-holder .mkd-number-holder-inner:after',
				'.mkd-vertical-progress-bar-holder .mkd-vpb-active-bar',
				'.mkd-team-slider-holder .mkd-team.main-info-below-image.mkd-team-flip .mkd-team-back',
				'.mkd-zooming-slider-holder .slick-dots .slick-active button',
				'.mkd-zooming-slider-holder .slick-dots li:hover button',
				'#multiscroll-nav ul li .active span',
				'.mkd-product-slider .products>li.product .mkd-btn',
				'.mkd-product-slider .products>li.product .post-password-form input[type=submit]',
				'.mkd-product-slider .products>li.product .woocommerce .button',
				'.mkd-product-slider .products>li.product input.wpcf7-form-control.wpcf7-submit',
				'.post-password-form .mkd-product-slider .products>li.product input[type=submit]',
				'.woocommerce .mkd-product-slider .products>li.product .button',
				'.mkd-product-slider .products>li.product .mkd-btn.added+a',
				'.mkd-product-slider .products>li.product .post-password-form input.added[type=submit]+a',
				'.mkd-product-slider .products>li.product .woocommerce .added.button+a',
				'.mkd-product-slider .products>li.product input.added.wpcf7-form-control.wpcf7-submit+a',
				'.post-password-form .mkd-product-slider .products>li.product input.added[type=submit]+a',
				'.woocommerce .mkd-product-slider .products>li.product .added.button+a',
				'.mkd-product-slider .mkd-product-slider-pager a.selected',
				'.widget_mkd_call_to_action_button .mkd-call-to-action-button',
				'.mkd-fullscreen-menu-holder',
				'.mkd-blog-holder.mkd-blog-type-masonry:not(.mkd-masonry-simple) .format-quote .mkd-post-content',
				'.mkd-blog-holder.mkd-blog-type-standard .format-quote .mkd-post-content .mkd-post-text',
				'.mkd-woocommerce-page .price_slider_amount button.button',
				'.woocommerce .price_slider_amount button.button',
				'.mkd-woocommerce-with-sidebar aside.mkd-sidebar .widget.widget_product_categories .product-categories li a:before',
				'.wpb_widgetised_column .widget.widget_product_categories .product-categories li a:before',
				'.mkd-woocommerce-with-sidebar aside.mkd-sidebar .widget.widget_price_filter .ui-slider-horizontal .ui-slider-range',
				'.wpb_widgetised_column .widget.widget_price_filter .ui-slider-horizontal .ui-slider-range',
				'.mkd-shopping-cart-outer .mkd-shopping-cart-header .mkd-header-cart .mkd-cart-count',
				'.mkd-shopping-cart-dropdown .mkd-cart-bottom .mkd-btns-holder .mkd-btn.mkd-btn-hover-outline.checkout',
				'.woocommerce-cart .woocommerce form:not(.woocommerce-shipping-calculator) .actions .mkd-cart-proceed-update .mkd-btn.checkout-button',
            );

            $background_color_important_selector = array(
                '.mkd-carousel-pagination .owl-dot.active span',
				'.mkd-btn.mkd-btn-hover-solid:not(.mkd-btn-custom-hover-bg):not(.mkd-btn-with-animation):hover',
				'.post-password-form input.mkd-btn-hover-solid[type=submit]:not(.mkd-btn-custom-hover-bg):not(.mkd-btn-with-animation):hover',
				'.woocommerce .mkd-btn-hover-solid.button:not(.mkd-btn-custom-hover-bg):not(.mkd-btn-with-animation):hover',
				'input.mkd-btn-hover-solid.wpcf7-form-control.wpcf7-submit:not(.mkd-btn-custom-hover-bg):not(.mkd-btn-with-animation):hover',
            );

            $border_color_selector = array(
                '.mkd-st-loader .pulse_circles .ball',
				'.mkd-btn.mkd-btn-solid',
				'.post-password-form input[type=submit]',
				'.woocommerce .button',
				'input.wpcf7-form-control.wpcf7-submit',
				'.mkd-btn.mkd-btn-outline',
				'.post-password-form input.mkd-btn-outline[type=submit]',
				'.woocommerce .mkd-btn-outline.button',
				'input.mkd-btn-outline.wpcf7-form-control.wpcf7-submit',
				'.mkd-video-button-play .mkd-video-button-wrapper',
				'.mkd-workflow .mkd-workflow-item .mkd-workflow-item-inner .mkd-workflow-text .circle',
				'.mkd-woocommerce-page ul.products .add_to_cart_button',
				'.mkd-woocommerce-page ul.products .product.outofstock .mkd-btn',
				'.mkd-woocommerce-page ul.products .product_type_external',
				'.mkd-woocommerce-page ul.products .product_type_grouped',
				'.woocommerce ul.products .add_to_cart_button',
				'.woocommerce ul.products .product.outofstock .mkd-btn',
				'.woocommerce ul.products .product_type_external',
				'.woocommerce ul.products .product_type_grouped',
				'.mkd-woocommerce-with-sidebar aside.mkd-sidebar .widget.widget_price_filter .ui-slider .ui-slider-handle',
				'.wpb_widgetised_column .widget.widget_price_filter .ui-slider .ui-slider-handle',
				'.mkd-shopping-cart-dropdown .mkd-cart-bottom .mkd-btns-holder .mkd-btn.mkd-btn-hover-outline.checkout',
				'.woocommerce-cart .woocommerce form:not(.woocommerce-shipping-calculator) .actions .mkd-cart-proceed-update .mkd-btn.checkout-button',
				'.woocommerce-cart .woocommerce form:not(.woocommerce-shipping-calculator) .actions .coupon input[type=text]:focus',
            );

            $border_color_important_selector = array(
                '.mkd-btn.mkd-btn-hover-outline:not(.mkd-btn-custom-border-hover):not(.mkd-btn-gradient):hover',
				'.mkd-btn.mkd-btn-hover-solid:not(.mkd-btn-custom-border-hover):hover',
				'.post-password-form input.mkd-btn-hover-solid[type=submit]:not(.mkd-btn-custom-border-hover):hover',
				'.post-password-form input[type=submit]:not(.mkd-btn-custom-border-hover):not(.mkd-btn-gradient):hover',
				'.woocommerce .button:not(.mkd-btn-custom-border-hover):not(.mkd-btn-gradient):hover',
				'.woocommerce .mkd-btn-hover-solid.button:not(.mkd-btn-custom-border-hover):hover',
				'input.mkd-btn-hover-solid.wpcf7-form-control.wpcf7-submit:not(.mkd-btn-custom-border-hover):hover',
				'input.wpcf7-form-control.wpcf7-submit:not(.mkd-btn-custom-border-hover):not(.mkd-btn-gradient):hover',
            );


            $border_top_color_selector = array(
                '.mkd-progress-bar .mkd-progress-number-wrapper.mkd-floating .mkd-down-arrow'
            );

            $border_bottom_color_selector = array(
                '.woocommerce-cart .woocommerce .cart-collaterals .mkd-shipping-calculator .woocommerce-shipping-calculator > p:after',
                '.woocommerce-account .woocommerce h2:after'
            );

            echo hoshi_mikado_dynamic_css($color_selector, array('color' => hoshi_mikado_options()->getOptionValue('first_color')));
            echo hoshi_mikado_dynamic_css($color_important_selector, array('color' => hoshi_mikado_options()->getOptionValue('first_color').'!important'));
            echo hoshi_mikado_dynamic_css('::selection', array('background' => hoshi_mikado_options()->getOptionValue('first_color')));
            echo hoshi_mikado_dynamic_css('::-moz-selection', array('background' => hoshi_mikado_options()->getOptionValue('first_color')));
            echo hoshi_mikado_dynamic_css($background_color_selector, array('background-color' => hoshi_mikado_options()->getOptionValue('first_color')));
            echo hoshi_mikado_dynamic_css($background_color_important_selector, array('background-color' => hoshi_mikado_options()->getOptionValue('first_color').'!important'));
            echo hoshi_mikado_dynamic_css($border_color_selector, array('border-color' => hoshi_mikado_options()->getOptionValue('first_color')));
            echo hoshi_mikado_dynamic_css($border_color_important_selector, array('border-color' => hoshi_mikado_options()->getOptionValue('first_color').'!important'));
            echo hoshi_mikado_dynamic_css($border_top_color_selector, array('border-top-color' => hoshi_mikado_options()->getOptionValue('first_color')));
            echo hoshi_mikado_dynamic_css($border_bottom_color_selector, array('border-bottom-color' => hoshi_mikado_options()->getOptionValue('first_color')));
            echo hoshi_mikado_dynamic_css('.mkd-preloader svg circle', array('stroke' => hoshi_mikado_options()->getOptionValue('first_color')));
        }

        if(hoshi_mikado_options()->getOptionValue('page_background_color')) {
            $background_color_selector = array(
                '.mkd-wrapper-inner',
                '.mkd-content'
            );
            echo hoshi_mikado_dynamic_css($background_color_selector, array('background-color' => hoshi_mikado_options()->getOptionValue('page_background_color')));
        }

        if(hoshi_mikado_options()->getOptionValue('selection_color')) {
            echo hoshi_mikado_dynamic_css('::selection', array('background' => hoshi_mikado_options()->getOptionValue('selection_color')));
            echo hoshi_mikado_dynamic_css('::-moz-selection', array('background' => hoshi_mikado_options()->getOptionValue('selection_color')));
        }

        if(hoshi_mikado_options()->getOptionValue('gradient_style1_start_color') !== "" && hoshi_mikado_options()->getOptionValue('gradient_style1_start_color') != '#595ea5') {
            $color_selector = array(
                '.mkd-type1-gradient-left-to-right-text i',
                '.mkd-type1-gradient-left-to-right-text i:before',
                '.mkd-type1-gradient-left-to-right-text span',
                '.mkd-type1-gradient-bottom-to-top-text i',
                '.mkd-type1-gradient-bottom-to-top-text i:before',
                '.mkd-type1-gradient-bottom-to-top-text span',
                '.mkd-type1-gradient-diagonal-text i',
                '.mkd-type1-gradient-diagonal-text i:before',
                '.mkd-type1-gradient-diagonal-text span',
                '.mkd-page-not-found h2',
                '.mkd-page-header .mkd-search-opener:hover',
                '.mkd-side-menu-button-opener:hover',
                '.mkd-side-menu-button-opener.opened',
                '.mkd-counter-holder.mkd-counter-gradient-icon .mkd-counter-icon i',
                '.mkd-counter-holder.mkd-counter-gradient-icon .mkd-counter-icon i:before',
                '.mkd-counter-holder.mkd-counter-gradient-icon .mkd-counter-icon span',
                '.mkd-price-table.mkd-pt-active .mkd-price-table-inner .mkd-price',
                '.mkd-price-table.mkd-pt-active .mkd-price-table-inner .mkd-price sup',
                'body div.pp_default a.pp_previous:before',
                'body div.pp_default a.pp_next:before',
                '.mkd-shopping-cart-outer .mkd-shopping-cart-header .mkd-header-cart:hover',
                '.mkd-shopping-cart-dropdown .mkd-cart-bottom .mkd-btns-holder .mkd-btn.mkd-btn-hover-outline.view-cart:hover .mkd-btn-text'

            );

            $color_important_selector = array(
                '.mkd-light-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-side-menu-button-opener:hover',
                '.mkd-light-header.mkd-header-style-on-scroll .mkd-page-header .mkd-side-menu-button-opener:hover',
                '.mkd-top-bar-light .mkd-top-bar .mkd-side-menu-button-opener:hover',
                '.mkd-dark-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-side-menu-button-opener:hover',
                '.mkd-dark-header.mkd-header-style-on-scroll .mkd-page-header .mkd-side-menu-button-opener:hover',
                '.mkd-top-bar-dark .mkd-top-bar .mkd-side-menu-button-opener:hover',
                '.mkd-light-header .mkd-menu-area .mkd-main-menu-widget-area .mkd-btn.view-cart:hover span.mkd-btn-text '
            );

            $background_color_selector = array(
                '.mkd-tabs .mkd-tabs-nav li.ui-state-active a.active-tab-style-1',
                '.mkd-shopping-cart-dropdown .mkd-cart-bottom .mkd-btns-holder .mkd-btn.mkd-btn-hover-outline.view-cart'
            );

            echo hoshi_mikado_dynamic_css($color_selector, array('color' => hoshi_mikado_options()->getOptionValue('gradient_style1_start_color')));
            echo hoshi_mikado_dynamic_css($color_important_selector, array('color' => hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').'!important'));
            echo hoshi_mikado_dynamic_css($background_color_selector, array('background-color' => hoshi_mikado_options()->getOptionValue('gradient_style1_start_color')));
        }

        if(hoshi_mikado_options()->getOptionValue('gradient_style2_start_color') !== "" && hoshi_mikado_options()->getOptionValue('gradient_style2_start_color') != '#0199ef') {
            $color_selector = array(
                '.mkd-type2-gradient-left-to-right-text i',
                '.mkd-type2-gradient-left-to-right-text i:before',
                '.mkd-type2-gradient-left-to-right-text span',
                '.mkd-type2-gradient-bottom-to-top-text i',
                '.mkd-type2-gradient-bottom-to-top-text i:before',
                '.mkd-type2-gradient-bottom-to-top-text span',
                '.mkd-type2-gradient-diagonal-text i',
                '.mkd-type2-gradient-diagonal-text i:before',
                '.mkd-type2-gradient-diagonal-text span',
            );

            $background_color_selector = array(
                '.mkd-tabs .mkd-tabs-nav li.ui-state-active a.active-tab-style-2',
            );

            echo hoshi_mikado_dynamic_css($color_selector, array('color' => hoshi_mikado_options()->getOptionValue('gradient_style2_start_color')));
            echo hoshi_mikado_dynamic_css($background_color_selector, array('background-color' => hoshi_mikado_options()->getOptionValue('gradient_style2_start_color')));
        }

        if(hoshi_mikado_options()->getOptionValue('gradient_style1_start_color') !== '#595ea5' && hoshi_mikado_options()->getOptionValue('gradient_style1_start_color') !== '' &&
           hoshi_mikado_options()->getOptionValue('gradient_style1_end_color') !== '#ff3a4c' && hoshi_mikado_options()->getOptionValue('gradient_style1_end_color') !== ''
        ) {

            echo hoshi_mikado_dynamic_css('.mkd-type1-gradient-left-to-right, .mkd-top-bar', array(
                'background' => '-webkit-linear-gradient(left,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').')',
                'background' => '-o-linear-gradient(right,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').')',
                'background' => '-moz-linear-gradient(right,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').')',
                'background' => 'linear-gradient(to right,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').')',
            ));

            echo hoshi_mikado_dynamic_css('.mkd-type1-gradient-bottom-to-top, .mkd-type1-gradient-bottom-to-top-after:after', array(
                'background' => '-webkit-linear-gradient(bottom,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').')',
                'background' => '-o-linear-gradient(top,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').')',
                'background' => '-moz-linear-gradient(top,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').')',
                'background' => 'linear-gradient(to top,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').')',
            ));

            echo hoshi_mikado_dynamic_css('.mkd-type1-gradient-left-bottom-to-right-top', array(
                'background' => '-webkit-linear-gradient(right top,'.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').')',
                'background' => '-o-linear-gradient(right top,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').')',
                'background' => '-moz-linear-gradient(right top,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').')',
                'background' => 'linear-gradient(to right top,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').')',
            ));

            echo hoshi_mikado_dynamic_css('.mkd-type1-gradient-left-to-right-2x', array(
                'background'      => '-webkit-linear-gradient(left,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 0%, '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').' 50% ,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 100%)',
                'background'      => '-o-linear-gradient(right,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 0%, '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').' 50% ,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 100%)',
                'background'      => '-moz-linear-gradient(right,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 0%, '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').' 50% ,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 100%)',
                'background'      => 'linear-gradient(to right,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 0%, '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').' 50%,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 100%)',
                'background-size' => '200% 200%'
            ));

            echo hoshi_mikado_dynamic_css('.mkd-type1-gradient-left-to-right-text i, .mkd-type1-gradient-left-to-right-text i:before, .mkd-type1-gradient-left-to-right-text span,  body div.pp_default a.pp_previous:before, body div.pp_default a.pp_next:before', array(
                'background'              => '-webkit-linear-gradient(right top,'.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').')',
                'color'                   => hoshi_mikado_options()->getOptionValue('gradient_style1_start_color'),
                '-webkit-background-clip' => 'text',
                '-webkit-text-fill-color' => 'transparent'
            ));

            echo hoshi_mikado_dynamic_css('.mkd-type1-gradient-bottom-to-top-text i, .mkd-type1-gradient-bottom-to-top-text i:before, .mkd-type1-gradient-bottom-to-top-text span', array(
                'background'              => '-webkit-linear-gradient(bottom,'.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').')',
                'color'                   => hoshi_mikado_options()->getOptionValue('gradient_style1_start_color'),
                '-webkit-background-clip' => 'text',
                '-webkit-text-fill-color' => 'transparent'
            ));

            echo hoshi_mikado_dynamic_css( array(
                    '.mkd-type1-gradient-diagonal',
                    '.mkd-grid-row-no-gutter.mkd-newsletter input.wpcf7-form-control.wpcf7-submit',
                    'footer .mkd-grid-row-no-gutter.mkd-newsletter input.wpcf7-form-control.wpcf7-submit',
                    '.mkd-search-fade .mkd-fullscreen-search-holder .mkd-fullscreen-search-table',
                    '.mkd-team.main-info-below-image .mkd-team-image:after',
                    '.mkd-blog-slider-holder .mkd-post-content .mkd-categories-date .mkd-post-info-author-icon',
                    '.mkd-accordion-holder .mkd-title-holder.ui-state-active .mkd-accordion-mark',
                    '.mkd-process-holder .mkd-number-holder-inner:after',
                    '.mkd-fullscreen-menu-holder',
                ),
                array(
                'background' => '-webkit-linear-gradient(left top,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').'); background: -o-linear-gradient(left top,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').'); background: -moz-linear-gradient(left top,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').'); background: linear-gradient(to right bottom,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').')'
            ));


            echo hoshi_mikado_dynamic_css(array(
                    '.mkd-page-not-found h2',
                    '.mkd-type1-gradient-diagonal-text i',
                    '.mkd-type1-gradient-diagonal-text i:before',
                    '.mkd-type1-gradient-diagonal-text span',
                    '.mkd-counter-holder.mkd-counter-gradient-icon .mkd-counter-icon i',
                    '.mkd-counter-holder.mkd-counter-gradient-icon .mkd-counter-icon i:before',
                    '.mkd-counter-holder.mkd-counter-gradient-icon .mkd-counter-icon span',
                    '.mkd-price-table.mkd-pt-active .mkd-price-table-inner .mkd-price',
                    '.mkd-price-table.mkd-pt-active .mkd-price-table-inner .mkd-price sup'
                ), array(
                'background'              => '-webkit-linear-gradient(left top,'.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').')',
                'color'                   => hoshi_mikado_options()->getOptionValue('gradient_style1_start_color'),
                '-webkit-background-clip' => 'text',
                '-webkit-text-fill-color' => 'transparent'
            ));

            echo hoshi_mikado_dynamic_css( array(
                    '.mkd-type1-gradient-diagonal-2x',
                    '.mkd-btn.mkd-btn-gradient-outline, .woocommerce .mkd-btn-gradient-outline.button',
                    '.post-password-form input.mkd-btn-gradient-outline[type="submit"]',
                    'input.mkd-btn-gradient-outline.wpcf7-form-control.wpcf7-submit',
                    '.mkd-product-slider .products > li.product .mkd-btn',
                    '.mkd-product-slider .products > li.product .woocommerce .button',
                    '.woocommerce .mkd-product-slider .products > li.product .button',
                    '.mkd-product-slider .products > li.product .post-password-form input[type="submit"]',
                    '.post-password-form .mkd-product-slider .products > li.product input[type="submit"]',
                    '.mkd-product-slider .products > li.product input.wpcf7-form-control.wpcf7-submit',
                    '.mkd-woocommerce-page .price_slider_amount button.button',
                    '.woocommerce .price_slider_amount button.button'
                ),
                array(
                    'background' => '-webkit-linear-gradient(left top,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').' 50%,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 100%); background: -o-linear-gradient(left top,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').' 50%,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 100%); background: -moz-linear-gradient(left top,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').' 50%,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 100%); background: linear-gradient(to right bottom,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style1_end_color').' 50%,'.hoshi_mikado_options()->getOptionValue('gradient_style1_start_color').' 100%)',
                    'background-size' => '200% 200%',
                ));
        }

        if(hoshi_mikado_options()->getOptionValue('gradient_style2_start_color') !== '#0199ef' && hoshi_mikado_options()->getOptionValue('gradient_style2_start_color') !== '' &&
           hoshi_mikado_options()->getOptionValue('gradient_style2_end_color') !== '#ff3a4c' && hoshi_mikado_options()->getOptionValue('gradient_style2_end_color') !== ''
        ) {

            echo hoshi_mikado_dynamic_css('.mkd-type2-gradient-left-to-right', array(
                'background' => '-webkit-linear-gradient(left,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').')',
                'background' => '-o-linear-gradient(right,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').')',
                'background' => '-moz-linear-gradient(right,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').')',
                'background' => 'linear-gradient(to right,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').')',
            ));

            echo hoshi_mikado_dynamic_css('.mkd-type2-gradient-bottom-to-top, .mkd-type2-gradient-bottom-to-top-after:after', array(
                'background' => '-webkit-linear-gradient(bottom,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').')',
                'background' => '-o-linear-gradient(top,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').')',
                'background' => '-moz-linear-gradient(top,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').')',
                'background' => 'linear-gradient(to top,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').')',
            ));

            echo hoshi_mikado_dynamic_css('.mkd-type2-gradient-left-bottom-to-right-top', array(
                'background' => '-webkit-linear-gradient(right top,'.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').')',
                'background' => '-o-linear-gradient(right top,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').')',
                'background' => '-moz-linear-gradient(right top,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').')',
                'background' => 'linear-gradient(to right top,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').')',
            ));

            echo hoshi_mikado_dynamic_css('.mkd-type2-gradient-left-to-right-2x', array(
                'background'      => '-webkit-linear-gradient(left,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 0%, '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').' 50% ,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 100%)',
                'background'      => '-o-linear-gradient(right,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 0%, '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').' 50% ,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 100%)',
                'background'      => '-moz-linear-gradient(right,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 0%, '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').' 50% ,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 100%)',
                'background'      => 'linear-gradient(to right,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 0%, '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').' 50%,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 100%)',
                'background-size' => '200% 200%'
            ));

            echo hoshi_mikado_dynamic_css('.mkd-type2-gradient-left-to-right-text i, .mkd-type2-gradient-left-to-right-text i:before, .mkd-type2-gradient-left-to-right-text span', array(
                'background'              => '-webkit-linear-gradient(right top,'.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').')',
                'color'                   => hoshi_mikado_options()->getOptionValue('gradient_style2_start_color'),
                '-webkit-background-clip' => 'text',
                '-webkit-text-fill-color' => 'transparent'
            ));

            echo hoshi_mikado_dynamic_css('.mkd-type2-gradient-bottom-to-top-text i, .mkd-type2-gradient-bottom-to-top-text i:before, .mkd-type2-gradient-bottom-to-top-text span', array(
                'background'              => '-webkit-linear-gradient(bottom,'.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').', '.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').')',
                'color'                   => hoshi_mikado_options()->getOptionValue('gradient_style2_start_color'),
                '-webkit-background-clip' => 'text',
                '-webkit-text-fill-color' => 'transparent'
            ));

            echo hoshi_mikado_dynamic_css( array(
                    '.mkd-type2-gradient-diagonal',
                ),
                array(
                    'background' => '-webkit-linear-gradient(left top,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').')',
                    'background' => '-o-linear-gradient(left top,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').')',
                    'background' => '-moz-linear-gradient(left top,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').')',
                    'background' => 'linear-gradient(to right bottom,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').')',
            ));

            echo hoshi_mikado_dynamic_css(array(
                    '.mkd-type2-gradient-diagonal-text i',
                    '.mkd-type2-gradient-diagonal-text i:before',
                    '.mkd-type2-gradient-diagonal-text span',
                ), array(
                'background'              => '-webkit-linear-gradient(left top,'.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').')',
                'color'                   => hoshi_mikado_options()->getOptionValue('gradient_style2_start_color'),
                '-webkit-background-clip' => 'text',
                '-webkit-text-fill-color' => 'transparent'
            ));

            echo hoshi_mikado_dynamic_css( array(
                    '.mkd-type2-gradient-diagonal-2x',
                ),
                array(
                    'background' => '-webkit-linear-gradient(left top,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').' 50%,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 100%)',
                    'background' => '-o-linear-gradient(left top,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').' 50%,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 100%)',
                    'background' => '-moz-linear-gradient(left top,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').' 50%,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 100%)',
                    'background' => 'linear-gradient(to right bottom,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 25%, '.hoshi_mikado_options()->getOptionValue('gradient_style2_end_color').' 50%,'.hoshi_mikado_options()->getOptionValue('gradient_style2_start_color').' 100%)',
                    'background-size' => '200% 200%',
            ));

        }

        $boxed_background_style = array();
        if(hoshi_mikado_options()->getOptionValue('page_background_color_in_box')) {
            $boxed_background_style['background-color'] = hoshi_mikado_options()->getOptionValue('page_background_color_in_box');
        }

        if(hoshi_mikado_options()->getOptionValue('boxed_background_image')) {
            $boxed_background_style['background-image']    = 'url('.esc_url(hoshi_mikado_options()->getOptionValue('boxed_background_image')).')';
            $boxed_background_style['background-position'] = 'center 0px';
            $boxed_background_style['background-repeat']   = 'no-repeat';
        }

        if(hoshi_mikado_options()->getOptionValue('boxed_pattern_background_image')) {
            $boxed_background_style['background-image']    = 'url('.esc_url(hoshi_mikado_options()->getOptionValue('boxed_pattern_background_image')).')';
            $boxed_background_style['background-position'] = '0px 0px';
            $boxed_background_style['background-repeat']   = 'repeat';
        }

        if(hoshi_mikado_options()->getOptionValue('boxed_background_image_attachment')) {
            $boxed_background_style['background-attachment'] = (hoshi_mikado_options()->getOptionValue('boxed_background_image_attachment'));
        }

        echo hoshi_mikado_dynamic_css('.mkd-boxed .mkd-wrapper', $boxed_background_style);
    }

    add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_design_styles');
}

if(!function_exists('hoshi_mikado_h1_styles')) {

    function hoshi_mikado_h1_styles() {

        $h1_styles = array();

        if(hoshi_mikado_options()->getOptionValue('h1_color') !== '') {
            $h1_styles['color'] = hoshi_mikado_options()->getOptionValue('h1_color');
        }
        if(hoshi_mikado_options()->getOptionValue('h1_google_fonts') !== '-1') {
            $h1_styles['font-family'] = hoshi_mikado_get_formatted_font_family(hoshi_mikado_options()->getOptionValue('h1_google_fonts'));
        }
        if(hoshi_mikado_options()->getOptionValue('h1_fontsize') !== '') {
            $h1_styles['font-size'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h1_fontsize')).'px';
        }
        if(hoshi_mikado_options()->getOptionValue('h1_lineheight') !== '') {
            $h1_styles['line-height'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h1_lineheight')).'px';
        }
        if(hoshi_mikado_options()->getOptionValue('h1_texttransform') !== '') {
            $h1_styles['text-transform'] = hoshi_mikado_options()->getOptionValue('h1_texttransform');
        }
        if(hoshi_mikado_options()->getOptionValue('h1_fontstyle') !== '') {
            $h1_styles['font-style'] = hoshi_mikado_options()->getOptionValue('h1_fontstyle');
        }
        if(hoshi_mikado_options()->getOptionValue('h1_fontweight') !== '') {
            $h1_styles['font-weight'] = hoshi_mikado_options()->getOptionValue('h1_fontweight');
        }
        if(hoshi_mikado_options()->getOptionValue('h1_letterspacing') !== '') {
            $h1_styles['letter-spacing'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h1_letterspacing')).'px';
        }

        $h1_selector = array(
            'h1'
        );

        if(!empty($h1_styles)) {
            echo hoshi_mikado_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_h1_styles');
}

if(!function_exists('hoshi_mikado_h2_styles')) {

    function hoshi_mikado_h2_styles() {

        $h2_styles = array();

        if(hoshi_mikado_options()->getOptionValue('h2_color') !== '') {
            $h2_styles['color'] = hoshi_mikado_options()->getOptionValue('h2_color');
        }
        if(hoshi_mikado_options()->getOptionValue('h2_google_fonts') !== '-1') {
            $h2_styles['font-family'] = hoshi_mikado_get_formatted_font_family(hoshi_mikado_options()->getOptionValue('h2_google_fonts'));
        }
        if(hoshi_mikado_options()->getOptionValue('h2_fontsize') !== '') {
            $h2_styles['font-size'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h2_fontsize')).'px';
        }
        if(hoshi_mikado_options()->getOptionValue('h2_lineheight') !== '') {
            $h2_styles['line-height'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h2_lineheight')).'px';
        }
        if(hoshi_mikado_options()->getOptionValue('h2_texttransform') !== '') {
            $h2_styles['text-transform'] = hoshi_mikado_options()->getOptionValue('h2_texttransform');
        }
        if(hoshi_mikado_options()->getOptionValue('h2_fontstyle') !== '') {
            $h2_styles['font-style'] = hoshi_mikado_options()->getOptionValue('h2_fontstyle');
        }
        if(hoshi_mikado_options()->getOptionValue('h2_fontweight') !== '') {
            $h2_styles['font-weight'] = hoshi_mikado_options()->getOptionValue('h2_fontweight');
        }
        if(hoshi_mikado_options()->getOptionValue('h2_letterspacing') !== '') {
            $h2_styles['letter-spacing'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h2_letterspacing')).'px';
        }

        $h2_selector = array(
            'h2'
        );

        if(!empty($h2_styles)) {
            echo hoshi_mikado_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_h2_styles');
}

if(!function_exists('hoshi_mikado_h3_styles')) {

    function hoshi_mikado_h3_styles() {

        $h3_styles = array();

        if(hoshi_mikado_options()->getOptionValue('h3_color') !== '') {
            $h3_styles['color'] = hoshi_mikado_options()->getOptionValue('h3_color');
        }
        if(hoshi_mikado_options()->getOptionValue('h3_google_fonts') !== '-1') {
            $h3_styles['font-family'] = hoshi_mikado_get_formatted_font_family(hoshi_mikado_options()->getOptionValue('h3_google_fonts'));
        }
        if(hoshi_mikado_options()->getOptionValue('h3_fontsize') !== '') {
            $h3_styles['font-size'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h3_fontsize')).'px';
        }
        if(hoshi_mikado_options()->getOptionValue('h3_lineheight') !== '') {
            $h3_styles['line-height'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h3_lineheight')).'px';
        }
        if(hoshi_mikado_options()->getOptionValue('h3_texttransform') !== '') {
            $h3_styles['text-transform'] = hoshi_mikado_options()->getOptionValue('h3_texttransform');
        }
        if(hoshi_mikado_options()->getOptionValue('h3_fontstyle') !== '') {
            $h3_styles['font-style'] = hoshi_mikado_options()->getOptionValue('h3_fontstyle');
        }
        if(hoshi_mikado_options()->getOptionValue('h3_fontweight') !== '') {
            $h3_styles['font-weight'] = hoshi_mikado_options()->getOptionValue('h3_fontweight');
        }
        if(hoshi_mikado_options()->getOptionValue('h3_letterspacing') !== '') {
            $h3_styles['letter-spacing'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h3_letterspacing')).'px';
        }

        $h3_selector = array(
            'h3'
        );

        if(!empty($h3_styles)) {
            echo hoshi_mikado_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_h3_styles');
}

if(!function_exists('hoshi_mikado_h4_styles')) {

    function hoshi_mikado_h4_styles() {

        $h4_styles = array();

        if(hoshi_mikado_options()->getOptionValue('h4_color') !== '') {
            $h4_styles['color'] = hoshi_mikado_options()->getOptionValue('h4_color');
        }
        if(hoshi_mikado_options()->getOptionValue('h4_google_fonts') !== '-1') {
            $h4_styles['font-family'] = hoshi_mikado_get_formatted_font_family(hoshi_mikado_options()->getOptionValue('h4_google_fonts'));
        }
        if(hoshi_mikado_options()->getOptionValue('h4_fontsize') !== '') {
            $h4_styles['font-size'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h4_fontsize')).'px';
        }
        if(hoshi_mikado_options()->getOptionValue('h4_lineheight') !== '') {
            $h4_styles['line-height'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h4_lineheight')).'px';
        }
        if(hoshi_mikado_options()->getOptionValue('h4_texttransform') !== '') {
            $h4_styles['text-transform'] = hoshi_mikado_options()->getOptionValue('h4_texttransform');
        }
        if(hoshi_mikado_options()->getOptionValue('h4_fontstyle') !== '') {
            $h4_styles['font-style'] = hoshi_mikado_options()->getOptionValue('h4_fontstyle');
        }
        if(hoshi_mikado_options()->getOptionValue('h4_fontweight') !== '') {
            $h4_styles['font-weight'] = hoshi_mikado_options()->getOptionValue('h4_fontweight');
        }
        if(hoshi_mikado_options()->getOptionValue('h4_letterspacing') !== '') {
            $h4_styles['letter-spacing'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h4_letterspacing')).'px';
        }

        $h4_selector = array(
            'h4'
        );

        if(!empty($h4_styles)) {
            echo hoshi_mikado_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_h4_styles');
}

if(!function_exists('hoshi_mikado_h5_styles')) {

    function hoshi_mikado_h5_styles() {

        $h5_styles = array();

        if(hoshi_mikado_options()->getOptionValue('h5_color') !== '') {
            $h5_styles['color'] = hoshi_mikado_options()->getOptionValue('h5_color');
        }
        if(hoshi_mikado_options()->getOptionValue('h5_google_fonts') !== '-1') {
            $h5_styles['font-family'] = hoshi_mikado_get_formatted_font_family(hoshi_mikado_options()->getOptionValue('h5_google_fonts'));
        }
        if(hoshi_mikado_options()->getOptionValue('h5_fontsize') !== '') {
            $h5_styles['font-size'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h5_fontsize')).'px';
        }
        if(hoshi_mikado_options()->getOptionValue('h5_lineheight') !== '') {
            $h5_styles['line-height'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h5_lineheight')).'px';
        }
        if(hoshi_mikado_options()->getOptionValue('h5_texttransform') !== '') {
            $h5_styles['text-transform'] = hoshi_mikado_options()->getOptionValue('h5_texttransform');
        }
        if(hoshi_mikado_options()->getOptionValue('h5_fontstyle') !== '') {
            $h5_styles['font-style'] = hoshi_mikado_options()->getOptionValue('h5_fontstyle');
        }
        if(hoshi_mikado_options()->getOptionValue('h5_fontweight') !== '') {
            $h5_styles['font-weight'] = hoshi_mikado_options()->getOptionValue('h5_fontweight');
        }
        if(hoshi_mikado_options()->getOptionValue('h5_letterspacing') !== '') {
            $h5_styles['letter-spacing'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h5_letterspacing')).'px';
        }

        $h5_selector = array(
            'h5'
        );

        if(!empty($h5_styles)) {
            echo hoshi_mikado_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_h5_styles');
}

if(!function_exists('hoshi_mikado_h6_styles')) {

    function hoshi_mikado_h6_styles() {

        $h6_styles = array();

        if(hoshi_mikado_options()->getOptionValue('h6_color') !== '') {
            $h6_styles['color'] = hoshi_mikado_options()->getOptionValue('h6_color');
        }
        if(hoshi_mikado_options()->getOptionValue('h6_google_fonts') !== '-1') {
            $h6_styles['font-family'] = hoshi_mikado_get_formatted_font_family(hoshi_mikado_options()->getOptionValue('h6_google_fonts'));
        }
        if(hoshi_mikado_options()->getOptionValue('h6_fontsize') !== '') {
            $h6_styles['font-size'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h6_fontsize')).'px';
        }
        if(hoshi_mikado_options()->getOptionValue('h6_lineheight') !== '') {
            $h6_styles['line-height'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h6_lineheight')).'px';
        }
        if(hoshi_mikado_options()->getOptionValue('h6_texttransform') !== '') {
            $h6_styles['text-transform'] = hoshi_mikado_options()->getOptionValue('h6_texttransform');
        }
        if(hoshi_mikado_options()->getOptionValue('h6_fontstyle') !== '') {
            $h6_styles['font-style'] = hoshi_mikado_options()->getOptionValue('h6_fontstyle');
        }
        if(hoshi_mikado_options()->getOptionValue('h6_fontweight') !== '') {
            $h6_styles['font-weight'] = hoshi_mikado_options()->getOptionValue('h6_fontweight');
        }
        if(hoshi_mikado_options()->getOptionValue('h6_letterspacing') !== '') {
            $h6_styles['letter-spacing'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('h6_letterspacing')).'px';
        }

        $h6_selector = array(
            'h6'
        );

        if(!empty($h6_styles)) {
            echo hoshi_mikado_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_h6_styles');
}

if(!function_exists('hoshi_mikado_text_styles')) {

    function hoshi_mikado_text_styles() {

        $text_styles = array();

        if(hoshi_mikado_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] = hoshi_mikado_options()->getOptionValue('text_color');
        }
        if(hoshi_mikado_options()->getOptionValue('text_google_fonts') !== '-1') {
            $text_styles['font-family'] = hoshi_mikado_get_formatted_font_family(hoshi_mikado_options()->getOptionValue('text_google_fonts'));
        }
        if(hoshi_mikado_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('text_fontsize')).'px';
        }
        if(hoshi_mikado_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('text_lineheight')).'px';
        }
        if(hoshi_mikado_options()->getOptionValue('text_texttransform') !== '') {
            $text_styles['text-transform'] = hoshi_mikado_options()->getOptionValue('text_texttransform');
        }
        if(hoshi_mikado_options()->getOptionValue('text_fontstyle') !== '') {
            $text_styles['font-style'] = hoshi_mikado_options()->getOptionValue('text_fontstyle');
        }
        if(hoshi_mikado_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] = hoshi_mikado_options()->getOptionValue('text_fontweight');
        }
        if(hoshi_mikado_options()->getOptionValue('text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('text_letterspacing')).'px';
        }

        $text_selector = array(
            'p'
        );

        if(!empty($text_styles)) {
            echo hoshi_mikado_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_text_styles');
}

if(!function_exists('hoshi_mikado_link_styles')) {

    function hoshi_mikado_link_styles() {

        $link_styles = array();

        if(hoshi_mikado_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = hoshi_mikado_options()->getOptionValue('link_color');
        }
        if(hoshi_mikado_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = hoshi_mikado_options()->getOptionValue('link_fontstyle');
        }
        if(hoshi_mikado_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = hoshi_mikado_options()->getOptionValue('link_fontweight');
        }
        if(hoshi_mikado_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = hoshi_mikado_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if(!empty($link_styles)) {
            echo hoshi_mikado_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_link_styles');
}

if(!function_exists('hoshi_mikado_link_hover_styles')) {

    function hoshi_mikado_link_hover_styles() {

        $link_hover_styles = array();

        if(hoshi_mikado_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = hoshi_mikado_options()->getOptionValue('link_hovercolor');
        }
        if(hoshi_mikado_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = hoshi_mikado_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if(!empty($link_hover_styles)) {
            echo hoshi_mikado_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if(hoshi_mikado_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = hoshi_mikado_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if(!empty($link_heading_hover_styles)) {
            echo hoshi_mikado_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_link_hover_styles');
}

if(!function_exists('hoshi_mikado_smooth_page_transition_styles')) {

    function hoshi_mikado_smooth_page_transition_styles($style) {

        $id = hoshi_mikado_get_page_id();
        $loader_style = array();
        $current_style = '';

        if(hoshi_mikado_get_meta_field_intersect('smooth_pt_bgnd_color',$id) !== '') {
            $loader_style['background-color'] = hoshi_mikado_get_meta_field_intersect('smooth_pt_bgnd_color',$id);
        }

        $loader_selector = array('.mkd-smooth-transition-loader');

        if(!empty($loader_style)) {
            $current_style .= hoshi_mikado_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();

        if(hoshi_mikado_get_meta_field_intersect('smooth_pt_spinner_color',$id) !== '') {
            $spinner_style['background-color'] = hoshi_mikado_get_meta_field_intersect('smooth_pt_spinner_color',$id);
        }

        $spinner_selectors = array(
            '.mkd-st-loader .pulse',
            '.mkd-st-loader .double_pulse .double-bounce1',
            '.mkd-st-loader .double_pulse .double-bounce2',
            '.mkd-st-loader .cube',
            '.mkd-st-loader .rotating_cubes .cube1',
            '.mkd-st-loader .rotating_cubes .cube2',
            '.mkd-st-loader .stripes > div',
            '.mkd-st-loader .wave > div',
            '.mkd-st-loader .two_rotating_circles .dot1',
            '.mkd-st-loader .two_rotating_circles .dot2',
            '.mkd-st-loader .five_rotating_circles .container1 > div',
            '.mkd-st-loader .five_rotating_circles .container2 > div',
            '.mkd-st-loader .five_rotating_circles .container3 > div',
            '.mkd-st-loader .atom .ball-1:before',
            '.mkd-st-loader .atom .ball-2:before',
            '.mkd-st-loader .atom .ball-3:before',
            '.mkd-st-loader .atom .ball-4:before',
            '.mkd-st-loader .clock .ball:before',
            '.mkd-st-loader .mitosis .ball',
            '.mkd-st-loader .lines .line1',
            '.mkd-st-loader .lines .line2',
            '.mkd-st-loader .lines .line3',
            '.mkd-st-loader .lines .line4',
            '.mkd-st-loader .fussion .ball',
            '.mkd-st-loader .fussion .ball-1',
            '.mkd-st-loader .fussion .ball-2',
            '.mkd-st-loader .fussion .ball-3',
            '.mkd-st-loader .fussion .ball-4',
            '.mkd-st-loader .wave_circles .ball',
            '.mkd-st-loader .pulse_circles .ball'
        );

        if(!empty($spinner_style)) {
            $current_style .= hoshi_mikado_dynamic_css($spinner_selectors, $spinner_style);
        }

        $current_style = $current_style . $style;
        return $current_style;
    }

    add_filter('hoshi_mikado_filter_add_page_custom_style', 'hoshi_mikado_smooth_page_transition_styles');
}

if (!function_exists('hoshi_mikado_404_styles')) {

    function hoshi_mikado_404_styles() {

        $image404_style = array();

        if(hoshi_mikado_options()->getOptionValue('404_image') !== '') {
            $image404_style['background-image'] = "url(".hoshi_mikado_options()->getOptionValue('404_image').")";
        }

        $image404_selector = array('.error404 .mkd-content .mkd-container');

        if (!empty($image404_style)) {
            echo hoshi_mikado_dynamic_css($image404_selector, $image404_style);
        }

    }

    add_action('hoshi_mikado_style_dynamic', 'hoshi_mikado_404_styles');
}