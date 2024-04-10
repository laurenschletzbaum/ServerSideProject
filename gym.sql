DROP DATABASE IF EXISTS gym;
CREATE DATABASE gym;
USE gym;

-- create user table
CREATE TABLE users(
CustomerID INT NOT NULL AUTO_INCREMENT,
FirstName VARCHAR(30) NULL,
LastName VARCHAR(30),
date DATE,
PRIMARY KEY(CustomerID)
);

-- create table lifts
CREATE TABLE lifts 
(BackSquat INT,
BenchPress INT,
CleanAndJerk INT,
Deadlift INT,
FrontSquat INT,
HangClean INT,
HangPowerSnatch INT,
PauseBackSquat INT,
PowerClean INT,
PowerSnatch INT,
PushJerk INT,
SquatClean INT,
SquatSnatch INT,
Thruster INT
);

-- create tables for each movement
CREATE TABLE BackSquat
(
    Weight INT,
    date DATE
);

CREATE TABLE BenchPress
(
    Weight INT,
    date DATE
);

CREATE TABLE CleanAndJerk
(
    Weight INT,
    date DATE
);

CREATE TABLE Deadlift
(
    Weight INT,
    date DATE
);

CREATE TABLE FrontSquat
(
    Weight INT,
    date DATE
);

CREATE TABLE HangClean
(
    Weight INT,
    date DATE
);

CREATE TEBALE HangPowerSnatch
(
    Weight INT,
    date DATE
);

CREATE TABLE PauseBackSquat
(
    Weight INT,
    date DATE
);


CREATE TABLE PowerClean
(
    Weight INT,
    date DATE
);


CREATE TABLE PowerSnatch
(
    Weight INT,
    date DATE
);

CREATE TABLE PushJerk
(
    Weight INT,
    date DATE
);


CREATE TABLE SquatClean
(
    Weight INT,
    date DATE
);


CREATE TABLE SquatSnatch
(
    Weight INT,
    date DATE
);


CREATE TABLE Thruster
(
    Weight INT,
    date DATE
);




