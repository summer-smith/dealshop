<?php
//TODO:update connection info
    $dsn = 'mysql:host=localhost;dbname=ittlech8_dealShop';
    $username = 'ittlech8_user';
    $password = 'BucKet22#';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }