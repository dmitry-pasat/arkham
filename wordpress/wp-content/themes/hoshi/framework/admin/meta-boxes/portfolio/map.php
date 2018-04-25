<?php

$mkd_pages = array();
$pages     = get_pages();
foreach($pages as $page) {
    $mkd_pages[$page->ID] = $page->post_title;
}

global $hoshi_IconCollections;

//Portfolio Images

$mkdPortfolioImages = new HoshiMikadoMetaBox("portfolio-item", esc_html__('Portfolio Images (multiple upload)', 'hoshi'), '', '', 'portfolio_images');
$hoshi_Framework->mkdMetaBoxes->addMetaBox("portfolio_images", $mkdPortfolioImages);

$mkd_portfolio_image_gallery = new HoshiMikadoMultipleImages("mkd_portfolio-image-gallery", esc_html__('Portfolio Images', 'hoshi'), esc_html__('Choose your portfolio images', 'hoshi'));
$mkdPortfolioImages->addChild("mkd_portfolio-image-gallery", $mkd_portfolio_image_gallery);

//Portfolio Images/Videos 2

$mkdPortfolioImagesVideos2 = new HoshiMikadoMetaBox("portfolio-item", esc_html__('Portfolio Images/Videos (single upload)', 'hoshi'));
$hoshi_Framework->mkdMetaBoxes->addMetaBox("portfolio_images_videos2", $mkdPortfolioImagesVideos2);

$mkd_portfolio_images_videos2 = new HoshiMikadoImagesVideosFramework(esc_html__('Portfolio Images/Videos 2', 'hoshi'), esc_html__('ThisIsDescription', 'hoshi'));
$mkdPortfolioImagesVideos2->addChild("mkd_portfolio_images_videos2", $mkd_portfolio_images_videos2);

//Portfolio Additional Sidebar Items

$mkdAdditionalSidebarItems = new HoshiMikadoMetaBox("portfolio-item", esc_html__('Additional Portfolio Sidebar Items', 'hoshi'));
$hoshi_Framework->mkdMetaBoxes->addMetaBox("portfolio_properties", $mkdAdditionalSidebarItems);

$mkd_portfolio_properties = new HoshiMikadoOptionsFramework(esc_html__('Portfolio Properties', 'hoshi'), esc_html__('ThisIsDescription', 'hoshi'));
$mkdAdditionalSidebarItems->addChild("mkd_portfolio_properties", $mkd_portfolio_properties);

