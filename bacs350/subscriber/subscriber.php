<?php

    // Connect to the Bluehost database for subscribers
    function subscriber_database($dbname, $username, $password) {
        $port = '3306';
        $db_connect = "mysql:host=localhost:$port;dbname=$dbname";
        return new PDO($db_connect, $username, $password);
    }

    
    // Query for all subscribers
    function query_subscribers ($db) {
        $query = "SELECT * FROM subscribers";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }


    // render_subscriber_list -- Create a bullet list in HTML
    function render_subscriber_list($subscribers) {
        $s = '<ul>';
        foreach($subscribers as $row) {
            $name = "<b>$row[name]</b>";
            $email = "email: $row[email]";
            $s .= "<li>$name - $email</li>";
        }
        $s .= '</ul>';
        return $s;
    }


    // Create a connection
    $dbname = 'uncobacs_subscribers';
    $username = 'uncobacs_350';
    $password = 'BACS_350';
    $db = subscriber_database($dbname, $username, $password);
?>
