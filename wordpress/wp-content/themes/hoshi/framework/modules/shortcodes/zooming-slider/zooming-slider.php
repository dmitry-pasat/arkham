<?php

namespace Hoshi\Modules\Shortcodes\ZoomingSlider;

use Hoshi\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ZoomingSlider
 */
class ZoomingSlider implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     * ZoomingSlider constructor.
     */
    public function __construct() {
        $this->base = 'mkd_zooming_slider';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     *
     */
    public function vcMap() {
        vc_map(array(
            'name'            => esc_html__('Zooming Slider', 'hoshi'),
            'base'            => $this->base,
            'as_parent'       => array('only' => 'mkd_zooming_slider_item'),
            'content_element' => true,
            'category'        => 'by MIKADO',
            'icon'            => 'icon-wpb-zooming-slider extended-custom-icon',
            'js_view'         => 'VcColumnView',
            'params'          => array(
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Autoplay Slider', 'hoshi'),
                    'param_name'  => 'autoplay',
                    'admin_label' => true,
                    'value'       => array(
                        esc_html__('No', 'hoshi')  => 'false',
                        esc_html__('Yes', 'hoshi') => 'true'
                    )
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Slides to show', 'hoshi'),
                    'param_name'  => 'slides_to_show',
                    'admin_label' => true,
                    'value'       => array(
                        '5' => '5',
                        '3' => '3'
                    ),
                    'save_always' => true
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__('Left/Right Margin (%)', 'hoshi'),
                    'param_name'  => 'margin',
                    'description' => esc_html__('Set left/right margin of holder relative to container', 'hoshi')
                )
            )
        ));
    }

    /**
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_attrs = array(
            'autoplay'       => 'false',
            'slides_to_show' => '',
            'margin'         => ''
        );
        $params        = shortcode_atts($default_attrs, $atts);

        $params['content']       = $content;
        $params['holder_margin'] = '';
        if($params['margin'] !== '') {
            $params['holder_margin'] = 'margin: 0 '.$params['margin'].'%';
        }

        return hoshi_mikado_get_shortcode_module_template_part('templates/zooming-slider-holder', 'zooming-slider', '', $params);
    }
}