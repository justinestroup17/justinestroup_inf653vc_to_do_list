<?php
require('database.php');

$query =   'SELECT *
            FROM todoitems';

$statement = $db->prepare($query);
$statement->execute();
$customers = $statement->fetchAll();
$statement->closeCursor(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header><h1>To Do List</h1></header>
    <main>
        <section>
            <?php foreach ($todoitems as $todoitem) : ?>
                <p><span class="bold">Title:</span> <?php echo $todoitem['title']; ?></p>
                <p><span class="bold">Description:</span> <?php echo $todoitem['description']; ?></p>
                <br>
            <?php endforeach; ?>
        </section>
    </main>
    <footer>
        <p>Justine Stroup INF653VC</p>
    </footer>
</body>
</html>