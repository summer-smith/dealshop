<?php
//SEARCH CONTROLLER
ini_set('display_errors', 1);

// Connection to each database
require('../model/database.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'search';
    }
    
}

if ($action == 'search'){
    include('search.php');
} else if ($action == 'results'){
    include('results.php');
} else if ($action == 'itemInfo'){
    include('itemInfo.php');
} else if ($action == 'createItem'){
    include('createItem.php');
} 