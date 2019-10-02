<?php

    // Use the proper settings to connect to the local database

    $host = 'localhost';
    $dbname = 'bacs350';
    $db_connect = "mysql:host=$host;dbname=$dbname";

    $username = 'root';
    $password = '';

    echo "<h1>Connect to Local Database</h1>
          <p>Database: $dbname</p>
          <p>User: $username</p>";

    try {
            $db = new PDO($db_connect, $username, $password);
            // echo '<p><b>Successful Connection</b></p>';
            return $db;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    echo '<p>Database is connected</p>
          <p><a href="bluehost.php">Attempt Bluehost Connection</a></p>
          <p><a href="index.php">Database Connection</a></p>';

?>
