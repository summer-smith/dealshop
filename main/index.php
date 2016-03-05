<?php
//MAIN CONTROLLER
ini_set('display_errors', 1);

// Connection to each database
//require('../model/database.php');
require('../model/userDB.php');


$action = filter_input(INPUT_POST, 'action');


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
        include('priceCompare.php');
        break;
    
    case 'Search':
        header("Location: ../search");
        //include('../search');
        break;
    
    case 'View Lists':
        header("Location: ../shoppingList");
        break;
    
    case 'View Deals':
        header("Location: ../deals");
        break;
    
    default:
        include('login.php');
}