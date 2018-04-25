<?php
$tags      = wp_get_post_terms(get_the_ID(), 'portfolio-tag');
$tag_names = array();

if(is_array($tags) && count($tags)) :
	foreach($tags as $tag) {
		$tag_names[] = $tag->name;
	}

	?>
	<div class="mkd-portfolio-info-item mkd-portfolio-tags">
		<h6><?php esc_html_e('Tags', 'hoshi'); ?></h6>

		<p>
			<?php echo esc_attr(implode(', ', $tag_names)); ?>
		</p>
	</div>
<?php endif; ?>
