<?php

    // Connect to the database
    require_once 'notes_db.php';

    // Get the email of the record to delete
    $id = filter_input(INPUT_GET, 'id');

    // Attempt to remove the record
    delete_note($db, $id);

    // Return to the list
    header("Location: index.php");
?>
