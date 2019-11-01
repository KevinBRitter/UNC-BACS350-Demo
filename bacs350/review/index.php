<?php

    // Code to define functions
    require_once 'views.php';
    require_once 'review_views.php';
    require_once 'review_db.php';

    
    // Button to go to other views
    $brain_button = render_button('Brain', '..');
    $add_button = render_button('Add Review', 'insert.php');
    $title = '<h2>Design Reviews</h2>';

    // List review records
    $list = render_reviews(list_reviews ($db));

    // Set page content
    $content = "<p>$brain_button $add_button</p> $title $list";

    // Create main part of page content
    $settings = array(
        "site_title" => "UNC BACS 350",
        "page_title" => "Design Review App", 
        "logo"       => "Bear.png",
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);
?>
