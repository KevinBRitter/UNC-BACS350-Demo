<?php

    // render_list -- Create a bullet list in HTML
    function render_list($list) {
        $s = '<ul>';
        foreach($list as $i) {
            $s .= "<li>$i</li>";
        }
        $s .= '</ul>';
        return $s;
    }

    
    // render_links -- Create a bullet list of hyperlinks in HTML
    function render_links($list) {
        $s = '<ul>';
        foreach($list as $text) {
            $s .= "<li>" . render_link($text, $text) . "</li>";
        }
        $s .= '</ul>';
        return $s;
    }


    // render_link -- Create a hyperlink in HTML
    function render_link($text, $url) {
        return "<a href=\"$url\">$text</a>";
    }


?>
