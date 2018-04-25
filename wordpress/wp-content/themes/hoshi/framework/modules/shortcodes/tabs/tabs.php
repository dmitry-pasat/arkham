<?php
namespace Hoshi\Modules\Tabs;

use Hoshi\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Tabs
 */
class Tabs implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'mkd_tabs';
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
            'name'                    => esc_html__('Tabs', 'hoshi'),
            'base'                    => $this->getBase(),
            'as_parent'               => array('only' => 'mkd_tab'),
            'content_element'         => true,
            'show_settings_on_create' => true,
            'category'                => 'by MIKADO',
            'icon'                    => 'icon-wpb-tab extended-custom-icon',
            'js_view'                 => 'VcColumnView',
            'params'                  => array(
                array(
                    'heading'     => esc_html__('Style', 'hoshi'),
                    'type'        => 'dropdown',
                    'admin-label' => true,
                    'param_name'  => 'style',
                    'value'       => array(
                        esc_html__('Horizontal With Text', 'hoshi')           => 'horizontal_with_text',
                        esc_html__('Horizontal With Icons', 'hoshi')          => 'horizontal_with_icons',
                        esc_html__('Horizontal With Text And Icons', 'hoshi') => 'horizontal_with_text_and_icons',
                        esc_html__('Vertical With Text', 'hoshi')             => 'vertical_with_text',
                        esc_html__('Vertical With Icons', 'hoshi')            => 'vertical_with_icons',
                        esc_html__('Vertical With Text and Icons', 'hoshi')   => 'vertical_with_text_and_icons'
                    ),
                    'save_always' => true,
                    'description' => ''
                ),
                array(
                    'heading'     => esc_html__('Navigation Width', 'hoshi'),
                    'type'        => 'dropdown',
                    'admin-label' => true,
                    'param_name'  => 'navigation_width',
                    'value'       => array(
                        esc_html__('Medium', 'hoshi') => '',
                        esc_html__('Small', 'hoshi')  => 'small'
                    ),
                    'save_always' => true,
                    'description' => '',
                    'dependency'  => array(
                        'element' => 'style',
                        'value'   => array(
                            'vertical_with_text',
                            'vertical_with_icons',
                            'vertical_with_text_and_icons'
                        )
                    )
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Active Tab Style', 'hoshi'),
                    'param_name'  => 'active_tab_style',
                    'value'       => array(
                        esc_html__('Default', 'hoshi') => '',
                        esc_html__('Style1', 'hoshi')  => 'active-tab-style-1',
                        esc_html__('Style2', 'hoshi')  => 'active-tab-style-2',
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                    'dependency'  => array(
                        'element' => 'style',
                        'value'   => array(
                            'vertical_with_text',
                            'vertical_with_icons',
                            'vertical_with_text_and_icons'
                        )
                    )
                ),
            )
        ));

    }

    public function render($atts, $content = null) {
        $args = array(
            'style'                     => 'horizontal with_text',
            'navigation_width'          => '',
            'gradient_style'            => '',
            'active_tab_style'          => '',
        );

        $args   = array_merge($args, hoshi_mikado_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($args, $atts);

        extract($params);

        // Extract tab titles
        preg_match_all('/ tab_title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
        $tab_titles = array();

        /**
         * get tab titles array
         *
         */
        if(isset($matches[0])) {
            $tab_titles = $matches[0];
        }

        $tab_title_array = array();

        foreach($tab_titles as $tab) {
            preg_match('/ tab_title="([^\"]+)"/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE);
            $tab_title_array[] = $tab_matches[1][0];
        }

        // Extract tab subtitles
        preg_match_all('/ tab_subtitle="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
        $tab_subtitles = array();

        /**
         * get tab subtitles array
         *
         */
        if(isset($matches[0])) {
            $tab_subtitles = $matches[0];
        }

        $tab_subtitle_array = array();

        foreach($tab_subtitles as $tab) {
            preg_match('/ tab_subtitle="([^\"]+)"/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE);
            $tab_subtitle_array[] = $tab_matches[1][0];
        }

        $tabs_title_subtitle_array = array();
        for($i = 0; $i < count($tab_title_array); $i++) {
            $tabs_title_subtitle_array[$i]['tab_title']    = isset($tab_title_array[$i]) ? $tab_title_array[$i] : '';
            $tabs_title_subtitle_array[$i]['tab_subtitle'] = isset($tab_subtitle_array[$i]) ? $tab_subtitle_array[$i] : '';
        }
        $params['tabs_titles_subtitles'] = $tabs_title_subtitle_array;
        $params['tab_class']             = $this->getTabClass($params);
        $params['content']               = $content;
        $params['active_tab_style'] = $this->getActiveBackgroundStyle($params);
        $tabs_type                       = $this->getTabType($params);

        $output = '';

        $output .= hoshi_mikado_get_shortcode_module_template_part('templates/'.$tabs_type, 'tabs', '', $params);

        return $output;
    }

    /**
     * Generates tabs type
     *
     * @param $params
     *
     * @return string
     */
    private function getTabType($params) {
        $tabStyle = $params['style'];
        $tabType  = 'with_text';
        if(strpos($tabStyle, 'with_text_and_icons') !== false) {
            $tabType = 'with_text_and_icons';
        } elseif(strpos($tabStyle, 'with_icons') !== false) {
            $tabType = 'with_icons';
        } elseif(strpos($tabStyle, 'with_text') !== false) {
            $tabType = 'with_text';
        }

        return $tabType;
    }

    /**
     * Generates tabs class
     *
     * @param $params
     *
     * @return string
     */
    private function getTabClass($params) {
        $tabStyle = $params['style'];
        $tabClass = 'with_text';

        switch($tabStyle) {
            case 'horizontal_with_text':
                $tabClass = 'mkd-horizontal mkd-tab-text';
                break;
            case 'horizontal_with_icons':
                $tabClass = 'mkd-horizontal mkd-tab-icon';
                break;
            case 'horizontal_with_text_and_icons':
                $tabClass = 'mkd-horizontal mkd-tab-text-icon';
                break;
            case 'vertical_with_text':
                $tabClass = 'mkd-vertical mkd-tab-text';
                break;
            case 'vertical_with_icons':
                $tabClass = 'mkd-vertical mkd-tab-icon';
                break;
            case 'vertical_with_text_and_icons':
                $tabClass = 'mkd-vertical mkd-tab-text-icon';
                break;
        }

        if(in_array($tabStyle, array('vertical_with_text', 'vertical_with_icons', 'vertical_with_text_and_icons'))) {
            if($params['navigation_width'] !== '') {
                $tabClass .= ' mkd-vertical-nav-width-'.$params['navigation_width'];
            }
        }

        return $tabClass;
    }

    /**
     * Generates tabs class
     *
     * @param $params
     *
     * @return string
     */
    private function getActiveBackgroundStyle($params) {
        $tabStyle      = $params['style'];
        $activebackgroundStyle = '';
        if(in_array($tabStyle, array('vertical_with_text', 'vertical_with_icons', 'vertical_with_text_and_icons'))) {
            $activebackgroundStyle = $params['active_tab_style'];
        }

        return $activebackgroundStyle;
    }
}