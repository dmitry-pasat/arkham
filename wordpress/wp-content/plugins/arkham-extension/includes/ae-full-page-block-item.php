<?php
/*
Element Description: VC FullPageBlockItem
*/

// Element Class
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_vc_FullPageBlockItem extends WPBakeryShortCodesContainer
    {

        // Element Init
        function __construct()
        {
            add_action('init', array($this, 'vc_fullpageblockitem_mapping'));
            add_shortcode('vc_fullpageblockitem', array($this, 'vc_fullpageblockitem_html'));
        }

        // Element Mapping
        public function vc_fullpageblockitem_mapping()
        {

            // Stop all if VC is not enabled
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            // Map the block with vc_map()
            vc_map(

                array(
                    'name' => __('VC FullPageBlockItem', 'text-domain'),
                    'base' => 'vc_fullpageblockitem',
                    'description' => __('Customized FullPageBlockItem', 'text-domain'),
                    'category' => __('Custom Elements', 'text-domain'),
                    'as_child' => array('only' => 'vc_fullpageblock'),
                    'as_parent' => array('except' => 'vc_row, vc_accordion, no_cover_boxes, no_portfolio_list, no_portfolio_slider'),
                    //'content_element' => true,
                    'icon'                    => 'icon-wpb-elements-holder-item extended-custom-icon',
                    'show_settings_on_create' => true,
                    'js_view'                 => 'VcColumnView',
                    //'icon' => plugins_url() . '/arkham-extension/img/wrapper-icon-item.png',
                    'params' => array(

                        array(
                            'type' => 'colorpicker',
                            'class' => '',
                            'heading' => esc_html__('Background Color', 'hoshi'),
                            'param_name' => 'background_color',
                            'value' => '',
                            'description' => ''
                        ),

                        array(
                            'type' => 'textfield',
                            'holder' => 'h3',
                            'class' => 'title-class',
                            'heading' => __('Title', 'text-domain'),
                            'param_name' => 'title',
                            'value' => __('Default value', 'text-domain'),
                            'description' => __('Box Title', 'text-domain'),
                            'admin_label' => false,
                            'weight' => 0,
                            'group' => 'Custom Group',
                        )

                    )
                )
            );


        }


        // Element HTML
        public function vc_fullpageblockitem_html($atts, $content = null)
        {

            $background_color = '';
            $title = '';

            // Params extraction
            extract(
                shortcode_atts(
                    array(
                        'background_color' => '',
                        'title' => '',
                    ),
                    $atts
                )
            );

            // Fill $html var with data
            $html = '
                <div class="section" style="background-color:'.$background_color.'">
                    <h3>'. $title .'</h3>
                     '. do_shortcode($content) . ';
                </div>';

            return $html;

        }

    } // End Element Class
}
// Element Class Init
new WPBakeryShortCode_vc_FullPageBlockItem();