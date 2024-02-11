<?php
$host = 'localhost'; // Change to your database host
$dbname = 'todo_app'; // Change to your database name
$username = 'root'; // Change to your database username
$password = ''; // Change to your database password

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";  // You can comment out this line to avoid output in this file
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
