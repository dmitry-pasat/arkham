<?php

class HoshiMikadoSideAreaOpener extends HoshiMikadoWidget {
    public function __construct() {
        parent::__construct(
            'mkd_side_area_opener', // Base ID
            esc_html__('Mikado Side Area Opener', 'hoshi') // Name
        );

        $this->setParams();
    }

    protected function setParams() {

        $this->params = array(
            array(
                'name'        => 'side_area_opener_icon_color',
                'type'        => 'textfield',
                'title'       => esc_html__('Icon Color', 'hoshi'),
                'description' => esc_html__('Define color for Side Area opener icon', 'hoshi')
            )
        );

    }


    public function widget($args, $instance) {

        $sidearea_icon_styles = array();

        if(!empty($instance['side_area_opener_icon_color'])) {
            $sidearea_icon_styles[] = 'color: '.$instance['side_area_opener_icon_color'];
        }

        print $args['before_widget'];

        $icon_size = '';
        if(hoshi_mikado_options()->getOptionValue('side_area_predefined_icon_size')) {
            $icon_size = hoshi_mikado_options()->getOptionValue('side_area_predefined_icon_size');
        }

        $default_sidearea_opener = hoshi_mikado_options()->getOptionValue('side_area_enable_default_opener') === 'yes';

        $default_sidearea_opener_class = $default_sidearea_opener ? 'mkd-side-menu-button-opener-default' : '';

        ?>
        <a class="mkd-side-menu-button-opener <?php echo esc_attr($icon_size.' '.$default_sidearea_opener_class); ?>" <?php hoshi_mikado_inline_style($sidearea_icon_styles) ?> href="javascript:void(0)">
            <?php echo hoshi_mikado_get_side_menu_icon_html(); ?>
        </a>

        <?php print $args['after_widget']; ?>

    <?php }

}