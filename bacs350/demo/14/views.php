<?php
    
    // render_links -- Create a bullet list of hyperlinks in HTML
    function render_links($list) {
        $s = '<ul>';
        foreach($list as $text) {
            $url = 'doc.php?doc=' . $text;
            $s .= "<li>" . render_link($text, $url) . "</li>";
        }
        $s .= '</ul>';
        return $s;
    }


    // render_link -- Create a hyperlink in HTML
    function render_link($text, $url) {
        return "<a href=\"$url\">$text</a>";
    }


    // render_markdown -- Read Markdown Text from file and convert into HTML
    function render_markdown($file) {
        $text = file_get_contents($file);
        require_once 'Parsedown.php';
        $converter = new Parsedown();
        return $converter->text($text);
    }

?>
