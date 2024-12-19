<?php
header('Content-Type: application/json');
include 'database.php'; // Include your database connection file

session_start();
$userId = $_SESSION['user_id']; // Get the logged-in user's ID from the session

if (!$userId) {
    echo json_encode(['error' => 'User not authenticated']);
    exit;
}

// Fetch orders from the database
$query = "SELECT * FROM orders WHERE user_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$userId]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($orders);
