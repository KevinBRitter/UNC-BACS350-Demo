<?php

    // Show the directories in "bacs350/demo"
    $path = '../..';
    

    // Get directory list
    $items = scandir($path);

    

    // ------------------------------------------
    // DIRECTORIES
    $dirs = array();

    // Find all the Directories
    foreach ($items as $item) {
         $item_path = $path . DIRECTORY_SEPARATOR . $item;
         if (is_dir($item_path)) {
             $dirs[] = $item;
         }
    }


    // Create a list
    $dlist = '<h3>DIRECTORIES</h3><ul>';
    foreach($dirs as $i) {
        $dlist .= "<li>$i</li>";
    }
    $dlist .= '</ul>';
    
    // ------------------------------------------
    // FILES
    $files = array();


    // Find all the Directories
    foreach ($items as $item) {
         $item_path = $path . DIRECTORY_SEPARATOR . $item;
         if (is_file($item_path)) {
             $files[] = $item;
         }
    }


    // Create a list
    $flist = '<h3>FILES</h3><ul>';
    foreach($files as $i) {
        $flist .= "<li>$i</li>";
    }
    $flist .= '</ul>';


    // Create some text
    $text = '<h2>Directories in bacs350</h2>
        <p>This demo shows how to list directories only.</p>
        <p>Directory Path = ' . $path;


    // Put the text and the directory list out
    echo $text . $dlist . $flist;

?>
