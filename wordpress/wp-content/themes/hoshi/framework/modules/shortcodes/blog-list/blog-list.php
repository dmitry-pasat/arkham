<?php

namespace Hoshi\Modules\BlogList;

use Hoshi\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class BlogList
 */
class BlogList implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'mkd_blog_list';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        vc_map(array(
            'name'                      => esc_html__('Blog List', 'hoshi'),
            'base'                      => $this->base,
            'icon'                      => 'icon-wpb-blog-list extended-custom-icon',
            'category'                  => 'by MIKADO',
            'allowed_container_element' => 'vc_row',
            'params'                    => array(
                array(
                    'type'        => 'dropdown',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Type', 'hoshi'),
                    'param_name'  => 'type',
                    'value'       => array(
                        esc_html__('Grid Type 1', 'hoshi')  => 'grid-type-1',
                        esc_html__('Grid Type 2', 'hoshi')  => 'grid-type-2',
                        esc_html__('Masonry', 'hoshi')      => 'masonry',
                        esc_html__('Minimal', 'hoshi')      => 'minimal',
                        esc_html__('Image in box', 'hoshi') => 'image-in-box'
                    ),
                    'description' => '',
                    'save_always' => true
                ),
                array(
                    'type'        => 'textfield',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Number of Posts', 'hoshi'),
                    'param_name'  => 'number_of_posts',
                    'description' => ''
                ),
                array(
                    'type'        => 'dropdown',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Number of Columns', 'hoshi'),
                    'param_name'  => 'number_of_columns',
                    'value'       => array(
                        esc_html__('One', 'hoshi')   => '1',
                        esc_html__('Two', 'hoshi')   => '2',
                        esc_html__('Three', 'hoshi') => '3',
                        esc_html__('Four', 'hoshi')  => '4'
                    ),
                    'description' => '',
                    'dependency'  => Array('element' => 'type', 'value' => array('grid-type-1', 'grid-type-2')),
                    'save_always' => true
                ),
                array(
                    'type'        => 'dropdown',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Order By', 'hoshi'),
                    'param_name'  => 'order_by',
                    'value'       => array(
                        esc_html__('Title', 'hoshi') => 'title',
                        esc_html__('Date', 'hoshi')  => 'date'
                    ),
                    'save_always' => true,
                    'description' => ''
                ),
                array(
                    'type'        => 'dropdown',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Order', 'hoshi'),
                    'param_name'  => 'order',
                    'value'       => array(
                        esc_html__('ASC', 'hoshi')  => 'ASC',
                        esc_html__('DESC', 'hoshi') => 'DESC'
                    ),
                    'save_always' => true,
                    'description' => ''
                ),
                array(
                    'type'        => 'textfield',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Category Slug', 'hoshi'),
                    'param_name'  => 'category',
                    'description' => esc_html__('Leave empty for all or use comma for list', 'hoshi')
                ),
                array(
                    'type'        => 'dropdown',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Hide Image?', 'hoshi'),
                    'param_name'  => 'hide_image',
                    'value'       => array(
                        esc_html__('Default', 'hoshi') => '',
                        esc_html__('Yes', 'hoshi')     => 'yes',
                        esc_html__('No', 'hoshi')      => 'no'
                    ),
                    'description' => '',
                    'save_always' => true,
                    'dependency'  => array('element' => 'type', 'value' => array('grid-type-1', 'grid-type-2'))
                ),
                array(
                    'type'        => 'dropdown',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Image Size', 'hoshi'),
                    'param_name'  => 'image_size',
                    'value'       => array(
                        esc_html__('Original', 'hoshi')  => 'original',
                        esc_html__('Landscape', 'hoshi') => 'landscape',
                        esc_html__('Square', 'hoshi')    => 'square',
                        esc_html__('Custom', 'hoshi')    => 'custom'
                    ),
                    'description' => '',
                    'save_always' => true
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__('Custom Image Size', 'hoshi'),
                    'param_name'  => 'custom_image_size',
                    'description' => esc_html__('Enter image size in pixels: 200x100 (Width x Height).', 'hoshi'),
                    'dependency'  => array('element' => 'image_size', 'value' => 'custom')
                ),
                array(
                    'type'        => 'textfield',
                    'holder'      => 'div',
                    'class'       => '',
                    'heading'     => esc_html__('Text length', 'hoshi'),
                    'param_name'  => 'text_length',
                    'description' => esc_html__('Number of characters', 'hoshi')
                ),
                array(
                    'type'        => 'dropdown',
                    'class'       => '',
                    'heading'     => esc_html__('Title Tag', 'hoshi'),
                    'param_name'  => 'title_tag',
                    'value'       => array(
                        ''   => '',
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'h4' => 'h4',
                        'h5' => 'h5',
                        'h6' => 'h6',
                    ),
                    'description' => ''
                ),
                array(
                    'type'        => 'dropdown',
                    'class'       => '',
                    'heading'     => esc_html__('Style', 'hoshi'),
                    'param_name'  => 'style',
                    'value'       => array(
                        ''                         => '',
                        esc_html__('Light', 'hoshi') => 'light',
                        esc_html__('Dark', 'hoshi')  => 'dark'
                    ),
                    'description' => '',
                    'dependency'  => array(
                        'element' => 'type',
                        'value'   => array('grid-type-1', 'grid-type-2')
                    )
                )
            )
        ));

    }

    public function render($atts, $content = null) {

        $default_atts = array(
            'type'              => 'grid-type-1',
            'number_of_posts'   => '',
            'number_of_columns' => '',
            'image_size'        => 'original',
            'custom_image_size' => '',
            'order_by'          => '',
            'order'             => '',
            'category'          => '',
            'title_tag'         => 'h4',
            'text_length'       => '90',
            'hide_image'        => '',
            'style'             => ''
        );

        $params                   = shortcode_atts($default_atts, $atts);
        $params['holder_classes'] = $this->getBlogHolderClasses($params);

        if(empty($atts['title_tag'])) {
            if(in_array($params['type'], array('image-in-box', 'minimal'))) {
                $params['title_tag'] = 'h6';
            }
        }

        $queryArray             = $this->generateBlogQueryArray($params);
        $query_result           = new \WP_Query($queryArray);
        $params['query_result'] = $query_result;

        $params['use_custom_image_size'] = $params['image_size'] === 'custom' && !empty($params['custom_image_size']);

        if($params['use_custom_image_size']) {
            $params['custom_image_dimensions'] = $this->splitCustomImageSize($params['custom_image_size']);
        } else {
            $thumbImageSize             = $this->generateImageSize($params);
            $params['thumb_image_size'] = $thumbImageSize;
        }

        $params['hide_image'] = !empty($params['hide_image']) && $params['hide_image'] === 'yes';

        $html = '';
        $html .= hoshi_mikado_get_shortcode_module_template_part('templates/blog-list-holder', 'blog-list', '', $params);

        return $html;

    }

    /**
     * Generates holder classes
     *
     * @param $params
     *
     * @return string
     */
    private function getBlogHolderClasses($params) {
        $holderClasses = array(
            'mkd-blog-list-holder',
            $this->getColumnNumberClass($params),
            'mkd-'.$params['type']
        );

        if($params['hide_image'] === 'yes' && in_array($params['type'], array('grid-type-1', 'grid-type-2'))) {
            $holderClasses[] = 'mkd-blog-list-without-image';
        }

        if(in_array($params['type'], $this->getGridTypes())) {
            $holderClasses[] = 'mkd-blog-list-grid';

            if($params['style'] !== '') {
                $holderClasses[] = 'mkd-blog-list-'.$params['style'];
            }
        }

        return $holderClasses;

    }

    /**
     * Generates column classes for boxes type
     *
     * @param $params
     *
     * @return string
     */
    private function getColumnNumberClass($params) {

        $columnsNumber = '';
        $type          = $params['type'];
        $columns       = $params['number_of_columns'];

        if(in_array($type, $this->getGridTypes())) {
            switch($columns) {
                case 1:
                    $columnsNumber = 'mkd-one-column';
                    break;
                case 2:
                    $columnsNumber = 'mkd-two-columns';
                    break;
                case 3:
                    $columnsNumber = 'mkd-three-columns';
                    break;
                case 4:
                    $columnsNumber = 'mkd-four-columns';
                    break;
                default:
                    $columnsNumber = 'mkd-one-column';
                    break;
            }
        }

        return $columnsNumber;
    }

    private function getGridTypes() {
        return array(
            'grid-type-1',
            'grid-type-2'
        );
    }

    /**
     * Generates query array
     *
     * @param $params
     *
     * @return array
     */
    public function generateBlogQueryArray($params) {

        $queryArray = array(
            'orderby'        => $params['order_by'],
            'order'          => $params['order'],
            'posts_per_page' => $params['number_of_posts'],
            'category_name'  => $params['category']
        );

        return $queryArray;
    }

    /**
     * Generates image size option
     *
     * @param $params
     *
     * @return string
     */
    private function generateImageSize($params) {
        $imageSize = $params['image_size'];

        switch($imageSize) {
            case 'landscape':
                $thumbImageSize = 'hoshi_mikado_landscape';
                break;
            case 'square';
                $thumbImageSize = 'hoshi_mikado_square';
                break;
            default:
                $thumbImageSize = 'full';
                break;
        }

        return $thumbImageSize;
    }

    private function splitCustomImageSize($customImageSize) {
        if(!empty($customImageSize)) {
            $imageSize = trim($customImageSize);
            //Find digits
            preg_match_all('/\d+/', $imageSize, $matches);
            if(!empty($matches[0])) {
                return array(
                    $matches[0][0],
                    $matches[0][1]
                );
            }
        }

        return false;
    }


}
