<div class="mkd-two-columns-66-33 clearfix">
    <div class="mkd-column1">
        <div class="mkd-column-inner">
            <?php
            echo hoshi_mikado_get_ptf_masonry_layout();
            ?>
        </div>
    </div>
    <div class="mkd-column2">
        <div class="mkd-column-inner">
            <div class="mkd-portfolio-info-holder">
                <?php
                //get portfolio content section
                hoshi_mikado_portfolio_get_info_part('content');

                //get portfolio custom fields section
                hoshi_mikado_portfolio_get_info_part('custom-fields');

                //get portfolio author section
                hoshi_mikado_portfolio_get_info_part('author');

                //get portfolio date section
                hoshi_mikado_portfolio_get_info_part('date');

                //get portfolio tags section
                hoshi_mikado_portfolio_get_info_part('tags');

                //get portfolio share section
                hoshi_mikado_portfolio_get_info_part('social');
                ?>
            </div>
        </div>
    </div>
</div>