<?php
//LIST CONTROLLER
ini_set('display_errors', 1);

// Connection to each database
require('../model/database.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'shoppingList';
    }
    
}

if ($action == 'shoppingList'){
    include('shippingList.php');
} else if ($action == 'editList'){
    include('editList.php');
} else if ($action == 'createShoppingList'){
    include('createShoppingList.php');
} else if ($action == 'addStore'){
    include('addStore.php');
}
