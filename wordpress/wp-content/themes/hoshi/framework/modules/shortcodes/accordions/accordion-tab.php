<?php

namespace Hoshi\Modules\AccordionTab;

use Hoshi\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * class Accordions
 */
class AccordionTab implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'mkd_accordion_tab';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if(function_exists('vc_map')) {
            vc_map(array(
                "name"                    => esc_html__('Mikado Accordion Tab', 'hoshi'),
                "base"                    => $this->base,
                "as_parent"               => array('except' => 'vc_row'),
                "as_child"                => array('only' => 'mkd_accordion'),
                'is_container'            => true,
                "category"                => 'by MIKADO',
                "icon"                    => "icon-wpb-accordion-section extended-custom-icon",
                "show_settings_on_create" => true,
                "js_view"                 => 'VcColumnView',
                'params'                  => array_merge(
                    hoshi_mikado_icon_collections()->getVCParamsArray(array(), '', true),
                    array(
                        array(
                            'type'        => 'textfield',
                            'heading'     => esc_html__('Title', 'hoshi'),
                            'param_name'  => 'title',
                            'admin_label' => true,
                            'value'       => esc_html__('Section', 'hoshi'),
                            'description' => esc_html__('Enter accordion section title.', 'hoshi')
                        ),
                        array(
                            'type'        => 'textfield',
                            'heading'     => esc_html__('Number', 'hoshi'),
                            'param_name'  => 'number',
                            'admin_label' => true,
                            'description' => esc_html__('Enter a number of your section.', 'hoshi')
                        ),
                        array(
                            'type'        => 'colorpicker',
                            'heading'     => esc_html__('Number Color', 'hoshi'),
                            'param_name'  => 'number_color',
                            'admin_label' => true
                        ),
                        array(
                            'type'        => 'dropdown',
                            'heading'     => esc_html__('Skin', 'hoshi'),
                            'param_name'  => 'skin',
                            'value'       => array(
                                esc_html__('Light', 'hoshi') => 'light',
                                esc_html__('Dark', 'hoshi')  => 'dark'
                            ),
                            'admin_label' => true,
                            'description' => esc_html__('Choose skin for your section.', 'hoshi')
                        ),
                        array(
                            'type'        => 'el_id',
                            'heading'     => esc_html__('Section ID', 'hoshi'),
                            'param_name'  => 'el_id',
                            'description' => sprintf(esc_html__('Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'hoshi'), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">'.esc_html__('link', 'hoshi').'</a>'),
                        ),
                    )
                )
            ));
        }
    }


    public function render($atts, $content = null) {

        $default_atts = (array(
            'title'        => 'Accordion Title',
            'number'       => '',
            'skin'         => '',
            'el_id'        => '',
            'number_color' => ''
        ));

        $default_atts = array_merge($default_atts, hoshi_mikado_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        $iconPackName   = hoshi_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
        $params['icon'] = $iconPackName ? $params[$iconPackName] : '';

        $params['link_params']  = $this->getLinkParams($params);
        $params['color_number'] = $this->getNumberStyles($params);

        $dark_light = '';

        if($params['skin'] == 'dark') {
            $dark_light .= 'mkd-accordion-dark';
        }

        $params['dark_type'] = $dark_light;

        extract($params);
        $params['content'] = $content;

        $output = '';

        $output .= hoshi_mikado_get_shortcode_module_template_part('templates/accordion-template', 'accordions', '', $params);

        return $output;

    }

    private function getLinkParams($params) {
        $linkParams = array();

        if(!empty($params['link']) && !empty($params['link_text'])) {
            $linkParams['link']      = $params['link'];
            $linkParams['link_text'] = $params['link_text'];

            $linkParams['link_target'] = !empty($params['link_target']) ? $params['link_target'] : '_self';
        }

        return $linkParams;
    }

    private function getNumberStyles($params) {
        $styles = array();

        if($params['number_color'] !== '') {
            $styles = 'color: '.$params['number_color'];
        }

        return $styles;
    }

}