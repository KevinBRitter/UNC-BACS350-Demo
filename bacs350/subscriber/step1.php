<h1>Subscriber Database - Step 1</h1>

<p>This page demonstrates a connection to an actual database at Bluehost.</p>
<p>This is the expanded and instrumented code.</p>
<p>Once the database is connect a list of subscribers is obtained and converted into HTML.</p>

<p>
    <a href="index.php">Subscriber List Code</a>
</p>

<h1>CONNECT to Subscriber Database</h1>

<?php

    // Connect subscriber database
    $port = '3306';
    $dbname = 'uncobacs_subscribers';
    $db_connect = "mysql:host=localhost:$port;dbname=$dbname";
    $username = 'uncobacs_350';
    $password = 'BACS_350';
    
    echo "<h1>$db_connect</h1>";
    
    $db = new PDO($db_connect, $username, $password);

    echo "<h1>CONNECTED</h1>";


    // Get a list of records into an array
    $query = "SELECT * FROM subscribers";
    $statement = $db->prepare($query);
    $statement->execute();
    $subscribers = $statement->fetchAll();

    echo "<h1>QUERY DONE</h1>";

    // Create an HTML list on the output
    echo '<ul>';
    foreach($subscribers as $row) {
        echo "<li><b>$row[name]</b> - email: $row[email]</li>";
    }
    echo '</ul>';

    echo "<h1>LIST CREATED</h1>";

?>
