<div class="mkd-post-info-comments-holder mkd-post-info-item">
	<a class="mkd-post-info-comments" href="<?php comments_link(); ?>">
		<span class="mkd-post-info-comments-icon">
			<?php echo hoshi_mikado_icon_collections()->renderIcon('fa-comment-o', 'font_awesome'); ?>
		</span>
		<span class="mkd-comment-number"><?php comments_number('0', '1', '%'); ?></span>
		<span><?php comments_number(esc_html__('Comments','hoshi'), esc_html__('Comment','hoshi'), esc_html__('Comments','hoshi')); ?></span>
	</a>
</div>