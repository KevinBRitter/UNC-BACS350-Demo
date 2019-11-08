<?php

    // render_button -- Show a styled button
    function render_button($text, $url) {
        return "<a class=\"button\" href=\"$url\">$text</a>";
    }


    // render_page -- Create one HTML page from a template.
    function render_page($settings) {
        header("Pragma: no-cache");
        header("Expires: 0");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        return render_template("page.html", $settings);
    }


    // render_template -- Convert template file using the settings
    function render_template($template, $settings) {
        $text = file_get_contents("templates/" . $template);
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
