# Slide Show SQL code

## Database table

    CREATE TABLE slides (
        id          int(3) NOT NULL AUTO_INCREMENT,
        title       varchar(100) NOT NULL,
        body        text         NOT NULL,
        PRIMARY KEY (id)
    );


## Connection Settings  - PHP Variables 

    $dbname = 'uncobacs_350';
    $username = 'uncobacs_350';
    $password = 'BACS_350';
    $port = '3306';
    $host = "localhost:$port";


## CREATE

    INSERT INTO slides (title, body) 
    VALUES (:title, :body);


## READ

    SELECT * FROM slides;

    SELECT * FROM slides WHERE id = :id; 

    foreach (slides as row) {
        row['id']
        row['title']
        row['body']
    }


## UPDATE

    SELECT * FROM slides WHERE id = :id;

    UPDATE slides 
    SET title=:title, body=:body
    WHERE id = :id;


## DELETE

    DELETE from slides WHERE id = :id;

