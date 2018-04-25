<?php

add_action( 'admin_menu', 'ae_portfolio_section_menu', 10 );

function ae_portfolio_section_menu()
{

    add_menu_page(
        'Portfolio Section All',
        'Portfolio Section',
        'manage_options',
        'portfolio_section',
        'ae_portfolio_section_content_all',
        'dashicons-tickets',
        6
    );

    add_submenu_page(
        'portfolio_section',
        'Portfolio Section All',
        'Portfolio Section',
        'manage_options',
        'portfolio_section',
        'ae_portfolio_section_content_all',
        'dashicons-tickets',
        6
    );

}

function ae_portfolio_section_content_all(){

    $args = array('post_type' => 'ae_portfolio_section', 'posts_per_page' => -1);
    $portfolio_section_obj = get_posts( $args );

    $admin_url = admin_url();

    ob_start(); ?>

    <div class="wrap">
        <h1 class="wp-heading-inline">Portfolio Section</h1>
        <a href="<?php echo $admin_url .'admin.php?page=portfolio_section/add-edit'; ?>" class="page-title-action">Erstellen</a>
        <hr class="wp-header-end">
        <h2 class="screen-reader-text">Beitragsliste filtern</h2>
        <table class="wp-list-table widefat fixed striped posts">
            <thead>
                <tr>
                    <td id="cb" class="manage-column column-cb check-column">
                        <label class="screen-reader-text" for="cb-select-all-1">Alle auswählen</label>
                        <input id="cb-select-all-1" type="checkbox">
                    </td>
                    <th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
                        <a href="#">
                            <span>Titel</span><span class="sorting-indicator"></span>
                        </a>
                    </th>
                    <th scope="col" id="icl_translations" class="manage-column column-icl_translations">
                        <img src="<?php echo plugins_url() .'/arkham-extension/img/de.png'; ?>" width="18" height="12" alt="Deutsch" title="Deutsch" style="margin:2px">
                    </th>
                    <th scope="col" id="comments" class="manage-column column-comments num sortable desc">
                        <a href="#">
                            <span><span class="vers comment-grey-bubble" title="Kommentare">
                                    <span class="screen-reader-text">Kommentare</span>
                                </span></span><span class="sorting-indicator"></span>
                        </a>
                    </th>
                    <th scope="col" id="date" class="manage-column column-date sortable asc">
                        <a href="#">
                            <span>Datum</span><span class="sorting-indicator"></span>
                        </a>
                    </th>
                    <th scope="col" id="wpseo-score" class="manage-column column-wpseo-score">SEO</th>
                    <th scope="col" id="wpseo-score-readability" class="manage-column column-wpseo-score-readability">Lesbarkeit</th>

                </tr>
            </thead>

            <tbody id="the-list">
                <?php foreach($portfolio_section_obj as $value): ?>
                <tr class="no-items">
                    <td></td>
                    <td><a class="row-title" href="<?php echo $admin_url .'admin.php?page=portfolio_section/add-edit&post_id='. $value->ID .'&action=edit'; ?>"><?php echo $value->post_title; ?></a></td>
                    <td>
                        <a href="<?php echo $admin_url .'admin.php?page=portfolio_section/add-edit&post_id='. $value->ID .'&action=edit'; ?>" title="Die Englisch Übersetzung editieren">
                            <img style="padding:1px;margin:2px;" border="0" src="<?php echo plugins_url() .'/arkham-extension/img/portfolio/portfolio-edit-icon.png'; ?>" alt="Die Englisch Übersetzung editieren" width="16" height="16">
                        </a>
                    </td>
                    <td> - </td>
                    <td><?php echo $value->post_date; ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php endforeach; ?>
            </tbody>

            <tfoot>
            <tr>
                <td id="cb" class="manage-column column-cb check-column">
                    <label class="screen-reader-text" for="cb-select-all-1">Alle auswählen</label>
                    <input id="cb-select-all-1" type="checkbox">
                </td>
                <th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
                    <a href="#">
                        <span>Titel</span><span class="sorting-indicator"></span>
                    </a>
                </th>
                <th scope="col" id="icl_translations" class="manage-column column-icl_translations">
                    <img src="<?php echo plugins_url() .'/arkham-extension/img/de.png'; ?>" width="18" height="12" alt="Deutsch" title="Deutsch" style="margin:2px">
                </th>
                <th scope="col" id="comments" class="manage-column column-comments num sortable desc">
                    <a href="#">
                            <span><span class="vers comment-grey-bubble" title="Kommentare">
                                    <span class="screen-reader-text">Kommentare</span>
                                </span></span><span class="sorting-indicator"></span>
                    </a>
                </th>
                <th scope="col" id="date" class="manage-column column-date sortable asc">
                    <a href="#">
                        <span>Datum</span><span class="sorting-indicator"></span>
                    </a>
                </th>
                <th scope="col" id="wpseo-score" class="manage-column column-wpseo-score">SEO</th>
                <th scope="col" id="wpseo-score-readability" class="manage-column column-wpseo-score-readability">Lesbarkeit</th>

            </tr>
            </tfoot>

        </table>
    </div>

    <?php

    echo ob_get_clean();

}
