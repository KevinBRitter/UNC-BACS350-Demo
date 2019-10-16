<?php

    // Code to define functions
    require_once 'views.php';
    require_once 'notes_views.php';
    require_once 'notes_db.php';


    // Pick out the inputs
    $id    = filter_input(INPUT_POST, 'id');
    $title = filter_input(INPUT_POST, 'title');
    $body  = filter_input(INPUT_POST, 'body');
    $date  = filter_input(INPUT_POST, 'date');

//        date_default_timezone_set("America/Denver");
//        $date  = date('Y-m-d g:i:s a');
        

    // Gather user input with a form
    if ($title == '' || $body == '' || $date == '') {
        
        // Form view to add notes
        $id = filter_input(INPUT_GET, 'id');
        $note = get_note($db, $id);
        $edit_form = edit_note_form($note);

        // Display the HTML in the page
        $intro = 'Enter the data for your note';
        $content = "$intro $list $edit_form $clear_button";

        echo render_page('UNC BACS 350', "Edit Note", $content);
    }
    else {
        
        // Add record and return to list
        if (update_note ($db, $id, $title, $body, $date))
        {
            header("Location: index.php");
        };
        header("Location: index.php");
    }
 
?>
