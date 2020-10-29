<?php
    // Development Connection
    //$host = 'localhost';
    //$db = 'attendance_db';
    //$user = 'root';
    //$pass = '';
    //$charset = 'utf8mb4';

    // Remote Database Connection
    $host = 'remotemysql.com';
    $db = 'RZmUpDS9nX';
    $user = 'RZmUpDS9nX';
    $pass = 'wNQsEHO0J5';
    $charset = 'utf8mb4';

    //dsn = Data Source Name
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
        throw new PDOException($e->getMessage());
        //echo "<h1 class='text-danger'>No Database Found</h1>";
    }

    require_once 'crud.php';
    $crud = new crud($pdo);
    
?>