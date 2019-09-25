<?php

    // Show the directories in "bacs350/demo"
    $path = '../..';
    
    // Get directory list
    $items = scandir($path);


    // Create an HTML list
    $list = '<ul>';
    foreach($items as $i) {
        $list .= "<li>$i</li>";
    }
    $list .= '</ul>';
    
    
    // Create some text
    $text = '<h2>Contents of /bacs350 Directory</h2>
        <p>This demo shows how to list a directory.</p>
        <p>Directory Path = ' . $path;


    // Put the text and the directory list out
    echo $text . $list;

?>
