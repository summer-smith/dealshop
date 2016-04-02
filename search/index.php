<?php
//SEARCH CONTROLLER
ini_set('display_errors', 1);

// Connection to each database
require('../model/database.php');
require('../model/itemDB.php');


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
        if ($items == NULL){
            $error = 'No results found.';
            $items = getItems();
            include('search.php');
        } else{
            include('results.php');
        }
        break;
      
    case 'Item Info':
        $itemID = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);
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
    
    //default:
    //    $items = getItems();
    //   include('search.php');
} 