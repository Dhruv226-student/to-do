<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>To-Do List</h1>
    </header>
    <main>
        <section id="task-list" class="container">
            <h2 class="mt-4">Tasks</h2>
            <ul class="list-group">


                <?php
                // Include database connection
                include 'db.php';

                try {
                    // Prepare SQL statement for selecting tasks
                    $stmt = $db->prepare("SELECT * FROM tasks");

                    // Execute statement
                    $stmt->execute();

                    // Fetch all tasks as an associative array
                    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Display tasks
                    foreach ($tasks as $task) {
                        echo "<li class='list-group-item'>{$task['title']} ";
                        echo "<a href='task_details.php?id={$task['id']}' class='btn btn-primary btn-sm float-right'>Details</a> "; // Added Bootstrap button class
                        echo "<a href='edit_task.php?id={$task['id']}' class='btn btn-warning btn-sm float-right mr-2'>Edit</a> "; // Added Bootstrap button class
                        echo "<a href='delete_task.php?id={$task['id']}' class='btn btn-danger btn-sm float-right mr-2' onclick='return confirm(\"Are you sure you want to delete this task?\")'>Delete</a>";
                        echo "</li>";
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </ul>
        </section>
        <section id="add-task" class="container mt-4">
            <h2>Add Task</h2>
            <form action="create_task.php" method="POST">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" class="form-control" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Add Task</button> <!-- Added Bootstrap button class -->
            </form>
        </section>

    </main>
    <footer class="bg-primary text-white text-center py-3">
        <p>&copy; 2022 Your To-Do List App</p>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</html>