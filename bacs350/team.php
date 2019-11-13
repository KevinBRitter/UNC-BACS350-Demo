<?php

    /*
        Create page content by rendering a template.
    */

    $site_title = 'UNC BACS 350';
    
    $page_title = "Project Team";
    
    $content = '
        <h2>Project Team</h2>
        
        <table class="table table-hover">
            <th>Name</th>
            <th>Email</th>
            <th>Domain</th>
            <th>Github</th>
            <th>Issues</th>
            <tr>
                <td>Dyani Dussault</td>
                <td>dyani.dussault@unco.edu</td>
                <td><a href="http://dyanidussault.com/bacs350/">Domain</a></td>
                <td>Unknown</td>
                <td>Unknown</td>
            </tr>
            <tr>
                <td>Madison Spillman</td>
                <td>spil6540@bears.unco.edu</td>
                <td><a href="https://spillmandesigns.com/bacs350/">Domain</a></td>
                <td><a href="https://github.com/spillman66">Github</a></td>
                <td><a href="https://github.com/spillman66/issues">Issues</a></td>
            </tr>
            <tr>
                <td>Caleb Leonard</td>
                <td>lovehaiti339@gmail.com</td>
                <td><a href="https://findingfocusministries.com/bacs350/">Domain</a></td>
                <td><a href="https://github.com/leon1583/UNC-BACS350-2019-Fall">Github</a></td>
                <td><a href="https://github.com/leon1583/UNC-BACS350-2019-Fall/issues">Issues</a></td>
            </tr>
            <tr>
                <td>Mark Seaman</td>
                <td>mark.seaman@unco.edu</td>
                <td><a href="https://unco-bacs.org/bacs350/">Domain</a></td>
                <td><a href="https://github.com/Mark-Seaman/UNC-BACS350-Demo">Github</a></td>
                <td><a href="https://github.com/Mark-Seaman/UNC-BACS350-Demo/issues">Issues</a></td>
            </tr>
        </table>

    ';

    include 'views.php';
    
    echo render_page($site_title, $page_title, $content);

?>
