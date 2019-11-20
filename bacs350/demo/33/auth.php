<?php
 
/*
    API for Authentication
    
    usage: 
        require_once 'auth.php';    // Setup auth code
        user_info();                // Show the login info
        handle_auth_actions();      // Run the Auth Controller 
        
        Actions:
        
        GET - signup, login, logout
        POST - register, validate
        
*/

    require_once 'log.php';
    require_once 'db.php';
    session_start ();

    /* ---------------------------
             M O D E L
     --------------------------- */

    // Check to see that the password in OK
    function is_valid_login ($email, $password) {
        $query = 'SELECT password FROM administrators WHERE email=:email';
        global $db;
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $hash = $row['password'];
        log_event("User login check: $email, $hash");
        return password_verify($password, $hash);
    }


    // Set the password into the administrator table
    function register_user() {
        // Read form values
        $email    = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $first    = filter_input(INPUT_POST, 'first');
        $last     = filter_input(INPUT_POST, 'last');
        
        log_event("$email, $first, $last");
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        $query = 'INSERT INTO administrators (email, password, firstName, lastName) 
            VALUES (:email, :password, :first, :last);';
        
        global $db;
        $statement = $db->prepare($query);
        
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $hash);
        $statement->bindValue(':first', $first);
        $statement->bindValue(':last', $last);
        
        $statement->execute();
        $statement->closeCursor();
    }


    /* ---------------------------
                V I E W
     --------------------------- */

    // Show the login
    function login_form($page) {
        log_event("Show Login Form");
        $settings = array('next' => $page);
        return render_template('login.html', $settings);
    }


     // Show the sign up
    function sign_up_form($page) {
        log_event("Show Sign Up Form");
        $settings = array('next' => $page);
        return render_template('sign_up.html', $settings);
    }


    // Show the logged in user
    function user_info() {
        if (logged_in ()) {
            return render_button("Logged in as $_SESSION[USER]", 'private.php?action=logout');
        }
        else {
            return render_button('Login', 'private.php?action=login');
        }
    }

    
    // Test if password is valid or not
    function validate () {
        $email    = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        log_event("Validate: $email, $password");
        if (is_valid_login ($email, $password)) {
            $_SESSION['USER'] = $email;
        }
    }


    /* ---------------------------
         C O N T R O L L E R
     --------------------------- */

   // Do a login if needed
    function require_login ($page){
        if (! logged_in ()) {
            header("Location: $page?action=login");
        }
    }


    // Check to see if user is already authenticated
    function logged_in () {
        log_event("logged_in: isset=" . isset($_SESSION['USER']));
        if (isset($_SESSION['USER'])) {
            log_event("logged_in: logged_in=" . $_SESSION['USER']);
        }
        return (isset($_SESSION['USER']) and ! empty($_SESSION['USER'])) ;
    }


    // Cancel the login
    function logout ($page) {
        unset($_SESSION['USER']);
        header("Location: $page");
    }


    // Controller for user authentication
    function handle_auth_actions() {   
        
        // POST
        $action = filter_input(INPUT_POST, 'action');
        if ($action == 'register') {
            return register_user();
        }
        if ($action == 'validate') {
            return validate();
        }

        // GET
        $action = filter_input(INPUT_GET, 'action');
        $page = $_SERVER['PHP_SELF'];
        
        if ($action == 'signup') {
            return sign_up_form($page);
        }
        if ($action == 'login') {
            return login_form($page);
        }
        if ($action == 'logout') {
            return logout($page . '?action=login');
        }
    }
  
?>
