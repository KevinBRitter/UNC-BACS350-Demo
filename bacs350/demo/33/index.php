<?php
    
    require_once 'log.php';
    require_once 'views.php';
    require_once 'auth.php';


    // Log the page load
    log_page();


    // Display the page content
    $content = render_button('Other Demos', '..') . render_button('Show Log', 'pagelog.php');


    $content .= '
    <h2>Public Page (no login required)</h2>
    <p>
        This solution demonstrates the use of authentication code.
        Visiting this page does not require a login.

        <a href="private.php">Private Page</a>
    </p>
    ';
    

    // Create main part of page content
    $settings = array(
        "site_title" => "UNC BACS 350 Demo",
        "page_title" => "Demo 33 - User Auth", 
        'user'       => user_info(),
        "content"    => $content);

    echo render_page($settings);

?>
