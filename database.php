<?php
    $dsn = 'mysql:host=localhost;dbname=todolist';
    $username = 'root';
    //$password = ''; commented out to allow access for class purposes

    try
    {
        $db = new PDO($dsn, $username);
    }
    catch (PDOException $e)
    {
        $error_message = 'Database Error: ';
        $error_message .= $e->getMessage();
        include('database_error.php');
        echo $error_message;
        exit();
    }
?>