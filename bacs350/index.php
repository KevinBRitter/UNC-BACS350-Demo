<?php

    /*
        Create page content by rendering a template.
    */

    $site_title = 'UNC BACS 350';
    
    $page_title = "The Seaman's Brain";
    
    $content = '
        <p>
            <a href="/">BACS 350 WordPress Blog</a>
        </p>
        <p> 
            This page is the beginning of an ongoing project in BACS 350.
        </p>
        <p> 
            It is a custom information manager.
        </p>
        <p> 
            Different rooms within this PHP app will contain different types of info.
        </p>
        <p>
            The source code is available at <a href="https://github.com/Mark-Seaman/UNC-BACS350-Demo/tree/master/bacs350">BACS 350 Source Code</a>.
        </p>
        
        <ul>
            <li>
                <a href="demo">Code Demos</a>
            </li>
            <li>
                <a href="pattern">Design Patterns</a>
            </li>
            <li>
                <a href="project">Projects</a>
            </li>
        </ul>
    ';

    include 'views.php';
    
    echo render_page($site_title, $page_title, $content);

?>
