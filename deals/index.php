<?php
//DEAL CONTROLLER
ini_set('display_errors', 1);

// Connection to each database
require('../model/database.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'dealPage';
    }
    
}

if ($action == 'dealPage'){
    include('dealPage.php');
} else if ($action == 'storePage'){
    include('storePage.php');
}
