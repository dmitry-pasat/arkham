<?php


function ae_quick_contact_email_form($content){

    global $ae_options;
    if(!empty($ae_options['choosed_form'])){
        $choosed_form = $ae_options['choosed_form'];
    }

    $img_email_icon_path = plugins_url()."/arkham-extension/img/email-icon.png";
    $img_cancel_icon_path = plugins_url()."/arkham-extension/img/cancel-icon.png";

    $email_form_output = '<div class="email-send">';
    $email_form_output .= '<div class="email-form" style="display:none;">';
    $email_form_output .= do_shortcode($choosed_form );
    $email_form_output .= '</div>';

    $email_form_output .= '<a id="email-icon" class="email" href="javascript:void(0)"><img src="'. $img_email_icon_path .'" alt="email" width="60"></a>';
    $email_form_output .= '<a id="cancel-icon" class="cancel" style="display:none;" href="javascript:void(0)"><img src="'. $img_cancel_icon_path .'" alt="email" width="60"></a>';

    $email_form_output .= '</div>';

    if(isset($ae_options['enable'])){
        return $content . $email_form_output;
    }

    return $content;

}

add_filter('the_content', 'ae_quick_contact_email_form');
