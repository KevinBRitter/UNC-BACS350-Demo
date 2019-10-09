<?php

    // Connect to Bluehost database 
    function subscriber_database($dbname, $username, $password) {
        try {
            $port = '3306';
            $db_connect = "mysql:host=localhost:$port;dbname=$dbname";
            return new PDO($db_connect, $username, $password);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }

    // Add a new record
    function add_subscriber($db, $name, $email) {
        try {
            $query = "INSERT INTO subscribers (name, email) VALUES (:name, :email);";
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Delete Database Record
    function delete_subscriber($db, $email) {
        try {
            $query = "DELETE from subscribers WHERE email = :email";
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Lookup Record using ID
    function get_subscriber($db, $id) {
        try {
            $query = "SELECT * FROM subscribers WHERE id = :id";
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
       

    // Query for all subscribers
    function list_subscribers ($db) {
       try {
            $query = "SELECT * FROM subscribers";
            $statement = $db->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
        
    }


    // Create a database connection
    $dbname = 'uncobacs_subscribers';
    $username = 'uncobacs_350';
    $password = 'BACS_350';
    $db = subscriber_database($dbname, $username, $password);

?>
