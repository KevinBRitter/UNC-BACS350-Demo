<?php

/*
    General database connection.  This design works for either local or remote
    database connections.  It automatically determines which is needed at 
    execution time.
    */

// $port = '3306';
// $dbname = 'uncobacs_subscribers';
// $db_connect = "mysql:host=localhost:$port;dbname=$dbname";
// $username = 'uncobacs_350';
// $password = 'BACS_350';
// $db = new PDO($db_connect, $username, $password);
//
//
// echo '<h1>Success 1: Connect to database</h1>';
//
//
// // SQL SELECT
//
// // Get a list of records into an array
// $query = "SELECT * FROM subscribers";
// $statement = $db->prepare($query);
// $statement->execute();
// $subscribers = $statement->fetchAll();
//
// // Create an HTML list on the output
// echo '<p>Subscribers</p>
//<ul>';
    // foreach($subscribers as $row) {
    // echo "<li><b>$row[name]</b> - email: $row[email]</li>";
    // }
    // echo '</ul>';
//
//
// echo '<h1>Success 2: Show List of Subscribers</h1>';
//
//
// // SQL INSERT
// $name = 'Bogus Test user';
// $email = 'bogus_user@gmail.com';
//
// try {
// // Add database row
// $query = "INSERT INTO subscribers (name, email) VALUES (:name, :email);";
// $statement = $db->prepare($query);
// $statement->bindValue(':name', $name);
// $statement->bindValue(':email', $email);
// $statement->execute();
// $statement->closeCursor();
// } catch (PDOException $e) {
// $error_message = $e->getMessage();
// echo "<p>Error: $error_message</p>";
// die();
// }
//
//
// echo '<h1>Success 3: Add Subscriber</h1>';
//
//
// // Get a list of records into an array
// $query = "SELECT * FROM subscribers";
// $statement = $db->prepare($query);
// $statement->execute();
// $subscribers = $statement->fetchAll();
//
// // Create an HTML list on the output
// echo '<p>Subscribers</p>
// <ul>';
    // foreach($subscribers as $row) {
    // echo "<li><b>$row[name]</b> - email: $row[email]</li>";
    // }
    // echo '</ul>';
//
//
// echo '<h1>Success 4: Show Test Subscriber</h1>';
//
//
// // Delete database row
// $email = 'bogus_user@gmail.com';
// $query = "DELETE from subscribers WHERE email = :email";
// $statement = $db->prepare($query);
// $statement->bindValue(':email', $email);
// $statement->execute();
// $statement->closeCursor();
//
//
// echo '<h1>Success 5: Delete Test Subscriber</h1>';
//
//
// // Get a list of records into an array
// $query = "SELECT * FROM subscribers";
// $statement = $db->prepare($query);
// $statement->execute();
// $subscribers = $statement->fetchAll();
//
// // Create an HTML list on the output
// echo '<p>Subscribers</p>
//<ul>';
    // foreach($subscribers as $row) {
    // echo "<li><b>$row[name]</b> - email: $row[email]</li>";
    // }
    // echo '</ul>';

//    echo '<h1>Success 6: Show Subscribers</h1>';

?>


<!--

    PHP Code for more efficient CRUD
    
    // Create an HTML list on the output
    function render_subscribers($subscribers) {
        echo '<p>Subscribers</p><ul>';
        foreach($subscribers as $row) {
            echo "<li><b>$row[name]</b> - email: $row[email]</li>";
        }
        echo '</ul>';
    }
    
    
    require 'subscribers.php';
    
    $subscribers = add_subscriber($db, 'FDR', 'fdr@us.gov');
    
    echo render_subscribers(list_subscribers ($db));
    
    delete_subscriber($db, 6)

-->

<p>This page was successful. Take a screen shot</p>
