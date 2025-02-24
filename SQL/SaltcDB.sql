CREATE DATABASE IF NOT EXISTS saltradcircdb;

USE saltradcircdb;

CREATE TABLE accounts IF NOT EXISTS(
accID INT NOT NULL AUTO_INCREMENT,
accfName VARCHAR(30) NOT NULL,
acclName VARCHAR(40) NOT NULL,
accName VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
pwd VARCHAR(20) NOT NULL,
dob DATE NOT NULL,
sellerID VARCHAR(40),
PRIMARY KEY (accID),
FOREIGN KEY (sellerID) REFERENCES sellers(sellerID);
);

CREATE TABLE sellers IF NOT EXISTS(
    sellerID INT NOT NULL AUTO_INCREMENT,
    itemsSold INT,
    PRIMARY KEY (sellerID)
);

CREATE TABLE items IF NOT EXISTS(
    itemID INT NOT NULL AUTO_INCREMENT,
    itemName VARCHAR(40) NOT NULL,
    itemPrice DOUBLE NOT NULL,
    itemCategory VARCHAR(20) NOT NULL,
    quantity INT NOT NULL,
    itemDescription MEDIUMTEXT,
    itemStatus VARCHAR(10) NOT NULL
    sellerID INT NOT NULL,
    PRIMARY KEY (itemID),
    FOREIGN KEY (sellerID) REFERENCES sellers(sellerID)
);

CREATE TABLE orders IF NOT EXISTS(
    ordersID INT NOT NULL AUTO_INCREMENT,
    orderDate DATE NOT NULL,
    accID INT NOT NULL,
    itemID INT NOT NULL,
    FOREIGN KEY (accID) REFERENCES accounts(accID),
    FOREIGN KEY (itemID) REFERENCES items(itemID)
);

CREATE TABLE shoppingcart IF NOT EXISTS(
    itemID INT NOT NULL,
    cartPrice DOUBLE,   
    FOREIGN KEY (itemID) REFERENCES items(itemID)
);