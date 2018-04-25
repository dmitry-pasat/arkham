<?php

/**
 * Widget that adds search icon that triggers opening of search form
 *
 * Class Mikado_Search_Opener
 */
class HoshiMikadoSearchOpener extends HoshiMikadoWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'mkd_search_opener', // Base ID
            esc_html__('Mikado Search Opener', 'hoshi') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'name'        => 'search_icon_size',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Size (px)', 'hoshi'),
                'description' => esc_html__('Define size for Search icon', 'hoshi')
            ),
            array(
                'name'        => 'search_icon_color',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Color', 'hoshi'),
                'description' => esc_html__('Define color for Search icon', 'hoshi')
            ),
            array(
                'name'        => 'search_icon_hover_color',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Hover Color', 'hoshi'),
                'description' => esc_html__('Define hover color for Search icon', 'hoshi')
            ),
            array(
                'name'        => 'show_label',
                'type'        => 'dropdown',
                'title'       => esc_html__('Enable Search Icon Text', 'hoshi'),
                'description' => esc_html__('Enable this option to show \'Search\' text next to search icon in header', 'hoshi'),
                'options'     => array(
                    ''    => '',
                    'yes' => esc_html__('Yes', 'hoshi'),
                    'no'  => esc_html__('No', 'hoshi')
                )
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        global $hoshi_options, $hoshi_IconCollections;

        $search_type_class         = 'mkd-search-opener';
        $fullscreen_search_overlay = false;
        $search_opener_styles      = array();
        $show_search_text          = $instance['show_label'] == 'yes' || $hoshi_options['enable_search_icon_text'] == 'yes' ? true : false;

        if(isset($hoshi_options['search_type']) && $hoshi_options['search_type'] == 'search_covers_header') {
            if(isset($hoshi_options['search_cover_only_bottom_yesno']) && $hoshi_options['search_cover_only_bottom_yesno'] == 'yes') {
                $search_type_class .= ' search_covers_only_bottom';
            }
        }

        if(!empty($instance['search_icon_size'])) {
            $search_opener_styles[] = 'font-size: '.$instance['search_icon_size'].'px';
        }

        if(!empty($instance['search_icon_color'])) {
            $search_opener_styles[] = 'color: '.$instance['search_icon_color'];
        }

        print $args['before_widget'];

        ?>

        <a <?php echo hoshi_mikado_get_inline_attr($instance['search_icon_hover_color'], 'data-hover-color'); ?>
            <?php hoshi_mikado_inline_style($search_opener_styles); ?>
            <?php hoshi_mikado_class_attribute($search_type_class); ?> href="javascript:void(0)">
            <?php if(isset($hoshi_options['search_icon_pack'])) {
                $hoshi_IconCollections->getSearchIcon($hoshi_options['search_icon_pack'], false);
            } ?>
            <?php if($show_search_text) { ?>
                <span class="mkd-search-icon-text"><?php esc_html_e('Search', 'hoshi'); ?></span>
            <?php } ?>
        </a>

        <?php if($fullscreen_search_overlay) { ?>
            <div class="mkd-fullscreen-search-overlay"></div>
        <?php } ?>

        <?php do_action('hoshi_mikado_after_search_opener'); ?>

        <?php print $args['after_widget']; ?>
    <?php }
}