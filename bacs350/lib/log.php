<?php

    require_once 'db.php';


    /*
    This code shows how to hook up a logging utility.

    usage:
        $text_message = "This text message";
        require_once 'log.php';
        log_event($text_message);
        render_history();

    SQL Database table

        // Create table log: date, text
        CREATE TABLE log (
          id int(3) NOT NULL AUTO_INCREMENT,
          date varchar(100)  NOT NULL,
          text varchar(100) NOT NULL,
          PRIMARY KEY (id)
        );
    */


    /* ----------------------------------------------
                    D a t a
    ---------------------------------------------- */

    // Record log events with timestamp page and text message
    function log_event($text) {
        global $db;

        $text = "$_SERVER[PHP_SELF] - $text";
        $date = date('Y-m-d g:i a');   // Create a string for "now"

        try {
            // Add database row
            $query = "INSERT INTO log (date, text) VALUES (:date, :text);";
            $statement = $db->prepare($query);
            $statement->bindValue(':date', $date);
            $statement->bindValue(':text', $text);
            $statement->execute();
            $statement->closeCursor();
            // Show if insert is successful or not
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Log each page load and display the action
    function log_page() {
        $action = filter_input(INPUT_POST, 'action') . filter_input(INPUT_GET, 'action');
        log_event("PAGE LOADED, action=$action");
    }


    // Delete all database rows
    function clear_log() {
        global $db;

        try {
            $query = "DELETE FROM log";
            $statement = $db->prepare($query);
            $row_count = $statement->execute();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Query for all log
    function query_log () {
        global $db;
        $query = "SELECT * FROM log";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }


    // render_list -- Loop over all of the log to make a bullet list
    function render_history($list) {
        $text = '<h3>Application History</h3><ul>';
        foreach ($list as $s) {
            $text .= '<li>' . $s['id'] . ', ' . $s['date'] . ', ' . $s['text'] . '</li>';
        }
        $text .= '</ul>';
        return $text;
    }

?>
