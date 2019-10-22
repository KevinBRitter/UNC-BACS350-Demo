<?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    // Log this page hit
    require_once 'log.php';
    clear_log($log, "demo/23/clear.php page loaded");

    // Redirect to index
    header('Location: index.php');
?>
