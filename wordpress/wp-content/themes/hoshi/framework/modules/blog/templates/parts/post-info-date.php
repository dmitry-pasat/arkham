<div class="mkd-post-info-date">
    <?php if(!hoshi_mikado_post_has_title()) { ?>
    <a href="<?php the_permalink() ?>">
        <?php } ?>
        <span class="mkd-post-info-date-icon">
			<?php echo hoshi_mikado_icon_collections()->renderIcon('fa-calendar-o', 'font_awesome'); ?>
		</span>
        <span><?php the_time(get_option('date_format')); ?></span>
        <?php if(!hoshi_mikado_post_has_title()) { ?>
    </a>
<?php } ?>
</div>