<?php
namespace Hoshi\Modules\PricingTable;

use Hoshi\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTable implements ShortcodeInterface {
    private $base;

    function __construct() {
        $this->base = 'mkd_pricing_table';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Pricing Table', 'hoshi'),
            'base'                      => $this->base,
            'icon'                      => 'icon-wpb-pricing-table extended-custom-icon',
            'category'                  => 'by MIKADO',
            'allowed_container_element' => 'vc_row',
            'as_child'                  => array('only' => 'mkd_pricing_tables'),
            'params'                    => array(
                array(
                    'type'        => 'textfield',
                    'admin_label' => true,
                    'heading'     => esc_html__('Title', 'hoshi'),
                    'param_name'  => 'title',
                    'value'       => esc_html__('Basic Plan','hoshi'),
                    'description' => ''
                ),
                array(
                    'type'        => 'textfield',
                    'admin_label' => true,
                    'heading'     => esc_html__('Title Size (px)', 'hoshi'),
                    'param_name'  => 'title_size',
                    'value'       => '',
                    'description' => '',
                    'dependency'  => array('element' => 'title', 'not_empty' => true)
                ),
                array(
                    'type'        => 'textfield',
                    'admin_label' => true,
                    'heading'     => esc_html__('Price', 'hoshi'),
                    'param_name'  => 'price'
                ),
                array(
                    'type'        => 'textfield',
                    'admin_label' => true,
                    'heading'     => esc_html__('Currency', 'hoshi'),
                    'param_name'  => 'currency'
                ),
                array(
                    'type'        => 'textfield',
                    'admin_label' => true,
                    'heading'     => esc_html__('Price Period', 'hoshi'),
                    'param_name'  => 'price_period'
                ),
                array(
                    'type'        => 'dropdown',
                    'admin_label' => true,
                    'heading'     => esc_html__('Show Button', 'hoshi'),
                    'param_name'  => 'show_button',
                    'value'       => array(
                        esc_html__('Default', 'hoshi') => '',
                        esc_html__('Yes', 'hoshi')     => 'yes',
                        esc_html__('No', 'hoshi')      => 'no'
                    ),
                    'description' => ''
                ),
                array(
                    'type'        => 'textfield',
                    'admin_label' => true,
                    'heading'     => esc_html__('Button Text', 'hoshi'),
                    'param_name'  => 'button_text',
                    'dependency'  => array('element' => 'show_button', 'value' => 'yes')
                ),
                array(
                    'type'        => 'textfield',
                    'admin_label' => true,
                    'heading'     => esc_html__('Button Link', 'hoshi'),
                    'param_name'  => 'link',
                    'dependency'  => array('element' => 'show_button', 'value' => 'yes')
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Button Gradient Style', 'hoshi'),
                    'param_name'  => 'button_gradient_style',
                    'value'       => array(
                        esc_html__('No', 'hoshi')  => 'no',
                        esc_html__('Yes', 'hoshi') => 'yes'
                    ),
                    'save_always' => true,
                    'dependency'  => array('element' => 'show_button', 'value' => 'yes')
                ),
                array(
                    'type'        => 'dropdown',
                    'admin_label' => true,
                    'heading'     => esc_html__('Active', 'hoshi'),
                    'param_name'  => 'active',
                    'value'       => array(
                        esc_html__('Yes', 'hoshi') => 'yes',
                        esc_html__('No', 'hoshi')  => 'no',
                    ),
                    'save_always' => true,
                    'description' => ''
                ),
                array(
                    'type'        => 'textarea_html',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Content', 'hoshi'),
                    'param_name'  => 'content',
                    'value'       => '<li>content content content</li><li>content content content</li><li>content content content</li>',
                    'description' => ''
                )
            )
        ));
    }

    public function render($atts, $content = null) {

        $args   = array(
            'title'                        => 'Basic Plan',
            'title_size'                   => '',
            'price'                        => '100',
            'currency'                     => '',
            'price_period'                 => '',
            'active'                       => 'no',
            'show_button'                  => 'yes',
            'link'                         => '',
            'button_text'                  => 'button',
            'button_gradient_style'        => '',
            'active_pricing_table_classes' => ''
        );
        $params = shortcode_atts($args, $atts);
        extract($params);

        $html                  = '';
        $pricing_table_clasess = 'mkd-price-table';

        if($active == 'yes') {
            $pricing_table_clasess .= ' mkd-pt-active';
        }

        $params['pricing_table_classes'] = $pricing_table_clasess;
        $params['content']               = $content;
        $params['button_params']         = $this->getButtonParams($params);

        $params['title_styles'] = array();

        if(!empty($params['title_size'])) {
            $params['title_styles'][] = 'font-size: '.hoshi_mikado_filter_px($params['title_size']).'px';
        }

        $html .= hoshi_mikado_get_shortcode_module_template_part('templates/pricing-table-template', 'pricing-table', '', $params);

        return $html;

    }

    private function getButtonParams($params) {
        $buttonParams = array();

        if($params['show_button'] === 'yes' && $params['button_text'] !== '') {
            $buttonParams = array(
                'link' => $params['link'],
                'text' => $params['button_text'],
                'size' => 'small',
                'icon_pack' => 'font_elegant',
                'fe_icon' => 'arrow_right'

            );

            $type = 'outline';
            $hover_type = 'solid';
            $color = '#4b4b4b';
            if($params['button_gradient_style'] === 'yes') {
                $type = 'gradient-outline';
                $hover_type = 'outline';
            }

            $buttonParams['type']           = $params['active'] === 'yes' ? 'gradient' : $type;
            $buttonParams['hover_type']     = $params['active'] === 'yes' ? 'gradient' : $hover_type;
            $buttonParams['color']          = $params['active'] === 'yes' ? '#fff' : $color;
            $buttonParams['border_color']   = $params['active'] === 'yes' ? 'transparent' : $color;
            $buttonParams['hover_background_color'] = $params['active'] === 'yes' ? '' : $color;
            $buttonParams['hover_border_color'] = $params['active'] === 'yes' ? '' : $color;
        }

        return $buttonParams;
    }

}
