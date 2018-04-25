<?php

function portfolio_handler_shortcode( $atts, $content = null ) {

    global $ae_portfolio_options;
    if(isset($ae_portfolio_options['choosed_portfolio'])){
        $portfolio_id = $ae_portfolio_options['choosed_portfolio'];

        $portfolio_post_obj = get_post($portfolio_id);
        $portfolio_post_id = $portfolio_post_obj->ID;
        $portfolio_post_title = $portfolio_post_obj->post_title;
        $portfolio_post_content = $portfolio_post_obj->post_content;

        $portfolio_post_meta = get_post_meta($portfolio_id);

        $portfolio_post_meta_take = array();

        foreach($portfolio_post_meta as $key => $value){
            $portfolio_post_meta_take[$key] = $value[0];
        }

        $desktop_screenshot = $portfolio_post_meta_take['desktop_path'];
        $tablet_screenshot = $portfolio_post_meta_take['tablet_path'];
        $mobile_screenshot = $portfolio_post_meta_take['mobile_path'];
        $client_logo = $portfolio_post_meta_take['logo_client_path'];

        $testimonial_text = $portfolio_post_meta_take['testimonial_text_meta'];
        $testimonial_person_title = $portfolio_post_meta_take['testimonial_person_title_meta'];
        $testimonial_person_name = $portfolio_post_meta_take['testimonial_person_name_meta'];
    }

    $portfolio_img_folder = plugins_url() .'/arkham-extension/img/portfolio';

    $content = '
           <div  class="container portfolio-section" >

          <div id="myCarousel" class="carousel slide" data-ride="carousel" >
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active">
              <img class="notebook" src="'. $portfolio_img_folder .'/notebook.png" srcset="'. $portfolio_img_folder .'/img/notebook@2x.png 2x, img/notebook@3x.png 3x" title="#">
              <p class="website">Website</p>
              </li>
              <li data-target="#myCarousel" data-slide-to="1">
              <img class="ipad-2" src="'. $portfolio_img_folder .'/ipad-2.png" srcset="'. $portfolio_img_folder .'/img/ipad-2@2x.png 2x, img/ipad-2@3x.png 3x" title="#">
               <p class="tablet">Tablet</p>
              </li>
              <li data-target="#myCarousel" data-slide-to="2">
              <img class="smartphone" src="'. $portfolio_img_folder .'/smartphone.png" srcset="'. $portfolio_img_folder .'/img/smartphone@2x.png 2x, img/smartphone@3x.png 3x" title="#">
               <p class="mobile">Mobile</p>
              </li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="item-screenshot">
                                 <img src="'. $desktop_screenshot .'" srcset="'. $desktop_screenshot .'" alt="Desktop">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 text-box">
                            <div class="item-text">
                                <div class="item-data">
                                    <div class="commercial-publishing">'. $portfolio_post_title .'</div>
                                    <div class="item-description">'. $portfolio_post_content .'</div>
                                </div>
                                <div class="line"></div>
                                <div class="item-testimonial">
                                    <p class="item-testimonial-text">'.$testimonial_text.'</p>
                                    <div class="item-testimonial-data">
                                        <img src="'.$client_logo.'" title="Client Logo" width="100">
                                        <div class="testimonial-person">
                                            <p class="testimonial-person-name">'. $testimonial_person_name .'</p>
                                            <p class="testimonial-person-title">'. $testimonial_person_title .'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
              </div>

              <div class="item">
                 <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="item-screenshot">
                                 <img src="'. $tablet_screenshot .'" srcset="'. $tablet_screenshot .'" alt="Desktop">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 text-box">
                            <div class="item-text">
                                <div class="item-data">
                                    <div class="commercial-publishing">'. $portfolio_post_title .'</div>
                                    <div class="item-description">'. $portfolio_post_content .'</div>
                                </div>
                                <div class="line"></div>
                                <div class="item-testimonial">
                                    <p class="item-testimonial-text">'.$testimonial_text.'</p>
                                    <div class="item-testimonial-data">
                                        <img src="'.$client_logo.'" title="Client Logo" width="100">
                                        <div class="testimonial-person">
                                            <p class="testimonial-person-name">'. $testimonial_person_name .'</p>
                                            <p class="testimonial-person-title">'. $testimonial_person_title .'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
              </div>

              <div class="item">
                 <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="item-screenshot">
                                 <img src="'. $mobile_screenshot .'" srcset="'. $mobile_screenshot .'" alt="Desktop">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 text-box">
                            <div class="item-text">
                                <div class="item-data">
                                    <div class="commercial-publishing">'. $portfolio_post_title .'</div>
                                    <div class="item-description">'. $portfolio_post_content .'</div>
                                </div>
                                <div class="line"></div>
                                <div class="item-testimonial">
                                    <p class="item-testimonial-text">'.$testimonial_text.'</p>
                                    <div class="item-testimonial-data">
                                        <img src="'.$client_logo.'" title="Client Logo" width="100">
                                        <div class="testimonial-person">
                                            <p class="testimonial-person-name">'. $testimonial_person_name .'</p>
                                            <p class="testimonial-person-title">'. $testimonial_person_title .'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <div class="oval">
                    <img src="'. $portfolio_img_folder .'/arrow_left.png" title="arrow left">
                </div>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
               <div class="oval">
                    <img src="'. $portfolio_img_folder .'/arrow_right.png" title="arrow right">
                </div>
            </a>
          </div>
        </div>
    ';
    return $content;

}
add_shortcode( 'portfolio-shortcode', 'portfolio_handler_shortcode' );

