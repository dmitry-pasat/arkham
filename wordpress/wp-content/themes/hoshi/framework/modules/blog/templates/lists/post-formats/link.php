<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mkd-post-content" style="background-image:url('<?php the_post_thumbnail_url(); ?>')">
		<div class="mkd-post-text <?php echo esc_attr(hoshi_mikado_options()->getOptionValue('blog_gradient_element_style')); ?>">
			<div class="mkd-post-text-inner">
				<div class="mkd-post-mark">
					<?php echo hoshi_mikado_icon_collections()->renderIcon('icon_link', 'font_elegant'); ?>
				</div>
				<?php hoshi_mikado_get_module_template_part('templates/lists/parts/title', 'blog', '', array('title_tag' => 'h3')); ?>
				<div class="mkd-post-info">
					<?php hoshi_mikado_post_info(array(
						'date'     => 'yes',
						'category' => 'no',
						'comments' => 'no',
						'like'     => 'no'
					)) ?>
				</div>
			</div>
		</div>
	</div>
</article>