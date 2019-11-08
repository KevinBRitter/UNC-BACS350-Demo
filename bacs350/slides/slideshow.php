<?php

    // Get libraries
    require_once 'log.php';
    require_once 'slides.php';
    require_once 'views.php';


    // Log the page load
    log_page();


    // Prep the slide show
    $slides_id = filter_input(INPUT_GET, 'id');
    $slides = get_slides($slides_id);
    $slide_content = $slides['body'];
    $slide_title = $slides['title'];
//    $slide_content = file_get_contents("slides.md");
    $slides = array('title' => $slide_title, 'slideshow' => $slide_content);


    // Display the presentation
    echo render_template('reveal.html', $slides);

?>
