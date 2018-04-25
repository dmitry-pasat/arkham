<div class="mkd-progress-bar">
	<h4 class="mkd-progress-title-holder clearfix">
		<span class="mkd-progress-title" <?php hoshi_mikado_inline_style($title_color); ?>><?php echo esc_attr($title) ?></span>
		<span class="mkd-progress-number-wrapper <?php echo esc_attr($percentage_classes) ?> ">
			<span class="mkd-progress-number">
				<span class="mkd-percent" <?php hoshi_mikado_inline_style($percentage_color); ?>>0</span>
			</span>
		</span>
	</h4>

	<div class="mkd-progress-content-outer" <?php hoshi_mikado_inline_style($inactive_bar_style); ?>>
		<div data-percentage=<?php echo esc_attr($percent) ?> class="mkd-progress-content" <?php hoshi_mikado_inline_style($active_bar_style); ?>></div>
	</div>
</div>	