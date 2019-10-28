<?php
    
    // Bring in rendering functions
    require_once 'views.php';


    // Display the page content
    $demo = '<p>' . render_button('Other Demos', '..') . '</p>';

    $happy = '<img src="happy.jpg" alt="happy" width="100" height="100">';
    $happy_text = '<p>This is a very happy face</p>';
    $sad = '<img src="sad.jpg" alt="sad" width="100" height="100">';
    $sad_text = '<p>This is a very sad face</p>';

    $card1 = render_card("Happy Face", "$happy_text $happy");
    $card2 = render_card("Sad Face", "$sad_text $sad");

    $content = "$demo $card1 $card2";


    // Create main part of page content
    $settings = array(
        "site_title" => "UNC BACS 350",
        "page_title" => "Demo 26 - Page Templates", 
        "logo"       => "Bear.png",
        "style"      => 'style.css',
        "content"    => $content);

    echo render_page($settings);

?>
