<?php

    // Connect to the database
    require_once 'subscriber_db.php';

    // Get the email of the record to delete
    $email = filter_input(INPUT_GET, 'email');

    // Attempt to remove the record
    delete_subscriber($db, $email);

    // Return to the list
    header("Location: index.php");
?>
