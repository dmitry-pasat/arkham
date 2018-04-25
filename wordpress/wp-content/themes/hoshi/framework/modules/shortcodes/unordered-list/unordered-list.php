<?php
namespace Hoshi\Modules\UnorderedList;

use Hoshi\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class unordered List
 */
class UnorderedList implements ShortcodeInterface {

    private $base;

    function __construct() {
        $this->base = 'mkd_unordered_list';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**\
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        vc_map(array(
            'name'                      => esc_html__('List - Unordered', 'hoshi'),
            'base'                      => $this->base,
            'icon'                      => 'icon-wpb-unordered-list extended-custom-icon',
            'category'                  => 'by MIKADO',
            'allowed_container_element' => 'vc_row',
            'params'                    => array(
                array(
                    'type'        => 'dropdown',
                    'admin_label' => true,
                    'heading'     => esc_html__('Style', 'hoshi'),
                    'param_name'  => 'style',
                    'value'       => array(
                        esc_html__('Circle', 'hoshi') => 'circle',
                        esc_html__('Line', 'hoshi')   => 'line'
                    ),
                    'description' => ''
                ),
                array(
                    'type'        => 'dropdown',
                    'admin_label' => true,
                    'heading'     => esc_html__('Animate List', 'hoshi'),
                    'param_name'  => 'animate',
                    'value'       => array(
                        esc_html__('No', 'hoshi')  => 'no',
                        esc_html__('Yes', 'hoshi') => 'yes'
                    ),
                    'description' => ''
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Font Weight', 'hoshi'),
                    'param_name'  => 'font_weight',
                    'value'       => array(
                        esc_html__('Default', 'hoshi') => '',
                        esc_html__('Light', 'hoshi')   => 'light',
                        esc_html__('Normal', 'hoshi')  => 'normal',
                        esc_html__('Bold', 'hoshi')    => 'bold'
                    ),
                    'description' => ''
                ),
                array(
                    'type'       => 'textfield',
                    'heading'    => esc_html__('Padding left (px)', 'hoshi'),
                    'param_name' => 'padding_left',
                    'value'      => ''
                ),
                array(
                    'type'        => 'textarea_html',
                    'heading'     => esc_html__('Content', 'hoshi'),
                    'param_name'  => 'content',
                    'value'       => '<ul><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ul>',
                    'description' => ''
                )
            )
        ));

    }


    public function render($atts, $content = null) {
        $args   = array(
            'style'        => '',
            'animate'      => '',
            'font_weight'  => '',
            'padding_left' => ''
        );
        $params = shortcode_atts($args, $atts);

        //Extract params for use in method
        extract($params);

        $list_item_classes = "";

        if($style != '') {
            if($style == 'circle') {
                $list_item_classes .= ' mkd-circle';
            } elseif($style == 'line') {
                $list_item_classes .= ' mkd-line';
            }
        }

        if($animate == 'yes') {
            $list_item_classes .= ' mkd-animate-list';
        }

        $list_style = '';
        if($padding_left != '') {
            $list_style .= 'padding-left: '.$padding_left.'px;';
        }
        $html = '';

        $html .= '<div class="mkd-unordered-list '.$list_item_classes.'" '.hoshi_mikado_get_inline_style($list_style).'>';
        $html .= hoshi_mikado_remove_auto_ptag($content, true);
        $html .= '</div>';

        return $html;
    }

}