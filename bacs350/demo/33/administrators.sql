-- Admin Table SQL

CREATE TABLE administrators (
    
    id          INT             NOT NULL  AUTO_INCREMENT,
    email       VARCHAR(255)    NOT NULL,    
    password    VARCHAR(255)    NOT NULL,
    firstName   VARCHAR(60),
    lastName    VARCHAR(60),
    PRIMARY KEY (id)
    
);

