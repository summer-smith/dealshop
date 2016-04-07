<?php

function getItems(){
    global $db;
    $query = 'SELECT * FROM item
             GROUP BY itemName
             ORDER BY itemName';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function getItemsByStore($storeName){
    global $db;
    $query = 'SELECT * FROM item
             WHERE store = :store
             ORDER BY itemName';
    $statement = $db->prepare($query);
    $statement->bindValue(':store', $storeName);
    $statement->execute();
    return $statement;    
}

function getItemsByBrand($brandName){
    global $db;
    $query = 'SELECT * FROM item
            WHERE brand = :brand
             ORDER BY itemName';
    $statement = $db->prepare($query);
    $statement->bindValue(':brand', $brandName);
    $statement->execute();
    return $statement;  
}

function getAllByName($itemName){
    global $db;
    $query = 'SELECT * FROM item
              WHERE itemName= :itemName
              ORDER BY price';    //Put the lowest price first
    $statement = $db->prepare($query);
    $statement->bindValue(':itemName', $itemName);
    $statement->execute();   
    $results = $statement->fetchAll();
    $statement->closeCursor();    
    return $results;
}

function getItemByID($itemID){
    global $db;
    $query = 'SELECT * FROM item
              WHERE itemID= :itemID';    
    $statement = $db->prepare($query);
    $statement->bindValue(':itemID', $itemID);
    $statement->execute();    
    $item = $statement->fetch();
    $statement->closeCursor();    
    return $item;
}

function getItemByName($itemName){
    global $db;
    $query = 'SELECT * FROM item
              WHERE itemName= :itemName';    
    $statement = $db->prepare($query);
    $statement->bindValue(':itemName', $itemName);
    $statement->execute();    
    $item = $statement->fetch();
    $statement->closeCursor();    
    return $item;
}

//unused functions
function getItemID($itemName) {
    global $db;
    $query = 'SELECT * FROM item
              WHERE itemName= :itemName';    
    $statement = $db->prepare($query);
    $statement->bindValue(':itemName', $itemName);
    $statement->execute();    
    $item = $statement->fetch();
    $statement->closeCursor();    
    $item_id = $item['itemID'];
    return $item_id;
}

function getItemName($itemID){
    global $db;
    $query = 'SELECT * FROM item
              WHERE itemID= :itemID';    
    $statement = $db->prepare($query);
    $statement->bindValue(':itemID', $itemID);
    $statement->execute();    
    $item = $statement->fetch();
    $statement->closeCursor();    
    $item_name = $item['itemName'];
    return $item_name;
}

function addItemPrice($itemName, $itemPrice, $quantity, $store, $brand ){
    global $db;
    
    if ($quantity == FALSE){$quantity = NULL;}
    if ($store == FALSE) {$store = NULL;}
    if ($brand == FALSE) {$brand = NULL;}
    
    $query = 'INSERT INTO item
                (itemName, brand, price, quantity, store)
              VALUES
                (:itemName, :brand, :price, :quantity, :store)';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemName', $itemName);
    $statement->bindValue(':brand', $brand);
    $statement->bindValue(':price', $itemPrice);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':store', $store);
    $statement->execute();
    $statement->closeCursor(); 
    
}

