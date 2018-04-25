<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mkd-post-content">
		<div class="mkd-post-text">
			<div class="mkd-post-text-inner">
				<?php hoshi_mikado_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
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
			<div class="mkd-post-info">
				<?php hoshi_mikado_post_info(array(
					'date' => 'yes',
					'author' => 'no',
					'category' => 'no',
					'comments' => (hoshi_mikado_options()->getOptionValue('blog_single_comments') == 'yes') ? 'yes' : 'no',
					'like' => 'no'
				)) ?>
			</div>
		</div>
	</div>
</article>