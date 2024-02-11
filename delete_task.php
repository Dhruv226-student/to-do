<?php
// Include database connection
include 'db.php';

// Check if task ID is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepare SQL statement for deleting task
        $stmt = $db->prepare("DELETE FROM tasks WHERE id = :id");
        
        // Bind parameters
        $stmt->bindParam(':id', $id);
        
        // Execute statement
        $stmt->execute();
        
        // Redirect to homepage after successful deletion
        header("Location: index.php");
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Task ID not provided.";
}
?>
