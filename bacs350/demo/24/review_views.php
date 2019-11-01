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
                        <td style="width:300px"><label>Date:</label></td>
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
                        <td><label>Review Summary:</label></td>
                        <td><textarea name="report"> Requirements
                        
* Main page is "bacs350/index.php"
* Data Views (list, detail, add, edit, delete)
* Create and modify markdown content
* Run slide show in new tab
* Custom styles for your app
* Log all pages loaded
* Use design patterns to avoid duplication
* Page HTML and CSS validate
</textarea></td>
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
            $delete_href = "delete.php?id=$row[id]";
            $edit_href = "update.php?id=$row[id]";
            $body = "
                <p>Review #$row[id]. $row[url]</p>
                <p>$row[date]</p>
                <p>Score: $row[score] requirements met</p>
                <p>
                    <a class='button' href='$edit_href'>Edit</a>
                    <a class='button' href='$delete_href'>Delete</a>
                </p>";
            $html .= render_card($title, $body);
        }
        return $html;
    }
/*
    * id - int (primary key and autoincrement)
    * designer - string (100 chars)
    * url - string(200 chars)
    * report - text(no limit)
    * score - number(0-10)
    * date - date
*/

    // Show form for adding a record
    function edit_review_form($record) {
        $id = $record['id'];
        $designer = $record['designer'];
        $url = $record['url'];
        $report = $record['report'];
        $score = $record['score'];
        $date = $record['date'];

        $card_title = "Edit Note";
        $card_body = '
            <form action="update.php" method="get">
                <table class="table table-hover">
                    <tr>
                        <td style="width:200px"><label>Date:</label></td>
                        <td><input type="date" name="date" value="' . $date . '"></td>
                    </tr>
                    <tr>
                        <td><label>Designer:</label></td>
                        <td><input type="text" name="designer" value="' . $designer . '"></td>
                    </tr>
                    <tr>
                        <td><label>Page:</label></td>
                        <td><input type="text" name="url" value="' . $url . '"></td>
                    </tr>
                    <tr>
                        <td><label>Score:</label></td>
                        <td><input type="number" name="score" value="' . $score . '"></td>
                    </tr>
                    <tr>
                        <td><label>Report:</label></td>
                        <td><textarea name="report">' . $report . '</textarea></td>
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
