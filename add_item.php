<?php
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

    if ($title && $description) {
        require('database.php');

        $query = 'INSERT INTO todoitems
                    (title, description)
                  VALUES
                    (:title, :description)';
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->execute();
        $statement->closeCursor();

        include('index.php');
    } else {
        $error_message = 'Not a valid entry';
        include('database_error.php');
    }


?>