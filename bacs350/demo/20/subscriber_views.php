<?php

    require_once 'views.php';


    // add_subscriber_form -- Create an HTML form to add record.
    function add_subscriber_form() {
        $title = 'Add Subscriber';
        $body = '
            <form action="insert.php" method="get">
                <p><label>Name:</label> &nbsp; <input type="text" name="name"></p>
                <p><label>Email:</label> &nbsp; <input type="text" name="email"></p>
                <p><input class="button" type="submit" value="Add Subscriber"/></p>
            </form>
            ';
        return render_card($title, $body);
    }


    // Create an HTML list on the output
    function render_subscribers($subscribers) {
        $html = '<h2>Subscribers</h2>';
        foreach($subscribers as $row) {
            $title = $row['name'];
            $delete_href = "delete.php?email=$row[email]";
            $body = "<p>Name: $row[name]</p>
                <p>$row[email]</p>
                <p><a href=\"$delete_href\">Delete Record</a></p>";
            $html = $html . render_card($title, $body);
        }
        return $html;
    }
    
?>
