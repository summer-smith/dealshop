<?php
//LIST CONTROLLER
ini_set('display_errors', 1);

// Connection to each database
//require('../model/database.php');

$action = filter_input(INPUT_POST, 'action');

switch ($action){
    case 'View Lists':
        include('shoppingList.php');
        break;
    
    case 'Edit List':
    include('editList.php');
        break;
    
    case 'Create Shopping List':
        include('createShoppingList.php');
        break;
    
    case 'Add Store':
        include('addStore.php');
        break;
    
    default:
        include('shoppingList.php');
}
