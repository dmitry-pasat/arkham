<?php
/*
Template Name: Landing Page
*/
$sidebar = hoshi_mikado_sidebar_layout();

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * hoshi_mikado_header_meta hook
	 *
	 * @see hoshi_mikado_header_meta() - hooked with 10
	 * @see mkd_user_scalable_meta() - hooked with 10
	 */
	if(!hoshi_mikado_is_ajax_request()) {
		do_action('hoshi_mikado_header_meta');
	}
	?>

	<?php if(!hoshi_mikado_is_ajax_request()) {
		wp_head();
	} ?>
</head>

<body <?php body_class(); ?>>

<?php
$id = hoshi_mikado_get_page_id();

if(hoshi_mikado_get_meta_field_intersect('smooth_page_transitions',$id) === 'yes' &&
	hoshi_mikado_get_meta_field_intersect('page_transition_preloader',$id) === 'yes') { ?>
	<div class="mkd-smooth-transition-loader mkd-mimic-ajax ?>">
		<div class="mkd-st-loader">
			<div class="mkd-st-loader1">
				<?php hoshi_mikado_loading_spinners(); ?>
			</div>
		</div>
	</div>
<?php } ?>

<div class="mkd-wrapper">
	<div class="mkd-wrapper-inner">
		<div class="mkd-content">
			<?php if(hoshi_mikado_is_ajax_enabled()) { ?>
				<div class="mkd-meta">
					<?php do_action('hoshi_mikado_ajax_meta'); ?>
					<span id="mkd-page-id"><?php echo esc_html($wp_query->get_queried_object_id()); ?></span>

					<div class="mkd-body-classes"><?php echo esc_attr(implode(',', get_body_class())); ?></div>
				</div>
			<?php } ?>
			<div class="mkd-content-inner">
				<?php hoshi_mikado_get_title(); ?>
				<?php get_template_part('slider'); ?>
				<div class="mkd-full-width">
					<div class="mkd-full-width-inner">
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
							<div class="mkd-grid-row">
								<div <?php echo hoshi_mikado_get_content_sidebar_class(); ?>>
									<?php the_content(); ?>
									<?php do_action('hoshi_mikado_page_after_content'); ?>
								</div>

								<?php if(!in_array($sidebar, array('default', ''))) : ?>
									<div <?php echo hoshi_mikado_get_sidebar_holder_class(); ?>>
										<?php get_sidebar(); ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endwhile; endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>