<div class="mkd-separator-with-icon-holder clearfix">

    <span class="mkd-separator-left" <?php echo hoshi_mikado_get_inline_style($separator_style); ?>></span>

    <div class="mkd-icon-holder <?php echo esc_attr($icon_gradient_style); ?>">
        <?php echo hoshi_mikado_icon_collections()->renderIcon($icon, $icon_pack); ?>
    </div>

    <span class="mkd-separator-right" <?php echo hoshi_mikado_get_inline_style($separator_style); ?>></span>
</div>