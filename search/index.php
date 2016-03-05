<?php
//SEARCH CONTROLLER
ini_set('display_errors', 1);

// Connection to each database
//require('../model/database.php');


$action = filter_input(INPUT_POST, 'action');

switch ($action){
    case 'search':
        include('search.php');
        break;
    
    case 'Search Results':
       include('results.php');
        break;
    
    case 'Item Info':
        include('itemInfo.php');
        break;
    
    case 'Create Item':
        include('createItem.php');
        break;
    
    default:
        include('search.php');
} 