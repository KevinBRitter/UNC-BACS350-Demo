<?php

    // Connect to the database
    require_once 'db.php';


    // Query for all subscribers
    function query_subscribers ($db) {
        $query = "SELECT * FROM subscribers";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }


    // render_subscriber_list -- Create a bullet list in HTML
    function render_subscriber_list($subscribers) {
        $s = '<ul>';
        foreach($subscribers as $row) {
            $name = "<b>$row[name]</b>";
            $email = "email: $row[email]";
            $s .= "<li>$name - $email</li>";
        }
        $s .= '</ul>';
        return $s;
    }


    // render_subscriber_table -- Create a table in HTML
    function render_subscriber_table($table) {
        $s = '<table>';
        $s .= '<tr><th>Id</th><th>Name</th><th>Email</th></tr>';
        foreach($table as $row) {
            $id = "$row[id]";
            $name = "<b>$row[name]</b>";
            $email = "$row[email]";
            $s .= "<tr><td>$id</td><td>$name</td><td>$email</td></tr>";
        }
        $s .= '</table>';
        return $s;
    }

?>
