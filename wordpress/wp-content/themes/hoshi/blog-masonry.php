<?php
/*
Template Name: Blog: Masonry
*/
?>
<?php get_header(); ?>
<?php hoshi_mikado_get_title(); ?>
<?php get_template_part('slider'); ?>
	<div class="mkd-container">
		<?php do_action('hoshi_mikado_after_container_open'); ?>
		<div class="mkd-container-inner">
			<?php the_content(); ?>
			<?php hoshi_mikado_get_blog('masonry'); ?>
			<?php do_action('hoshi_mikado_page_after_content'); ?>
		</div>
		<?php do_action('hoshi_mikado_before_container_close'); ?>
	</div>
<?php get_footer(); ?>