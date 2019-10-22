<?php

    /* -------------------------------
        CRUD OPERATIONS
    ------------------------------- */

    // Add a new record
    function add_superhero($db, $name, $aka, $image, $description) {
        try {
            $query = "INSERT INTO superheroes (name, aka, image, description) 
                      VALUES (:name, :aka, :image, :description);";
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':aka', $aka);
            $statement->bindValue(':image', $image);
            $statement->bindValue(':description', $description);
            $statement->execute();
            $statement->closeCursor();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            // die();
        }
    }


     // Lookup Record using ID
    function get_superhero($db, $id) {
        try {
            $query = "SELECT * FROM superheroes WHERE id = :id";
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
       

    // Query for all superheros
    function list_superheroes ($db) {
       try {
            $query = "SELECT * FROM superheroes";
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
    function delete_superhero($db, $id) {
        try {
            $query = "DELETE from superheroes WHERE id = :id";
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
    function superhero_database($host, $dbname, $username, $password) {
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
        $dbname = 'uncobacs_superhero';
        $username = 'uncobacs_350';
        $password = 'BACS_350';
        $port = '3306';
        $host = "localhost:$port";
        return superhero_database($host, $dbname, $username, $password);
    }


    // Create a database connection
    $db = bluehost_connect(); 

?>
