<?php
namespace Hoshi\Modules\Shortcodes\SectionTitle;

use Hoshi\Modules\Shortcodes\Lib;

class SectionTitle implements Lib\ShortcodeInterface {
    private $base;

    /**
     * SectionTitle constructor.
     */
    public function __construct() {
        $this->base = 'mkd_section_title';

        add_action('vc_before_init', array($this, 'vcMap'));
    }


    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Section Title', 'hoshi'),
            'base'                      => $this->base,
            'category'                  => 'by MIKADO',
            'icon'                      => 'icon-wpb-section-title extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params'                    => array(
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__('Title', 'hoshi'),
                    'param_name'  => 'title',
                    'value'       => '',
                    'save_always' => true,
                    'admin_label' => true,
                    'description' => esc_html__('Enter title text', 'hoshi')
                ),
                array(
                    'type'        => 'colorpicker',
                    'heading'     => esc_html__('Color', 'hoshi'),
                    'param_name'  => 'title_color',
                    'value'       => '',
                    'save_always' => true,
                    'admin_label' => true,
                    'description' => esc_html__('Choose color of your title', 'hoshi')
                ),
                array(
                    'type'			=> 'textfield',
                    'heading'		=> esc_html__('Highlighted Title Text','hoshi'),
                    'param_name'	=> 'highlighted_text',
                    'value'			=> '',
                    'admin_label'	=> true,
                    'description'   =>esc_html__('Highlighted title text will be appended to title text','hoshi'),
                    'dependency'  => array('element' => 'type_out', 'value' => array('no'))
                ),
                array(
                    'type'        => 'colorpicker',
                    'heading'     => esc_html__('Highlighted text color', 'hoshi'),
                    'param_name'  => 'highlighted_color',
                    'value'       => '',
                    'save_always' => true,
                    'admin_label' => true,
                    'dependency'  => array('element' => 'type_out', 'value' => array('no')),
                    'description' => esc_html__('Choose color of highlighted text', 'hoshi')
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Text Transform', 'hoshi'),
                    'param_name'  => 'title_text_transform',
                    'value'       => array_flip(hoshi_mikado_get_text_transform_array(true)),
                    'save_always' => true,
                    'admin_label' => true,
                    'description' => esc_html__('Choose text transform for title', 'hoshi')
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Text Align', 'hoshi'),
                    'param_name'  => 'title_text_align',
                    'value'       => array(
                        ''                          => '',
                        esc_html__('Center', 'hoshi') => 'center',
                        esc_html__('Left', 'hoshi')   => 'left',
                        esc_html__('Right', 'hoshi')  => 'right'
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                    'description' => esc_html__('Choose text align for title', 'hoshi')
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__('Margin Bottom', 'hoshi'),
                    'param_name'  => 'margin_bottom',
                    'value'       => '',
                    'save_always' => true,
                    'admin_label' => true,
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Size', 'hoshi'),
                    'param_name'  => 'title_size',
                    'value'       => array(
                        esc_html__('Default', 'hoshi') => '',
                        esc_html__('Small', 'hoshi')   => 'small',
                        esc_html__('Medium', 'hoshi')  => 'medium',
                        esc_html__('Large', 'hoshi')   => 'large'
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                    'description' => esc_html__('Choose one of predefined title sizes', 'hoshi')
                ),
                array(
                    'type'        => 'dropdown',
                    'param_name'  => 'type_out',
                    'heading'     => esc_html__('Enable Type Out Effect', 'hoshi'),
                    'value'       => array(
                        esc_html__('No', 'hoshi')  => 'no',
                        esc_html__('Yes', 'hoshi') => 'yes',
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                    'group'       => esc_html__('TypeOut Options', 'hoshi'),
                    'description' => esc_html__('If set to Yes, you can enter two more Section Titles to follow the original one in a typing-like effect.', 'hoshi')
                ),
                array(
                    'type'        => 'textfield',
                    'param_name'  => 'title_2',
                    'heading'     => esc_html__('Section Title 2', 'hoshi'),
                    'admin_label' => true,
                    'group'       => esc_html__('TypeOut Options', 'hoshi'),
                    'dependency'  => array('element' => 'type_out', 'value' => array('yes'))
                ),
                array(
                    'type'        => 'textfield',
                    'param_name'  => 'title_3',
                    'heading'     => esc_html__('Section Title 3', 'hoshi'),
                    'admin_label' => true,
                    'group'       => esc_html__('TypeOut Options', 'hoshi'),
                    'dependency'  => array('element' => 'title_2', 'not_empty' => true)
                ),
                array(
                    'type'        => 'dropdown',
                    'param_name'  => 'loop',
                    'heading'     => esc_html__('Loop Titles', 'hoshi'),
                    'value'       => array(
                        esc_html__('No', 'hoshi')  => 'no',
                        esc_html__('Yes', 'hoshi') => 'yes',
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                    'group'       => esc_html__('TypeOut Options', 'hoshi'),
                    'dependency'  => array('element' => 'type_out', 'value' => array('yes'))
                ),
                array(
                    'type'        => 'dropdown',
                    'param_name'  => 'cursor_style',
                    'heading'     => esc_html__('Cursor Style', 'hoshi'),
                    'value'       => array(
                        esc_html__('Gradient', 'hoshi')    => 'gradient',
                        esc_html__('Solid Color', 'hoshi') => 'solid_color',
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                    'group'       => esc_html__('TypeOut Options', 'hoshi'),
                    'dependency'  => array('element' => 'type_out', 'value' => array('yes'))
                ),
                array(
                    'type'        => 'colorpicker',
                    'admin_label' => true,
                    'heading'     => esc_html__('Cursor Color Style', 'hoshi'),
                    'param_name'  => 'cursor_color_style',
                    'save_always' => true,
                    'description' => '',
                    'group'       => esc_html__('TypeOut Options', 'hoshi'),
                    'dependency'  => array('element' => 'cursor_style', 'value' => array('solid_color'))
                ),
                array(
                    'type'        => 'dropdown',
                    'admin_label' => true,
                    'heading'     => esc_html__('Cursor Gradient Style', 'hoshi'),
                    'param_name'  => 'cursor_gradient_style',
                    'value'       => array_flip(hoshi_mikado_get_gradient_bottom_to_top_styles('-text')),
                    'save_always' => true,
                    'description' => '',
                    'group'       => esc_html__('TypeOut Options', 'hoshi'),
                    'dependency'  => array('element' => 'cursor_style', 'value' => array('gradient'))
                ),
            )
        ));
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'title'                 => '',
            'title_color'           => '',
            'highlighted_text'      => '',
            'highlighted_color'      => '',
            'title_size'            => '',
            'title_text_transform'  => '',
            'title_text_align'      => '',
            'margin_bottom'         => '',
            'type_out'              => '',
            'title_2'               => '',
            'title_3'               => '',
            'loop'                  => '',
            'cursor_style'          => '',
            'cursor_gradient_style' => '',
            'cursor_color_style'    => '',
        );

        $params = shortcode_atts($default_atts, $atts);

        if($params['title'] !== '') {
            $params['section_title_classes'] = array('mkd-section-title');

            if($params['title_size'] !== '') {
                $params['section_title_classes'][] = 'mkd-section-title-'.$params['title_size'];
            }

            $params['section_title_styles'] = array();

            if($params['title_color'] !== '') {
                $params['section_title_styles'][] = 'color: '.$params['title_color'];
            }

            if($params['title_text_transform'] !== '') {
                $params['section_title_styles'][] = 'text-transform: '.$params['title_text_transform'];
            }

            if($params['title_text_align'] !== '') {
                $params['section_title_styles'][] = 'text-align: '.$params['title_text_align'];
            }

            if($params['margin_bottom'] !== '') {
                $params['section_title_styles'][] = 'margin-bottom: '.hoshi_mikado_filter_px($params['margin_bottom']).'px';
            }

            $params['title_tag']     = $this->getTitleTag($params);
            $params['type_out_data'] = $this->getTypeOutData($params);
            $params['highlighted_style'] = $this->getTitleHighlightedStyle($params);

            return hoshi_mikado_get_shortcode_module_template_part('templates/section-title-template', 'section-title', '', $params);
        }
    }

    private function getTitleTag($params) {
        switch($params['title_size']) {
            default:
                $titleTag = 'h2';
        }

        return $titleTag;
    }

    /**
     * Generates style for title highlighted text
     *
     * @param $params
     *
     * @return string
     */
    private function getTitleHighlightedStyle($params){
        $highlighted_style = array();

        if ($params['highlighted_color'] != ''){
            $highlighted_style[] = 'color: '.$params['highlighted_color'];
        }

        return implode(';', $highlighted_style);
    }

    /**
     * Return Type Out data
     *
     * @param $params
     *
     * @return string
     */
    private function getTypeOutData($params) {
        $type_out_data = array();

        if(!empty($params['loop'])) {
            $type_out_data['data-loop'] = $params['loop'];
        }

        if(!empty($params['cursor_gradient_style'])) {
            $type_out_data['data-cursor-gradient'] = $params['cursor_gradient_style'];
        }

        if(!empty($params['cursor_color_style'])) {
            $type_out_data['data-cursor-color'] = $params['cursor_color_style'];
        }

        return $type_out_data;
    }
}