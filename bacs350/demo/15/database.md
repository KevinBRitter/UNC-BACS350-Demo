# Database SQL


### Create Database Table - subscribers (name, email)

Create a table

Execute SQL in phpMyAdmin view SQL tab

```
CREATE TABLE subscribers (
  id int(3) NOT NULL AUTO_INCREMENT,
  name varchar(100)  NOT NULL,
  email varchar(100) NOT NULL,
  PRIMARY KEY (id)
);
```


### INSERT

Add one record

Execute SQL in phpMyAdmin view SQL tab

```
INSERT INTO subscribers (name, email)
VALUES
('George Washington', 'geowash@us.gov'),
('Abe Lincoln', 'abe@us.gov'),
('Andrew Jackson', 'andyjax@us.gov'),
('Theodore Roosevelt', 'teddy@us.gov');
```


### SELECT

Show the table

Execute SQL in phpMyAdmin view SQL tab

```
SELECT * FROM subscribers;
```


### UPDATE

Modify one record

Execute SQL in phpMyAdmin view SQL tab

```
UPDATE subscribers
SET email='troose@us.gov'
WHERE id='4';

SELECT * FROM subscribers;
```


### DELETE

Delete one record

Execute SQL in phpMyAdmin view SQL tab

```
DELETE FROM subscribers WHERE id='3';
SELECT * FROM subscribers;
```

