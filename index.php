<?php
    require('database.php');
    $query = 'SELECT *
              FROM todoitems
              ORDER BY itemNum';
    $statement = $db->prepare($query);
    $statement->execute();
    $todoitems = $statement->fetchAll();
    $statement->closeCursor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To Do List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header><h1>My To Do List</h1></header>
    <main>
        <!-- Show today's tasks -->
        <section>
            <h2 id="tasks" class="italics">Today's Tasks:</h2>
            <!-- If no items in todolist, display message, otherwise display items -->
            <?php if(empty($todoitems)) { ?>
                <p>No tasks yet, get to it!!</p>
            <?php } else { ?>
                <?php foreach ($todoitems as $todoitem) : ?>
                <ul>
                    <li id=divleft><?php echo $todoitem['title']; ?></li>
                    <p id=divleft><?php echo $todoitem['description']; ?></p>
                </ul>
                <?php endforeach; ?>
        </section>
        <?php } ?>
    <!-- Add new item -->
    <section>
        <h2 id="tasks" class="italics">Add new task:</h2>
        <form action="index.php" method="post">
            <label for="newtitle"><strong>Task:</strong></label><br>
            <input type="text" id="newtitle" name="title" required><br>
            <label for="description"><strong>Description:</strong></label><br>
            <input type="text" id="description" name="description"><br><br>
            <button id="add">Add</button>
        </form>
        <?php include_once('index.php'); ?>
    </section>
    <footer>
    <p>Justine Stroup INF 653 VC</p>
    </footer>
    </main>
</body>
</html>