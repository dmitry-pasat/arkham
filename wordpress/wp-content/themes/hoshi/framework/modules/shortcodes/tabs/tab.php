<?php
namespace Hoshi\Modules\Tab;

use Hoshi\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Tab
 */
class Tab implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'mkd_tab';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        vc_map(array(
            'name'                    => esc_html__('Tab', 'hoshi'),
            'base'                    => $this->getBase(),
            'as_parent'               => array('except' => 'vc_row'),
            'as_child'                => array('only' => 'mkd_tabs'),
            'is_container'            => true,
            'category'                => 'by MIKADO',
            'icon'                    => 'icon-wpb-tab-item extended-custom-icon',
            'show_settings_on_create' => true,
            'js_view'                 => 'VcColumnView',
            'params'                  => array_merge(
                \HoshiMikadoIconCollections::get_instance()->getVCParamsArray(),
                array(
                    array(
                        'type'        => 'textfield',
                        'admin_label' => true,
                        'heading'     => esc_html__('Title', 'hoshi'),
                        'param_name'  => 'tab_title',
                        'description' => ''
                    ),
                    array(
                        'type'        => 'textfield',
                        'admin_label' => true,
                        'heading'     => esc_html__('Subtitle', 'hoshi'),
                        'param_name'  => 'tab_subtitle',
                        'description' => ''
                    ),
                    array(
                        'type'        => 'attach_image',
                        'admin_label' => true,
                        'heading'     => esc_html__('Background Image', 'hoshi'),
                        'param_name'  => 'background_image',
                        'description' => ''
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Tabs Content Padding', 'hoshi'),
                        'param_name'  => 'tabs_content_padding',
                        'admin_label' => true,
                        'value'       => '',
                    ),
                )
            )
        ));

    }

    public function render($atts, $content = null) {

        $default_atts = array(
            'tab_title'        => 'Tab',
            'tab_id'           => '',
            'background_image' => '',
            'tabs_content_padding'      => '',
        );

        $default_atts = array_merge($default_atts, hoshi_mikado_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);
        extract($params);

        $iconPackName   = hoshi_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
        $params['icon'] = $params[$iconPackName];

        $rand_number         = rand(0, 1000);
        $params['tab_title'] = $params['tab_title'].'-'.$rand_number;

        $params['content']     = $content;
        $params['tab_styles']  = $this->getImageStyles($params);
        $params['tab_classes'] = $this->getTabClasses($params);
        $params['tabs_content_padding'] = $this->getTabsContentPadding($params);

        $output = '';
        $output .= hoshi_mikado_get_shortcode_module_template_part('templates/tab_content', 'tabs', '', $params);

        return $output;

    }

    private function getImageStyles($params) {
        $styles = array();

        if($params['background_image'] != '') {
            $styles[] = 'background-image: url('.wp_get_attachment_url($params['background_image']).')';
        }

        return $styles;
    }

    private function getTabClasses($params) {
        $classes = array('mkd-tab-container');

        if($params['background_image'] != '') {
            $classes[] = 'mkd-tab-image';
        }

        return $classes;
    }

    /**
     * @param $params
     * @return string
     *
     * Generates padding for tabs content
     */

    private function getTabsContentPadding($params) {
        $tabs_content_padding_styles = array();

        if ($params['tabs_content_padding'] != '') {
            $tabs_content_padding_styles[] = 'padding: ' . $params['tabs_content_padding'] . ';';
        }

        return $tabs_content_padding_styles;
    }
}