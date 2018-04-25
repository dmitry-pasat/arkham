<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mkd-post-content">
		<div class="mkd-post-text <?php echo esc_attr(hoshi_mikado_options()->getOptionValue('blog_gradient_element_style')); ?>">
			<div class="mkd-post-text-inner clearfix">
				<div class="mkd-post-mark">
					<span aria-hidden="true" class="icon_quotations"></span>
				</div>
				<div class="mkd-post-title">
                    <?php if(get_post_meta(get_the_ID(), "mkd_post_quote_text_meta", true) != '') { ?>
                        <h1>
                            <span>"</span><span><?php echo esc_html(get_post_meta(get_the_ID(), "mkd_post_quote_text_meta", true)); ?></span><span>"</span>
                        </h1>
                    <?php } ?>
					<span class="mkd-quote_author">&mdash; <?php the_title(); ?></span>
				</div>
			</div>
		</div>
		<div class="mkd-content-category-share-holder">
			<div class="mkd-content-holder">
				<?php the_content(); ?>
				<?php do_action('hoshi_mikado_after_blog_article_content'); ?>
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