<?php

    require_once 'log.php';
    require_once 'views.php';
 
    // Handle any page actions required
    log_page();


    // Show page history
    $history = render_history(query_log());
    $back = render_button('Other Demos', './');


    // Show Page
    $settings = array(
        "site_title" => "BACS 350 Demo",
        "page_title" => "Page log history", 
        "style"      => 'style.css',
        'user'       => '',
        "content"    => $back . $history);

    echo render_page($settings);

?>
