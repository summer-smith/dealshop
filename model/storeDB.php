<?php

function getStores(){
    global $db;
    $query = 'SELECT * FROM store
             ORDER BY storeName';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function getStoreName($storeID){
    global $db;
    $query = 'SELECT * FROM store
              WHERE storeID= :storeID';    
    $statement = $db->prepare($query);
    $statement->bindValue(':storeID', $storeID);
    $statement->execute();    
    $store = $statement->fetch();
    $statement->closeCursor();    
    $store_name = $store['storeName'];
    return $store_name;
}




