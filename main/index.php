<?php
//MAIN CONTROLLER
ini_set('display_errors', 1);

// Connection to each database
//require('../model/database.php');
require('../model/userDB.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'loginPage';
    }
    
}

if ($action == 'loginPage'){
    include('login.php');
} else if ($action == 'home'){
    include('home.php');
} else if ($action == 'loginSubmit'){
    $email = filter_input(INPUT_POST, 'email');
    if(get_user_by_email($email)){
        include('home.php');
    }
}
