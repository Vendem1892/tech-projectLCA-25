/*Create Database and Tables*/ 

CREATE DATABASE IF NOT EXISTS saltradcircdb;

USE saltradcircdb;

CREATE TABLE accounts(
accID VARCHAR(30) NOT NULL,
accfName VARCHAR(30) NOT NULL,
acclName VARCHAR(40) NOT NULL,
email VARCHAR(50) NOT NULL,
pwd VARCHAR(20) NOT NULL,
dob DATE NOT NULL,
sellerID VARCHAR(30),
PRIMARY KEY (accID)
);

CREATE TABLE sellers(
    sellerID VARCHAR(30) NOT NULL,
    itemsSold INT,
    accID VARCHAR(30) NOT NULL,
    PRIMARY KEY (sellerID)
);

CREATE TABLE items(
    itemID VARCHAR(40) NOT NULL,
    itemName TEXT NOT NULL,
    itemPrice DOUBLE NOT NULL,
    itemCategory VARCHAR(20) NOT NULL,
    quantity INT NOT NULL,
    img1_fName VARCHAR(100) NOT NULL,
    img1_altText VARCHAR(60),    
    itemDescription MEDIUMTEXT,    
	itemDate DATE,
    itemStatus BOOLEAN NOT NULL,
    sellerID VARCHAR(30) NOT NULL,
    PRIMARY KEY (itemID)
);

CREATE TABLE item_images(
    itemID VARCHAR(40) NOT NULL,
    img1_fName VARCHAR(100) NOT NULL,
    img1_altText VARCHAR(60),    
    img2_fName VARCHAR(100),
    img2_altText VARCHAR(60),
    img3_fName VARCHAR(100),
    img3_altText VARCHAR(60)
);

CREATE TABLE orders(
    ordersID VARCHAR(30) NOT NULL,
    orderDate DATE NOT NULL,
    accID VARCHAR(30) NOT NULL,
    itemID VARCHAR(40) NOT NULL
);

CREATE TABLE shoppingcart(
    itemID VARCHAR(40) NOT NULL,
	accID VARCHAR(30) NOT NULL
);

ALTER TABLE
    accounts ADD FOREIGN KEY(sellerID) REFERENCES sellers(sellerID);
ALTER TABLE
    sellers ADD FOREIGN KEY(accID) REFERENCES accounts(accID);    
ALTER TABLE
    items ADD FOREIGN KEY(sellerID) REFERENCES sellers(sellerID);
ALTER TABLE
    item_images ADD FOREIGN KEY(itemID) REFERENCES items(itemID);
ALTER TABLE
    orders ADD FOREIGN KEY(accID) REFERENCES accounts(accID),
    ADD FOREIGN KEY(itemID) REFERENCES items(itemID);
ALTER TABLE
    shoppingcart ADD FOREIGN KEY(itemID) REFERENCES items(itemID),
	ADD FOREIGN KEY(accID) REFERENCES accounts(accID);

/*Insert into Database (for Website)*/

INSERT INTO accounts(accID, accfName, acclName, email, pwd, dob)
VALUES($accID,$accfName,$acclName, $email,$pwd,$dob);


INSERT INTO items(itemID, itemName, itemPrice, itemCategory, quantity, itemDescription, itemDate,itemStatus, sellerID)
VALUES($itemID, $itemName, $itemPrice, $itemCats, $quans, $itemDes, $itemDate, $itemStatus, $sellID);


INSERT INTO sellers(sellerID,itemsSold,accID)
VALUES($sellID,0,$accID);

UPDATE accounts SET sellerID = $sellID WHERE accID = $accID
VALUES($sellID);

INSERT INTO shoppingcart(itemID,accID)
VALUES($itemID,$accID);



