<?php
namespace Hoshi\Modules\ProgressBar;

use Hoshi\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProgressBar implements ShortcodeInterface {
    private $base;

    function __construct() {
        $this->base = 'mkd_progress_bar';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        vc_map(array(
            'name'                      => esc_html__('Progress Bar', 'hoshi'),
            'base'                      => $this->base,
            'icon'                      => 'icon-wpb-progress-bar extended-custom-icon',
            'category'                  => 'by MIKADO',
            'allowed_container_element' => 'vc_row',
            'params'                    => array(
                array(
                    'type'        => 'textfield',
                    'admin_label' => true,
                    'heading'     => esc_html__('Title', 'hoshi'),
                    'param_name'  => 'title',
                    'description' => ''
                ),
                array(
                    'type'        => 'colorpicker',
                    'admin_label' => true,
                    'heading'     => esc_html__('Title Color', 'hoshi'),
                    'param_name'  => 'title_color',
                    'description' => ''
                ),
                array(
                    'type'        => 'textfield',
                    'admin_label' => true,
                    'heading'     => esc_html__('Percentage', 'hoshi'),
                    'param_name'  => 'percent',
                    'description' => ''
                ),
                array(
                    'type'        => 'colorpicker',
                    'admin_label' => true,
                    'heading'     => esc_html__('Percentage Color', 'hoshi'),
                    'param_name'  => 'percentage_color',
                    'description' => ''
                ),
                array(
                    'type'        => 'colorpicker',
                    'admin_label' => true,
                    'heading'     => esc_html__('Active Bar Color', 'hoshi'),
                    'param_name'  => 'bar_color_gradient_style',
                    'description' => ''
                ),
                array(
                    'type'        => 'colorpicker',
                    'admin_label' => true,
                    'heading'     => esc_html__('Inactive Bar Color', 'hoshi'),
                    'param_name'  => 'inactive_bar_color',
                    'description' => ''
                ),
            )
        ));

    }

    public function render($atts, $content = null) {
        $args   = array(
            'title'                    => '',
            'title_color'              => '',
            'percent'                  => '100',
            'percentage_color'         => '',
            'bar_color_gradient_style' => '',
            'inactive_bar_color'       => ''
        );
        $params = shortcode_atts($args, $atts);

        //Extract params for use in method
        extract($params);

        $params['percentage_classes'] = $this->getPercentageClasses($params);

        $params['active_bar_style']          = $this->getActiveBarStyle($params);
        $params['inactive_bar_style'] = $this->getInactiveBarStyle($params);
        $params['title_color']        = $this->getTitleColor($params);
        $params['percentage_color']   = $this->getPercentageColor($params);

        //init variables
        $html = hoshi_mikado_get_shortcode_module_template_part('templates/progress-bar-template', 'progress-bar', '', $params);

        return $html;

    }

    /**
     * Generates css classes for progress bar
     *
     * @param $params
     *
     * @return array
     */
    private function getPercentageClasses($params) {

        $percentClassesArray = array();

        if(!empty($params['percentage_type']) != '') {

            if($params['percentage_type'] == 'floating') {

                $percentClassesArray[] = 'mkd-floating';

                if($params['floating_type'] == 'floating_outside') {

                    $percentClassesArray[] = 'mkd-floating-outside';

                } elseif($params['floating_type'] == 'floating_inside') {

                    $percentClassesArray[] = 'mkd-floating-inside';
                }

            } elseif($params['percentage_type'] == 'static') {

                $percentClassesArray[] = 'mkd-static';

            }
        }

        return implode(' ', $percentClassesArray);
    }

    private function getActiveBarStyle($params) {
        $style = array();

        if($params['bar_color_gradient_style'] !== '') {
            $style[] = 'background-color: '.$params['bar_color_gradient_style'];
        }

        return $style;
    }

    private function getInactiveBarStyle($params) {
        $style = array();

        if($params['inactive_bar_color'] !== '') {
            $style[] = 'background-color: '.$params['inactive_bar_color'];
        }

        return $style;
    }

    private function getTitleColor($params) {
        $style = array();

        if($params['title_color'] !== '') {
            $style[] = 'color: '.$params['title_color'];
        }

        return $style;
    }

    private function getPercentageColor($params) {
        $style = array();

        if($params['percentage_color'] !== '') {
            $style[] = 'color: '.$params['percentage_color'];
        }

        return $style;
    }

}