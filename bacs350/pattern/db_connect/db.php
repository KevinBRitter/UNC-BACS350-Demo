<?php

    /*
        General database connection.  This design works for either local or remote
        database connections.  It automatically determines which is needed at 
        execution time.
    */


    // Connect to Bluehost database 
    function subscriber_database($host, $dbname, $username, $password) {
        try {
            $db_connect = "mysql:host=$host;dbname=$dbname";
            return new PDO($db_connect, $username, $password);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Connect to the Bluehost database
    function bluehost_connect() {
        $port = '3306';
        $host = "localhost:$port";
        $dbname = 'uncobacs_subscribers';
        $username = 'uncobacs_350';
        $password = 'BACS_350';
        return subscriber_database($host, $dbname, $username, $password);
    }


    // Local Host Database settings
    function local_connect() {
        $host = 'localhost';
        $dbname = 'subscribers';
        $username = 'root';
        $password = '';
        return subscriber_database($host, $dbname, $username, $password);
    }


    // Open the database or die
    function subscribers_connect() {
        $local = ($_SERVER['SERVER_NAME'] == 'localhost');
        if ($local) {
            return local_connect();
        } 
        else {
            return bluehost_connect();
        }
    }


    // Create a connection
    $db = subscribers_connect();

?>
