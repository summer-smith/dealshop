<?php
//LIST CONTROLLER
ini_set('display_errors', 1);

// Connection to each database
require('../model/database.php');
require('../model/storeDB.php');
require('../model/listDB.php');
require('../model/itemDB.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}
$error = NULL;

switch ($action){
    case 'Add Store':
        $listID = filter_input(INPUT_POST, 'listID', FILTER_VALIDATE_INT);
        $storeID = filter_input(INPUT_POST, 'storeID', FILTER_VALIDATE_INT);
        $storeName = getStoreName($storeID);
        
        addStoreToList($listID, $storeName);
        //Return to the list page
        //header("Location: ../shoppinglist/index.php?action=editList&listID=".$listID);
    case 'Edit List':
    case 'editList':
        $listID = filter_input(INPUT_POST, 'listID', FILTER_VALIDATE_INT);
        if ($listID == NULL){
            $action = filter_input(INPUT_GET, 'listID', FILTER_VALIDATE_INT);
        }
        
        if($listID == NULL){
            $error = "ERROR: Invalid list page";
        } else {
            $listName = getListName($listID);
            $listItems = getListItems($listID);
            $items = array();
            foreach ($listItems as $listItem) :
                $item = getItemByID($listItem['itemID']);
                array_push($items, $item);
            endforeach;
            $storeName = getListStore($listID);
            include('editList.php');
        }
        break;
    
       
    case 'Add Item To List':
        $listID = filter_input(INPUT_POST, 'listID', FILTER_VALIDATE_INT);
        $itemID = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);
        addItemToList($itemID, $listID);
         
        $item = getItemByID($itemID);
        $itemName = $item['itemName'];
        $listName = getListName($listID);
              
        $message = "\"".$itemName."\" has been added to ".$listName;
        include('successPage.php');
        break;
    
    case 'addItem':
        $itemID = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);
        if ($itemID == NULL){
            $itemID = filter_input(INPUT_GET, 'itemID', FILTER_VALIDATE_INT);
        }
        if ($itemID != NULL){
            $item = getItemByID($itemID);
            $lists = getLists();
        } else {
            $error = "ERROR: No item defined, cannot add undefined item to list.";
        }
        include('selectList.php');
        break;
    
    case 'New List':
        $stores = getStores();
        include('createShoppingList.php');
        break;
        
    case 'Edit Store':
        $listID = filter_input(INPUT_POST, 'listID', FILTER_VALIDATE_INT);
        $stores = getStores();
        include('addStore.php');
        break;
    
    case 'Remove Item':
        $listID = filter_input(INPUT_POST, 'listID', FILTER_VALIDATE_INT);
        $itemID = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);
        deleteItemFromList($itemID, $listID);
         
        $item = getItemByID($itemID);
        $itemName = $item['itemName'];
        $listName = getListName($listID);
              
        $message = "\"".$itemName."\" has been removed from ".$listName;
        include('successPage.php');
        break;
    
    case 'Edit Name':
        $listID = filter_input(INPUT_POST, 'listID', FILTER_VALIDATE_INT);
        break;
    
    case 'Submit New Name':
        break;
    
    case 'Price Compare':
        $itemID = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);
        header("Location: ../search/index.php?action=priceCompare&itemID=".$itemID);
        break;
    
    case 'Item Search':
        header("Location: ../search");
        break;
    
    case 'Delete List':
        $listID = filter_input(INPUT_POST, 'listID', FILTER_VALIDATE_INT);
        $listName = getListName($listID);
        deleteList($listID);
        $message = $listName." has been deleted";
        include('successPage.php');  //TODO: Redirect to list home page
        break;
    
    case 'Create List':
        $storeName = filter_input(INPUT_POST, 'storeName');
        $listName = filter_input(INPUT_POST, 'listName');
         
            createList($listName, $storeName);       
    case 'List Page':
    default:
        $lists = getLists();
        include('shoppingList.php');
}
