<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>Edit Task</h1>
    </header>
    <main>
        <section id="edit-task">
            <?php
            // Include database connection
            include 'db.php';

            // Check if task ID is provided
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                try {
                    // Prepare SQL statement for selecting task by ID
                    $stmt = $db->prepare("SELECT * FROM tasks WHERE id = :id");

                    // Bind parameter
                    $stmt->bindParam(':id', $id);

                    // Execute statement
                    $stmt->execute();

                    // Fetch task details
                    $task = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Display edit task form
                    if ($task) {
                        echo "<form action='update_task.php' method='POST'>";
                        echo "<input type='hidden' name='id' value='{$task['id']}'>";
                        echo "<label for='title'>Title:</label>";
                        echo "<input type='text' id='title' name='title' value='{$task['title']}' required>";
                        echo "<label for='description'>Description:</label>";
                        echo "<textarea id='description' name='description' rows='4'>{$task['description']}</textarea>";
                        echo "<button type='submit'>Update Task</button>";
                        echo "</form>";
                    } else {
                        echo "Task not found.";
                    }
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            } else {
                echo "Task ID not provided.";
            }
            ?>
        </section>
    </main>
    <footer class="bg-primary text-white text-center py-3" >
        <p>&copy; 2022 Your To-Do List App</p>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
