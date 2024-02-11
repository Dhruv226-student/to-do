<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>Task Details</h1>
    </header>
    <main class="container mt-4">
        <section id="task-details" class="card">
            <div class="card-body">
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

                        // Display task details
                        if ($task) {
                            echo "<h2 class='card-title'>{$task['title']}</h2>";
                            echo "<p class='card-text'>{$task['description']}</p>";

                            // Add buttons for updating and deleting with Bootstrap classes
                            echo "<a href='edit_task.php?id={$task['id']}' class='btn btn-warning'>Edit Task</a> ";
                            echo "<a href='delete_task.php?id={$task['id']}' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this task?\")'>Delete Task</a>";
                        } else {
                            echo "<p class='card-text'>Task not found.</p>";
                        }
                    } catch(PDOException $e) {
                        echo "<p class='card-text'>Error: " . $e->getMessage() . "</p>";
                    }
                } else {
                    echo "<p class='card-text'>Task ID not provided.</p>";
                }
                ?>
            </div>
        </section>
    </main>
    <footer class="bg-primary text-white text-center py-3">
        <p>&copy; 2022 Your To-Do List App</p>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
