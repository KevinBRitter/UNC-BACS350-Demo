<?php

    require_once 'views.php';


    // add_note_form -- Create an HTML form to add record.
    function add_note_form() {
        $title = 'Add Note';
        $body = '
            <form action="insert.php" method="get">
                <p><label>Date:</label> &nbsp; <input type="date" name="date"></p>
                <p><label>Title:</label> &nbsp; <input type="text" name="title"></p>
                <p><label>Text:</label> &nbsp; <textarea name="body">Blank</textarea></p>
                <p><input class="button" type="submit" value="Add Note"/></p>
            </form>
            ';
        return render_card($title, $body);
    }


    // Create an HTML list on the output
    function render_notes($notes) {
        $html = '';
        foreach($notes as $row) {
            $title = $row['title'];
            $delete_href = "delete.php?id=$row[id]";
            $edit_href = "update.php?id=$row[id]";
            $body = "
                <p>Note #$row[id]. $title</p>
                <p>$row[body]</p>
                <p><a href=$edit_href>Edit Record</a></p>
                <p><a href=$delete_href>Delete Record</a></p>";
            $html .= render_card($title, $body);
        }
        return $html;
    }


    // Show form for adding a record
    function edit_note_form($record) {
        $id    = $record['id'];
        $date  = $record['date'];
        $title  = $record['title'];
        $body = $record['body'];
        return '
            <h3>Edit note</h3>
            <form action="update.php" method="post">
                <p><label>Date:</label> &nbsp; <input type="date" name="date" value="' . $date . '"></p>
                <p><label>Title:</label> &nbsp; <input type="text" name="title" value="' . $title . '"></p>
                <p><label>Body:</label> &nbsp; <textarea name="body">' . $body . '</textarea></p>
                <p><input type="submit" value="Save Record"/></p>
                <input type="hidden" name="id" value="' . $id . '">
            </form>
        ';
    }
    
?>
