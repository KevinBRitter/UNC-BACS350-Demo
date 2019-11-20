<?php

    // Setup a page title variable
    $page_title = "Form View (to Post Data)";

    // Include the page start
    include 'header.php';
?>

    <h2>UI for form input using GET</h2>

    <form action="form_get_b.php" method="get">
        <label>What is your name?</label>
        <input type="text" name="my_name">
        <input type="submit" value="Save"/>
    </form>

<?php
    // Include the page end
    include 'footer.php';
?>
