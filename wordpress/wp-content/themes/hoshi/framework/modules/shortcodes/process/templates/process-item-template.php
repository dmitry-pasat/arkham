<div <?php hoshi_mikado_class_attribute($item_classes); ?>>
    <div class="mkd-pi-holder-inner">
        <?php if(!empty($number)) : ?>
            <div class="mkd-number-holder-inner" <?php hoshi_mikado_inline_style($background_style);?>>
                <span><?php echo esc_html($number); ?></span>
            </div>
        <?php endif; ?>

        <div class="mkd-pi-content-holder">
            <?php if(!empty($title)) : ?>
                <div class="mkd-pi-title-holder">
                    <h4 class="mkd-pi-title"><?php echo esc_html($title); ?></h4>
                </div>
            <?php endif; ?>

            <?php if(!empty($text)) : ?>
                <div class="mkd-pi-text-holder">
                    <p><?php echo esc_html($text); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>