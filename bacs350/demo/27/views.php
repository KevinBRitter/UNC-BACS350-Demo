<?php

    // render_button -- Show a styled button
    function render_button($text, $url) {
        return '<button class="btn">' . render_link($text, $url) . '</button>';
    }


    // render_card -- create HTML for visual card
    function render_card($title, $body) {
        $settings = array('title' => $title, 'body' => $body);
        return render_template('templates/card.html', $settings);
    }  


    // render_skills -- show the skills template
    function render_skills($title, $body) {
        return render_template('templates/skills.html', array());
    }  

    // render_projects -- show the projects template
    function render_projects($title, $body) {
        return render_template('templates/projects.html', array());
    }  


    // render_link -- Create a hyperlink in HTML
    function render_link($text, $url) {
        return "<a href=\"$url\">$text</a>";
    }

    
    // render_page -- Create one HTML page from a template.
    function render_page($settings) {
        header("Pragma: no-cache");
        header("Expires: 0");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        return render_template("templates/page.html", $settings);
    }


    // render_template -- Convert template file using the settings
    function render_template($template, $settings) {
        $text = file_get_contents($template); 
        $text = transform_text($text, $settings);
        return $text;
    }

   
    // transform_text -- Convert each setting in a block of text
    function transform_text ($text, $settings) {
        foreach ($settings as $key => $value) {
            $text = str_replace("{{ $key }}",  $value,  $text);
        }
        return $text;
    }


?>
