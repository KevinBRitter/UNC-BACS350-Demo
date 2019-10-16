<?php

    /* -------------------------------
        CRUD OPERATIONS
    ------------------------------- */

    // Add a new record
    function add_note($db, $title, $text, $date) {
        try {
            $query = "INSERT INTO notes (title, body, date) VALUES (:title, :body, :date);";
            $statement = $db->prepare($query);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':body', $body);
            $statement->bindValue(':date', $date);
            $statement->execute();
            $statement->closeCursor();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


     // Lookup Record using ID
    function get_note($db, $id) {
        try {
            $query = "SELECT * FROM notes WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $record = $statement->fetch();
            $statement->closeCursor();
            return $record;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
       
    }
       

    // Query for all notes
    function list_notes ($db) {
       try {
            $query = "SELECT * FROM notes";
            $statement = $db->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
        
    }


    // Delete Database Record
    function delete_note($db, $id) {
        try {
            $query = "DELETE from notes WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $statement->closeCursor();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    /* -------------------------------
        DATABASE CONNECT
    ------------------------------- */

    // Connect to Bluehost database 
    function note_database($host, $dbname, $username, $password) {
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
        $dbname = 'uncobacs_350';
        $username = 'uncobacs_350';
        $password = 'BACS_350';
        $port = '3306';
        $host = "localhost:$port";
        return note_database($host, $dbname, $username, $password);
    }


    // Create a database connection
    $db = bluehost_connect(); 

?>
