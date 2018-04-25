<div class="mkd-post-info-author mkd-post-info-item">
	<span class="mkd-post-info-author-icon">
			<?php echo hoshi_mikado_icon_collections()->renderIcon('icon-user', 'simple_line_icons'); ?>
		</span>
	<?php esc_html_e('by', 'hoshi'); ?>
    <a class="mkd-post-info-author-link" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
		<?php the_author_meta('display_name'); ?>
    </a>
</div>
