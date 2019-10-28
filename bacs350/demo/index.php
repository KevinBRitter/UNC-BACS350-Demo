<?php

    /*
        Create page content by rendering a template.
    */

    $site_title = 'UNC BACS 350';
    
    $page_title = "Mark's Demos";
    
    $content = '
        <p>
            <a href="..">Home</a>
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
        
        <ul>
            <li>
                <a href="01">Demo #1 - PHP App Hosting</a>
            </li>
            <li>
                <a href="02">Demo #2 - Includes</a>
            </li>
            <li>
                <a href="03">Demo #3 - Header/Footer</a>
            </li>
            <li>
                <a href="04">Demo #4 - Page Template</a>
            </li>
            <li>
                <a href="05">Demo #5 - Render Page</a>
            </li>
            <li>
                <a href="06">Demo #6 - Setup Apache, MySQL, PHP</a>
            </li>
            <li>
                <a href="07">Demo #7 - Card View</a>
            </li>
            <li>
                <a href="08">Demo #8 - Reusable Page Template</a>
            </li>
            <li>
                <a href="09">Demo #9 - Display PHP Source Code</a>
            </li>
            <li>
                <a href="10">Demo #10 - Markdown</a>
            </li>
            <li>
                <a href="11">Demo #11 - Document Viewer</a>
            </li>
            <li>
                <a href="12">Demo #12 - Document Listing</a>
            </li>
            <li>
                <a href="13">Demo #13 - Document Selector</a>
            </li>
            <li>
                <a href="14">Demo #14 - Document Browser</a>
            </li>
            <li>
                <a href="15">Demo #15 - Database</a>
            </li>
            <li>
                <a href="16">Demo #16 - Database connect from PHP</a>
            </li>
            <li>
                <a href="17">Demo #17 - List Database Records</a>
            </li>
            <li>
                <a href="18">Demo #18 - Database CRUD</a>
            </li>
            <li>
                <a href="19">Demo #19 - CRUD Functions</a>
            </li>
            <li>
                <a href="20">Demo #20 - CRUD Views</a>
            </li>
            <li>
                <a href="21">Demo #21 - Add Views</a>
            </li>
            <li>
                <a href="22">Demo #22 - Edit Views</a>
            </li>
            <li>
                <a href="23">Demo #23 - Page Logging</a>
            </li>
            <li>
                <a href="24">Demo #24 - Review App</a>
            </li>
            <li>
                <a href="25">Demo #25 - Avoid Page Caching</a>
            </li>
            <li>
                <a href="26">Demo #26 - Page Template HTML</a>
            </li>
            <li>
                <a href="27">Demo #27 - Component Templates</a>
            </li>
            <li>
                <a href="28">Demo #28 - MVC Pattern</a>
            </li>
        </ul>
    ';

    include '../views.php';
    
    echo render_page($site_title, $page_title, $content);

?>
