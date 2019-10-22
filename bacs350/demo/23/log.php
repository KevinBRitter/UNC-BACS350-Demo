<?php

    /* ----------------------------------------------
        This code shows how to hook up a logging utility.

        usage:
            require_once 'log.php';

            // Log an event
            $text_message = "This text message";
            add_log($log, $text_message);
            
            // Show history
            $history = render_log($log);
            
            // Delete all log history
            clear_log($log);


        SQL Database table

            // Create table log: date, text
            CREATE TABLE log (
              id int(3) NOT NULL AUTO_INCREMENT,
              date varchar(100)  NOT NULL,
              text varchar(100) NOT NULL,
              PRIMARY KEY (id)
            );

    ---------------------------------------------- */


    /* ----------------------------------------------
        Data - CRUD Operations
        
        CREATE - add_log($log, $text)
        READ   - query_log ($log)
        UPDATE
        DELETE - clear_log($log)
    ---------------------------------------------- */


    // Add a new record
    function add_log($log, $text) {

        // Show if insert is successful or not
        try {
            // Create a string for "now"
            date_default_timezone_set("America/Denver");
            $date = date('Y-m-d g:i:s a');
            
            // Add database row
            $query = "INSERT INTO log (date, text) VALUES (:date, :text);";
            $statement = $log->prepare($query);
            $statement->bindValue(':date', $date);
            $statement->bindValue(':text', $text);
            $statement->execute();
            $statement->closeCursor();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Delete all database rows
    function clear_log($log) {
        
        try {
            $query = "DELETE FROM log";
            $statement = $log->prepare($query);
            $row_count = $statement->execute();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
        
    }


    // Query for all log
    function query_log ($log) {

        $query = "SELECT * FROM log";
        $statement = $log->prepare($query);
        $statement->execute();
        return $statement->fetchAll();

    }


    /* ----------------------------------------------
        Views
    ---------------------------------------------- */


    // render_list -- Loop over all of the log to make a bullet list
    function render_log($log) {
        $list = query_log ($log);
        $text = '<h3>Application History</h3><ul>';
        foreach ($list as $s) {
            $text .= '<li>' . $s['date'] . ', ' . $s['text'] . '</li>';
        }
        $text .= '</ul>';
        return $text;     
    }


    /* -------------------------------
        DATABASE CONNECT
    ------------------------------- */

    // Connect to Bluehost database 
    function log_database($host, $logname, $username, $password) {
        try {
            $log_connect = "mysql:host=$host;dbname=$logname";
            return new PDO($log_connect, $username, $password);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Connect to the Bluehost database
    function bluehost_connect() {
        $dbname = 'uncobacs_350';
        $username = 'uncobacs_350';
        $password = 'BACS_350';
        $port = '3306';
        $host = "localhost:$port";
        return log_database($host, $dbname, $username, $password);
    }


    // Create a database connection
    $log = bluehost_connect(); 

?>
