<?php
/*
Element Description: VC Info Box
*/

// Element Class
class aeVCPortfolioElement extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_portfolio_element_mapping' ) );
        add_shortcode( 'vc_portfolio_element', array( $this, 'vc_portfolio_element_html' ) );
    }

    // Element Mapping
        public function vc_portfolio_element_mapping() {

            // Stop all if VC is not enabled
            if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
            }

    // Map the block with vc_map()
    vc_map(
        array(
            'name' => __('VC Portfolio Element', 'text-domain'),
            'base' => 'vc_portfolio_element',
            'description' => __('Portfolio Element VC box', 'text-domain'),
            'category' => __('Portfolio Section', 'text-domain'),
            'icon' => plugins_url() .'/arkham-extension/img/portfolio/portfolio-icon.png',
            'params' => array(

                ),
            )
        );

    }


    // Element HTML
    public function vc_portfolio_element_html( $atts ) {

        $background_color = '';

        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title'   => '',
                    'text' => '',
                    'background_color' => '$background_color'
                ),
                $atts
            )
        );

        // Fill $html var with data
        $html = '
        <div class="vc-portfolio-wrap">'

          . do_shortcode('[portfolio-shortcode]') .'

        </div>';

        return $html;

    }

} // End Element Class


// Element Class Init
new aeVCPortfolioElement();