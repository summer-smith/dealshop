<?php

function getItems(){
    global $db;
    $query = 'SELECT * FROM item
            GROUP BY brand
             ORDER BY itemName';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function getAllByName($itemName){
    global $db;
    $query = 'SELECT * FROM item
              WHERE itemName= :itemName';    
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
    $query = 'SELECT * FROM items
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
    $query = 'SELECT * FROM items
              WHERE itemID= :itemID';    
    $statement = $db->prepare($query);
    $statement->bindValue(':itemID', $itemID);
    $statement->execute();    
    $item = $statement->fetch();
    $statement->closeCursor();    
    $item_name = $item['itemName'];
    return $item_name;
}
