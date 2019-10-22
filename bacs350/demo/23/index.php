<?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    // Log this page hit
    require_once 'log.php';
    add_log($log, "demo/23/index.php page loaded");
?>

<h1>Demo 23 - Page Logging Demo</h1>
<p>
    <a href="index.php">Refresh Index Page</a>
</p>
<p>
    <a href="log-history.php">Show Log History</a>
</p>
<p>
    <a href="clear.php">Clear Log History</a>
</p>
