php version - 8.2.12
Web site made by me in PHP.
I follow MVC architectural pattern in that project.
Single table - accounts. Use the web page to manage the table to perform CRUD operations.


![Alt text](./screen.png?raw=true "Page")


4 php files
index.php - router
Controller.php - controller
View.php - template view
Model.php - model


2 other files
zimlab.sql - mysqldump
style.php - css style for View.php

-> index.php <--> Controller.php <--> Model.php <--> Mysql database
|                       |
'-------- View.php <----'







db - zimlab

CREATE TABLE account(id INT PRIMARY KEY AUTO_INCREMENT, first_name VARCHAR(60) NOT NULL, last_name VARCHAR(60) NOT NULL, email VARCHAR(100) NOT NULL, company_name VARCHAR(70), position VARCHAR(100), phone1 INT, phone2 INT, phone3 INT, CONSTRAINT unq UNIQUE (id, email));

CREATE TABLE account (
	id INT PRIMARY KEY AUTO_INCREMENT,
	first_name VARCHAR(60) NOT NULL,
	last_name VARCHAR(60) NOT NULL,
	email VARCHAR(100) NOT NULL,
	company_name VARCHAR(70),
	position VARCHAR(100),
	phone1 BIGINT,
	phone2 BIGINT,
	phone3 BIGINT,
	CONSTRAINT unq UNIQUE (id, email)
);


