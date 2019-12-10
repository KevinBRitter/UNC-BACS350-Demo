<?php

    // Import library code
    define ('LIB_DIR', $_SERVER['DOCUMENT_ROOT'] . '/bacs350/lib/');
    require_once LIB_DIR . 'views.php';
    require_once LIB_DIR . 'log.php';
    

    // Log the page load
    log_page();


    // Create main part of page content
    $content = render_template ("home.html", array());

    $settings = array(
        "site_title" => "UNC BACS 350 Demo",
        "page_title" => "Home Page", 
        'user'       => "",
        "content"    => $content);

    echo render_page($settings);

?>
