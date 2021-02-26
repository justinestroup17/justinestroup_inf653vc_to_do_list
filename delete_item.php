<?php
    require('database.php');
    $itemNum = filter_input(INPUT_POST, 'itemNum', FILTER_VALIDATE_INT);
    // If valid, delete
    if ($itemNum)
    {
        $query = 'DELETE FROM todoitems
                  WHERE itemNum = :itemNum';
        $statement = $db->prepare($query);
        $statement->bindValue(':itemNum', $itemNum);
        $success = $statement->execute();
        $statement->closeCursor();
    }
    include('index.php');
?>