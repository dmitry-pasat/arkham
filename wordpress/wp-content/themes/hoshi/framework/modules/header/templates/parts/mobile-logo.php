<?php do_action('hoshi_mikado_before_mobile_logo'); ?>

	<div class="mkd-mobile-logo-wrapper">
		<a href="<?php echo esc_url(home_url('/')); ?>" <?php hoshi_mikado_inline_style($logo_styles); ?>>
			<img <?php echo hoshi_mikado_get_inline_attrs($logo_dimensions_attr); ?> src="<?php echo esc_url($logo_image); ?>" alt="mobile-logo"/>
		</a>
	</div>

<?php do_action('hoshi_mikado_after_mobile_logo'); ?>