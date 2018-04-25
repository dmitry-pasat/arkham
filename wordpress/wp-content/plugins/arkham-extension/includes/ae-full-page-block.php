<?php
/*
Element Description: VC FullPageBlock
*/

// Element Class
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_vc_FullPageBlock extends WPBakeryShortCodesContainer
    {

        // Element Init
        function __construct()
        {
            add_action('init', array($this, 'vc_fullpageblock_mapping'));
            add_shortcode('vc_fullpageblock', array($this, 'vc_fullpageblock_html'));
        }

        // Element Mapping
        public function vc_fullpageblock_mapping()
        {

            // Stop all if VC is not enabled
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            // Map the block with vc_map()
            vc_map(

                array(
                    'name' => __('VC FullPageBlock', 'text-domain'),
                    'base' => 'vc_fullpageblock',
                    'description' => __('Customized FullPageBlock', 'text-domain'),
                    'category' => __('Custom Elements', 'text-domain'),
                    'as_parent' => array('only' => 'vc_fullpageblockitem'),
                    'js_view' => 'VcColumnView',
                    'icon' => plugins_url() . '/arkham-extension/img/wrapper-icon.png',
                    'params' => array(

                    )
                )
            );


        }


        // Element HTML
        public function vc_fullpageblock_html($atts, $content = null)
        {

            //$title = '';
            //$text = '';

            // Params extraction
            extract(
                shortcode_atts(
                    array(
                        //'title' => '',
                        //'text' => '',
                    ),
                    $atts
                )
            );

            // Fill $html var with data
            $html = '

                <div id="fullpage">
                    '. do_shortcode($content) . ';
                </div>';

            return $html;

        }

    } // End Element Class
}
// Element Class Init
new WPBakeryShortCode_vc_FullPageBlock();

