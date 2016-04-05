<?php

function getLists(){
    global $db;
    $query = 'SELECT * FROM shoppinglist
             GROUP BY listID
             ORDER BY listName';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function getListName($listID){
    global $db;
    $query = 'SELECT * FROM shoppinglist
              WHERE listID= :listID';    
    $statement = $db->prepare($query);
    $statement->bindValue(':listID', $listID);
    $statement->execute();    
    $list = $statement->fetch();
    $statement->closeCursor();    
    $list_name = $list['listName'];
    return $list_name;
}

function getListItems($listID){
    global $db;
    $query = 'SELECT * FROM listItems
             WHERE listID= :listID';
    $statement = $db->prepare($query);
    $statement->bindValue(':listID', $listID);
    $statement->execute();
    return $statement; 
}

function getListStore($listID){
    global $db;
    $query = 'SELECT * FROM shoppinglist
              WHERE listID= :listID';    
    $statement = $db->prepare($query);
    $statement->bindValue(':listID', $listID);
    $statement->execute();    
    $list = $statement->fetch();
    $statement->closeCursor();    
    $store_name = $list['storeName'];
    return $store_name;    
}

function addItemToList($itemID, $listID){
    global $db;
    $query = 'INSERT INTO listItems
                (itemID, listID)
              VALUES
                (:itemID, :listID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemID', $itemID);
    $statement->bindValue(':listID', $listID);
    $statement->execute();
    $statement->closeCursor();    
}

function deleteItemFromList($itemID, $listID){
    global $db;
    $query = 'DELETE FROM listItems
              WHERE itemID = :itemID AND listID = :listID';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemID', $itemID);
    $statement->bindValue(':listID', $listID);
    $statement->execute();
    $statement->closeCursor();    
}

function createList($listName, $storeName = NULL){
     global $db;
    $query = 'INSERT INTO shoppingList
                (listName, storeName)
              VALUES
                (:listName, :storeName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':storeName', $storeName);
    $statement->bindValue(':listName', $listName);
    $statement->execute();
    $statement->closeCursor();   
}

function deleteList($listID){
    global $db;
    $query = 'DELETE FROM shoppinglist
              WHERE listID = :listID';
    $statement = $db->prepare($query);
    $statement->bindValue(':listID', $listID);
    $statement->execute();
    $statement->closeCursor();    
}

function addStoreToList($listID, $storeName){
    global $db;
    $query = 'UPDATE shoppinglist
              SET storeName = :storeName
              WHERE listID = :listID';
    $statement = $db->prepare($query);
    $statement->bindValue(':listID', $listID);
    $statement->bindValue(':storeName', $storeName);
    $statement->execute();
    $statement->closeCursor();      
}

function updateListName($listID, $listName){
    global $db;
    $query = 'UPDATE shoppinglist
              SET listName = :listName
              WHERE listID = :listID';
    $statement = $db->prepare($query);
    $statement->bindValue(':listID', $listID);
    $statement->bindValue(':listName', $listName);
    $statement->execute();
    $statement->closeCursor();    
}