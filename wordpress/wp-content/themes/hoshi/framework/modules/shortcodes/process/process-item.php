<?php
namespace Hoshi\Modules\Shortcodes\Process;

use Hoshi\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProcessItem implements ShortcodeInterface {
    private $base;

    public function __construct() {
        $this->base = 'mkd_process_item';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name'                    => esc_html__('Process Item', 'hoshi'),
            'base'                    => $this->getBase(),
            'as_child'                => array('only' => 'mkd_process_holder'),
            'category'                => 'by MIKADO',
            'icon'                    => 'icon-wpb-process-item extended-custom-icon',
            'show_settings_on_create' => true,
            'params'                  => array(
                array(
                    'type'       => 'attach_image',
                    'heading'    => esc_html__('Image', 'hoshi'),
                    'param_name' => 'process_image'
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__('Number', 'hoshi'),
                    'param_name'  => 'number',
                    'save_always' => true,
                    'admin_label' => true
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__('Title', 'hoshi'),
                    'param_name'  => 'title',
                    'save_always' => true,
                    'admin_label' => true
                ),
                array(
                    'type'        => 'textarea',
                    'heading'     => esc_html__('Text', 'hoshi'),
                    'param_name'  => 'text',
                    'save_always' => true,
                    'admin_label' => true
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Gradient Style on hover', 'hoshi'),
                    'param_name'  => 'hover_gradient_style',
                    'admin_label' => true,
                    'value'       => array(
                        esc_html__('Yes', 'hoshi') => 'yes',
                        esc_html__('No', 'hoshi')  => 'no'
                    ),
                    'save_always' => true,
                    'group'       => esc_html__('Design Options', 'hoshi'),
                ),
            )
        ));
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'process_image'         => '',
            'number'                => '',
            'hover_gradient_style'  => '',
            'title'                 => '',
            'text'                  => '',
        );

        $params = shortcode_atts($default_atts, $atts);

        $params['background_style'] = $this->getBackgroundStyle($params);
        $params['item_classes'] = $this->getItemClasses($params);

        return hoshi_mikado_get_shortcode_module_template_part('templates/process-item-template', 'process', '', $params);
    }

    /**
     * Return Process background style
     *
     * @param $params
     *
     * @return false|string
     */

    private function getBackgroundStyle($params){
        $background_style = array();

        if ($params['process_image']){
            $background_style[] = 'background-image: url('.wp_get_attachment_url($params['process_image']).')';
        }

        return implode('; ', $background_style);
    }

    /**
     * Return Process holder classes
     *
     * @param $params
     *
     * @return false|string
     */

    private function getItemClasses($params){
        $item_classes = array(
            'mkd-process-item-holder'
        );

        if($params['process_image']) {
            $item_classes[] = 'mkd-process-background-image';
        }

        if($params['hover_gradient_style'] === 'yes') {
            $item_classes[] = 'mkd-process-gradient-hover';
        }

        return implode(' ', $item_classes);
    }

}