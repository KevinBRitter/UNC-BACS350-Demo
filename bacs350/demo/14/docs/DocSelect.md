# Document Selector Demo

This code shows how to select a document from a library of documents.  
The selected is displayed by convert markdown files into HTML.


    // Use the views code
    require_once 'views.php';


    // Read Markdown Text from file
    $text = render_markdown($doc);


    // Display the HTML in the page
    echo $text;
    
