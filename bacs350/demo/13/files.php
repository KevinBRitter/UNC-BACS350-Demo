<?php

    // get_file_list
    function get_file_list($path) {
        $files = array();
        if (!is_dir($path)) { return $files; }

        $items = scandir($path);
        foreach ($items as $item) {
             $item_path = $path . DIRECTORY_SEPARATOR . $item;
             if (is_file($item_path)) {
                 $files[] = $item_path;
             }
        }
        return $files;
    }


    // get_dir_list
    function get_dir_list($path) {
        $files = array();
        if (!is_dir($path)) { return $files; }

        $items = scandir($path);
        foreach ($items as $item) {
             $item_path = $path . DIRECTORY_SEPARATOR . $item;
             if (is_dir($item_path)) {
                 $files[] = $item_path;
             }
        }
        return $files;
    }

?>
