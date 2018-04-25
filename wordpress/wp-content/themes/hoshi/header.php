<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * @see hoshi_mikado_header_meta() - hooked with 10
	 * @see mkd_user_scalable - hooked with 10
	 */
	?>
	<?php if (!hoshi_mikado_is_ajax_request()) do_action('hoshi_mikado_header_meta'); ?>

	<?php if (!hoshi_mikado_is_ajax_request()) wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if (!hoshi_mikado_is_ajax_request()) hoshi_mikado_get_side_area(); ?>
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
		<?php if (!hoshi_mikado_is_ajax_request()) hoshi_mikado_get_header(); ?>

		<?php if ((!hoshi_mikado_is_ajax_request()) && hoshi_mikado_options()->getOptionValue('show_back_button') == "yes") { ?>
			<a id='mkd-back-to-top' href='#'>
                <span class="mkd-icon-stack">
                     <?php echo hoshi_mikado_icon_collections()->renderIcon('arrow_up', 'font_elegant'); ?>
                </span>
			</a>
		<?php } ?>
        <?php if (!hoshi_mikado_is_ajax_request()) hoshi_mikado_get_full_screen_menu(); ?>
		<div class="mkd-content" <?php hoshi_mikado_content_elem_style_attr(); ?>>
			<?php if (hoshi_mikado_is_ajax_enabled()) { ?>
				<div class="mkd-meta">
					<?php do_action('hoshi_mikado_ajax_meta'); ?>
					<span id="mkd-page-id"><?php echo esc_html($wp_query->get_queried_object_id()); ?></span>

					<div class="mkd-body-classes"><?php echo esc_attr(implode(',', get_body_class())); ?></div>
				</div>
			<?php } ?>
			<div class="mkd-content-inner">