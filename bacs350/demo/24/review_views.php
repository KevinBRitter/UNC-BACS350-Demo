<?php

    require_once 'views.php';


    // add_review_form -- Create an HTML form to add record.
    // Fields: designer, url, report, score, date
    function add_review_form() {
        $title = 'Add Review';
        $body = '
            <form action="insert.php" method="get">
                <table class="table table-hover">
                    <tr>
                        <td width="500"><label>Date:</label></td>
                        <td><input type="date" name="date"></td>
                    </tr>
                    <tr>
                        <td><label>Designer:</label></td>
                        <td><input type="text" name="designer"></td>
                    </tr>
                    <tr>
                        <td><label>Page to Review:</label></td>
                        <td><input type="url" name="url"></td>
                    </tr>
                    <tr>
                        <td><label>Review Score:</label></td>
                        <td><input type="number" name="score"></td>
                    </tr>
                    <tr>
                        <td><label>Page to Review:</label></td>
                        <td><textarea name="report"></textarea></td>
                    </tr>
                    <tr>
                        <td><button class="button">Save Review</button></td>
                    </tr>
                </table>
            </form>
            ';
        return render_card($title, $body);
    }


    // Create an HTML list on the output
    function render_reviews($reviews) {
        $html = '';
        foreach($reviews as $row) {
            $title = $row['title'];
            $delete_href = "delete.php?id=$row[id]";
            $edit_href = "update.php?id=$row[id]";
            $body = "
                <p>Note #$row[id]. $title</p>
                <p>$row[body]</p>
                <p>
                    <a class='button' href='$edit_href'>Edit</a>
                    <a class='button' href='$delete_href'>Delete</a>
                </p>";
            $html .= render_card($title, $body);
        }
        return $html;
    }


    // Show form for adding a record
    function edit_review_form($record) {
        $id    = $record['id'];
        $date  = $record['date'];
        $title = $record['title'];
        $body  = $record['body'];
        $card_title = "Edit Note";
        $card_body = '
            <form action="update.php" method="post">
                <table class="table table-hover">
                    <tr>
                        <td><label>Date:</label></td>
                        <td><input type="date" name="date" value="' . $date . '"></td>
                    </tr>
                    <tr>
                        <td><label>Title:</label></td>
                        <td><input type="text" name="title" value="' . $title . '"></td>
                    </tr>
                    <tr>
                        <td><label>Body:</label></td>
                        <td><textarea name="body">' . $body . '</textarea></td>
                    </tr>
                    <tr>
                        <td><button class="button">Save Record</button></td>
                    </tr>
                </table>
                <input type="hidden" name="id" value="' . $id . '">
            </form>
        ';
        return render_card($card_title, $card_body);
    }
    
?>
