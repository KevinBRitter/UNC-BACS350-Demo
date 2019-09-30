<?php

    /*
        Create page content by rendering a template.
    */

    $site_title = 'UNC BACS 350';
    
    $page_title = "Design Patterns";
    
    $content = '
    
        <p>
            <a href="..">Home</a>
        </p>
        <p> 
            Design patterns learned in BACS 350.
        </p>
        
        <ul>
            <li>
                <a href="include">Include Pattern</a>
            </li>
            <li>
                <a href="header">Header/Footer Pattern</a>
            </li>
            <li>
                <a href="page_template">Page Template Pattern</a>
            </li>
            <li>
                <a href="render_page">Render Page Pattern</a>
            </li>
            <li>
                <a href="redirect">Redirect Page Pattern</a>
            </li>
            <li>
                <a href="phpinfo">Display PHP Info</a>
            </li>
            <li>
                <a href="card_view">Card View Pattern</a>
            </li>
             <li>
                <a href="doclinks">Doc Links Pattern</a>
            </li>
        </ul>
    ';

    include '../views.php';
    
    echo render_page($site_title, $page_title, $content);

?>
