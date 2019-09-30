<?php

    // Get the parameter off the URL
    // URL = http://localhost/bacs350/planner/doc.php?doc=ToDo.md
    // Eg. Doc = ToDo.md
    $doc = $_GET['doc'];


    // Use the views code
    require_once 'views.php';


    // Read Markdown Text from file
    $text = render_markdown($doc);


    // Display the HTML in the page
    echo $text;

?>
