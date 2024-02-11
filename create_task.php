<?php
// Include database connection
include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $description = $_POST['description'];

    try {
        // Prepare SQL statement for insertion
        $stmt = $db->prepare("INSERT INTO tasks (title, description) VALUES (:title, :description)");
        
        // Bind parameters
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        
        // Execute statement
        $stmt->execute();
        
        // Redirect to homepage after successful insertion
        header("Location: index.php");
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
