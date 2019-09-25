<?php

    // Bring in key functions
    require 'views.php';
    require 'files.php';


    // Show the directories in "bacs350/demo"
    $path = '../..';
    
    
    // ------------------------------------------
    // DIRECTORIES

    // Get the directories in the "bacs350"
    $dirs = get_dir_list($path);

    //$dlist = '<h3>DIRECTORIES</h3>' . render_list($dirs);
    $dlist = '<h3>DIRECTORIES</h3>' . render_links($dirs);
    
    
    // ------------------------------------------
    // FILES

    // Get the files in the "bacs350"
    $files = get_file_list($path);

    //$flist = '<h3>FILES</h3>' . render_list($files);
    $flist = '<h3>FILES</h3>' . render_links($files);
   

    // ------------------------------------------
    // PAGE

    $text = '<h2>Directories in bacs350/demo</h2>
        <p>This demo shows how to list all of the demos.</p>
        <p>Directory Path = ' . $path;


    // Put the text and the directory list out
    echo $text . $flist . $dlist;

?>
