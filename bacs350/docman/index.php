<?php

    // Bring in key functions
    require 'views.php';
    require 'files.php';


    // ------------------------------------------
    // FILES

    // Show the directories in "bacs350/docman/docs"
    $path = 'docs';
    

    // Get the files in the "bacs350/docman/docs" and create HTML list
    $files = get_file_list($path);
    $file_list = render_links($files);
   

    // ------------------------------------------
    // PAGE

    // Page Intro
    $text = render_markdown('Docs.md');
    

    // Card with docs
    $title = 'Document List';
    $body = $file_list;
    $card = render_card($title, $body);


    // Display the HTML in the page
    echo render_page('Seaman Notes', "Document Manager", $card);

?>
