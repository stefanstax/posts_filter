<?php
function load_ajax_stax()
{
    wp_enqueue_script("ajax", get_template_directory_uri() . "/inc/ajax/assets/js/filterAjax.js", array('jquery'));

    wp_localize_script(
        "ajax",
        "wpAjax",
        array("ajaxUrl" => admin_url("admin-ajax.php"))
    );
}
add_action("wp_enqueue_scripts", "load_ajax_stax");
