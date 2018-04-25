<?php if (hoshi_mikado_options()->getOptionValue('blog_single_navigation') == 'yes') { ?>
	<?php $navigation_blog_through_category = hoshi_mikado_options()->getOptionValue('blog_navigation_through_same_category') ?>
	<div class="mkd-blog-single-navigation clearfix">
		<?php if ($has_prev_post) : ?>
			<div class="mkd-blog-single-prev clearfix">
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
		<?php if ($has_next_post) : ?>
			<div class="mkd-blog-single-next clearfix">
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
<?php } ?>