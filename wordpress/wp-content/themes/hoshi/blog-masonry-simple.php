<?php
/*
Template Name: Blog: Masonry Simple
*/
?>
<?php get_header(); ?>

<?php hoshi_mikado_get_title(); ?>
<?php get_template_part('slider'); ?>

	<div class="mkd-full-width">
		<div class="mkd-full-width-inner clearfix">
			<?php the_content(); ?>
			<?php hoshi_mikado_get_blog('masonry-simple'); ?>
			<?php do_action('hoshi_mikado_page_after_content'); ?>
		</div>
	</div>
<?php get_footer(); ?>