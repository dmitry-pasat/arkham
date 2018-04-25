<div <?php hoshi_mikado_class_attribute($pricing_table_classes) ?>>
	<div class="mkd-price-table-inner <?php echo esc_attr($active_pricing_table_classes) ?>">
	<div class="mkd-price-table-bgrnd-overlay <?php echo esc_attr($active_pricing_table_classes) ?>"></div>
		<ul>
			<li class="mkd-table-title">
				<h3 <?php hoshi_mikado_inline_style($title_styles); ?> class="mkd-title-content"><?php echo esc_html($title) ?></h3>
			</li>
			<li class="mkd-table-prices">
				<div class="mkd-price-in-table">
					<?php if(!empty($price)) : ?>
						<h2 class="mkd-price">
							<sup><?php echo esc_html($currency); ?></sup>
							<?php echo esc_html($price); ?>
						</h2>
					<?php endif; ?>
				</div>
				<?php if(!empty($price_period)) : ?>
					<div class="mkd-pt-price-period">
						<span class="mkd-pt-price-period-content"><?php echo esc_html($price_period) ?></span>
					</div>
				<?php endif; ?>
			</li>
			<li class="mkd-table-content">
				<?php echo do_shortcode(preg_replace('#^<\/p>|<p>$#', '', $content)); ?>
			</li>
			<?php
			if(is_array($button_params) && count($button_params)) { ?>
				<li class="mkd-price-button">
					<?php echo hoshi_mikado_get_button_html($button_params); ?>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>
