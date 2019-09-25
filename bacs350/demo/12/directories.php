<?php

    // Show the directories in "bacs350/demo"
    $path = '..';
    

    // Get the directories in the "bacs350/demo"
    $dirs = array();


    // Get directory list
    $items = scandir($path);


    // Find all the Directories
    foreach ($items as $item) {
         $item_path = $path . DIRECTORY_SEPARATOR . $item;
         if (is_dir($item_path)) {
             $dirs[] = $item;
         }
    }


    // Create a list
    $list = '<ul>';
    foreach($dirs as $i) {
        $list .= "<li>$i</li>";
    }
    $list .= '</ul>';
    
    
    // Create some text
    $text = '<h2>Directories in bacs350</h2>
        <p>This demo shows how to list directories only.</p>
        <p>Directory Path = ' . $path;


    // Put the text and the directory list out
    echo $text . $list;

?>
