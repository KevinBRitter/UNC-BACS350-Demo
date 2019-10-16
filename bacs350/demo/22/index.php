<?php

    // Code to define functions
    require_once 'views.php';
    require_once 'notes_views.php';
    require_once 'notes_db.php';


    // List subscriber records
    $list = render_notes(list_notes ($db));

    
    // Button to go to other views
    $add_button = '<p><a class="button" href="insert.php">Add Note</a></p>';

    
    // Display the HTML in the page
    $intro = '
        <p>
            This email list gives you access to big ideas and deep thoughts.
        </p>
        <p>
            Visit the <a href="https://unco-bacs.org/bacs350">Seaman\'s Brain</a>
        </p>
         
    ';
    $content = "$intro $add_button $list";

    // Show the page
    echo render_page('UNC BACS 350', "Demo 22 - Standard Data Views", $content);
?>
