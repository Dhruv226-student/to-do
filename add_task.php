<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <header>
        <h1>Add Task</h1>
    </header>
    <main>
        <section id="add-task">
            <form action="create_task.php" method="POST">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4"></textarea>
                <button type="submit">Add Task</button>
            </form>
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
