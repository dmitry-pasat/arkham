<?php
namespace Hoshi\Modules\Shortcodes;

use Hoshi\Modules\Shortcodes\Lib\ShortcodeInterface;

class IconProgressBar implements ShortcodeInterface {
    private $base;

    /**
     * IconProgressBar constructor.
     */
    public function __construct() {
        $this->base = 'mkd_icon_progress_bar';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name'     => esc_html__('Icon Progress Bar', 'hoshi'),
            'base'     => $this->base,
            'category' => 'by MIKADO',
            'icon'     => 'icon-wpb-icon-progress-bar extended-custom-icon',
            'params'   => array_merge(
                hoshi_mikado_icon_collections()->getVCParamsArray(),
                array(
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Number of Icons', 'hoshi'),
                        'param_name'  => 'number_of_icons',
                        'value'       => '',
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Number of Active Icons', 'hoshi'),
                        'param_name'  => 'number_of_active_icons',
                        'value'       => '',
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Size', 'hoshi'),
                        'admin_label' => true,
                        'param_name'  => 'size',
                        'value'       => array(
                            esc_html__('Tiny', 'hoshi')       => 'mkd-icon-tiny',
                            esc_html__('Small', 'hoshi')      => 'mkd-icon-small',
                            esc_html__('Medium', 'hoshi')     => 'mkd-icon-medium',
                            esc_html__('Large', 'hoshi')      => 'mkd-icon-large',
                            esc_html__('Very Large', 'hoshi') => 'mkd-icon-huge'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Custom Icon Size (px)', 'hoshi'),
                        'admin_label' => true,
                        'param_name'  => 'custom_icon_size',
                        'value'       => '',
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Icon Color', 'hoshi'),
                        'admin_label' => true,
                        'param_name'  => 'icon_color',
                        'value'       => '',
                        'save_always' => true,
                        'group'       => esc_html__('Design Options', 'hoshi'),
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Active Icon Gradient Style', 'hoshi'),
                        'param_name'  => 'icon_gradient_style',
                        'admin_label' => true,
                        'value'       => array_flip(hoshi_mikado_get_gradient_left_to_right_styles('-text', true)),
                        'group'       => esc_html__('Design Options', 'hoshi'),
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Active Icon Color', 'hoshi'),
                        'admin_label' => true,
                        'param_name'  => 'active_icon_color',
                        'value'       => '',
                        'save_always' => true,
                        'dependency'  => array('element' => 'icon_gradient_style', 'value' => array('')),
                        'group'       => esc_html__('Design Options', 'hoshi'),
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Spacing Between Icons (px)', 'hoshi'),
                        'admin_label' => true,
                        'param_name'  => 'spacing_between_icons',
                        'value'       => '',
                        'save_always' => true,
                        'group'       => esc_html__('Design Options', 'hoshi'),
                    )
                )
            )
        ));
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'number_of_icons'        => '',
            'number_of_active_icons' => '',
            'size'                   => '',
            'custom_icon_size'       => '',
            'icon_gradient_style'    => '',
            'icon_color'             => '',
            'active_icon_color'      => '',
            'spacing_between_icons'  => ''
        );

        $default_atts = array_merge($default_atts, hoshi_mikado_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        $iconPackName = hoshi_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

        $params['icon']           = $params[$iconPackName];
        $params['data']           = $this->getDataAttrs($params);
        $params['icon_styles']    = $this->getIconStyles($params);
        $params['holder_classes'] = $this->getHolderClasses($params);
        if($params['icon_gradient_style'] !== '') {
            $params['icon_holder_classes'] = $params['icon_gradient_style'].'-off';
        }

        return hoshi_mikado_get_shortcode_module_template_part('templates/icon-progress-bar-template', 'icon-progress-bar', '', $params);
    }

    private function getDataAttrs($params) {
        $data = array();

        if($params['number_of_active_icons'] !== '') {
            $data['data-number-of-active-icons'] = $params['number_of_active_icons'];
        }

        if($params['active_icon_color'] !== '') {
            $data['data-icon-active-color'] = $params['active_icon_color'];
        }

        return $data;
    }

    private function getIconStyles($params) {
        $styles = array();

        if($params['icon_color'] !== '') {
            $styles[] = 'color: '.$params['icon_color'];
        }

        if($params['custom_icon_size'] !== '') {
            $styles[] = 'font-size: '.hoshi_mikado_filter_px($params['custom_icon_size']).'px';
        }

        if($params['spacing_between_icons'] !== '') {
            $styles[] = 'margin-right: '.hoshi_mikado_filter_px($params['spacing_between_icons']).'px';
        }

        return implode(';', $styles);
    }

    private function getHolderClasses($params) {
        $classes = array('mkd-icon-progress-bar');

        if($params['size'] !== '') {
            $classes[] = $params['size'];
        }

        return $classes;
    }
}