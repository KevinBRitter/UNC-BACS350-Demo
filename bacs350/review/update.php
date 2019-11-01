<?php

    // Code to define functions
    require_once 'views.php';
    require_once 'review_views.php';
    require_once 'review_db.php';


    // Pick out the inputs
    $id = filter_input(INPUT_GET, 'id');
    $designer = filter_input(INPUT_GET, 'designer');
    $url = filter_input(INPUT_GET, 'url');
    $report = filter_input(INPUT_GET, 'report');
    $score = filter_input(INPUT_GET, 'score');
    $date = filter_input(INPUT_GET, 'date');

//        date_default_timezone_set("America/Denver");
//        $date  = date('Y-m-d g:i:s a');
        

    // Gather user input with a form
    if ($designer == '' || $url == '' || $report == '' || $score == '' || $date == '') {
        
        // Display Form view to edit review
        $id = filter_input(INPUT_GET, 'id');
        $review = get_review($db, $id);
        echo edit_review_form($review);;

    }
    else {
        
        // Add record and return to list
        if (update_review ($db, $id, $designer, $url, $report, $score, $date))
        {
            header("Location: index.php");
        };
    }
 
?>
