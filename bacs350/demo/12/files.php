<?php

    // Show the directories in "bacs350"
    $path = '../..';
    

    // Get the directories in the "bacs350"
    $dirs = array();


    // Get directory list
    $items = scandir($path);
    foreach ($items as $item) {
         $item_path = $path . DIRECTORY_SEPARATOR . $item;
         if (is_file($item_path)) {
             $files[] = $item;
         }
    }

    // Create a list
    $list = '<ul>';
    foreach($files as $i) {
        $list .= "<li>$i</li>";
    }
    $list .= '</ul>';
    
    
    // Create some text
    $text = '<h2>Directories in bacs350/demo</h2>
        <p>This demo shows how to list all of the demos.</p>
        <p>Directory Path = ' . $path;


    // Put the text and the directory list out
    echo $text . $list;

?>
