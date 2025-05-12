/*Create Database and Tables*/ 

CREATE DATABASE IF NOT EXISTS saltradcircdb;

USE saltradcircdb;

CREATE TABLE accounts(
accID VARCHAR(30) NOT NULL,
accfName VARCHAR(30) NOT NULL,
acclName VARCHAR(40) NOT NULL,
email VARCHAR(50) NOT NULL,
pwd VARCHAR(100) NOT NULL,
dob DATE NOT NULL,
sellerID VARCHAR(30),
PRIMARY KEY (accID)
);

CREATE TABLE sellers(
    sellerID VARCHAR(30) NOT NULL,
    itemsSold INT,
    accID VARCHAR(30) NOT NULL,
    accID VARCHAR(30) NOT NULL,
    PRIMARY KEY (sellerID)
);

CREATE TABLE sellRegIDs(        
    accID VARCHAR(30) NOT NULL,
    studID_img VARCHAR(255) NOT NULL,
    govID_img VARCHAR(255) NOT NULL,
    PRIMARY KEY (accID)
);

CREATE TABLE reports(
    repID INT NOT NULL AUTO_INCREMENT,
    itemID VARCHAR(40) NOT NULL,
    rep_reason MEDIUMTEXT NOT NULL,
    PRIMARY KEY (repID)
);

CREATE TABLE items(
    itemID VARCHAR(40) NOT NULL,
    itemName TEXT NOT NULL,
    itemPrice DOUBLE NOT NULL,
    itemCategory VARCHAR(20) NOT NULL,
    quantity INT NOT NULL,
    img1_fName VARCHAR(255) NOT NULL,    
    img1_altText VARCHAR(60),    
    itemDescription MEDIUMTEXT,    
	itemDate DATE,
    itemStatus BOOLEAN NOT NULL,
    sellerID VARCHAR(30) NOT NULL,
    PRIMARY KEY (itemID)
);

CREATE TABLE item_images(
    itemID VARCHAR(40) NOT NULL,
    img1_fName VARCHAR(255) NOT NULL,
    img1_altText VARCHAR(60) NOT NULL,    
    img2_fName VARCHAR(255),
    img1_fName VARCHAR(255) NOT NULL,
    img1_altText VARCHAR(60) NOT NULL,    
    img2_fName VARCHAR(255),
    img2_altText VARCHAR(60),
    img3_fName VARCHAR(255),
    img3_altText VARCHAR(60),
    PRIMARY KEY(itemID)
);

CREATE TABLE orders(
    orderID VARCHAR(30) NOT NULL,
    orderDate DATE NOT NULL,
    orderPrice DOUBLE NOT NULL,
    accID VARCHAR(30) NOT NULL,
    itemID VARCHAR(40) NOT NULL,
    PRIMARY KEY(ordersID)
);

CREATE TABLE shoppingcart(
    shopcartID INT AUTO_INCREMENT NOT NULL,
    itemID VARCHAR(40) NOT NULL,
	accID VARCHAR(30) NOT NULL
    PRIMARY KEY(shopcartID);
);

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_number` varchar(50) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_price` float(10,2) DEFAULT NULL,
  `item_price_currency` varchar(10) DEFAULT NULL,
  `payer_id` varchar(50) DEFAULT NULL,
  `payer_name` varchar(50) DEFAULT NULL,
  `payer_email` varchar(50) DEFAULT NULL,
  `payer_country` varchar(20) DEFAULT NULL,
  `merchant_id` varchar(255) DEFAULT NULL,
  `merchant_email` varchar(50) DEFAULT NULL,
  `order_id` varchar(50) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `paid_amount_currency` varchar(10) NOT NULL,
  `payment_source` varchar(50) DEFAULT NULL,
  `payment_status` varchar(25) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (id)
);

/*Addition of foreign keys and a unique column*/
ALTER TABLE
    accounts ADD FOREIGN KEY(sellerID) REFERENCES sellers(sellerID);
ALTER TABLE `accounts` ADD UNIQUE(`email`);
ALTER TABLE
    sellers ADD FOREIGN KEY(accID) REFERENCES accounts(accID);    
ALTER TABLE
    sellRegIDs ADD FOREIGN KEY(accID) REFERENCES accounts(accID);
ALTER TABLE
    reports ADD FOREIGN KEY(itemID) REFERENCES items(itemID);
ALTER TABLE 
`items` CHANGE `itemDate` `itemDate` DATETIME NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE 
orders CHANGE orderDate orderDate DATETIME NULL DEFAULT CURRENT_TIMESTAMP;
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



