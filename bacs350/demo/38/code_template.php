<?php

    // Create a database connection
    require_once 'db.php';
    require_once 'log.php';
    require_once 'views.php';


    /* ---------------------------
             M O D E L
     --------------------------- */

    // Add a new record
    function add_{{ datatype }}() {
        global $db;

        // Pick out the inputs
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $date = filter_input(INPUT_POST, 'date');

        if (!empty($title) && !empty($body) && !empty($date)) {

            try {
                $query = "INSERT INTO {{ datatype }}s (title, body, date) VALUES (:title, :body, :date);";
                $statement = $db->prepare($query);
                $statement->bindValue(':title', $title);
                $statement->bindValue(':body', $body);
                $statement->bindValue(':date', $date);
                $statement->execute();
                $statement->closeCursor();

                log_event('Note CREATE');
                return true;
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p>Error: $error_message</p>";
                die();
            }
        }
    }


    // Lookup Record using ID
    function get_{{ datatype }}($id) {
        global $db;

        try {
            $query = "SELECT * FROM {{ datatype }}s WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $record = $statement->fetch();
            $statement->closeCursor();

            log_event('Note READ');                       // READ
            return $record;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Query for all {{ datatype }}s
    function list_{{ datatype }}s () {
        global $db;

        try {
            $query = "SELECT * FROM {{ datatype }}s";
            $statement = $db->prepare($query);
            $statement->execute();

            log_event('Note READ');                       // READ
            return $statement->fetchAll();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }

    }


    // Delete Database Record
    function delete_{{ datatype }}() {
        $id = filter_input(INPUT_POST, 'id');
        if (!empty($id)) {
            try {
                $query = "DELETE from {{ datatype }}s WHERE id = :id";
                global $db;
                $statement = $db->prepare($query);
                $statement->bindValue(':id', $id);
                $statement->execute();
                $statement->closeCursor();

                log_event('Note DELETE');                     // DELETE
                return true;
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p>Error: $error_message</p>";
                die();
            }
        }
    }


    // Update the database
    function update_{{ datatype }} () {
        global $db;

        // Pick out the inputs
        $id = filter_input(INPUT_POST, 'id');
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $date = filter_input(INPUT_POST, 'date');

        if (!empty($id) && !empty($title) && !empty($body) && !empty($date)) {

            try {
                // Modify database row
                $query = "UPDATE {{ datatype }}s SET title=:title, body=:body, date=:date WHERE id = :id";
                $statement = $db->prepare($query);

                $statement->bindValue(':id', $id);
                $statement->bindValue(':title', $title);
                $statement->bindValue(':body', $body);
                $statement->bindValue(':date', $date);

                $statement->execute();
                $statement->closeCursor();

                log_event('Note UPDATE');                     // UPDATE
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
    function {{ datatype }}_list_view(${{ datatype }}s) {
        $html = '';
        foreach(${{ datatype }}s as $row) {
            $html .= render_template('{{ datatype }}.html', $row);
        }
        return $html;
    }


    // add_{{ datatype }}_form -- Create an HTML form to add record.
    function add_{{ datatype }}_view() {
        log_event('Note Add View');                   // Add View
        $page = $_SERVER['PHP_SELF'];
        require_login ($page);        
        return render_template('{{ datatype }}_add.html', array());
    }


    // Show form for adding a record
    function edit_{{ datatype }}_view($record) {
        log_event('Note Edit View');                  // Edit View
        $page = $_SERVER['PHP_SELF'];
        require_login ($page); 
        return render_template('{{ datatype }}_edit.html', $record);
    }


    // Show form for adding a record
    function delete_{{ datatype }}_view($record) {
        log_event('Note Edit View');                  // Edit View
        $page = $_SERVER['PHP_SELF'];
        require_login ($page); 
        return render_template('{{ datatype }}_delete.html', $record);
    }


    /* ---------------------------
         C O N T R O L L E R
     --------------------------- */

    // Handle all action verbs
    function handle_{{ datatype }}s_actions() {

        // POST
        $action = filter_input(INPUT_POST, 'action');
        if ($action == 'create') {
            if (add_{{ datatype }}()) {
                header('Location: index.php');
            }
        }
        if ($action == 'update') {
            if (update_{{ datatype }}()) {
                header('Location: index.php');
            }
        }
        if ($action == 'delete') {
            if (delete_{{ datatype }}()) {
                header('Location: index.php');
            }
        }

        // GET
        $action = filter_input(INPUT_GET, 'action');
        if (empty($action)) {
            $list = list_{{ datatype }}s();
            return {{ datatype }}_list_view($list);
        }
        if ($action == 'add') {
            return add_{{ datatype }}_view();
        }
        if ($action == 'remove') {
            $id = filter_input(INPUT_GET, 'id');
            if (! empty($id)) {
                return delete_{{ datatype }}_view(get_{{ datatype }}($id));
            }
        }
        if ($action == 'edit') {
            $id = filter_input(INPUT_GET, 'id');
            if (! empty($id)) {
                return edit_{{ datatype }}_view(get_{{ datatype }}($id));
            }
        }
    }


?>
