<?php

    require_once 'views.php';


    // add_superhero_form -- Create an HTML form to add record.
    function add_superhero_form() {
        $title = 'Add Superhero';
        $body = '
            <form action="insert.php" method="get">
                <p><label>Name:</label> &nbsp; <input type="text" name="name"></p>
                <p><label>Also Known As:</label> &nbsp; <input type="text" name="aka"></p>
                <p><label>Photo:</label> &nbsp; <input type="text" name="image"></p>
                <p><label>Description:</label> &nbsp; 
                <textarea name="description">Text goes here.</textarea></p>
                <p><input class="button" type="submit" value="Add Superhero"/></p>
            </form>
            ';
        return render_card($title, $body);
    }


    // Create an HTML list on the output
    function render_superheroes($superheroes) {
        $html = '';
        foreach($superheroes as $row) {
            $title = $row['name'];
            $delete = "<a href='delete.php?id=$row[id]'>Delete Record</a>";
            $photo = "<img src='images/$row[image]' alt='$row[image]'>";
            $body = "
                <table class='table table-hover'>
                    <tr><td>$photo</td></tr>
                    <tr><td>Superhero:</td><td>$row[aka]</td></tr>
                    <tr><td>Name:</td><td>$title</td></tr>
                    <tr><td>Notes:</td><td>$row[description]</td></tr>
                    <tr><td>Record $row[id]</td><td>$delete</td></tr>
                </table>";
            $html = $html . render_card($title, $body);
        }
        return $html;
    }
    
?>
