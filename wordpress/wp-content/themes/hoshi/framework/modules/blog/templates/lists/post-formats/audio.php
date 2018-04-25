<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkd-post-content">
        <?php hoshi_mikado_get_module_template_part('templates/parts/audio', 'blog'); ?>
		<div class="mkd-post-text">
			<div class="mkd-post-text-inner">
				<?php hoshi_mikado_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
				<div class="mkd-post-info">
					<?php hoshi_mikado_post_info(array(
						'date' => 'yes',
						'author' => 'yes',
						'category' => 'no',
						'comments' => (hoshi_mikado_options()->getOptionValue('blog_single_comments') == 'yes') ? 'yes' : 'no',
						'like' => hoshi_mikado_show_likes() ? 'yes' : 'no'
					)) ?>
				</div>
				<?php
				hoshi_mikado_excerpt($excerpt_length);
				$args_pages = array(
					'before' => '<div class="mkd-single-links-pages"><div class="mkd-single-links-pages-inner">',
					'after' => '</div></div>',
					'link_before' => '<span>',
					'link_after' => '</span>',
					'pagelink' => '%'
				);

				wp_link_pages($args_pages);
				?>
			</div>
			<div class="mkd-category-share-holder clearfix">
				<div class="mkd-categories-list">
					<?php hoshi_mikado_get_module_template_part('templates/parts/post-info-category', 'blog'); ?>
				</div>
				<div class="mkd-share-icons">
					<?php $post_info_array['share'] = hoshi_mikado_options()->getOptionValue('enable_social_share') == 'yes'; ?>
					<?php if ($post_info_array['share'] == 'yes'): ?>
						<span class="mkd-share-label"><?php esc_html_e('Share', 'hoshi'); ?></span>
					<?php endif; ?>
					<?php if (shortcode_exists('mkd_social_share')){ ?>
					<?php echo hoshi_mikado_get_social_share_html(array(
						'type' => 'list',
						'icon_type' => 'normal'
					)); ?>
					<?php } ?>
				</div>
			</div>
		</div>
    </div>
</article>