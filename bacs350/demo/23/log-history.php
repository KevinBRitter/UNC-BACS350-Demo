<?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    // Connect to the database
    require_once 'log.php';

    add_log($log, "log-history.php page loaded");

    echo render_log($log);

?>
<p>
    <a href="index.php">Refresh Index Page</a>
</p>
