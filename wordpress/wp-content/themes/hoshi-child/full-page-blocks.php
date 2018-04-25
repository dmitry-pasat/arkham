<?php
/**
 * Template Name: Full Page Blocks
 * The template for displaying full page content
 *
 * This is the template that displays full page .
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage hoshi
 * @since hoshi 1.0
 */
?>
<?php
$sidebar = hoshi_mikado_sidebar_layout(); ?>

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

<?php get_footer(); ?>
