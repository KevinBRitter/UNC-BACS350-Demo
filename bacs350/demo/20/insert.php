<?php

    // Code to define functions
    require_once 'views.php';
    require_once 'subscriber_views.php';
    require_once 'subscriber_db.php';


    // Pick out the inputs
    $name = filter_input(INPUT_GET, 'name');
    $email = filter_input(INPUT_GET, 'email');

    if ($name == '' || $email == '') {
        
        // Form view to add subscriber
        $add_form = add_subscriber_form();


        // Button to clear
        $clear_button = '<a href="delete.php">Reset Subscribers</a>';


        // Display the HTML in the page
        $intro = 'No intro';
        $content = "$intro $list $add_form $clear_button";

        echo render_page('UNC BACS 350', "Add Subscriber", $content);
    }


    // Add record and return to list
    if (add_subscriber ($db, $name, $email))
    {
        header("Location: index.php");
    };
 
?>
