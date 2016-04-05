<?php
//SEARCH CONTROLLER
ini_set('display_errors', 1);

// Connection to each database
require('../model/database.php');
require('../model/itemDB.php');
require('../model/storeDB.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}
$error = '';


if ($action == NULL){
   $action = filter_input(INPUT_GET, 'action');
   if($action == NULL)
       $action = "Home";
}

switch ($action){
    case 'Home':
        $items = getItems();
        include('search.php');
        break;
    
    case 'Search':
        $searchItemName = filter_input(INPUT_POST, 'searchItem');
        $items = getAllByName($searchItemName);
        $foundIn = "items";
        
        /*if ($items == NULL || $items == FALSE){ //if no matching items, check for matching brands
            $items = getItemsByBrand($searchItemName);
            $foundIn = "brands";
        }
        if ($items == NULL || $items == FALSE){ //if no matching items, check for matching stores
            $items = getItemsByStore($searchItemName);
            $foundIn = "stores";
        }*/ //doesn't work - out of time - removing for submission. :) 
        
        if ($items == NULL || $items == FALSE){  //if stull null, no matching results in item names, stores, or brands.  
            $error = 'No results found.'; //give user error message.
            $items = getItems();
            include('search.php');
        } else{
            include('results.php');
        }
        break;
     
    case 'itemInfo':
    case 'Item Info':
        $itemID = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);
        if ($itemID == NULL){
            $itemID = filter_input(INPUT_GET, 'itemID', FILTER_VALIDATE_INT);
        }
        if ($itemID == NULL || $itemID == FALSE){
            $error = 'Invalid item ID';
            $items = getItems();
            include('search.php');
        } else{
            $item = getItemByID($itemID);
            include('itemInfo.php');
        }
        break;
    
    case 'priceCompare':
    case 'Price Compare':
        $compareItemID = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);
        if ($compareItemID == NULL){
            $compareItemID = filter_input(INPUT_GET, 'itemID', FILTER_VALIDATE_INT);
        }
        $compareItem = getItemByID($compareItemID);
        $items = getAllByName($compareItem['itemName']);
        include('priceCompare.php');
        break;
    
    case 'Add to List':
        $itemID = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);
        header("Location: ../shoppingList/index.php?action=addItem&itemID=".$itemID);
        break;
    
    case 'Create Item':
        include('createItem.php');
        break;
    
    case 'Add Price Form':
        $itemID = filter_input(INPUT_POST, 'newPriceItemID', FILTER_VALIDATE_INT);
        if ($itemID== NULL){
            $itemID = filter_input(INPUT_GET, 'newPriceItemID', FILTER_VALIDATE_INT);
        }
        $item = getItemByID($itemID);
        $stores = getStores();
        include('addItemPriceForm.php');
        break;
        
    case 'Add Price':
        $itemID = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);
        if ($itemID== NULL){
            $itemID = filter_input(INPUT_GET, 'itemID', FILTER_VALIDATE_INT);
        }
        $itemName = filter_input(INPUT_POST, 'itemName');
        $price = filter_input(INPUT_POST, 'itemPrice', FILTER_VALIDATE_INT);
        $quantity = filter_input(INPUT_POST, 'quantity');
        $store = filter_input(INPUT_POST, 'storeName');
        $brand = filter_input(INPUT_POST, 'brandName');
        
        if ($price == NULL || $price == FALSE){
            $priceError = "*Required";
            header("Location: addItemPriceForm.php?newPriceItemID=".$itemID);
        } else {
            addItemPrice($itemID, $itemName, $price, $quantity, $store, $brand);
            header("Location: ./index.php?action=priceCompare&itemID=".$itemID);
        }
        
        break;
    
    //default:
    //    $items = getItems();
    //   include('search.php');
} 