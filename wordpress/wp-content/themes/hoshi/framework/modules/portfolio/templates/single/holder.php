<?php if($fullwidth) : ?>
<div class="mkd-full-width">
	<div class="mkd-full-width-inner">
		<?php else: ?>
		<div class="mkd-container">
			<div class="mkd-container-inner clearfix">
				<?php endif; ?>
				<div <?php hoshi_mikado_class_attribute($holder_class); ?>>
					<?php if(post_password_required()) {
						echo get_the_password_form();
					} else {
						//load proper portfolio template
						hoshi_mikado_get_module_template_part('templates/single/single', 'portfolio', $portfolio_template);

						//load portfolio navigation
						hoshi_mikado_portfolio_get_single_navigation();

						//load portfolio comments
						hoshi_mikado_get_module_template_part('templates/single/parts/comments', 'portfolio');

					} ?>
				</div>
			</div>
		</div>