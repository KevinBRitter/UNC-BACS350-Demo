<?php

    // Bring in key functions
    require 'views.php';
    require 'files.php';


    // Show the files in "bacs350/demo/14/docs"
    $path = 'docs';
    

    // Get the files in the "bacs350/docman/docs" and create HTML list
    $files = get_file_list($path);


    // Convert the array into an HTML list of links
    $file_list = render_links($files);

    
    // Display the HTML in the page
    $title = '<h1>Document List</h1>';
    echo $title . $file_list;

?>
