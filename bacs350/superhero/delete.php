<?php

    // Connect to the database
    require_once 'superhero_db.php';

    // Get the email of the record to delete
    $email = filter_input(INPUT_GET, 'email');

    // Attempt to remove the record
    delete_superhero($db, $email);

    // Return to the list
    header("Location: index.php");
?>
