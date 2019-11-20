<?php

    require_once 'views.php';


    // Include the main page content

    $path = filter_input(INPUT_GET, 'path');
    
    $text = '<h2>Directories in Solutions</h2>
        <p>This demo show how to list all of the projects.</p>
        <p>Directory Path = ' . $path;


    // Define directory listing
    include 'files.php';

    // Get the files in the current directory
    $dirs = get_dir_list($path);

    $content = render_links($dirs);

     
    $settings = array(
        "site_title" => "BACS 350 Templates",
        "page_title" => "Directory List", 
        "style"      => 'style.css',
        "content"    => $text . $content);

    echo render_page($settings);

?>
