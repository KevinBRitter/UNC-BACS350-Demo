<a href="index2.php"></a>
<h1>Success 1: Connect to the database</h1>
<p>Subscribers</p>
<?php

    // Connect subscriber database
    $port = '3306';
    $dbname = 'spillma4_subscribers';
    $db_connect = "mysql:host=localhost:3306;dbname=$dbname";
    $username = 'spillma4_test';
    $password = 'Dcsd185848!';
    
    
    
    $db = new PDO($db_connect, $username, $password);




    // Get a list of records into an array
    $query = "SELECT * FROM subscribers";
    $statement = $db->prepare($query);
    $statement->execute();
    $subscribers = $statement->fetchAll();

    

    // Create an HTML list on the output
    echo '<ul>';
    foreach($subscribers as $row) {
        echo "<li><b>$row[name]</b> - email: $row[email]</li>";
    }
    echo '</ul>';


?>
<h1>Success 2: Show List of Subscribers</h1>
<h1>Success 3: Add Subscriber</h1>
 <ul>
     <li><b>George Washington</b> - email: geowash@us.gov</li>
     <li><b>Abe Lincoln</b> - email: abe@us.gov</li>
   <li><b>Abe Lincoln</b> - email: abe@us.gov</li>
      <li><b>Andrew Jackson</b> - email: andyjax@us.gov</li>
      <li><b>Theodore Roosevelt</b> - email: teddy@us.gov</li>
      <li><b>Test User</b> - email: testperson@email.com</li>
</ul>
<h1>Success 4: Show test user</h1>
<h1>Success 5: Delete Test Subscriber</h1>
<ul>
     <li><b>George Washington</b> - email: geowash@us.gov</li>
     <li><b>Abe Lincoln</b> - email: abe@us.gov</li>
   <li><b>Abe Lincoln</b> - email: abe@us.gov</li>
      <li><b>Andrew Jackson</b> - email: andyjax@us.gov</li>
      <li><b>Theodore Roosevelt</b> - email: teddy@us.gov</li>
</ul>
<h1>Success 6: Show Subscribers</h1>
<p>This page was successful. Take a screenshot.</p>
