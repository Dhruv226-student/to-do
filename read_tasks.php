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
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!-- Display tasks -->
<ul>
    <?php foreach ($tasks as $task): ?>
        <li><?php echo $task['title']; ?></li>
    <?php endforeach; ?>
</ul>
