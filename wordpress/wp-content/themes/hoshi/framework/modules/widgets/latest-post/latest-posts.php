<?php

class HoshiMikadoLatestPosts extends HoshiMikadoWidget {
    protected $params;

    public function __construct() {
        parent::__construct(
            'mkd_latest_posts_widget', // Base ID
            esc_html__('Mikado Latest Post', 'hoshi'), // Name
            array('description' => esc_html__('Display posts from your blog', 'hoshi'),) // Args
        );

        $this->setParams();
    }

    protected function setParams() {
        $this->params = array(
            array(
                'name'  => 'title',
                'type'  => 'textfield',
                'title' => esc_html__('Title', 'hoshi')
            ),
            array(
                'name'    => 'type',
                'type'    => 'dropdown',
                'title'   => esc_html__('Type', 'hoshi'),
                'options' => array(
                    'minimal'      => esc_html__('Minimal', 'hoshi'),
                    'image-in-box' => esc_html__('Image in box', 'hoshi')
                )
            ),
            array(
                'name'  => 'number_of_posts',
                'type'  => 'textfield',
                'title' => esc_html__('Number of posts', 'hoshi')
            ),
            array(
                'name'    => 'order_by',
                'type'    => 'dropdown',
                'title'   => esc_html__('Order By', 'hoshi'),
                'options' => array(
                    'title' => esc_html__('Title', 'hoshi'),
                    'date'  => esc_html__('Date', 'hoshi')
                )
            ),
            array(
                'name'    => 'order',
                'type'    => 'dropdown',
                'title'   => esc_html__('Order', 'hoshi'),
                'options' => array(
                    'ASC'  => esc_html__('ASC', 'hoshi'),
                    'DESC' => esc_html__('DESC', 'hoshi')
                )
            ),
            array(
                'name'    => 'image_size',
                'type'    => 'dropdown',
                'title'   => esc_html__('Image Size', 'hoshi'),
                'options' => array(
                    'original'  => esc_html__('Original', 'hoshi'),
                    'landscape' => esc_html__('Landscape', 'hoshi'),
                    'square'    => esc_html__('Square', 'hoshi'),
                    'custom'    => esc_html__('Custom', 'hoshi')
                )
            ),
            array(
                'name'  => 'custom_image_size',
                'type'  => 'textfield',
                'title' => esc_html__('Custom Image Size', 'hoshi')
            ),
            array(
                'name'  => 'category',
                'type'  => 'textfield',
                'title' => 'Category Slug'
            ),
            array(
                'name'  => 'text_length',
                'type'  => 'textfield',
                'title' => esc_html__('Number of characters', 'hoshi')
            ),
            array(
                'name'    => 'title_tag',
                'type'    => 'dropdown',
                'title'   => esc_html__('Title Tag', 'hoshi'),
                'options' => array(
                    ""   => "",
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6"
                )
            )
        );
    }

    public function widget($args, $instance) {
        extract($args);

        //prepare variables
        $content        = '';
        $params         = array();
        $params['type'] = 'image_in_box';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params[$key] = $value;
            }
        }
        if(empty($params['title_tag'])) {
            $params['title_tag'] = 'h6';
        }
        echo '<div class="widget mkd-latest-posts-widget">';

        if(!empty($instance['title'])) {
            print $args['before_title'].$instance['title'].$args['after_title'];
        }

        echo hoshi_mikado_execute_shortcode('mkd_blog_list', $params);

        echo '</div>'; //close mkd-latest-posts-widget
    }
}
