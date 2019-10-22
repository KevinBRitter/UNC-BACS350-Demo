<?php

   
    // render_page -- build a page with custom settings
    function render_page($site_title, $page_title, $content) {
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        return '<!DOCTYPE html>
            <html lang="en">
                <head>

                    <meta charset="UTF-8">
                    <title>' . $page_title . '</title>

                    <link rel="icon" type="image/x-icon" href="/bacs350/favicon.ico">
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
                    <link rel="stylesheet" href="style.css">

                </head>
                <body>

                    <header>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h1>' . $site_title . '</h1>
                                    <h2>' . $page_title . '</h2>
                                </div>
                                <div class="logo col-sm-4">
                                    <div class="pull-right">
                                        <img class="img-rounded img-responsive"
                                        src="/bacs350/images/Bear.200.png"
                                        alt="UNC Bear" width="150px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>

                    <main>

                        ' . $content . '

                    </main>
                </body>
            </html>
        ';
    }


    // render_card -- build HTML text for a card
    function render_card($title, $body) {
        return '
            <div class="card card-wide">
                <div class="card-header">
                    ' . $title . '
                </div>
                <div class="card-body card-padding">

                    ' . $body . '

                </div>
            </div>
        ';
    }

?>
