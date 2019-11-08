<?php

    // Create a database connection
    require_once 'db.php';
    require_once 'log.php';


    /* ---------------------------
             M O D E L
     --------------------------- */

    // Add a new record
    function add_subscriber($db) {
        try {
            $name  = filter_input(INPUT_POST, 'name');
            $email = filter_input(INPUT_POST, 'email');
            $query = "INSERT INTO subscribers (name, email) VALUES (:name, :email);";
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $statement->closeCursor();
            header('Location: index.php');
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Delete Database Record
    function delete_subscriber($db) {
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'id');
        if ($action == 'delete' and !empty($id)) {
            $query = "DELETE from subscribers WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $statement->closeCursor();
        }
        header('Location: index.php');
    }
    

    // Lookup Record using ID
    function get_subscriber($db, $id) {
        $query = "SELECT * FROM subscribers WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $record = $statement->fetch();
        $statement->closeCursor();
        return $record;
    }


    
    // Query for all subscribers
    function query_subscribers ($db) {
        $query = "SELECT * FROM subscribers";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }


    // Update the database
    function update_subscriber ($db) {
        $id    = filter_input(INPUT_POST, 'id');
        $name  = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        
        // Modify database row
        $query = "UPDATE subscribers SET name = :name, email = :email WHERE id = :id";
        $statement = $db->prepare($query);

        $statement->bindValue(':id', $id);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':email', $email);

        $statement->execute();
        $statement->closeCursor();
        
        header('Location: index.php');
    }

    /* ---------------------------
                V I E W 
     --------------------------- */

    // subscriber_list_view -- Create a bullet list in HTML
    function subscriber_list_view ($table) {
        $s = render_button('Add Subscriber', 'index.php?action=add') . '<br><br>';
        $s .= '<table>';
        $s .= '<tr><th>Name</th><th>Email</th></tr>';
        foreach($table as $row) {
            $edit = render_link($row[1], "index.php?id=$row[0]&action=edit");
            $email = $row[2];
            $delete = render_link("delete", "index.php?id=$row[0]&action=delete");
            $row = array($edit, $email, $delete);
            $s .= '<tr><td>' . implode('</td><td>', $row) . '</td></tr>';
        }
        $s .= '</table>';
        
        return $s;
    }


    // Show form for adding a record
    function add_subscriber_view() {
        return '
            <div class="card">
                <h3>Add Subscriber</h3>
                <form action="index.php" method="post">
                    <p><label>Name:</label> &nbsp; <input type="text" name="name"></p>
                    <p><label>Email:</label> &nbsp; <input type="text" name="email"></p>
                    <p><input type="submit" value="Sign Up"/></p>
                    <input type="hidden" name="action" value="create">
                </form>
            </div>
        ';
    }


    // Show form for adding a record
    function edit_subscriber_view($record) {
        $id    = $record['id'];
        $name  = $record['name'];
        $email = $record['email'];
        return '
            <div class="card">
                <h3>Edit Subscriber</h3>
                <form action="index.php" method="post">
                    <p><label>Name:</label> &nbsp; <input type="text" name="name" value="' . $name . '"></p>
                    <p><label>Email:</label> &nbsp; <input type="text" name="email" value="' . $email . '"></p>
                    <p><input type="submit" value="Save Record"/></p>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="' . $id . '">
                </form>
            </div>
        ';
    }


    /* ---------------------------
         C O N T R O L L E R
     --------------------------- */

    // Handle all action verbs
    function handle_actions() {
        $id = filter_input(INPUT_GET, 'id');
        global $subscribers;
        global $log;
        global $db;

        // POST
        $action = filter_input(INPUT_POST, 'action');
        if ($action == 'create') {    
            log_event('Subscriber CREATE');                     // CREATE
            add_subscriber($db);
        }
        if ($action == 'update') {
            log_event('Subscriber UPDATE');                     // UPDATE
            update_subscriber($db);
        }

        // GET
        $action = filter_input(INPUT_GET, 'action');
        if (empty($action)) {                                  
            log_event('Subscriber READ');                       // READ
            $list = query_subscribers($db);
            return subscriber_list_view($list);
        }
        if ($action == 'delete') {
            log_event('Subscriber DELETE');                     // DELETE
            return delete_subscriber($db);
        }
        if ($action == 'add') {              
            log_event('Subscriber Add View');                   // Add View
            return add_subscriber_view();
        }
        if ($action == 'edit' and ! empty($id)) {
            log_event('Subscriber Edit View');                  // Edit View
            $record = get_subscriber($db, $id);
            return edit_subscriber_view($record);
        }
    }
       

 
?>
