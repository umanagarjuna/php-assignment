DROP DATABASE IF EXISTS food_db2;

CREATE DATABASE food_db2;

USE food_db2;
 
CREATE TABLE users (
  userID           INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(255)   NOT NULL,
  firstName         VARCHAR(255)   NOT NULL,
  lastName          VARCHAR(255)   NOT NULL,
  isAdmin           TINYINT(1)     NOT NULL   DEFAULT 0,             
  PRIMARY KEY (userID)
);

CREATE TABLE categories (
  categoryID       INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categoryID)
);


CREATE TABLE foods (
  foodID           INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryID      INT(11)        NOT NULL,
  uniqid             VARCHAR(20)    NOT NULL   UNIQUE,
  foodTitle         VARCHAR(255)   NOT NULL,
  foodPrice        DECIMAL(10,2)  NOT NULL,
  PRIMARY KEY (foodID)
);


INSERT INTO categories VALUES
(1, 'Breakfast'),
(2, 'Lunch'),
(3, 'Dinner');


INSERT INTO foods VALUES
(1, 1, '1010101010', 'IDLY', '69.00'),
(2, 2, '1010101011', 'Thali', '59.00'),
(3, 3, '1010101102', 'Potato Curry', '25.17'),
(5, 1, '1010101103', 'Dosa', '79.99'),
(6, 2, '1010101104', 'South Indian Thali', '49.99'),
(7, 3, '1010101105', 'Roti curry', '29.99'),
(8, 1, '1010101106', 'Puri', '59.99');

INSERT INTO users (userID, emailAddress, password, firstName, lastName, isAdmin) VALUES
(1, 'admin@yahoo.com', 'abc', 'admin', 'admin', 1),
(2, 'peter@yahoo.com', 'abc', 'Peter', 'Lee', 0);

GRANT SELECT, INSERT, DELETE, UPDATE
ON food_db2.*
TO admin@localhost
IDENTIFIED BY 'pass@word';


GRANT SELECT
ON foods
TO peter@localhost
IDENTIFIED BY 'pass@word';
