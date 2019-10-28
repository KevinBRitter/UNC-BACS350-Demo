<?php

    header("Pragma: no-cache");
    header("Expires: 0");
    header("Cache-Control: no-store, no-cache, must-revalidate");

    echo '
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Page Not Cached</title>
                <link rel="stylesheet" href="../../unc.css">
            </head>
            <body>
                <header>
                    <h1>Demo 25 - Avoid Caching</h1>
                </header>
                <main>
                    <h2>This page is not cached</h2>
                    <p>
                        Note the header statements at the beginning of the file.
                        This must be executed before any HTML output is produced.
                    </p>
                    
                </main>
            </body>
        </html>
    ';

?>
