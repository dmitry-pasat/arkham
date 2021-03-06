<?php
namespace Hoshi\Modules\Header\Types;

use Hoshi\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header Standard layout and option
 *
 * Class HeaderStandard
 */
class HeaderCentered extends HeaderType {
    protected $heightOfTransparency;
    protected $heightOfCompleteTransparency;
    protected $headerHeight;
    protected $mobileHeaderHeight;

    /**
     * Sets slug property which is the same as value of option in DB
     */
    public function __construct() {
        $this->slug = 'header-centered';

        if(!is_admin()) {

            $menuAreaHeight       = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('menu_area_height_header_centered'));
            $this->menuAreaHeight = $menuAreaHeight !== '' ? $menuAreaHeight : 86;

            $mobileHeaderHeight       = hoshi_mikado_filter_px(hoshi_mikado_options()->getOptionValue('mobile_header_height'));
            $this->mobileHeaderHeight = $mobileHeaderHeight !== '' ? $mobileHeaderHeight : 100;

            add_action('wp', array($this, 'setHeaderHeightProps'));

            add_filter('hoshi_mikado_js_global_variables', array($this, 'getGlobalJSVariables'));
            add_filter('hoshi_mikado_per_page_js_vars', array($this, 'getPerPageJSVariables'));
            add_filter('hoshi_mikado_add_page_custom_style', array($this, 'headerPerPageStyles'));
        }
    }

    public function headerPerPageStyles($style) {
        $id                     = hoshi_mikado_get_page_id();
        $class_prefix           = hoshi_mikado_get_unique_page_class();
        $main_menu_style        = array();
        $main_menu_grid_style   = array();
        $disable_border = hoshi_mikado_get_meta_field_intersect('menu_area_border_header_centered',$id) == 'no';
        $disable_grid_border = hoshi_mikado_get_meta_field_intersect('menu_area_in_grid_border_header_centered',$id) == 'no';

        $main_menu_selector = array($class_prefix.'.mkd-header-centered .mkd-menu-area');
        $main_menu_grid_selector = array($class_prefix.'.mkd-header-centered .mkd-page-header .mkd-menu-area .mkd-grid .mkd-vertical-align-containers');

        /* header style - start */
        if(!$disable_border) {
            $header_border_color = get_post_meta($id, 'mkd_menu_area_border_color_header_centered_meta', true);

            if($header_border_color !== '') {
                $main_menu_style['border-color'] = $header_border_color;
            }
        }

        $menu_area_background_color        = get_post_meta($id, 'mkd_menu_area_background_color_header_centered_meta', true);
        $menu_area_background_transparency = get_post_meta($id, 'mkd_menu_area_background_transparency_header_centered_meta', true);

        if($menu_area_background_transparency === '') {
            $menu_area_background_transparency = 1;
        }

        $menu_area_background_color_rgba = hoshi_mikado_rgba_color($menu_area_background_color, $menu_area_background_transparency);

        if($menu_area_background_color_rgba !== null) {
            $main_menu_style['background-color'] = $menu_area_background_color_rgba;
        }
        /* header style - end */

        /* header in grid style - start */

        if(!$disable_grid_border) {
            $header_grid_border_color = get_post_meta($id, 'mkd_menu_area_in_grid_border_color_header_centered_meta', true);

            if($header_grid_border_color !== '') {
                $main_menu_grid_style['border-bottom'] = '1px solid '.$header_grid_border_color;
            }
        }

        $menu_area_grid_background_color        = get_post_meta($id, 'mkd_menu_area_grid_background_color_header_centered_meta', true);
        $menu_area_grid_background_transparency = get_post_meta($id, 'mkd_menu_area_grid_background_transparency_header_centered_meta', true);

        if($menu_area_grid_background_transparency === '') {
            $menu_area_grid_background_transparency = 1;
        }

        $menu_area_grid_background_color_rgba = hoshi_mikado_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);

        if($menu_area_grid_background_color_rgba !== null) {
            $main_menu_grid_style['background-color'] = $menu_area_grid_background_color_rgba;
        }

        /* header in grid style - end */

        $style[] = hoshi_mikado_dynamic_css($main_menu_selector, $main_menu_style);
        $style[] = hoshi_mikado_dynamic_css($main_menu_grid_selector, $main_menu_grid_style);

        return $style;
    }

    /**
     * Loads template file for this header type
     *
     * @param array $parameters associative array of variables that needs to passed to template
     */
    public function loadTemplate($parameters = array()) {
        $id  = hoshi_mikado_get_page_id();

        $parameters['menu_area_in_grid'] = hoshi_mikado_get_meta_field_intersect('menu_area_in_grid_header_centered',$id) == 'yes' ? true : false;

        $parameters = apply_filters('hoshi_mikado_header_centered_parameters', $parameters);

        hoshi_mikado_get_module_template_part('templates/types/'.$this->slug, $this->moduleName, '', $parameters);
    }

    /**
     * Sets header height properties after WP object is set up
     */
    public function setHeaderHeightProps() {
        $this->heightOfTransparency         = $this->calculateHeightOfTransparency();
        $this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
        $this->headerHeight                 = $this->calculateHeaderHeight();
        $this->mobileHeaderHeight           = $this->calculateMobileHeaderHeight();
    }

    /**
     * Returns total height of transparent parts of header
     *
     * @return int
     */
    public function calculateHeightOfTransparency() {
        $id                 = hoshi_mikado_get_page_id();
        $transparencyHeight = 0;

        if(get_post_meta($id, 'mkd_menu_area_background_color_header_centered_meta', true) !== '') {
            $menuAreaTransparent = get_post_meta($id, 'mkd_menu_area_background_color_header_centered_meta', true) !== '' &&
                get_post_meta($id, 'mkd_menu_area_background_transparency_header_centered_meta', true) !== '1';
        } elseif(hoshi_mikado_options()->getOptionValue('menu_area_background_color_header_centered') == '') {
            $menuAreaTransparent = hoshi_mikado_options()->getOptionValue('menu_area_grid_background_color_header_centered') !== '' &&
                hoshi_mikado_options()->getOptionValue('menu_area_grid_background_transparency_header_centered') !== '1';
        } else {
            $menuAreaTransparent = hoshi_mikado_options()->getOptionValue('menu_area_background_color_header_centered') !== '' &&
                hoshi_mikado_options()->getOptionValue('menu_area_background_transparency_header_centered') !== '1';
        }


        $sliderExists        = get_post_meta($id, 'mkd_page_slider_meta', true) !== '';
        $contentBehindHeader = get_post_meta($id, 'mkd_page_content_behind_header_meta', true) === 'yes';

        if($sliderExists || $contentBehindHeader) {
            $menuAreaTransparent = true;
        }

        if($menuAreaTransparent) {
            $transparencyHeight = $this->menuAreaHeight;

            if(($sliderExists && hoshi_mikado_is_top_bar_enabled())
                || hoshi_mikado_is_top_bar_enabled() && hoshi_mikado_is_top_bar_transparent()
            ) {
                $transparencyHeight += hoshi_mikado_get_top_bar_height();
            }
        }

        return $transparencyHeight;
    }

    /**
     * Returns height of completely transparent header parts
     *
     * @return int
     */
    public function calculateHeightOfCompleteTransparency() {
        $id                 = hoshi_mikado_get_page_id();
        $transparencyHeight = 0;

        if(get_post_meta($id, 'mkd_menu_area_background_color_header_centered_meta', true) !== '') {
            $menuAreaTransparent = get_post_meta($id, 'mkd_menu_area_background_color_header_centered_meta', true) !== '' &&
                get_post_meta($id, 'mkd_menu_area_background_transparency_header_centered_meta', true) === '0';
        } elseif(hoshi_mikado_options()->getOptionValue('menu_area_background_color_header_centered') == '') {
            $menuAreaTransparent = hoshi_mikado_options()->getOptionValue('menu_area_grid_background_color_header_centered') !== '' &&
                hoshi_mikado_options()->getOptionValue('menu_area_grid_background_transparency_header_centered') === '0';
        } else {
            $menuAreaTransparent = hoshi_mikado_options()->getOptionValue('menu_area_background_color_header_centered') !== '' &&
                hoshi_mikado_options()->getOptionValue('menu_area_background_transparency_header_centered') === '0';
        }

        if($menuAreaTransparent) {
            $transparencyHeight = $this->menuAreaHeight;
        }

        return $transparencyHeight;
    }


    /**
     * Returns total height of header
     *
     * @return int|string
     */
    public function calculateHeaderHeight() {
        $headerHeight = $this->menuAreaHeight;
        if(hoshi_mikado_is_top_bar_enabled()) {
            $headerHeight += hoshi_mikado_get_top_bar_height();
        }

        return $headerHeight;
    }

    /**
     * Returns total height of mobile header
     *
     * @return int|string
     */
    public function calculateMobileHeaderHeight() {
        $mobileHeaderHeight = $this->mobileHeaderHeight;

        return $mobileHeaderHeight;
    }

    /**
     * Returns global js variables of header
     *
     * @param $globalVariables
     *
     * @return int|string
     */
    public function getGlobalJSVariables($globalVariables) {
        $globalVariables['mkdLogoAreaHeight']     = 0;
        $globalVariables['mkdMenuAreaHeight']     = $this->headerHeight;
        $globalVariables['mkdMobileHeaderHeight'] = $this->mobileHeaderHeight;

        return $globalVariables;
    }

    /**
     * Returns per page js variables of header
     *
     * @param $perPageVars
     *
     * @return int|string
     */
    public function getPerPageJSVariables($perPageVars) {
        //calculate transparency height only if header has no sticky behaviour
        if(!in_array(hoshi_mikado_get_meta_field_intersect('header_behaviour'), array(
            'sticky-header-on-scroll-up',
            'sticky-header-on-scroll-down-up'
        ))
        ) {
            $perPageVars['mkdHeaderTransparencyHeight'] = $this->headerHeight - (hoshi_mikado_get_top_bar_height() + $this->heightOfCompleteTransparency);
        } else {
            $perPageVars['mkdHeaderTransparencyHeight'] = 0;
        }

        return $perPageVars;
    }
}