<?php
//DEAL CONTROLLER
ini_set('display_errors', 1);

// Connection to each database
//require('../model/database.php');


$action = filter_input(INPUT_POST, 'action');

switch ($action){
    case 'View Deals':
        include('dealPage.php');
        break;
    
    case 'Store Page':
        include('storePage.php');
        break;
    
    default:
        include('dealPage.php');
}
