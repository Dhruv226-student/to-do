<?php
// Include database connection
include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    try {
        // Prepare SQL statement for updating task
        $stmt = $db->prepare("UPDATE tasks SET title = :title, description = :description WHERE id = :id");
        
        // Bind parameters
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        
        // Execute statement
        $stmt->execute();
        
        // Redirect to homepage after successful update
        header("Location: index.php");
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
