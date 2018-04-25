<?php if(hoshi_mikado_options()->getOptionValue('portfolio_single_hide_pagination') !== 'yes') : ?>

	<?php
	$back_to_link      = get_post_meta(get_the_ID(), 'portfolio_single_back_to_link', true);
	$nav_same_category = hoshi_mikado_options()->getOptionValue('portfolio_single_nav_same_category') == 'yes';
	?>

	<div class="mkd-portfolio-single-nav clearfix">
		<?php if($has_prev_post) : ?>


			<div class="mkd-portfolio-single-prev clearfix">
				<a class="clearfix" href="<?php echo esc_url($prev_post['link']); ?>">
					<span class="mkd-icon-stack">
						<?php echo hoshi_mikado_icon_collections()->renderIcon('arrow_carrot-left', 'font_elegant'); ?>
                	</span>
					<span class="mkd-single-prev-title-label">
						<span class="mkd-single-prev-title"><?php echo esc_html($prev_post['title']); ?></span>
						<span class="mkd-single-prev-label"><?php esc_html_e('Previous', 'hoshi'); ?></span>
					</span>
				</a>
			</div>

		<?php endif; ?>


		<?php if($back_to_link !== '') : ?>
			<div class="mkd-portfolio-back-btn">
				<a href="<?php echo esc_url(get_permalink($back_to_link)); ?>">
					<span class="icon_grid-2x2"></span>
				</a>
			</div>
		<?php endif; ?>




		<?php if($has_next_post) : ?>

			<div class="mkd-portfolio-single-next clearfix">
				<a class="clearfix" href="<?php echo esc_url($next_post['link']); ?>">
					<span class="mkd-icon-stack">
						<?php echo hoshi_mikado_icon_collections()->renderIcon('arrow_carrot-right', 'font_elegant'); ?>
                	</span>
					<span class="mkd-single-next-title-label">
						<span class="mkd-single-next-title"><?php echo esc_html($next_post['title']); ?></span>
						<span class="mkd-single-next-label"><?php esc_html_e('Next', 'hoshi'); ?></span>
					</span>
				</a>
			</div>

		<?php endif; ?>
	</div>

<?php endif; ?>