<?php
    $name = filter_input(INPUT_GET, 'my_name');

    // Setup a page title variable
    $page_title = "View to Accept Data";

    // Include the page start
    include 'header.php';

    // Show the name in a heading
    echo '<h2>My Name is ' . $name . '</h2>'

    // Include the page end
    include 'footer.php';
?>
