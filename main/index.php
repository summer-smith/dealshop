<?php
//MAIN CONTROLLER
ini_set('display_errors', 1);

// Connection to each database
require('../model/database.php');
require('../model/userDB.php');
require('../model/itemDB.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}


switch( $action ) {
    case 'Login Page':
        include('login.php');
        break;
    
    case 'home':
        include('home.php');
        break;
    
    case 'loginSubmit':
        $email = filter_input(INPUT_POST, 'email');
        if(get_user_by_email($email)){
            include('home.php');
        }
        break;
    
    case 'Price Compare':
        $itemID = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);
        header("Location: ../search/index.php?action=priceCompare&itemID=".$itemID);
        break;
        
    case 'Price Compare Tab':
    case 'priceCompareTab':
        $items = getItems();    
        include('priceCompare.php');
        break;
    
    case 'Search':
        header("Location: ../search");
        break;
    
    case 'View Lists':
        header("Location: ../shoppingList");
        break;
    
    case 'View Deals':
        header("Location: ../deals");
        break;
    
    case 'Item Info':
        $itemID = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);
        if ($itemID == NULL || $itemID == FALSE){
            $error = 'Invalid item ID';
            $items = getItems();
            include('priceCompare.php');
        } else{
            $item = getItemByID($itemID);
            header("Location: ../search/index.php?action=itemInfo&itemID=".$itemID);
        }
        break;
        
    case 'Add to List':
        $itemID = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);
        header("Location: ../shoppingList/index.php?action=addItem&itemID=".$itemID);
        break;    
    
    default:
        include('home.php');
}