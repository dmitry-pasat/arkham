<?php get_header(); ?>

	<div class="mkd-container">
	<?php do_action('hoshi_mikado_after_container_open'); ?>
		<div class="mkd-container-inner mkd-404-page">
			<div class="mkd-page-not-found">
				<h2>
					<?php if(hoshi_mikado_options()->getOptionValue('404_title')){
						echo esc_html(hoshi_mikado_options()->getOptionValue('404_title'));
					}
					else{
						esc_html_e('404', 'hoshi');
					} ?>
				</h2>
				<p>
					<?php if(hoshi_mikado_options()->getOptionValue('404_text')){
						echo esc_html(hoshi_mikado_options()->getOptionValue('404_text'));
					}
					else{
						esc_html_e('The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site\'s homepage and see if you can find what you are looking for.', 'hoshi');
					} ?>
				</p>
				<?php
					$params = array();
					if (hoshi_mikado_options()->getOptionValue('404_back_to_home')){
						$params['text'] = hoshi_mikado_options()->getOptionValue('404_back_to_home');
					}
					else{
						$params['text'] = esc_html__('Go Back', 'hoshi');
					}
					$params['link'] = esc_url(home_url('/'));
					$params['target'] = '_self';
					$params['size'] = 'large';
					$params['type'] = 'gradient-outline';
					$params['color'] = '#fff';
					$params['background_color'] = '#1e2029';
					$params['gradient_style'] = 'mkd-type1-gradient-diagonal-2x';
					$params['margin'] = '35px 0px 0px 0px';
				    $params['icon_pack'] = 'font_elegant';
					$params['fe_icon'] = 'arrow_right';

					if(shortcode_exists('mkd_button')) {
						echo hoshi_mikado_execute_shortcode('mkd_button', $params);
					} else { ?>
						<a href="<?php echo esc_url(home_url('/'));?>" target="_self" class="mkd-btn mkd-btn-large mkd-btn-gradient-outline mkd-btn-icon mkd-type1-gradient-diagonal-2x mkd-btn-hover-outline">
							<span class="mkd-btn-text"><?php echo esc_html($params['text']);?></span>
							<span class="mkd-btn-gradient-background" style="background-color: #1e2029"></span>
							<span class="mkd-btn-icon-holder">
								<span aria-hidden="true" class="mkd-icon-font-elegant arrow_right mkd-btn-icon-elem"></span>
							</span>
							<span class="mkd-btn-helper"></span>
						</a>
					<?php } ?>
			</div>
		</div>
		<?php do_action('hoshi_mikado_before_container_close'); ?>
	</div>

<?php get_footer(); ?>