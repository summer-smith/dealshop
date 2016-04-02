--CREATE TABLES
DROP TABLE IF EXISTS userInfo, store, weeklyDeal, item, shoppingList;

CREATE TABLE userInfo
(
    userID      INT         NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userName    VARCHAR(60) NOT NULL,
    firstName   VARCHAR(60),
    lastName    VARCHAR(60),
    password    VARCHAR(60),
    listName    VARCHAR(60),
    listID      INT         DEFAULT NULL
);

CREATE TABLE store
(
    storeID     INT         NOT NULL PRIMARY KEY AUTO_INCREMENT,
    storeName   VARCHAR(60) NOT NULL,
    dealID      INT         NOT NULL
);

CREATE TABLE weeklyDeal 
(
    dealID      INT         NOT NULL PRIMARY KEY AUTO_INCREMENT,
    item        VARCHAR(60) NOT NULL,
    price       FLOAT         NOT NULL,
    storeName   VARCHAR(60) NOT NULL,
    storeID     INT         NOT NULL
);

CREATE TABLE item
(
    itemID     INT         NOT NULL PRIMARY KEY AUTO_INCREMENT,
    itemName   VARCHAR(60) NOT NULL,
    brand      VARCHAR(60) DEFAULT NULL,
    price      FLOAT       NOT NULL,
    quantity   VARCHAR(60) DEFAULT NULL,
    store      VARCHAR(60) DEFAULT NULL
);


CREATE TABLE shoppingList
(
    listID      INT            NOT NULL     PRIMARY KEY AUTO_INCREMENT,
    listName    VARCHAR(60)    NOT NULL     UNIQUE,
    storeName   VARCHAR(60)    NULL,
    itemID      INT             NULL
);

CREATE TABLE listItems
(
    listID      INT           NOT NULL,
    itemID      INT           NOT NULL

);

--POPULATE TABLES
INSERT INTO `item`(`itemName`, `brand`, `price`, `store`) VALUES ('Milk','Smiths','3.05','Smiths');
INSERT INTO `item`(`itemName`, `brand`, `price`, `store`) VALUES ('Orange Juice','Simply','3.99','Smiths');
INSERT INTO `item`(`itemName`, `brand`, `price`, `store`) VALUES ('Orange Juice','Tropicana','3.45','Smiths');
INSERT INTO `item`(`itemName`, `price`, `quantity`, `store`) VALUES ('Apples','0.99','per pound','Smiths');
INSERT INTO `item`(`itemName`, `brand`, `price`, `store`) VALUES ('Orange Juice','Simply','4.01','Albertsons');
INSERT INTO `item`(`itemName`, `brand`, `price`, `store`) VALUES ('Orange Juice','Tropicana','3.99','Alberstons');


INSERT INTO `store`(`storeName`) VALUES ('Albertsons');
INSERT INTO `store`(`storeName`) VALUES ('Smiths');
INSERT INTO `store`(`storeName`) VALUES ('Trader Joes');

INSERT INTO `shoppinglist`(`listName`, `storeName`) VALUES ('Groceries', 'Smiths');
INSERT INTO `shoppinglist`(`listName`) VALUES ('Easter Dinner');

INSERT INTO `shoppinglist`(`listID`, `listName`, `storeName`, `itemID`) VALUES ('1', 'Groceries', 'Smiths', '6');
INSERT INTO `shoppinglist`(`listID`, `listName`, `storeName`, `itemID`) VALUES ('1', 'Groceries', 'Smiths', '4');
INSERT INTO `shoppinglist`(`listID`, `listName`, `storeName`, `itemID`) VALUES ('1', 'Groceries', 'Smiths', '1');


INSERT INTO `listItems`(`listID`, `itemID`) VALUES ('1', '6');
INSERT INTO `listItems`(`listID`, `itemID`) VALUES ('1', '1');