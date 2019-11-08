<?php

    // Create a database connection
    require_once 'db.php';
    require_once 'log.php';
    require_once 'views.php';


    /* ---------------------------
             M O D E L
     --------------------------- */

    // Add a new record
    function add_slides() {
        global $db;

        // Pick out the inputs
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');

        if (!empty($title) && !empty($body)) {

            try {
                $query = "INSERT INTO slides (title, body) VALUES (:title, :body);";
                $statement = $db->prepare($query);
                $statement->bindValue(':title', $title);
                $statement->bindValue(':body', $body);
                $statement->execute();
                $statement->closeCursor();

                log_event('Slides CREATE');
                return true;
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p>Error: $error_message</p>";
                die();
            }
        }
    }


    // Lookup Record using ID
    function get_slides($id) {
        global $db;

        try {
            $query = "SELECT * FROM slides WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $record = $statement->fetch();
            $statement->closeCursor();

            log_event('Slides READ');                       // READ
            return $record;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Query for all slides
    function list_slides () {
        global $db;

        try {
            $query = "SELECT * FROM slides";
            $statement = $db->prepare($query);
            $statement->execute();

            log_event('Slides READ');                       // READ
            return $statement->fetchAll();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }

    }


    // Delete Database Record
    function delete_slides() {
        global $db;

        $id = filter_input(INPUT_GET, 'id');
        if (!empty($id)) {
            try {
                $query = "DELETE from slides WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->bindValue(':id', $id);
                $statement->execute();
                $statement->closeCursor();

                log_event('Slides DELETE');                     // DELETE
                return true;
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p>Error: $error_message</p>";
                die();
            }
        }
    }


    // Update the database
    function update_slides () {
        global $db;

        // Pick out the inputs
        $id = filter_input(INPUT_POST, 'id');
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');

        if (!empty($id) && !empty($title) && !empty($body)) {

            try {
                // Modify database row
                $query = "UPDATE slides SET title=:title, body=:body WHERE id = :id";
                $statement = $db->prepare($query);

                $statement->bindValue(':id', $id);
                $statement->bindValue(':title', $title);
                $statement->bindValue(':body', $body);

                $statement->execute();
                $statement->closeCursor();

                log_event('Slides UPDATE');                     // UPDATE
                return true;
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p>Error: $error_message</p>";
                die();
            }
        }
    }


    /* ---------------------------
                V I E W
     --------------------------- */

    // Create an HTML list on the output
    function slides_list_view($slides) {
        $html = '';
        foreach($slides as $row) {
            $html .= render_template('slides.html', $row);
        }
        return $html;
    }


    // add_slides_form -- Create an HTML form to add record.
    function add_slides_view() {
        log_event('Slides Add View');                   // Add View
        return render_template('add.html', array());
    }


    // Show form for adding a record
    function edit_slides_view($record) {
        log_event('Slides Edit View');                  // Edit View
        return render_template('edit.html', $record);
    }


    /* ---------------------------
         C O N T R O L L E R
     --------------------------- */

    // Handle all action verbs
    function handle_actions() {

        // POST
        $action = filter_input(INPUT_POST, 'action');
        if ($action == 'create') {
            if (add_slides()) {
                header('Location: index.php');
            }
        }
        if ($action == 'update') {
            if (update_slides()) {
                header('Location: index.php');
            }
        }

        // GET
        $action = filter_input(INPUT_GET, 'action');
        if (empty($action)) {
            $list = list_slides();
            return slides_list_view($list);
        }
        if ($action == 'delete') {
            delete_slides();
            header('Location: index.php');
        }
        if ($action == 'add') {
            return add_slides_view();
        }
        if ($action == 'edit') {
            $id = filter_input(INPUT_GET, 'id');
            if (! empty($id)) {
                return edit_slides_view(get_slides($id));
            }
//            header('Location: index.php');
        }
    }


?>
