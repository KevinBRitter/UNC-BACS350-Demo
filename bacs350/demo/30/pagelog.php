<?php

    require_once 'views.php';
    require_once 'log.php';


    // Clear the log if requested
    $action = filter_input(INPUT_GET, 'action');
    if ($action == 'clear') {
        clear_log($db);
    }


    // Clear button
    $home = render_button('Home', 'index.php');
    $clear = render_button('Clear Log', 'pagelog.php?action=clear');


    // Show page history
    $history = render_history(query_log($db));
  

    // Show Page
    $settings = array(
        "site_title" => "UNC BACS 350 Demo",
        "page_title" => "Display Pages History", 
        "style"      => 'style.css',
        "content"    => $home . $clear . $history);

    echo render_page($settings);

?>
