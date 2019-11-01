<?php

    // Code to define functions
    require_once 'views.php';
    require_once 'superhero_views.php';
    require_once 'superhero_db.php';


    // List superhero records
    $list = render_superheroes(list_superheroes ($db));

    
    // Button to go to other views
    $add_button = '<p><a class="button" href="insert.php">Add Hero</a></p>';

    
    $intro = '
        <p>
            This database shows a list of my favorite superheroes.  
        </p>
        <p>
            The source code is available at <a href="https://github.com/Mark-Seaman/UNC-BACS350-Demo/tree/master/bacs350/superhero">Superhero Database</a>
        </p>
    ';
    $content = "$intro $add_button $list";

    // Show the page
    echo render_page('UNC BACS 350', "Seaman's Superhero Gallery", $content);
?>
