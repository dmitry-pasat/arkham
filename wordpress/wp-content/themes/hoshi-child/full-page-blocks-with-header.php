<?php
/**
 * Template Name: Full Page Blocks With Header
 * The template for displaying full page content with header
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

<?php get_header(); ?>

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
