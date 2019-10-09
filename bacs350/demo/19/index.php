<?php

/*
    PHP Code for more efficient CRUD
*/


    // Include view rendering code
    require 'views.php';


    // Include all of the database code
    require 'subscribers.php';


    // Add explanation
    $intro = '<h1>Demo 19</h1>
        <p>
            This demo shows how to interact with a MySQL database at Bluehost. It builds on top of Demo 18,
            which showed the details of CRUD operations.
        </p>
        <p>
            This demo shows how to use code within another PHP file. The file, subscribers.php, contains the
            database code to connect and do the CRUD operations. Customize this code for your database.
        </p>';



    // Add one database record
    $name = 'Bogus Test user';
    $email = 'bogus_user@gmail.com';
    $subscribers = add_subscriber($db, $name, $email);
   

    // List subscriber records
    $content = render_subscribers(list_subscribers ($db));
    
    
    // Delete record to clean up bogus user
    delete_subscriber($db, $email);


    // Display the HTML in the page
    echo render_page('UNC BACS 350', "Demo 19 - Subscriber List", $intro . $content);

?>
