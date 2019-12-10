<?php
    
    // Import library code
    define ('LIB_DIR', $_SERVER['DOCUMENT_ROOT'] . '/bacs350/lib/');
    require_once LIB_DIR . 'views.php';
    require_once LIB_DIR . 'log.php';
    

    // Log the page load
    log_page();


    // Display the page content
    $buttonbar = '<div><p>' . 
        render_button('Other Demos', '..') .
        render_button('Show Log', '/bacs350/lib/pagelog.php') .
        render_button('PHP Info', '/bacs350/lib/phpinfo.php') .
        '</p></div>';


    // Text
    $text = '
    <h2>View Library Code</h2>
    <p>
        This solution demonstrates the reusable view library at  
        <b>bacs350/lib/views.php</b>.
    </p>
    ';
    

    // Create main part of page content
    $settings = array(
        "site_title" => "UNC BACS 350 Demo",
        "page_title" => "Demo 35 - Views Library", 
        'user'       => "",
        "content"    => $buttonbar . $text);

    echo render_page($settings);

?>
