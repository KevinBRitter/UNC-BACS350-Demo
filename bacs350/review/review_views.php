<?php

    require_once 'views.php';

    /*
        * id - int (primary key and autoincrement)
        * designer - string (100 chars)
        * url - string(200 chars)
        * report - text(no limit)
        * score - number(0-10)
        * date - date
    */

    // add_review_form -- Create an HTML form to add record.
    // Fields: designer, url, report, score, date
    function add_review_form() {
        $title = '<h2>Add New Design Review</h2>';
        $report = 'Default Requirements
                        
* Main page is "bacs350/index.php"
* Data Views (list, detail, add, edit, delete)
* Create and modify markdown content
* Run slide show in new tab
* Custom styles for your app
* Log all pages loaded
* Use design patterns to avoid duplication
* Page HTML and CSS validate';
        $add_form = render_template('add.html', array('report' => $report));
        $content = "$title $add_form";

        // Create main part of page content
        $settings = array(
            "site_title" => "UNC BACS 350",
            "page_title" => "Design Review App", 
            "logo"       => "Bear.png",
            "style"      => 'style.css',
            "content"    => $content);

        return render_page($settings);
    }


    // Create an HTML list on the output
    function render_reviews($reviews) {
        $html = '';
        foreach($reviews as $row) {
            $title = "Review #$row[id]. $row[url]";
            $body = render_template("list.html", $row);
            $html .= render_card($title, $body);
        }
        return $html;
    }


    // Show form for adding a record
    function edit_review_form($record) {
        $body = render_template("edit.html", $record);
        $title = "Edit Review #$record[id]. $record[url]";
        $content = render_card($title, $body);
        
        // Create main part of page content
        $settings = array(
            "site_title" => "UNC BACS 350",
            "page_title" => "Design Review App", 
            "logo"       => "Bear.png",
            "style"      => 'style.css',
            "content"    => $content);

        return render_page($settings);
    }
    
?>
